<!DOCTYPE html>
<?php
session_start();
$CHECK_SESSION = isset($_SESSION['u_id']) ? $_SESSION['u_id'] : '';
  if($CHECK_SESSION == "")
  { 
    echo '<script>window.location.href = "contact-public.php";</script>';  
  }
	
?>
<html>
<head>
    <title>ติดต่อ</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="img/logo/warp-di-foot.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Athiti|Chonburi" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/full.css" rel="stylesheet">
    <link href="css/font.css" rel="stylesheet">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>
    <script>
    function alertFunction() {
        swal("Hello world!");
    }
    </script>
    
    <script>
    jQuery(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });
    </script>        
    
</head>
<body id="textcolor"> 
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                <a class="navbar-brand" href="index.php"><img src="img/logo/warp-di.svg"></a></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>                  
                </button>
              
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                      <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="warp.php">Warp</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    
                  </ul>
                  <form class="form-inline my-2 my-lg-0">
                  <ul class="nav navbar-nav pull-right">
                  <?php
                  if($_SESSION['status'] =='admin'){
                  ?>
                  <a href="admin-panel.php"class="txt-white btn btn-info btn-sm mr-sm-2" ><li class="mr-sm-2"><i class="fa fa-cog" aria-hidden="true"></i> Admin Panel</li></a>
                  <?php
                  }
                  ?>
                  <a href="view-profile.php?request=<?php echo $_SESSION['u_id']; ?>"class="txt-white btn button-green btn-success btn-sm mr-sm-2" ><li class="mr-sm-2"><i class="fa fa-user-o" aria-hidden="true"></i> <?= $_SESSION['name'] ?></li></a>
                  <a href="logout_contact.php"class="txt-white btn btn-danger btn-sm mr-sm-2" ><li class="mr-sm-2">ออกจากระบบ</li></a>
                </ul>
                </form>
              </nav>
                        
        <div class="jumbotron bg-banner">
            <div class="container text-center "><br><br><br>          
                <h2 class="display-8 txt-white">ติดต่อเรา<br></h2>       
            </div></div><br><br><br>

            <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 text-center boxhead">    
                            <a href="https://www.facbook.com/mildguitar" target="blank"><img class="rounded-circle img-fluid" alt="Responsive image" src="img/logo/facebook.png"  width="200" height="200"></a><br><br>
                            <h2 class="card-title txt-de-h1"><a  href="https://www.facbook.com/mildguitar" target="blank">Facebook</a></h2> 
                            </div>
                            <div class="col-md-4 col-sm-6 text-center boxhead">    
                            <a href="https://www.instagram.com/nevermind_ld" target="blank"><img class="rounded-circle img-fluid" alt="Responsive image" src="img/logo/instagram.png"  width="200" height="200"></a><br><br>   
                            <h2 class="card-title txt-de-h1"><a  href="https://www.instagram.com/nevermind_ld" target="blank">Instagram</a></h2>
                            </div>
                            <div class="col-md-4 col-sm-6 text-center boxhead">    
                            <a href="https://www.twitter.com/mildojodouy" target="blank"><img class="rounded-circle img-fluid" alt="Responsive image" src="img/logo/twitter.png"  width="200" height="200"></a><br><br>
                            <h2 class="card-title txt-de-h1"><a  href="https://www.twitter.com/mildojodouy" target="blank">Twitter</a></h2>
                            </div>
                            <div class="col-md-4 col-sm-6 text-center boxhead"><br><br><br><br>  
                            <a href="mailto: stevemild1995@gmail.com" target="blank"><img class="rounded-circle img-fluid" alt="Responsive image" src="img/logo/mail.png"  width="200" height="200"></a><br><br>
                            <h2 class="card-title txt-de-h1"><a  href="mailto: stevemild1995@gmail.com" target="blank">Email</a></h2>
                            </div>
                   
                        </div>                       
                </div><br><br><br>
      
 


    <!-- ------------------------------------------------Footer-------------------------------------------------------- -->
        <div class="card-body text-center bg-2">
            <blockquote class="blockquote mb-5">
                    <a href="index.php"><img src="img/logo/warp-di-foot.svg"></a><br>
                <p class="txt-de-h1">Warp+Di สังคมแห่งการแบ่งปัน</p>
                <footer class="blockquote-footer"> ©2017 | Copyright
                    <cite title="Source Title">, Steve Mild.</cite>
                </footer>
            </blockquote>
        </div>







</body>

</html>