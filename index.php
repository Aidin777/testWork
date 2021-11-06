<?php
include_once ('config.php');
include_once ('model/MYSQLI.php');

//автозагрузка
function __autoload($classname) {
    include_once ("classes/$classname.php");
}


if($_POST['add_fruit']){
    if($_POST['fruitName'] != '' and $_POST['weight'] !=''){
        Fruit::addFruit($_POST['fruitName'], $_POST['weight']);
    }
}

?>





<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Тестовое задание</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="content">

    <?php
        $data = new Fruit();
        $all_data = $data->showFruit();
        $fruit150 = $data->showFruitMore150();
    ?>

    <h2>Таблица со всеми фруктами</h2>
<table class="table table-dark">
    <tr>
        <th>id</th>
        <th>Фрукт</th>
        <th>Вес</th>
    </tr>
    <?php
        foreach ($all_data as $fruit){
            ?>
                <tr>
                    <th><?=$fruit['id'] ?></th>
                    <th><?=$fruit['name'] ?></th>
                    <th><?=$fruit['weight'] ?></th>
                </tr>
            <?
        }
    ?>
</table>



<form action="#" method="post">
    <input type="text" placeholder="фрукт" name="fruitName">
    <input type="text" placeholder="вес" name="weight">
    <input type="submit" name="add_fruit" value="Добавить фрукт">
</form>

    <h2>Таблица с фруктами, весом от 150</h2>
    <table class="table table-dark">
        <tr>
            <th>id</th>
            <th>Фрукт</th>
            <th>Вес</th>
        </tr>
        <?php
        foreach ($fruit150 as $fruit){
            ?>
            <tr>
                <th><?=$fruit['id'] ?></th>
                <th><?=$fruit['name'] ?></th>
                <th><?=$fruit['weight'] ?></th>
            </tr>
            <?
        }
        ?>
    </table>

    <?php
    $data_book = new Book();
    $all_books = $data_book->showAllBooksWithAuthorName();


    ?>

    <h2>Список книг с их авторами</h2>
    <table class="table table-dark">
        <tr>
            <th>id</th>
            <th>Название книги</th>
            <th>Автор</th>
        </tr>
        <?php
        foreach ($all_books as $book){
            ?>
            <tr>
                <th><?=$book['id'] ?></th>
                <th><?=$book['book_title'] ?></th>
                <th><?=$book['author_name'] ?></th>
            </tr>
            <?
        }
        ?>
    </table>

    <?php
    $data_author = new Author();
    $author_list = $data_author->showAuthorWithListBooks();


    ?>

    <h2>Список авторов с количеством книг</h2>
    <table class="table table-dark">
        <tr>
            <th>id</th>
            <th>Автор</th>
            <th>Количество книг</th>
        </tr>
        <?php
        foreach ($author_list as $author){
            ?>
            <tr>
                <th><?=$author['id'] ?></th>
                <th><?=$author['author_name'] ?></th>
                <th><?=$author['COUNT(book.id)'] ?></th>
            </tr>
            <?
        }
        ?>
    </table>
</div>
</body>
</html>
