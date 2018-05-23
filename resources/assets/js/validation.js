$(function () {
    $("#name").on("change", validateName);
    $("#email").on("change", validateEmail);
    $("#nick").on("change", validateNick);
    $("#password").on("change", validatePassword);
    $('#enviar').on("click", validateAll);
});

function validateName() {
    let isValid = false;
    let regex = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
    let inputName = $("#name");
    let name = inputName.val();

    if (!name.match(regex) || name === "") {
        $('#name').removeClass('is-valid');
        $('#name').addClass('is-invalid');
        $('#errorName').html("Error en el nombre").addClass('is-invalid');
    } else {
        $('#name').removeClass('is-invalid');
        $('#name').addClass('is-valid');

        $('#errorName').removeClass('is-invalid');
        $('#errorName').html('');
        isValid = true;
    }
    return isValid;
}

function validateEmail() {
    let isValid = false;
    let regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    let inputEmail = $("#email");
    let email = inputEmail.val();

    if (email.match(regex)) {
        $('#email').removeClass('is-invalid');
        $('#email').addClass('is-valid');
        $('#errorEmail').html('');
        isValid = true;
    } else {
        $('#email').removeClass('is-valid');
        $('#email').addClass('is-invalid');
        $('#errorEmail').html("El email no es correcto.").addClass('is-invalid');
    }
    return isValid;
}

function validateNick() {
    let isValid = false;
    let regex = /^[a-zA-Z]\w*$/;
    let inputNick = $("#nick");
    let nick = inputNick.val();

    if (!nick.match(regex) || nick === "") {
        $('#nick').removeClass('is-valid');
        $('#nick').addClass('is-invalid');
        $('#errorNick').html("Error en el nick").addClass('is-invalid');
    } else {
        $('#nick').removeClass('is-invalid');
        $('#nick').addClass('is-valid');

        $('#errorNick').removeClass('is-invalid');
        $('#errorNick').html('');
        isValid = true;
    }
    return isValid;
}

function validatePassword() {
    let isValid = false;
    let regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{5,}$/;
    let inputPassword = $("#password");
    let password = inputPassword.val();

    if (!password.match(regex) || password === "") {
        $('#password').removeClass('is-valid');
        $('#password').addClass('is-invalid');
        $('#errorPassword').html("Error en la contraseña, mínimo 6 carácteres.").addClass('is-invalid');
    } else {
        $('#password').removeClass('is-invalid');
        $('#password').addClass('is-valid');

        $('#errorPassword').removeClass('is-invalid');
        $('#errorPassword').html('');
        isValid = true;
    }
    return isValid;
}

function validateAll(e) {
    e.preventDefault();
    $('button').prop("disabled", true);

    let nombreCorrecto = validateName();
    let emailCorrecto = validateEmail();
    let nickCorrecto = validateNick();
    let passwordCorrecto = validatePassword();

    if (nombreCorrecto && emailCorrecto && nickCorrecto && passwordCorrecto) {
        $('#formulario').submit();
    }

    $('button').prop("disabled", false);
}