$(document).ready(function () {
    /*var url = window.location.href;

    $('#mn2').bind('mouseover', function () {
        $('#mn2').addClass('current');
    });
    $('#mn2').bind('mouseout', function () {
        if (url.indexOf('/hoi-dap') != -1) {
            return;
        }
        else {
            $('#mn2').removeClass('current');
        }
    });

    $('#mn3').bind('mouseover', function () {
        $('#mn3').addClass('current');
    });
    $('#mn3').bind('mouseout', function () {
        if (url.indexOf('/kinh-nghiem-thi') != -1) {
            return;
        }
        else {
            $('#mn3').removeClass('current');
        }
    });*/

    var pull = $('#pull');
    menu = $('nav ul');
    menuHeight = menu.height();

    $(pull).on('click', function (e) {
        e.preventDefault();
        menu.slideToggle();
    });

    $(window).resize(function () {
        var w = $(window).width();
        if (w > 480 && menu.is(':hidden')) {
            menu.removeAttr('style');
        }
    });
    
    var nav = $('.hifix');

    //$(window).scroll(function () {
    //    if ($(this).scrollTop() > 40) {
    //        nav.addClass("f-nav");
    //    } else {
    //        nav.removeClass("f-nav");
    //    }
    //});
    BindDD();
});

function Support() {
    $('#form-support').show();
}

function HideSupport() {
    $('#form-support').hide();
}

function ShowF() {
    $("#nav-bar").toggle();
}

function BindDD() {
    $(document).bind('click', function (e) {
        var $clicked = $(e.target);
        if (!$clicked.parents().hasClass("left"))
            $("#nav-bar").hide();
    });
}

function Weblink() {
    window.location.href = $('#social-op').val() == '-1' ? '/' : $('#social-op').val() + '';
}