<?php
/**
 * Created by PhpStorm.
 * User: liuchao
 * Date: 2017/1/19
 * Time: 上午9:52
 */

require 'test.php';

//Reflection::export( new ReflectionExtension('reflection') );

$reflection = new ReflectionClass('Hero');

var_dump($reflection);

//Reflection::export($reflection);

$properties = $reflection->getProperties(ReflectionProperty::IS_PRIVATE | ReflectionProperty::IS_PUBLIC);
var_dump($properties);

$methods = $reflection->getMethods();
var_dump($methods);

$constructor = $reflection->getConstructor();
//var_dump($constructor);
//Reflection::export($constructor);
$params = $constructor->getParameters();
var_dump($params);

foreach($params as $param){
    $type = $param->getClass()->getName();
    var_dump($type);
    $paramters[] = Ioc_container::make($type);
}

//$paramters[0]->attack();

$hero = $reflection->newInstanceArgs($paramters);

var_dump($hero);
$hero->attack();