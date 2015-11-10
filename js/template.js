$(document).ready(function(){
    $("#m_menu tbody tr td a").mousedown(function(){
            var str = this.id;
            
            
            if(str === 'exit'){
                if(confirm("Действительно выйти?")){
                    document.location.href = "http://"+document.location.hostname+"/logout.php";
                }
            }
            else
            {
//                alert(str);
                document.location.href = "http://"+document.location.hostname+str;
            }
            
            
        });
});


