<?php
        var_dump($data);
        echo "<br/>";
        var_dump($_SESSION);
        echo "<br/>";
        var_dump($_COOKIE);
//        echo "<br/>";
//        var_dump($_SERVER);
//        $firstname = $data[0]['firstname'];
?>
<h1>Welcome!&nbsp;<?php echo "{$data[0]['firstname']}&nbsp;{$data[0]['surname']}"; ?></h1>
<br/><br/>
    <table id="tcab">
        <tbody>
            <?php
            $row = 0;
            $foto = $data[0]['foto'];
            unset($data[0]['foto']);
            $cell = array("firstname"=>'Имя',"surname"=>'Фамилия',"email"=>'Емейл',"phone"=>'Телефон',"created"=>'Зарегистрирован',"country"=>'Страна',"region"=>'Область',"city"=>'Город',"street"=>'Адрес',"born"=>'Дата рождения');
            foreach ($data[0] as $key => $value) {
                if($row > 1)$row=0;
                if($row === 0 ){
                    echo "<tr><td>{$cell[$key]}</td><td>{$value}</td>";
                }else{
                    echo "<td>{$cell[$key]}</td><td>{$value}</td></tr>";
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

<script language="javascript" type="text/javascript" src="/js/cab.js"></script>