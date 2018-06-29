<!DOCTYPE html>
<?php
session_start();
  $CHECK_SESSION = isset($_SESSION['u_id']) ? $_SESSION['u_id'] : '';
  if($CHECK_SESSION == !"")
  { 
    echo '<script>window.location.href = "warp.php";</script>';  
  }
?>
<html>
<head>
    <title>วาร์ป</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="img/logo/warp-di-foot.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Athiti|Chonburi" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    

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
    
    <script>
    jQuery(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });
    </script>        
    <script>
    $(document).ready(function(){
    $('#myTable').DataTable();
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
                    <li class="nav-item active">
                      <a class="nav-link" href="warp.php">Warp</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    
                  </ul>
                  <form class="form-inline my-2 my-lg-0"  method="post" action="db_login_warp.php">
                    <input class="form-control mr-sm-2" name="username" type="email" placeholder="Email">
                    <input class="form-control mr-sm-2" name="password" type="password"  placeholder="Password">
                    <button class="btn btn-outline-success my-2 my-sm-1" type="submit">Login</button>
                    <a> &nbsp; </a> 
                    <a class="txt-de-h1"href="register.php"><button type="button" class="btn btn-warning border border-white ">Register</button></a>                                                       
                  </form>     
              </nav>
                        
        <div class="jumbotron bg-banner">
            <div class="container text-center "><br><br><br>          
                <h2 class="display-8 txt-white">วาร์ปที่น่าสนใจ<br></h2>       
            </div></div>
        <div class="container">
        <table class="table table-hover txt-de-h1" id="myTable" style="font-size:1.2em" >
            <thead>
                <tr>
                <th scope="col"></th>                   
                <th scope="col">หัวข้อวาร์ป</th>
                <th scope="col">ประเภท</th>
                <th scope="col">เวลาที่โพส</th>
                </tr>
            </thead>
        <tbody class="cur">  
            <?php
                require "./connect.php";
                $query = "SELECT * FROM `content` ORDER BY `content`.`topic_id` DESC";
                $res = mysqli_query($con, $query);
                $num = 1;
                while ($row = mysqli_fetch_array($res)) { ?>
                  <tr  class = "<?= ($num % 2 != 0 ? 'success' : '')  ?> clickable-row" data-href="/WarpDi/warp-view.php?request=<?php echo $row["topic_id"]; ?>">
                  <td></td>
                  <td><?php echo $row["topic"]; ?></td>
                  <td><?php echo $row["category"]; ?></td>
                  <td><?php echo $row["create_date"]; ?></td>                
                  </tr>
                <?php $num++;
              } ?>
            </tbody>
        </table>
        </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
 

 


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