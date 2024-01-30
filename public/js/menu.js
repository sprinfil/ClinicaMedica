
    function togglemenu() {

        if(document.getElementById("menu").classList.contains("close-nav-cel")){
            document.getElementById("menu").classList.toggle("close-nav-cel");
        }else{
            document.getElementById("menu").classList.toggle("close-nav");
        }
        document.getElementById("main").classList.toggle("main-cerrado");
        let submenu = document.getElementsByClassName("submenu");
        let texto = document.getElementsByClassName("texto");
    
        
    
        for(let i = 0; i < texto.length ; i++){
            texto[i].classList.toggle("ocultar-texto");
        }
        for(let i = 0; i < submenu.length ; i++){
            submenu[i].classList.add("ocultar");
        }
    }
    
    function toggleSubMenu(id){
        let submenu = document.getElementById(id);
        if(!document.getElementById("menu").classList.contains("close-nav")){
            submenu.classList.toggle("ocultar");
        }  
    }

    $(document).ready(function() {
        var anchoVentana = $(window).width();
        if (anchoVentana < 1180) {
            $('#menu').addClass('close-nav-cel');
            $('#main').addClass('main-cerrado');

            let submenu = document.getElementsByClassName("submenu");
            let texto = document.getElementsByClassName("texto");
            for(let i = 0; i < texto.length ; i++){
                texto[i].classList.add("ocultar-texto");
            }
            for(let i = 0; i < submenu.length ; i++){
                submenu[i].classList.add("ocultar");
            }
            }
    });