<?php

var_dump($_SESSION);
echo "<br/>";
var_dump($data);
 
 ?>
<script type="text/javascript">
var cid = <?php echo "{$_SESSION['CID']}";?>
    </script>
   
<div>
<?php
 if($data['CID']){
     ?>
    <h3>
        Регистрация прошла успешно!
    </h3>
    <p>
        На указаный Вами почтовый адрес придет ссылка активации, после этого ВЫ получите доступ к ресурсам сайта!<br/>
        Иногда письма отправленые автоматически попадают в папку "СПАМ".
    </p>
    
    <?php
 }
 ?>
</div>
<script language="javascript" type="text/javascript" src="/js/registration.js"></script>

