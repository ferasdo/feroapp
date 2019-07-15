<?php
$servername = "";
$username = "";
$password = "";
$dbname = "feroimages";
$dbname2 = "story";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$conn2 = mysqli_connect($servername, $username, $password, $dbname2);

if (!$conn) {
    die("connection is failed:".mysqli_connect_error());
    }

    $msg = "";

    if (isset($_POST['upload'])) {
        $image = $_FILES['image']['name'];
        $image_text = mysqli_real_escape_string($db, $_POST['image_text']);

        $terget = "images/".basename($image);

        $sql = "INSERT INTO images (image, image_text, profile_image, name) VALUES ('$image', '$image_text','$profile_image_','$firstname')";
        myaqli_query($db, $sql);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "image uploaded successfully";
            }else{
                $msg = "failed to upload image";
                }
                }
                $result = mysqli_query($dbname, "SELECT * FROM images");

                $results = mysqli_query($conn, "SELECT * FROM users");
                $users = mysqli_fetch_all($results, MYSQLI_ASSOC);

                $user_id = 1;
                $post_query_result = mysql_query($conn, "SELECT * FROM posts WHERE id=1");
                $post = mysqli_fetch_assoc($post_query_result);

                $comments_query_result = mysqli_query($conn, "SELECT * FROM comments WHERE post_id=" . $post['id']. "ORDER BY created_at DESC");
                $comments = mysqli_fetch_all($comments_query_result, MYSQLI_ASSOC);

                function getUsernameById($id) {
                    global $conn;
                    $result = mysqli_fetch_assoc($result)['username'];
                    }
                    function getRepliesByCommentId($id)
                    {
                        global $conn;
                        $result = mysqli_query($conn, "SELECT * FROM replies WHERE comment_id=$id");
                        $replies = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        return $replies;
                        }
                        function getCommentsCountByPostId($post_id) {
                            global $conn;
                            $result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM comments");
                            $data = mysqli_fetch_assoc($result);
                            return $data['total'];
                            }

                            if (isset($_POST['upload'])) {
                                $image = $_FILES['image']['name'];
                                $terget = "imageo/".basename($image);

                                $sql = "INSERT INTO imageo (image) VALUES ('$image')";
                                myaqli_query($db, $sql);

                                if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                                    $msg = "image uploaded successfully";
                                    }else{
                                        $msg = "failed to upload image";
                                        }
                                        }
                                        $result = mysqli_query($db, "SELECT * FROM imageo");
?>
<?php
if (isset($_POST['liked'])) {
    $postid = $_POST['postid'];
    $result = mysqli_query($conn, "SELECT * FROM posts WHERE id=$postid");
    $row = mysqli_fetch_array($result);
    $n = $row['likes'];
    mysqliquery($conn, "INSERT INTO likes (userid, postid) VLUES (1, $postid)");
    mysqliquery($conn, "UPDATE post SET likes=$n+1 WHERE id=$postid");

    echo $n+1;
    exit();
    }
    if (isset($_POST['unliked'])) {
        $postid = $_POST['postid'];
        $result = mysqli_query($conn, "SELECT * FROM posts WHERE id=$postid");
        $row = mysqli_fetch_array($result);
        $n = $row['likes'];

        mysqli_query($conn, "DELETE FROM likes WHERE post=id=$postid AND userid=1");
        mysqli_query($conn, "UPDATE post SET likes=$n-1 WHERE id=$postid");

        echo $n-1;
        exit();
        }

        $posts = mysqli_query($conn, "SELECT * FROM posts");

		$profile = mysqli_query($conn, "SELECT profile_image FROM images");
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
<title>Fero/home</title>
<meta name="auther"content="feras shita">
<meta http-equiv="refresh" content="60">
<meta name="copyright"content="all copy is protacted by fero inderustry">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="theme-color" content="#000000">
<meta name="msapplication-navbutton-color" content="#000000">
<meta name="apple-mobile-web-app-status-bar-style" content="#000000">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=raleway">
<link rel="stylesheet" href="cdnjsflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://.cloudflare.com/ajax/libs/font-awsome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudglare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<!--!--css-- -->
<link rel="stylesheet" href="publish/fero www.css">
<script>
function loadDoc(){
    varxhttp = new XMLHttpRequest();
    xhttp.onreadystatechange == 4 && this.status == 200){
        docoment.getElementbyId("demo").innerHTML =
        this.responseText;
        }
        };
        xhttp.open("get","ajax_info.txt",true);
        xhttp.send();
        }
        </script>
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", san-serif}
</style>
<style>
.switch {
position: relative;
display: inline-block;
width: 60px;
height: 34px;
}
/* CSS Document */

