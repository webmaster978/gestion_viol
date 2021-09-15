<?php require('config/database.php'); ?>
<?php
if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $requete = $db->prepare('SELECT * FROM login where  username=:username and password=:password');
    $requete->execute(array(
        'username' => $username,
        'password' => $password
    ));

    $res = $requete->fetchAll(PDO::FETCH_OBJ);

    if ($res) {
        $user->con($res[0]->id);
        header('location: index.php');
    } else {
        header('location: login.php');
    }
}


?>