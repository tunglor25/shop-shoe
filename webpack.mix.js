const mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/js").postCss(
    "resources/css/app.css",
    "public/css",
    [
        // Thêm PostCSS plugins nếu cần
    ]
);

mix.postCss("resources/css/styleCard.css", "public/css").version(); // (Tùy chọn) Thêm versioning để tránh cache
