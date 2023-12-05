<?php

class Auth
{
    public static function attempt($username, $password): bool
    {
        $users = User::all()->where('username', $username)->fetch();

        if (count($users) == 1) {
            $user = $users[0];
            if (password_verify($password, $user->password)) {
                Session::set('logged', true);
                session::set('user_id', $user->user_id);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }    

    public static function logout(): void
    {
        if (Session::has('logged')) {
            Session::unset('logged');
        }

        if (Session::has('user_id')) {
            Session::unset('user_id');
        }
    }

    public static function check(): bool
    {
        if (Session::has('logged')) {
            return true;
        } else {
            return false;
        }
    }

    public static function user(): object | bool
    {
        if (self::check()) {
            $user_id = Session::get('user_id');
            $user = User::get($user_id);
            return $user;
        } else {
            return false;
        }
    }

    public static function isAdmin(): bool
    {
        if (self::check() && self::user()->is_admin == 1) {
            return true;
        } else {
            return false;
        }
    }
}
