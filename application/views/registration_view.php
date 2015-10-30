<?php
	

        var_dump($data["CID"]);
?>
<h1>Welcome!</h1>
 <audio autoplay>
    <!--<source src="media/woods2.wav" type="audio/ogg; codecs=vorbis">-->
  </audio>
<!--<p align="center">
<img src="images/PI.jpg" width="640" alt="Добро пожаловать!">
</p>-->
<div align=center>
 <?php
 if(!isset($_SESSION['CID'])){
 
 ?>
 <?=$msg;?>
 <form action="/registration/reg/" method="post">
     <table border="0">
         <tbody>
             <tr>
                 <td>
                   Введите логин:   
                 </td>
                 <td>
                   <input type="text" name="nick" placeholder="login" required value=""  autofocus/>  
                 </td>
             </tr>
             <tr>
                 <td>
                     Введите пароль(латиницей):
                 </td>
                 <td>
                    <input id="psw" type="password" name="psw" value="" required /> 
                 </td>
             </tr>
             <tr>
                 <td>
                    Повторите пароль:  
                 </td>
                 <td>
                    <input id="psw2" type="password" name="psw2" value="" required /> 
                 </td>
             </tr>
             <tr>
                 <td>
                    Ваш EMail(электронная почта): 
                 </td>
                 <td>
                    <input id="email" type="text" name="email" value="" placeholder="email" required /> 
                 </td>
             </tr>
             <tr>
                 <td>
                     Номер вашего телефона:
                 </td>
                 <td>
                    <input type="text" name="phone" value="" placeholder="phone" required /> 
                 </td>
             </tr>
             <tr>
                 <td colspan="2">
                     <table width="325" border="0" cellspacing="0" cellpadding="5">
                          <tr>
                                <td><img id="im_captcha" src='captcha.php?imgid=<?=doubleval(microtime());?>' width="110" height="36" vspace="5"></td>
                                <td valign="middle" width="18"><img id="im_load" src="design/loading.gif" width="18" height="18" alt=""></td>
                                <td><a href="#" onClick="reload_image();" id="login" title="Оновити картинку">Обновить картинку</a></td>
                          </tr>
                    </table>
                 </td>
             </tr>
             <tr>
                 <td colspan="2">
                     <p>Введите код, который видите на картинке: <input type="text" name="secretcode" value="" maxlength=4 style="width:45px; text-align:center"></p>
                 </td>
             </tr>
             <tr>
                 
                 <td colspan="2">
                      <p align="center"><input type="submit" value="Отправить"></p>
                 </td>
             </tr>
         </tbody>
     </table>      
 </form>
    <?php
 }
 ?>
    
</div>
<script language="javascript" type="text/javascript" src="/js/registration.js"></script>
