<?php
session_start();
require_once("db.php");

class Functions extends Database
{

    function RequireLogin()
    {
        if (isset($_SESSION['Login']) && !empty($_SESSION['User']) ) {
            return true;
        } else {
            header("Location:" . WEBSITE_URL );
        }
    }

    function RequireAdminLogin()
    {
        if (isset($_SESSION['Login']) && !empty($_SESSION['User']) ) {
            return true;
        } else {
            header("Location:" . ADMIN_URL );
        }
    }

    function Encrypt($str){
        return base64_encode(base64_encode($str));
    }
    function Decrypt($str){
        return base64_decode(base64_decode($str));
    }


}
