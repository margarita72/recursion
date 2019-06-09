<!DOCTYPE html >
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Рекурсии</title>
    <link href="css/stylesheet.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <script>
        function getdetails(){
            var name = $('#name').val();
            var sort = $('#sort').val();
            var checked = [];
            $(':checkbox:checked').each(function () {
                checked.push($(this).val());
            });
            $.ajax({
                type: "POST",
                url: "calculation.php",
                data: {fname:name,fsort:sort,checked:checked}
            }).done(function( result )
            {
                $("#msg").html(result);
            });
        }
    </script
</head>

<body>
<div id="top_bar_black">
    <div id="logo_container">
        <div id="logo_image"> </div>
        <div id="nav_block">
            <div class="nav_button">УУУУУУУ</div>
            <div class="nav_button">ФФФФФФФ</div>

        </div>
    </div>
</div>
<div id="content_container">

    <h2>вывод отчетов методом рекурсий</h2>
    <div >
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

                /*функция по выводу всех значений чассива значений через рекурсию вложенного списка*/
                function filters($arr1){
                    foreach ($arr1 as $key_of_element => $value_of_element) {
                        if (is_array($value_of_element)) {


                            echo "<label><input type=\"checkbox\">".$key_of_element."</label>";
                            echo "<fieldset><legend></legend>";
                            filters($value_of_element);
                            echo "</fieldset>";

                        }
                        else{
                            echo "<label><input id='input' value='$value_of_element' type=\"checkbox\" name=\"input[]\">".$value_of_element."</label>";

                        }

                    }


                }
                echo "<div id='form' name=\"Tree1\" class=\"treeHTML\" class=\"razvernut\">";
                //echo '<ul>';
                filters($filter);
                //echo '</ul>';
                echo "</div>";
                ?>


                <script>
                    var t = document.getElementById("form");
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
                <input type="text" size="40" id="name" name="name">
            </div>
            <div><br>
                цена
                <select id="sort" name="sort">
                    <option value="1">по возрастанию</option>
                    <option value="2">По убыванию</option>
                </select>
            </div><br>

            <button onClick = "getdetails()" id="calculation" name="calculation" >Рассчитать</button>



        </div>
    </div>

    <div id="msg"></div>




</div>



<div id="bottom_bar_black"> <div id="main_container">
        <div id="header_lower">  <div id="header_content_lowerline">Контакты
                <div id="header_content_lowerboxcontent">Тут какой-то текст<br />
                    впварвв<br />
                    впрапрп<br />
                    вправрапрап <BR />
                    ыварвпараор<br />
                    парпарпра<br />
                    01982 698 621<BR />
                </div>
            </div>
        </div>

        <div id="header_lower">  <div id="header_content_lowerline">ВАПИРТь
                <div id="header_content_lowerboxcontent">Укпвпрваопроар т вгпвгшп в  нпвнгш вагшп  вг вгш впгшв гвшгшгшггпгп п пгш гшпв г гвпрвг ш вгшпг вгп в</div>
            </div>
        </div>


    </div>
</div>


</body>
</html>



