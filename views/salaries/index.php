<?php require 'views/header.php'; ?>

<!--<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '313736202115940',
      xfbml      : true,
      version    : 'v2.2'
    });
    
    function onLogin(response) {
  if (response.status == 'connected') {
    FB.api('/me?fields=first_name', function(data) {
      var welcomeBlock = document.getElementById('fb-welcome');
      welcomeBlock.innerHTML = 'Hello, ' + data.first_name + '!';
    });
  }
}

FB.getLoginStatus(function(response) {
  // Check login status on load, and if the user is
  // already logged in, go directly to the welcome message.
  if (response.status == 'connected') {
    onLogin(response);
  } else {
    // Otherwise, show Login dialog first.
    FB.login(function(response) {
      onLogin(response);
    }, {scope: 'user_friends, email'});
  }
});

    // ADD ADDITIONAL FACEBOOK CODE HERE
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<h1 id="fb-welcome"></h1>-->
<div class="salaries span7 table-responsive">
    <select id="slct-year"></select>
    <select id='slct-month'>
    <option value=''>--Select Month--</option>
    <option value="1" selected>January</option>
    <option value="2">February</option>
    <option value="3">March</option>
    <option value="4">April</option>
    <option value="5">May</option>
    <option value="6">June</option>
    <option value="7">July</option>
    <option value="8">August</option>
    <option value="9">September</option>
    <option value="10">October</option>
    <option value="11">November</option>
    <option value="12">December</option>
    </select><br><br>
    <h4 id="empty" style="display: none"></h4>
    <h4 id="selct-mnth-prcd"></h4>
    <table class="table table-hover table-bordered" id="table1">
        <tr><th>Select</th>
            <th>Name</th>
            <th>Max-payable</th>
            <th>#Leaves</th>
            <th>Net-payable</th>
        </tr>
        <?php // $row = $this->all_user_details; ?>
        <?php // for ($i = 0; $i < sizeof($row); $i++) { ?>
        
<!--        <tr>
            <td><input type="checkbox" name="checkbox" value="1" class="checkbox"></td>
            <td  class="sal-name">//<?php // echo $row[$i]['emp_name']; ?></td>
            <td id=""><input type="text"  class="max-pay" value="20000" style="border: none; height: 50px; width: 95px; margin-top: 0px; outline: none;"></td>
            <td id=""><input type="text"  class="mtnh-leavs" style="border: none; height: 50px; width: 95px; margin-top: 0px; outline: none;"></td>
            <td contenteditable="true"  class="tol-pay  ">//<?php ?>19000</td>
            <td hidden><input type="text" name="" value="//<?php // echo $row[$i]['emp_email']; ?>" class="pay_email"></td>
            <input type="hidden" value="//<?php // echo date('t')?>" id="avl-days">
            <input type="hidden" name="" value="Payslip-//<?php // echo $date = date("F-Y"); ?>.pdf" class="payslip-name">
            <input type="hidden" name="" value="//<?php // echo $row[$i]['designation']; ?>" class="desigination">
            <input type="hidden" name="" value="//<?php // echo $row[$i]['gender']; ?>" class="gender">
            <input type="hidden" name="" value="date of joing" class="doj">
            <input type="hidden" name="" value="//<?php // echo $row[$i]['dob']; ?>" class="dob">
            <input type="hidden" name="" value="pf account no not in db" class="pf_ac">
            <input type="hidden" name="" value="PAN not in DB" class="pan">
            <input type="hidden" name="" value="BANK ac" class="bank">
            <input type="hidden" name="" value="ifsc code" class="ifsc">
            <input type="hidden" name="" value="avible days" class="avilble_days">
            <input type="hidden" name="" value="paid days" class="paid_days">
            <input type="hidden" name="" value="loss of days" class="loss-days">
            <input type="hidden" name="" value="basic" class="basic">
            <input type="hidden" name="" value="hra" class="hra">
            <input type="hidden" name="" value="conveyance_allowance" class="conveyance">
            <input type="hidden" name="" value="Spcl_allowance" class="Spcl_allowance">
            <input type="hidden" name="" value="(A) Total Earnings" class="a">
            <input type="hidden" name="" value="TDS" class="tds">
            <input type="hidden" name="" value="PF" class="pf">
            <input type="hidden" name="" value="PT" class="pt">
            <input type="hidden" name="" value="(B) Total Deductions" class="b">
            <input type="hidden" name="" value="Net Salary=(A)-(B)" class="a-b">
            <td>No</td>
            <td><input type="button" value="add"  class="add"></td>
        </tr>-->
            <?php  // }?>
</table>
    <input type="button" id="process" class="btn btn-info" value="Process"name="textarea_hidden" style="color: black;">
</div>
<div class="span5 overflow">
            <div class="tbl-hdr"><h2>Download Bank Statements</h2></div>
            <table border="2" class="table table-hover table-condensed table-bordered" id="bank_stmnt-table">
                <tr><th style="text-align: center;">Statements</th>
                    <th style="text-align: center;">Get</th>
                </tr>
                <tr class="td-apndg-bnk-stmnt">
                    
                </tr>
            </table>
            </div>
<!--<div style="float: left">
 <ol id="addhereform">
     <li><?php // echo strtotime("1 January 2014")?> <?php // echo strtotime("1 January 2014")?></li>
</ol>
</div>-->

<!--<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=371390049680975&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>
document.getElementById('login-btn').onclick = function() {
  FB.login(function(response) {
    Log.info('FB.login response', response);
  }, {scope: 'user_friends, publish_actions'});
  return false;
}
</script>
<div class="fb-login-button" data-scope="user_friends, publish_actions" data-max-rows="1" data-size="medium"></div>
-->

<div class="ajax-loading"></div>
<a id= "btn-trgr" href="#resp-popup" class="modal_trigger_status" hidden></a>
<div id="resp-popup" class="popupContainer_status" style="display:none;">
            <header class="popupHeader7">
                <span class="header_title"></span>
                <span class="modal_close"></span>
            </header>
    <section class="popupBody"></section>
</div>
        </div>
    </div>
</div>
<script>
$(".modal_trigger_status").leanModal({top: 150, overlay: 0.2, closeButton: ".modal_close"});
</script>
<?php require 'views/footer.php'; ?>