<?php

use App\Core\Enums\CommonEnum;

return [
    'FRONTEND_URL' => env('FRONTEND_URL', 'http://localhost:8080'),
    'FOLDER_NAME_TEMPLATE' => 'template',
    'COOKIE_USER_DATA' => CommonEnum::COOKIE_USER_DATA,
    'ALLOW_GET_DATA_MENU' => true,
    'ALLOW_GET_DATA_INFO' => true,
];
