<!DOCTYPE html>    
<html>
    <title>
      Saddahaq Employee login  
    </title>
  <head> 
    <link rel="icon" type="image/png" href="https://saddahaq.blob.core.windows.net/multimedia/favicon.ico">
    <link rel="stylesheet" href="/public/css/index.css" />
    <link rel="stylesheet" href="/public/global/saddahaq/css/saddahaq-ie7.css" />
        <link rel="stylesheet" href="/public/global/saddahaq/css/saddahaq.css" />
    <link rel="stylesheet" href="/public/global/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="/public/global/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/public/global/bootstrap/css/bootstrap-responsive.css" />
    <link rel="stylesheet" href="/public/global/bootstrap/css/bootstrap-responsive.min.css" />
    <script type="text/javascript" src="/public/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="/public/js/jquery.leanModal.min.js"></script>
    <script type="text/javascript" src="/public/js/popup.js"></script>
    <link type="text/css" rel="stylesheet" href="/public/css/style.css" />
<!--    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />-->
    <script type="text/javascript" src="/public/global/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="/public/global/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/public/global/bootstrap/js/jquery-ui.js"></script>
        <script type="text/javascript" src="/public/global/bootstrap/js/jquery-ui.min.js"></script>
</head>    
<body>
    <div class="container">
        <a href="/index" id="logo"></a>
        <div class="main-container" align="center">
                   <div id="table">
                        <div class="box">
                            <div class="logn-icon"><i class="icon-signin"></i></div>
                            <div class="Login">Employee Login</div>
                            <form name="login">
                                <label>Email</br><input type="text" name="email" placeholder="Email" class="inpt-logn"></label>
                                <label>Password</br><input type="password" name="password" class="inpt-logn" placeholder="Password"></label>
                                <input id="login_btn" type="submit" value="Login" class="btn btn-info btn-small btn-login-indx">
                            <div id="login">
                            <p class="login_err" style="color: red; opacity: 0;">errrrrrr</p>
                            </div>
                            </form>
                            <!--<div>Forget Password? <a href="">Click Here</a></div>-->
                        </div>
                    </div>
</div>
        </div>
        <script type="text/javascript">
            $("#modal_trigger").leanModal({top: 100, overlay: 0.2, closeButton: ".modal_close"});
            
            $("#login_btn").click(function(e){
        e.preventDefault(); 
        var regform = document.forms['login'];
        $.ajax({
         url: "/index/login",
         method:'post',
         data:{
          "email":regform.elements['email'].value,
          "password":regform.elements['password'].value,
           },
         success:function(res){
             if(res == "Incorect email or password"){
                 $('.inpt-logn').addClass('month-leavs_err').val('').focus();
                 $('.inpt-logn').effect('shake', {
                times: 3,
                distance: 5
            }, 300);
                 $("#login").find(".login_err").css("opacity", "1").html(res);
             }
             else{
                 window.open (res, '_self');
             // $("#btn-trgr").trigger('click');
//             location.reload();
        }
        }
       });
    });
            $(window).load(function() {          
          var i =0;
          var images = ['/images/item1.jpg', '/images/sav.jpg','/images/item3.jpg'];
          var image = $('body');
          image.css('background-image', 'url(/images/item1.jpg)');
           //Change image at regular intervals
          setInterval(function(){
           image.css('background-image', 'url(' + images [i++] +')');
           image.fadeIn(1000);
           if(i == images.length)
            i = 0;
          }, 5000);           
         });

        </script>
    </body>
    </html>