
<?php 
 session_start();
 if(empty($_SESSION['username'])){
 	header("location: index.php");
 }
 
  $p = $_GET['name'];
#$country = $_GET['country'];
 $con=mysqli_connect("localhost","root","root","test");
	 if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	mysqli_select_db($con, "palyers");
if($sql = "SELECT  `name`, `position`, `dob_age`, `club` FROM `players` WHERE `player_id` = '".$p."'"){
$result = mysqli_query($con, $sql);

?>

<?php
#echo $_SESSION['loginid'];
#$username=$_SESSION['username'];
#$time=time();
#echo $time;
#$username = $_POST['username'];
/*$username=$_SESSION['username'];
$browser=$_SERVER['HTTP_USER_AGENT'];
#echo $browser;
date_default_timezone_set("Asia/Kolkata");
$time = date("h:i:sa");
$date = date("Y/m/d");
$visit = $_COOKIE['lastVisit'];
#echo $time;
#function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
	#echo $ip;
	
$sql="INSERT INTO url_tbl (username, browser, url, time, ip, date, visit) VALUES ('$username', '$browser', '$url','$time','$ip', '$date', '$visit')";
if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Saddahaq</title>
<meta name="keywords" content="Lin Photo, free website template, XHTML CSS layout" />
<meta name="description" content="Lin Photo, free website template, free XHTML CSS layout provided by templatemo.com" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<style>

body {
	margin: 0;
	padding: 0;
	line-height: 1.5em;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #ffffff;
	background-color: 	#FFFFFF;
}

a:link, a:visited { color: #fcdd31; text-decoration: underline; font-weight: normal; } 
a:active, a:hover { color: #fcdd31; text-decoration: none; }

p {
	margin: 0px;
	padding: 0px;
}

img {
	margin: 0 0 15px 0;
	padding: 0px;
	border: 3px solid #cccccc;
}

.cleaner { clear: both; width: 100%; height: 0px; font-size: 0px;  }

.margin_bottom_10 { clear: both; width: 100%; height: 10px; font-size: 1px;	}
.margin_bottom_15 { clear: both; width: 100%; height: 15px; font-size: 1px;	}
.margin_bottom_20 { clear: both; width: 100%; height: 20px; font-size: 1px;	}
.margin_bottom_30 { clear: both; width: 100%; height: 30px; font-size: 1px;	}
.margin_bottom_40 { clear: both; width: 100%; height: 40px; font-size: 1px;	}
.margin_bottom_50 { clear: both; width: 100%; height: 50px; font-size: 1px;	}
.margin_bottom_60 { clear: both; width: 100%; height: 60px; font-size: 1px;	}

.margin_right_40 { margin-right: 40px; }
.margin_right_60 { margin-right: 60px; }

.h_divider { background: url(images/templatemo_horizontal_divider.jpg) bottom repeat-x; }
.vl_divider { background: url(images/templatemo_vertical_divider.jpg) left repeat-y; }
.vr_divider { background: url(images/templatemo_vertical_divider.jpg) right repeat-y; }

.fl { float: left; }
.fr { float: right }

.header_01 {
	padding: 0 0 10px 0;
	margin: 0 0 10px 0;
	font-size: 16px;
	color: #fbbc53;
	font-weight: bold;
}

.header_02 a {
	padding: 0 0 5px 0;
	font-size: 12px;
	font-weight: bold;
	color: #fbbc53;
}

.header_03 {
	padding: 0;
	font-size: 11px;
	color: #ffffff;
	font-weight: bold;
}

.rc_btn_01 a {
	clear: both;
	float: right;
	display: block;
	width: 100px;
	height: 25px;
	padding: 5px 0 0 0;
	font-size: 12px;
	text-align: center;
	color: #ffffff;
	font-weight: bold;
	text-decoration: none;
	border: none; 
	background: url(images/templatemo_button_01.jpg) no-repeat;
}

#templatemo_container {
	width: 960px;
	margin: 0 auto;
	padding: 0 10px;
	background: url(images/templatemo_container_bg.png) repeat-y;
}

#templatemo_banner {
	width: 960px;
	height: 140px;
	margin: 0 auto;
    background-color: #303030;
}

#templatemo_banner #logo {
	float: left;
	margin: 30px 0 0 40px;
	width: 500px;
	height: 114px;
	background: url(saddahaq.png)  no-repeat;
}

#search_section {
	float: right;
	margin: 100px 20px 0 0;
}

#search_section form {
	float: right;
	margin: 0px;
	padding: 0px;
}

#searchfield {
	height: 16px;
	width: 180px;
	padding: 5px;
	margin: 0px;
	color: #ffffff;
	font-size: 12px;
	font-variant: normal;
	line-height: normal;
	background: #af1313;
	border: 1px solid #000000;	
}

#searchbutton {
 	height: 29px;
	margin: 0px;
	padding: 4px 6px 6px 6px;
	cursor: pointer;
	font-size: 12px;
	text-align: center;
	vertical-align: bottom;
	white-space: pre;
	color: #ffffff;
	background: none; 
	border: 1px solid #000000;
}

/* menu */

#templatemo_menu {
	clear: both;
    width: 960px;
	height: 42px;
	background: url(images/templatemo_menu_bg.jpg) repeat-x;
}

