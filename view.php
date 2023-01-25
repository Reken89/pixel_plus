<?php

class view
{
    public $table = "table.php";
    
    public function render(string $table, array $day, array $week, array $mounth)
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/pixel/$table";
    }
    
    public function view_table(array $day, array $week, array $mounth)
    {
        $this->render($this->table, $day, $week, $mounth);        
    }
}

