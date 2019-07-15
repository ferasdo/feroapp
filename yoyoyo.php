<?php
$servername = "";
$username = "";
$password = "";
$dbname = "users";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("connection is failed:".mysqli_connect_error());
    }

if (mysqli_query($conn,$sql)) {
    echo "you create an account";
    }else{
        echo "Error in creating:".
        mysqli_error($conn);
}

mysqli_close($conn);

if (mysqli_query($conn,$sql)) {
    echo "";
    }else{
        echo "error in creating an account";
        mysqli_error($conn);
        }
        mysqli_close($conn);

        $sql = "INSERT INTO users ('firstname', 'lastname', 'email', 'phonenumber', 'passw', 'gender', 'birthday') VALUES('$firstname', '$lastname', '$email', '$phonenumber', '$passw,' '$gender', '$birthday')";

        if (mysqli_query($conn,$sql)) {
            $last_id = mysqli_insert_id($conn);
            }else{
                echo "Error:" . $sql."<br>".
                mysqli_error($conn);
                }

                mysqli_close($conn);
?>
<?php
session_start();
?>
<?php
if(isset($_post[username],$_post[email],$_POST[passw],$_POST[phonenumber],$_POST[birthday])) {
$passw = "filter_input(INPUT_POST FILTER_SANITIZE_STRING)";
if(strlen(passw) != 128){
$error_msg .= "<p class='error'>invalid password configuration.</p>";
}
if($insert_stmt = $mysqli->prepare("INSERT INTO users($firstname, $lastname, $email, $phonenumber, $passw, $gender, $birthday) VALUES(? ,? ,? ,? ,? ,? ,? )")) {
$insert_stmt->blind_param(sss, $firstname, $lastname, $email, $phonenumber, $passw, $gender, $birthday);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>
fero/form
</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta charset="UTF-8">
<meta name="theme-color" content="#000000">
<meta name="msapplication-navbutton-color" content="#000000">
<meta name="apple-mobile-web-app-status-bar-style" content="#000000">
<link href="https://fonts.googleleapis.com/css?family=Raileway" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://www.google.com/reCAPTCHA/api.js" async defer></script>
<script>
var password = document.getElementById("password")
,confirm_password = document.getElementById("confirm_password");

function validatepassword(){
    if(password.value != confirm_password.value) {
        confirm_password.setcustomvalidity("password don't match")
        }else{
         confirm_password.setcustomvalidity('')
         }
         }

            password.onchange = validatepassword;
            confirm_password.onkeyup = validatepassword;
</script>
<script>
var onloadCallback = function() {
grecaptcha.execult();
};

function setResponse(response) {
document.getElementById('captcha-response').value = response;
}
</script>
<script>
<a href="javascript:window.location.reload()" target="_self"></a>
</script>
<style>
{
	box-sizing: border-box;
}
body {
    background-color: #f1f1f1;
}
#regForm {
    background-color: #ffffff;
    margin: 100px auto;
    font-family: Raleway;
    padding: 40px;
    width: 70%;
    min-width: 300%;
}
h1 {
    text-align: center;
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
    background-color: #2196F3;
    color: white;
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
button {
    background-color: #4CAF50;
    color:#ffffff;
    border: none;
    padding: 10px 20px;
    font-size: 17px;
    font-family: Raleway;
    margin: 4px 2px;
    cursor: pointer;
}
input[type=text]:focus {
    border: 3px solid #555;
}
input[type=password]:focus {
    border: 3px solid #555;
}
input[type=email]:focus {
    border: 3px solid #555;
}
input[type=tel]:focus {
    border: 3px solid #555;
}
.tab {
    display: none;
}
input.invalid {
    background-color: #ffdddd;
}
button:hover {
    opacity: 0.8;
}
#prevBtn {
    background-color: #bbbbbb;
}
.step {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none;
    border-radius: 50%;
    display: inline-block;
    opacity: 0.5;
}
.step .active {
    opacity: 1;
}
.step .finish {
    background-color: #4CAF50;
}
a {
    color: #0099FF;
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
<script>
function onsubmit(token) {
    document.getElementById('regForm').submit();
    }
</script>
<script src="https://ajax.googleapis.comm/ajax/libs/jguery/2.2.4/jquery.min.js"></script>
<script type="text/javascript">
$(widow).load(function() {
$(".loader").fadeOut("slow");
});
</script>
</head>
<body bgcolor="">
<div class="loader"></div>
  <form action="Fero.com/home" method="post" enctype="multipart/form-data" id="regForm" target="_self" name="regForm">
  <h1>fero</h1>
 <div class="tab">
  <h3 align="center">Name</h3>
<p align="center" translate="on">
  <input name="firstname" type="text" value="" placeholder="First name.." minlength="3" required autofocus oninput="this.className = ''" id="firstname"></p>
 <p translate="on" align="center"><input type="text" placeholder="Last name.." name="lastname" class="form-control" minlength="3" maxlength="9"required oninput="this.className = ''" id="lastname"></p>
 </div>
 <div class="tab">
 <h3 align="center">Password</h3>
   <p align="center" translate="on">
      <input type="password" name="password" title="Must contain at least one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password.." patern="(?=.*\D)(?=.*[A-Z])(?=.*[a-z]).{8,}" required  oninput="this.className = ''" id="passw">
    </p>
	 <p translate="on" align="center">
	 <input name="password" type="password" title="Must contain at least one uppercase and lowercase letter, and at least 8 or more characters" placeholder="comfirm Password.." patern="(?=.*\D)(?=.*[A-Z])(?=.*[a-z]).{8,}" required oninput="this.className = ''" id="passw">
	 </p>
	  <p translate="on" align="center">
	 <input type="checkbox" onClick="myfunction()">Show password
      </p>
 </div>
<div class="tab">
<h3 align="center">Gender</h3>
  <p translate="on">
Male
     <input name="gender" type="radio" class="w3-radio" value="male" checked id="male">
  </p>
	<p translate="on">
Female
  <input name="gender" type="radio" class="w3-radio" value="female" id="female">
	</p>
	</div>
  <div class="tab">
  <h3 align="center">Contact info</h3>
    <p align="center" translate="on">
    <input type="email" id="email" placeholder=" your E.mail.." name="e.mail" required  oninput="this.className = ''">
  </p>
  <p align="center" translate="on">
  <input type="tel" placeholder="your telephone number.." patern="[1-9]{19}" title="Must contain numbers no spaceing and no leters" id="phonenumber" name="tel"required oninput=" this.className = ''"
  maxlength="19">
  </p>
</div>
<div class="tab">
<h3 align="center">Birth day</h3>
<p align="center" translate="on">
  <select name="year" id="birthday"required>
<option selected="selected">year
<option>1920
<option>1921
<option>1922
<option>1923
<option>1924
<option>1925
<option>1926
<option>1927
<option>1928
<option>1929
<option>1930
<option>1931
<option>1932
<option>1933
<option>1934
<option>1935
<option>1936
<option>1937
<option>1938
<option>1939
<option>1940
<option>1941
<option>1942
<option>1943
<option>1944
<option>1945
<option>1946
<option>1947
<option>1948
<option>1949
<option>1950
<option>1951
<option>1952
<option>1953
<option>1954
<option>1955
<option>1956
<option>1957
<option>1958
<option>1959
<option>1960
<option>1961
<option>1962
<option>1963
<option>1964
<option>1965
<option>1966
<option>1967
<option>1968
<option>1969
<option>1970
<option>1971
<option>1972
<option>1973
<option>1974
<option>1975
<option>1976
<option>1977
<option>1978
<option>1979
<option>1981
<option>1982
<option>1983
<option>1984
<option>1985
<option>1986
<option>1987
<option>1988
<option>1989
<option>1990
<option>1991
<option>1992
<option>1993
<option>1994
<option>1995
<option>1996
<option>1997
<option>1998
<option>1999
<option>2000
<option>2001
<option>2002
<option>2003
<option>2004
<option>2005
<option>2006
<option>2007
<option>2008
<option>2009
<option>2010
<option>2011
<option>2012
<option>2013
<option>2014
<option>2015
<option>2016
<option>2017
<option>2018
<option>2019
</select>
</p>
<p align="center" translate="on">
  <select name="day" id="birthday"required>
<option selected="selected">Day
<option value="01">01
<option value="02">02
<option value="03">03
<option value="04">04
<option value="05">05
<option value="06">06
<option value="07">07
<option value="08">08
<option value="09">09
<option value="10">10
<option value="11">11
<option value="12">12
<option value="13">13
<option value="14">14
<option value="15">15
<option value="16">16
<option value="17">17
<option value="18">18
<option value="19">19
<option value="20">20
<option value="21">21
<option value="22">22
<option value="23">23
<option value="24">24
<option value="25">25
<option value="26">26
<option value="27">27
<option value="28">28
<option value="29">29
<option value="30">30
<option value="31">31
</select>
</p>
<p align="center" translate="on">
  <select id="birthday" name="month"required>
<option selected="selected">Month
<option  value="January">January
<option  value="February">February
<option  value="March">March
<option  value="April">April
<option  value="May">May
<option  value="June">June
<option  value="July">July
<option  value="Agust">Agust
<option  value="September">September
<option  value="October">October
<option  value="November">November
<option  value="December">December
</select>
</p>
</div>
<div class="tab">
<p align="center" translate="on">
<button class="g-recaptcha" data-sitekey="6Lcit5YUAAAAALK31Xenc4MI-rAyP6sJM5UzLXzc" data-callback="onsubmit"></button>
<input type="hidden" id="captcha-response" name="captcha-response">
</p>
</div>
<div style="overflow:auto;">
  <div style="float:right;">
  <button type="button" id="nextBtn" onClick="nextprev(1)">Next</button>
</div>
<div style="float:left">
<button type="button" id="prevBtn" onClick="nextprev(-1)">Previous</button>
</div>
</div>
<div style="text-align:center;margin-top:40px;">
<span class="step"></span>
<span class="step"></span>
<span class="step"></span>
<span class="step"></span>
<span class="step"></span>
</div>
</form>
<p><a href="mailto:ferocombany@gmail.com">send a report</a></p>
<table width="100%" height="35" border="0" cellpadding="2" cellspacing="0" bgcolor="#CCCCCC">
    <tr>
      <td>Â©Fero 2019</td>
    </tr>
</table>
<script>
var currentTab = 0;
showTab(currentTab);

function showTab(n) {
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    if(n == 0) {
        document.getElementsById("prevBtn").style.display = "none";
        }else{
            document.getElementsById("prevBtn").style.display = "inline";
            }
            if(n == (x.length - 1)) {
                document.getElementsById("nextBtn").innerHTML = "Submit";
                }else{
                    document.getElementsById("nextBtn").innerHTML = "Next";
                    }
                    fixStepIndicator(n)
                    }

                    function nextprev(n) {
                        var x = document.getElementsByClassName("tab");
                        if(n == 1 && !validateForm())feturn false;
                        x[currentTab].style.display = "none";
                        currentTab = currentTab = n;
                        if(currentTab >= x.length) {
                            document.getElementsById("regForm");
                            .submit();
                            return false;
                            }
                            showTab(currentTab);
                            }
                            function validateForm() {
                                var x, y, i, valid = true;
                                x = document.getElementsByClassName("tab");
                                x[currentTab].var x = document.getElementsByTagName("input");
                                for(i = 0; i < y.length; i++) {
                                    if (y[i].className += "") {
                                        (y[i].className += "invalid");
                                        valid = false;
                                        }
                                        }
                                        return valid;
                                        }

                                        function fixStepIndector(n) {
                                            var i, x = document.getElementsByClassName("step");
                                            for(i = 0; i < x.length; i++) {
                                                x[i].className = x[i].ClassName.replace("active","");
                                                x[n].ClassName += "active";
                                                }
                                                }

                                                function myfunction() {
                                                    var x = document.getElementById("passw");
                                                    if (x.type === "password") {
                                                        x.type = "type";
                                                        }else{
                                                            x.type= = "password";
                                                            }
                                                            }
</script>
<?php
$_SESSION["user_id"] = "feroworld";
$_SESSION["firstname"] = "$firstname";
$_SESSION["lastname"] = "$lastname";
$_SESSION["gender"] = "$gender";
$_SESSION["password"] = "$passw";
$_SESSION["email"] = "$email";
$_SESSION["phonenumber"] = "$phonenumber";
$_SESSION["birthday"] = "$birthday";
?>
</body>
</html>
<?php
$cser = mysql_connect("$servername","$username","$password","$dbname");

if(isset($_POST['submit']))
{
$firstname = $_POST['$firstname'];
$lastname = $_POST['$lastname'];
$passw = $_POST['$passw'];
$gender = $_POST['$gender'];
$email = $_POST['$email'];
$phonenumber = $_POST['$phonenumber'];
$birthday = $_POST['$birthday'];
$result = mysqli_query($cser,INSERT INTO fero values('','$firstname','$lastname','$passw','$gender','$email','$phonenumber','$birthday')};

$secretkey = "6Lcit5YUAAAAACRFzAzm117Mr1c6v4K-7OvXL7O";

$statusMsg = '';
if(isset($_POST['submit'])) {
if(isset($_POST['captcha-response']) && !empty($_POST['captcha-response'])){
$verifyresponse = "file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretkey.&response='.$_POST['captcha-response'])";
$responseData = "json_decode($verifyresponse)";
if($responseData->success){
$statusMsg = '';
}else{
$statusMsg = 'robotverification is failed try again.';
}
}
?>
