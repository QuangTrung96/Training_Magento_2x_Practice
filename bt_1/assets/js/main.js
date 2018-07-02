requirejs.config({
    paths: {
        'jquery': 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min',
        'mobile-menu': './mobile-menu',
        'scroll-top': './scroll-top'
    }
});

// mobile-menu cần load cho tất cả các trang
var mods = ['mobile-menu'];

function getPageHeight() {
    // hàm lấy độ cao thực của trang
    var body = document.body;
    var html = document.documentElement;

    return Math.max(body.scrollHeight, body.offsetHeight,
                    html.clientHeight, html.scrollHeight, html.offsetHeight);
}

if (getPageHeight() > window.innerHeight * 2) {
    // chỉ load scroll-top cho trang có độ cao đủ lớn
    mods.push('scroll-top');
}

requirejs(mods);
