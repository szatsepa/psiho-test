$(document).ready(function(){
    
    $("table#tcab").css({'width':'90%'});
    $("table#tcab tbody tr td").css({'border':'1px solid grey'});
    $("table#tcab tbody tr").find("td:eq(2)").css({'text-align':'center'});
    $("a.ico-edit").live('click',function(){
        var obj = $(this).parent().parent();
        var nm = $(this).parent().parent().find("td:eq(0)").attr('id');
        var str = $(obj).find("td:eq(1)").text();
        $(obj).find("td:eq(1)").empty().html("<input class='change' name='"+nm+"' type='text' value='"+str+"' autofocus/>");
        $(this).removeClass("ico-edit").addClass("ico-done").attr({'title':'изменить'});
        
    });
    $("a.ico-done").live('click',function(){
        var obj = $(this).parent().parent();
        var nm = $(this).parent().parent().find("td:eq(0)").attr('id');
        var data  = $(this).parent().parent().find("td:eq(1) input").val();
        var data_obj = new Object();
        data_obj['data'] = data;
        data_obj['field'] = nm;
        data_obj['cid'] = cid;
//        alert(nm+"\n"+data+"\n"+cid);
        $.ajax({
                asinc:false,
                url:'/ajax/cab',
                type:'post',
                responce:'text',                
                data:data_obj,
                success:function(responce){ 
                    document.location.reload();
                } 
            });
    });
});