#templatemo_menu ul {
	float: left;
	margin: 0px;
	padding: 0 0 0 20px;
	list-style: none;
}

#templatemo_menu ul li {
	margin: 0px;
	padding: 0px;
	display: inline;
}

#templatemo_menu ul li a {
	position: relative;	
	float: left;
	display: inline-block;
	height: 30px;
	width: 130px;
	margin-right: 10px;
	text-align: center;
	padding: 12px 0 0 0;
	font-size: 13px;
	font-weight: bold;
	text-decoration: none;
	color: #ffffff;	
	outline: none;
}

#templatemo_menu li a:hover, #templatemo_menu li .current {
	position: relative;
	color: #ffffff;
	background: url(images/templatemo_menu_hover_right.jpg) top right no-repeat;
}

#templatemo_menu li a:hover span, #templatemo_menu li .current span	{
	position: absolute;
	display: inline-block;
	width: 15px;
	height: 42px;
	top: 0;
	left: 0;
	background: url(images/templatemo_menu_hover_left.jpg) no-repeat;
}

/* end of menu */

/* content */

#templatemo_content {
	padding: 0 20px;
}

.column_w210 {
	padding: 0 20px;
	margin-top: 40px;	
	width: 185px; /* width 205 */
}

.column_w430 {
	padding: 0 20px;
	margin-top: 40px;	
	width: 430px; /* width 470 */
}

.column_w920 {
	width: 880px;
	padding: 0 20px;
}

.column_w190 {
	width: 190px;
}

.column_w430 p {
	text-align: justify;
	margin-bottom: 15px;
}

.latest_news {
	clear: both;
	padding-bottom: 10px;
}

.category_list {
	margin: 0px;
	padding: 0px;
	list-style: none;
}

.category_list li { 
	display: inline-block;
	height: 20px;
	padding: 6px 0 0 25px;
	margin: 0 0 5px 0;
	background: url(images/templatemo_list_icon.jpg) top left no-repeat;
}

.category_list li a { 
	color: #cccccc;
	text-decoration: none;
	font-size: 13px;
	font-weight: bold;
}

.category_list li a:hover { 
	color: #fcdd31;
}
	
/* end of content */

/* footer */

#templatemo_footer {
	clear: both;
	width: 960px;
	padding: 20px 0 20px 0;
	text-align: center;
	border-top: 1px solid #8b8a8b;
	background: #343233 url(images/templatemo_footer.jpg) no-repeat;
}

.footer_list {
	margin: 0px;
	padding: 0px;
	list-style: none;
}

.footer_list li {
	padding: 0 10px;
	display: inline;
	border-right: 1px solid #cccccc;
}

.footer_list li a {
	color: #cccccc;
	text-decoration: none;
}

.footer_list li a:hover {
	color: #fcdd31;
}

.footer_list .last {
	border-right: none;
}
indent {color: sienna;}
div.p {margin-left: 20px;}
body {background-image: url("images/background.gif");}
p {
	margin-right: 25px;
}
body {background-image: url("images/background.gif");}

