<?php
include'config/database.php';
if (isset($_POST['submit'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $postnom = htmlspecialchars($_POST['postnom']);
    $datenaissance = htmlspecialchars($_POST['datenaissance']);
    $sexe = htmlspecialchars($_POST['sexe']);
    $numtel = htmlspecialchars($_POST['numtel']);
    $ville = htmlspecialchars($_POST['ville']);

    $req=$db->prepare("INSERT INTO agent (nom,postnom,datenaissance,sexe,numtel,ville) VALUES (:nom,:postnom,:datenaissance,:sexe,:numtel,:ville)");

    $req->execute(array(
        'nom' => $nom,
        'postnom' => $postnom,
        'datenaissance' => $datenaissance,
        'sexe' => $sexe,
        'numtel' => $numtel,
        'ville' => $ville 
    ));
    if ($req) {
        header("location: agent.php");
    }else{
        header("location: agent.php");
    }
}

?>