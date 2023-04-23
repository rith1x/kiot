<?php require("process/process-signup.php") ?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <link rel="stylesheet" href="login.css">
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" defer></script>
<script>
  window.OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "1398208d-baf9-4404-a198-1c89b9dcd14c",
    });
  });
</script>


</head>
<body>
    
    <?php if(isset($_GET['error'])): ?>
        <p style="color:red"><?php echo $_GET['error']; ?></p>
    <?php endif; ?>
    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Signup Form</span></div>
    <form action="" method="post">

        <div class="row">
            <label for="name">Name:</label><br>
            <input type="text" name="name" id="name" required>
        </div>

        <div class="row">
            <label for="name">Department:</label><br>
            <input type="text" name="dept" id="dept" required>
        </div>

        <div class="row">
            <label for="age">Age:</label><br>
            <input type="number" name="age" id="age" required>
        </div>

        <div class="row">
            <label for="phone">Phone :</label><br>
            <input type="number" name="phone" id="phone" required>
        </div>
<div class="row">
            <label for="gen">Gender:</label><br>
            <select name="gender">
  <option value="male">Male</option>
  <option value="female">Female</option>
</select>

        </div>
        <div class="row">
            <label for="email">Email:</label><br>
            <input type="email" name="email" id="email" required>
        </div>

        <div class="row">
            <label for="exam_number">Exam Number:</label><br>
            <input type="number" name="exam_number" id="exam_number" required>
        </div>

<div class="row">
            <label for="roll_number">Roll Number:</label><br>
            <input type="text" placeholder="2K21AI23" name="roll" id="roll_number" required>
        </div>
      
        <div class="row">
            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password" required>
        </div>

        <div class="row button">
            <input type="submit" id="submit" name="submit" value="Submit">
        </div>





        <div class="signup-link">Already a User? <a href="index.php">Signin here</a></div>
    </form>
</div>
</div>
    <style>
        @font-face {
    font-family: sams;
    src: url(fonts/font.ttf);
}
        
        *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family:sams;
}
body{
  background: #fff;
  overflow: auto;
}
::selection{
  background: #1abc9c4d;
}
.container{
  max-width: 440px;
  padding: 0 15px;
  margin: 170px auto;
}
.wrapper{
  width: 100%;
  background: #fff;
  border-radius: 11px;
  box-shadow: 0px 4px 15px 1px #33333350;
}
.wrapper .title{
  height: 90px;
  background: #16a085;
  border-radius: 5px 5px 0 0;
  color: #fff;
  font-size: 30px;
  font-weight: 600;
  display: flex;
  align-items: center;
  justify-content: center;
}
#roll{
  text-transform: uppercase;
}
.wrapper form{
  padding: 30px 25px 25px 25px;
}
.wrapper form .row{
  height: 45px;
  margin-bottom: 25px;

  position: relative;
}
.wrapper form .row label{
    padding-bottom: 5px;
}
.wrapper form .row input{
  height: 40px;
  width: 100%;
  outline: none;
  padding-left: 10px;
  border-radius: 5px;
  font-family: sams;
  border: 1px solid lightgrey;
  font-size: 16px;
  transition: border 0.3s ease;
}
form select{
  height: 40px;
  width: 100%;
  outline: none;
  padding-left: 10px;
  border-radius: 5px;
  border: 1px solid lightgrey;
  font-size: 16px;
  transition: border 0.3s ease;
}
form .row input:focus{
  border: solid 2px #16a085;
  
}
form .row input::placeholder{
  color: #999;
}


.wrapper form .button input{
  color: #fff;
  font-size: 20px;
  font-weight: 500;
  padding-left: 0px;
  background: #16a085;
  border: 1px solid #16a085;
  cursor: pointer;
}
form .button input:hover{
  background: #12876f;
}
.wrapper form .signup-link{
  text-align: center;
  margin-top: 20px;
  font-size: 17px;
}
.wrapper form .signup-link a{
  color: #16a085;
  text-decoration: none;
}
form .signup-link a:hover{
  text-decoration: underline;
}
@media only screen and (max-width: 768px) {
  .container{
      margin: 15px 0;
  }
    
}
    </style>
</body>
</html>
