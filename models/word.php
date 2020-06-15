<?php 
require_once "../config/connection.php";

$author=$conn->query("SELECT * FROM author")->fetch();

$word=new COM("Word.Application");
$word->Visible = true;
$word->Documents->Add();
$word->Selection->TypeText("Fullname: $author->fullname, $author->universityIndex  \n  University: $author->university  \n City: $author->city \n About me: $author->description");
$word->Documents[1]->SaveAs("Author.doc");
header("Location: ../index.php?page=main_page");