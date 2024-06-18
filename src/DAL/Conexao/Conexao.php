<?php

namespace DAL\Conexao;

use PDO;

abstract class Conexao {

    private static $dbNome = 'cafeteria';
    private static $dbHost = 'localhost';
    private static $dbUsuario = 'root';
    private static $dbSenha = '';
    private static $cont = null;

    public static function conectar()
    {
        if(!self::$cont){

            try{
                self::$cont = new PDO("mysql:host=".self::$dbHost.";dbname=".self::$dbNome,     self::$dbUsuario, self::$dbSenha);
            }   
            catch(\PDOException $exception){

                die($exception->getMessage());
            }
        }

        return self::$cont;
    }

    public static function desconectar()
    {
        self::$cont = null;

        return self::$cont;
    }
}