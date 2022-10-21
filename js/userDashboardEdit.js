document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById("formulario").addEventListener('submit', validation);
});

/* Scripts for css grid dashboard */

$(document).ready(() => {
    addResizeListeners();
    // setSidenavListeners();
    setUserDropdownListener();
    setMenuClickListener();
    setSidenavCloseListener();
});

// Set constants and grab needed elements
const sidenavEl = $('.sidenav');
const gridEl = $('.grid');
const SIDENAV_ACTIVE_CLASS = 'sidenav--active';
const GRID_NO_SCROLL_CLASS = 'grid--noscroll';

function toggleClass(el, className) {
    if (el.hasClass(className)) {
        el.removeClass(className);
    } else {
        el.addClass(className);
    }
}

// User avatar dropdown functionality
function setUserDropdownListener() {
    const userAvatar = $('.header__avatar');

    userAvatar.on('click', function(e) {
        const dropdown = $(this).children('.dropdown');
        toggleClass(dropdown, 'dropdown--active');
    });
}

// Sidenav list sliding functionality
// function setSidenavListeners() {
//     const subHeadings = $('.navList__subheading');
//     console.log('subHeadings: ', subHeadings);
//     const SUBHEADING_OPEN_CLASS = 'navList__subheading--open';
//     const SUBLIST_HIDDEN_CLASS = 'subList--hidden';

//     subHeadings.each((i, subHeadingEl) => {
//         $(subHeadingEl).on('click', (e) => {
//             const subListEl = $(subHeadingEl).siblings();

//             // Add/remove selected styles to list category heading
//             if (subHeadingEl) {
//                 toggleClass($(subHeadingEl), SUBHEADING_OPEN_CLASS);
//             }

//             // Reveal/hide the sublist
//             if (subListEl && subListEl.length === 1) {
//                 toggleClass($(subListEl), SUBLIST_HIDDEN_CLASS);
//             }
//         });
//     });
// }

function toggleClass(el, className) {
    if (el.hasClass(className)) {
        el.removeClass(className);
    } else {
        el.addClass(className);
    }
}

// If user opens the menu and then expands the viewport from mobile size without closing the menu,
// make sure scrolling is enabled again and that sidenav active class is removed
function addResizeListeners() {
    $(window).resize(function(e) {
        const width = window.innerWidth;
        console.log('width: ', width);

        if (width > 750) {
            sidenavEl.removeClass(SIDENAV_ACTIVE_CLASS);
            gridEl.removeClass(GRID_NO_SCROLL_CLASS);
        }
    });
}

// Menu open sidenav icon, shown only on mobile
function setMenuClickListener() {
    $('.header__menu').on('click', function(e) {
        console.log('clicked menu icon');
        toggleClass(sidenavEl, SIDENAV_ACTIVE_CLASS);
        toggleClass(gridEl, GRID_NO_SCROLL_CLASS);
    });
}

// Sidenav close icon
function setSidenavCloseListener() {
    $('.sidenav__brand-close').on('click', function(e) {
        toggleClass(sidenavEl, SIDENAV_ACTIVE_CLASS);
        toggleClass(gridEl, GRID_NO_SCROLL_CLASS);
    });
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

    var pass1 = document.getElementById('pass1').value;
    var pass2 = document.getElementById('pass2').value;
    var email = document.getElementById('email').value;
    var valid = true;

    // alert(pass1 + "-.-" + regEx_pass.test(pass1));


    if (regEx_pass.test(pass1) || pass1 == "") {
        $(".pass1-error").text("");
    } else {
        $(".pass1-error").text("La contraseña debe cumplir los requisitos.");
        valid = false;
    }

    if (regEx_pass.test(pass2) || pass2 == "") {
        $(".pass2-error").text("");
    } else {
        $(".pass2-error").text("La contraseña debe cumplir los requisitos.");
        valid = false;
    }

    if (pass1 != pass2 && pass1 != "" && pass2 != "") {
        $(".pass1-error").text("Ambas contraseñas deben coincidir.");
        $(".pass2-error").text("Ambas contraseñas deben coincidir.");
        valid = false;
    }

    if (regEx_email.test(email) || email == "") {
        $(".email-error").text("");
    } else {
        $(".email-error").text("Por favor introduce un email valido.");
        valid = false;
    }

    if (valid) {
        this.submit();
    } else {
        return;
    }
}