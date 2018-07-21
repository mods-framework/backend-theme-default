import $ from 'jquery';

$(document).ready(function() {

    $('.show-hide-sidebar-toggle').on('click', function(e) {
        if (!$('body').hasClass('hide-side-nav')) {
            $('body').removeClass('show-side-nav').addClass('hide-side-nav');
        } else if (!$('body').hasClass('show-side-nav')) {
            $('body').removeClass('hide-side-nav').addClass('show-side-nav');
        }
        e.preventDefault();
    });

    $('.show-hide-sidebar-toggle-sm').on('click', function(e) {
        if (!$('body').hasClass('side-menu-left-opened')) {
            $('body').removeClass('side-menu-left-closed').addClass('side-menu-left-opened');
        } else if (!$('body').hasClass('side-menu-left-closed')) {
            $('body').removeClass('side-menu-left-opened').addClass('side-menu-left-closed');
        }
        e.preventDefault();
    });


    $('.side-nav li.has-sub').each(function() {
        var parent = $(this),
            clickLink = parent.find('>span'),
            subMenu = parent.find('>ul');

        clickLink.click(function() {
            if (parent.hasClass('opened')) {
                parent.removeClass('opened');
                subMenu.slideUp();
                subMenu.find('.opened').removeClass('opened');
            } else {
                if (clickLink.parents('.side-nav-sub').length == 1) {
                    $('.side-nav .opened').removeClass('opened').find('ul').slideUp();
                }
                parent.addClass('opened');
                subMenu.slideDown();
            }
        });
    });

});