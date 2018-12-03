<?php

function get_db_config()
{
//    getenv 取得系统环境变量的值
    if (getenv('IS_IN_HEROKU')) {
        //parse_url解析url，返回关联数组
        $url = parse_url(getenv("DATABASE_URL"));

        return $db_config = [
            'connection' => 'pgsql',
            'host' => $url["host"],
            'database' => substr($url["path"], 1),
            'username' => $url["user"],
            'password' => $url["pass"],
        ];
    } else {
        return $db_config = [
            'connection' => env('DB_CONNECTION', 'mysql'),
            'host' => env('DB_HOST', 'localhost'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
        ];
    }
}