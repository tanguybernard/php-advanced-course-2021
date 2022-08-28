<?php

class RawExecutionWithoutWaitingForResult
{
    public function execute(string $file, string $requestId): void
    {
        Fiber::suspend();

        // We do not wait for the output, otherwise it would be blocking.
        exec('php ' . __DIR__ . "/{$file}.php $requestId > /dev/null 2>&1 &");

        // Check if finished, else suspend itself
        while (!file_exists("response_{$requestId}.txt")) {
            Fiber::suspend(); // Otherwise we block the thread, anf Fiber becomes useless.
        }

        echo PHP_EOL . "Request with id #$requestId is finished";


        //or blocking
        //echo $this->block($requestId);

    }


    public function block($requestId){
        $url = 'https://ghibliapi.herokuapp.com/people/' . $requestId; // The target URL uses a sleep to simulate network latency.

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch); // CURL is executed in blocking mode, on purpose, for the example.


        if(curl_error($ch)) {
            throw new \RuntimeException('CURL ERROR: ' . curl_error($ch));
        }
        curl_close($ch);

        return $data;
    }

}