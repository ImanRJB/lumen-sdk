<?php

return [
    'secret' => env('INTERNAL_SECRET'),
    'remote_authorization' => env('REMOTE_AUTHORIZATION', true),

    'auth_endpoint' => env('AUTH_ENDPOINT'),
];
