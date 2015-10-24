<?php
	
        var_dump($_SESSION);
?>
<h1>Welcome!</h1>
<!--<p align="center">
<img src="images/PI.jpg" width="640" alt="Добро пожаловать!">
</p>-->
<div align=center>
 <?php
 if(!isset($_SESSION['CID'])){
 
 ?>
 <?=$msg;?>
 <form action="#" method="post">
     <p>Введіть логин: <input type="text" name="nick" placeholder="login" required value="" style="text-align:center" autofocus/></p>
        <p>Введіть пароль: <input type="password" name="psw" value="" required style="text-align:center"/></p>
	<p>Введіть код, який ви бачите на картинці: <input type="text" name="secretcode" value="" maxlength=4 style="width:45px; text-align:center"></p>

	<table width="325" border="0" cellspacing="0" cellpadding="5">
	  <tr>
		<td><img id="im_captcha" src='captcha.php?imgid=<?=doubleval(microtime());?>' width="110" height="36" vspace="5"></td>
		<td valign="middle" width="18"><img id="im_load" src="design/loading.gif" width="18" height="18" alt=""></td>
		<td><a href="#" onClick="reload_image();" id="login" title="Оновити картинку">Оновити картинку</a></td>
	  </tr>
	</table>

        <p><input type="submit" value="Авторизоватся">&nbsp;&nbsp;&nbsp;<input type="button" id="reg" value="Зарегистрироватся"></p>
 </form>
    <?php
 }else{
     ?>
    <script language="javascript" type="text/javascript">
        var cid = <?php echo $_SESSION['CID'];?>;
    </script>   
    <?php
 }
 ?>
    
</div>
<script language="javascript" type="text/javascript" src="/js/main.js"></script>
<?php
//unset($_SESSION["secret_number"]);
?>