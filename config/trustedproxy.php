<?php

use Symfony\Component\HttpFoundation\Request;

return [
    // Доверяем всем прокси (например, Railway, Vercel и т.д.)
    'proxies' => '*',

    // Используем Symfony константы
    'headers' => Request::HEADER_X_FORWARDED_FOR
                | Request::HEADER_X_FORWARDED_HOST
                | Request::HEADER_X_FORWARDED_PORT
                | Request::HEADER_X_FORWARDED_PROTO
                | Request::HEADER_X_FORWARDED_PREFIX,
];
