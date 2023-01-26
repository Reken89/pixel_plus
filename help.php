<?php

class calculate 
{   
    public function read(string $file) 
    {
        $days = [];
        $value = [];
        $key = 0;
        //Для чтения CSV файла использую функцию fgetcsv
        //fgetcsv — Читает строку из файла и производит разбор данных CSV
        if (($handle = fopen($file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $key += 1;

                if ($data[0] !== "" && $data[0] !== NULL){
                    $days[$key] = mb_strimwidth($data[0], 0, 10);
                }

                if ($data[0] !== "" && $data[0] !== NULL && $data[1] !== "" && $data[1] !== NULL){
                    $value[$key] = [
                        'data'  => $data[0],
                        'value' => $data[1],
                    ];
                }
            }
            fclose($handle);
        }

        //Группируем массив по одинаковым значениям
        $days = array_unique($days);
        //Убираем лишнее значение
        unset($days[1]);
        //Сбрасываем ключи
        $days = array_values($days);

        $info = [
            'day' => $days,
            'value' => $value,
        ];

        return $info;        
    }
}

