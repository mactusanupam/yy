<?php

return [

    'driver' => env('MAIL_DRIVER', 'smtp'),
    'host' => env('MAIL_HOST', 'smtp.mactus.in'),
    'port' => env('MAIL_PORT', 587),
    'from' => ['address' => 'jayson.pappachan@mactus.in', 'name' => 'jayson'],
    'encryption' => env('MAIL_ENCRYPTION', 'tls'),
    'username' => env('MAIL_USERNAME','jayson.pappachan@mactus.in'),
    'password' => env('MAIL_PASSWORD','Mactus#2016'),
    'sendmail' => '/usr/sbin/sendmail -bs',
    'pretend' => false

];