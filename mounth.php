<?php

class mounth
{
    public function mounth_aver(array $day)
    {
        //Собираем массив $result_mounth
        //Массив содержит среднее скользящее температуры по месяцам
        $mounth = ['.12.', '.11.', '.10.', '.09.', '.08.', '.07.', '.06.', '.05.', '.04.', '.03.', '.02.', '.01.'];
        $mounth_sum = 0;
        $key = -1;
        $number = 0;
        foreach ($mounth as $moun) {
            $key += 1;
            foreach ($day as $res) {
                if (strpos($res['data'], $moun) !== false){
                    $number += 1;
                    $mounth_sum += $res['value'];
                }
            }
            $result_mounth[$key] = [
                'data' => $moun,
                'value' => $mounth_sum / $number,
            ];
            $mounth_sum = 0;
            $number = 0;
        }
        return $result_mounth;
    }         
}