.post-info {
    margin: 10px auto 0px;
    padding: 5px;
    }
    .fa {
        font-size: 1.2em;
        }
        .like, .unlike, .likes_count {
            color: #FF0000;
            }
            .hide {
                display: none;
                }
                .fa-thumbs-up, .fa-thumbs-o-up {
                    transform: rotateY("-180deg");
                    font-size:1.3em;
                    }
                    i {
                        color: #FF3333;
                        }

img[id=sd] {
border: none;
padding: 5px;
width: 765px;
height:350px;
}
img[id=profile] {
border-radius: 50%;
border: #CC0000 thick ;
width: 15%;
}
img[id=story] {
border-radius: 50%;
border: #CC0000 thick ;
width: 15%;
}

video {
border: none;
padding: 5px;
width: 765px;
height:350px;
}

img:hover {
box-shadow: 0 0 2px rgpa(0, 140, 0.5)
}
input[type=file] {
display: none;
}
.post {
border: 1px solid #ccc;
margin-top: 10px;
}
.comments-section {
margin-top: 10px;
border: 1px solid #ccc;
}
.comment {
margin-bottom: 10px;
}
form button {
margin: 5px 0px;
}
textarea {
display: block;
margin-bottom: 10px;
margin-top: 0px;
margin-left: 0px;
margin-right: 0px;
border-bottom: #E6E6E6;
}
textarea:focus {
border-bottom: #0000FF solid 3px;
}
a[id=a] {
    color: #000000;
}
.comment .comment-name {
font-weight:bold;
}
.comment .comment-date {
font-style:italic;
font-size:0.8em;
}
.comment .reply-btn, .edit-btn {
font-size:0.8em;

}
.comment-details {
width: 91.5px;
float: left;
}
.comment-details p {
margin-bottom: 0px;
}
.comment .profile_pic {
width: 35px;
height: 35px;
margin-right: 5px;
float: left;
border-radius: 50%;
}
.reply {
margin-left: 30px;
}
reply_form {
margin-left: 40px;
display: none;
}
#comment_form {
margin-top: 10px;
}

.switch input {
opacity: 0;
width: 0;
height: 0;
}

.slider {
position: absolute;
corsor: pointer;
top: 0;
left: 0;
right: 0;
bottom: 0;
background-color: #ccc;
-wibkit-transition: .4s;
}
buton[class=dr] {
    border="none";
    }
.slider:before {
position: absolute;
content: "";
height: 26px;
left: 4px;
bottom: 4px;
background-color: #FFFFFF;
-wibkit-transition: .4s;
transition: .4s;
}

input:checked + .slider {
background-color:#2196F3;
}

input:focus + .slider {
box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
-webkit-transform: translatex(26px);
-ms-transform: translatex(26px);
transform: translatex(26px);
}

.slider .round {
border-radius: 34px;
}

.slider .round:before {
border-radius: 50%;
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
.popover-title {
    text-align: center;
    }
    .custom-popover {
        border: none;
        text-align: center;
        }
        .custom-popover li:nth-child(2) {
            border-top: 1px solid #ccc;
            }

             custom-popover li:last-child {
                 border-top: 1px solid #ccc;
                 }
</style>
<script src="https://ajax.googleapis.comm/ajax/libs/jguery/2.0.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$(function () {
    window.emojipacker = newEmojiPicker({
        emojiable_selector: '[data-emojiable=true]',
        assetsPath: 'vendor/emoji-picker/lib/img/',
        popupButtonClasses: 'icon-smile'
        });
        widow.emojiPlicker.discover()
        );
</script>
<link href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awsome.min.css" rel="stylesheet">
<link href="vendor/emoji-packer-picker/lib/css/emoji.css" rel="stylesheet">
<script src="vendor/emoji-picker/lib/js/config.js"></script>
<script src="vendor/emoji-picker/lib/js/unil.js"></script>
<script src="vendor/emoji-picker/lib/js/jquery.emojiarea.js"></script>
<script src="vendor/emoji-picker/lib/js/emoji-packer.js"></script>
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.comm/ajax/libs/jguery/2.2.4/jquery.min.js"></script>
<script type="text/javascript">
$(window).load(function() {
    $(".loader").fadeOut("slow");
    });
</script>
<script>
$(document).ready(myfunction() {
    $('[data-toggle="popover"]').popover({
        html: true,
        content: function() {
            return $('#popover-content')
            }
            });
            });
