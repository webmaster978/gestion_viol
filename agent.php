<?php
include'config/database.php';
$recup = $db->query("SELECT * FROM agent");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/i.jfif">

    <title>Agents</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet"> -->

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include'partials/_menu.php';?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include'partials/_nav.php';?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Liste des agents</h1>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                            <a class="btn btn-success" class="dropdown-item" class="#" href="#" data-toggle="modal" data-target="#vict">Nouveau agent 
            </a>
            <a class="btn btn-default" href="fpdf/tutorial/agent.php">Imprimer</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Post nom</th>
                                            <th>Sexe</th>
                                            <th>Date de naissance</th>
                                            <th>Contact</th>
                                            <th>Ville</th>
                                            <th>Date de creation</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                    <?php while ($a= $recup->fetch())  {?>
                                        <tr>
                                        <div class="modal fade" id="vict<?=$a['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifier l'agent : <b><?=$a['nom'];?></b></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="ag.php" method="post">
                        <input class="form-control" type="text" name="nom" value="<?=$a['nom'];?>" placeholder="nom" required><br>
                        <input class="form-control" type="text" name="postnom" value="<?=$a['postnom'];?>" placeholder="Post nom" required><br>
                        <input class="form-control" type="date" name="datenaissance" value="<?=$a['datenaissance'];?>" placeholder="" required><br>
                        <select class="form-control" name="sexe">
                            <option value="<?=$a['sexe'];?>"><?=$a['sexe'];?></option>
                            <option value="Feminin">Feminin</option>
                        </select> <br>
                        <input class="form-control" type="text" name="numtel" value="<?=$a['numtel'];?>" placeholder="numero de telephone" required><br>
                        <input class="form-control" type="text" name="ville" value="<?=$a['ville'];?>" placeholder="Ville d'origine" required><br>
                    
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Annuler</button>
                    <input type="submit" class="btn btn-primary" name="submit" value="Enregistrer">
                    </form>
                </div>
            </div>
        </div>
    </div>

                                            <td><?=$a['nom'];?></td>
                                            <td><?=$a['postnom'];?></td>
                                            <td><?=$a['sexe'];?></td>
                                            <td><?=$a['datenaissance'];?></td>
                                            <td><?=$a['numtel'];?></td>
                                            <td><?=$a['ville'];?></td>
                                            <td><?=$a['created_at'];?></td>
                                            <td>
                                            <a class="btn btn-warning" class="dropdown-item" class="#" href="#" data-toggle="modal" data-target="#vict<?=$a['id'];?>">Modifier 
            </a>
                                                
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
     <div class="modal fade" id="vict" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nouveau agent</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="ag.php" method="post">
                        <input class="form-control" type="text" name="nom" id="" placeholder="nom" required><br>
                        <input class="form-control" type="text" name="postnom" id="" placeholder="Post nom" required><br>
                        <input class="form-control" type="date" name="datenaissance" id="" placeholder="" required><br>
                        <select class="form-control" name="sexe" id="">
                            <option value="Masculin">Masculin</option>
                            <option value="Feminin">Feminin</option>
                        </select> <br>
                        <input class="form-control" type="text" name="numtel" id="" placeholder="numero de telephone" required><br>
                        <input class="form-control" type="text" name="ville" id="" placeholder="Ville d'origine" required><br>
                    
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Annuler</button>
                    <input type="submit" class="btn btn-primary" name="submit" value="Enregistrer">
                    </form>
                </div>
            </div>
        </div>
    </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include'partials/_mod.php'; ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>