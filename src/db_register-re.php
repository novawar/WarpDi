<header>
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
    swal("สมะครสมาชิกสำเร็จ กรุณาเข้าสู่ระบบใหม่", "","success",{
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
</header>
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
        $res = mysqli_query($con,"INSERT IGNORE INTO `db_users`(`u_name`, `u_lastname`, `u_username`, `u_password`) VALUES ('$name','$lastname','$username','$password')");
        if ($res) {      
            echo '<script type="text/javascript">',
            'alertSuccess();',
            '</script>';       
            echo '<script type="text/javascript">';
            echo 'location.href = "login.php";';
            echo '}, 60000);</script>';
        }
    }
}
    
?>



