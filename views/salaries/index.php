<?php require 'views/header.php'; ?>
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
        
</table>
    <div class="salrie-submit">
    <p style="position: relative; top: 18px;">Cheque no:</p>
    <input type="text" id="cq-no" class="chq-no" placeholder="Cheque no">
    <i class="icon-cog procss-btn"></i>
    <input type="button" id="process" class="btn btn-info" value="Process" name="textarea_hidden" style="color: black;">
    <p class="err-sal" style="opacity: 0; line-height: 0.5%; color: red;">ERRR</p>
    </div>
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
$(document).ready(function(){
var start = 2012;
        var end = new Date().getFullYear();
        var options = "";
        for (var year = start; year <= end; year++) {
            options += "<option value="+ year +">" + year + "</option>";
        }
        document.getElementById("slct-year").innerHTML = options;

        $.ajax({
            url: "/home/due_deatils",
            method: 'post',
            data: {
                "year": end,
                "month": $('#slct-month option:selected').text()
            },
            success: function (d) {
//               console.log(d);    
               d = JSON.parse(d);
               
                if (d.length == 0) {
                    $('#table1').hide();
                    $('.salrie-submit').hide();
//                    $('#process').hide();
//                    $('.procss-btn').hide();
//                    $('#cq-no').hide();
                    $('#empty').css("display", "visible").html("No employes found for this month");
                } else {


                    $('#table1').show();
                    $('.salrie-submit').show();
//                    $('#process').show();
//                    $('.procss-btn').show();
//                    $('#cq-no').show();
                    $('#selct-mnth-prcd').hide();
                    function getDaysInMonth(month, year) {
                        return new Date(year, month, 0).getDate();
                    }
                    var year = $('#slct-year').val();
                    var month = $('#slct-month').val();
                    var month_txt = $('#slct-month option:selected').text();
                    var avlble_days = getDaysInMonth(month, year);

                    $("#table1").html("<tr><th>Select</th><th>Name</th><th>Max-payable</th><th>#Leaves</th><th>Net-payable</th><th>Status</th></tr>");
                    var arry_length = d.length;
                    for (var i = 0; i < arry_length; i++) {
//                        if(d[i]['_status_'] == 1){
                     var str = "<tr id='data-tr'><td>";
                         if(d[i]['_status_'] == 1 || d[i]['_status_'] == 2)
                            str +="";
                            else
                                str += "<input type='checkbox' name='checkbox' value='1' class='checkbox'>";
                                str +="</td><td  class='sal-name'>" + d[i]['emp_name']+"</td>";
                                str +="<td id=''>" + "<input type='text'  class='max-pay' value="+ d[i]['basic_salarie'] +" style='border: none; height: 50px; width: 95px; margin-top: 0px; outline: none;' readonly>"+
                                "</td><td id=''>";
                            if(d[i]['_status_'] == 1)
                                str +="<input type='text'  value="+ d[i]['_leaves_'] +" class='mtnh-leavs' style='border: none; height: 50px; width: 95px; margin-top: 0px; outline: none;'>";
                            else if(d[i]['_status_'] == 2)
                            str +="<input type='text'   class='mtnh-leavs' style='border: none; height: 50px; width: 95px; margin-top: 0px; outline: none;' readonly>";
                              else
                                str +="<input type='text'  class='mtnh-leavs' style='border: none; height: 50px; width: 95px; margin-top: 0px; outline: none;'>";
                                if(d[i]['_status_'] == 1)
                                str +="</td><td contenteditable='true'  class='tol-pay'>" + d[i]['_maxpay_']+"</td>";
                              else
                               str +="</td><td contenteditable='true'  class='tol-pay'>" + d[i]['basic_salarie']+"</td>";   
                        if(d[i]['_status_'] == 1)
                         str +="<td><button class='btn btn-info pay_cnfrm' id='pay_cnfrm' value='Done' type='button'>Done</button><button class='btn btn-info pay_cncl' id='pay_cncl' value='Cancel' type='button' style='color: #FF7171;'>Cancel</button></td>";
                        else if(d[i]['_status_'] == 2)
                                str +="<td class='paid-img'><img src='/images/paid.png' style='max-width: 50px;'><div class='revrt'>Revert</div></td>";
                        else 
                         str += "<td><button class='btn btn-info pay_due' id='pay_due' value='DUE' type='button' style='color: #FF7171;'>DUE</button></td>";
                        str +="<td hidden><input type='hidden' name='' value=" + d[i]['_email_'] + " class='pay_statmnt_email'><input type='hidden' name='' value=" + d[i]['_statement_'] + " class='pay_statement'><input type='hidden' name='' value=" + d[i]['_status_'] + " class='pay_statement_status'><input type='hidden' name='' value=" + d[i]['_time_'] + " class='pay_statement_time'><input type='hidden' name='' value=" + d[i]['emp_email'] + " class='pay_email'><input type='hidden' name='' value='Payslip-" + month_txt + "-" + year + ".pdf' class='payslip-name'><input type='hidden' name='' value=" + d[i]['designation'] + " class='desigination'><input type='hidden' name='' value=" + d[i]['gender'] + " class='gender'><input type='hidden' name='' value='date of joing' class='doj'><input type='hidden' name='' value=" + d[i]['dob'] + "' class='dob'><input type='hidden' name='' value='pf account no not in db' class='pf_ac'><input type='hidden' name='' value='PAN not in DB' class='pan'><input type='hidden' name='' value='BANK ac' class='bank'><input type='hidden' name='' value='ifsc code' class='ifsc'><input type='hidden' name='' value=" + avlble_days + " class='avilble_days'><input type='hidden' name='' value='paid days' class='paid_days'><input type='hidden' name='' value='loss of days' class='loss-days'><input type='hidden' name='' value=" + d[i]['basic_salarie'] + " class='basic'><input type='hidden' name='' value='hra' class='hra'><input type='hidden' name='' value='conveyance_allowance' class='conveyance'><input type='hidden' name='' value='Spcl_allowance' class='Spcl_allowance'><input type='hidden' name='' value='(A) Total Earnings' class='a'><input type='hidden' name='' value='TDS' class='tds'><input type='hidden' name='' value='PF' class='pf'><input type='hidden' name='' value='PT' class='pt'><input type='hidden' name='' value='0 class='b'><input type='hidden' name='' value=" + month_txt + " class='month_slip'><input type='hidden' name='' value=" + year + " class='year_slip'></td>" +
                            "</tr>";
                     $("#table1").append(str);
//            }
                        // console.log(d[i]['emp_email']);
                    }
                }
            }
        });
        $.ajax({
           url: "/home/get_statements",
           method: 'post',
           success:function(d){
               d = JSON.parse(d);
               var arry_length = d.length;
               for(i=0; i<arry_length; i++){
               $("#bank_stmnt-table").append("<tr><td align='center'>"+d[i]['statement_name']+"</td><td align='center' class='dwnld'><a href='/download/down_staments/"+d[i]['statement_name']+"'><i class='icon-download'></i></a></td></tr>");
               }
               $('#bank_stmnt-table tr:nth-child(3) td:nth-child(1)').addClass("new_statement");
       }
        });
});
</script>
<?php require 'views/footer.php'; ?>