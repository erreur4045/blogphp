<?php

//Comment::test();

function chagerclass($class){
    require 'models/'.$class.'.php';
}

spl_autoload_register('chagerclass');

$test = new Comment();
$test->test();