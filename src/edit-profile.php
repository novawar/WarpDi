<!DOCTYPE html>
<?php
   session_start();
   require 'connect.php';
   if($_SESSION['u_id'] == ""){ 
       echo '<script>window.location.href = "login.php";</script>';  
    }
    foreach ($_GET as $key => $value) {
    $_GET[$key]=addslashes(strip_tags(trim($value)));
    }
    $CHECK_ID = isset($_GET['id']) ? $_GET['id'] : '';
    if ($CHECK_ID !='') { $CHECK_ID=(int) $CHECK_ID; }
    extract($_GET);
      
    require "./connect.php";
    $request = $_GET["request"];
    $query = "SELECT * FROM `db_users` WHERE u_id = '$request'";
    $res = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($res)) {
      if($_SESSION['u_id'] != $row['u_id']){
                  echo '<script>window.location.href = "index.php";</script>'; 
      }
   ?>         
   
<html>
<head>
    <title>Profile : <?php echo $_SESSION['name']?></title>     
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
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    
                  </ul>
                    <form class="form-inline my-2 my-lg-0">
                    <ul class="nav navbar-nav pull-right">
                    <a href="view-profile.php?request=<?php echo $_SESSION['u_id']; ?>"class="txt-white btn button-green btn-success btn-sm mr-sm-2" ><li class="mr-sm-2"><i class="fa fa-user-o" aria-hidden="true"></i> <?= $_SESSION['name'] ?></li></a>
                    <a href="logout.php"class="txt-white btn btn-danger btn-sm mr-sm-2" ><li class="mr-sm-2">ออกจากระบบ</li></a>
                  </ul>
                  </form>    
              </nav>
              <div class="jumbotron bg-banner">
            <div class="container text-center "><br><br><br>          
                <h2 class="display-8 txt-white">ยินดีต้อนรับ! คุณ <?php echo $_SESSION['name']?> <br></h2>   
            </div></div>
            

      <div class="container form boxhead">
      <form action="./updateProfile.php" method="get">
      <div class="container  rounded shadow-dark com-bg-2"><br>
      <div class="container form-group col-md-6">
      <label class="txt-de-h1"><h4 class="txt-de-h1">แก้ไขข้อมูล</h4></label><br>
      <div class="text-right">        
      <label class="txt-de-h1 text-danger">**การแก้ไข้อมูลจะยังไม่แดงผลการเปลี่ยนแปลงทันที! โปรดทำการเข้าสู่ระบบใหม่</label>
    </div><br>
      <label class="txt-de-h1 text-right">ชื่อ</label>

              <input type="text" value="<?php echo $row['u_name']?>" class="form-control" name="u_name" maxlength="100" required><br>
          </div> 
          <div class="container form-group col-md-6">
              <label class="txt-de-h1">นามสกุล</label>
              <input type="text" value="<?php echo $row['u_lastname']?>" class="form-control" name="u_lastname" maxlength="100" required><br>
          </div> 
          <div class="container form-group col-md-6 cur">
              <label class="txt-de-h1">อีเมล</label>
              <input type="email" value="<?php echo $row['u_username']?>" class="form-control" name="u_username" maxlength="100" required><br>
              <button type="submit" class="btn btn-secondary btn-md" name="button">บันทึก</button>
          </div><br><br> 
     </div>


        <?php
        }   
        ?> 
        
     
            </div><br>
        <!--  <div class="container form boxhead">-->
    
               </div><br></br><br></br><br></br><br>
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