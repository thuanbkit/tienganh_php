function CheckEmailFormat(email) {
    var regex = new RegExp('^[a-z0-9A-Z._%+-]+@[a-z0-9A-Z._%+-]+\.[A-Za-z]{2,4}$');
    return $.trim(email).match(regex);
}

function isInt(n) {
    return n != "" && !isNaN(n) && Math.round(n) == n;
}

function isFloat(n) {

    return n != "" && !isNaN(n) && Math.round(n) != n;
}

function InviteFriends() {
    FB.ui({
        method: 'apprequests',
        message: 'Mọi người hãy tham gia MXH NH TC Proview.vn, Trường trực tuyến cộng đồng Click2Learn.vn, MXH QuanCafe.vn và nhiều dịch vụ khách của Hệ sinh thái Proview nhé. Yêu các bạn nhiều lắm!'
    });
}

function AutoFormatDigit(obj) {
    var value = $(obj).val().replace(/,/g, '');
    $(obj).val(value.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
}

function SendMessage2Facebook() {
    FB.ui({
        method: 'feed',
        message: 'Hãy chia sẻ thông tin tới bạn bè'
    });
}

(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1&appId=491962750814239";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function GetDateTime(time) {
    if (time === null) {
        return "";
    }

    if ((navigator.userAgent.indexOf("Opera") >= 0 || navigator.userAgent.indexOf("MSIE") >= 0 || navigator.appName == 'Netscape') && time.indexOf("T") > 0) {
        var str = new Array();
        str = time.split('T');

        return str[1].split('.')[0] + " " + str[0].split('-')[2] + "/" + str[0].split('-')[1] + "/" + str[0].split('-')[0];
    }

    var datetime = new Date(+time.replace(/\/Date\((-?\d+)\)\//gi, "$1"));
    //var datetime = new Date(time);
    var h = datetime.getHours() + 7;
    var hour = h < 10 ? "0" + h : h;
    var minute = datetime.getMinutes() < 10 ? "0" + datetime.getMinutes() : datetime.getMinutes();
    var date = datetime.getDate() < 10 ? "0" + datetime.getDate() : datetime.getDate();
    var month = datetime.getMonth() + 1 < 10 ? "0" + (datetime.getMonth() + 1) : datetime.getMonth() + 1;

    var value = (hour - 7) + ":" + minute + " " + date + "/" + month + "/" + datetime.getFullYear();
    return value.replace(/z/gi, '');
}
function DigitFormat(src) {
    return src.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
};


function GetDate(time) {
    if (time === null) {
        return "";
    }

    if (time == "0001-01-01T00:00:00") {
        return "";
    }

    if ((navigator.userAgent.indexOf("Opera") >= 0 || navigator.userAgent.indexOf("MSIE") >= 0 || navigator.appName == 'Netscape') && time.indexOf("T") > 0) {
        var str = new Array();
        str = time.split('T');

        return str[0].split('-')[2] + "/" + str[0].split('-')[1] + "/" + str[0].split('-')[0];
    }

    //time = time.replace('/Date(', '').replace(')/', '');

    //var expDate = new Date(parseInt(time));
    var expDate = new Date(+time.replace(/\/Date\((-?\d+)\)\//gi, "$1"));

    var date = expDate.getDate() < 10 ? "0" + expDate.getDate() : expDate.getDate();
    var month = expDate.getMonth() + 1 < 10 ? "0" + (expDate.getMonth() + 1) : (expDate.getMonth() + 1);

    var datetime = date + "/" + month + "/" + expDate.getFullYear();

    return datetime == "01/00/1" || datetime == "01/00/1753" ? "" : date + "/" + month + "/" + expDate.getFullYear();
}
