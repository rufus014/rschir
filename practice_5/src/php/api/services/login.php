<?php

    if (!isset($_SERVER['PHP_AUTH_USER'])) {
        header('WWW-Authenticate: Basic realm="My Realm"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Текст, отправляемый в том случае,
        если пользователь нажал кнопку Cancel';
        exit;
    }



    session_start();

    $redis = new Redis();
    $redis->connect('redis', 6379);
    
    $redis_data = json_decode($redis->get($_SERVER['PHP_AUTH_USER']));

    if (!$redis_data) {
        $default_data = [
            "language" => 'ru',
            "theme" => 'light',
            'name' => '',
        ];

        $default_data_redis = json_encode($default_data);

        $redis->set($_SERVER['PHP_AUTH_USER'], $default_data_redis);

        $redis_data = json_decode($default_data_redis);
    }

    $_SESSION['language'] = $redis_data->language;
    $_SESSION['theme'] = $redis_data->theme;
    $_SESSION['name'] = $redis_data->name;
?>
