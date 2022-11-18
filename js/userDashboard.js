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

// Draw the chart
function monthToText(month) {
    switch (month) {
        case "01":
            return "Enero";
            break;
        case "02":
            return "Febrero";
            break;
        case "03":
            return "Marzo";
            break;
        case "04":
            return "Abril";
            break;
        case "05":
            return "Mayo";
            break;
        case "06":
            return "Junio";
            break;
        case "07":
            return "Julio";
            break;
        case "08":
            return "Agosto";
            break;
        case "09":
            return "Septiembre";
            break;
        case "10":
            return "Octubre";
            break;
        case "11":
            return "Noviembre";
            break;
        case "12":
            return "Diciembre";
            break;
        default:
            return false;
            break;
    }

}

function renderChart(amount, month) {
    const chart = AmCharts.makeChart("chartdiv", {
        "type": "serial",
        "theme": "light",
        "dataProvider": [{
            "month": monthToText(month[4]),
            "visits": amount[4]
        }, {
            "month": monthToText(month[3]),
            "visits": amount[3]
        }, {
            "month": monthToText(month[2]),
            "visits": amount[2]
        }, {
            "month": monthToText(month[1]),
            "visits": amount[1]
        }, {
            "month": monthToText(month[0]),
            "visits": amount[0]
        }],
        "valueAxes": [{
            "gridColor": "#FFFFFF",
            "gridAlpha": 0.2,
            "dashLength": 0
        }],
        "gridAboveGraphs": true,
        "startDuration": 1,
        "graphs": [{
            "balloonText": "[[category]]: <b>[[value]]</b>",
            "fillAlphas": 0.8,
            "lineAlpha": 0.2,
            "type": "column",
            "valueField": "visits"
        }],
        "chartCursor": {
            "categoryBalloonEnabled": false,
            "cursorAlpha": 0,
            "zoomable": false
        },
        "categoryField": "month",
        "categoryAxis": {
            "gridPosition": "start",
            "gridAlpha": 0,
            "tickPosition": "start",
            "tickLength": 20
        },
        "export": {
            "enabled": false
        }
    });
}

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