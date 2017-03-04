<?php


//Session Login
session_start();

if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
}

//Include Files
date_default_timezone_set('Asia/Singapore');
include '../config.php';


//Get Menu
$menu = (isset($_GET['menu']) ? $_GET['menu'] : null);

?>

<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title>Hey Daddy | Admin Panel</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/DT_bootstrap.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">

        
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>

        <!-- Back URL -->
        <script type="text/javascript">

            function MM_goToURL() { //v3.0
              var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
              for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
            }

        </script>
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="http://overseaspicks.com/heydaddy/admin/index.php"><img class="logo" src="../img/logo1.png" width ="40%" />  | Admin Panel</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> 
                                    <i class="icon-user"></i> <?= $_SESSION['user_name']; ?> <i class="caret"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="functions/logout_function.php">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li class="active">
                            <a href="index.php"><i class="icon-chevron-right"></i> Dashboard </a>
                        </li>
                    </ul>
                </div>
                
                <!--/span-->
                <div class="span9" id="content">
                	<!-- success alert 
                    <div class="row-fluid">
                    	
                        <div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h4>Success</h4>
                        	The operation completed successfully
                        </div>
                    </div>
                    -->

                    <!-- Content -->

                    <?php
                        if ($menu == "add_post"){
                             include "add_post.php";
                        } else if ($menu == "edit_post"){
                             include "edit_post.php";   
                        } else {
                    ?>

                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">MANAGE POSTS</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group pull-right" style="margin-bottom:15px;">
                                         <a href="index.php?menu=add_post"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
                                      </div>
                                   </div>
                                    
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Featured Image</th>
                                                <th>Category</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php
                                                $no=1;
                                                $sql = "SELECT * FROM post ORDER BY post_id DESC";
                                                $result = $conn->query($sql);

                                                if ($result->num_rows > 0) {
                                                        while($row = $result->fetch_assoc()) {
                                            ?>

                                            <tr class="odd gradeX">
                                                <td><?php echo $no++; ?></td>
                                                <td width="15%"><?php echo $row["post_title"]?></td>
                                                <td width="40%"><?php echo $row["post_description"]?></td>
                                                <td class="center">
                                                    <a href="../img/post/<?php echo $row["post_image"]; ?>" target="_blank">
                                                        <img src="../img/post/<?php echo $row["post_image"]; ?>"/ width="100px">
                                                    </a>
                                                </td>
                                                <td class="center">
                                                    <span class="label label-<?php echo $row["post_category"]?>">
                                                        <?php echo $row["post_category"]; ?>
                                                    </span>
                                                </td>
                                                <td class="center"> 
                                                    <a href="index.php?menu=edit_post&id=<?= $row["post_id"]; ?>" class="btn btn-info btn-lg"><span class="icon-edit icon-white"></span></a>
                                                    
                                                    <a href="functions/delete_post_function.php?id=<?= $row["post_id"]; ?>" class="btn btn-danger btn-lg" onClick="return confirm('Confirm delete?');">
                                                        <span class="icon-trash icon-white"></span>
                                                    </a>
                                                </td>
                                            </tr>

                                            <?php } } ?>

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>

                    <?php } ?>

                    <!-- END .Content -->

                </div>
            </div>
            <hr>
            <footer>
                <p style="float:right;">&copy; Hey Daddy | Admin Panel 2017</p>
            </footer>
        </div>
        <!--/.fluid-container-->
        <script src="vendors/jquery-1.9.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>
        <script src="assets/scripts.js"></script>
        <script src="assets/DT_bootstrap.js"></script>
        <script>
            $(function() {
                
            });
        </script>

        <!-- Form Related API -->

        <link href="vendors/datepicker.css" rel="stylesheet" media="screen">
        <link href="vendors/uniform.default.css" rel="stylesheet" media="screen">
        <link href="vendors/chosen.min.css" rel="stylesheet" media="screen">

        <link href="vendors/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" media="screen">

        <script src="vendors/jquery.uniform.min.js"></script>
        <script src="vendors/chosen.jquery.min.js"></script>
        <script src="vendors/bootstrap-datepicker.js"></script>

        <script src="vendors/wysiwyg/wysihtml5-0.3.0.js"></script>
        <script src="vendors/wysiwyg/bootstrap-wysihtml5.js"></script>

        <script src="vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

        <script type="text/javascript" src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="assets/form-validation.js"></script>

        <script>
          jQuery(document).ready(function() {   
            FormValidation.init();
          });
              $(function() {
                  $(".datepicker").datepicker();
                  $(".uniform_on").uniform();
                  $(".chzn-select").chosen();
                  $('.textarea').wysihtml5();

                  $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
                      var $total = navigation.find('li').length;
                      var $current = index+1;
                      var $percent = ($current/$total) * 100;
                      $('#rootwizard').find('.bar').css({width:$percent+'%'});
                      // If it's the last tab then hide the last button and show the finish instead
                      if($current >= $total) {
                          $('#rootwizard').find('.pager .next').hide();
                          $('#rootwizard').find('.pager .finish').show();
                          $('#rootwizard').find('.pager .finish').removeClass('disabled');
                      } else {
                          $('#rootwizard').find('.pager .next').show();
                          $('#rootwizard').find('.pager .finish').hide();
                      }
                  }});
                  $('#rootwizard .finish').click(function() {
                      alert('Finished!, Starting over!');
                      $('#rootwizard').find("a[href*='tab1']").trigger('click');
                  });
              });
        </script>

        <!-- END .Form Related API -->
    </body>

</html>