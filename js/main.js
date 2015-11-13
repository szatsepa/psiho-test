function reload_image(){

	obj = document.getElementById('im_captcha');

	currentTime = new Date();
	curimgid = currentTime.getTime();

	// записуємо час в змінну imgid
	// цей трюк ми використовуємо для того, щоб браузер не кешував картинку

  	obj.src = 'captcha.php?imgid=' + curimgid;
}

function go(){
    document.location = '/welcome/cab/';
}
$(document).ready(function(){
    if(cid > 0){
        setTimeout(go,500);
    }
    $("#login").css({'font-size':'0.8em'});
    $("input#reg").mousedown(function(){
       document.location = '/registration' ;
    });
    $("a#forget").mousedown(function(){
        $("div#minde").css({'display':'block'});
    });
     $('#em').blur(function() {
        if($(this).val() !== '') {
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
    
    
});


