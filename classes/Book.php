<?php
class Book{
    public $bookName;
    public $book_id;
    public $author_id;

    public function __construct(){

    }


    public function showAllBooksWithAuthorName(){
        $mysqli = M_MYSQLI::Instance();
        //Подкдючение к БД
        $query = "SELECT books.id, books.book_title, authors.author_name FROM books LEFT JOIN authors ON books.author_id = authors.id";
        $data = $mysqli->Select($query);

        return $data;
    }

}