<?php require 'views/header.php'; ?>
    <div class="post-uodate">
                <h2 class="apply">Post new Update</h2><br>
                <p class="val_err" id="posterr"></p>
                <textarea style="width: 50%;" placeholder="Notice:" id="post-txt"></textarea>
                <button class="btn btn-info" value="POST" id="post-butn" type="button" style="color: #FF7171;">Post</button>
            </div>      
    <h2 class="apply">Employees Zone</h2><br>
    <div id="all_emp" data-complete = <?php echo "'".json_encode($this->all_user_details)."'"; ?> >
    <div class="overflow">
        <table class="table table-hover table-condensed table-bordered">
            <tr>
            <th>Emp Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone no</th>
            <th>DOB</th>
            <th>Department</th>
<!--            <th>View full details</th>-->
            <th>Documents zip</th>
            <th>Edit</th>
            <th>View Full details</th>
        </tr>
        <tr>
            <?php $row = $this->all_user_details; ?>
            <?php for ($i = 0; $i < sizeof($row); $i++) { ?>
                <td align="center"><?php echo $row[$i]['emp_id']; ?></td>
                <td align="center"><?php echo $row[$i]['emp_name']; ?></td>
                <td align="center"><?php echo $row[$i]['emp_email']; ?></td>
                <td align="center"><?php echo $row[$i]['phone_no']; ?></td>
                <td align="center"><?php echo $bdy = date("j-M-Y", $row[$i]['dob']); ?></td>
                <td align="center"><?php echo $row[$i]['department']; ?></td>
                <!-- <td align="center"><a href="#<?php echo $i; ?>" class="modal_trigger7">View full</a></td>-->
                <td align="center" class="dwnld"><a href="#<?php echo $i; ?>" class="modal_trigger7"><i class="icon-download"></i></a></td>
                <td align="center" class="dwnld"><a href="#<?php echo $i; ?>-edit" class="modal_trigger7"><i class="icon-pencil"></i></a></td>
                <td align="center" class="dwnld"><a href="#<?php echo $i; ?>-view" class="modal_trigger7"><i class="icon-watch"></i></a></td>
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
                    
                    <!--Edit popup-->
                    <div id="<?php echo $i;  ?>-edit" class="popupContainer_all pop_cont" style="display:none;">
                        <header class="popupHeader6">
                            <span class="header_title">Edit</span>
                            <span class="modal_close"></span>
                        </header>
                        <section class="popupBody6">
                            <div class="edit_emp_div">
                            <p class="edit-emp edit_name">Name: <span contenteditable="true"><?php echo $row[$i]['emp_name']?></span><i class="icon-pencil"></i></p>
                            <p class="edit-emp edit_phone">Phone no: <span contenteditable="true"><?php echo $row[$i]['phone_no']?></span><i class="icon-pencil"></i></p>
                            <p class="edit-emp edit_address">Address: <span contenteditable="true"><?php echo $row[$i]['address']?></span><i class="icon-pencil"></i></p>
                            <p class="edit-emp edit_designation">Designation: <span contenteditable="true"><?php echo $row[$i]['designation']?></span><i class="icon-pencil"></i></p>
                            <p class="edit-emp edit_bank_account">Bank acc: <span contenteditable="true"><?php echo $row[$i]['bank_account']?></span><i class="icon-pencil"></i></p>
                            <p class="edit-emp edit_pf_account">PF acc: <span contenteditable="true"><?php echo $row[$i]['pf_account']?></span><i class="icon-pencil"></i></p>
                            <p class="edit-emp edit_pan">PAN: <span contenteditable="true"><?php echo $row[$i]['pan']?></span><i class="icon-pencil"></i></p>
                            <p class="edit-emp edit_ifsc">IFSC: <span contenteditable="true"><?php echo $row[$i]['ifsc_code']?></span><i class="icon-pencil"></i></p>
                            <p class="edit-emp edit_basic_salarie">Basic salarie: <span contenteditable="true"><?php echo $row[$i]['basic_salarie']?></span><i class="icon-pencil"></i></p>
                            <p class="edit-emp edit_emil hidden">Email: <span contenteditable="true"><?php echo $row[$i]['emp_email']?></span><i class="icon-pencil"></i></p>
                            </div>
                            <button class="btn btn-info edit_emp_save" value="POST" id="edit_emp_save" type="button" style="color: #1d733a;">Save</button>
                            <button class="btn btn-info edit_emp_cancl" value="POST" id="edit_emp_cancl" type="button" style="color: #FF7171;">Cancel</button>
                        </section>
                    </div>
                    <!--close Edit popup-->
                    
                    <!--view full details popup-->
                    <div id="<?php echo $i;  ?>-view" class="popupContainer_all pop_cont" style="display:none;">
                        <header class="popupHeader6">
                            <span class="header_title"><?php echo $row[$i]['emp_name']?></span>
                            <span class="modal_close"></span>
                        </header>
                        <section class="popupBody6">
                            <div class="edit_emp_div">
                            <p class="view-emp">ID: <span><?php echo $row[$i]['emp_id']?></span></p>
                            <p class="view-emp">Name: <span><?php echo $row[$i]['emp_name']?></span></p>
                            <p class="view-emp">Email: <span><?php echo $row[$i]['emp_email']?></span></p>
                            <p class="view-emp">Father name: <span><?php echo $row[$i]['fathername']?></span></p>
                            <p class="view-emp">Mother name: <span><?php echo $row[$i]['mothername']?></span></p>
                            <p class="view-emp">phone number: <span><?php echo $row[$i]['phone_no']?></span></p>
                            <p class="view-emp">Date of birth: <span><?php echo date('j-M-Y', $row[$i]['dob'])?></span></p>
                            <p class="view-emp">Age: <span><?php echo $row[$i]['age']?></span></p>
                            <p class="view-emp">Blood group: <span><?php echo $row[$i]['bloodgroup']?></span></p>
                            </div>
                            <div class="edit_emp_div">
                            <p class="view-emp">Address: <span><?php echo $row[$i]['address']?></span></p>
                            <p class="view-emp">Gender: <span><?php echo $row[$i]['gender']?></span></p>
                            <p class="view-emp">Spouse name: <span><?php echo $row[$i]['spousename']?></span></p>
                            <p class="view-emp">Designation: <span><?php echo $row[$i]['designation']?></span></p>
                            <p class="view-emp">Department: <span><?php echo $row[$i]['department']?></span></p>
                            <p class="view-emp">Employee type: <span><?php echo $row[$i]['emp_type']?></span></p>
                            <p class="view-emp">Emergency contact name: <span><?php echo $row[$i]['emr_name']?></span></p>
                            <p class="view-emp">Emergency contact relation: <span><?php echo $row[$i]['emr_relation']?></span></p>
                            <p class="view-emp">Emergency contact Phone: <span><?php echo $row[$i]['emr_phone']?></span></p>
                            
                            </div>
                            <div class="edit_emp_div">
                            <p class="view-emp">Emergency contact email: <span><?php echo $row[$i]['emr_email']?></span></p>    
                            <p class="view-emp">Bank account: <span><?php echo $row[$i]['bank_account']?></span></p>
                            <p class="view-emp">PF acc: <span><?php echo $row[$i]['pf_account']?></span></p>
                            <p class="view-emp">PAN: <span><?php echo $row[$i]['pan']?></span></p>
                            <p class="view-emp">IFSC: <span><?php echo $row[$i]['ifsc_code']?></span></p>
                            <p class="view-emp">Basic salarie: <span><?php echo $row[$i]['basic_salarie']?></span></p>
                            <p class="view-emp">Date of joining: <span><?php echo date('j-M-Y', $row[$i]['date_of_joining'])?></span></p>
                            </div>
                        </section>
                    </div>
                    <!--close view full details popup-->
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