</script>
</head>
<body class="w3-light-grey" style="background-color: rgb(255, 255, 255);">
<div class="loader"></div>
<div class="w3-bar w3-top w3-black w3-large" style="z-index: 4;">
<button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onClick="w3_open;">
<i class="fa fa-bars"></i></button><span class="w3-bar-item w3-right"></span>
</div>
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
<div class="w3-container w3-row">
<a href="fero.com/profile" target="_self"><img src="<?php $_SESSION['profile_image'] ?>" width="150px" class="w3-circle w3-margin-right" style="width:46px;"></a>
</div>
<div class="w3-col s8 w3-bar">
<span>Welcome To,<strong>Fero</strong></span><br>
</div><div class="w3-bar-block">
<h5>Dashboard</h5>
</div>
<div class="w3-bar-block">
  <p><a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onClick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>Close Menu</a></p>
  <p>
      <a href="fero.com/images" target="_self"><i class="fa fa-camera"></i>upload some images</a>      </p>
  <p><a id="myBtn" onClick="myfunc('Demo1')" href="javascript:void(0)" class="w3-bar-item w3-button">settings<i class="fa fa-cog fa-fw fa-spin"></i></a>
    </p>
  <div id"Demo1" class="w3-hide w3-animate-left">
 <label class="switch">
<input type="checkbox"onclick="dark()">
<span class="slider round"></span></label>
<a href="fero.com/logout"><button>sign out</button></a>
</div>
<br>
<br>
</div>
</nav>
<div class="w3-overlay w3-hide-large w3-animate-opacity" onClick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
</div>
<div class="w3-bottom">
<div class="w3-bar">
<a href="fero.com/profile" class="w3-bar-item w3-button" target="_self" title="profile"><i class="fa fa-user"></i></a>
<a href="fero.com/search" class="w3-bar-item w3-button" target="_self" title="search"><i class="fa fa-search"></i></a>
<a href="fero.com/images" class="w3-bar-item w3-button" target="_self" title="add an image"><i class="fa fa-picture"></i></a>
<a href="fero.com/explore" class="w3-bar-item w3-button" target="_self" title="explore"><i class="fa fa-heart"></i></a>
<a href="#" class="w3-bar-item w3-button" target="_self" title="home"><i class="fa fa-home-o"></i></a>
</div>
</div>
<div class="container">
<div class="story">
<p>
<label for="story"><img src="story/ .$row[image]." style="border: thick #000000 solid; border-radius: 50%;" alt="story" id="story"></label>
<form method="post" action="Fero.com/home" enctype="multipart/form-data" target="_self">
<input type="hidden" name="size" value="1000000">
<input type="file" name="story" id="story">
</form>
<?php
echo "<img src='story/ .$row[image].' style='border: thick #000000 solid; border-radius: 50%;' alt='story' id='story'>";
?>
</p>
<hr width="100%">
</div>
<?php
foreach ($user as $user);
while ($row = myaqli_fetch_array($result)) {
echo "<div id='image_div'>";
echo "<p>";
echo "<img src='$profile' style='border-radius: 50%; border-color: red; width: 1; height: 1;' id='profile'>";
echo "$firstname $lastname";
echo "<div class='form-group'>
<a href='#' data-toggle='popover' data-placement='buttom' title='About image' id='a'>...</a>
</div>

<div id='popover-content' style='display: none'>
<ul class='list-group custom-popover'>
<li class='list-group-item'><a href=''>Send a report</a></li>
<li class='list-group-item'><a href=''>Hide the image</a></li>
<li class='list-group-item'><a href='#' onclick='copy();'>Copy text</a></li>
<li class='list-group-item'><a href=''>copy URL</a></li>
</ul>
</div>
";
echo "</p>";
$type = $_FILES['images/']['type'];

$img_type = array('images/.GIF','images/.PIC','images/.JPG','images/.TIF','images/.TIFF','images/.bmp','images/.dip');

$video_type = array('images/mp4','images/ogg','images/webm');

if (in_array($type,$img_type)) {
echo "<img src='images/ .$row[image].' id='sd'>";
}
elseif (in_array($type,$video_type)) {
echo "<video control autoplay preload='auto'>
<source src='images/' type='video/webm'>
<source src='images/' type='video/ogg'><source src='images/' type='video/mp4'></video>";
} else {
};
echo "<p id='copyt'>".$row['image_text']."</p>";
echo "<p>";
echo "<label for='comment_text'><i class='fal fa-comment'></i></label>";
echo "<div class='post-info'>
<?php while ($row = mysqli_fatch_array($posts)) { ?>
<?php
$results = mysqli_query($conn, 'SELECT * FROM likes WHERE userid=1 AND postid='.$row[id].');
if (mysqli_num_rows($result) == 1): ?>
<span class='unlike fa fa-heart' data-id='<?php echo $row[id] ?>'></span>
<span class='like hide fa fa-heart-o' data-id='<?php echo $row[id] ?>'></span>
<?php else: ?>
<span class='like hide fa fa-heart-o' data-id='<?php echo $row[id] ?>'></span>
<span class='unlike fa fa-heart' data-id='<?php echo $row[id] ?>'></span>
<?php endif ?>

<span class='likes_count'><?php echo $row[likes]; ?> likes</span>
</div>
<?php } ?>";
echo "</p>";
echo "<div class='container'>
<div class='row'>
<div class='col-md-6 col-md-offset-3 post'>
<h2><?php echo $post[title]; ?></h2>
<p><?php echo $post[body]; ?></p>
</div>
<div class='col-md-6 col-md-offset-3 comment-section'>
<?php if (isset($user_id)): ?>
<form class='clearfix' action='' method='post' id='comment_form'>
<textarea name='comment_text' id='comment_text' class='form-control' cols='30' rows='3' data-emojiable='true' data-emoji-input='unicode'></textarea>
<button class='dr' id='submit_comment'>send</button>
</form>
<?php else: ?>
<?php endif: ?>
<h2><span id='comment_count'><?php echo count($comments) ?></span>comments</h2>
<hr>
<div class='comments-wrapper'>
<?php if (isset($comments)): ?>
<?php foreach ($comments as $comment): ?>
<div class='comment clearfix'>
<img src='profile.png' alt='' class='profile_pic'>
<div class='comment-details'>
<span class='comment-name'><?php echo getUsernameById($comment[user_id]) ?></span>
<span class='comment-date'><?php echo date(F J, Y ,strotime($comment[created_at])); ?></span>
<p><?php echo $comment[body]; ?></p>
</div>
</div>
<?php endforeach ?>
<?php endif ?>
</div>
</div>
<?php endforeach ?>
<?php endif ?>
<?php endif ?>
</div>
</div>";
echo "</div>";
}
?>
</div>
<script>
var mySidebar = document.getElementById("mySidebar");

var overlayBg = document.getElementById("myOverlay");

function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        mySidebar.style.display = 'none';
        }else{
            mySidebar.style.display = 'block';
            overlayBg.style.display = 'block';
            }
            }

            function w3_close() {
                mySidebar.style.display = "none";
                overlayBg.style.display = "none";
                }

                var openInbox = documentElementById("myBtn");
                openInbox.click();
