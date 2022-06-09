<?php
function mainController($action) {
    $theActions = array();

    $theActions["home"] = "c_home.php" ;

    $theActions["default"] = $theActions["home"];

    if (array_key_exists($action, $theActions)) {
        return $theActions[$action];
    } else {
        return $theActions["default"];
    }
}

function loadModels($root){
    include("$root/model/ClassesManager/Manager.php");

    include("$root/model/Classes/Exemple.php");
    include("$root/model/ClassesManager/ExempleManager.php");
}
?>