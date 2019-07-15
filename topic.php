<?php
$servername = "";
$username = "";
$password = "";
$dbname = "images";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("connection is failed:".mysqli_connect_error());
    }

    $msg = "";

    if (isset($_POST['upload'])) {
        $image = $_FILES['image']['name'];
        $image_text = mysqli_real_escape_string($conn, $_POST['image_text']);

        $terget = "images/".basename($image);

        $sql = "INSERT INTO images (image, image_text) VALUES ('$image', '$image_text')";
        myaqli_query($db, $sql);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "image uploaded successfully";
            }else{
                $msg = "failed to upload image";
                }
                }
                $result = mysqli_query($conn, "SELECT * FROM images");
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
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="theme-color" content="#000000">
<meta name="msapplication-navbutton-color" content="#000000">
<meta name="apple-mobile-web-app-status-bar-style" content="#000000">
<title>fero/images</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=raleway">
<link rel="stylesheet" href="cdnjsflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
textarea {
border: none;
width: 100%;
height: 99px;
}
input[type=file] {
display: none;
}
button {
background-color: #0066FF;
border: none;
border-radius: 100px;
}
label {
display: block;
width: 100%;
text-align: center;
border: #000000;
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
<div class="w3-bottom">
<div class="w3-bar">
<a href="fero.com/profile" class="w3-bar-item w3-button" target="_self"><i class="fa fa-user"></i></a>
<a href="fero.com/search" class="w3-bar-item w3-button" target="_self"><i class="fa fa-search"></i></a>
<a href="fero.com/images" class="w3-bar-item w3-button" target="_self"><i class="fa fa-picture-o"></i></a>
<a href="fero.com/expolore" class="w3-bar-item w3-button" target="_self"><i class="fa fa-heart"></i></a>
<a href="fero.com/home" class="w3-bar-item w3-button" target="_self"><i class="fa fa-home"></i></a>
</div>
</div>
<form method="post" action="Fero.com/home" enctype="multipart/form-data" target="_self">
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
<a href="history.back(-1)"><span class="w3-bar-item w3-center">X</span></a>
</div>
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
<input type="hidden" name="size" value="1000000">
<input type="hidden" name="first_name" id="first_name" value="<?php $_SESSION["firstname"] ?>">
<input type="hidden" name="last_name" id="last_name" value="<?php $_SESSION["lastname"] ?>">
<input type="hidden" name="profile_image" id="profile_image" value="<?php $_SESSION["profile_image"] ?>">
<?php
while ($row = myaqli_fetch_array($result)) {
echo "<div id='image_div'>";
echo "<img src='images/' .$row[image].'>";
echo "</div>";
}
?>
<div>
<input type="file" name="image" accept="image/*,video/*">
</div>
<div>
  <textarea id"text" cols="40" rows="4" name="image_text" placeholder="describe your image..">
  </textarea>
</div>
<label for="file_image">image/video</label>
<button type="submit" name="upload" style="width: 100%;">send</button>
</form>
</body>
</html>
