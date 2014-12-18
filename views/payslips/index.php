<?php require 'views/header.php'; ?>


<h2 class="apply">Uploade Payslips</h2></br>
<form action="/payslips/payslip_upload" method="POST" enctype="multipart/form-data">
   <div class="form-group">
      <label for="userid">UserId</label>
      <input type="text" name="useremail" 
             placeholder="Type userID" style="height: 25px">
   </div>
   <div class="form-group">
      <label for="inputfile">File input</label>
      <input type="file" name="file">
   </div>
<input type="submit" class="btn-info btn-small" name="submit"/>
</form>

<div class="top" style="background: aqua;">
    <img id="img1" src="/images/board.png" style="display: none;">
    <img id="img2" src="/images/board.png" style="display: none;">

</div>

<script>
    setInterval(function () {
     $('#img1').animate( {height: "show" }, 2000);
     $('#img1').delay( 2000 );
     $('#img1').animate( {height: "hide" }, 2000);
    }, 2500);
    setInterval(function () {
     $('#img2').animate( {height: "show" }, 2000);     
     $('#img2').delay( 2000 );
     $('#img2').animate( {height: "hide" }, 2000);
    }, 4000);
    </script>
    <?php require 'views/footer.php'; ?>