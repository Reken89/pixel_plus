<?php

//Рисуем табличку
?>
<link rel="stylesheet" href="table.css">
<table class="freeze-table" width="700px">
    <tr>
        <th>Дата</th>
        <th>Среднее за день</th>
        <th>Среднее за неделю</th>
        <th>Среднее за месяц</th>
    </tr>

<?php        
for($t = 0 ; $t < 366 ; $t++){

    echo "<tr>";
    echo "<td>" . $day[$t]['data'] . "</td>";
    echo "<td>" . $day[$t]['value'] . "</td>";
    echo "<td>" . $week[$t]['value'] . "</td>";
    if ($t < 12){
        echo "<td>" . $mounth[$t]['value'] . "</td>";
    } else {
        echo "<td></td>";
    }
    echo "</tr>";
    
}

?>
</table>  
