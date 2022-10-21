setTimeout(function() {
    $('.banner-container').hide();
}, 5000)

$('.menu-open').on('click', function() {
    $('.login-open').hide();
    $(this).hide();
    $('.logo').hide();
    $('.menu').addClass('menu-in');
    $('.menu-close').show();
});

$('.menu-close').on('click', function() {
    $(this).hide();
    $('.menu').removeClass('menu-in');
    $('.menu-open').show();
    $('.logo').show();
    $('.login-open').show();
});



$('.login-open').on('click', function() {
    $('.menu-open').hide();
    $(this).hide();
    $('.logo').hide();
    $('.login').addClass('login-in');
    $('.login-close').show();
});

$('.login-close').on('click', function() {
    $(this).hide();
    $('.login').removeClass('login-in');
    $('.login-open').show();
    $('.logo').show();
    $('.menu-open').show();
});

//añadir comprobacion de formularios, de ambos

document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById("formSubUser").addEventListener('submit', validationSubUser);
});

document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById("formUser").addEventListener('submit', validationUser);
});

function validationSubUser(e) {
    e.preventDefault();
    var valid = true;
    var user = document.getElementById('nameSubUser').value;
    var pass = document.getElementById('passSubUser').value;

    if (user == "") {
        $(".nameSubUser-error").text("Por favor introduce un nombre de usuario.");
        valid = false;
    } else {
        $(".nameSubUser-error").text(" ");
    }

    // alert(pass1 + "-.-" + regEx_pass.test(pass1));

    if (pass == "") {
        $(".passSubUser-error").text("Por favor introduce una contraseña.");
        valid = false;
    } else {
        $(".passSubUser-error").text(" ");
    }

    if (valid) {
        this.submit();
    } else {
        return;
    }

}

function validationUser(e) {
    e.preventDefault();
    var valid = true;
    var user = document.getElementById('nameUser').value;
    var pass = document.getElementById('passUser').value;

    if (user == "") {
        $(".nameUser-error").text("Por favor introduce un nombre de usuario.");
        valid = false;
    } else {
        $(".nameUser-error").text(" ");
    }

    // alert(pass1 + "-.-" + regEx_pass.test(pass1));

    if (pass == "") {
        $(".passUser-error").text("Por favor introduce una contraseña.");
        valid = false;
    } else {
        $(".passUser-error").text(" ");
    }

    if (valid) {
        this.submit();
    } else {
        return;
    }
}