<?php 
  include'config/database.php';
  if (isset($_POST['submit'])) {
    extract($_POST);
    $md=$db->prepare('UPDATE victime SET nom=:nom,postnom=:postnom,sexe=:sexe,datenaissance=:datenaissance,numtel=:numtel WHERE id=:id');
    $res=$md->execute(array(
        'id' =>$id,
        'nom' =>$nom,
        'postnom' =>$postnom,
        'sexe' =>$sexe,
        'datenaissance' =>$datenaissance,
        'numtel' =>$numtel
    ));
    if ($res) {
        header("location: victime.php");
    }else{
        header("location: victime.php");
    }
  }
?>