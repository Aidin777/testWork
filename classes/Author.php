<?php

class Author
{
    public $authorName;
    public $author_id;


    public function __construct()
    {

    }


    public function showAuthorWithListBooks(){
        $mysqli = M_MYSQLI::Instance();
        $query = "SELECT author.id, author.author_name, COUNT(book.id) FROM authors2 as author
                JOIN books2 as book
                ON author.id = book.author_id
                GROUP BY author.id";

        $data = $mysqli->Select($query);
        return $data;
    }


}