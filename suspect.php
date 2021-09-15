<?php
include'config/database.php';
$recup = $db->query("SELECT * FROM suspect");
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

    <title>Victime</title>

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
                    <h1 class="h3 mb-2 text-gray-800">List des suspects</h1>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                            <a class="btn btn-primary" class="dropdown-item" class="#" href="#" data-toggle="modal" data-target="#vict">Nouveau suspect
            </a>
            <a class="btn btn-default" href="fpdf/tutorial/suspect.php">Imprimer</a>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Post nom</th>
                                            <th>Sexe</th>
                                            
                                            <th>Contact</th>
                                            <th>Ville</th>
                                            <th>Date de creation</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php while ($s= $recup->fetch())  {?>
                                        <tr>
                                        <div class="modal fade" id="vict<?=$s['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifier un suspect</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="msuspect.php" method="post">
                        <input type="hidden" name="id" value="<?=$s['id'];?>">
                        <input class="form-control" type="text" name="nom" id="" placeholder="nom" value="<?=$s['nom'];?>" required><br>
                        <input class="form-control" type="text" name="postnom" id="" placeholder="Post nom" value="<?=$s['postnom'];?>" required><br>
                        
                        <select class="form-control" name="sexe" id="" value="<?=$s['sexe'];?>">
                            <option value="Masculin">Masculin</option>
                            <option value="Feminin">Feminin</option>
                        </select> <br>
                        <input class="form-control" type="text" name="numtel" id="" placeholder="numero de telephone" value="<?=$s['numtel'];?>" required><br>
                        <input class="form-control" type="text" name="ville" id="" placeholder="Ville d'origine" value="<?=$s['ville'];?>" required><br>
                    
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Annuler</button>
                    <input type="submit" class="btn btn-primary" name="submit" value="Enregistrer">
                    </form>
                </div>
            </div>
        </div>
    </div>
                                            <td><?=$s['nom'];?></td>
                                            <td><?=$s['postnom'];?></td>
                                            <td><?=$s['sexe'];?></td>
                                            
                                            <td><?=$s['numtel'];?></td>
                                            <td><?=$s['ville'];?></td>
                                            <td><?=$s['created_at'];?></td>
                                            <td>
                                            <a class="btn btn-warning" class="dropdown-item" class="#" href="#" data-toggle="modal" data-target="#vict<?=$s['id'];?>">Modifier
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
                    <h5 class="modal-title" id="exampleModalLabel">Nouveau suspect</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="sus.php" method="post">
                        <input class="form-control" type="text" name="nom" id="" placeholder="nom" required><br>
                        <input class="form-control" type="text" name="postnom" id="" placeholder="Post nom" required><br>
                        
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