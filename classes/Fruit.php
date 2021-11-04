<?php


class Fruit
{
    public $name;
    public $weight;

    public function __construct(){

    }

    public static function addFruit($name, $weight){
        //Подключение к бд
        $mysqli = M_MYSQLI::Instance();

        //запрос на добавление
        $query = "INSERT INTO `fruit` (`id`,`name`, `weight`) VALUES (NULL, '$name', '$weight')";
        $mysqli->Insert($query);
    }

    public function showFruitMore150(){

        $mysqli = M_MYSQLI::Instance();
        //Подкдючение к БД
        $query = "SELECT * FROM fruit where weight >= 150";
        $data = $mysqli->Select($query);
        return $data;
    }


    public function showFruit(){
        $mysqli = M_MYSQLI::Instance();
        //Подкдючение к БД
        $query = "SELECT * FROM fruit";
        $data = $mysqli->Select($query);
        return $data;
    }

}