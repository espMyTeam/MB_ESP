<?php
    require("connexion.php");
    require ("classes.php");
/**
 * Created by PhpStorm.
 * User: bng
 * Date: 5/21/16
 * Time: 10:45 PM
 */

    if(isset($_GET['compte']) and !empty($_GET['compte'])){
        $compte = new Compte($base);
        $retour=$compte->consultation($_GET['compte']);
        $val=$retour->fetch()[0];
        if($val!=null){
            echo $val;
        }else{
            echo -1;
        }
    }else{
        echo -1;
    }