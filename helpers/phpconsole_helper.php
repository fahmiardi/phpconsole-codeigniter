<?php

function phpconsole_init() {
    $CI =& get_instance();

    if(!$CI->phpconsole->is_initialized()) {
        $CI->phpconsole->set_backtrace_depth(1);

        /*
        ==============================================
        USER'S SETTINGS
        ==============================================
        */

        $CI->phpconsole->set_domain('.your-domain.com');  // don't forget to use leading dot, like so: .your-domain.com
        $CI->phpconsole->add_user('nickname', 'user_api_key', 'project_api_key'); // you can add more developers, just execute another add_user()

    }
}

function phpconsole($data_sent, $user = false) {
    phpconsole_init();

    $CI =& get_instance();
    return $CI->phpconsole->send($data_sent, $user);
}

function phpcounter($number = 1, $user = false) {
    phpconsole_init();

    $CI =& get_instance();
    $CI->phpconsole->count($number, $user);
}

function phpconsole_cookie($name) {
    phpconsole_init();

    $CI =& get_instance();
    $CI->phpconsole->set_user_cookie($name);
}

function phpconsole_destroy_cookie($name) {
    phpconsole_init();

    $CI =& get_instance();
    $CI->phpconsole->destroy_user_cookie($name);
}

/*
Shorthand functions for lazy developers (author included)
*/

function p($data_sent, $user = false) {
    phpconsole_init();

    $CI =& get_instance();
    return $CI->phpconsole->send($data_sent, $user);
}

function pc($number = 1, $user = false) {
    phpconsole_init();

    $CI =& get_instance();
    $CI->phpconsole->count($number, $user);
}
