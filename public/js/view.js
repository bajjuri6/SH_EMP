
$(function () {
$(".datepicker" ).datepicker({dateFormat: 'dd-mm-yy', minDate: 0});
$(".datepicker-dob" ).datepicker({dateFormat: 'dd-mm-yy', changeMonth: true, changeYear: true, yearRange: '1970:+0', showButtonPanel: true,});
    var avlble_days;
    $(document).on('keyup', '.mtnh-leavs', function () {
        // $('#textarea_hidden').val($('#mtnh-leavs').val());
        function getDaysInMonth(month, year) {
            return new Date(year, month, 0).getDate();
        }
        var $this = $(this);
        var maxpay = $this.parents("tr").find('.max-pay').val();
        var year = $('#slct-year').val();
        var month = $('#slct-month').val();
        var avlble_days = getDaysInMonth(month, year);
        var byleavs = maxpay / avlble_days;
        var cut = ($this.val() * byleavs).toFixed();
        var total = maxpay - cut;
        $this.parents("tr").find(".tol-pay").html(total);
    });
    $("#process").click(function () {
        var chkbxs = $('.table').find("tr .checkbox");
        var slctd_emp = [], obj;
        if($(chkbxs).prop('checked') == 0){
                $('.ajax-loading').hide();
                $("#resp-popup").find(".popupBody").html("Please select max one employe to genrate Payslips");
                $("#btn-trgr").trigger('click');
                return false;
        }
        chkbxs.each(function () {
            if ($(this).prop('checked') == true) {
                var avl_days = $(this).parents("tr").find(".avilble_days").val();
                var loss_of_days = $(this).parents("tr").find(".mtnh-leavs").val();
                var paid_days = avl_days - loss_of_days;
                obj = {
                    "emp_name": $(this).parents("tr").find('.sal-name').text(),
                    "mail": $(this).parents("tr").find(".pay_email").val(),
                    "file_name": $(this).parents("tr").find(".payslip-name").val(),
                    "designation": $(this).parents("tr").find(".desigination").val(),
                    "gender": $(this).parents("tr").find(".gender").val(),
                    "doj": $(this).parents("tr").find(".doj").val(),
                    "dob": $(this).parents("tr").find(".dob").val(),
                    "month_slip": $('#slct-month option:selected').text(),
                    "year_slip": $(this).parents("tr").find(".year_slip").val(),
                    "pf_a/c": $(this).parents("tr").find(".pf_ac").val(),
                    "pan": $(this).parents("tr").find(".pan").val(),
                    "bank_a/c": $(this).parents("tr").find(".bank").val(),
                    "ifsc": $(this).parents("tr").find(".ifsc").val(),
                    "available_days": $(this).parents("tr").find(".avilble_days").val(),
                    "paid_days": paid_days,
                    "loss_of_days": $(this).parents("tr").find(".mtnh-leavs").val(),
                    "basic": $(this).parents("tr").find(".basic").val(),
                    "hra": $(this).parents("tr").find(".hra").val(),
                    "conveyance_allowance": $(this).parents("tr").find(".conveyance").val(),
                    "Spcl_allowance": $(this).parents("tr").find(".Spcl_allowance").val(),
                    "a": $(this).parents("tr").find(".a").val(),
                    "tds": $(this).parents("tr").find(".tds").val(),
                    "pf": $(this).parents("tr").find(".pf").val(),
                    "pt": $(this).parents("tr").find(".pt").val(),
                    "b": $(this).parents("tr").find(".b").val(),
                    "net": $(this).parents("tr").find(".tol-pay").html()
                };
                slctd_emp.push(obj);
                // alert($(".payslip-name").val());
            }
        });

        $.ajax({
            url: "/home/pdf",
            method: 'post',
            data: {"slctd_emp": slctd_emp},
            beforeSend: function () {
                $('body').leanModal({overlay: 0.2});
                $('.ajax-loading').css({"position": "fixed", "top": "35%", "left": "45%"}).html('<img src ="/images/loading.gif" style="max-width: 50px;">');
            },
            success: function (res) {
                $('.ajax-loading').hide();
                $("#resp-popup").find(".popupBody").html(res);
                $("#btn-trgr").trigger('click');
                setTimeout(function () {
                    window.location.reload();
                }, 2000);
            }
        });
        
        $.ajax({
            url: "/home/bank_statement",
            method: 'post',
            data: {"slctd_emp": slctd_emp},
            success: function (res) {
                var stmnt = JSON.parse(res);
                $(".td-apndg-bnk-stmnt").html("<td align='center'>"+stmnt.filename+"</td><td align='center' class='dwnld'><a href='/download/down_staments/"+stmnt.filename+"'><i class='icon-download'></i></a></td>");
//                setTimeout(function () {
//                    window.location.reload();
//               }, 1000);
            }
        });
    });
   
//    if (location.href == '/salaries') {
//        var start = 2012;
//        var end = new Date().getFullYear();
//        var options = "";
//        for (var year = start; year <= end; year++) {
//            options += "<option>" + year + "</option>";
//        }
//        document.getElementById("slct-year").innerHTML = options;
//    }
    var end = new Date().getFullYear();
    $("#slct-year").val(end);

    $('#slct-month').change(function () {
        // $('#data-tr').remove();
        $.ajax({
            url: "/home/due_deatils",
            method: 'post',
            data: {
                "year": $('#slct-year').val(),
                "month": $('#slct-month option:selected').text(),
            },
            success: function (d) {
                d = JSON.parse(d);
                
                if (d.length == 0) {
                    $('#table1').hide();
                    $('#process').hide();
                    $('#empty').css("display", "visible").html("No employes found for this month");
                    return;
                }

                $('#empty').css("display", "none");
                $('#table1').show();
                $('#process').show();

                function getDaysInMonth(month, year) {
                    return new Date(year, month, 0).getDate();
                }
                var year = $('#slct-year').val();
                var month = $('#slct-month').val();
                var month_txt = $('#slct-month option:selected').text();
                var avlble_days = getDaysInMonth(month, year);
                $("#table1").html("<tr><th>Select</th><th>Name</th><th>Max-payable</th><th>#Leaves</th><th>Net-payable</th></tr>");
                var arry_length = d.length;

                for (var i = 0; i < arry_length; i++) {

                    $("#table1").append("<tr id='data-tr'><td>" + "<input type='checkbox' name='checkbox' value='1' class='checkbox'>" + "</td><td  class='sal-name'>" + d[i]['emp_name'] + "</td><td id=''>" + "<input type='text'  class='max-pay' value=" + d[i]['basic_salarie'] + " style='border: none; height: 50px; width: 95px; margin-top: 0px; outline: none;' readonly>" + "</td><td id=''>" + "<input type='text'  class='mtnh-leavs' style='border: none; height: 50px; width: 95px; margin-top: 0px; outline: none;'>" + "</td><td contenteditable='true'  class='tol-pay'>" + d[i]['basic_salarie'] + "</td><td hidden>" +
                            "<input type='hidden' name='' value=" + d[i]['emp_email'] + " class='pay_email'><input type='hidden' name='' value='Payslip-" + month_txt + "-" + year + ".pdf' class='payslip-name'><input type='hidden' name='' value=" + d[i]['designation'] + " class='desigination'><input type='hidden' name='' value=" + d[i]['gender'] + " class='gender'><input type='hidden' name='' value=" + d[i]['date_of_joining'] + " class='doj'><input type='hidden' name='' value=" + d[i]['dob'] + " class='dob'><input type='hidden' name='' value=" + d[i]['pf_account'] + " class='pf_ac'><input type='hidden' name='' value=" + d[i]['pan'] + " class='pan'><input type='hidden' name='' value=" + d[i]['bank_account'] + " class='bank'><input type='hidden' name='' value=" + d[i]['ifsc_code'] + " class='ifsc'><input type='hidden' name='' value=" + avlble_days + " class='avilble_days'><input type='hidden' name='' value='paid days' class='paid_days'><input type='hidden' name='' value='loss of days' class='loss-days'><input type='hidden' name='' value=" + d[i]['basic_salarie'] + " class='basic'><input type='hidden' name='hra' value='0' class='hra'><input type='hidden' name='conveyance_allowance' value='0' class='conveyance'><input type='hidden' name='Spcl_allowance' value='0' class='Spcl_allowance'><input type='hidden' name='' value='0' class='a'><input type='hidden' name='TDS' value='N/A' class='tds'><input type='hidden' name='' value='N/A' class='pf'><input type='hidden' name='' value='N/A' class='pt'><input type='hidden' name='' value='0' class='b'><input type='hidden' name='' value=" + month_txt + " class='month_slip'><input type='hidden' name='' value=" + year + " class='year_slip'>" + "</td></tr>");
                    // console.log(d[i]['emp_email']);
                }
            }
        });
        

    });
//    if (location.href == 'https://localhost:8811/salaries') {
//        $.ajax({
//            url: "/home/due_deatils",
//            method: 'post',
//            data: {
//                "year": $('#slct-year').val(),
//                "month": $('#slct-month option:selected').text(),
//            },
//            success: function (d) {
//                d = JSON.parse(d);
//                if (d.length == 0) {
//                    $('#table1').hide();
//                    $('#process').hide();
//                    $('#empty').css("display", "visible").html("No employes found for this month");
//                } else {
//
//
//                    $('#table1').show();
//                    $('#process').show();
//                    $('#selct-mnth-prcd').hide();
//                    function getDaysInMonth(month, year) {
//                        return new Date(year, month, 0).getDate();
//                    }
//                    var year = $('#slct-year').val();
//                    var month = $('#slct-month').val();
//                    var month_txt = $('#slct-month option:selected').text();
//                    var avlble_days = getDaysInMonth(month, year);
//
//                    $("#table1").html("<tr><th>Select</th><th>Name</th><th>Max-payable</th><th>#Leaves</th><th>Net-payable</th></tr>");
//                    var arry_length = d.length;
//                    for (var i = 0; i < arry_length; i++) {
//                        $("#table1").append("<tr id='data-tr'><td>" + "<input type='checkbox' name='checkbox' value='1' class='checkbox'>" + "</td><td  class='sal-name'>" + d[i]['emp_name'] + "</td><td id=''>" + "<input type='text'  class='max-pay' value='20000' style='border: none; height: 50px; width: 95px; margin-top: 0px; outline: none;'>" + "</td><td id=''>" + "<input type='text'  class='mtnh-leavs' style='border: none; height: 50px; width: 95px; margin-top: 0px; outline: none;'>" + "</td><td contenteditable='true'  class='tol-pay'>" + 20000 + "</td><td hidden>" +
//                                "<input type='hidden' name='' value=" + d[i]['emp_email'] + " class='pay_email'><input type='hidden' name='' value='Payslip-" + month_txt + "-" + year + ".pdf' class='payslip-name'><input type='hidden' name='' value=" + d[i]['designation'] + " class='desigination'><input type='hidden' name='' value=" + d[i]['gender'] + " class='gender'><input type='hidden' name='' value='date of joing' class='doj'><input type='hidden' name='' value=" + d[i]['dob'] + "' class='dob'><input type='hidden' name='' value='pf account no not in db' class='pf_ac'><input type='hidden' name='' value='PAN not in DB' class='pan'><input type='hidden' name='' value='BANK ac' class='bank'><input type='hidden' name='' value='ifsc code' class='ifsc'><input type='hidden' name='' value=" + avlble_days + " class='avilble_days'><input type='hidden' name='' value='paid days' class='paid_days'><input type='hidden' name='' value='loss of days' class='loss-days'><input type='hidden' name='' value=" + d[i]['basic_salarie'] + " class='basic'><input type='hidden' name='' value='hra' class='hra'><input type='hidden' name='' value='conveyance_allowance' class='conveyance'><input type='hidden' name='' value='Spcl_allowance' class='Spcl_allowance'><input type='hidden' name='' value='(A) Total Earnings' class='a'><input type='hidden' name='' value='TDS' class='tds'><input type='hidden' name='' value='PF' class='pf'><input type='hidden' name='' value='PT' class='pt'><input type='hidden' name='' value='0 class='b'><input type='hidden' name='' value=" + month_txt + " class='month_slip'><input type='hidden' name='' value=" + year + " class='year_slip'>" + "</td></tr>");
//                        // console.log(d[i]['emp_email']);
//                    }
//                }
//            }
//        });
//        $.ajax({
//           url: "/home/get_statements",
//           method: 'post',
//           success:function(d){
//               d = JSON.parse(d);
//               var arry_length = d.length;
//               for(i=0; i<arry_length; i++){
//               $("#bank_stmnt-table").append("<tr><td align='center'>"+d[i]['statement_name']+"</td><td align='center' class='dwnld'><a href='/download/down_staments/"+d[i]['statement_name']+"'><i class='icon-download'></i></a></td></tr>");
//               }
//               $('#bank_stmnt-table tr:nth-child(3) td:nth-child(1)').addClass("new_statement");
//       }
//        });
//    }
    $('.popupContainer').on('click', '#Next', function () {
        var elements = $('.intial-form').find("input[type='text'],input[type='password'],input[type='number'],input[type='email'],input[type='radio'],textarea");
        var err = $("#model_reg").find(".val_err");
        var error = 'Name cannot be empty';
        var flag = 0;
        var element = null;
        var reg = null;
        elements.each(function () {
            element = $(this).attr('name');
            switch (element)
            {
                case 'emp_name':
                    if ($.trim($(this).val()) !== '') {
                        error = 'Name should contain only alphabets, numerals and space';
                        reg = /^[a-zA-Z0-9 ]+$/;
                    } else {
                        error = 'Name cannot be empty';
                        reg = /^[a-zA-Z0-9 ]+$/;
                    }
                    break;
                case 'emp_id':
                    if ($.trim($(this).val()) !== '') {
                        error = 'Emp id should contain only numerals';
                        reg = /^[a-zA-Z0-9 ]+$/;
                    } else {
                        error = 'Emp id cannot be empty';
                        reg = /^[a-zA-Z0-9 ]+$/;
                    }
                    break;
                case 'emp_email':
                    if ($.trim($(this).val()) !== '') {
                        error = 'Invalid email format';
                        reg = /^[a-z0-9_\+-]+(\.[a-z0-9_\+-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*\.([a-z]{2,4})$/;
                    } else {
                        error = 'Email field cannot be empty';
                        reg = /^[a-zA-Z0-9 ]+$/;
                    }
                    break;

                case 'password':
                    if ($.trim($(this).val()) !== '') {
                        error = 'Password should be atleast 6 characters';
                        reg = /^(?=.*[A-z0-9]).{6,}$/;
                    } else {
                        error = 'Password field cannot be empty';
                        reg = /^[a-zA-Z0-9 ]+$/;
                    }
                    break;
                case 'fathername':
                    if ($.trim($(this).val()) !== '') {
                        error = 'Fathername should contain only alphabets, numerals and space';
                        reg = /^[a-zA-Z0-9 ]+$/;
                    } else {
                        error = 'Fathername cannot be empty';
                        reg = /^[a-zA-Z0-9 ]+$/;
                    }
                    break;
                case 'mothername':
                    if ($.trim($(this).val()) !== '') {
                        error = 'Mothername should contain only alphabets, numerals and space';
                        reg = /^[a-zA-Z0-9 ]+$/;
                    } else {
                        error = 'Mothername cannot be empty';
                        reg = /^[a-zA-Z0-9 ]+$/;
                    }
                    break;
                case 'gender':
                    error = 'Select the gender';
                    reg = /^[a-zA-Z0-9 ]+$/;
                    break;
                case 'emp_phno':
                    if ($.trim($(this).val()) !== '') {
                        error = 'Invalid phone no.';
                        reg = /^(?=.*[A-z0-9]).{6,}$/;
                    } else {
                        error = 'Phone no cannot be empty';
                        reg = /^[0-9]+$/;
                    }
                    break;
                case 'age':
                    if ($.trim($(this).val()) !== '') {
                        error = 'Age should contain only numerals.';
                        reg = /^(?=.*[0-9]).{0,100}$/;
                    } else {
                        error = 'Age cannot be empty';
                        reg = /^[0-9]+$/;
                    }
                    break;
                case 'bloodgroup':
                    if ($.trim($(this).val()) !== '') {
                        error = 'bloodgroup not valid';
                        reg = /^[a-zA-Z0-9+ ]+$/;
                    } else {
                        error = 'bloodgroup cannot be empty';
                        reg = /^[a-zA-Z0-9 ]+$/;
                    }
                    break;

                case 'address':
                    if ($.trim($(this).val()) !== '') {
                        error = 'address not valid';
                        reg = /^[a-zA-Z0-9+ ]+$/;
                    } else {
                        error = 'address cannot be empty';
                        reg = /^[a-zA-Z0-9 ]+$/;
                    }
                    break;
                case 'spousename':
                    if ($.trim($(this).val()) !== '') {
                        error = 'Spousename should contain only alphabets, numerals and space';
                        reg = /^[a-zA-Z0-9 ]+$/;
                    } else {
                        error = 'Spousename cannot be empty';
                        reg = /^[a-zA-Z0-9 ]+$/;
                    }
                    break;
            }
            if (reg)
            {
                if (!reg.test($(this).val().toLowerCase()))
                {
                    flag = 1;
                    return false;
                }
                else
                {
                    err.text('');
                    $(this).removeClass('month-leavs_err');
                }
            }
        });
        if (flag == 1)
        {
            $('#' + element + '_reg').addClass('month-leavs_err').val('').focus();
            $(".popupContainer").find('.intial-form').effect('shake', {
                times: 3,
                distance: 4
            }, 300);
            err.text(error);

            return false;
        } else {

        $(".intial-form").css('opacity', '0');
        $(".slide_left").effect("slide", {
            direction: "right"
        }, 800);
        }
    });

    $("#Back").on('click', function () {

        $(".slide_left").effect("slide", {
            direction: "left"
        }, 1000);
        $(".slide_left").hide();
        $(".intial-form").css('opacity', '1');
    });

    $('.popupContainer').on("click", "#register-btn", function () {
        var elements = $('.slide_left').find("input[type='text'],input[type='password'],input[type='number'],input[type='email'],input[type='radio'],textarea");
        var reg = null;
        var err = $("#model_reg").find(".val_err");
        var error = 'Name cannot be empty';
        var flag = 0;
        var element = null;
        elements.each(function () {
            element = $(this).attr('name');
            switch (element)
            {
                case 'designation':
                    if ($.trim($(this).val()) !== '') {
                        error = 'Designation should contain only alphabets, numerals and space';
                        reg = /^[a-zA-Z0-9 ]+$/;
                    } else {
                        error = 'Designation cannot be empty';
                        reg = /^[a-zA-Z0-9 ]+$/;
                    }
                    break;
                case 'department':
                    if ($.trim($(this).val()) !== '') {
                        error = 'Department should contain only alphabets, numerals and space';
                        reg = /^[a-zA-Z0-9 ]+$/;
                    } else {
                        error = 'Department cannot be empty';
                        reg = /^[a-zA-Z0-9 ]+$/;
                    }
                    break;
                case 'emr_name':
                    if ($.trim($(this).val()) !== '') {
                        error = 'Emargency contact name should contain only alphabets, numerals and space';
                        reg = /^[a-zA-Z0-9 ]+$/;
                    } else {
                        error = 'Emargency contact name cannot be empty';
                        reg = /^[a-zA-Z0-9 ]+$/;
                    }
                    break;
                case 'emr_relation':
                    if ($.trim($(this).val()) !== '') {
                        error = 'Relation should contain only alphabets, numerals and space';
                        reg = /^[a-zA-Z0-9 ]+$/;
                    } else {
                        error = 'Relation cannot be empty';
                        reg = /^[a-zA-Z0-9 ]+$/;
                    }
                    break;
                case 'emr_email':
                    if ($.trim($(this).val()) !== '') {
                        error = 'Invalid email format';
                        reg = /^[a-z0-9_\+-]+(\.[a-z0-9_\+-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*\.([a-z]{2,4})$/;
                    } else {
                        error = 'Email field cannot be empty';
                        reg = /^[a-zA-Z0-9 ]+$/;
                    }
                    break;
                case 'emr_phone':
                    if ($.trim($(this).val()) !== '') {
                        error = 'Invalid phone no.';
                        reg = /^(?=.*[0-9]).{10}$/;
                    } else {
                        error = 'Phone no cannot be empty';
                        reg = /^[a-zA-Z0-9 ]+$/;
                    }
                    break;
                case 'bank_acc':
                    if ($.trim($(this).val()) !== '') {
                        error = 'Invalid Bank account.';
                        reg = /^[0-9 ]+$/;
                    } else {
                        error = 'Bank account no cannot be empty';
                        reg = /^[0-9 ]+$/;
                    }
                    break;
                case 'pf_acc':
                    if ($.trim($(this).val()) !== '') {
                        error = 'Invalid Bank account no.';
                        reg = /^(?=.*[0-9]).{0,30}$/;
                    } else {
                        error = 'Bank account no cannot be empty';
                        reg = /^[a-zA-Z0-9 ]+$/;
                    }
                    break;
                case 'pan':
                    if ($.trim($(this).val()) !== '') {
                        error = 'Invalid pan account no.';
                        reg = /^(?=.*[A-Za-z0-9]).{0,30}$/;
                    } else {
                        error = 'Pan account no cannot be empty';
                        reg = /^[a-zA-Z0-9 ]+$/;
                    }
                    break;
                case 'ifsc':
                    if ($.trim($(this).val()) !== '') {
                        error = 'Invalid ifsc.';
                        reg = /^(?=.*[A-Za-z0-9]).{0,30}$/;
                    } else {
                        error = 'ifsc cannot be empty';
                        reg = /^[a-zA-Z0-9 ]+$/;
                    }
                    break;
                case 'basic_salrie':
                    if ($.trim($(this).val()) !== '') {
                        error = 'Basic salari allows only numarals.';
                        reg = /^(?=.*[A-Za-z0-9]).{0,30}$/;
                    } else {
                        error = 'Basic salari cannot be empty';
                        reg = /^[a-zA-Z0-9 ]+$/;
                    }
                    break;
            }

            if (reg)
            {
                if (!reg.test($(this).val().toLowerCase()))
                {
                    flag = 1;
                    return false;
                }
                else
                {
                    err.text('');
                    $(this).removeClass('month-leavs_err');
                }
            }
        });
        if (flag == 1)
        {
            $('#' + element + '_reg').addClass('month-leavs_err').val('').focus();
            $(".popupContainer").find('.slide_left').effect('shake', {
                times: 3,
                distance: 4
            }, 300);
            err.text(error);

            return false;
        } else {
            var regform = document.forms['regform'];
            $.ajax({
                url: "/home/register",
                method: 'post',
                data: {
                    "emp_name": regform.elements['emp_name'].value,
                    "emp_id": regform.elements['emp_id'].value,
                    "emp_email": regform.elements['emp_email'].value,
                    "password": regform.elements['password'].value,
                    "fathername": regform.elements['fathername'].value,
                    "mothername": regform.elements['mothername'].value,
                    "gender": regform.elements['gender'].value,
                    "emp_phno": regform.elements['emp_phno'].value,
                    "dob": regform.elements['dob'].value,
                    "age": regform.elements['age'].value,
                    "bloodgroup": regform.elements['bloodgroup'].value,
                    "address": regform.elements['address'].value,
                    "spousename": regform.elements['spousename'].value,
                    "designation": regform.elements['designation'].value,
                    "department": regform.elements['department'].value,
                    "emr_name": regform.elements['emr_name'].value,
                    "emr_relation": regform.elements['emr_relation'].value,
                    "emr_phone": regform.elements['emr_phone'].value,
                    "emr_email": regform.elements['emr_email'].value,
                    "bank_acc": regform.elements['bank_acc'].value,
                    "pf_acc": regform.elements['pf_acc'].value,
                    "pan": regform.elements['pan'].value,
                    "ifsc": regform.elements['ifsc'].value,
                    "basic_sal": regform.elements['basic_salrie'].value,
                    "doj": regform.elements['doj'].value
                },
                success: function (res) {
                    $("#model_reg").css("display", "none");
                    $("#resp-popup").find(".popupBody").html(res);
                    $("#btn-trgr").trigger('click');
                    document.getElementById('resetform').reset();
                }
            });
        }
    });
    $('#post-butn').click(function(){
        var data = $.trim($('#post-txt').val()); 
        if( data === ''){
        $('#posterr').text('Nothig is there to post!!');  
        return;    
        }
      $.ajax({
         url: "home/postupdate",
         method: "post",
         data: {
             post: $('#post-txt').val()
             
         },
         success: function(res){
             $("#resp-popup").find(".popupBody").html(res);
             $("#btn-trgr").trigger('click');
             setTimeout(function () {
                    window.location.reload();
                }, 2000);
         }
      });
    });
    
     $.ajax({
         url: "/home/getupdates",
         method: "post",
         contentType: "application/json",
         data:{
             tp: "updt" 
         },
         success: function(d){
            var d = JSON.parse(d);
            var time = new Date(d[0].time*1000);
            $('#notifc').html("<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times; </button>"+time+"<br/><b>Notice: </b>"+d[0].new_update+"<span></span><span class='alert-desc' style='display: block'></span></div>");
         }
     })
     
    $('#docs-file').change(function(){
    var file = this.files[0];
    var name = file.name;
    var size = file.size;
    var type = file.type;
    //Your valid0ation
});
     
//     $('#upload-docs-butn').click(function(){
//      // var formData = new FormData($('#docs-form')[0]);
//        $.ajax({
//        url: 'home/empdocs',  //Server script to process data
//        type: 'POST',
//        xhr: function() { 
//            // Custom XMLHttpRequest
//            var myXhr = $.ajaxSettings.xhr();
//            if(myXhr.upload){
//                // Check if upload property exists
//                myXhr.upload.addEventListener('progress',progressHandlingFunction, false); // For handling the progress of the upload
//            }
//            
//            return myXhr;
//        },
//        //Ajax events
////        beforeSend: beforeSendHandler,
////        success: completeHandler,
////        error: errorHandler,
//        // Form data
//         // data: formData,
//        //Options to tell jQuery not to process data or worry about content-type.
////        cache: false,
////        contentType: false,
////        processData: false
//    });
//});
     
     
    
     
     
    $('#upload-docs-butn').click(function(e){
         e.preventDefault();
         var email = document.getElementById('emp-doc-emial').value;
         var elements = $('#docs-form').find("input[type='file']");
         var file_val = $('#docs-form').find("input[type='file']").value;
         var reg;
         reg = /^[a-zA-Z0-9_\+-]+(\.[A-Za-z0-9_\+-]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*\.([A-Za-z]{2,4})$/;
         if(!reg.test(email)){
             $('#emp-doc-emial').addClass('month-leavs_err').val('').focus();
             $('#emp-doc-emial').effect('shake', {
                times: 2,
                distance: 4
            }, 300);
             $('#upload-doc-err').text("Invalid email");
             return false;
         }
         
        var formData = new FormData();
        var i =1;
    elements.each(function () {
        var file_val = $('#docs-file'+i).val();
         if(file_val == ''){
        $('#emp-doc-emial').removeClass('month-leavs_err');
        $('#upload-doc-err').text("Select Doc to upload");
        $('#docs-file'+i).addClass('month-leavs_err').val('').focus();
         }
        var files = document.getElementById($(this).attr("id"));
        var doc_type = $(this).siblings('.slct-month').find('option:selected').text();
        files = files.files;
        formData.append($(this).attr("id"),files[0],files[0].name);
        formData.append("doctype"+i,doc_type);
        i++;
    });
    formData.append("eml", email);
        $.ajax({
            url: '/home/empdocs',
            method: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('body').leanModal({overlay: 0.2});
                $('.ajax-loading').css({"position": "fixed", "top": "35%", "left": "45%"}).html('<img src ="/images/loading.gif" style="max-width: 50px;">');
            },
            success: function (data) {
             $('#model_doc').hide();   
             $("#resp-popup").find(".popupBody").html(data);
             $("#btn-trgr").trigger('click');
                setTimeout(function () {
                window.location.reload();
               }, 1500)
            }
        });
        return false; 
     });
     
     var empdoc_upld = 1;
     $('#pluse-doc').on('click', function(){
         empdoc_upld++;
         $('#upload-docs-butn').before("<label>Select Document:<br><input type='file' name = 'empdoc' id='docs-file"+empdoc_upld+"' style='display: inline-block;'><select class='slct-month'><option value='' selected>--Select Doc type--</option><option value='1'>10th</option><option value='2'>Bachelor</option><option value='3'>Experience</option><option value='4'>Address</option><option value='4'>Other</option></select><a href='#'  class='minus-doc'><i class='icon-minus-sign'></i></a></label>");
     });
     
     $('#docs-form').on('click', '.minus-doc', function(){
        $(this).parents("label").remove();
     });
     
     $('.profile-img-change-input').change(function(){
         var formData = new FormData();
         var files = document.getElementById('p-pic-change');
         files = files.files;
         formData.append('p-pic-change', files[0],files[0].name);
         $.ajax({
            url: '/home/profile_pic',
            method: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $('.profile_img').find('img').attr('src', data);
//                $('.profile_img').find('img').html(data);
            }
        });
     });
     
     
     $('#user-lvl-submit').click(function(){
        var eml = $('#user-lvl-eml').val();
        var levl = $('#lvl-num').val();
        $.ajax({
           url: '/home/set_user_lvl',
           method: 'post',
           data:{eml: eml, levl: levl},
           success: function(d){
               document.getElementById("userlvl-frm").reset();
                $("#resp-popup").find(".popupBody").html(d);
               $("#btn-trgr").trigger('click');
               
           }
        });
     });
     
     $('#pswrd-chng-submit').click(function(){
        var eml = $('#pswrd-chnge-eml').val();
        var pwd = $('#nwpwd').val();
        $.ajax({
           url: '/home/change_pwd',
           method: 'post',
           data:{eml: eml, pwd: pwd},
           success: function(d){
               document.getElementById("pwd-chng-frm").reset();
               $("#resp-popup").find(".popupBody").html(d);
               $("#btn-trgr").trigger('click');
           }
        });
     });
     
     $.ajax({
        url: 'home/get_bdys',
        method: 'post',
        success:function(d){
            var d = JSON.parse(d);
            var arry_length = d.length;
            for(i=0; i<arry_length; i++){
                var now = new Date();
                now = now.getMonth() + 1 + "/" + now.getDate();
                var bdy = new Date(d[i].dob*1000);
                var bdycmpr = bdy.getMonth() + 1 + "/" + bdy.getDate();
                if(bdycmpr == now){
                $('#tdy-bdy').append("<div class='alert alert-success alert-dismissable bdy-ribbn'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><b>Today Birthday</b><br/>"+d[i]['emp_name']+"<span></span><span class='alert-desc' style='display: block'></span><img src='/images/hpybdy.png' class='hpybdy'></div>");
               } 
//              <img src='/uploads/"+d[i]['emp_email']+"/profile_pic/Profile_pic.jpg' class='bdy-prfl-pic'>
                var month = bdy.getMonth() + 1;
                var bdyfrtbl = bdy.getDate() + "-" + month + "-" + bdy.getFullYear();
                var exststcpmr = new Date(d[i].dob*1000);
                exststcpmr = exststcpmr.getDate();
                var tdy = new Date();    
                var tdy = tdy.getDate();
                if(exststcpmr >= tdy){
                $('.bdy-rmindr').append("<tr><td>"+d[i].emp_name+"</td><td>"+bdyfrtbl+"</td></tr>");
            }
            }
    }
     });
     
     $( "#autocomplete" ).autocomplete({
    source: function( req, resp ) {
        $.post( "/echo/json/", {
            json: '["1", "2", "3", "4", "5"]',
            delay: 1
        }, function(data) {
            resp( data );
        }, "JSON" );
    }
});

$('.popupContainer_all').on('click', '.edit_emp_save', function(e){
         e.preventDefault();
         var id = $(this).parents('.popupContainer_all').attr('id');
         var name = $('#'+id).find('.edit_name span').html();
         var phone = $('#'+id).find('.edit_phone span').html();
         var addrs = $('#'+id).find('.edit_address span').html();
         var desg = $('#'+id).find('.edit_designation span').html();
         var bank_acc = $('#'+id).find('.edit_bank_account span').html();
         var pf_acc = $('#'+id).find('.edit_pf_account span').html();
         var pan = $('#'+id).find('.edit_pan span').html();
         var ifsc = $('#'+id).find('.edit_ifsc span').html();
         var basic_sal = $('#'+id).find('.edit_basic_salarie span').html();
         var email = $('#'+id).find('.edit_emil span').html();
         $.ajax({
            url: "home/edit_emp",
            method:'post',
            data: {     edit_name: name,
                        edit_phone: phone,
                        edit_address: addrs,
                        edit_designation: desg,
                        edit_bank_account: bank_acc,
                        edit_pf_account: pf_acc,
                        edit_pan: pan,
                        edit_ifsc: ifsc,
                        edit_basic_salarie: basic_sal,
                        emp_email: email
                   },
                   success: function(d){
                     $('.popupContainer_all').remove();
                     $("#resp-popup").find(".popupBody").html(d);
                     $("#btn-trgr").trigger('click');
                     setTimeout(function () {
                    window.location.reload();
               }, 1000);
                   }
         });
     });
     
     $('.popupContainer_all').on('click', '.edit_emp_cancl', function(e){
         e.preventDefault();
          var id = $(this).parents('.popupContainer_all').attr('id');
         $('.popupContainer_all').remove();
         setTimeout(function () {
                    window.location.reload();
               }, 1000);
     });
     
     $('.edit-emp').mouseover(function(){
         $(this).find('i').css("opacity", '1');
     });
     
     $('.edit-emp i').click(function(){
     $(this).siblings('.edit-emp span').focus();
        });
     
     $('.edit-emp').mouseleave(function(){
     $(this).find('i').css("opacity", '0');
     });
     
     $('#notifc').on('click', '.close', function(){
        $.ajax({
           url: "home/updtae_close",
           method: "post",
           data: {email: $('body').data('email'),
                  satatus: 0}
        });
     });
     $('.alert-leaves').on('click', '.close', function(){
        $.ajax({
           url: "home/leaves_alert_close",
           method: "post",
           data: {email: $('body').data('email'),
                  satatus: 0}
        });
     });
//     $('#tdy-bdy').on('click', '.close', function(){
//        alert();
//         $.ajax({
//           url: "home/bdy_alert_close",
//           method: "post",
//           data: {email: $('body').data('email'),
//                  satatus: 0}
//        });
//     });
     
});

