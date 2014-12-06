<?php require 'views/header.php'; ?>
    <div class="post-uodate">
                <h2 class="apply">Post new Update</h2><br>
                <textarea style="width: 50%;" placeholder="Notice:" id="post-txt"></textarea>
                <button class="btn btn-info" value="POST" id="post-butn" type="button" style="color: #FF7171;">Post</button>
            </div>      
    <h2 class="apply">Employees Zone</h2><br>
    <div id="all_emp" data-complete = <?php echo "'".json_encode($this->all_user_details)."'"; ?> >
    <div class="overflow">
        <table class="table table-hover table-condensed table-bordered">
        <tr><th>Name</th>
            <th>Emp Id</th>
            <th>Email</th>
            <th>Phone no</th>
            <th>DOB</th>
            <th>Age</th>
            <th>Designation</th>
            <th>Department</th>
<!--            <th>View full details</th>-->
            <th>Documents zip</th>
        </tr>
        <tr>
            <?php $row = $this->all_user_details; ?>
            <?php for ($i = 0; $i < sizeof($row); $i++) { ?>
                <td align="center"><?php echo $row[$i]['emp_name']; ?></td>
                <td align="center"><?php echo $row[$i]['emp_id']; ?></td>
                <td align="center"><?php echo $row[$i]['emp_email']; ?></td>
                <td align="center"><?php echo $row[$i]['phone_no']; ?></td>
                <td align="center"><?php echo $row[$i]['dob']; ?></td>
                <td align="center"><?php echo $row[$i]['age']; ?></td>
                <td align="center"><?php echo $row[$i]['designation']; ?></td>
                <td align="center"><?php echo $row[$i]['department']; ?></td>
<!--                <td align="center"><a href="#<?php echo $i; ?>" class="modal_trigger7">View full</a></td>-->
                <td align="center" class="dwnld"><a href="#<?php echo $i; ?>" class="modal_trigger7"><i class="icon-download"></i></a></td>
            </tr>
            <tr>
                <td>
                    <div id="<?php echo $i;  ?>" class="popupContainer_all pop_cont" style="display:none;">
                        <header class="popupHeader6">
                            <span class="header_title"><?php echo $row[$i]['emp_name']; ?> Documents</span>
                            <span class="modal_close"></span>
                        </header>
                        <section class="popupBody6">
                           <?php $dir = APP_PATH."/uploads/".$row[$i]['emp_email']."/docs";
                                   $scan = scandir($dir);
                                   $s = 1;?>
                            <table style="margin: auto;">
                                        <tr>
                                            <th>S no.</th>
                                            <th>Doc name</th>
                                            <th>Download</th>
                                        </tr>
                                <?php for($f=2; $f<sizeof($scan); $f++){?>
                                <tr>
                                 <td><?php echo $s?></td>
                                <td class="doc_dwnld_style"><?php echo $scan[$f] ?></td>
                                <td align="center" class="dwnld"><a href="/download/down_docs/<?php echo $row[$i]['emp_email']; ?>&<?php echo $scan[$f] ?>" class="modal_trigger7"><i class="icon-download"></i></a></td>
                                </tr>
                            <?php  $s++;}?>
                            </table>
                             <?php if(!is_dir($dir)){?>
                            <p style="color: red; padding-top: 25px;">We couldn't find any documents!!</p>
                            <?php }?>
                        </section>
                    </div>
                    <!--        // hidden for while-->



                    <div id="payslip-popup" class="popupContainer" style="display:none;">
                        <header class="popupHeader6">
                            <span class="header_title">Upload Payslip</span>
                            <span class="modal_close"></span>
                        </header>

                        <section class="popupBody">

                            <form name="upload_form" id="upload_form">
                                <div class="user_details">
                                    <label>Name</label>
                                    <input name="emp_name" value="<?php echo $row[$i]['emp_name']; ?>"type="text" style="height: 30px; width: 250px;"/>
                                    <input hidden name="mail" value="<?php echo $row[$i]['emp_email']; ?>"/>
                                    <input hidden name="file_name" value="Payslip-<?php echo $date = date("F-Y"); ?>.pdf"/>
                                    <br>
                                    <label>Designation</label>
                                    <input name="designation" value="<?php echo $row[$i]['designation']; ?>" type="text" style="height: 30px; width: 250px;"/>
                                    <br>
                                    <label>Gender</label>
                                    <input name="gender" value="<?php echo $row[$i]['gender']; ?>" type="text" style="height: 30px; width: 250px;"/>
                                    <br>
                                    <label>Date of joining</label>
                                    <input name="doj" type="text" value="10-08-2013" style="height: 30px; width: 250px;"/>
                                    <br>
                                    <label>Date of Birth</label>
                                    <input name="dob" value="<?php echo $row[$i]['dob']; ?>" type="text" style="height: 30px; width: 250px;"/>
                                    <br>
                                    <label>PF A/c</label>
                                    <input name="pf_a/c" type="text" style="height: 30px; width: 250px;" value="N64676998425654"/>
                                    <br>
                                </div>
                                <div class="emr_details">
                                    <label>PAN</label>
                                    <input name="pan" value="79642316493654" type="text" style="height: 30px; width: 200px;" placeholder="Firstname"/>
                                    <br>
                                    <label>Bank A/c</label>
                                    <input name="bank_a/c" value="32355541824" type="text" style="height: 30px; width: 200px;"/>
                                    <br>
                                    <label>IFSC code</label>
                                    <input name="ifsc" type="text" value="HDFC55656C" style="height: 30px; width: 200px;"/>
                                    <br>
                                    <label>Available Calender Days</label>
                                    <input name="available_days" type="text" style="height: 30px; width: 200px;"/>
                                    <br>
                                    <label>Paid days</label>
                                    <input name="paid_days" type="text" style="height: 30px; width: 200px;"/>
                                    <br>
                                    <label>Loss Of Days</label>
                                    <input name="loss_of_days" type="text" style="height: 30px; width: 200px;"/>
                                    <br>
                                </div>
                                <div class="emr_details">
                                    <h4>Earnings</h4>

                                    <label>Basic</label>
                                    <input name="basic" type="text" style="height: 30px; width: 150px;"/>
                                    <br>
                                    <label>HRA</label>
                                    <input name="hra" type="text" style="height: 30px; width: 150px;"/>
                                    <br>
                                    <label>Conveyance Allowance</label>
                                    <input name="conveyance_allowance" type="text" style="height: 30px; width: 150px;"/>
                                    <br>
                                    <label>Special Allowance</label>
                                    <input name="Spcl_allowance" type="text" style="height: 30px; width: 150px;"/>
                                    <br>  
                                    <label><b>(A) Total Earnings</b></label>
                                    <input name="a" type="text" style="height: 30px; width: 150px;"/>
                                    <br>
                                </div><div class="emr_details">
                                    <h4>Deductions</h4>
                                    <label>TDS</label>
                                    <input name="tds" type="text" style="height: 30px; width: 150px;"/>
                                    <br>
                                    <label>PF</label>
                                    <input name="pf" type="text" style="height: 30px; width: 150px;"/>
                                    <br>
                                    <label>PT</label>
                                    <input name="pt" type="text" style="height: 30px; width: 150px;"/>
                                    <br>
                                    <label><b>(B) Total Deductions</b></label>
                                    <input name="b" type="text" style="height: 30px; width: 150px;"/>
                                    <br>
                                    <label><b>Net Salary=(A)-(B)</b></label>
                                    <input name="net" type="text" style="height: 30px; width: 150px;"/>
                                    <br>  
                                </div>
                                <div class="action_btns">
                                </div>
                                <div class="one_half last"><button id="upload_btn" class="btn btn_red">Upload</button></div>
                            </form>   
                        </section>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </table>
    </div>
</div>
<!--success pop up's area-->
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
<script type="text/javascript">
    $(".modal_trigger7").leanModal({top: 50, overlay: 0.2, closeButton: ".modal_close"});
    $(".modal_trigger_status").leanModal({top: 150, overlay: 0.2, closeButton: ".modal_close"});
    
    $(".upld-slip").click(function(){
        var i = $(this).attr("id");
        var data = $("#all_emp").data('complete');
        data = data[i];
        alert((data["emp_email"])? data["emp_email"] : '');
        $("#payslip-popup").find("[name='emp_name']").val((data["emp_name"])? data["emp_name"] : '');
        $("#payslip-popup").find("[name='mail']").val((data["emp_email"])? data["emp_email"] : ''); 
        $("#payslip-popup").find("[name='designation']").val((data["designation"])? data["designation"] : '');
        $("#payslip-popup").find("[name='gender']").val((data["gender"])? data["gender"] : '');
        $("#payslip-popup").find("[name='doj']").val((data["doj"])? data["doj"] : '');
        $("#payslip-popup").find("[name='dob']").val((data["dob"])? data["dob"] : '');
        $("#payslip-popup").find("[name='pf_a/c']").val((data["pf_a/c"])? data["pf_a/c"] : '');
        $("#payslip-popup").find("[name='pan']").val((data["pan"])? data["pan"] : '');
        $("#payslip-popup").find("[name='bank_a/c']").val((data["bank_a/c"])? data["bank_a/c"] : '');
        $("#payslip-popup").find("[name='ifsc']").val((data["ifsc"])? data["ifsc"] : '');
        $("#payslip-popup").find("[name='available_days']").val((data["available_days"])? data["available_days"] : '');
        $("#payslip-popup").find("[name='paid_days']").val((data["paid_days"])? data["paid_days"] : '');
        $("#payslip-popup").find("[name='loss_of_days']").val((data["loss_of_days"])? data["loss_of_days"] : '');
        $("#payslip-popup").find("[name='basic']").val((data["basic"])? data["basic"] : '');
        $("#payslip-popup").find("[name='hra']").val((data["hra"])? data["hra"] : '');
        $("#payslip-popup").find("[name='conveyance_allowance']").val((data["conveyance_allowance"])? data["conveyance_allowance"] : '');
        $("#payslip-popup").find("[name='Spcl_allowance']").val((data["Spcl_allowance"])? data["Spcl_allowance"] : '');
        $("#payslip-popup").find("[name='a']").val((data["a"])? data["a"] : '');
        $("#payslip-popup").find("[name='tds']").val((data["tds"])? data["tds"] : '');
        $("#payslip-popup").find("[name='pf']").val((data["pf"])? data["pf"] : '');
        $("#payslip-popup").find("[name='b']").val((data["b"])? data["b"] : '');
        $("#payslip-popup").find("[name='net']").val((data["net"])? data["net"] : '');
    });
    
    $("#upload_btn").click(function(e){
        e.preventDefault();
        var regform = document.forms["upload_form"]; 
        
        $.ajax({
         url: "/home/pdf",
         method:'post',
         data:{
          "emp_name":regform.elements['emp_name'].value,
          "mail":regform.elements['mail'].value,
          "file_name":regform.elements['file_name'].value,
          "designation":regform.elements['designation'].value,
          "gender":regform.elements['gender'].value,
          "doj":regform.elements['doj'].value,
          "dob":regform.elements['dob'].value,
          "pf_a/c":regform.elements['pf_a/c'].value,
          "pan":regform.elements['pan'].value,
          "bank_a/c":regform.elements['bank_a/c'].value,
          "ifsc":regform.elements['ifsc'].value,
          "available_days":regform.elements['available_days'].value,
          "paid_days":regform.elements['paid_days'].value,
          "loss_of_days":regform.elements['loss_of_days'].value,
          "basic":regform.elements['basic'].value,
          "hra":regform.elements['hra'].value,
          "conveyance_allowance":regform.elements['conveyance_allowance'].value,
          "Spcl_allowance":regform.elements['Spcl_allowance'].value,
          "a":regform.elements['a'].value,
          "tds":regform.elements['tds'].value,
          "pf":regform.elements['pf'].value,
          "pt":regform.elements['pt'].value,
          "b":regform.elements['b'].value,
          "net":regform.elements['net'].value,
         },     
         success:function(res){
             $(".popupContainer").css("display","none");
             $("#resp-popup").find(".popupBody").html(res);
             $("#btn-trgr").trigger('click');
         }
       }); 
    });
   
</script>


                
<?php require 'views/footer.php'; ?>