<?php

class day
{
    public function day_aver(array $info)
    {
        //Вспомогательные переменные для последующих вычислений
        $day = $info['day'];
        $value = $info['value'];
        $r = -1;
        $v = 0;
        $value_sum = 0;
        
        //Запускаем два цикла foreach
        foreach ($day as $d) {
            $r += 1;
            foreach ($value as $val) {
                if (strpos($val['data'], $d) !== false){
                    $value_sum += $val['value'];
                    $v += 1;
                }
            }
            
            //Собираем массив $result
            //Массив содержит все даты 2021 года
            //Массив содержит все средние значения температуры для каждого числа
            $value_sum = $value_sum / $v;
            $result[$r] = [
                    'data'  => $d,
                    'value' => $value_sum,
                ];
            
            //Обнуляем вспомогательные переменные
            $value_sum = 0;
            $v = 0;
        }
        return $result;
    }
}

