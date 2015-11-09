<?php
@var_dump($data[0]);
echo "<br/>";
@var_dump($_SESSION);
echo "<br/>";
@var_dump($_COOKIE);
?>
<h1>Welcome!&nbsp;<?php echo "{$data[0]['firstname']}&nbsp;{$data[0]['surname']}"; ?></h1>
<div align=center>
    <form action="/welcome/change" method="post">
     <table border="0">
         <tbody>
             <tr>
                 <td>
                   Ваше имя:   
                 </td>
                 <td>
                     <input type="text" name="firstname" value="<?php echo "{$data[0]['firstname']}";?>"  readonly=""/>
                 </td>
             </tr>
             <tr>
                 <td>
                   Ваша фамилия:   
                 </td>
                 <td>
                     <input type="text" name="surname" readonly="" value="<?php echo "{$data[0]['surname']}";?>" />
                 </td>
             </tr>
             <tr>
                 <td>
                   Введите логин:   
                 </td>
                 <td>
                     <input type="text" id="nick" name="nick" placeholder="login" required value="" autofocus=""/>
                   <br/>
                   <p id="msg" style="color: red;font-size: 0.6em"></p>
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
                     <input id="email" type="text" value="<?php echo "{$data[0]['email']}";?>" readonly="" /> 
                 </td>
             </tr>
             <tr>
                 <td>
                     Номер вашего телефона:
                 </td>
                 <td>
                     <input type="text" value="<?php echo "{$data[0]['phone']}";?>" readonly=""/> 
                 </td>
             </tr>
                         
             <tr>
                 
                 <td colspan="2">
                      <p align="center"><input id='send' type="submit" value="Отправить"></p>
                 </td>
             </tr>
         </tbody>
     </table>      
 </form>
</div>
<script language="javascript" type="text/javascript" src="/js/welcome.js"></script>