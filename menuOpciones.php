<script>

    function cfprofesional () {
        $("#area2").load("controller/menuOpcionesController.php?accion=cfprofesional");
        $("#areaTrabajo").load(" ");
    }

    function ceseMesActual() {
        $("#areaTrabajo").load("controller/menuOpcionesController.php?accion=ceseMesActual");
        $("#area2").load(" ");        
    }

    function cumpleanios()
    {
        $('#areaTrabajo').load('util/preload2.php');
        $("#areaTrabajo").load("controller/menuOpcionesController.php?accion=cumpleanios");
        $("#area2").load(" ");
    }

    function contratos()
    {
        $("#areaTrabajo").load("controller/menuOpcionesController.php?accion=contratos&val=1");
        $("#area2").load("util/preload2.php");
    }

    function temporada(){
        $("#areaTrabajo").load("controller/menuOpcionesController.php?accion=temporada");
        $("#area2").load(" ");   
        //alert("temporada de conejos");     
    }

    function trabajador()
    {
        $("#areaTrabajo").load("controller/menuOpcionesController.php?accion=trabajador&buscar=no&val=1");
        $("#area2").load("util/preload2.php");
    }

    function cargos()
    {
        $("#areaTrabajo").load("controller/menuOpcionesController.php?accion=cargos");
        $("#area2").load(" ");
    }

    function areas()
    {
        $("#areaTrabajo").load("controller/menuOpcionesController.php?accion=area");
        $("#area2").load(" ");
    }

    function cartaSenati () {
        creaModal(400,240);
        $("#bgmodal").load("frmCartaSenati.php");
    }

    function condiciones(){
        $("#areaTrabajo").load("controller/menuOpcionesController.php?accion=condiciones");
        $("#area2").load(" ");
    }

    function closeModal(){
        $('#bgmodal').remove();
        $('#bgtransparent').remove();
    }

    function creaModal(w,h){
        var ancho = w; 
        var alto = h;
        
        var bgdiv = $('<div>').attr({
            className: 'bgtransparent',
            id: 'bgtransparent'
        });

        bgdiv.css('position','fixed');
        bgdiv.css('left','0');
        bgdiv.css('top','0');
        bgdiv.css('background-color','#000');
        bgdiv.css('opacity','0.6');
        bgdiv.css('filter','alpha(opacity=60)');
        
        $('body').append(bgdiv);
        
        var wscr = $(window).width();
        var hscr = $(window).height();
                
        $('#bgtransparent').css("width", wscr);
        $('#bgtransparent').css("height", hscr);
               
        // ventana flotante
        var moddiv = $('<div>').attr({
            className: 'bgmodal',
            id: 'bgmodal'
        }); 
        
        moddiv.css('position','fixed');
        moddiv.css('border','0.05em solid black');
        moddiv.css('overflow','auto');
        moddiv.css('background-color','#fff');

        $('body').append(moddiv);
        //  $('#bgmodal').append(contenidoHTML);
        
        var wscr = $(window).width();
        var hscr = $(window).height();

        // estableciendo dimensiones de background
        $('#bgtransparent').css("width", wscr);
        $('#bgtransparent').css("height", hscr);
        
        // definiendo tamaño del contenedor
        $('#bgmodal').css("width", ancho+'px');
        $('#bgmodal').css("height", alto+'px');
        
        // obtiendo tamaño de contenedor
        var wcnt = $('#bgmodal').width();
        var hcnt = $('#bgmodal').height();
        
        // obtener posicion central
        var mleft = ( wscr - wcnt ) / 2;
        var mtop = ( hscr - hcnt ) / 2;
        
        // estableciendo posicion
        $('#bgmodal').css("left", mleft+'px');
        $('#bgmodal').css("top", mtop+'px');
    }


</script>

<div class="menu_top_bg">CONTRATOS</div> 
<div class="sub_menu"> 
    <ul>
        <li onclick="contratos()"><a href="#"  title="GESTION DE CONTRATOS">GESTION DE CONTRATOS</a></li>        
        <li onclick="trabajador()"><a href="#"  title="GESTION DE PERSONAL">GESTION DE PERSONAL</a></li>
        <li onclick="cartaSenati()"><a href="#"  title="Carta - SENATI">Carta - SENATI</a></li>
    </ul>
</div> 
<div class="menu_top_bg">REPORTES</div> 
<div class="sub_menu"> 
    <ul>                       
        <li onclick="cumpleanios()"><a href="#" title="CUMPLEAÑOS DE ESTE MES">CUMPLEAÑOS DE ESTE MES</a></li>                         
        <li onclick="ceseMesActual()"><a href="#" title="CONTRATOS POR CESAR">CONTRATOS POR CULMINAR </a></li>        
    </ul>
</div> 
<div class="menu_top_bg">MANTENIMIENTO</div> 
<div class="sub_menu"> 
    <ul>
        <li onclick="cargos()"><a href="#" title="CARGOS">CARGOS</a></li>                         
        <!--<li onclick="areas()"><a href="#" title="MANTENIMIENTO DE AREAS">MANTENIMIENTO DE AREAS</a></li>-->
        <li onclick="condiciones()"><a href="#" title="CONDICION LABORAL">CONDICION LABORAL</a></li>
        <li onclick="temporada()"><a href="#" title="TEMPORADA DE VERANO">TEMPORADA DE VERANO</a></li>
        <li onclick="cfprofesional()"><a href="#" title="CENTRO DE FORMACIÓN PROFESIONAL">CENTRO DE FORMACIÓN PROFESIONAL</a></li>  
    </ul>
</div> 
