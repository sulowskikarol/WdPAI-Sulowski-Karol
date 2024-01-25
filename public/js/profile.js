const submitButton = document.querySelector("#submit");

submitButton.addEventListener('click', setUserDetails);

function setUserDetails() {
    const name = document.getElementById("name").value;
    const lastname = document.getElementById("lastname").value;
    const phone = document.getElementById("phone").value;

    if (name === '' || lastname === '' || phone === '') {
        alert('Wypełnij wszystkie pola');
        return;
    }

    const userDetails = {
        name: name,
        lastname: lastname,
        phone: phone
    };

    fetch('/set_user_details', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(userDetails)
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('Data sent successfully:', data);
        })
        .catch(error => {
            console.error('Error sending data:', error);
        });
}