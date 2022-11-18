$(document).ready(() => {
    addResizeListeners();
    setUserDropdownListener();
    setMenuClickListener();
    setSidenavCloseListener();
});

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

function setUserDropdownListener() {
    const userAvatar = $('.header__avatar');

    userAvatar.on('click', function(e) {
        const dropdown = $(this).children('.dropdown');
        toggleClass(dropdown, 'dropdown--active');
    });
}


function toggleClass(el, className) {
    if (el.hasClass(className)) {
        el.removeClass(className);
    } else {
        el.addClass(className);
    }
}

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

function setMenuClickListener() {
    $('.header__menu').on('click', function(e) {
        console.log('clicked menu icon');
        toggleClass(sidenavEl, SIDENAV_ACTIVE_CLASS);
        toggleClass(gridEl, GRID_NO_SCROLL_CLASS);
    });
}

function setSidenavCloseListener() {
    $('.sidenav__brand-close').on('click', function(e) {
        toggleClass(sidenavEl, SIDENAV_ACTIVE_CLASS);
        toggleClass(gridEl, GRID_NO_SCROLL_CLASS);
    });
}