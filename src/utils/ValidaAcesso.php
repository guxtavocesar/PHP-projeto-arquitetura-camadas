<?php 

namespace Utils;

abstract class ValidaAcesso {

    public static function validarAcesso()
    {
        if(!isset($_SESSION['user'])) header('location: '.HOST.'/login');
    }
}