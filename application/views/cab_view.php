<?php
        var_dump($data);
        echo "<br/>";
//        var_dump($_SESSION);
//        echo "<br/>";
//        var_dump($_COOKIE);
//        echo "<br/>";
//        var_dump($_SERVER);
//        $firstname = $data[0]['firstname'];
?>
<script type="text/javascript"> var cid = <?php echo "{$_COOKIE['CID']}"; ?></script>
<h1>Welcome!&nbsp;<?php echo "{$data[0]['firstname']}&nbsp;{$data[0]['surname']}"; ?></h1>
<br/><br/>
<table id="all" style="width: 100%;border: 0px solid #fff">
    <tbody>
        <tr>
            <td>
                <table id="tcab">
                    <tbody>
                        <?php
                        $row = 0;
                        $foto = $data[0]['foto'];
                        unset($data[0]['foto']);
                        $cell = array("firstname"=>'Имя',"surname"=>'Фамилия',"email"=>'Емейл',"phone"=>'Телефон',"created"=>'Зарегистрирован',"country"=>'Страна',"region"=>'Область',"city"=>'Город',"street"=>'Адрес',"born"=>'Дата рождения');
                        foreach ($data[0] as $key => $value) {
                            if($row < 5 ){
                                echo "<tr><td id='{$key}'>{$cell[$key]}</td><td>{$value}</td><td></td></tr>";
                            }else{
                                echo "<td id='{$key}'>{$cell[$key]}</td><td>{$value}</td><td><a class='ico-edit' title='редактировать'></a></td></tr>";
                            }
                            $row++;
                        }
                        ?>
                        <tr>
                            <td colspan="4" align="center">
                                <input type="button" id="send" value="Изменить" disabled=""/>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </td>
            <td>
                <p style="text-align: center"><img src="/images/private/6.png" width="" alt="foto"/></p>
                <p style="text-align: center"><input type="button" id="foto" value="Изменить"/></p>
            </td>
        </tr>
    </tbody>
</table>


<script language="javascript" type="text/javascript" src="/js/cab.js"></script>