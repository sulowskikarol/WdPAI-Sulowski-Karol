const form = document.querySelector("form");
const emailInput = form.querySelector('input[name="email"]');
const passwordInput = form.querySelector('input[name="password"]');
const confirmedPasswordInput = form.querySelector('input[name="c_password"]');

function isEmail(email) {
    return /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(email);
}

function arePasswordsSame(password, confirmedPassword) {
    return password === confirmedPassword;
}

function isPasswordStrong(password) {
    return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/.test(password);
}

function markValidation(element, condition) {
    !condition ? element.classList.add("no-valid") : element.classList.remove("no-valid");
}

emailInput.addEventListener("keyup", function() {
    setTimeout(function() {
        markValidation(emailInput, isEmail(emailInput.value));
    }, 1000);
});

passwordInput.addEventListener("keyup", function() {
    setTimeout(function() {
        markValidation(passwordInput, isPasswordStrong(passwordInput.value));
    }, 1000);
});

confirmedPasswordInput.addEventListener("keyup", function() {
    setTimeout(function() {
        const condition = arePasswordsSame(
            passwordInput.value,
            confirmedPasswordInput.value
        );
        markValidation(confirmedPasswordInput, condition);
    }, 1000);
});

form.addEventListener('submit', function (event) {
    if (!isEmail(emailInput.value)) {
        alert('Podany adres email ma niepoprawny format');
        event.preventDefault();
    }

    if (!arePasswordsSame(passwordInput.value, confirmedPasswordInput.value)) {
        alert('Hasło nie zostało powtórzone poprawnie');
        event.preventDefault();
    }

    if (!isPasswordStrong(passwordInput.value)) {
        alert('Podane hasło nie spełnia kryteriów');
        event.preventDefault();
    }
});