document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById("formulario").addEventListener('submit', validation);
});

function minus(e) {
    e.value = e.value.toLowerCase();
}

function checkUser() {
    if (document.getElementById('user').value != "") {
        actualUser = document.getElementById("user").value;
        actualUser.toLowerCase();
        validUser = true;
        users.forEach(element => {
            if (element == actualUser) {
                validUser = false;
            }
        });
        if (validUser) {
            document.getElementById('userValid').style.display = 'block';
            document.getElementById('userInvalid').style.display = 'none';
            return true;
        } else {
            document.getElementById('userValid').style.display = 'none';
            document.getElementById('userInvalid').style.display = 'block';
            return false;
        }
    } else {
        document.getElementById('userValid').style.display = 'none';
        document.getElementById('userInvalid').style.display = 'none';
        return false;
    }
}

function pass1ViewChange() {
    var pass1 = document.getElementById("pass1");
    var pass2 = document.getElementById("pass2");
    if (pass1.type == "password") {
        pass1.type = "text";
        pass2.type = "text";
        document.getElementById('pass1_show').style.display = 'none';
        document.getElementById('pass1_hide').style.display = 'block';
        document.getElementById('pass2_show').style.display = 'none';
        document.getElementById('pass2_hide').style.display = 'block';
    } else {
        pass1.type = "password";
        pass2.type = "password";
        document.getElementById('pass1_show').style.display = 'block';
        document.getElementById('pass1_hide').style.display = 'none';
        document.getElementById('pass2_show').style.display = 'block';
        document.getElementById('pass2_hide').style.display = 'none';
    }
}

function validation(e) {

    e.preventDefault();

    const regEx_pass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$/;
    const regEx_email = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;

    var user = document.getElementById('user').value;
    var pass1 = document.getElementById('pass1').value;
    var pass2 = document.getElementById('pass2').value;
    var email = document.getElementById('email').value;
    var valid = true;

    if (user == "") {
        $(".user-error").text("Por favor introduce un nombre de usuario.");
        valid = false;
    } else {
        if (!checkUser()) {
            $(".user-error").text("Ese nombre de usuario ya esta en uso.");
            valid = false;
        } else {
            $(".user-error").text("");
        }
    }

    // alert(pass1 + "-.-" + regEx_pass.test(pass1));

    if (pass1 == "") {
        $(".pass1-error").text("Por favor introduce una contraseña.");
        valid = false;
    } else {
        if (regEx_pass.test(pass1)) {
            $(".pass1-error").text("");
        } else {
            $(".pass1-error").text("La contraseña debe cumplir los requisitos.");
            valid = false;
        }
    }

    if (pass2 == "") {
        $(".pass2-error").text("Por favor repite la contraseña.");
        valid = false;
    } else {
        if (regEx_pass.test(pass2)) {
            $(".pass2-error").text("");
        } else {
            $(".pass2-error").text("La contraseña debe cumplir los requisitos.");
            valid = false;
        }
    }

    if (pass1 != pass2 && pass1 != "" && pass2 != "") {
        $(".pass1-error").text("Ambas contraseñas deben coincidir.");
        $(".pass2-error").text("Ambas contraseñas deben coincidir.");
        valid = false;
    }

    if (email == "") {
        $(".email-error").text("Por favor introduce un email.");
        valid = false;
    } else {
        if (regEx_email.test(email)) {
            $(".email-error").text("");
        } else {
            $(".email-error").text("Por favor introduce un email valido.");
            valid = false;
        }
    }

    if (valid) {
        this.submit();
    } else {
        return;
    }
}