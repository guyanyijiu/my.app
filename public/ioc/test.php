<?php
/**
 * Created by PhpStorm.
 * User: liuchao
 * Date: 2017/1/18
 * Time: 下午4:28
 */

//class Sword{
//    public $name;
//    public function __construct($name){
//        $this->name = $name;
//    }
//}
//
//
//
//class Hero{
//    private $weapon;
//    public function __construct(){
//        $this->weapon = new Sword('倚天剑');
//        echo $this->weapon->name;
//    }
//}
//
//$hero = new Hero();
//var_dump($hero);

interface I_weapon{
    public function __construct($name);
    public function attack();

}

class Sword implements I_weapon{
    public $name;
    public function __construct($name = '倚天剑'){
        $this->name = $name;
    }
    public function attack(){
        echo '唰唰~';
    }
}

class Gun implements I_weapon{
    public $name;
    public function __construct($name = 'BB枪'){
        $this->name = $name;
    }
    public function attack(){
        echo '砰砰~';
    }
}


class Hero{
    public $public;
    protected $protected;
    private $weapon;
    public function __construct(Gun $weapon){
        $this->weapon = $weapon;
        $this->weapon->attack();
    }
    public function attack(){
        echo $this->weapon->attack();
    }
}

class Ioc_container{
    private static $generator_list = [];
    public static function bind($class_name, $generator){
        if(is_callable($generator)){
            self::$generator_list[$class_name] = $generator;
        }else{
            throw new Exception('对象生成器不是可调用结构');
        }
    }
    public static function make($class_name, $params = []){
        if(isset(self::$generator_list[$class_name])){
            return call_user_func_array(self::$generator_list[$class_name], $params);
        }else{
            throw new Exception('该类未绑定注册');
        }
    }
}

Ioc_container::bind('Sword', function ($name = '倚天剑'){
   return new Sword($name);
});
Ioc_container::bind('Gun', function($name = 'BB枪'){
   return new Gun($name);
});

//Ioc_container::bind('Hero', function ($module, $params = []){
//    return new Hero(Ioc_container::make($module, $params));
//});



//$weapon0 = Ioc_container::make('Sword' ,['独孤九剑']);
//$weapon0->attack();

//$hero = Ioc_container::make('Hero', ['Gun', ['BB枪']]);

//$weapon1 = new Gun('BB枪');
////$hero0 = new Hero($weapon0);
//$hero1 = new Hero($weapon1);
