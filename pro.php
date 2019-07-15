<?php
$servername = "";
$username = "";
$password = "";
$dbname = "users";
$dbname2 = "followers";

$conn = mysqli_connect($servername, $username, $password, $dbname);
$conn2 = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("connection is failed:".mysqli_connect_error());
    }

$msg = "";
$msg_class = "";
if (isset($_POST['save_profile'])) {
    $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];
    $target_dir = "image/";
    $target_file = $target_dir . basename($profileImageName);
    if($_FILES['profileImage']['size'] > 400000) {
        $msg = "Image size should not be more than 400kb";
        $msg_class = "alert-danger";
        }
    if (empty($error)) {
        if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
            $mysql =  mysqli_query($conn,"INSERT INTO users SET profileImage='$profileImageName'");
            if(mysqli_query($conn, sql)){
                $msg = "image uploaded and saved";
                $msg_class = "alert-success";
                }else{
                    $msg = "There is an error in database";
                    $msg_class = "alert-danger";
                    }
                    }else{
                        $msg = "There is an error in uploading your image";
                        $msg_class = "alert-danger";
                        }
                        }
                        }
?>
<?php
$uname = "$_SESSION["firstname"] $_SESSION["lastname"]";

$firstname =  mysqli_query($conn2,"SELECT firstname FROM followr WHERE to=$uname");
$lastname =  mysqli_query($conn2,"SELECT lastname FROM followr WHERE to=$uname");
$profileimage  =  mysqli_query($conn2,"SELECT profile_image FROM followr WHERE to=$uname");

$count =  mysqli_query($conn2,"SELECT COUNT(first_name) FROM follown WHERE uname=$uname");
$img =  mysqli_query($conn2,"SELECT images FROM images WHERE $_SESSION["firstname"]=$firstname");
?>
<?php
session_start();

if (isset($_SESSION['user_id'])) {
    }else{
     header("location: ");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>fero/profile</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="theme-color" content="#000000">
<meta name="msapplication-navbutton-color" content="#000000">
<meta name="apple-mobile-web-app-status-bar-style" content="#000000">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awsome.min.css">
<style>
.form-div {
	margin-top: 100px;
	border: 1px solid #e0e0e0;
}
#profileDisplay {
	display: block;
	height:210px;
	width: 60%;
	margin: 0px auto;
	border-radius: 50%;
}
img-placeholder {
	width: 60%;
	color: #FFFFFF;
	height: 100%;
	background: #000000;
	opacity: .7;
	height: 270px;
	border-radius: 50%;
	z-index: 2;
	position: absolute;
	left: 50px;
	transform: translateX(-50%);
	display: none;
}
img-placeholder h4 {
	margin-top: 40%;
	color: #FFFFFF;
}
img-div:hover .img-placeholder {
	display: block;
	cursor: pointer;
}
.loader {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	background-color: #E6E6E6;
	height: 100%;
	z-index: 9999;
	opacity: .8;
}
img[id=ac] {
    border-radius: 50%;
    border-color: #000000;
    }
div[id=vc] {
    border: 60px;
    border-color: white;
    border-radius: 10px;
    }
button[id=cx] {
	background-color:#00FF00;
    width: 500px;
    border-radius: 10px;
    color: black;
        }
button[id=cz] {
    width: 500px;
    border-radius: 10px;
    color: black;
	background-color:#FF0000;
    }
img[id=me] {
width: ;
height: ;
border: none;
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
<div class="w3-bottom">
<div class="w3-bar">
<a href="fero.com/profile" class="w3-bar-item w3-button" target="_self"><i class="fa fa-user-o"></i></a>
<a href="fero.com/search" class="w3-bar-item w3-button" target="_self"><i class="fa fa-search"></i></a>
<a href="fero.com/images" class="w3-bar-item w3-button" target="_self"><i class="fa fa-picture"></i></a>
<a href="fero.com/explore" class="w3-bar-item w3-button" target="_self"><i class="fa fa-heart"></i></a>
<a href="#" class="w3-bar-item w3-button" target="_self"><i class="fa fa-home"></i></a>
</div>
</div>
<div class="container">
<div class="row">
<div class="col-4 offset-md-4 form-div">
<form action="" method="post" enctype="multipart/form-data" target="_self">
<h2 class="text-center mb-3 mt-3">Profile</h2>
<?php if (!empty($msg)): ?>
<div class="alert <?php echo $msg_class ?>" role="alert">
<?php echo $msg; ?>
</div>
<?php endif; ?>
<div class="form-group text-center" style="position: relative;">
<span class="img-div">
<div class="text-center image-placeholder" onClick="triggerClick()">
<h4>Update image</h4>
</div>
<span class="form-group text-center" style="position: relative;"><img src="images/avatar.jpg" onClick="triggerClick()" id="profileDisplay"></span></span>
<input type="file" name="priofileImage" onClick="displayImage(this)" id="priofileImage" class="form-control" style="display: none;">
<label>Profile Image</label>
</div>
<div class="form-group">
<button type="submit" name="save_profile" class="btn btn-primary btn-block">Save</button>
</div>
</form>
<b>followers: <?php echo "$count"; ?></b>
<hr width="100%">
<?php
echo "<div id='vc'>
<form>
<input type='hidden' value='$profileimage' name=''>
<input type='hidden' value='$firstname' name='firstname'>
<input type='hidden' value='$lastname' name='lastname'>
<input type='hidden' value='$uname' name='uname'>

<img src='image/ . $user[$profileimage]' alt='' id='ac'>
<b>$firstname $lastname</b>
<button type='submit' id='cx'>accept</button>
<button type='reset' id='cz'>no</button>
</form>
</div>";
?>
</div>
</div>
</div>
<div>
<?php
echo "<img src='$img' alt='me' id='me'>";
?>
</div>
</body>
</html>
<script>
function triggerClick(e) {
    document.querySelector('#profileImage').click();
    }
function displayImage(e) {
    if (e.file[0]) {
        var reader = new FileReader();
        reader.onload = function(e){
            document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
            }
            }
</script>
<?php
$follow =  mysqli_query($conn2,"INSERT INTO follown ('firstname', 'lastname', 'profile_image, 'uname') VALUES('$firstname', '$lastname', '$profile_image, '$uname')");

$_SESSION["profile"] = "$priofileimage";
?>
