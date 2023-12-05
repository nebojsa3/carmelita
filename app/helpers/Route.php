<?php

class Route
{
    public static function get(string $path, array $params = []): string
    {
        $url = Config::get('domain') . $path . '/';

    foreach ($params as $key => $value) {
        $url .= $key . '/' . $value . '/';
    }

    return $url;
    }
}
