const bikeGallery = document.querySelector(".bike-gallery");
const orderSection = document.querySelector(".order");
const confirmButton = document.querySelector("button");
const bikeCategories = [];
const order = [];

function loadBikeCategories() {
    fetch('/bike_categories', {
        method: "GET",
        headers: {
            'Content-Type': 'application/json'
        }

    }).then((response) => response.json())
        .then((data) => {
            processBikeCategories(data);
            renderBikeCategories(data);
        }).catch((error) => {
            console.log(error);
    });
}

function processBikeCategories(categories) {
    categories.forEach(bikeCategory => {
        bikeCategories.push(bikeCategory);
    });
}

function renderBikeCategories(categories) {
    categories.forEach(bikeCategory => {
        const bikeButton = document.createElement('bike-button');
        bikeButton.setAttribute('id', bikeCategory.kategoria_id);

        const image = document.createElement('img');
        image.src = 'public/img/uploads/'.concat(bikeCategory.sciezka_zdjecia);
        image.setAttribute('id', bikeCategory.kategoria_id);

        const sign = document.createElement('sign');
        sign.textContent = bikeCategory.nazwa_kategorii;
        sign.setAttribute('id', bikeCategory.kategoria_id);

        bikeButton.appendChild(image);
        bikeButton.appendChild(sign);

        bikeGallery.appendChild(bikeButton);
    });
}

function  addBikeToOrder(bikeCategoryId) {
    order.push(bikeCategories[bikeCategoryId - 1]);
    renderOrder();
}

function renderOrder() {
    let index = 0
    orderSection.innerHTML = "";
    order.forEach(position => {
        index += 1;
        const orderElement = document.createElement('div');
        orderElement.classList.add('order-element');

        const ordinalNumber = document.createElement('label');
        ordinalNumber.textContent = index;
        ordinalNumber.setAttribute('id', 'ordinal-number')

        const categoryName = document.createElement('label');
        categoryName.textContent = position.nazwa_kategorii;
        categoryName.setAttribute('id', 'category-name')

        const minusSign = document.createElement('label');
        minusSign.setAttribute('id', 'minus-sign');
        minusSign.setAttribute('data-id', String(index - 1));
        minusSign.textContent = '-';

        orderElement.appendChild(ordinalNumber);
        orderElement.appendChild(categoryName);
        orderElement.appendChild(minusSign);

        orderSection.appendChild(orderElement);
    });
}

function isRentValid(rentDateInput, returnDateInput) {

    if (!rentDateInput.value) {
        alert('Wybierz datę wypożyczenia')
        return false;
    }

    if (!returnDateInput.value) {
        alert('Wybierz datę zwrotu')
        return false;
    }

    const rentDate = new Date(rentDateInput.value);
    const returnDate = new Date(returnDateInput.value);
    const today = new Date();

    if (rentDate < today || returnDate <= rentDate) {
        alert('Wybrano niepoprawne daty')
        return false;
    }

    if (order.length === 0) {
        alert('Wybierz rowery/rowery do wypożyczenia')
        return false;
    }

    return true;
}

function submitRent(rentDate, returnDate) {
    fetch('/submit_rent', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            rentDate: rentDate,
            returnDate: returnDate,
            rentedBikes: order
        })
    }).then(response => response.json())
        .then(data => {
            console.log('Odpowiedź serwera: ', data);
        }).catch(error => console.error('Błąd fetcha: ', error));

}

document.addEventListener('DOMContentLoaded', function () {
    loadBikeCategories();
});

bikeGallery.addEventListener('click', function (event) {
    if (event.target.getAttribute('id')) {
        const bikeCategoryId = event.target.getAttribute('id');
        addBikeToOrder(bikeCategoryId);
    }
});

orderSection.addEventListener('click', function (event) {
    if (event.target.hasAttribute('data-id')) {
        const bikeToDelete = event.target.getAttribute('data-id');
        order.splice(bikeToDelete, 1);
        renderOrder();
    }
});

confirmButton.addEventListener('click', function () {
    const rentDateInput = document.querySelector('#rent-start');
    const returnDateInput = document.querySelector('#rent-end');

    const rentDate = rentDateInput.value;
    const returnDate = returnDateInput.value;

    if (isRentValid(rentDateInput, returnDateInput)) {
        submitRent(rentDate, returnDate);
        //TODO przekierowanie do profilu
   }
});

