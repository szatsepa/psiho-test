function reload_image(){

	obj = document.getElementById('im_captcha');

	currentTime = new Date();
	curimgid = currentTime.getTime();

	// записуємо час в змінну imgid
	// цей трюк ми використовуємо для того, щоб браузер не кешував картинку

  	obj.src = 'captcha.php?imgid=' + curimgid;
}
$(document).ready(function(){
//    if(cid){
////        document.location = '/cabinet' ;
//    }
    $("#login").css({'font-size':'0.8em'});
    $("input#reg").mousedown(function(){
       document.location = '/registration' ;
    });
    
});


