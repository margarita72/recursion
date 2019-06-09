<?php
$myArrays = array(
    array(
        0 => 1,
        1 => "Воздушный фильтр",
        2 => "BMW",
        3 => 15,
        4 => 1000
    ),
    array(
        0 => 2,
        1 => "Воздушный фильтр салона",
        2 => "BMW",
        3 => 15,
        4 => 10500
    ),
    array(
        0 => 3,
        1 => "Клиновой ремень",
        2 => "AUDI A4",
        3 => 15,
        4 => 500
    ),
    array(
        0 => 4,
        1 => "Топливный фильтр",
        2 => "AUDI A3",
        3 => 12,
        4 => 700
    ),
    array(
        0 => 5,
        1 => "Топливный фильтр",
        2 => "BMW",
        3 => 17,
        4 => 100
    ),
    array(
        0 => 6,
        1 => "Топливный фильтр",
        2 => "BMW",
        3 => 17,
        4 => 7000
    )
);
echo $name = $_POST['fname'];
$sort = $_POST['fsort'];
//echo print_r($_POST)['checked'];
//echo $_POST['checked'][1];

/*фильтр array_multisort массива по цене*/
$data_cost=array();
foreach($myArrays as $key=>$arr){
    $data_cost[$key]=$arr[4];
}

if ($sort==1){
    /*сортировка по возрастанию*/
    array_multisort($data_cost, SORT_NUMERIC,  $myArrays);
}else
{
    /*сортировка по убыванию*/
    array_multisort($data_cost, SORT_DESC,  $myArrays);
}

//var_export($myArrays);
echo "<table>";
echo "<tr><th>id</th><th>Наименование</th><th>Комплектация</th><th>Кол-во</th><th>Цена</th></tr>";
mya($myArrays);
echo "</table>";

function mya($arrs){
    $name = $_POST['fname'];
    $checked = ($_POST)['checked'];
    echo '<tr>';
    foreach ($arrs as $key =>$value) {
        if (is_array($value)) {
            /*если комплектация выбранна*/
            if (!empty($checked)){
                foreach ($checked as $values) {
                    /*выбранна атолько комплектация, a наименование пустое*/
                    if ($values==$value[2] and empty($name)){
                        mya($value);
                        //echo 'gcch';
                    }
                    /*выбранно еще и наименоване*/
                    else if ($value[1]==$name and $values==$value[2]){
                        mya($value);
                    }

                }
                //echo 'не пустой ';
            }
            /*если комплектация не выбрана проверить выбрано ли наименование*/
            else
            if ($value[1]==$name ){
                mya($value);
            }
            /*если наименование и комплектация пусты*/
            else if (empty($name) and empty($checked)) mya($value);

        }
        else{
            echo '<td>';
            echo $value;
            //echo "<br>";
            echo '</td>';
        }


    }
    echo '</tr>';
}

?>
