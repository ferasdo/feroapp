<?php
$servername = "";
$username = "";
$password = "";
$dbname = "users";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("connection is failed:".mysqli_connect_error());
    }
    $uname = "$firstname,$lastname,$email,$phonenumber";
    $upassword = "$password";

session_start();

$user_check =

if (! empty($_POST)) {
    if ((isset $_POST['uname']) && isset ($_POST['upassword'])) {
        $conn = new mysqli($dbname);
        $stmt = $con->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->blind_param('s', ''$_POST['username']);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_object();

        if ( password_verify( $_POST['password'], $user->password )) {
            $_SESSION['user_id'] = $user->ID;
        }
    }
}

if($_SERVER['REQUEST_METHOD'] == "POST")) {
    $uname = mysqli_real_escape_string($conn,$_POST['uname']);
    $upassword = mysqli_real_escape_string($conn,$_POST['upassword']);

    $res = mysqli_query($conn,"SELECT * FROM users WHERE firstname+lastname,email,phonenumber='$uname' AND password='$upassword'");
	$ftr = mysqli_query($conn,$res);
    $result = mysqli_fetch_array($res,MYSQLI_ASSOC);

	$count = mysqli_num_rows($ftr);

    if($count == 1) {
        ("location:Fero.com/home");
        }else{
            echo "failed";
            }
            }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>
Fero
</title>
<meta name="description" content="-you can login to fero- edit, share, comment & like on images, videos & stories">
<meta name="auther" content="feras shita">
<meta http-equiv="refresh" content="3600">
<meta name="copyright"content="all copy is protacted by fero inderustry">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta name="keywords" content="fero,fero account,feras,social media,feras shita,feras rida,fero email,f,fero.com,fero sh, fero home,feroe">
<meta charset="UTF-8">
<meta name="theme-color" content="#000000">
<meta name="msapplication-navbutton-color" content="#000000">
<meta name="apple-mobile-web-app-status-bar-style" content="#000000">
<style>
button{
background-color:#00CCFF;
width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
	font-size: 17px;
    font-family: Raleway;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }
{
	box-sizing: border-box;
}
body {
	background-color: #f1f1f1;
}
h1 {
	text-align: center;
	font-family: "Brush Script MT";
}
h3 {
	text-align: center;
}
a {
	color: #0099FF;
}
input[type=text] {
    width: 50%;
    padding: 12px 20px;
	font-size: 17px;
	font-family: Raleway;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }
select {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
	font-size: 17px;
	font-family: Raleway;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }
input[type=password] {
    width: 50%;
    padding: 12px 20px;
	font-size: 17px;
	font-family: Raleway;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }
input[type=email] {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
	font-size: 17px;
	font-family: Raleway;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }
input[type=tel] {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
	font-size: 17px;
	font-family: Raleway;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }
input[type=submit] {
	background-color:#00CCFF;
	text-align: center;
	width: 50%;
	color: #FFFFFF;
    padding: 12px 20px;
    margin: 8px 0;
	font-size: 17px;
	font-family: Raleway;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }
input[type=button] {
	background-color:#00CCFF;
	text-align: center;
	width: 50%;
	color: #FFFFFF;
    padding: 12px 20px;
    margin: 8px 0;
	font-size: 17px;
	font-family: Raleway;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }
input[type=text]:focus {
	border: 3px solid #555
}
input[type=password]:focus {
	border: 3px solid #555
}
input[type=email]:focus {
	border: 3px solid #555
}
input[type=tel]:focus {
	border: 3px solid #555
}
.loader {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	background-color:#E6E6E6;
	height: 100%;
	z-index: 9999;
	opacity: .8;
}
</style>
<script src="https://ajax.googleapis.comm/ajax/libs/jguery/2.2.4/jquery.min.js"></script>
<script type="text/javascript">
$(widow).load(function() {
    $(".loader").fadeOut("slow");
    });
</script>
</head>
<body>
<div class="loader"></div>
<h1>Fero</h1>
<form action="Fero.com/home" enctype="multipart/form-data" target="_self" id="face" method="post" name="face">
<p align="center" translate="on">
  <input type="text" placeholder="Your account name" name="uname">
 <input type="password" placeholder="Password" id="myInput" name="upassword" require>
  </p>
<p align="center" translate="on">show password
<input type="checkbox" onClick="myfunction()" require>
<a href="">forgot password?</a>
  </p>
<p align="center" translate="on">
 <input type="submit" value="send" name="sub">
</p>
</form>
<h3>Or</h3>
<p align="center" translate="on">
<a href="fero.com/form" target="_self" title="if you don't have an account"><input type="button" value="create an acount"></a>
</p>
<script>
function myfunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "type";
        }else{
            x.type= = "password";
            }
            }
</script>
</body>
</html>
<?php
$_SESSION["user_id"] = "feroworld";
$_SESSION["firstname"] = "$firstname";
$_SESSION["lastname"] = "$lastname";
$_SESSION["password"] = "$passw";
?>
