<?php
//DATOS DE LA EMPRESA
$lorem = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore similique praesentium provident ipsum harum odio, voluptate consectetur magnam totam labore adipisci obcaecati sit ad cupiditate ratione quam. Asperiores, eligendi soluta!";
$lorem2 = "Some quick example text to build on the card title and make up the bulk of the card's
content.";
define('NOMBRE_PRINCIPAL', 'TasatodayPro'); #nombre

// Creacion de base de datos

//información de la base de datos
define('NOMBRE_SERVIDOR', 'localhost'); #nombre
define('NOMBRE_USUARIO', 'root'); #usuario
define('PASSWORD', ''); #clave
define('NOMBRE_BD', 'instarapids'); #nombre de la base de datos
define('PAIS_ZONA_HORARIA', 'America/Caracas'); #pais - zona horaria
define('ZONA_HORARIA', '-4:00'); #zona horaria
/* Rutas de la web
http://localhost/instarapid/
    ** Colocar el url del dominio entre comillas y reemplazarlo con el nombre del dominio final
    Nota si es http o https colocar s porque por defecto viene http
    */
define("HTTPS", $_SERVER["REQUEST_SCHEME"] . "://");
define("DOMINIO", $_SERVER['SERVER_NAME']);
define("PUERTO", $_SERVER['SERVER_PORT']);
if (PUERTO !== 80 || PUERTO == 443) {
    define("SERVIDOR", HTTPS . DOMINIO . ":" . PUERTO . "/");
} else {
    define("SERVIDOR", HTTPS . DOMINIO . "/");
}
echo PUERTO . "<br>";
#Server para admins


/* Rutas de la vista
    ** Vistas de html o php
    */
#define("VISTA", SERVIDOR . "vistas" . "/");
define("VISTA", SERVIDOR);

//copiar esta de ejemplo sin "#" para seguir colocando rutas:

# define("RUTA_", VISTA . ".php");

//VISTAS PRINCIPALES
define("RUTA_GENERAL", VISTA);
define("RUTA_INICIO", VISTA . "inicio");
define("RUTA_LOGIN_GENERAL", VISTA . "login");
define("RUTA_REGISTRO_GENERAL", VISTA . "registro");
define("RUTA_LOGOUT_GENERAL", VISTA . "logout");
#Area de deliverys
define("RUTA_DELIVERYS", VISTA . "deliverys");
define("RUTA_DELIVERY", VISTA . "delivery");
#Area de diplomados
define("RUTA_DIPLOMADOS", VISTA . "diplomados");
define("RUTA_DIPLOMADO", VISTA . "diplomado");
#AREA DE ALIADOS
define("RUTA_ALIADOS_INSTITUCIONALES", VISTA . "aliados-institucionales");
define("RUTA_ALIADOS_PEDAGOGICOS", VISTA . "aliados-pedagogicos");
define("RUTA_RESPONSABILDIAD_SOCIAL", VISTA . "responsabilidad-social");
#VERIFICACION
define("RUTA_VERIFICACION", VISTA . "verificacion");

//USUARIO
define("RUTA_CALIFICACIONES", VISTA . "calificaciones");
define("RUTA_FAVORITOS", VISTA . "favoritos");
define("RUTA_HISTORIAL", VISTA . "historial");
define("RUTA_TRASANCIONES", VISTA . "transanciones");


//MAS INFORMACION
define("RUTA_MAS_INFORMACION", VISTA . "mas-informacion");

//DENUNCIAS Y RECLAMOS
define("RUTA_DENUNCIAS_RECLAMOS", VISTA . "denuncias-y-reclamos");

//VISTAS ACERCA DE LA SEGURIDAD EN LA PAGINA
define("RUTA_POLITICAS_PRIVACIDAD", VISTA . "politicas-de-privacidad");
define("RUTA_TERMINOS_CONDICIONES", VISTA . "terminos-y-condiciones");


//RUTAS DE REDIRECCIONES ALTERNAS

#define("RUTA_MUESTRA", SERVIDOR . "muestras" . "/");

//RECURSOS
define("RUTA_CSS", SERVIDOR . "css" . "/");
define("RUTA_JS", SERVIDOR . "js" . "/");
define("RUTA_FAVICON", SERVIDOR . "favicon" . "/");
define("DIRECTORIO_RAIZ", realpath(dirname(__FILE__) . "/..")); //para php < 5.3
// realpath(__DIR__."/..") para php 5.3+
@session_start();
@extract($_REQUEST);