body {
max-width: 1200px; margin: 0 auto }

div.left {
width: 50%; 
padding: 0 0 0 1%;
float: left
}

div.content {
width: 40%;
padding: 0 5%;
float: left}

div.right {
width: 50%; 
padding: 0% 8% 5% 0%;
float: right;
}
.palyer_name {
	margin-right: 0.7%;
     padding: 0% 0% 0% 0%;
     border: 4px solid #FFFFFF;

  -webkit-transition: all 0.5s ease;
     -moz-transition: all 0.5s ease;
       -o-transition: all 0.5s ease;
      -ms-transition: all 0.5s ease;
          transition: all 0.5s ease;
}
.palyer_name:hover{
  -webkit-transform: rotate(-10deg);
     -moz-transform: rotate(-10deg);
       -o-transform: rotate(-10deg);
      -ms-transform: rotate(-10deg);
          transform: rotate(-10deg);
}

div.img{
width: 30%; 
padding: 35% 10% 0% 0%;
margin-left:4.5cm}
.team{
	padding: 0% 0% 0% 80%;
}
.team1{
	margin-right: -20%;
	padding: 0% 0% 0% 76%;
	font-size: 20px;
	font-family: Daniel;
    font-weight: bold;
    color: #EFEFE7;
}

kum { width: 800px; margin: 0 auto; }
kum img { margin: 20px; border: 5px solid #eee; -webkit-box-shadow: 4px 4px 4px rgba(0,0,0,0.2); 
-moz-box-shadow: 4px 4px 4px rgba(0,0,0,0.2); 
box-shadow: 4px 4px 4px rgba(0,0,0,0.2); 
-webkit-transition: all 0.5s ease-out; 
-moz-transition: all 0.5s ease; -o-transition: all 0.5s ease; } 
kum img:hover { -webkit-transform: rotate(-7deg); 
-moz-transform: rotate(-7deg); 
-o-transform: rotate(-7deg); }



sat img{ border: 5px solid #ccc; float: left; margin: 15px; 
-webkit-transition: margin 0.5s ease-out; 
-moz-transition: margin 0.5s ease-out; -o-transition: margin 0.5s ease-out; } 
.sat img:hover { margin-top: 2px; }


p.hidden {border-style:hidden;}


div.ajax{

height: 500px;
	margin: 0 auto;
	padding: 30px 10px;
}

