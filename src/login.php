<!DOCTYPE html>
<?php
  session_start();
  $CHECK_SESSION = isset($_SESSION['u_id']) ? $_SESSION['u_id'] : '';
  if($CHECK_SESSION == !"")
  { 
    echo '<script>window.location.href = "index.php";</script>';  
  }
?>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>สมัครสมาชิก</title>
  <link rel="icon" type="image/png" href="img/logo/warp-di-foot.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
  crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Athiti|Chonburi" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="css/full.css" rel="stylesheet">
<link href="css/font.css" rel="stylesheet">
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
  crossorigin="anonymous"></script>

  <link rel="stylesheet" href="css/register.css">
  
  
</head>

<body>
  
    <div class="form">
        
        <ul class="tab-group">
          <li class="tab active txt-de-h1"><h1>ลงชื่อเข้าสู่ระบบ</h1></li>
          <div class="text-center"><img src="img/logo/warp-di.svg" class="img-fluid" alt="Responsive image"  width="400" height="400"></div>
        </ul>
        
        <div class="tab-content">
          <div id="signup" style="display: block;">   
            <h2 class="txt-de-h1 text-center">Hello World ! , Welcome to the Jungle</h2><br><br>
            
            <form action="db_login.php" method="post">
            <div class="field-wrap">
              <label class="txt-de-h1">
                อีเมล<span class="req">*</span>
              </label>
              <input type="email" name="username" required="" autocomplete="off">
            </div>
            
            <div class="field-wrap">
                <label class="txt-de-h1">
                  รหัสผ่าน<span class="req">*</span>
                </label>
                <input type="password" name="password" required="" autocomplete="off">
              </div>
            
            <button type="submit" class="button button-block txt-de-h1">เข้าสู่ระบบ</button><br>      
            <button type="button" class="btn btn-link"><a href="register.php">สร้างบัญชีผู้ใช้ใหม่</a>  </button>
            </form>
  
          </div>
          
        
        </div><!-- tab-content -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="js/register.js"></script>

        <script>
        function goBack() {
           window.history.back();
        }
        </script>
  </div><br><br>


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
