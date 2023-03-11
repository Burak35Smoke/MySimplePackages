<?php 
/*
Name : Page.PHP for Starter Pack

Author for Contact;
Github: Burak35Smoke
Web: https://bur4k.social
R10.NET: https://www.r10.net/profil/126637-pixeldev.html
*/

define('__PATH__', $_SERVER["DOCUMENT_ROOT"]);
require_once(__PATH__ . "/app/main/functions/config.php");
require_once(__PATH__ . "/app/main/functions/functions.php");
$page = get("page");
$dir = get("dir");
$subdir = get("subdir");

if ($page) {
    if ($dir && $subdir) {
        if (!file_exists(__PATH__."/app/views/". $dir ."/". $subdir ."/". $page .".php")) {
            die("404: " . $page . " Not Found.");
        } else {        
            if (file_exists(__PATH__."/app/views/". $dir ."/".$subdir."/static/header.php")) {
                require_once(__PATH__."/app/views/". $dir ."/".$subdir."/static/header.php");
            }
            require_once(__PATH__."/app/views/". $dir ."/".$subdir."/". $page .".php");
            if (file_exists(__PATH__."/app/views/". $dir ."/". $subdir ."/static/footer.php")) {
                require_once(__PATH__."/app/views/". $dir ."/". $subdir ."/static/footer.php");
            }
        }
    } else if ($dir) {
        if($dir=="admin"){
            if (!file_exists(__PATH__."/app/views/". $dir ."/". $page .".php")) {
                die("404: " . $page . " Not Found.");
            } else {        
                if (file_exists(__PATH__."/app/views/". $dir ."/static/header.php")) {
                    require_once(__PATH__."/app/views/". $dir ."/static/header.php");
                }
                if (file_exists(__PATH__."/app/views/". $dir ."/static/navbar.php")) {
                    require_once(__PATH__."/app/views/". $dir ."/static/navbar.php");
                }
                    require_once(__PATH__."/app/views/". $dir ."/". $page .".php");
                if (file_exists(__PATH__."/app/views/". $dir ."/static/footer.php")) {
                    require_once(__PATH__."/app/views/". $dir ."/static/footer.php");
                }
            }
        } else {
        if (!file_exists(__PATH__."/app/views/". $dir ."/". $page .".php")) {
            die("404: " . $page . " Not Found.");
        } else {        
            if (file_exists(__PATH__."/app/views/". $dir ."/static/header.php")) {
                require_once(__PATH__."/app/views/". $dir ."/static/header.php");
            }
            require_once(__PATH__."/app/views/". $dir ."/". $page .".php");
            if (file_exists(__PATH__."/app/views/". $dir ."/static/footer.php")) {
                require_once(__PATH__."/app/views/". $dir ."/static/footer.php");
            }
        }
    }
    } else {
        if (!file_exists(__PATH__."/app/views/". $page .".php")) {
            die("404: " . $page . " Not Found.");
        } else {
            include(__PATH__."/app/views/static/header.php");
            include(__PATH__."/app/views/". $page .".php");
            include(__PATH__."/app/views/static/footer.php");
        }
    }

} else {
    die("An error occured.");
}

?>
