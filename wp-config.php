<?php

// Replace with your settings
define('DB_NAME', 'dogSite');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

// https://api.wordpress.org/secret-key/1.1/salt/
define('AUTH_KEY',         '_Q*{5>nH=ru1/Z|eLMK/%6`(-.)BH+8)&}5rF11myy2_Y5UKI=,w*+ ._|Wz!JL}');
define('SECURE_AUTH_KEY',  'X9XX+K#9D<K|/=YT@2|+/K,$|Za>7,bIF/}iy-A<31<ikV!$uDx%4I@Q<D{Adt&S');
define('LOGGED_IN_KEY',    'S~+Nl4,e,|+wLLhYg.L#H:hMwKxfA[%|,xl{,3KFKyPQu9TY&[bb.Lb3_(n6Uiai');
define('NONCE_KEY',        '-!;y!e:>=b0rn9{{^zD,4>xKzLoXGsxX=U8Jo^e4R?VEmkAc*f5dt}%l@5|n_RDg');
define('AUTH_SALT',        '2I*T~UlBy5}Qw@y63[rAShnPIH,P,WjFw{o-J2};FkYJ[#L$-~IYxTyrx56z$V;B');
define('SECURE_AUTH_SALT', ':+/c*m{:r_Z(cJ;%#(tPZPgIGVZ[><CUQ_:cLUlF4l%9P6_O,x]<]2#x-Mv ,[TF');
define('LOGGED_IN_SALT',   'mrW||~4Bs6V{]<p`=1vce`p) )CwRAV]W6yfx]#}T(K+[+:{[6nWqi,*<ydGs/Er');
define('NONCE_SALT',       'nemrHq>=h>Z`w |?!%^wvABQaeb]8J6iX:DR|nNS(F<yd{2=CT<W`}RS_);h0rsH');


$table_prefix  = 'wp_';
define('WP_DEBUG', true);


// you do not need to change
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
