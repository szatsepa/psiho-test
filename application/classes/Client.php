<?php

class Client{
    
    var $client = array();
    
    var $registration = NULL;
    
    function __construct() {
        session_register("client");
        setlocale(LC_ALL, 'ru_RU.utf8');        
        mysql_connect(LINKDB,PASSW, "") or die ("Ошибка");
        mysql_select_db(DB);
        mysql_query ("SET NAMES utf8");

        if (mysql_errno() <> 0){ exit("Ошибка");}
    }
    
    function getData($login,$psw){
        
        $query = "SELECT `id`, `email`, `phone`, `created` FROM `clients` WHERE `login` = '{$login}' AND `password` = '{$psw}'";
        
        $result = mysql_query($query);
        
        if(!$result){
            $_SESSION['client'] = NULL;
            $this -> registration = 1;
        }else{
            while ($row = mysql_fetch_assoc($result)) {
                $this->client = $row;
            }
            $_SESSION['client'] = $this->client;
        }
        return;
    }
    function setData($login,$psw,$email,$phone) {
        
    }
}

