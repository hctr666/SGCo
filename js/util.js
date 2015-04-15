function subir(){
    $("html, body").animate({
        scrollTop: 0
    }, 600);
    return false;
}

function bajar(){
    $("html, body").animate({
        scrollBottom: 0
    }, 600);
    return false;
}