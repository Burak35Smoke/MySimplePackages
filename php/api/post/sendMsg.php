<?php 
/*

Name : Forum System Send Message API Source

Author for Contact;
Github: Burak35Smoke
Web: https://bur4k.social
R10.NET: https://www.r10.net/profil/126637-pixeldev.html

*/

define('__PATH__', $_SERVER["DOCUMENT_ROOT"]);
require_once(__PATH__ . "/app/main/functions/functions.php");
$reqMethod = $_SERVER["REQUEST_METHOD"];
if (!session("username") || !session("password")) {
    die(json_encode(["error" => 1, "message" => "Please login first."]));
    exit;
}
if ($reqMethod == "POST") {

    $topic = post('topic');
    $content = post('content');
    $type = post('group');

    if (mb_strlen($content) < 4) {
        die(json_encode(["error" => 1, "message" => "Your message must be at least 4 characters."]));  
    }    
    $msgProcess = $db->prepare("INSERT INTO messages (id,content,user,type) VALUES (?,?,?)"); 
    $AddMsgToDb = $msgProcess->execute(array($topic, $content, array(session("username"))));
    if($AddMsgToDb) {
        die(json_encode(["error" => 0, "message" => "Message sent successfully."]));
    } else {
        die(json_encode(["error" => 1, "message" => "There was an error sending the message!"]));
    }

} else {
    die(json_encode(["error" => 1, "message" => "request method invalid"]));
}
?>
