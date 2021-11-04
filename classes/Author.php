<?php

class Author
{
    public $authorName;
    public $countBooks;
    public $bookName;


    public function __construct($authorName, $countBooks, $bookName)
    {
        $this->authorName = $authorName;
        $this->countBooks = $countBooks;
        $this->bookName = $bookName;

    }


    public function showAllBooksAuthor($author){
        $mysqli = M_MYSQLI::Instance();
        //Подкдючение к БД
        $query = "SELECT * FROM ";
        $data = $mysqli->Select($query);

        return $data;
    }



}