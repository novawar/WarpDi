<htm>
<head>
</head>
<body>        
<form action="./postData.php" method="get">
<div class="container form-group col-md-6">
    <label class="txt-de-h1">หัวข้อ</label>
    <input type="text" class="form-control" name="topic" maxlength="50" required>
</div>
<div class="container form-group col-md-6">
    <label class="txt-de-h1">รายละเอียด</label>
    <textarea type="text" class="form-control" name="detail" maxlength="500" required name></textarea>
</div>
<div class="container form-group col-md-6">
    <label class="txt-de-h1">ที่อยู่วาร์ป <p class="text-secondary">ตัวอย่างเช่น : https://www.website.com</p></label>
    <input type="url"  maxlength="125"  class="form-control" name="warp"  required>
</div>
<div class="container form-group col-md-6">
<label class="txt-de-h1">ประเภท</label>
<select name = "category" class="form-control" required name>
<option selected></option>
<option value="ทั่วไป">ทั่วไป</option>
<option value="บุคคล">บุคคล</option>
<option value="หนัง">หนัง</option>
<option value="เพลง">เพลง</option> 
<option value="สตอรี่">สตอรี่</option>
<option value="ดราม่า">ดราม่า</option>
<option value="วีดีโอ">วีดีโอ</option>
<option value="อื่นๆ">อื่นๆ</option>
</select>
</div><br>
<div class="col-md-12 cur">
    <button type="submit" class="btn btn-warning mx-auto btn-lg w-50 d-block button-yel cur" style="width: 200px; height:60px"> <h4>สร้างวาร์ป</h4></button><br>         
    <a href="warp.php"><p  class="btn btn-danger mx-auto btn-lg w-50 d-block ">ยกเลิก</p></a>
    <br></br>
</div>      
</form>
</body>
</htm>