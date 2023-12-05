<?php

abstract class Controller
{
    public static function view(string $view, $data = null, $message = null): void
    {
        require_once 'app/views/' . $view . '.php';
    }

    public static function adminView(string $view, $data = null, $message = null): void
    {
        require_once 'app/views/admin/' . $view . '.php';
    }
}
