<?php

use Swoole\Http\Server;

$server = new Swoole\Http\Server('0.0.0.0', 8080/*, SWOOLE_BASE*/);
$server->set([
    'worker_num' => 3, //'reactor_num' => 4,
    //'max_connection' => 5000,
    'max_request' => 0,
    //'backlog' => 512,
    'heartbeat_check_interval' => 1000,
    'heartbeat_idle_time' => 1000,
    'open_tcp_keepalive' => 1,
    'http_parse_post' => false,
    //'tcp_defer_accept' => 5,
    //'enable_port_reuse' => true,
    'open_tcp_nodelay' => true,
    //'tcp_defer_accept' => 0,
    //'enable_delay_receive' => true,
    'task_worker_num' => 4,
    'enable_reuse_port' => true,
    'task_max_request' => 0,
    'tcp_fastopen' => true,
    'open_cpu_affinity' => 1,
    'open_so_linger' => 0,
    'opn_tcp_quickack' => 1,
    //'task_tmpdir' => '/dev/shm/',
    //'dispatch_func' => 'my_dispatch_function',
    //'dispatch_mode' => 5,
]);

/*$server->set(array(
    'dispatch_func' => function ($server, $fd, $type, $data) {
        if ($data) {
            var_export($type);

            //var_dump($fd, $type, $data);
            //return intval($data[0]);
        }
    },
));*/

$server->on('Task', function (swoole_server $server, $task_id, $from_id, $data) {

    //$server->finish($data);
    return '';
});

$server->on('Finish', function (swoole_server $serv, $task_id, $data) {
    //echo "Task#$task_id finished, data_len=".strlen($data).PHP_EOL;
});

$server->on('WorkerStart', function ($server, $worker_id) {
    if ($server->taskworker) {
        if ($server->worker_id == $server->setting['worker_num']) {

        }
    } else {

    }
});

$server->on('pipeMessage', function ($server, $src_worker_id, $data) {

});

/*$server->on('Connect', function($request, $response) use ($server) {

    var_export($server->connections);
});*/

$server->on('Request', function ($request, $response) use ($server) {
    $request->fd;
    $server->connections;

    $request_uri = $request->server['request_uri'];
    $method = $request->server['request_method'];

    $response->header('Content-Type', 'application/json; charset=UTF-8');

    $keepAlive = $method == 'GET' && isset($request->header['connection']) && $request->header['connection'] == 'keep-alive';
    $response->header('Connection', $keepAlive ? 'keep-alive' : 'close');

    //$response->status($code);
    $response->end('');
});

$server->start();
