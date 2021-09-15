<?php 
  include'config/database.php';
  if (isset($_POST['submit'])) {
    extract($_POST);
    $md=$db->prepare('UPDATE viol SET datedebut=:datedebut,etat=:etat,victime=:victime,suspect=:suspect,agent=:agent WHERE id=:id');
    $res=$md->execute(array(
        'id' =>htmlspecialchars($id),
        'datedebut' =>$datedebut,
        'etat' =>htmlspecialchars($etat),
        'victime' =>htmlspecialchars($victime),
       
        'suspect' =>htmlspecialchars($suspect),
        'agent' =>htmlspecialchars($agent)
    ));
    if ($res) {
      
      
        header("location: dossier.php");
    }else{
    //   echo'err';
        header("location: dossier.php");
    }
  }
?>