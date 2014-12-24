<?php require 'views/header.php'; ?>
            <div class="span7 left-cntnt">
            <div class="apply_form" id="aply">
                <h2 class="apply">Apply leave Here</h2><br>
                <p class="val_err"></p>
                <form name="leave_apply_form" id="leaveform">
                    <label class="form_txt">Subject:</br><textarea name="sub" style="width: 90%" placeholder="Ex: Request for leave" id="leve-subjct"></textarea></label>
                    <div style="float: left; padding-right: 15%; "><label>From:<br/><input type="text" id="datepicker-frm" name="from" class="datepicker" placeholder="From date" style="height: 30px; width: 250px;"></label></div>
                    <div style="float: left;"><label>To:<br/><input type="text" class="datepicker" name="to" placeholder="To date" style="height: 30px; width: 250px;" id="datepicker-to"/></label></div>
                    <div ><label>Description:</br><textarea name="dec" id="leve-description" style="width: 90%; height: 150px;"placeholder="Reason for leave"></textarea></label></div>    
                    <input hidden value="<?php echo $this->user_details[0]['emp_name']; ?>" name="emp_name">
                    <input hidden value="<?php echo $this->user_details[0]['emp_id']; ?>" name="emp_id">
                    <button id="leave_apply_btn" class="btn btn-info">Apply</button> 
                </form>
            </div>
            </div>
            <div class="span5">
            <div class="apply_left">
                <div class="overflow">
                    <div class="tbl-hdr"><h2>Previous leaves</h2></div>
                    <table class="table table-hover table-condensed table-bordered">
                        <tr>
                            <th>
                                Date
                            </th>
                            <th>For</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                            <?php
                            $row = $this->getTakenLeaves;
                            for ($i = 0; $i < sizeof($row); $i++) {
                                ?>
                            <td><a href="#<?php echo $i; ?>" class="modal_trigger5 prsnl-levs-list"><?php echo date("j-m-Y", $row[$i]['fromdate']); ?></a></td>
                                <td><?php echo $row[$i]['subject']; ?></td>
                                <td><a href="#<?php echo $i; ?>" class="modal_trigger5 prsnl-levs-list"><i class="icon-eye-open"></i>
                                        <?php
                                        if($row[$i]['manager_status'] != '' && $row[$i]['manager_status'] == 0){
                                                echo "Rejected"; 
                                            }else{
                                        if ($row[$i]['status'] == '') {
                                            echo "Pending";
                                        } elseif ($row[$i]['status'] == 1) {
                                            echo "Approved";
                                        } elseif ($row[$i]['status'] == 0) {
                                            echo "Rejected";
                                        }
                                            }
                                        ?>
                                    </a></td>
                                <div id="<?php echo $i; ?>" class="popupContainer6 pop_cont" style="display:none;">
                                <header class="popupHeader6">
                                    <span class="header_title">Leave Application</span>
                                    <span class="modal_close"></span>
                                </header>
                                <section class="popupBody6"><p><i><b><?php echo $row[$i]['emp_name']; ?></b><br/>Address:<br/>Employee code:</i></p>
                                    <p><i>Date: <?php echo date("j-m-Y", $row[$i]['apply_date']) ?></i></p>
                                    <p><i>To:<br/>HR Department<br/>SADDAHAQ</i></p><br/>
                                    <p><b>SUB:</b><i><?php echo $row[$i]['subject']; ?></i></p>
                                    <p><i>Dear Sir,</i></p>
                                    <p><i><?php echo $row[$i]['description']; ?>......</i></p><br/>
                                    <p><i>Sincerely,<br/><?php echo $row[$i]['emp_name']; ?>.</i></p>
                                    <?php if($row[$i]['manager_status'] != '' && $row[$i]['manager_status'] == 0) {
                                        ?><p style="color:#e3000f">Rejected by manager..<?php
                                    }?>
                                    <?php if($row[$i]['status'] != '' && $row[$i]['status'] == 0) {
                                        ?><p style="color:#e3000f">Rejected by HR manager..<?php
                                    }?>  
                                    <div>
                                    </div>
                                </section>
                            </div>
                            </tr>
<?php } ?>
                    </table>
                </div>
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
    <script type="text/javascript">
        $(".modal_trigger5").leanModal({top: 50, overlay: 0.2, closeButton: ".modal_close"});
        $(".modal_trigger_status").leanModal({top: 150, overlay: 0.2, closeButton: ".modal_close"});
        
        $("#leave_apply_btn").click(function (e) {
            e.preventDefault();
            var regform = document.forms['leave_apply_form'];
            var fromdate = regform.elements['from'].value;
            var todate = regform.elements['to'].value;
            fromdate = new Date(fromdate).getTime() / 1000;
            todate = new Date(todate).getTime() / 1000;
            if(todate<= fromdate){
                $('#datepicker-to').addClass('month-leavs_err');
                $("#aply").find(".val_err").text("To date Should be greter than From date");
                return false;  
            }
            var to_date = "";
            if (regform.elements['sub'].value == "") {
                $("#leve-subjct").addClass('month-leavs_err').val('').focus();
                $("#aply").find(".val_err").text("*Subject must be requried");
                return false;
            }
            if (regform.elements['from'].value == "") {
                $("#datepicker-frm").addClass('month-leavs_err');
                $("#aply").find(".val_err").text("*From date must be requried");
                return false;
            }
            if (regform.elements['dec'].value == "") {
                $('#leve-description').addClass('month-leavs_err').val('').focus();
                $("#aply").find(".val_err").text("*Reson requred for the leave to get approval");
                return false;
            }
            $.ajax({
                url: "/leaves/apply",
                method: 'post',
                data: {
                    "sub": regform.elements['sub'].value,
                    "from": regform.elements['from'].value,
                    "to": regform.elements['to'].value,
                    "dec": regform.elements['dec'].value,
                    "emp_name": regform.elements['emp_name'].value,
                    "emp_id": regform.elements['emp_id'].value,
                },
                success: function (res) {
                    if(res == -1){
                    $("#aply").find(".val_err").text("From date To date requried");
                     return;  
                 }else{
                    $("#resp-popup").find(".popupBody").html(res);
                    $("#btn-trgr").trigger('click');
                    document.getElementById('leaveform').reset();
                    setTimeout(function () {
                    window.location.reload();
                }, 2000);
                }
                }
            });
        });
</script>
<?php require 'views/footer.php'; ?>