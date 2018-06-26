<!doctype html>
<?php
session_start();
$CHECK_SESSION = isset($_SESSION['u_id']) ? $_SESSION['u_id'] : '';
  if($CHECK_SESSION == "")
  { 
    echo '<script>window.location.href = "index.php";</script>';  
  }
  if($_SESSION['status'] != "admin")
  { 
    echo '<script>window.location.href = "index.php";</script>';  
  }
?>
<html>
<head>
	<meta charset="utf-8">
    <title>Admin Panel : Warp Stat</title>
	<link rel="icon" type="image/png" href="img/logo/warp-di-foot.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Athiti|Chonburi" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/data.css" rel="stylesheet">
    <link href="css/full.css" rel="stylesheet">
    <link href="css/font.css" rel="stylesheet">
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>
	<script src="./node_modules/jquery/dist/jquery.min.js"></script>

	<script>
		$(document).ready(function() {
			$.ajax({
				url: 'table-warp.php',
				dataType: 'json',
				success: showTable
			});
		});

		function showTable(result) {
			if(result){
				var len = result.length;
				var txt = "";
				if(len>0){
					for(var i=0;i<len;i++){
						txt += "<tr><td>"+result[i][0]+"</td><td>"+result[i][1]+"</td><td>"+result[i][2]+"</td><td>"+result[i][3]+"</td><td>"+result[i][4]+"</td><td>"+result[i][5]+"</td><td><a href='del_warp.php?topic_id="+result[i][0]+"''><i class='fa fa-trash text-danger' aria-hidden='true'></i></a></td></tr>";
					}
					if (txt != "") {
						$('#table-res').append(txt);
					}
				}
			}
		}

		$(function() {
			 $('button').click(function () {
			 	var data = $('form').serializeArray();
			 	$.ajax({
			 		url: 'db_register.php',
			 		data: data,
			 		type: 'post',
			 		dataType: 'json',
			 		success: callback
			 	});
			 });
		});

	</script>
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
            <div class="container text-left"><p><a href="admin-panel.php" class="btn btn-info btn-md txt-white  border border-white">< กลับสู่หน้าหลัก Panel</a></p></div>

        <br><br>    
                    
      
        <div class="container text-right">
        <h3 class="display-8 txt-de-h1">รายการโพสทั้งหมด<br></h3><br>       
        <h5 class="display-8 txt-de-h1 text-danger">**โปรดระวัง!! การลบโพสสามารถทำได้ในครั้งเดียวโดยไม่ต้องทำการยืนยัน!<br></h5> </div>
        <div class="container">
            
		<table class="table table-hover txt-de-h1" id="table-res" >
			<thead>
				<tr>
					<th>ID</th>
					<th>Topic</th>
					<th>Detail</th>
					<th>Warp</th>
					<th>Category</th>
					<th>Author</th>
					<th>action</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
    </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

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
<script>
        $('.del2').click(function() {
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
            window.location.href = "index.php"
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
       

</html>