(function (win, doc) {
    'use strict';
    
    //deletar
    function confirmDel(event)
    {
        event.preventDefault();
        //console.log(event.target.parentNode.href);
        let token = doc.getElementsByName("_token")[0].value;
        if (confirm("Deseja apagar?")) {
            let ajax = new XMLHttpRequest();
            ajax.open("DELETE", event.target.parentNode.href);
            ajax.setRequestHeader('X-CSRF-TOKEN',token); //token
            
            ajax.onreadystatechange = function(){
                if(ajax.readyState === 4 && ajax.status === 200){ //requisição
                    win.location.href = "paises";
                }
            }   ;
            ajax.send();
        } else {
            return false;
        }
    }

    if (doc.querySelector('.js-del')) {
        let btn = doc.querySelectorAll('.js-del'); //seleciona todos os botões de delete
        for (let i = 0; i < btn.length; i++) {
            btn[i].addEventListener('click', confirmDel, false);
        }
    }

})(window, document);