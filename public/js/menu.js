function togglemenu() {

    document.getElementById("menu").classList.toggle("close-nav");
    document.getElementById("main").classList.toggle("main-cerrado");
    document.getElementById("boton-toggle-menu").classList.toggle("boton-toggle-menu");
    let submenu = document.getElementsByClassName("submenu");
    let texto = document.getElementsByClassName("texto");
    let icono = document.getElementsByClassName("icono");

    

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

function abrirMenu(){
    document.getElementById("menu").classList.remove("close-nav");
    document.getElementById("main").classList.remove("main-cerrado");
    document.getElementById("boton-toggle-menu").classList.remove("boton-toggle-menu");
    let texto = document.getElementsByClassName("texto");
    for(let i = 0; i < texto.length ; i++){
        texto[i].classList.remove("ocultar-texto");
    }
}