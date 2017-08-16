<?php
namespace app\model;
use core\lib\model;

class cMod extends model
{
    public $table ="student";
    public function lists()
    {   
        $ret = $this->select($this->table,'*');
        return $ret;
    }
}
?>