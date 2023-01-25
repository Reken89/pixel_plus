<?php

require_once 'help.php';
require_once 'day.php';
require_once 'week.php';
require_once 'mounth.php';
require_once 'view.php';

//Определим тип загружаемого файла
$type = $_FILES['file_file']['type'];

//Если файл действительно CSV, выполняем загрузку файла на сервер
if ($type == 'text/csv'){ 
    //Загружаем файл на сервер (Для безопасности, выполняем загрузку не в корень проета!)
    $goal = copy($_FILES['file_file']['tmp_name'],$_SERVER['DOCUMENT_ROOT']."/pixel_plus/csv/".basename($_FILES['file_file']['name']));

    //Записываем в переменную file путь до csv файла
    $file = $_SERVER['DOCUMENT_ROOT']."/pixel_plus/csv/".$_FILES['file_file']['name'];
        
    //Получаем из csv файла нужную информацию
    $info = new calculate();
    $info = $info->read($file);

    //Получаем список дней и среднее значение температуры для каждого дня
    $day = new day();
    $day = $day->day_aver($info);

    //Получаем среднее значение температуры по неделям
    $week = new week();
    $week = $week->week_aver($day);

    //Получаем среднее значение температуры по месяцам
    $mounth = new mounth();
    $mounth = $mounth->mounth_aver($day);

    //Подгружаем шаблон отрисовки таблички
    $view = new view();
    $view->view_table($day, $week, $mounth);
       
}else{
    echo "Формат файла отличается от CSV";    
}

