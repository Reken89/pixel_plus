<?php

class view
{
    public $table = "table.php";
    
    public function view_table(array $day, array $week, array $mounth)
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/pixel_plus/$this->table";
    }
}

