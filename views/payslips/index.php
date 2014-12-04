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

    <?php require 'views/footer.php'; ?>