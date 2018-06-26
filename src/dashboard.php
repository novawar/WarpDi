<?php
session_start();
  if($_SESSION['u_id'] == "")
  {
    echo "Please Login!";
    exit();
  }
	if($_SESSION['status'] != "admin")
	{
		echo "This page for Admin Only!";
		exit();
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>เน็ตประชารัฐ</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.min.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->
  <script src="js/datatable.min.js"></script>
  <script src="js/datatable-min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.min.js"></script>
</head>
<body>
  <nav class="navbar1 navbar-inverse"  >
  <div class="container-fluid">
    <div class="navbar-header">
       <a class="navbar-brand" href="JavaScript:void(0)" style="color:#fff">เน็ตประชารัฐ</a>
    </div>
    <ul class="nav navbar-nav pull-right">
      <li><a href="javascript:void(0)"><i class="fa fa-user-o" aria-hidden="true"></i> <?= $_SESSION['name'] ?></a> </li>
      <li><a href="logout.php">ออกจากระบบ</a></li>

    </ul>
  </div>
  </nav>
<div class="container-fluid ">
  <div class="row content">
    <div class="col-sm-2 sidenav">
        <hr>
        <ul class="nav nav-pills nav-stacked">
        <li ><a href="status.php">สถานะ Offline</a></li>
          <li ><a href="user.php">เพิ่มผู้ใช้งาน</a></li>
          <li class="active" ><a href="dashboard.php">บัญชีลูกค้า</a></li>
          <li ><a href="add.php?request=add">เพิ่มข้อมูล</a></li>
        </ul><br>
    </div>

    <div class="col-sm-10 col-md-10 ">
      <hr>
        <table class ="table table-bordered " id = "data-table" style="font-size:0.8em">
          <thead>
              <tr>
                <th>ลำดับ</th>
                <th>รหัสคำขอ</th>
                <th>ชุมสาย</th>
                <th>Node IP</th>
                <th>Username</th>
                <th>ชื่อหมู่บ้าน</th>
                <th>ตำบล</th>
                <th>อำเภอ</th>
                <th>ผู้ติดต่อ</th>
                <th>เบอร์ติดต่อ</th>
                <th>สถานที่ติดตั้ง</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              <?php
                require "./connection.php";
                $query = "SELECT * FROM `contract_list`";
                $res = mysqli_query($con, $query);
                $num = 1;
                while ($row = mysqli_fetch_array($res)) { ?>
                  <tr  class = "<?= ($num % 2 != 0 ? 'success' : '')  ?>" >
                    <td><?php echo $num; ?></td>
                    <td><?php echo $row["request_id"]; ?></td>
                    <td><?php echo $row["node"]; ?></td>
                    <td><?php echo $row["node_ip"]; ?></td>
                    <td><?php echo $row["user_name"]; ?></td>
                    <td><?php echo $row["village_name"]; ?></td>
                    <td><?php echo $row["district_name"]; ?></td>
                    <td><?php echo $row["city_name"]; ?></td>
                    <td><?php echo $row["contract"]; ?></td>
                    <td><?php echo $row["tel"]; ?></td>
                    <td><?php echo $row["location"]; ?></td>
                    <td><a href="./viewstatus.php?request=<?php echo $row["id"]; ?>"><i class="<?php if($row["current_status"] == "online"){ echo "fa fa-eye"; }else{ echo "fa fa-circle-o"; } ?>" aria-hidden="true" title="<?php if($row["current_status"] == "online"){ echo "Online"; }else{ echo "Offline"; } ?>"></i></a></td>
                    <td><a href="./viewmap.php?request=<?php echo $row["id"]; ?>" target="_blank"><i class="fa fa-map" aria-hidden="true" title="แผนที่"> </i></a></td>
                    <td><a href="./add.php?request=<?php echo $row["id"]; ?>"><i class="fa fa-pencil-square-o " aria-hidden="true" title="แก้ไข"> </i></a></td>
                    <td><a href="javascript:void(0)" class ="del" data-id ="<?= $row['id']; ?>" ><i class="fa fa-trash" aria-hidden="true" title="ลบ"></i></a></td>
                  </tr>
                <?php $num++;
              } ?>
            </tbody>
          </table>
    </div>
  </div>
</div>
  <script type="text/javascript">
    $(document).ready(function() {
    $('#data-table').DataTable( {
        "lengthMenu": [[15, 30, 50, -1], [15, 30, 50, "All"]],
        stateSave: true
    }
    );
    });
  </script>
  <script>
    $('.del').click(function() {
      var del = $(this).attr('data-id');
      swal({
        title: 'ท่านจะลบข้อมูลหรือ ไม่?',
       
        type: 'error',
        showCancelButton: true,
        confirmButtonText: 'ตกลง',
        cancelButtonText: 'ยกเลิก',
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false
      }).then(function () {
       $.ajax({
         type:"POST",
         url:"db_del.php",
         data:{id:del},
         success:function(res){
           swal("เสร็จสิ้น!","","success").then(value=>{
            location.reload();
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
</body>
</html>