</script>
<script>
function dark() {
    if (document.body.style.backgrondColor == 'rgb(255, 255, 255)') {
        document.body.style.backgroundColor = '#333';
        }else{
            document.body.style.backgroundColor = 'rgb(255, 255, 255)';
            }
            }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(document).on('click', '#submit_comment',function(e) {
        e.preventDefult();
        var comment_text_text = $('#comment_text').val();
        var url = $('#comment_form').attr('action');
        if (comment_text === "" ) return;
        $.ajax({
            url: "url",
            type: "post",
            data: {

    comment_text: comment_text,
    comment_post: 1
    },
    success: function(data){
        var response = JSON.parse(data);
        if (data === "error") {
            alert('there was an error in posting.please try agin');
            }else{
                $('#comment_wrapper').prepend(response.comment)
                $('#comment_count').text(response.comment_count);
                $('#comment_text').val('');
                }
                }
                });
                });
                $(document).on('click','.reply-btn', function(e){
                    e.preventDefult();
                    var comment_id = $(this).data('id');
                    $(this).parent().siblings('form#comment_reply_form_' + comment_id).togle(500);
                    $(document).on('click', 'submit-reply', function(e){
                        e.preventDefault();
                        var reply_textarea = $(this).sibliings('textarea');
                        var reply_text = $(this).sibliings('textarea').val();
                        var url = $(this).parent().attr('action');
                        $ajax({
                            url: url,
                            type: "post",
                            data: {
                                comment_id: comment_id,
                                reply_text: reply_text,
                                reply_posted: 1
                                },
                                success: function(data){
                                    if (data === "error") {
                                        alert('there was an error in replying');
                                        }else{
                                            $('.replies_wrapper_' + comment_id).append(data);
                                            reply_text_area.val('');
                                            }
                                            }
                                            });
                                            });
                                            });
                                            });
</script>
<script src="jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('.like').on('click', function(){
        var postid = $(this).data('id');
        $post = $(this);

        $.ajax({
            url: 'fero.com/home'
            type: 'post',
            data: {
                'liked': 1,
                'post': postid
                },
                success: function(response){
                    $post.parent().find('span.likes_count').text(response + "likes");
                    $post.addClass('hide');
                    $post.sibling().removeClass('hide');
                    }
                    });
                    });

                    $('.unlike').on(click, function()){
                        var postid = $(this).data('id');
                        $post = $(this);

                        $.ajax({
                            url: fero.com/home
                            type: 'post',
                            data: {
                                'liked': 1,
                                'post': postid
                                },
                                success: function(response){
                                    $post.parent().find('span.likes_count').text(response + "likes");
                                    $post.addClass('hide');
                                    $post.sibling().removeClass('hide');
                                    }
                                    });
                                    });
                                    });
</script>
<script>
function copy() {
    var copytext = document.getElementById("copyt");
    copytext.select();
    document.execCommand("copy");
    alert("copytext.value);
    }
</script>
</body>
</html>
