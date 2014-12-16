<?php require 'views/header.php'; ?>
<div class="hr-privlages">
    <div class="prvlgs-header"><h3>HR Privileges</h3></div>
    <div id="user-level" class="span5">
    <h3>Set user level</h3>
    <form id="userlvl-frm">
    <label>Email:<br><input type="email" placeholder="Email" id="user-lvl-eml"></label>
    <label>User level:<br><input type="text" placeholder="HR:1, PM:2, EMP:0" id="lvl-num"></label>
    </form>
    <button class="btn btn-info hr-privlages-btn" id="user-lvl-submit" type="button" style="color: #FF7171;">SET</button>
</div>
    <div id="chnge-pswrd-hr" class="span5">
    <h3>Change Emp password</h3>
    <form id="pwd-chng-frm">
    <label>Email:<br><input type="email" placeholder="Email" id="pswrd-chnge-eml"></label>
    <label>New password:<br><input type="password" id="nwpwd"></label>
    </form>
    <button class="btn btn-info hr-privlages-btn" id="pswrd-chng-submit" type="button" style="color: #FF7171;">Change</button>
</div>
</div>

        <a id= "btn-trgr" href="#resp-popup" class="modal_trigger_status" hidden></a>
        <div id="resp-popup" class="popupContainer_status" style="display:none;">
            <header class="popupHeader7">
                <span class="header_title"></span>
                <span class="modal_close"></span>
            </header>

            <section class="popupBody"></section>
        </div>
        
        
        
        
        
        <!--success pop up area close-->
        <script>
        $(".modal_trigger6").leanModal({top: 10, overlay: 0.2, closeButton: ".modal_close"});
        $(".modal_trigger_status").leanModal({top: 150, overlay: 0.2, closeButton: ".modal_close"})
        </script>
<?php require 'views/footer.php'; ?>