<?php
// include_once "../config/connection.php";



try{
//Pokretanje Excel aplikacije

include "get_menu_items.php";

    $excel = new COM("Excel.Application");
    $excel->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $excel->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Da bi se fizički videlo otvaranje fajla
$excel->Visible = 1;

// recommend to set to 0, disables alerts like "Do you want MS Word to be the default .. etc"
$excel->DisplayAlerts = 1;

// Otvaranje Excel fajla
$workbook = $excel->Workbooks->Open("http://localhost/catering/models/menu_items.xlsx") or die('Did not open filename');

// Otvaranje Sheet
$sheet = $workbook->Worksheets('Sheet1');
$sheet->activate;

$br = 1;
foreach($result as $menu){
    // U A kolonu upisujemo ID
    $polje = $sheet->Range("A{$br}");
    $polje->activate;
    $polje->value = $menu->menuID;

    // U B kolonu upisujemo TITLE
    $polje = $sheet->Range("B{$br}");
    $polje->activate;
    $polje->value = $menu->name;

    // U C kolonu upisujemo DESCRIPTION
    $polje = $sheet->Range("C{$br}");
    $polje->activate;
    $polje->value = $menu->price;

    // U D kolonu upisujemo TRAILER
    $polje = $sheet->Range("D{$br}");
    $polje->activate;
    $polje->value = $menu->categoryID;

   

    $br++;
}


// Cuvanje promena u fajla
$workbook->_SaveAs("http://localhost/catering/models/menu_items.xlsx", -4143);
$workbook->Save();

// Zatvaranje Excel fajla
$workbook->Saved=true;
$workbook->Close;

$excel->Workbooks->Close();
$excel->Quit();

unset($sheet);
unset($workbook);
unset($excel);
header("Location:index.php?page=main_page");

}
catch(COMException $ex){
   echo $ex->getMessage();
}