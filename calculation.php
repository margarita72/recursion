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
        4 => 700
    )
);
$name = $_POST['fname'];
has_childfg($myArrays);
function has_childfg($arr){
    $name = $_POST['fname'];
    //echo '<tr>';
    foreach ($arr as $el) {
        if (is_array($el)) {
            has_childfg($el);
        }
        else if ($el==$name){
            //echo '<td>';
            echo $el;
            //    echo '</td>';
        }



    }
    //echo '</tr>';
}

?>
