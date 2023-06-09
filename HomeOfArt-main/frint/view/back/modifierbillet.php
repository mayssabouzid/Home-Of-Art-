<?php
    include "../../controller/BilletC.php";
    include_once '../../model/Billet.php';
    require_once ('index.html');

	$billetC = new BilletC();
	$error = "";

	if (
        
    isset($_POST['id_evenement']) &&

isset ($_POST['nbre']) &&
isset($_POST['prix'])
    ){
		if(
        !empty($_POST['id_evenement']) &&
    
    !empty($_POST['nbre']) &&
    !empty($_POST['prix']) 
    

        ) {
            $userb = new Billet(
               
                
                $_POST['id_evenement'],
                
                $_POST['nbre'],
                $_POST['prix']
            );
            
            $billetC->modifierBillet($userb, $_GET['id_billet']);
            //header('Location:afficherUtilisateurs.php');
        }
        else
            $error = "Missing information";
	}

?>
<?php 
//////////////affichage/////////
$billetC= new BilletC();
$listeUsersb= $billetC->afficherBillet();

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Start Bootstrap</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <div id="error">
            <?php echo $error; ?>
        </div>
        <?php
			if (isset($_GET['id_billet'])){
				$userb = $billetC->recupererBillet($_GET['id_billet']);
				
		?>
		
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.html">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 id="tab" class="mt-4" >Evénements</h1>
                        <ol class="breadcrumb mb-4">
                            
                            <li class="breadcrumb-item active">Evénements</li>
                            <li class="breadcrumb-item"><a href="index.html">Page d'accueil</a></li>
                        </ol>
                        <div class="card mb-4">

<br>

                        <div class="d-flex justify-content-center">
<form action="" method="POST" class="w-50">


<input  value = "<?php echo $userb['id_evenement']; ?>" type="number" name="id_evenement" id="id_evenement" class="form-control" placeholder="Nom de l'evenement" autocomplete="off">



  
      <input value = "<?php echo $userb['prix']; ?>" type="number" name="prix" id="prix" class="form-control " placeholder="prix" autocomplete="off">
    
    
      <input value = "<?php echo $userb['nbre']; ?>" type="number" name="nbre" id="nbre" class="form-control " placeholder="type" autocomplete="off">
      
      
     
      <br>
<div class="d-flex justify-content-center">
<input  type="submit" class="btn btn-success" value="modifier" >
      
      <button class="btn btn-warning"><a href="evenement.php">Retour</a><i class="bi bi-arrow-counterclockwise"></i></button>
</div>
      
      
   
   
    



</form>


</div>

                            <div class="card-body">
                                
                                
                                
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i id="liste" class="fas fa-table mr-1"></i>
                                Liste des événements
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Id billet</th>
                                                <th>Id evenement</th>
                                                
                                                <th>Nbre des billets</th>
                                                <th>Prix</th>
                                                
                                                <th>Supprimer</th>
                                                <th>Modifier</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <th>Id billet</th>
                                                <th>Id evenement</th>
                                                
                                                <th>Nbre des billets</th>
                                                <th>Prix</th>
                                                
                                                <th>Supprimer</th>
                                                <th>Modifier</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php 
   foreach($listeUsersb as $userb) {
    ?>
                                            <tr>
                                            
   <td><?php echo $userb['id_billet'] ;?></td>
   <td><?php echo $userb['id_evenement'] ;?></td>
   <td><?php echo $userb['nbre']; ?></td>
   <td><?php echo $userb['prix']; ?></td>
   <td>
   <form method="POST" action="supprimerBillet.php">
   <i class="fas fa-trash-alt btndelete"></i>	<input  type="submit" name="supprimer" value="supprimer">
						<input type="hidden" value=<?PHP echo $userb['id_billet']; ?> name="id_billet">
						</form>
            </td>
            <td><i class="fas fa-edit btnedit"></i>
						
					<a href="billetterie.php?id_event=<?PHP echo $userb['id_billet']; ?>">modifier</a>
                    <?php 
                    
                    
                    ?>
                   
            </td>
          
         
                                            </tr>
                                            
                                            
                                            
                                            <?php } ?>
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
        <?php
		}
		?>
    </body>
</html>
