$(document).ready(function(){
    
    $("table#tcab").css({'width':'80%'});
    $("table#tcab tbody tr td").css({'border':'1px solid grey'});
    $("table#tcab tbody tr").find("td:eq(1)").mousedown(function(){
        var str = $(this).text();
        $(this).text('');
        $(this).append("<input type='text' class='change' value='"+str+"' autofocus/>");
    }).css({'cursor':'pointer'});
    $("table#tcab tbody tr").find("td:eq(3)").mousedown(function(){
        var str = $(this).text();
        $(this).text('');
        $(this).append("<input class='change' value='"+str+"' autofocus/>");
    }).css({'cursor':'pointer'});
    $("input.change").live('change',function(){
        alert("PYZDETS");
        $("input#send").attr({'disabled':false});
    });
});


