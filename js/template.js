$(document).ready(function(){
    $("#m_menu tbody tr td a").mousedown(function(){
            var str = this.id;
//            alert(str);
            
            if(str === 'exit'){
                if(confirm("Действительно выйти?")){
                    document.location.href = "http://"+document.location.hostname+"/logout.php";
                }
            }
            else
            {
                
                document.location = "";
            }
            
            
        });
});


