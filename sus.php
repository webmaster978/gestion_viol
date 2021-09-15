<?php
include'config/database.php';
if (isset($_POST['submit'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $postnom = htmlspecialchars($_POST['postnom']);
    
    $sexe = htmlspecialchars($_POST['sexe']);
    $numtel = htmlspecialchars($_POST['numtel']);
    $ville = htmlspecialchars($_POST['ville']);

    $req=$db->prepare("INSERT INTO suspect (nom,postnom,sexe,numtel,ville) VALUES (:nom,:postnom,:sexe,:numtel,:ville)");

    $req->execute(array(
        'nom' => $nom,
        'postnom' => $postnom,
        'sexe' => $sexe,
        'numtel' => $numtel,
        'ville' => $ville 
    ));
    if ($req) {
        header("location: suspect.php");
    }else{
        header("location: suspect.php");
    }
}

?>