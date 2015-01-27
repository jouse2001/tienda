<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'blogbd');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'usuarioblog');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'miblog');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'k4HrtUy,vV.uX)Qn?nzW?yY1-,3F{f={?.-pBXUp218b1{sp0D=f&Xh^^3Hm$<;c');
define('SECURE_AUTH_KEY', '5zr{Ir3O>ein%e+i_[^-E<k1~EiVyy+!9!;C#NDg4q@jV)y0NPsp%wUa3}XvaRGV');
define('LOGGED_IN_KEY', ' +GF;[2h+#9H&g*CfxH}XiFB:^L13:m2BmHTQp@g@W2ZR^{aV9@*R5R@VinsV{$t');
define('NONCE_KEY', 'E&J20CmSHmyRzN[I)}<8.QYf@/>jdOv~Py,@<]g[HKf%&1_WG|>%<_a&,;iZBQsj');
define('AUTH_SALT', 'Y,CKyb|&lz^.gez0r[`ASux1n-Wm@i; kj+Gy>k}`R@9AH|R|Va}V?.-LvE+j-|E');
define('SECURE_AUTH_SALT', 'lU|PN$]q^pq^r@B?&./=<^9M`c))+Nl?hH-N-,6EFXL+0o6/x|h0{ipb1l&~yWZ#');
define('LOGGED_IN_SALT', 'R$e(J;H.d>uu3`-f-|.79*#l~+/P54haWijdupg)mgO}D:{bV.VNL]r$yNV)u9}|');
define('NONCE_SALT', '+3J0h#zs+y,O9+;_Gn@>I-BKDqC3BsP6 WPb:CO6t.zC8O:eru<g}y`X{zkX>Z-[');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

