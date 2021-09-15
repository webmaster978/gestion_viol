<?php
include'config/database.php';
if (isset($_POST['submit'])) {
    $datedebut = htmlspecialchars($_POST['datedebut']);
    $etat = htmlspecialchars($_POST['etat']);
    $victime = htmlspecialchars($_POST['victime']);
    $suspect = htmlspecialchars($_POST['suspect']);
    $agent = htmlspecialchars($_POST['agent']);
   

    $req=$db->prepare("INSERT INTO viol (datedebut,etat,victime,suspect,agent) VALUES (:datedebut,:etat,:victime,:suspect,:agent)");

    $req->execute(array(
        'datedebut' => $datedebut,
        'etat' => $etat,
        'victime' => $victime,
        'suspect' => $suspect,
        'agent' => $agent
        
    ));
    if ($req) {
        header("location: dossier.php");
    }else{
        header("location: dossier.php");
    }
}

?>