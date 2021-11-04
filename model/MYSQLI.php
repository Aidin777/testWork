<?php


class M_MYSQLI
{
    private static $instance;

    //Получение экземпляра класса MSQLI
    public static function Instance()
    {
        if (self::$instance == null)
            self::$instance = new M_MYSQLI();

        return self::$instance;
    }

    public function connect_to_db()
    {
        setlocale(LC_ALL, 'ru_RU.UTF-8');
        $conn_db = mysqli_connect(MYSQLI_SERVER, MYSQLI_USER, MYSQLI_PASSWORD, MYSQLI_DB) or die('No connect with data base');
        mysqli_set_charset($conn_db, 'utf-8');

        return $conn_db;
    }

    public function disconnect($conn_to)
    {
        mysqli_close($conn_to);
    }

    public function Select($query)
    {
        $conn_db1 = $this->connect_to_db();

        $result = mysqli_query($conn_db1, $query);

        if (!$result) die(mysqli_error($conn_db1));

        while ($row = mysqli_fetch_assoc($result)) {
            $arr[] = $row;
        }

        $this->disconnect($conn_db1);
        return $arr;
    }

    public function Insert($query)
    {
        $conn_db1 = $this->connect_to_db();

        $result = mysqli_query($conn_db1, $query);

        if (!$result) die(mysqli_error($conn_db1));

        $this->disconnect($conn_db1);
    }
    
}