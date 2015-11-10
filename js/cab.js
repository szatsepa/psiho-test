$(document).ready(function(){
    
    $("table#tcab").css({'width':'60%'});
    $("table#tcab tbody tr td").css({'border':'1px solid grey'});
    $("table#tcab tbody tr").find("td:eq(2)").css({'text-align':'center'});
    $("a.ico-edit").live('click',function(){
        var obj = $(this).parent().parent();
        var nm = $(this).parent().parent().find("td:eq(0)").attr('id');
        var str = $(obj).find("td:eq(1)").text();
        $(obj).find("td:eq(1)").empty().html("<input class='change' name='"+nm+"' type='text' value='"+str+"' autofocus/>");
        
    });
});


