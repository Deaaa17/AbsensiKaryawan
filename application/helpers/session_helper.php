<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('checkLogin')) {
    function checkLogin($role_id = '')
    {
        if ($role_id == null || $role_id == '') {
            redirect('auth');
        }
    }
}
