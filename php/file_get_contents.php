<?php

file_get_contents('php://input');

$context = stream_context_create([
    'http' => [
        'timeout' => 5,
        'follow_location' => 0,
        'ignore_errors' => true,
        'method' => 'POST', 'content' => 'x=1&y=2',
        'proxy' => 'tcp://test.com:3128', 'request_fulluri' => true,
        'user_agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2227.0 Safari/537.36',
        'header'  => "Authorization: Basic " . base64_encode('login:password'),
        //'header' => 'Content-Type: application/json',
        //'header' => 'Content-Type: Content-type: text/plain',
    ]
]);

file_get_contents('http://test.com', null, $context, null, 100000);

get_headers("http://test.com", 1);

$http_response_header;

