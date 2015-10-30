
function reload_image(){

	obj = document.getElementById('im_captcha');

	currentTime = new Date();
	curimgid = currentTime.getTime();

	// записуємо час в змінну imgid
	// цей трюк ми використовуємо для того, щоб браузер не кешував картинку

  	obj.src = 'captcha.php?imgid=' + curimgid;
}
$(document).ready(function(){
    
    $("#login").css({'font-size':'0.8em'});
    $("#content table tr td").css({'border':'0'});
    
    $('#email').blur(function() {
        if($(this).val() != '') {
            var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
            if(pattern.test($(this).val())){
                $(this).css({'border' : '1px solid #569b44'});
//                $('#valid').text('Верно');
            } else {
                $(this).css({'border' : '1px solid #ff0000'});
                alert('Не верно прописан адрес!');
            }
        } else {
            $(this).css({'border' : '1px solid #ff0000'});
//            $('#valid').text('Поле email не должно быть пустым');
        }
    });
    
    $("#psw").keyup(function(){
        
        var count = $(this).val();
        
        if(count.length < 6){
            $(this).css({'border' : '1px solid #ff0000'});
        }else if(count.length > 5 && count.length < 9){
           $(this).css({'border' : '1px solid #0000ff'}); 
        }else{
           $(this).css({'border' : '1px solid #00ff00'}); 
        }
        
    });
    
     $("#psw2").keyup(function(){
//        alert($("#psw").val());
        var count = $(this).val();
        var string = $("#psw").val();
        var len = count.length;
        var sstr = string.substr(0,len);
//        alert(string);
       if(count === sstr){
           $(this).css({'border' : '1px solid #00ff00'});
       } else{
           $(this).css({'border' : '1px solid #ff0000'});
       }
       
    });
    
    $('#psw2').blur(function() {
        var count = $(this).val();
        var string = $("#psw").val();
        var len = count.length;
        var sstr = string.substr(0,len);
        
        if(count !== sstr){
           alert('Пароли не совпадают!');
           $(this).css({'border' : '1px solid #ff0000'});
       }
    });
    
    $("input#nick").blur(function(){
        var nick = $(this).val();
        $.ajax({
                asinc:false,
                url:'/ajax/checkL',
                type:'post',
                responce:'text',
                data:{'nick':nick},
                success:function(response){ 
                    var out = parseInt(response);
//                    alert(out);
                    if(out === 1){
                        $("input#nick").val('').focus();
                        $("p#msg").text('Такой логин уже зарегистрирован! Измените');
//                        alert();
                    }else{
                        $("p#msg").text('');
                    }
                } 
            });
    });
});


