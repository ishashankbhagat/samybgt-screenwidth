<?php

if (! function_exists('screenwidth_get')) {
    /**
     * Appends the configured backpack prefix and returns
     * the URL using the standard Laravel helpers.
     *
     * @param $path
     * @return string
     */
    function screenwidth_get()
    {
        $screenwidth = Session::get('screenWidth');
        return $screenwidth;
    }
}