<!DOCTYPE html>
<?php
session_start();
$CHECK_SESSION = isset($_SESSION['u_id']) ? $_SESSION['u_id'] : '';
  if($CHECK_SESSION == "")
  { 
    echo '<script>window.location.href = "index.php";</script>';  
  }
	
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>หน้าแรก</title>
    <link rel="icon" type="image/png" href="img/logo/warp-di-foot.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Athiti|Chonburi" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/full.css" rel="stylesheet">
    <link href="css/font.css" rel="stylesheet">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
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
</head>
<body id="textcolor"> 



        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                <a class="navbar-brand" href="index.php"><img src="img/logo/warp-di.svg"></a></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>                  
                </button>
              
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                      <a class="nav-link" href="index-warpdi.php">Home <span class="sr-only">(current)</span></a>
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
                  <?php
                  if($_SESSION['status'] =='admin'){
                  ?>
                  <a href="admin-panel.php"class="txt-white btn btn-info btn-sm mr-sm-2" ><li class="mr-sm-2"><i class="fa fa-cog" aria-hidden="true"></i> Admin Panel</li></a>
                  <?php
                  }
                  ?>
                  <a href="view-profile.php?request=<?php echo $_SESSION['u_id']; ?>"class="txt-white btn button-green btn-success btn-sm mr-sm-2" ><li class="mr-sm-2"><i class="fa fa-user-o" aria-hidden="true"></i> <?= $_SESSION['name'] ?></li></a>
                  <a href="logout.php"class="txt-white btn btn-danger btn-sm mr-sm-2" ><li class="mr-sm-2">ออกจากระบบ</li></a>
                </ul>
                </form>
              </nav>
              
                              
        <div class="jumbotron bg-banner">
            <div class="container text-center "><br><br><br>
                <h1 class="display-2 txt-white">Warp+Di <br> </h1><br>
                <h3 class="display-8 txt-white">เว็บที่จะทำให้คุณเปิดวาร์ปไปได้ทุกที่ <br>ไม่พลาดทุกประสบการณ์ที่ตื่นเต้น</h3><br>
                <p><a href="warp.php" class="btn btn-warning btn-lg txt-de-h1 button-yel border border-white">Let's go »</a></p>   
            </div></div>
            
        <div class="jumbotron bg-ban-2">           
            <h1 class="display-8 text-center txt-de-h1">เว็บไซต์แห่งแรก <br>ที่เปิดให้แบ่งปันวาร์ป</h1><br><br>
            <div class="text-center"><img src="img/warp-1.png" class="img-fluid" alt="Responsive image"></div>
        </div>
        
        <div class="jumbotron bg-banner bg-ban-3">
                <h1 class="display-8 text-center txt-white">เข้าถึงทุกอย่างได้ง่ายขึ้น <br>ด้วยการเปิดวาร์ป</h1><br><br><br>
                
                


                <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 text-center">    
                                    <img class="rounded-circle img-fluid" alt="Responsive image" src="img/logo/icon-1.png"  width="250" height="250">
                                <br><br>
                                <h2 class="card-title txt-white">รวมทุกอย่าง</h2>
                                <h5 class="txt-white">รวมวาร์ปทุกอย่างที่น่าสนใจ
                                    <br>ไม่ว่าจะเป็นสถานที่ท่องเที่ยว ร้านอาหาร ผู้คน หนัง เกม ดนตรีและศิลปะต่างๆ</h5>
                            </div>
                            <div class="col-md-4 col-sm-6 text-center">    
                                    <img class="rounded-circle img-fluid" alt="Responsive image" src="img/logo/icon-2.png"  width="250" height="250">
                                <br><br>   
                                <h2 class="card-title txt-white">ไร้ตัวตน</h2>
                                <h5 class="txt-white">สามารถพูดคุยแลกเปลี่ยน
                                    <br>ความคิดเห็นกันได้โดยไม่ต้องกังวลว่าใครจะรู้ตัวตนของเรา</h5>
                            </div>
                            <div class="col-md-4 col-sm-6 text-center">    
                                    <img class="rounded-circle img-fluid" alt="Responsive image" src="img/logo/icon-3.png"  width="250" height="250">
                                <br><br>
                                <h2 class="card-title txt-white">สังคมแห่งการแบ่งปัน</h2>
                                <h5 class="txt-white">สังคมไร้ตัวตนที่เต็มไปด้วยกันแบ่งปัน
                                    <br>สามารถแบ่งปันและเข้าชมวาร์ปต่างๆตามที่ต้องการได้</h5>
                            </div>
                   
                        </div>                       
                </div>
        </div>
  

        



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