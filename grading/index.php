<!DOCTYPE html>
<html>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
        <!-- Custom fonts for this template-->
        <link href="startbootstrap-sb-admin-2-gh-pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.gstatic.com/s/nunito/v24/XRXV3I6Li01BKofIOuaBXso.woff2"
        rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css" rel="stylesheet">
        <script src="startbootstrap-sb-admin-2-gh-pages/js/sb-admin-2.min.js"></script>
        <script src="startbootstrap-sb-admin-2-gh-pages/vendor/jquery/jquery.min.js"></script>
        <script src="startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <title>CAPSTONE</title>
<head>

<style>
body {font-family: Arial, Helvetica, sans-serif;  
    background-image: url("picture/h.jpg");
    background-repeat: no-repeat;
    background-position: bottom;
    background-size: 1536px 690px;
    }

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 10px 10px;
  margin: 4px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  text-align: center;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 8px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 20%;
  align: right;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.logbtn {
  width: 100px;
  padding: 5px 18px;
  background-color: green;
}
/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 12px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 20px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #1146A6;   
  margin: 8% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 30%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

.field-icon {
  float: left;
  position: absolute;
  top: 318px;
  left: 410px;
  z-index: 2;
}


@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<header>
<nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" style="background-color: #1146A6;">

<div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100">
         <div class="logo">
             <div class="simple-text logo-normal text-white text-uppercase">
                <h5>Online Grading System</h5>
             </div>
         </div>
</div>
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="nav-link" onclick="document.getElementById('id01').style.display='block'">Login</a>
        </li>
      </ul>
 </nav>
</header>
<body>

<div id="id01" class="modal">
  <form class="modal-content animate" action="logincode.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="picture/user_log.png" style="height: 200px; width: 200px" alt="Avatar" class="avatar">
    </div>

    <div class="container">
    <div class="form-group">
      <input type="text" placeholder="Enter Username" class="form-control" name="uname" required>
    </div>  
      <div class="form-group">
      <input id="password-field" type="password" placeholder="Enter Password" class="form-control" name="password" required>
      <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
    </div>
      <button type="submit" class="login_btn float-right" name="login_btn">Login</button>
    </div>
  </form>
</div>

    <script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    $(".toggle-password").click(function() {

$(this).toggleClass("fa-eye fa-eye-slash");
var input = $($(this).attr("toggle"));
if (input.attr("type") == "password") {
  input.attr("type", "text");
} else {
  input.attr("type", "password");
}
});
    </script>
</body>

</html>
