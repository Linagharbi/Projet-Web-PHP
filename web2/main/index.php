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
	 <!-- page CSS -->
    <link href="../assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="../assets/plugins/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
	 <!-- Footable CSS -->
    <link href="../assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
	<!-- Color picker plugins css -->
    <link href="../assets/plugins/jquery-asColorPicker-master/css/asColorPicker.css" rel="stylesheet">  
    <!-- Date picker plugins css -->
    <link href="../assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
	<!-- Custom CSS --><!-- Custom CSS -->
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
<?php
if (isset($_GET['supp']))
{	$count=$bdd->prepare('DELETE FROM event WHERE ID_event='.$_GET['id'].' ');
    $count->execute();	
}
?>
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
                                                    <h5><?php echo $donnees0['prenom'] ; echo ' ' ; echo $donnees0['nom'] ;  ?></h5> <span class="mail-desc"><?php echo $donnees11['objet'] ; ?></span> <span class="time"><?php echo $donnees11['date_env'] ; ?> 
												</div>
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
           <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Accueil</h3>
                </div>
              
                <div class="">
                    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div>
            </div>
			<div class="card-group">
             <?php 
			 if ($donnees1['role'] == "2" )
			 {
			 ?> 
            
             
                    <!-- Column -->
                    <!-- Column -->
                 
                    <!-- Column -->
                    <!-- Column --> <?php
					$req33 = $bdd->prepare('SELECT COUNT(*) AS nbre3 FROM projet ');
					$req33->execute() ;
					$donnees33 = $req33->fetch();
									
					$req3 = $bdd->prepare('SELECT COUNT(*) AS nbre FROM projet WHERE user='.$_SESSION['ID_utilisateur']);
					$req3->execute() ;
					$donnees3 = $req3->fetch();
					
					
					?>
                    <!-- Column -->
                    <!-- Column -->
                   
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
			<div class="row">
			<div class="col-lg-9">
						<div class="card">
                            <div class="card-body">
							<h6 class="card-subtitle"></h6>
                                <h4 class="card-title">Liste de mes projets</h4>
								<div class="table-responsive" >
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="5">
                                        <thead>
                                            <tr>
                                                
                                                <th>Nom</th>
                                                <th>Date fin</th>
												 <th>Prgression</th>
                                                 <th>Action</th>
                                                
                                            </tr>
                                        </thead>
											<tbody>
					
					<?php  $req = $bdd->query('SELECT * FROM projet WHERE user='.$_SESSION['ID_utilisateur']);

							while ($donnees = $req->fetch())
							{
							?>
						  <tr>
						  <?php
							$re0 = $bdd->prepare('SELECT COUNT(*) AS b FROM tache where projet='.$donnees['ID_projet']);
							$re0->execute() ;
							$don0 = $re0->fetch();
											
							$re1 = $bdd->prepare('SELECT COUNT(*) AS x FROM tache WHERE statut="Validée" and projet='.$donnees['ID_projet']);
							$re1->execute() ;
							$don1 = $re1->fetch(); ?>
						  <td><?php echo $donnees['nom']; ?></td>
							<td><?php echo $donnees['date_fin']; ?></td>
							<td> <div class="progress progress-xs margin-vertical-10 ">
                                  <div class="progress-bar bg-danger " style="width: <?php if ($don1['x']>0) { echo ((($don1['x'])/ ($don0['b']))*100); } ?>%; height:6px;" title="<?php if ($don1['x']>0) { echo ((($don1['x'])/ ($don0['b']))*100); } ?>%"></div>
                                  </div> </td>
							
							<td> <?php echo '<a href="detailsprojet.php?id='.$donnees["ID_projet"].'">' ;?> details</td>
							</tr>
							<?php }?>
				
						</tbody>
												
                                       
                                         <tfoot>
										 <tr>
                                                <td colspan="7">
                                                    <div class="text-right">
                                                        <ul class="pagination"> </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
								</div>
								</div>
								</div>
								
		<?php
					$req33 = $bdd->prepare('SELECT COUNT(*) AS nbre3 FROM projet ');
					$req33->execute() ;
					$donnees33 = $req33->fetch();
									
					$req3 = $bdd->prepare('SELECT COUNT(*) AS nbre FROM projet WHERE user='.$_SESSION['ID_utilisateur']);
					$req3->execute() ;
					$donnees3 = $req3->fetch();
					?>
			 <div class="col-lg-3">
						<div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Nouveaux Projets </h4>
                                <div class="d-flex">
                                    <div class="align-self-center">
                                        <h4 class="font-medium m-b-0"><i class="ti-angle-up text-success"></i><?php
									$req00 = $bdd->prepare('SELECT COUNT(*) AS nbre0 FROM projet' );
											$req00->execute() ;
											$donnees00 = $req00->fetch();
											
											$req0 = $bdd->prepare('SELECT COUNT(*) AS nbre FROM projet WHERE statut="Nouveau" AND user='.$_SESSION['ID_utilisateur']);
											$req0->execute() ;
											$donnees0 = $req0->fetch();
											echo '  ' ; echo $donnees0['nbre'] ; ?></h4></div>
                                    <div class="ml-auto">
                                        <div id="spark9"></div>
                                    </div>
                                </div>
                            </div>
                        </div> </br>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Mes Projets </h4>
                                <div class="d-flex">
								
                                    <div class="align-self-center">
                                        <h4 class="font-medium m-b-0"><i class="ti-angle-up text-success"></i> 
										<div id="details" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="myModalLabel">Details</h4> </div>
                                                            <div class="modal-body">
															<?php
															$reqnnn1 = $bdd->prepare('SELECT * FROM projet WHERE user='.$_SESSION['ID_utilisateur']);
															$reqnnn1->execute() ;
															while ($donneesnnn1 = $reqnnn1->fetch())
															{
															
															$reqnnn3 = $bdd->prepare('SELECT COUNT(*) AS n FROM tache WHERE flag_t=3 AND (projet='.$donneesnnn1['ID_projet'].')');
															$reqnnn3->execute() ;
															$donneesnnn3 = $reqnnn3->fetch();
															
															if ( $donneesnnn3['n'] > 0)
															{
															echo $donneesnnn1['nom'] ; echo ' :' ;echo ' '; echo $donneesnnn3['n'] ;  ?> Tâche(s) Terminée(s) </br> <?php }}  ?>
															</div>
															</div>
															</div>
															</div>
										<?php
										
											echo '  ' ; echo $donnees3['nbre'] ; ?></h4></div>
                                    <div class="ml-auto">
                                        <div id="spark8"></div>
                                    </div>
                                </div>
                            </div>
                        </div> </br>
                        
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Tâches Terminées</h4>
                                <div class="d-flex">
                                    <div class="align-self-center">
                                        <h4 class="font-medium m-b-0"><i class="ti-angle-up text-success" data-toggle="modal" data-target="#details" title="Plus de details"></i> <?php
											$req4 = $bdd->prepare('SELECT COUNT(*) AS nbre FROM tache');
											$req4->execute() ;
											$donnees4 = $req4->fetch();
											echo '  ' ; echo $donneesn1['nbren1'] ; ?></h4></div>
                                    <div class="ml-auto">
                                        <div id="spark10"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php } ?>
					
                <!-- ============================================================== -->
                <!-- Start Page Content -->
				<!-- column --> <?php
					$req10 = $bdd->prepare('SELECT COUNT(*) AS nbre0 FROM projet WHERE statut="Nouveau"');
					$req10->execute() ;
					$donnees10 = $req10->fetch();
					$nbr =$donnees10['nbre0'];
					echo '<br> ';
					$req01 = $bdd->prepare('SELECT COUNT(*) AS nbre1 FROM projet WHERE statut="En Cours"');
					$req01->execute() ;
					$donnees01 = $req01->fetch();
					$nbr1 =$donnees01['nbre1'] ; 
					echo '<br> ';
					$req2 = $bdd->prepare('SELECT COUNT(*) AS nbre2 FROM projet WHERE statut="Terminé"');
					$req2->execute() ;
					$donnees2= $req2->fetch();
					$nbr2= $donnees2['nbre2'] ;
					echo '<br> ';
					$req3 = $bdd->prepare('SELECT COUNT(*) AS nbre3 FROM projet WHERE statut="Validé"');
					$req3->execute() ;
					$donnees3 = $req3->fetch();
					$nbr3= $donnees3['nbre3'] ;
					if ($donnees1['role'] == "1" )
					{ ?>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Progression de Projets </h4> 
                                <div id="bar-chart" style="width:100%; height:500px;"></div>
                            </div>
                        </div>
                    </div>
					<?php } ?>
              <!-- ============================================================== -->
				
					<!-- ============================================================== -->
					</br> 
					<div class="col-lg-7">
					<div class="card">
                            <div class="card-body" >
					<?php if ($donnees1['role'] == "1") 
										{ ?>
										<div class="table-responsive" >
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="5">
                                        <thead>
                                            <tr>
                                                
                                                <th>Nom</th>
                                                <th>Date fin</th>
												 <th>Prgression</th>
                                                 <th>Responsable</th>
                                                <th>Periode Estimée </th>
												<th>Periode de validation</th>
                                            </tr>
                                        </thead>
											<tbody>
					<?php
					        $req = $bdd->query('SELECT * FROM projet ');

							while ($donnees = $req->fetch())
							{ ?>
							 
							<tr>
						  <?php
							$re0 = $bdd->prepare('SELECT COUNT(*) AS b FROM tache where projet='.$donnees['ID_projet']);
							$re0->execute() ;
							$don0 = $re0->fetch();
											
							$re1 = $bdd->prepare('SELECT COUNT(*) AS x FROM tache WHERE statut="Validée" and projet='.$donnees['ID_projet']);
							$re1->execute() ;
							$don1 = $re1->fetch(); ?>
						  <td><?php echo $donnees['nom']; ?></td>
							<td><?php echo $donnees['date_fin']; ?></td>
							<td> <div class="progress progress-xs margin-vertical-10 ">
                                  <div class="progress-bar bg-danger " style="width: <?php if ($don1['x']>0) { echo ((($don1['x'])/ ($don0['b']))*100); } ?>%; height:6px;" title="<?php if ($don1['x']>0) { echo ((($don1['x'])/ ($don0['b']))*100); } ?>%"></div>
                                  </div> </td>
							<?php $re10 = $bdd->prepare('SELECT * FROM utilisateur WHERE ID_utilisateur='.$donnees['user']);
							$re10->execute() ;
							$don10 = $re10->fetch(); ?>
							<td> <?php echo $don10['nom'] ; echo ' ' ; echo $don10['prenom'] ; ?></td>
							<td> <?php  $d=$donnees['date_fin'];
									$p=(strtotime($d) - strtotime($donnees['date_debut']));
									$p=$p/86400;
							      echo $p ; echo " Jours" ; ?>
							</td>
							<td> <?php 
							if ($donnees['statut'] == "Validé")
							{ $d1=date("Y-m-d" );
							  $p1=(strtotime($d1) - strtotime($donnees['date_debut']));
							  $p1=$p1/86400; echo $p1 ; echo " Jours" ;}
							else echo "--" ; ?>
							</td>
							
							</tr>
							<?php }?>
				
						</tbody>
												
                                       
                                         <tfoot>
										 <tr>
                                                <td colspan="7">
                                                    <div class="text-right">
                                                        <ul class="pagination"> </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div> <?php } ?>
								</div>
								</div>
								</div>
								
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body" >
							<?php 
					if (($donnees1['role'] == "1" ) || ($donnees1['role'] == "2" )  )
					{ ?>
                                <button class="pull-right btn-rounded btn-success" data-toggle="modal" data-target="#myModal">Ajouter</button>
					<?php } ?>
                                <h3 class="card-title">Liste des Evènements</h3>
                                <!-- ============================================================== -->
                                <!-- To do list widgets -->
                                <!-- ============================================================== -->
                                <div class="to-do-widget m-t-20">
                                    <!-- .modal for add task -->
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Ajouter</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="ajoutev.php" > 
													<div class="row p-t-20">
														 <div class="col-md-6">
														<div class="form-group">
														<label class="control-label">Categories</label>
														<select name="categories" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" required >
															<option value='Important'>Important</option>
															<option value='Evènement'>Evènement</option>
															<option value='Réunion'>Réunion</option>
															<option value='Rendez-vous'>Rendez-vous</option>
															<option value='Formation'>Formation</option>
														</select>
														</div>
														</div>
															<div class="col-md-6">
																<div class="form-group">
																<label class="control-label">Details</label>
																<input type="text" name="details" class="form-control" required placeholder="Saisir ... " ></div>
															</div>
														</div>
											
											<div class="row p-t-20">
                                            <div class="col-md-6">
                                               <div class="form-group">
											  <label class="control-label">Date </label>
                                                <div class="input-group-append">
												<input name="date" type="date" class="form-control" required placeholder="dd/mm/yyyy">
                                                
                                                    <span class="input-group-text"><i class="icon-calender"></i></span>
                                                </div>
												</div>
                                            </div>
											<div class="form-group">
												
												<input name="expediteur" value="<?php echo $_SESSION['ID_utilisateur'] ; ?>" hidden class="form-control">
											</div>
										
														<?php $req20= $bdd->prepare('SELECT * FROM utilisateur WHERE ID_utilisateur !='.$_SESSION['ID_utilisateur']);
															$req20->execute() ;
															?>
														 <div class="col-md-6">
																<label>Envoyer à :</label>
																<select class="selectpicker"  name="destinataire[]" multiple  data-style="form-control btn-secondary" required >
																<?php 
																while ($donnees20 = $req20->fetch())
																{ ?>
																<option value="<?php echo $donnees20['ID_utilisateur']; ?>" ><?php echo $donnees20['nom']; echo ' ' ;echo $donnees20['prenom']; ?></option>
															<?php } ?> 
																</select>
														</div>
														</div>
                                                   
                                               
                                                <div class="modal-footer">
													<input type="submit" value="Ajouter" name="ajout" class="btn btn-info " />
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                </div>
												
												 </form>
												 </div> 
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
									<?php
												$d=date("Y-m-d");
												
												
												$req10 = $bdd->query('SELECT * FROM event');

												while ($donnees10 = $req10->fetch())
												{ 
												?>
                                    <ul class="list-task todo-list list-group m-b-0" data-role="tasklist">
                                        <li class="list-group-item" data-role="task">
                                            <div class="checkbox checkbox-info">
                                                 <label class=""> <strong><span><?php echo $donnees10['categories'] ; ?></span></strong> <?php if($donnees10['date']== $d) echo '<span class="label label-danger">Aujourd"hui</span>';?> </label>
												
												<button type="button" class="btn btn-sm btn-icon btn-pure btn-outline" data-toggle="modal" data-target="#myModal1" data-original-title="Modifier"><i class="ti-marker-alt" ></i></button>
												<?php echo '
												<a href="index.php?supp&id='.$donnees10["ID_event"].'">
												<button type="button" class="btn btn-sm btn-icon btn-pure btn-outline " data-toggle="tooltip" data-original-title="Supprimer"><i class="ti-trash" aria-hidden="true"></i></button></a>'; ?>    
												<?php $req100 = $bdd->query('SELECT * FROM utilisateur where ID_utilisateur='. $donnees10['ID_exp']);
													$donnees100 = $req100->fetch();?>											
												<h5 class="card-subtitle"> Créer par : <?php echo $donnees100['nom'] ;echo ' ' ;echo $donnees100['prenom'] ; ?></h5>
												<h6 class="card-subtitle"> Date : <?php echo $donnees10['date'] ; ?></h6>
												<h6 class="card-subtitle"> Details : <?php echo $donnees10['details'] ; ?> <h6>
												<h6 class="card-subtitle" name="id" hidden> Id event : <?php echo $donnees10['ID_event'] ; ?> <h6>
                                            </div>
                                           
                                       
													
													 </li>
										
                                    </ul>
									  <!-- .modal for add task -->
									  
									  <?php 
									  $id=$donnees10['ID_event'];
									  $req010 = $bdd->query('SELECT * FROM event WHERE ID_event='.$donnees10['ID_event']);
									$donnees010 = $req010->fetch();
												{ 
												?>
                                    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Modifier</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="modifierev.php" > 
													<div class="row p-t-20">
														 <div class="col-md-6">
														<div class="form-group">
														<label class="control-label">Categories</label>
														<select name="categories" class="form-control custom-select" disabled data-placeholder="Choose a Category" tabindex="1" required >
															<option value='Important'>Important</option>
															<option value='Evènement'>Evènement</option>
															<option value='Réunion'>Réunion</option>
															<option value='Rendez-vous'>Rendez-vous</option>
															<option value='Formation'>Formation</option>
														</select>
														</div>
														</div>
															<div class="col-md-6">
																<div class="form-group">
																<label class="control-label">Details</label>
																<input type="text" name="details" class="form-control" value="<?php echo $donnees010['details'] ; ?>" ></div>
															</div>
														</div>
											
											<div class="row p-t-20">
                                            <div class="col-md-6">
                                               <div class="form-group">
											  <label class="control-label">Date </label>
                                                <div class="input-group-append">
												<input name="date" type="date" class="form-control" value="<?php echo $donnees010['date'] ; ?>">
                                                
                                                    <span class="input-group-text"><i class="icon-calender"></i></span>
                                                </div>
												</div>
                                            </div>
											<div class="form-group">
												
												<input name="id" value="<?php echo $donnees010['ID_event'] ; ?>" hidden class="form-control">
											</div>
											<div class="form-group">
												
												<input name="expediteur" value="<?php echo $_SESSION['ID_utilisateur'] ; ?>" hidden class="form-control">
											</div>
										
														
														 <div class="col-md-6">
																<label>Envoyer à :</label>
																<select class="selectpicker"  name="destinataire[]" multiple  data-style="form-control btn-secondary" required >
																<?php
																$req03 = $bdd->prepare('SELECT * FROM utilisateur WHERE ID_utilisateur !='.$_SESSION['ID_utilisateur']);
																$req03->execute() ;
																while ($donnees03 = $req03->fetch())
																{ 
															
																if ($donnees03['ID_utilisateur'] == ($donnees010['ID_dest'] ))
																$selected= 'selected';
															   else $selected='';
																?>
																<OPTION value="<?php echo $donnees03['ID_utilisateur'];?>" <?php echo $selected ;?> > <?php echo $donnees03['nom']; echo ' ' ; echo $donnees03['prenom']; ?></OPTION> 
																<?php } ?>						
																	</SELECT>
														</div>
														</div>
                                                   
                                               <?php } ?>
                                                <div class="modal-footer">
													<input type="submit" value="Enregistrer" name="edit" class="btn btn-info " />
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                </div>
												
												 </form>
												 </div> 
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
												<?php } ?>
                                </div>
								
                            </div>
                        </div>
						</div>
                   
                <!-- Modal Add Category -->
              
			
				 <!-- Row -->
				<div class="col-lg-7">
				  <div class="tab-pane active" id="profile" role="tabpanel">
                                    <div class="card-body">
                                        
                                      <!-- column -->
									  <?php
									 
									  if ($donnees1['role'] == "3") 
										{
										$req10 = $bdd->prepare('SELECT COUNT(*) AS nbre00 FROM tache WHERE statut="à faire" and utilisateur='.$_SESSION['ID_utilisateur'] );
										$req10->execute() ;
										$donnees10 = $req10->fetch();
										$nbret0 =$donnees10['nbre00'];
									
										$req20 = $bdd->prepare('SELECT COUNT(*) AS nbre10 FROM tache WHERE statut="En Cours" and utilisateur='.$_SESSION['ID_utilisateur'] );
										$req20->execute() ;
										$donnees20 = $req20->fetch();
										$nbret10 =$donnees20['nbre10'] ; 
										
										$req30 = $bdd->prepare('SELECT COUNT(*) AS nbre20 FROM tache WHERE statut="Terminée" and utilisateur='.$_SESSION['ID_utilisateur']);
										$req30->execute() ;
										$donnees30 = $req30->fetch();
										$nbret20= $donnees30['nbre20'] ;
										
										$req40 = $bdd->prepare('SELECT COUNT(*) AS nbre40 FROM tache WHERE statut="Validée" and utilisateur='.$_SESSION['ID_utilisateur']);
										$req40->execute() ;
										$donnees40 = $req40->fetch();
										$nbret30= $donnees40['nbre40'] ;
										echo '
										<div class="col-lg-12">
											<div class="card">
												<div class="card-body">
													<h4 class="card-title">Progression Tâches</h4>
													<div id="doughnut-chart" style="width:100%; height:300px;"></div>
												</div>
											</div>
										</div>' ; } 
										if ($donnees1['role'] == "2") 
										{
										$req10 = $bdd->prepare('SELECT COUNT(*) AS nbre00 FROM projet WHERE statut="Nouveau" and user='.$_SESSION['ID_utilisateur'] );
										$req10->execute() ;
										$donnees10 = $req10->fetch();
										$nbret =$donnees10['nbre00'];
									
										$req20 = $bdd->prepare('SELECT COUNT(*) AS nbre10 FROM projet WHERE statut="En Cours" and user='.$_SESSION['ID_utilisateur'] );
										$req20->execute() ;
										$donnees20 = $req20->fetch();
										$nbret100 =$donnees20['nbre10'] ; 
										
										$req30 = $bdd->prepare('SELECT COUNT(*) AS nbre20 FROM projet WHERE statut="Terminé" and user='.$_SESSION['ID_utilisateur'] );
										$req30->execute() ;
										$donnees30 = $req30->fetch();
										$nbret200 =$donnees30['nbre20'] ; 
										
										$req40 = $bdd->prepare('SELECT COUNT(*) AS nbre30 FROM projet WHERE statut="Validé" and user='.$_SESSION['ID_utilisateur']);
										$req40->execute() ;
										$donnees40 = $req40->fetch();
										$nbret300= $donnees40['nbre30'] ;
										echo '
										<div class="col-lg-12">
											<div class="card">
												<div class="card-body">
													<h4 class="card-title">Progression de Projets</h4>
													<div id="doughnut-chartchef" style="width:100%; height:300px;"></div>
												</div>
											</div>
										</div>' ; } ?>
										
										
										<!-- column -->
										
                                    </div>
                               </div>
							</div>	</div>	
      

    <!-- ============================================================== -->
                <!-- END MODAL -->
                <!-- END MODAL -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
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
	  <!-- Footable -->
    <script src="../assets/plugins/footable/js/footable.all.min.js"></script>
    <script src="../assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <!--FooTable init-->
    <script src="js/footable-init.js"></script>
    <!-- ============================================================== -->
	<!-- Color Picker Plugin JavaScript -->
    <script src="../assets/plugins/jquery-asColorPicker-master/libs/jquery-asColor.js"></script>
    <script src="../assets/plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js"></script>
    <script src="../assets/plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="../assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
	    <!-- This page plugins -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/switchery/dist/switchery.min.js"></script>
    <script src="../assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="../assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
    <script src="../assets/plugins/dff/dff.js" type="text/javascript"></script>
    <script type="text/javascript" src="../assets/plugins/multiselect/js/jquery.multi-select.js"></script>
	<script type="text/javascript">
	Visdoughnut (<?php echo $nbret0 ; ?>,<?php echo $nbret10 ; ?>,<?php echo $nbret20 ; ?>,<?php echo $nbret30 ; ?>);
	</script>   
	<script type="text/javascript">
		Visdoughnutchef (<?php echo $nbret ; ?>,<?php echo $nbret100 ; ?>,<?php echo $nbret200 ; ?>,<?php echo $nbret300 ; ?>);

</script>
   <script type="text/javascript">
   // Colorpicker
    $(".colorpicker").asColorPicker();
    $(".complex-colorpicker").asColorPicker({
        mode: 'complex'
    });
    $(".gradient-colorpicker").asColorPicker({
        mode: 'gradient'
    });
    // Date Picker
    jQuery('.mydatepicker, #datepicker').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    jQuery('#date-range').datepicker({
        toggleActive: true
    });
    jQuery('#datepicker-inline').datepicker({
        todayHighlight: true
    });   
   jQuery(document).ready(function() {
       
        // For select 2
        $(".select2").select2();
        $('.selectpicker').selectpicker();
 
        // For multiselect
        $('#pre-selected-options').multiSelect();
        $('#optgroup').multiSelect({
            selectableOptgroup: true
        });
        $('#public-methods').multiSelect();
        $('#select-all').click(function() {
            $('#public-methods').multiSelect('select_all');
            return false;
        });
        $('#deselect-all').click(function() {
            $('#public-methods').multiSelect('deselect_all');
            return false;
        });
        $('#refresh').on('click', function() {
            $('#public-methods').multiSelect('refresh');
            return false;
        });
        $('#add-option').on('click', function() {
            $('#public-methods').multiSelect('addOption', {
                value: 42,
                text: 'test 42',
                index: 0
            });
            return false;
        });
        $(".ajax").select2({
            ajax: {
                url: "https://api.github.com/search/repositories",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;
                    return {
                        results: data.items,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            escapeMarkup: function(markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 1,
            //templateResult: formatRepo, // omitted for brevity, see the source of this page
            //templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
        });
    });
    </script>
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
<script type="text/javascript">
	 Vischart(<?php echo $nbr ; ?>,<?php echo $nbr1 ; ?>,<?php echo $nbr2 ; ?>,<?php echo $nbr3 ; ?>);		
</script>
</body>

</html>