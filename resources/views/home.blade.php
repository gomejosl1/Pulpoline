@extends('layouts.app')
<style type="text/css">
    @charset "utf-8";

html, body {width:100%; height:100%; margin:0px; background:#EEE; font-size:100%; font-family:Verdana, Arial, Calibri, Verdana, Geneva, sans-serif; /*cursor:url(../imag/var/ivss_logo_cursor.png), auto;*/}



#pag_ivss{position:relative; width:100%;}
#pag_institucional{position:absolute; width:100%; height:50px; top:0px; background:#FFF url(../imag/var/cabecera.jpg) center/contain no-repeat;}
#pag_superior{position:absolute; width:100%; height:130px; top:50px; box-shadow:0 0 5px #555; background:#DDD url(../imag/var/fondodimension%7B200x100%7D.jpg) no-repeat center/cover;}
#pag_inferior{position:relative; width:100%; top:180px; bottom:0px; overflow:hidden;}
#pag_banner{position:relative; width:100%; height:auto; top:180px; box-shadow:inset 0 0 5px rgba(0,0,0,0.5); overflow:hidden;}
#pag_centro{position:relative; width:100%; height:100%; top:180px; padding:0px; border-bottom:1px solid #DDD; background:#EEE/*linear-gradient(to right,#DDD,#FFF,#DDD)*/; overflow:hidden;}
.pag_contenido{position:relative; width:100%; max-width:1030px; height:100%; left:50%; margin-left:-515px; /*overflow:hidden;*/}



/** RESPONSIVE **/
@media screen and (min-width: 1001px){
#superior_menu{top:30px !important;}}
@media screen and (max-width:1030px), screen and (max-device-width:480px){
.pag_contenido{margin-left:-50% !important;}}
@media screen and (max-width:700px), screen and (max-device-width:480px){
#pag_institucional{display:none; visibility:hidden;}
#pag_superior{position:fixed; top:0px; height:auto;}
#pag_inferior{top:45px;}
#pag_banner{top:45px; display:none; visibility:hidden;}
#pag_centro{top:45px;}}
@media screen and (max-device-width:480px){
#pag_ivss div{/*font-size:90% !important;*/}}


/*********  TEXTO **********/
.txt_grism{color:#555; font-size:11px;}
.txt_grisg{color:#555; font-size:15px;}

.txt_blancom{color:#EEE; font-size:12px;}
.txt_blancog{color:#EEE; font-size:15px;}


.txtp{color:#333; font-size:11px;}
.txtm{color:#555; font-size:12px;}
.txtg{color:#555; font-size:15px;}

.txtbp{color:#FFF; font-size:10px;}
.txtbm{color:#FFF; font-size:12px;}
.txtbg{color:#FFF; font-size:15px;}

.texto_gris_p{color:#555; font-size:12px;}
.texto_gris_m{color:#333; font-size:15px;}
.texto_gris_g{color:#333; font-size:18px; /*font-weight:bolder;*/ text-shadow:1px 1px 1px #FFF;}
.texto_blanco_g{color:#FFF; font-size:18px; text-shadow:1px 1px 1px #222;}

.texto_error{color:#F00;} 


/********** redes **********/
.net{position:relative; padding:20px 0px; clear:left;}
.facebot{width:60px; color:#3B5998; font-family:Verdana, Geneva, sans-serif; font-size:11px; text-shadow:1px 1px #FFF; padding:2px 5px 3px 20px; margin:0px 5px 0px 5px; border:1px solid #CAD4E7; cursor:pointer; float:left; background: #ECEEF5 url(http://static.ak.fbcdn.net/rsrc.php/v1/y7/r/ql9vukDCc4R.png) no-repeat 0px -139px;
-webkit-border-radius:3px; -moz-border-radius: 3px ; border-radius:3px; }
.facebot:hover{border:1px solid #9DACCE;}
.twitbot{cursor:pointer;}
.fbFeedbackContent{min-height:20px !important;}

.redicon{position:relative; width:51px; height:51px; margin:5px; float:left; cursor:pointer; background:url(../imag/var/menu.png) no-repeat;}.redicon:hover{top:1px}
.rediconf{background-position:-580px -1180px;}
.redicont{background-position:-640px -1180px;}
.redicong{background-position:-700px -1180px;}




/*** ALERTA ***/
#pag_alerta{position:fixed; width:100%; height:100%; top:0px; display:none; }
#pag_alerta:before{content:""; position:absolute; width:100%; height:100%; top:0px; background-color:#FFF; opacity: 0.7;}
#alerta_mensaje{position:fixed; width:300px; max-width:100%; padding:15px; color:#FFF !important; background:#558ECC;}
.alerta_cerrar{cursor:pointer;position:relative; padding:0px 0px 10px 0px; margin:0px 0px 10px 0px; border-bottom:1px solid #E5E5E5;}
.alerta_cerrar:after{content:""; width:15px; height:15px; margin:0 5px; background:url(../imag/var/menu.png) no-repeat -290px -10px; display:inline-block;}
.alerta_generar{cursor:pointer;position:relative; padding:0px 0px 10px 0px; margin:0px 0px 10px 0px; border-bottom:1px solid #E5E5E5;}
.alerta_generar:after{content:""; width:15px; height:15px; margin:0 5px; background:url(../imag/var/menu.png) no-repeat -290px -10px; display:inline-block;}
.alerta_generar2{cursor:pointer;position:relative; padding:0px 0px 10px 0px; margin:0px 0px 10px 0px; border-bottom:1px solid #E5E5E5;}
.alerta_generar2:after{content:""; width:15px; height:15px; margin:0 5px; background:url(../imag/var/menu.png) no-repeat -290px -10px; display:inline-block;}
#pag_alerta2{position:fixed; width:100%; height:100%; top:0px; display:none; }
#pag_alerta2:before{content:""; position:absolute; width:100%; height:100%; top:0px; background-color:#FFF; opacity: 0.7;}

/* ALERTA CORRECCION */
#alerta_mensaje{width:450px; border-radius:10px; box-shadow:0 0 5px #AAA; background:#234181 linear-gradient(#639ACA,#6095C4 20%,#3368A0 60%,#234181 100%) !important;}
#alerta_mensaje:before{content:""; position:absolute; width:100%; height:100%; top:20%; left:20%; opacity:0.1; background:url(http://www.ivss.gob.ve/sites/aplicativo/imagen/ivss_logo.png) no-repeat center/contain;}
#alerta_mensaje .mensaje_titulo{margin:10px 0 !important; color:#FFF !important; font-size:12px; border:5px solid rgba(255,255,255,0.5) !important; border-width:5px 0 !important;}
#alerta_mensaje input[type="text"]{width:100%;}
#alerta_mensaje input[type="submit"]{margin:5px; padding:5px 10px; color:#FFF; font-size:14px; font-weight:bold; border:1px solid #FFF; cursor:pointer; background:rgba(255,255,255,0.2);}
.alerta_cerrar{color:transparent /*#558ECC #F00*/; border-bottom:1px solid rgba(255,255,255,0.2);}
.alerta_cerrar:after{background-position:-490px -10px;}
.alerta_generar{color:transparent /*#558ECC #F00*/; border-bottom:1px solid rgba(255,255,255,0.2);}
.alerta_generar:after{background-position:-490px -10px;}
.alerta_generar2{color:transparent /*#558ECC #F00*/; border-bottom:1px solid rgba(255,255,255,0.2);}
.alerta_generar2:after{background-position:-490px -10px;}


/** DOCUMENTOS **/
.aplicacion_documento{position:relative; margin:10px 0px; overflow:hidden; box-shadow:inset 0 0 0 1px #FFF/*, 1px 1px 10px #CCC*/;}
.aplicacion_documento a{position:absolute !important;}
.aplicacion_documento>div{position:relative; width:100%; overflow:hidden; display:table;}
.aplicacion_documento>div:hover{background:rgba(255,255,255,0.5);}
.aplicacion_documento_icono{position:relative; width:100px; max-width:100px; margin:5px; float:left; clear:left; cursor:pointer; overflow:hidden; border-radius:2px; box-shadow:inset 0 0 0 1px #FFF, 1px 1px 10px #CCC; background:#EEE no-repeat center/contain;}
.aplicacion_documento_icono:after{content:""; position:relative; padding-top:50%; display:block;}
.aplicacion_documento_texto{position:relative; width:100%; color:#3368A0; font-weight:bolder; vertical-align:middle; display:table-cell;}



/** ENLACE **/
.centro_enlace{position:relative; margin:15px 0; border-radius:0 5px 5px 0; display:inline-block; overflow:hidden;}
.centro_enlace>div{position:relative; padding:5px 10px; color:#2E73B7; display:inline-block; border-right:1px solid #F5F5F5; cursor:pointer; background:#E5E5E5; overflow:hidden;}
.centro_enlace>div:nth-child(-n+2){padding-left:0px; background:none;}
.centro_enlace>div:nth-child(-n+2):before{content:""; position:relative; width:15px; height:15px; background:url(../imag/var/menu.png) no-repeat; display:block;}
.centro_enlace>div:nth-child(1){border-right-width:0;}
.centro_enlace>div:nth-child(1):before{background-position:-460px 0px;}
.centro_enlace>div:nth-child(2):before{background-position:-440px 0px;}
.centro_enlace>div:last-child{border-right-width:0; color:#555;}
.centro_enlace>div:hover{color:#555;}
.centro_enlace>div a{position:absolute !important;}
</style>
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
<!-- ESTA ES LA VENTANA DEL LOGIN -->
            
                <div id="alerta_mensaje" class="txtg" align="center" style="top: 20%; left: 450.5px;"><div class="alerta_cerrar txt" align="right">cerrar
                </div>
                <div class="alerta_comentario">

                    <div class="mensaje_titulo">INSTITUTO VENEZOLANO DE SEGUROS SOCIALES</div>
                    <form accept-charset="ISO-8859-1" action="http://autoliquidacionv2.ivss.gob.ve:28082/TiunaWeb/certificadoSolvenciaElectronico.htm" method="post" id="form_solvencia" name="form_solvencia" target="_blank">
                        <div>SISTEMA DE MENSAJERIA</div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Usuario</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <input type="button" class="btn btn-primary" onclick="mensaje_cerrar();" name="boton" value="Entrar"></div>
                        </form>
                    </div>
                </div>
<!-- ESTA ES LA VENTANA DEL LOGIN -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
