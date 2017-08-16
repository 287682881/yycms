<?php
namespace core;
class action
{
    public static $classMap = array();
    public $assign;
    static public function run()
    {
        \core\lib\log::init();
        \core\lib\log::log('test');
        //p('ok');
        $route = new \core\lib\route();

        $ctrlClass = $route->ctrl;
        $action = $route->action;
        $ctrlfile = MODULE.'/ctrl/'.$ctrlClass.'Ctrl.php';//print_r($ctrlfile);
        $cltrlClass = MODULE.'\ctrl\\'.$ctrlClass.'Ctrl';
        if (is_file($ctrlfile)) {
            include $ctrlfile;
            $ctrl = new $cltrlClass();
            $ctrl->$action();
        }else{
            $ctrlClass = $route->action;
            $ctrlfile = MODULE.'/ctrl/'.$ctrlClass.'Ctrl.php';//print_r($ctrlfile);
            $cltrlClass = MODULE.'\ctrl\\'.$ctrlClass.'Ctrl';
            if (is_file($ctrlfile)) {
                include $ctrlfile;
                $ctrl = new $cltrlClass();
                $ctrl->index();
                \core\lib\log::log("ctrl:".$ctrlClass.PHP_EOL."action:".$action);
            }else{
                throw new \Exception('找不到控制器'.$cltrlClass);
            }
        }
    }
    static public function load($class)
    {
        if(isset($classMap[$class])){
            return true;
        }else{
            $class = str_replace('\\', '/', $class);
            //p($class);echo "string";
            $file = ACTION.$class.'.php';
             // p($file);
            if(is_file($file)){
                include $file;
                self::$classMap[$class]=$class;
            }else{
                return false;
            }
        }
    }

    public function assign($name,$value)
    {
        $this->assign[$name]=$value;
    }
    public function display($file)
    {
        $file = MODULE.'/view/'.$file;
        //p($file);
        if (is_file($file)) {
            @extract($this->assign);
            include $file;
        }
    }
}
