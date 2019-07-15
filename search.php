<?php
$servername = "";
$username = "";
$password = "";
$dbname = "fero";
$dbname2 = "followers";

$conn = mysqli_connect($servername, $username, $password, $dbname);
$conn2 = mysqli_connect($servername, $username, $password, $dbname2);

if (!$conn) {
    die("connection is failed:".mysqli_connect_error());
}

$firstnamei = mysqli_query($conn,"SELECT firstname FROM users where lastname=$lastname");
$lastnamei = mysqli_query($conn,"SELECT lastname FROM users where firstname=$firstname");
$uname = mysqli_query($conn,"$firstnamei $lastnamei");
$toi = mysqli_query($conn,"$uname");

$follow = mysqli_query($conn2,"INSERT INTO followr ('firstname', 'lastname', 'profile_image, 'to') VALUES('$firstname', '$lastname', '$profile_image, '$to')");
?>
<?php
session_start();

if (isset($_SESSION['user_id'])) {
    }else{
     header("location: ");
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>fero/search</title>
<meta name="auther"content="feras shita">
<meta http-equiv="refresh" content="60">
<meta name="copyright"content="all copy is protacted by fero inderustry">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="theme-color" content="#000000">
<meta name="msapplication-navbutton-color" content="#000000">
<meta name="apple-mobile-web-app-status-bar-style" content="#000000">
<link rel="stylesheet" href="https://.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
body {
    font-family: Arial;
}
img[id=bf] {
    border-radius: 50%;
    border-color: red;
    }
input[type=submit] {
background-color:#0033FF;
color:#FFFFFF;
text-align:center;
width:100%;
}
input[type=search] {
    width: 80%;
    padding: 12px;
    margin: 8px 0;
    font-size: 17px;
    background: #f1f1f1;
    font-family: Raleway;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
button {
	background-color: #2196F3;
    color: white;
    font-size: 12px;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 17px;
    font-family: Raleway;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 4px;
}
button:hover {
background-color:#999999;
color: #CC0000;
}
* {
    box-sizing: border-box;
}
</style>
</head>
<body>
<div class="w3-bar w3-top w3-black w3-large" style="z-index: 4;">
</div>
<div class="w3-bottom">
<div class="w3-bar">
<a href="fero.com/profile" class="w3-bar-item w3-button" target="_self" title="profile"><i class=""></i></a>
<a href="#" class="w3-bar-item w3-button" target="_self"><i class="fa fa-search-o" title="find your frends"></i></a>
<a href="fero.com/images" class="w3-bar-item w3-button"target="_self" title="add an image"><i class="fa fa-"></i></a>
<a href="fero.com/explore" class="w3-bar-item w3-button" target="_self"><i class="fa fa-heart"></i></a>
<a href="Fero.com/home" class="w3-bar-item w3-button"target="_self" title="home"><i class="fa fa-home"></i></a>
</div>
</div>
<?php
echo "";
?>
<form>
<input type="search" palceholder="search for freinds" required id="mysearch" onKeyUp="myfunction()" title="search">
<button type="submit" value="search"><i class="fa fa-search"></i></button>
</form>
<hr color="#CCCCCC" size="1%">
<ul id="mymenu">
<?php
$res = mysqli_query($cser,"SELECT firstname,lastname FROM users WHERE firstname,lastname='$uname'");
$result = mysqli_fetch_aray($res);
if($result) {
    echo "<li>
	<form align="center" action="" method="post" enctype="multipart/form-data" id="followrequest" name="followrequest" target="_self">
<input type="hidden" value="$_SESSION["profile_image"]" id="profile_image" name="profile_image">
<input type="hidden" value="$_SESSION["firstname"]" id="firstname" name="firstname">
<input type="hidden" value=" $_SESSION["lastname"]" id="lastname" name="lastname">
<input type="hidden" value="$toi" id="to" name="to">
	<a href='location:$firstnamei $lastnamei@fero.com/home' target='_self'><img src='' id='bf'>$firstnamei $lastnamei</a> follow<button type="submit" id="to" name="to">follow</button></li>
	</form>";
    } else {
        echo "failed";
        }
?>
</ul>
</form>
<script>
function myfunction() {
    varinput, filter, ul, li, a, i;
    input = document.getElementById("mysearch");
    filter = input.value.toUpperCase();
    ul = document.getElementById("mymenu");
    li = ul.getElementByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].document.getElementById("a")[0];
        if (a.innerHTML.toUpperCase().index0f(filter) > -1) {
            li[i].style.display = "";
            } else {
                li[i].style.display = "none";
                }
                }
                }
</script>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
$firstname = $_POST['$firstname'];
$lastname = $_POST['$lastname'];
$profile_image = $_POST['$profile_image'];
$to =  $_POST['$profile_image'];
$result = mysqli_query($cser,INSERT INTO followr values('$firstname','$lastname', 'profile_image', '$to'));
?>
