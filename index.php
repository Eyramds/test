<?php
include("autoload.php");

use App\SdkFacade;


$sdk = new SdkFacade([
        [
            "name" => "Facebook",
            "client_id" => "232416044757491",
            "client_secret" => "8ae6612fbb9faac7dbae30302e384a57"
        ],
        [
            "name" => "Test",
            "client_id" => "232416044757491",
            "client_secret" => "8ae6612fbb9faac7dbae30302e384a57"]
    ]
);

if (!isset($_GET["code"])) {
    $links = $sdk->getLinks();
    foreach ($links as $key => $link){
        echo "<a href='".$link."'>".$key."</a><br>";
    }
} else {
    var_dump($sdk->getUserData());
}
