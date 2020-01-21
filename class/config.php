<?php
error_reporting(0);
date_default_timezone_set("Europe/London");
define("COMPANY_NAME","KU Talent");
define("COMPANY_MAIL","info@kutalent.com");

define("SERVER_NAME","localhost");
define("USER_NAME","k1426446");
define("USER_PASSWORD","123456");

define("DATABASE_NAME","db_k1426446");
define("BASE_URL",DIRECTORY_SEPARATOR."k1426446".DIRECTORY_SEPARATOR);
define("WEBSITE_URL",'http://'.$_SERVER['HTTP_HOST'].BASE_URL);
define("UPLOADS_URL",WEBSITE_URL."cvs".DIRECTORY_SEPARATOR);
define("UPLOADS_PATH",$_SERVER['DOCUMENT_ROOT'].BASE_URL."cvs".DIRECTORY_SEPARATOR);

define("ADMIN_URL",WEBSITE_URL."ku-admin".DIRECTORY_SEPARATOR);
?>