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

    <div class="otch">
        <div>
            Комплектация
            <!--Тут должен быть список древовидный-->
            <?php
            $filter = array(
                "MERCEDES-BENZ"=>array(
                    "A-CLASS (W168)"=>array(
                        "MERCEDES-BENZ A-CLASS (W168) A 140 (168.031, 168.131)",
                        "MERCEDES-BENZ A-CLASS (W168) A 140 (168.031, 168.131)",
                        "MERCEDES-BENZ A-CLASS (W168) A 160 (168.033, 168.133) "
                    ),
                    "A-CLASS (W169)",
                    "A-CLASS (W176)",
                    "B-CLASS (W245)",
                    "C-CLASS (W202)",
                    "B-CLASS (W246, W242)",
                    "C-CLASS (W202)",
                    "C-CLASS (W203)",
                    "C-CLASS (W204)",
                    "C-CLASS (W205)",
                    "C-CLASS T-Model (S203)",
                    "E-CLASS (W124)"=>array(
                        "MERCEDES-BENZ E-CLASS (W124) E 200 (124.019)",
                        "MERCEDES-BENZ E-CLASS (W124) E 200 D (124.120)",
                        "MERCEDES-BENZ E-CLASS (W124) E 220 (124.022)",
                        "MERCEDES-BENZ E-CLASS (W124) E 250 D (124.126, 124.129)",
                        "MERCEDES-BENZ E-CLASS (W124) E 250 Turbo-D (124.128)",

                    ),



                ),
                "AUDI"=>array(
                    "100 (4A, C4)"=>array(
                        "AUDI 100 (4A, C4) 2.0 ",
                        "AUDI 100 (4A, C4) 2.0 E ",
                        "AUDI 100 (4A, C4) 2.0 E",
                        "AUDI 100 (4A, C4) 2.0 E 16V"),
                    "A4 Avant (8E5, B6) ",
                    "A5 (8T3)"
                ),
                "GAZ"=>array(
                    "GAZELLE автобус ",
                    "GAZELLE фургон ",
                    "VOLGA универсал (3102)"),
                "BMW",

            );
            function filters($arr1){
                foreach ($arr1 as $key_of_element => $value_of_element) {
                    if (is_array($value_of_element)) {


                        echo "<label><input type=\"checkbox\">".$key_of_element."</label>";
                        echo "<fieldset><legend></legend>";
                        filters($value_of_element);
                        echo "</fieldset>";

                    }
                    else{
                        echo "<label><input type=\"checkbox\">".$value_of_element."</label>";

                    }

                }


            }
            echo "<form name=\"Tree1\" class=\"treeHTML\" class=\"razvernut\">";

            //echo '<ul>';
            filters($filter);
            //echo '</ul>';
            echo "</form>";
            ?>
            <style>
                .treeHTML { /* вся форма */
                    line-height: normal;
                }
                .treeHTML label { /* пункты и соединяющие их линии */
                    position: relative;
                    display: block;
                    padding: 0 0 0 1.2em;
                }
                .treeHTML label:not(:nth-last-of-type(1)) {
                    border-left: 1px solid #94a5bd;
                }
                .treeHTML label:before {
                    content: "";
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 1.1em;
                    height: .5em;
                    border-bottom: 1px solid #94a5bd;
                }
                .treeHTML label:nth-last-of-type(1):before {
                    border-left: 1px solid #94a5bd;
                }
                .treeHTML fieldset,
                .treeHTML fieldset[class=""] .razvernut { /* списки */
                    position: absolute;
                    visibility: hidden;
                    margin: 0;
                    padding: 0 0 0 2em;
                    border: none;
                }
                .treeHTML fieldset:not(:last-child) {
                    border-left: 1px solid #94a5bd;
                }
                .treeHTML .razvernut {
                    position: relative;
                    visibility: visible;
                }
                .treeHTML > fieldset > legend,
                .treeHTML .razvernut > fieldset > legend { /* плюс */
                    position: absolute;
                    left: -5px;
                    top: 0;
                    height: 7px;
                    width: 7px;
                    margin-top: -1em;
                    padding: 0;
                    border: 1px solid #94a5bd;
                    border-radius: 2px;
                    background-repeat: no-repeat;
                    background-position: 50% 50%;
                    background-color: #fff;
                    background-image: linear-gradient(to left, #1b4964, #1b4964), linear-gradient(#1b4964, #1b4964), linear-gradient(315deg, #a0b6d8, #e8f3ff 60%, #fff 60%);
                    background-size: 1px 5px, 5px 1px, 100% 100%;
                    visibility: visible;
                    cursor: pointer;
                }
                .treeHTML fieldset[class=""] .razvernut fieldset legend {
                    visibility: hidden;
                }
                .treeHTML .razvernut > legend { /* минус */
                    background-image: linear-gradient(#1b4964, #1b4964) !important;
                    background-size: 5px 1px !important;
                }
            </style>
            <script>
                var t = document.forms.Tree1;
                [].forEach.call(t.querySelectorAll('fieldset'), function(eFieldset) {
                    var main = [].filter.call(t.querySelectorAll('[type="checkbox"]'), function(element) {return element.parentNode.nextElementSibling == eFieldset;});
                    main.forEach(function(eMain) {
                        var l = [].filter.call(eFieldset.querySelectorAll('legend'), function(e) {return e.parentNode == eFieldset;});
                        l.forEach(function(eL) {
                            var all = eFieldset.querySelectorAll('[type="checkbox"]');
                            eL.onclick = Razvernut;
                            eFieldset.onchange = Razvernut;
                            function Razvernut() {
                                var allChecked = eFieldset.querySelectorAll('[type="checkbox"]:checked').length;
                                eMain.checked = allChecked == all.length;
                                eMain.indeterminate = allChecked > 0 && allChecked < all.length;
                                if (eMain.indeterminate || eMain.checked || ((eFieldset.className == '') && (allChecked == "0"))) {
                                    eFieldset.className = 'razvernut';
                                } else {
                                    eFieldset.className = '';
                                }
                            }
                            eMain.onclick = function() {
                                for(var i=0; i<all.length; i++)
                                    all[i].checked = this.checked;
                                if (this.checked) {
                                    eFieldset.className = 'razvernut';
                                } else {
                                    eFieldset.className = '';
                                }
                            }
                        });
                    });
                });
            </script>

        </div>
        <div><br>
            Наименование
            <input type="text" size="40">
        </div>
        <div><br>
            цена
            <select>
                <option>по возрастанию</option>
                <option>По убыванию</option>
            </select>
        </div><br>
        <button>Рассчитать</button>
    </div>

    <?php


    $myArray = array(
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




    function has_child1($arr){

        echo '<tr>';

        foreach ($arr as $el) {


            if (is_array($el)) {

                has_child1($el);

            }
            else
                echo '<td>'.$el.'</td>';


        }
        echo '</tr>';

    }





    ?>
    <table>
        <tr><th>id</th><th>Наименование</th><th>Комплектация</th><th>Кол-во</th><th>Цена</th></tr>
        <?php
        has_child1($myArray);
        ?>
    </table>

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



