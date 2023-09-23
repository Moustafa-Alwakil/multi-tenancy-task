<?php

if (!function_exists('isTenant')) {
    function isTenant(): bool
    {
        return app()->bound('tenant');
    }
}

if (!function_exists('tenant')) {
    function tenant()
    {
        return isTenant() ? app('tenant') : null;
    }
}

