<?php
if (!function_exists('formatPrice')) {
    function formatPrice($price)
    {
        if ($price >= 1000000) {
            return number_format($price / 1000000, 1) . 'tr';
        }
        return number_format($price) . 'đ';
    }
}
