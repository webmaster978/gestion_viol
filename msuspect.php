<?php 
  include'config/database.php';
  if (isset($_POST['submit'])) {
    extract($_POST);
    $md=$db->prepare('UPDATE suspect SET nom=:nom,postnom=:postnom,sexe=:sexe,numtel=:numtel WHERE id=:id');
    $res=$md->execute(array(
        'id' =>$id,
        'nom' =>$nom,
        'postnom' =>$postnom,
        'sexe' =>$sexe,
       
        'numtel' =>$numtel
    ));
    if ($res) {
      
        header("location: suspect.php");
    }else{
      echo'err';
        header("location: suspect.php");
    }
  }
?>