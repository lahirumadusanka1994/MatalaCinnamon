<?php


class StringHelper
{
    public static function safeString(string $str){
        $str = htmlspecialchars($str, ENT_QUOTES);
        $str = filter_var($str, FILTER_SANITIZE_STRING);
        return $str;
    }
}