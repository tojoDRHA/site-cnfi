<?php


function truncate1($text, $chars = 120) {
    if(strlen($text) > $chars) {
        $text = $text.' ';
        $text = substr($text, 0, $chars);
        $text = substr($text, 0, strrpos($text ,' '));
        $text = $text.'...';
    }
    return $text;
}
