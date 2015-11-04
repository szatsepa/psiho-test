<?php
        var_dump($data);
        echo "<br/>";
        var_dump($_SESSION);
        echo "<br/>";
        var_dump($_COOKIE);
//        $firstname = $data[0]['firstname'];
?>
<h1>Welcome!&nbsp;<?php echo "{$data[0]['firstname']}&nbsp;{$data[0]['surname']}"; ?></h1>
<div align=center>
    
</div>
<script language="javascript" type="text/javascript" src="/js/welcome.js"></script>