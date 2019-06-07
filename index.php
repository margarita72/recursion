<!DOCTYPE html >
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Рекурсии</title>
    <link href="css/stylesheet.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="top_bar_black">
    <div id="logo_container">
        <div id="logo_image"> </div>
        <div id="nav_block">
            <div class="nav_button">Home </div>
            <div class="nav_button"> Contact</div>
            <div class="nav_button"> About</div>
            <div class="nav_button"> Links</div>
            <div class="nav_button"> Services </div>
        </div>
    </div>
</div>
<div id="content_container">

    <h2>вывод отчетов методом рекурсий</h2>
    <?php


    $myArray = array(
        array(
            0 => "0 title",
            1 => "Alfred Hitchcock",
            2 => 1954
        ),
        array(
            0 => "1 title",
            1 => "Stanley Kubrick",
            2 => 1987
        ),
        array(
            0 => "2 title",
            1 => "Martin Scorsese",
            2 => 1973
        ),
        array(
            0 => "3 title",
            1 => "Stanley Kubrick",
            2 => 1987
        )
    );




    function has_child1($arr){

        echo '<table><tr>';

        foreach ($arr as $el) {


            if (is_array($el)) {
                $a ='<tr><th>Employee</th><th>Salary</th><th>Salary</th></tr>';
                echo $a;


                has_child1($el);

            }
            else
                echo '<td>'.$el.'</td>';


        }
        echo '</tr></table>';

    }





    ?>
    <?php
    has_child1($myArray);
    ?>
</div>



<div id="bottom_bar_black"> <div id="main_container">
        <div id="header_lower">  <div id="header_content_lowerline">Contact
                <div id="header_content_lowerboxcontent">148 Blackways Street<br />
                    Hargary<br />
                    Lingvillage<br />
                    HG43 9HA <BR />
                    info@domainhappy.com<br />
                    www.domainhappy.com<br />
                    01982 698 621<BR />
                </div>
            </div>
        </div>

        <div id="header_lower">  <div id="header_content_lowerline">Clients
                <div id="header_content_lowerboxcontent">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est </div>
            </div>
        </div>


    </div>
</div>


</body>
</html>



