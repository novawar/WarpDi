<!DOCTYPE html>
<?php
session_start();
  $CHECK_SESSION = isset($_SESSION['u_id']) ? $_SESSION['u_id'] : '';
  if($CHECK_SESSION == "")
  { 
    echo '<script>window.location.href = "login.php";</script>';  
  }
  foreach ($_GET as $key => $value) {
    $_GET[$key]=addslashes(strip_tags(trim($value)));
  }
  $CHECK_ID = isset($_GET['id']) ? $_GET['id'] : '';
  if ($CHECK_ID !='') { $CHECK_ID=(int) $CHECK_ID; }
  extract($_GET);
?>
<?php
    $check = $_GET["request"];
    require "./connect.php";
    $request = $_GET["request"];
    $query = "SELECT * FROM `content` WHERE topic_id = '$request'";
    $res = mysqli_query($con, $query);
    $row = mysqli_fetch_array($res); 
    if($row["topic"] == NULL)
    {
        echo '<script>window.location.href = "warp.php";</script>';  
    }
 ?>
<html>
<head>
    <title>วาร์ป : <?php echo $row["topic"]; ?></title>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="img/logo/warp-di-foot.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Athiti|Chonburi" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/full.css" rel="stylesheet">
    <link href="css/font.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.min.css">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.min.js"></script>
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
     <script type="text/javascript">
    $(document).ready(function(){
        $(".spoilerButton").click(function (e) { 
            e.preventDefault()
            var foo=$(this).attr('href')
            $('#'+foo).slideToggle(1); 
        });
    });
    </script>

    
</head>
<body id="textcolor" class="com-bg"> 
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
                    <li class="nav-item active">
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
                  <a href="logout_warp.php"class="txt-white btn btn-danger btn-sm mr-sm-2" ><li class="mr-sm-2">ออกจากระบบ</li></a>
                </ul>
                </form> 
              </nav>
              <div class="jumbotron bg-banner">
            </div>
            <div class="container text-left">      
                <label><a href="warp.php" class=""><< ย้อนกลับ</a></label>
                
            </div>
              <div class="container  rounded shadow-dark com-bg-2"><br>
                <form action="" class="form boxhead" method="get">
                <div class="container form-group col-md-11">
                <label><h4 class="txt-de-h1 font-weight-bold"><?php echo $row["topic"]; ?></h4></label><br>
                <label><h6><kbd class="txt-whte"><?php echo $row["category"]; ?></kbd></h6></label><br><br>
                <label><h5 class="txt-de-h1"><?php echo $row["detail"]; ?></h5></label>
                <hr>
                <div class="contentBoxFooter">
                    <a href="a1" class = "spoilerButton btn btn-md button-yel">เปิดวาร์ป</a>
                </div><br>
                <div id="a1" class="spoiler" style="display: none;"><h5 class="txt-de-h1"><a target="blank" class="text-danger" href="<?php echo $row["warp"];?>"><?php echo $row["warp"];?></a></h5></div> 
                <?php
                if($_SESSION['u_id'] == $row['author_id']){
                ?>
                <div class="contentBoxFooter text-right">
                <a href="edit-post.php?request=<?= $row['topic_id']; ?>" class ="btn btn-md btn-secondary"><h8 class="txt-white">แก้ไข</h8></a>
                <a href="javascript:void(0)" class ="del btn btn-md btn-danger" data-id ="<?= $row['topic_id']; ?>" ><h8 class="txt-white">ลบ</h8></a>
                </div>
                <?php
                }
                ?>
            </div><br>
           
            </form>
            </div>
        </div><br><br><br>

        <!--Comment Box -->
   
        <?php
            
            require "./connect.php";
            $request = $_GET["request"];
            $query = "SELECT * FROM `comment` WHERE topic_id = '$request'";
            $res = mysqli_query($con, $query);
            $num=1;
            while ($row = mysqli_fetch_array($res)) { ?>
               
            <div class="container">
            <div class="row">
            <div class="col"></div>
            <div class="col-10  rounded shadow-dark-com com-bg-2">
                <h8 class="txt-de-h1">
                <br>
                &nbsp; &nbsp;&nbsp;<?php echo $row["info"]; ?><br>
                <hr>
                <div class="txt-sm">
                &nbsp; &nbsp;&nbsp;<?php echo $row["create_date"]; ?>
                 &nbsp; &nbsp;&nbsp;โดย : <?php echo $row["author_id"]; ?>
                </h8>
                <?php
                if($_SESSION['u_id'] == $row['author_id']){
                ?>
                
                &nbsp; &nbsp;&nbsp;<a href="javascript:void(0)" class ="del2 badge badge-danger"  data-id2 ="<?= $row['comment_id']; ?>" ><h8 class="txt-white">ลบ</h8></a><br><br> 
                <?php
                }
                ?>
                </div>
            </div>
            <div class="col"></div><br>
            </div>
            </div>
                
                <div><br></div>
              <?php $num++;
            } ?>
        </div>
        
        </div><br><br><br><br>

            

                

       
  
            
        <?php
        
        require "./connect.php";
        $request = $_GET["request"];
        $query = "SELECT * FROM `content` WHERE topic_id = '$request'";
        $res = mysqli_query($con, $query);
        $row = mysqli_fetch_array($res); 
        ?>
        <br>
        <div class="container form-group   rounded shadow-dark-com col-6 com-bg-2"><br>
        <form action="./insert_comment.php" method="post">
            <div class="container form-group col-md-8"> 
                <textarea class="form-control" type="text" name="info" value="" maxlength="500" ></textarea><br>
                <input hidden  class="form-control" name="topic_id" value ="<?php echo $row["topic_id"]; ?>" type="text" maxlength="50" required>    
            <button type="submit" class="btn btn-success btn-sm  button-green cur"> <h8>ส่งข้อความ</h8></button>         
        </div><br>  
        </form>
        </div><br>
        

        <script>
        $('.del').click(function() {
            var del = $(this).attr("data-id");
            swal({
            title: 'คุณต้องการลบวาร์ปนี้หรือไม่ ?',
       
            type: 'error',
            showCancelButton: true,
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false
            }).then(function () {
            $.ajax({
                type:"POST",
                url:"db_del.php",
                data:{topic_id:del},
                success:function(res){
            swal("เสร็จสิ้น!","","success").then(value=>{
            window.location.href = "warp.php"
                    });
                }
            });
            }, function (dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
            if (dismiss === 'cancel') {
                 return false;
                }
              })
            })
        </script>

        <script>
        $('.del2').click(function() {
            var del = $(this).attr('data-id2');
            swal({
            title: 'คุณต้องการลบข้อความนี้หรือไม่ ?',
       
            type: 'error',
            showCancelButton: true,
            confirmButtonText: '&nbsp;ใช่&nbsp;',
            cancelButtonText: 'ยกเลิก',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false
            }).then(function () {
            $.ajax({
                type:"POST",
                url:"del_comment.php",
                data:{comment_id:del},
                success:function(res){
            swal("เสร็จสิ้น!","","success").then(value=>{
            window.location.href = "warp-view.php?request=<?php echo $row['topic_id']; ?>"
                    });
                }
            });
            }, function (dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
            if (dismiss === 'cancel') {
                 return false;
                }
              })
            })
        </script>


 
    
   
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
