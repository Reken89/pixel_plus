<?php

class mounth
{
    public function mounth_aver(array $day)
    {
        //Собираем массив $result_mounth
        //Массив содержит среднее скользящее температуры по месяцам
        $mounth = ['.12.', '.11.', '.10.', '.09.', '.08.', '.07.', '.06.', '.05.', '.04.', '.03.', '.02.', '.01.'];
        $mounth_sum = 0;
        $mn = -1;
        $ms = 0;
        foreach ($mounth as $moun) {
            $mn += 1;
            foreach ($day as $res) {
                if (strpos($res['data'], $moun) !== false){
                    $ms += 1;
                    $mounth_sum += $res['value'];
                }
            }
            $result_mounth[$mn] = [
                'data' => $moun,
                'value' => $mounth_sum / $ms,
            ];
            $mounth_sum = 0;
            $ms = 0;
        }
        return $result_mounth;
    }         
}

