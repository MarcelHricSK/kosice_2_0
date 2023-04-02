// require('./bootstrap')
require('./helpers')

window.getCookie = function getCookie(name) {
    let formattedName = name + "=";
    let ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) === ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) === 0) {
            return c.substring(formattedName.length, c.length);
        }
    }
    return null;
}

window.Modules = {
    Datatable: require('./datatable').default,
    MediaPopup: require('./popups').default
}

document.querySelectorAll('[data-href]').forEach((element) => element.addEventListener('click', (e) => window.location = element.getAttribute('data-href')))

$(document).on('change', 'select.input', function () {
    if($(this).val() == '') {
        $(this).addClass('input--empty')
    } else {
        $(this).removeClass('input--empty')
    }
})

function outsideClickEvent(e) {
    handleOutsideClick(e, '.drawer')
}

function handleOutsideClick(e, selector) {
    const $target = $(e.target);
    if (!$target.closest(selector).length &&
        !$('.overlay').hasClass('hidden')) {
        closeOverlay()
    }
}

function openOverlay() {
    $('.overlay').removeClass('hidden')
    $('.drawer').removeClass('closed')

    $(document).on('click', outsideClickEvent)
}

function closeOverlay() {
    $('.overlay').addClass('hidden')
    $('.drawer').addClass('closed')

    $(document).off('click', outsideClickEvent)
}

$(document).on('click', '[data-action="open_drawer"]', function () {
    openOverlay()
})
