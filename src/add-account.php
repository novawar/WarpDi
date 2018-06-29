<!doctype html>
<?php
session_start();
  if($_SESSION['u_id'] == "")
  { 
    echo '<script>window.location.href = "warp-public.php";</script>';  
  }
  if($_SESSION['status'] != "admin")
  { 
    echo '<script>window.location.href = "warp-public.php";</script>';  
  }
	
?>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="img/logo/warp-di-foot.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Athiti|Chonburi" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/data.css" rel="stylesheet">
    <link href="css/full.css" rel="stylesheet">
    <link href="css/font.css" rel="stylesheet">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>
    <script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
	

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                <a class="navbar-brand" href="index.php"><img src="img/logo/warp-di.svg"></a></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>                  
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
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
                    <a href="view-profile.php?request=<?php echo $_SESSION['u_id']; ?>"class="txt-white btn button-green btn-success btn-sm mr-sm-2" ><li class="mr-sm-2"><i class="fa fa-user-o" aria-hidden="true"></i> <?= $_SESSION['name'] ?></li></a>
                    <a href="logout.php"class="txt-white btn btn-danger btn-sm mr-sm-2" ><li class="mr-sm-2">ออกจากระบบ</li></a>
                  </ul>
                  </form>

              </nav>
			  <div class="jumbotron bg-banner">
            <div class="container text-center "><br><br><br>          
                <h2 class="display-8 txt-white">Admin Panel<br></h2>       
            </div></div>
            <div class="container text-left"><p><a href="account-stat.php" class="btn btn-info btn-md txt-white  border border-white">< ย้อนกลับ</a></p></div>
<div class="container form boxhead">
	<div class="container">
	<form action="db_add_account.php" method="post">
	<div class="container form-group col-md-6">
		<label class="txt-de-h1">ชื่อ</label>
		<input type="text" class="form-control" value="" name="u_name" required pattern=".{2,}" title="โปรดใส่ชื่อย่างต่ำ 2 ตัวอักษร" >
	</div>
	<div class="container form-group col-md-6">
		<label class="txt-de-h1">นามสกุล</label>
		<input type="text" class="form-control" value="" name="u_lastname"  required name >
	</div>
	<div class="container form-group col-md-6">
		<label class="txt-de-h1">อีเมล</label>
		<input type="email"  maxlength="125" value="" class="form-control" name="u_email"  required name id="email">
	</div>
	<div class="container form-group col-md-6">
		<label class="txt-de-h1">รหัสผ่าน</label>
		<input type="password" class="form-control" value="" name="u_password" required pattern=".{6,}" id="password" title="โปรดตั้งรหัสผ่านอย่างน้อย 6 ตัวอักษร" id="password">
	</div>
	<div class="container form-group col-md-6">
		<label class="txt-de-h1">ยืนยันรหัสผ่าน</label>
		<input type="password" class="form-control" value="" id="confirm_password" name=""  required name autocomplete="off">
	</div>
	<div class="container form-group col-md-6">
	<label class="txt-de-h1">สถานะ</label>
	<select name ="u_status"  class="form-control" >
	<option type="text" value="">สมาชิกทั่วไป</option>
	<option type="text "value="admin">ผู้ดูแลระบบ</option>
	
	</select>
	</div><br>
	<div class="col-md-12 cur">
	<button type="submit" class="btn btn-success mx-auto btn-lg w-50 d-block button-green cur" style="width: 200px; height:60px"> <h4>บันทึก</h4></button><br>             
		<br></br>
	</div>      
</form>
</div>
	</div>
		

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

       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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

</html>