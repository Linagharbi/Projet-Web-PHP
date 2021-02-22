<?php 
try
{
 $bdd = new PDO('mysql:host=localhost;dbname=application;charset=utf8', 'root', '');
}
catch (Exception $e) // Si erreur
{
        die('Erreur : ' . $e->getMessage());
}
session_start();
$reponse = $bdd->query('SELECT * FROM utilisateur WHERE ID_utilisateur='.$_SESSION['ID_utilisateur']); 


//Je vérifie tout mes champs
$donnees1 = $reponse->fetch(); 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Accueil</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Calendar CSS -->
    <link href="../assets/plugins/calendar/dist/fullcalendar.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue-dark.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                           <!-- <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />-->
                            <img src="" alt="" />
                            <!-- Light Logo icon -->
                           <!-- <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />-->
                            <img src="" alt="" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                        <!-- <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />-->
                         <img src="" alt=""/>
                         <!-- Light Logo text -->    
                        <!-- <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>-->
                         <img src="" alt="" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                         <li class="nav-item dropdown">
                           
						   <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-message"></i>
                           <div class="notify"> <span class="heartbit"></span><span class="point"></span>  </div>

						  </a>
                              <div class="dropdown-menu mailbox animated slideInUp" aria-labelledby="2">
							
							<?php 
									if ($donnees1['role']==2) {
									
									?>
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
									
                                    <li>
									<?php 
										$reqn = $bdd->prepare('SELECT COUNT(*) AS nbren FROM projet WHERE flag_pr=1 AND user='.$_SESSION['ID_utilisateur']);
											$reqn->execute() ;
											$donneesn = $reqn->fetch();
											
									?>
									
                                        <div class="message-center">
                                          <?php if ($donneesn['nbren']>0 )
										  {
										$repnn = $bdd->query('SELECT * FROM projet WHERE flag_pr=1 AND user='.$_SESSION['ID_utilisateur']) ;
														
												while ($donneesnn = $repnn->fetch())
															{
															
											?>
                                            <a href="#">
                                                <div class="btn btn-danger btn-circle"><i class="ti-calendar"></i></div>
                                                <div class="mail-contnet">
                                                    <h5> Un Nouveau Projet </h5> <span class="mail-desc"><?php echo $donneesnn['nom'] ; ?></span> <span class="time"><?php echo $donneesnn['date_debut'] ; ?></span> </div>
                                            </a>
										  <?php } ?>
											 <?php } ?>
											 
											 <?php $id_user = $_SESSION['ID_utilisateur'] ;
										$reqn1 = $bdd->prepare('SELECT COUNT(*) AS nbren1 FROM tache WHERE flag_t=3 AND projet IN (SELECT ID_projet from projet WHERE user='.$id_user.')');
											$reqn1->execute() ;
											$donneesn1 = $reqn1->fetch();
											
									?>
                                        <div class="message-center">
										<?php 
										 
                                          if ($donneesn1['nbren1']>0 )
										  {
									
										$repnn1 = $bdd->query('SELECT * FROM tache WHERE flag_t=3 AND projet IN (SELECT ID_projet from projet WHERE user='.$id_user.')');
														
												while ($donneesnn1 = $repnn1->fetch())
															{
															
											?>
										  
                                            <a href="#">
                                                <div class="btn btn-warning btn-circle"><i class="ti-bell"></i></div>
                                                <div class="mail-contnet">
                                                    <h5> Une tache est terminée </h5> <span class="mail-desc"><?php echo $donneesnn1['sujet'] ; ?></span> <span class="time"><?php echo $donneesnn1['date_debut'] ; ?></span> </div>
                                            </a>
										  <?php } ?>
											 <?php } ?>
											 <?php 
										$reqv = $bdd->prepare('SELECT COUNT(*) AS nbrev FROM projet WHERE flag_pr=4 AND user='.$_SESSION['ID_utilisateur']);
											$reqv->execute() ;
											$donneesv = $reqv->fetch();
											
										?>
                                        <div class="message-center">
                                          <?php if ($donneesv['nbrev']>0 )
										  {
										$repnv = $bdd->query('SELECT * FROM projet WHERE flag_pr=4 AND user='.$_SESSION['ID_utilisateur']) ;
														
											while ($donneesnv = $repnv->fetch())
															{
															
											?>
										  
                                            <a href="#">
                                                <div class="btn btn-success btn-circle"><i class="ti-check"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Un Projet est Validé </h5> <span class="mail-desc"><?php echo $donneesnv['nom'] ; ?></span> <span class="time"><?php echo $donneesnv['date_fin'] ; ?></span> </div>
                                            </a>
										  <?php } ?>
										   <?php } ?>
										 
                                        </div>
											 
									 
										 
                                        </div>
											
                                    </li>
							
									
                                   
									
									
                                    <li>
                                        <a class="nav-link text-center" href="not.php"> <strong>Voir Tous Les Notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
										<?php } ?>
										
										
										<?php 
									if ($donnees1['role']==3) {
									
									?>
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
									
                                    <li>
									<?php 
										$reqn7 = $bdd->prepare('SELECT COUNT(*) AS nbren7 FROM tache WHERE flag_t=1 AND utilisateur='.$_SESSION['ID_utilisateur']);
											$reqn7->execute() ;
											$donneesn7 = $reqn7->fetch();
											
									?>
									
                                        <div class="message-center">
                                          <?php if ($donneesn7['nbren7']>0 )
										  {
										$repnn7= $bdd->query('SELECT * FROM tache WHERE flag_t=1 AND utilisateur='.$_SESSION['ID_utilisateur']) ;
														
												while ($donneesnn7 = $repnn7->fetch())
															{
															
											?>
										  
                                            <a href="#">
                                                <div class="btn btn-danger btn-circle"><i class="ti-bell"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Une Nouvelle Tâche </h5> <span class="mail-desc"><?php echo $donneesnn7['sujet'] ; ?></span> <span class="time"><?php echo $donneesnn7['date_debut'] ; ?></span> </div>
                                            </a>
										  <?php } ?>
											 <?php } ?>
											 
											
                                        </div>
										 <?php 
										$reqv7 = $bdd->prepare('SELECT COUNT(*) AS nbrev7 FROM tache WHERE flag_t=4 AND utilisateur='.$_SESSION['ID_utilisateur']);
											$reqv7->execute() ;
											$donneesv7 = $reqv7->fetch();
											
										?>
                                        <div class="message-center">
                                          <?php if ($donneesv7['nbrev7']>0 )
										  {
										$repnv7 = $bdd->query('SELECT * FROM tache WHERE flag_t=4 AND utilisateur='.$_SESSION['ID_utilisateur']) ;
														
											while ($donneesnv7 = $repnv7->fetch())
															{
															
											?>
										  
                                            <a href="#">
                                                <div class="btn btn-success btn-circle"><i class="ti-check"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Une Tâche est Validée </h5> <span class="mail-desc"><?php echo $donneesnv7['sujet'] ; ?></span> <span class="time"><?php echo $donneesnv7['date_fin'] ; ?></span> </div>
                                            </a>
										  <?php } ?>
										   <?php } ?>
										 
                                        </div>
											 
									
                                    </li>
							
                                    <li>
                                        <a class="nav-link text-center" href="not.php"> <strong>Voir Tous Les Notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
										<?php } ?>
										
									

										
										<?php 
									if ($donnees1['role']==1) {
									
									?>
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
									
                                    <li>
									<?php 
										$reqn9 = $bdd->prepare('SELECT COUNT(*) AS nbren9 FROM projet WHERE flag_pr=3 ');
											$reqn9->execute() ;
											$donneesn9 = $reqn9->fetch();
											
									?>
									
                                        <div class="message-center">
                                          <?php if ($donneesn9['nbren9']>0 )
										  {
										$repnn9= $bdd->query('SELECT * FROM projet WHERE flag_pr=3 ') ;
														
												while ($donneesnn9 = $repnn9->fetch())
															{
															
											?>
										  
                                            <a href="#">
                                                <div class="btn btn-danger btn-circle"><i class="ti-calendar"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Un Projet est Terminé </h5> <span class="mail-desc"><?php echo $donneesnn9['nom'] ; ?></span> <span class="time"><?php echo $donneesnn9['date_fin'] ; ?></span> </div>
                                            </a>
										  <?php } ?>
											 <?php } ?>
											 
											
                                        </div>
										
											 
									
                                    </li>
							
                                    <li>
                                        <a class="nav-link text-center" href="not.php"> <strong>Voir Tous Les Notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
										<?php } ?>
                            </div>
							
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
								<?php 
										$req000 = $bdd->prepare('SELECT COUNT(*) AS nbre000 FROM message WHERE flag_arch=0 AND flag_lu=0 AND id_dest='.$_SESSION['ID_utilisateur']);
											$req000->execute() ;
											$donnees000 = $req000->fetch();
											
										?>
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-email"></i>
                                <?php if ($donnees000['nbre000']>0 ) { ?> <div class="notify"> <span class="heartbit"></span><span class="point"></span>  </div> <?php } ?>
                            </a> 
                            <div class="dropdown-menu mailbox animated slideInUp" aria-labelledby="2">
                                <ul>
							
                                    <li>
                                        <div class="drop-title"><?php if ($donnees000['nbre000']>1) {echo "Vous avez " ; echo $donnees000['nbre000'] ; echo " nouveaux messages" ;} elseif ($donnees000['nbre000']==1) {echo "vous avez un nouveau message";} else echo "vous n'avez aucun nouveau message"; ?></div>
                                    </li>
                                    <li>
                                        <div class="message-center">
											<?php 
													
																
														$rep = $bdd->query('SELECT * FROM message WHERE flag_lu=0 AND flag_arch=0 AND (id_dest='.$donnees1['ID_utilisateur'].')GROUP BY (ID_message) DESC ') ;
														
														while ($donnees11 = $rep->fetch())
															{
														?>
											 <a href="email.php">                                              
											<div class="mail-contnet">
												<?php  
																$rep1 = $bdd->query('SELECT * FROM utilisateur WHERE ID_utilisateur='.$donnees11['id_exp']) ;
															$donnees0 = $rep1->fetch();
															?>
                                                    <h5><?php echo $donnees0['prenom'] ; echo ' ' ; echo $donnees0['nom'] ;  ?></h5> <span class="mail-desc"><?php echo $donnees11['objet'] ; ?></span> <span class="time"><?php echo $donnees11['date_env'] ; ?> </div>
                                          </a>
											
											<?php 
														} ?>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="email.php"> <strong>Voir tous les e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
						<!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-grid"></i>
                            </a>
                            <div class="dropdown-menu mailbox animated slideInUp">
                                <ul>
                                    <li>
                                        <div class="drop-title">Evènements</div>
                                    </li>
                              
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Voir tous les évènements</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>-->
						
                                               <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                     
                        <!-- ============================================================== -->
                        <!-- Language -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flag-icon flag-icon-tn"></i></a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                         <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-account"></i>
									</a>                           
						   <div class="dropdown-menu dropdown-menu-right scale-up">
                                
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                           
                                            <div class="u-text">
                                                <h5><?php echo $donnees1['prenom']; echo' ' ; echo $donnees1['nom']; ?></h5>
                                                <p class="text-muted"><?php echo $donnees1['email']; ?></p><a href="profil.php" class="btn btn-rounded btn-danger btn-sm">Voir Profil</a></div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="email.php"><i class="ti-email"></i> Inbox</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="profil.php"><i class="ti-settings"></i> Paramètres</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="authentification.php"><i class="fa fa-power-off"></i> Déconnexion</a></li>
                                </ul>
								
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile">
                    <!-- User profile image -->
                        <!-- this is blinking heartbit-->
                        <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                  
                    <!-- User profile text-->
                    <div class="profile-text">
				
                        <h5><?php echo $donnees1['prenom']; ?></h5>
						<?php 
						$rep0 = $bdd->query('SELECT * FROM role WHERE ID_role='.$donnees1['role']); 
						$donnees10 = $rep0->fetch();
						?>
						 <p class="text-info"><?php echo $donnees10['type']; ?></p>
							
                        <a href="email.php" class="" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
                        <a href="authentification.php" class="" data-toggle="tooltip" title="Déconnexion"><i class="mdi mdi-power"></i></a>
                        
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                   <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                                              
                       <p>&nbsp;
                        <li> 
						<a class="has-arrow waves-effect waves-dark" aria-expanded="false" href="index.php"><i class="mdi mdi-book-open-variant"></i><span class="hide-menu">ACCUEIL </span>
						</a>
                         
                        </li>
                    	<?php
						if ($donnees1['role'] == "1" ) 
						{echo ' <li> <a class="has-arrow waves-effect waves-dark" href="employes.php" ><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Gestion des employés</span></a>  
                        </li> ';
						}
						?>
                       
						 
                     <li> <a class="has-arrow waves-effect waves-dark" href="projets.php" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Gestion de projets</span></a>
                         </li>  
                        
						 <?php
						if ($donnees1['role'] == "2" ) 
						{echo ' <li> <a class="has-arrow waves-effect waves-dark" href="suiviemp.php" ><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Suivi</span></a>  
                        </li> ';
						}
						?>
						
                        
  							 <li> <a class="has-arrow waves-effect waves-dark" href="email.php" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Inbox</span></a>
                          
                        </li>
                        <li class="nav-small-cap"></li>
                        <li> 
						<ul aria-expanded="false" class="collapse">
                                
                            </ul>
                        </li>
						
                   </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Profil</h3>
                </div> 
                <div>
                    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> 
                                    <h4 class="card-title m-t-10"><?php echo $donnees1['prenom'];echo ' ' ; echo $donnees1['nom']; ?></h4>
                                    <h6 class="card-subtitle"><?php echo $donnees10['type']; ?></h6>
                                   
                                </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> <small class="text-muted">Email  </small>
                                <h6><?php echo $donnees1['email']; ?></h6> 
                            </div>
							<div class="card-body"> <small class="text-muted">Grade </small>
                                <h6><?php echo $donnees10['type']; ?></h6> 
                            </div>
							<div class="card-body"> <small class="text-muted">Date de naissance </small>
                                <h6><?php echo $donnees1['date_naissance']; ?></h6> 
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                              <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content"><div class="tab-pane active" id="profile" role="tabpanel">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material" action="updateprofile.php" method="post">
											<input type="hidden" name="id" value="<?php echo $_SESSION['ID_utilisateur'] ; ?> ">

                                            <div class="form-group">
                                                <label class="col-md-12">Nom & Prenom </label>
                                                <div class="col-md-12">
                                                    <input type="text" value="<?php echo $donnees1["nom"] ; echo '' ; echo $donnees1["prenom"] ;?> " disabled class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input type="email" value="<?php echo $donnees1["email"] ; ?>" disabled class="form-control form-control-line" name="email">
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label class="col-md-12">Ancien Mot de passe</label>
                                                <div class="col-md-12">
                                                    <input type="password"  class="form-control form-control-line" name="apassword" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Nouveau Mot de passe</label>
                                                <div class="col-md-12">
                                                    <input type="password"  class="form-control form-control-line" name="password" >
                                                </div>
                                            </div>
											 <div class="form-group">
                                                <label class="col-md-12">Confirmer Mot de passe</label>
                                                <div class="col-md-12">
                                                    <input type="password"  class="form-control form-control-line" name="cpassword">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Enregistrer</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
       
				
                
                
    <!-- ============================================================== -->
                <!-- END MODAL -->
                <!-- END MODAL -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme">4</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme working">10</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme">12</a></li>
                            </ul>
                           
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer" align="center">
                <p> © 2018 BTL. Tous Droits Réservés </p>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <script src="../assets/plugins/calendar/jquery-ui.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- Calendar JavaScript -->
    <script src="../assets/plugins/calendar/jquery-ui.min.js"></script>
    <script src="../assets/plugins/moment/moment.js"></script>
    <script src='../assets/plugins/calendar/dist/fullcalendar.min.js'></script>
    <script src="../assets/plugins/calendar/dist/cal-init.js"></script>
    <!-- ============================================================== -->
	   <!-- Chart JS -->
    <script src="../assets/plugins/echarts/echart-all.js"></script>
    <script src="../assets/plugins/echarts/echart-init.js"></script>
    <!-- ============================================================== -->
	
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
	<script type="text/javascript">
	Visdoughnut (<?php echo $nbret ; ?>,<?php echo $nbret1 ; ?>,<?php echo $nbret2 ; ?>,<?php echo $nbret3 ; ?>);
	</script>
	<script type="text/javascript">
		Visdoughnutchef (<?php echo $nbret ; ?>,<?php echo $nbret1 ; ?>,<?php echo $nbret2 ; ?>,<?php echo $nbret3 ; ?>);

</script>
	
</body>

</html>