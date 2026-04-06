<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Mật khẩu đăng nhập admin (chỉ dùng khi dev / trước khi có Auth đầy đủ)
    |--------------------------------------------------------------------------
    |
    | Đặt trong file .env: ADMIN_PASSWORD=mật_khẩu_mạnh
    | Không commit .env. Trên production nên chuyển sang User + Auth.
    |
    */
    'password' => env('ADMIN_PASSWORD', ''),

];
