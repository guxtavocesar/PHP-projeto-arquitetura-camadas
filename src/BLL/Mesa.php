<?php

namespace BLL;

require_once(ROOT.'/src/DAL/Mesa.php');
require_once(ROOT.'/src/Model/Mesa.php');

class Mesa{

    public function selectById($idMesa)
    {
        $dalMesa = new \DAL\Mesa();
        return $dalMesa->selectById($idMesa);
    }
}