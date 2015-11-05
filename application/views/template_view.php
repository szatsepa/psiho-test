<?php 
if(isset($_SESSION['CID'])){
    setcookie('CID', $_SESSION['CID'],  time()+86400);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"  xml:lang="ru">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>PSIHO_TEST</title>
                <link rel="shortcut icon" href="/design/favicon.gif" type="image/gif"/>
		<link rel="stylesheet" type="text/css" href="/css/style.css" />
                <link rel="stylesheet" type="text/css" href="/css/mystyle.css" />
                <link rel="stylesheet" type="text/css" href="/css/main.css" />
                <link rel="stylesheet" type="text/css" media="print" href="/css/print_element.css" />
                <style type="text/css">
                    @import "/css/jquery.datepick.css";
                    /* Or use these for a ThemeRoller theme instead
                    @import "themes16/southstreet/ui.all.css";
                    @import "css/ui-southstreet.datepick.css";
                    */
                    
                    @media print { -webkit-print-color-adjust: exact; }
                
                </style>
		<script src="/js/jquery-1.8.0.min.js" type="text/javascript"></script>
<!--                <script type="text/javascript" src="/js/main_menu.js"></script>-->

	</head>
	<body>
		
<div id="d_wrapper">
    <div id="head">
        <h3 id="ttl">"PSIHO_TEST"&nbsp;</h3>

    </div>
    <?php
//    print_r($_COOKIE);
//    echo "<br/>";
//    print_r($_SESSION);
    ?>
    <div id="main_menu">
        <table id="m_menu">
           
            <tbody>
                <tr>
                    <td><a class="menu_btn" id="staff"></a></td>
                    <td><a class="menu_btn" id="pay"></a></td>
                    <td><a class="menu_btn" id="produce"></a></td>
                    <td><a class="menu_btn" id="siona"></a></td>
                    <td><a class="menu_btn" id="sale"></a></td>
                    <td><a class="menu_btn" id="order"></a></td>
                    <td><a class="menu_btn" id="math"></a></td>
                    <td><a class="menu_btn" id="exit">Выйти</a></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div   id="aside">
         <?php
//             require_once 'sub_menu.php';
//             new SubMenu($controller_name);
         ?>
    </div>
</div>

<div id="d_wr">    
    <div id="content">
        <?php include 'application/views/'.$content_view; ?>         
    </div> 
</div>
		<div id="footer">
			<a href="/">ARCADY&copy; 2015</a>
		</div>
            <script type="text/javascript" src="/js/template.js"></script>
	</body>
    
</html>
