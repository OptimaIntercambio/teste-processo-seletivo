(function (win, doc){
    'use strict';


    // Deletar
    function confirmar(event){
        event.preventDefault();
        console.log(event.target.parentNode.href);

        let token = doc.getElementsByName("_token")[0].value;
        
        let url = doc.getElementById("url").innerHTML;
        
        if(confirm("Desja apagar?")){
            console.log("Apagou. " + event.target.parentNode.href);
            let ajax=new XMLHttpRequest();
            ajax.open("DELETE", event.target.parentNode.href);
            ajax.setRequestHeader('X-CSRF-TOKEN', token);
            ajax.onreadystatechange=function(){
                if(ajax.readyState === 4 && ajax.status === 200){
                    console.log("Tudo certo.");
                    win.location.href=url;
                }
            }
            ajax.send();
        }else
            return false;
            

    }

    if(doc.querySelector('.deletar')){
        let btn=doc.querySelectorAll('.deletar');
        for(let i=0; i < btn.length; i++){
            btn[i].addEventListener('click', confirmar, false);
        }
    }

})(window, document);