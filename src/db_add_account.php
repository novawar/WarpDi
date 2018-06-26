<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>สมัครสมาชิก</title>
  <link rel="icon" type="image/png" href="img/logo/warp-di-foot.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
  crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Athiti|Chonburi" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="css/full.css" rel="stylesheet">
<link href="css/font.css" rel="stylesheet">
<link rel="stylesheet" href="css/register.css">

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
  crossorigin="anonymous"></script>


  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
     function alertFunction(){
    swal("มีบางอย่างผิดพลาด อีเมลที่ใช้สมัครเป็นสมาชิกอยู่แล้ว", "","warning",{
        buttons: {
          delete: "OK",
        },
      })
      .then((value) => {
        switch (value) {        
          default:
            location.href = "register.php";
        }
      });
     }
</script>

<script>
     function alertSuccess(){
    swal("สมัครสมาชิกสำเร็จ กรุณาเข้าสู่ระบบใหม่", "","success",{
        buttons: {
          delete: "OK",
        },
      })
      .then((value) => {
        switch (value) {        
          default:
            location.href = "login.php";
        }
      });
     }
</script>
</head>

<body>
<?php
session_start();
    if($_SESSION['u_id'] == !"")
    { 
        echo '<script>window.location.href = "index.php";</script>';  
    }
    require "./connect.php";
    $name =$_POST['u_name'];
    $lastname =$_POST['u_lastname'];
    $username =$_POST['u_email'];
    $password = md5($_POST['u_password']);
    $status = $_POST['u_status'];
    $error = NULL;
    
    
    $check=mysqli_query($con,"select * from db_users where u_username='$username'");
    $checkrows=mysqli_num_rows($check);
    if($checkrows>0) {
        echo '<script type="text/javascript">',
        'alertFunction();',
        '</script>';       
        echo '<script type="text/javascript">';
        echo 'location.href = "register.php";';
        echo '}, 60000);</script>';
    }
    else{
        if (empty($name)) {
            $error = 'Error!';
           echo '<script>
            location.href = "register.php";
            </script>';
        }
        if (empty($lastname)) {
            $error = 'Error!';
            echo '<script>
            location.href = "register.php";
            </script>';
        }
        if (empty($username)) {
            $error = 'Error!';
            echo '<script>
            location.href = "register.php";
            </script>';
        }
        if (empty($password)) {
            $error = 'Error!';
            echo '<script>  
            location.href = "register.php";
            </script>';
        }
        if(!$error){
        $res = mysqli_query($con,"INSERT IGNORE INTO `db_users`(`u_name`, `u_lastname`, `u_username`, `u_password`,`u_status`) VALUES ('$name','$lastname','$username','$password','$status')");
        if ($res) {      
            echo '<script type="text/javascript">',
            'alertSuccess();',
            '</script>';       
            echo '<script type="text/javascript">';
            echo 'location.href = "index.php";';
            echo '}, 60000);</script>';
        }
    }
}
    
?>
    <div class="form boxhead">
        
        <ul class="tab-group">
          <li class="tab active txt-de-h1"><h1>สมัครสมาชิก</h1></li>
          <div class="text-center"><img src="img/logo/warp-di-regis.svg" class="img-fluid" alt="Responsive image"  width="400" height="400"></div>
        </ul>
        
        <div class="tab-content">
          <div id="signup" style="display: block;">   
            <h2 class="txt-de-h1 text-center">ร่วมเป็นหนึ่งในผู้เปิดวาร์ปกับเรา</h2><br><br>
            
            <form action="db_register.php" method="post">
            
            <div class="top-row">
              <div class="field-wrap">
                <label class="txt-de-h1">
                  ชื่อ<span class="req">*</span>
                </label>
                <input type="text" name="u_name" required pattern=".{2,}" title="โปรดใส่ชื่อย่างต่ำ 2 ตัวอักษร" autocomplete="off">
              </div>
          
              <div class="field-wrap">
                <label class="txt-de-h1">
                  นามสกุล<span class="req">*</span>
                </label>
                <input type="text" name="u_lastname" required pattern=".{2,}" title="โปรดใส่นามสกุลอย่างต่ำ 2 ตัวอักษร"  autocomplete="off">
              </div>
            </div>
  
            <div class="field-wrap">
              <label class="txt-de-h1 validationServer03">
                อีเมล<span class="req">*</span>
              </label>
              <input type="email" name="u_email" required="" autocomplete="off">
            </div>
           
            
            <div class="field-wrap">
              <label class="txt-de-h1">
                ตั้งรหัสผ่าน<span class="req">*</span>
              </label>
              <input type="password" required pattern=".{6,}" id="password" title="โปรดตั้งรหัสผ่านอย่างน้อย 6 ตัวอักษร"  name="u_password" autocomplete="off">
            </div>

            <div class="field-wrap">
                <label class="txt-de-h1">
                  ยืนยัน รหัสผ่าน<span class="req">*</span>
                </label>
                <input type="password" id="confirm_password" required="" autocomplete="off">
              </div>
            
            <button type="submit" class="button button-block txt-de-h1"name="button">สร้างบัญชี</button><br>
            <a href="index.php"><p  class="btn btn-danger btn-lg btn-block txt-de-h1 txt-white">ยกเลิก</p></a><br>         
            <button type="button" class="btn btn-link"><a href="login.php">มีบัญชีผู้ใช้แล้ว</a></button>
            </form>
  
          </div>
          
        
        </div><!-- tab-content -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="js/register.js"></script>
        <script>
        var password = document.getElementById("password")
          , confirm_password = document.getElementById("confirm_password");
        function validatePassword(){
          if(password.value != confirm_password.value) {
              confirm_password.setCustomValidity("รหัสผ่านไม่ตรงกัน");
              }
              else{
                  confirm_password.setCustomValidity('');
              }
        }
        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
      </script>
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
