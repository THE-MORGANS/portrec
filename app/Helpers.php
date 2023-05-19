<?php

if (!function_exists('auth_user')) {
    /**
     * @return Authenticatable|User
     */
    function auth_user()
    {
        return auth()->user();
    }
}
