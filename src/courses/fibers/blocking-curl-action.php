<?php

/**
 * This is a basic synchronous (blocking) CURL call.
 */

$requestId = $argv[1];
$url = 'https://ghibliapi.herokuapp.com/people/' . $requestId; // The target URL uses a sleep to simulate network latency.

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch); // CURL is executed in blocking mode, on purpose, for the example.

echo ($data);

if(curl_error($ch)) {
    throw new \RuntimeException('CURL ERROR: ' . curl_error($ch));
}

exec("touch response_{$requestId}.txt"); // When the request has succeeded, we create an empty file, we will see that later.
file_put_contents("response_{$requestId}.txt", $data);



curl_close($ch);