div.right1 {
 
padding: 5% 5% 5% 3%;
float: left
}
.image {
            background: url('images/fifa.jpg') no-repeat scroll;
            background-size: 100% 100%;
            min-height: 700px;
        }
		
		.pic{ width:100px; height:150px;}
		.text{ width:50px; height:50px; background:#FFF; opacity:0; } 
		
		
		.pic:hover .text { opacity:0.6; text-align:justify; 
		color:#000000; font-size:20px; 
		font-weight:700; font-family:"Times New Roman", 
		Times, serif; padding:30px; }
		
		
		.blur img {
		
		border: 1px solid #FFFFFF;
  -webkit-transition: all 1s ease;
     -moz-transition: all 1s ease;
       -o-transition: all 1s ease;
      -ms-transition: all 1s ease;
          transition: all 1s ease;
}
 
.blur img:hover {
  -webkit-filter: blur(5px);
}
.image1
{
	margin-right: 10px;
	
}
</style>
<script language="javascript" type="text/javascript">
function clearText(field){

    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;

}

</script>

<link rel="icon" href="favicon1.png" type="image/gif" sizes="16x16">
</head>
<body>
<div id="templatemo_container">
	<div id="templatemo_banner">
    	<div id="logo"></div>
    </div>
    
    <div id="templatemo_menu">
        <ul>
            <li><a href="page1.php" class="current"><span></span>Home</a></li>
            <li><a href="page2.php"><span></span>About</a></li>
            <li><a href="page1.php"><span></span>Contact</a></li>
             
             <ul>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             </ul>   
	<ul>
		<li><a href=""><span></span><?php echo $_SESSION['username'];?></a></li>
             </ul>
            <li><a href="logout.php"><span></span>Logout</a></li>
        </ul>   
    </div>
    
<div id="templatemo_content">
	<div class="ajax" id="ajax">



		<p class="blur img">
<a href="england.php?flag=england">
<img hspace="5" src="images/flags/england.png" alt="England" height="100" width="150" class="image1">
</a>
<a href="england.php?flag=algeria">
<img hspace="5" src="images/flags/algeria.png" alt="algeria" height="100`" width="150" class="image1">
</a>
<a href="england.php?flag=argentina">
<img hspace="5" src="images/flags/argentina.png" alt="argentina" height="100" width="150" class="image1">
</a>
<a href="england.php?flag=australia">
<img hspace="5" src="images/flags/australia.png" alt="australia" height="100" width="150" class="image1"></a>
</p>
<p class="blur img">
<a href="england.php?flag=belgium">
<img hspace="5" src="images/flags/belgium.png" alt="belgium" height="100" width="150" class="image1"></a>
<a href="england.php?flag=bosnia_and_herzegovina">
<img hspace="5" src="images/flags/bosnia_and_herzegovina.png" alt="bosnia_and_herzegovina" height="100" width="150" class="image1">
</a>
<a href="england.php?flag=brazil">
<img hspace="5" src="images/flags/brazil.png" alt="brazil" height="100" width="150" class="image1"></a>
<a href="england.php?flag=cameroon">
<img hspace="5" src="images/flags/cameroon.png" alt="cameroon" height="100" width="150" class="image1">
</a>
</p>
<p class="blur img">
<a href="england.php?flag=chile">
<img hspace="5" src="images/flags/chile.png" alt="chile" height="100" width="150" class="image1"></a>
<a href="england.php?flag=colombia">
<img hspace="5" src="images/flags/colombia.png" alt="colombia" height="100" width="150" class="image1"></a>
<a href="england.php?flag=costa Rica">
<img hspace="5" src="images/flags/costa Rica.png" alt="costa Rica" height="100" width="150" class="image1"></a>
<a href="england.php?flag=cote di voire">
<img hspace="5" src="images/flags/cote di voire.png" alt="cote di voire" height="100" width="150" class="image1"></a>
</p>
<p class="blur img">
<a href="england.php?flag=croatia">
<img hspace="5" src="images/flags/croatia.png" alt="croatia" height="100" width="150" class="image1"></a>
<a href="england.php?flag=ecuador">
<img hspace="5" src="images/flags/ecuador.png" alt="ecuador" height="100" width="150" class="image1"></a>
<a href="england.php?flag=france">
<img hspace="5" src="images/flags/france.png" alt="germany" height="100" width="150" class="image1"></a>
<a href="england.php?flag=ghana">
<img hspace="5" src="images/flags/ghana.png" alt="greece" height="100" width="150" class="image1"></a>
</p>
	</div>
<div class='right'>
	<br><br>
	<p class="team1">Select Team Here</p><br>
	<p class="team">
		
		<select>
  <option value="select team">Select Team</option>
  <option value="algeria"><a href="page.php?country=algeria">Algeria</a></option>
  <option value="Argentina">Argentina</option>
  <option value="Australia">Australia</option>
  <option value="Belgium">Belgium</option>
  <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
  <option value="Brazil">Brazil</option>
  <option value="Cameroon">Cameroon</option>
  <option value="Chile">Chile</option>
  <option value="Colombia">Colombia</option>
  <option value="Costa Rica">Costa Rica</option>
  <option value="Côte d'Ivoire">Côte d'Ivoire</option>
  <option value="saab">Saab</option>
  <option value="Croatia">Croatia</option>
  <option value="Ecuador">Ecuador</option>
  <option value="England">England</option>
  <option value="France">France</option>
  </select></p>
<?php
if(isset($_GET['name'])){
echo "<div class='img'>
<img src='images/{$p}.png' height='150' width='150' border='2px'>
</div>";

echo "<table border='0' width='500' height='50'>
<tr bgcolor='#CC3300'>
<th>Name</th>
<th>Position</th>
<th>Dob_age</th>
<th>Club</th>
</tr>";
$row = mysqli_fetch_array($result);
  echo "<tr bgcolor='#CCCCCC'>";
  echo "<td align='center' width='200'>" . $row['name'] . "</td>";
  echo "<td align='center' width='20'>" . $row['position'] . "</td>";
  echo "<td align='center' width='400'>" . $row['dob_age'] . "</td>";
  echo "<td align='center' width='400'>" . $row['club'] . "</td>";
  echo "</tr>";
  echo "</table>";

}
else
{

}
}

