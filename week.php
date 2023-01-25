<?php

class week
{
    public function week_aver(array $day) 
    {
        //Собираем массив $result_week
        //Массив содержит среднее скользящее температуры по неделям
        $number = 0;
        for($m = 0 ; $m < 366 ; $m++){
            $number = ($m + 1) / 7;
            
            if (is_int($number) == true){
                $result_week[$m] = [
                    'data' => $day[$m]['data'],
                    'value' => ($day[$m-1]['value'] + $day[$m-2]['value'] + $day[$m-3]['value'] + $day[$m-4]['value'] + $day[$m-5]['value'] + $day[$m-6]['value']) / 6,
                ];
            } else {
                $result_week[$m] = [
                    'data' => $day[$m]['data'],
                    'value' => '-',
                ];
            }
        }
        return $result_week;
    }
}

