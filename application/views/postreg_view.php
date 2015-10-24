<?php

var_dump($_SESSION);

 
 ?>
<script type="text/javascript">
    var msg = '<?php echo $data['msg']; ?>';
//    alert(msg);
    if(confirm(msg)){
        document.location = '/registration';
    }else{
//        alert('close');
        window.close();
    }
    </script>
   
<div>
<?php
 if($data["CID"]){
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

