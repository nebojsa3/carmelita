<?php

class Redirect
{
    public static function to(string $route, array $params = [])//: void
    {
        $url = Config::get('domain') . $route . '/';

        if (count($params) > 0) {
            foreach ($params as $key => $value) {
                $url .= $key . '/' . $value . '/';
            }
        }

        header('Location: ' . $url);
        exit;
    }    

    public static function withInput(array $input): object
    {
        Session::set('oldInput', $input);
        return new self();
    }

    public static function withSuccess($message): object
    {
        Session::set('message', ['type' => 'success', 'text' => $message]);
        return new self();
    }

    public static function withError($message): object
    {
        Session::set('message', ['type' => 'error', 'text' => $message]);
        return new self();
    }

}
