<?php
/** Enable W3 Total Cache Edge Mode */
define('W3TC_EDGE_MODE', true); // Added by W3 Total Cache



/**
 * La configuration de base de votre installation WordPress.
 *
 * Le script de création wp-config.php utilise ce fichier lors de l'installation.
 * Vous n'avez pas à utiliser l'interface web, vous pouvez directement
 * renommer ce fichier en "wp-config.php" et remplir les variables à la main.
 * 
 * Ce fichier contient les configurations suivantes :
 * 
 * * réglages MySQL ;
 * * clefs secrètes ;
 * * préfixe de tables de la base de données ;
 * * ABSPATH.
 * 
 * @link https://codex.wordpress.org/Editing_wp-config.php 
 * 
 * @package WordPress
 */

include ('wp-config-db.php') ;

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '|f3)~#GTM=-8[?Z{OxThI:FkxNF4)ONIb%VLLm7Z85{hS*vQ@RN6Rp.E ;nu%n7X');
define('SECURE_AUTH_KEY',  '|&qK?5M3gN+fjjA)84Oj):-mpog_SD55e4sgbOajUB%-T|p&mYeY{W<L#&KE{?x<');
define('LOGGED_IN_KEY',    'ZfUt[wk>k9y8+Jd]|ovHXtOK@%j{eVSqpd]o}9b/Ueo?-yz(J0!YuIB?$`*wRT*n');
define('NONCE_KEY',        'd!+g!K@x/{FcpNxPX-1EZ=>0TrRTi%Ma93DX8JK<Pl~osYux}f/|ZpQZ}U[eDFO{');
define('AUTH_SALT',        '5sHLSi&#sVoHH9Cka9X+|KB`!,-~MUy&Ije+}M,06E}JPq3zN/3zYdm*@+0:vR8=');
define('SECURE_AUTH_SALT', 'a `P9T g`8|8m_B9i-n#p0q`QGU/UTP0;-U&4 I+hvQy hHsu7&b>`+G2jS)sA|Z');
define('LOGGED_IN_SALT',   'C4JoogMm?TLMF+YgI&<<msQfG%0p5vZC22>[0Jm76w)@;2eWB|P6bXT^EqU~:Ig?');
define('NONCE_SALT',       '-|jECZZ?=-auhL2`L]ddA!+kAb=dOe7<JG9zTP>>Q}yGoyEvr|?8!]j{nwJu^Z{-');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'wp_';

/** 
 * Pour les développeurs : le mode déboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 * 
 * Pour obtenir plus d'information sur les constantes 
 * qui peuvent être utilisée pour le déboguage, consultez le Codex.
 * 
 * @link https://codex.wordpress.org/Debugging_in_WordPress 
 */ 
define('WP_DEBUG', false); 

ini_set('log_errors','On');
ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );
define('WP_DEBUG', false);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');