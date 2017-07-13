$(document).ready(function () {

    $('#mn1').addClass('current');
    $('#mn2').removeClass('current');
    $('#mn3').removeClass('current');
    $('#mn4').removeClass('current');

    $('.extras-slider').cycle({
        fx: 'fade',
        speed: '600',
        timeout: 4000
    });

    $('.testi-slider').cycle({
        fx: 'fade',
        speed: '600',
        timeout: 0,
        next: '#next2',
        prev: '#prev2'
    });

    $(".carousel1").jCarouselLite({
        btnNext: ".next1",
        btnPrev: ".prev1",
        easing: "swing", //efecto debe cargarse la libreria easing
        vertical: true,
        auto: 4000,
        speed: 500,
        visible: 3, //cantidad de items visibles
        scroll: 1,
        mouseWheel: true //se mueve con la rueda del mouse, debe cargarse la libreria mouseweel
    });

    $(".carousel2").jCarouselLite({
        btnNext: ".next2",
        btnPrev: ".prev2",
        easing: "swing", //efecto debe cargarse la libreria easing
        vertical: true,
        auto: 3000,
        speed: 500,
        visible: 3, //cantidad de items visibles
        scroll: 1,
        mouseWheel: true //se mueve con la rueda del mouse, debe cargarse la libreria mouseweel
    });

    $(".carousel3").jCarouselLite({
        btnNext: ".next3",
        btnPrev: ".prev3",
        easing: "swing", //efecto debe cargarse la libreria easing
        vertical: true,
        auto: 5000,
        speed: 500,
        visible: 3, //cantidad de items visibles
        scroll: 1,
        mouseWheel: true //se mueve con la rueda del mouse, debe cargarse la libreria mouseweel
    });

});

function CheckEmailFormat(email) {
    var regex = new RegExp('^[a-z0-9A-Z._%+-]+@[a-z0-9A-Z._%+-]+\.[A-Za-z]{2,4}$');
    return $.trim(email).match(regex);
}

function InsertRegisterInfo() {
    var self = this;

    self.name = ko.observable(_name);
    self.email = ko.observable(_email);

    self.fcName = ko.observable(false);
    self.fcEmail = ko.observable(false);
    self.btnRegister = ko.observable(true);

    self.Register = function() {
        if ($.trim(self.name()) == '') {
            $.msgBox({
                title: "Thông báo",
                content: "Họ tên của bạn không được bỏ trống",
                type: "error"
            });

            self.fcName(true);
            return;
        }

        if ($.trim(self.email()) == '') {
            $.msgBox({
                title: "Thông báo",
                content: "Email của bạn không được bỏ trống",
                type: "error"
            });

            self.fcName(true);
            return;
        }

        if (CheckEmailFormat($.trim(self.email())) == null) {
            $.msgBox({
                title: "Thông báo",
                content: "Email của bạn không đúng định dạng",
                type: "error"
            });
            self.fcEmail(true);
            return;
        }

        self.btnRegister(false);
        $.post("/PageSaleNew/InsertRegisterInfo", { name: $.trim(self.name()), email: $.trim(self.email()) }, function (data) {
            self.btnRegister(true);

            if (data == -3) {
                $.msgBox({
                    title: "Thông báo",
                    content: "Họ tên của bạn không đúng định dạng",
                    type: "error"
                });
                return;
            }

            if (data == -2) {
                $.msgBox({
                    title: "Thông báo",
                    content: "Email của bạn không đúng định dạng",
                    type: "error"
                });
                return;
            }

            if (data == -1) {
                $.msgBox({
                    title: "Thông báo",
                    content: "Email này đã được dùng để đăng ký",
                    type: "error"
                });
                return;
            }

            $.msgBox({
                title: "Thông báo",
                content: "Cảm ơn bạn đã đăng ký để nhận thông tin tư vấn của chúng tôi!",
                type: "info"
            });

            return;
        });

    };

}

ko.applyBindings(new InsertRegisterInfo());