?>
</div>
<h1><font color="#FFFFFF">Brazil Team</font></h1>
<p class="p">
<a href ="page.php?name=bernard">
<img hspace="4" src="images\Bernard.png" alt="Submit" height="100" width="100" class="palyer_name"></a>
<a href ="page.php?name=Dani_Alves">
<img hspace="4" src="images\Dani_Alves.png" alt="Submit" height="100" width="100" class="palyer_name"></a>
<a href ="page.php?name=Dante">
<img hspace="4" src="images\Dante.png" alt="Submit" height="100" width="100" class="palyer_name"></a></p>
<p class="p">
<a href ="page.php?name=David_Luiz">
<img hspace="4" src="images\David_Luiz.png" alt="Submit" height="100" width="100" class="palyer_name"></a>
<a href ="page.php?name=Fernandinho">
<img hspace="4" src="images\Fernandinho.png" alt="Smiley face" height="100" width="100" class="palyer_name"></a>
<a href ="page.php?name=Fred">
<img img hspace="4" src="images\Fred.png" alt="Smiley face" height="100" width="100" class="palyer_name"></a></p>
<p class="p">
<a href ="page.php?name=Henrique">
<img img hspace="4" src="images\Henrique.png" alt="Smiley face" height="100" width="100" class="palyer_name"></a>
<a href ="page.php?name=Hernanes">
<img hspace="4" src="images\Hernanes.png" alt="Smiley face" height="100" width="100" class="palyer_name"></a>
<a href ="page.php?name=bernard">
<img hspace="4" src="images\Bernard.png" alt="Submit" height="100" width="100" class="palyer_name"></a></p>


<p class="p">
<a href ="page.php?name=Dani_Alves">
<img hspace="4" src="images\Dani_Alves.png" alt="Submit" height="100" width="100" class="palyer_name"></a>
<a href ="page.php?name=Dante">
<img hspace="4" src="images\Dante.png" alt="Submit" height="100" width="100" class="palyer_name"></a>
<a href ="page.php?name=David_Luiz">
<img hspace="4" src="images\David_Luiz.png" alt="Submit" height="100" width="100" class="palyer_name"></a></p>


<p class="p">
<a href ="page.php?name=Fernandinho">
<img hspace="4" src="images\Fernandinho.png" alt="Smiley face" height="100" width="100" class="palyer_name"></a>
<a href ="page.php?name=Fred">
<img img hspace="4" src="images\Fred.png" alt="Smiley face" height="100" width="100" class="palyer_name" class="palyer_name"></a>
<a href ="page.php?name=Henrique">
<img img hspace="4" src="images\Henrique.png" alt="Smiley face" height="100" width="100" class="palyer_name"></a></p>
<p class="p">
<a href ="page.php?name=Hernanes">
<img hspace="4" src="images\Hernanes.png" alt="Smiley face" height="100" width="100" class="palyer_name"></a>
<a href ="page.php?name=bernard">
<img hspace="4" src="images\Bernard.png" alt="Submit" height="100" width="100" class="palyer_name"></a>
<a href ="page.php?name=Dani_Alves">
<img hspace="4" src="images\Dani_Alves.png" alt="Submit" height="100" width="100" class="palyer_name"></a></p>
<p class="p">
<a href ="page.php?name=Dante">
<img hspace="4" src="images\Dante.png" alt="Submit" height="100" width="100" class="palyer_name"></a>
<a href ="page.php?name=David_Luiz">
<img hspace="4" src="images\David_Luiz.png" alt="Submit" height="100" width="100" class="palyer_name"></a></p>

        </div>


</html>