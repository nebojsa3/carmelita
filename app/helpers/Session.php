<?php

class Session
{
    public static function has(string $key): bool
    {
    if (isset($_SESSION[$key])) {
        return true;
    } else {
        return false;
    }
    }

    public static function set(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function get(string $key): mixed
    {
        if (isset($_SESSION[$key])) {
            $value = $_SESSION[$key];
            return $value;
        }

        return false;
    }

    public static function unset(string $key): void
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }
}
