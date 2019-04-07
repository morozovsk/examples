<?php

use Swoole\Server;
use Swoole\Timer;

$server = new Server('0.0.0.0', 30002, SWOOLE_PROCESS, SWOOLE_SOCK_UDP);

$server->set([
    'worker_num' => 1,
]);

$server->on('Packet', function (Server $server, $data, $addr)
{
    var_export($data);
});

$server->tick(1000, function () {
    echo 1;
});

$id = Timer::tick(1000, function () {
    echo 2;
});

/*$server->on('Timer', function (Server $server, $data, $addr)
{
    echo 3;
});*/

swoole_timer_tick(1000, function() {
    echo 4;
});

$server->on('Start', function (Server $server)
{
    $server->tick(1000, function() {
        echo 5;
    });
});

$server->on('start', function (Server $server)
{
    $server->tick(1000, function() {
        echo 6;
    });
});

$server->on('WorkerStart', function (Server $server)
{
    $server->tick(1000, function() {
        echo 7; //it works
    });
});

$server->start();
