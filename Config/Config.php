<?php

define('SITE_URL',$_SERVER['HTTP_HOST'] );
define('SUB_DIRECTORY','MatalaCinnamon');
define('SITE_ROOT',$_SERVER['DOCUMENT_ROOT'] .'/'.SUB_DIRECTORY.'/');

define('CONFIG_DIR',$_SERVER['DOCUMENT_ROOT'] .SUB_DIRECTORY. '/Config/');

// Db Credentials
// live
define('DB_HOST','localhost');
define('DB_USER','mathala_mysql');
define('DB_PASSWORD','Mathala@123');
define('DB_NAME','mathala_mysql');

// local
//define('DB_HOST','localhost');
//define('DB_USER','root');
//define('DB_PASSWORD','');
//define('DB_NAME','mathala_mysql');

