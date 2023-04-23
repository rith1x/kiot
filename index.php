<?php






if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'] ?? '';
  $password = $_POST['password'] ?? '';
  $users = json_decode(file_get_contents('storage/user.json'), true);
  $admins = json_decode(file_get_contents('storage/admins.json'), true);
  
  
  
  
  if (isset($admins[$email]) && $admins[$email][0]['password'] === $password) {
  header('Location: admin/profile.php');
  exit;
} else if (isset($users[$email]) && $users[$email][0]['password'] === $password) {
    session_start();
    $_SESSION['user'] = $users[$email][0];
    $curr_user = $users[$email][0]['email']; 
    header('Location: student/profile.html');
    echo "<script>
     const emailInput = document.getElementById('email');
     const emailValue = emailInput.value;
      localStorage.clear();
     localStorage.setItem('email', $email);
    </script>";
    exit;
  } else {
    $error = 'Invalid exam number or password. Please try again.';
  }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="manifest" href="manifest.json">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
 <meta name="theme-color" id="tobc" content="#16a085" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

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
    

    <div class="container">
      <div class="wrapper">
        <div class="title" id="title"><span> Student Login</span></div>
        <form method="post">
          <div class="row">
            <i class="fas fa-user" id="icou"></i>
            <input type="number" name="email" id="email" placeholder="Enter University Number" required >
        </div>
          <div class="row">
            <i class="fas fa-lock" id="icox"></i><input type="password" name="password" id="password" placeholder="Enter Password" required>
        </div>
          <div class="row button">
            <input type="submit" name="submit" onclick="storeUser()" value="Login" id="submitBtn">
          </div>
  <?php if (isset($error)): ?>
    <p class="error"><?php echo $error; ?></p>
  <?php endif; ?>
          <div class="signup-link" id="signupp">Not Registered? <a href="signup.php">Signup now</a></div>
          <div class="signup-linkx">
          <label for="adm">Admin?</label>
<input type="checkbox" id="adm"><br>
          <label for="spw">Show Password</label>
<input type="checkbox" id="spw"></div>
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
  overflow: hidden;
}
::selection{
  background: #1abc9c4d;
}
.container{
  max-width: 440px;
  padding: 0 20px;
  margin: 170px auto;
  transform: rotatex(45deg) rotatey()
}
.wrapper{
  width: 100%;
  background: #fff;
  border-radius: 11px;
/*   display: none; */
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
.wrapper form{
  padding: 30px 25px 25px 25px;
}
.wrapper form .row{
  height: 45px;
  margin-bottom: 15px;
  position: relative;
}
.wrapper form .row input{
  height: 100%;
  width: 100%;
  outline: none;
  padding-left: 60px;
  border-radius: 5px;
  border: 1px solid lightgrey;
  font-size: 16px;
  transition: all 0.3s ease;
}
form .row input:focus{
  border-color: #16a085;
  box-shadow: inset 0px 0px 2px 2px rgba(26,188,156,0.25);
}
form .row input::placeholder{
  color: #999;
}
      
.error{
  color: #f00;
}      
.wrapper form .row i{
  position: absolute;
  width: 47px;
  height: 100%;
  color: #fff;
  font-size: 18px;
  background: #16a085;
  border: 1px solid #16a085;
  border-radius: 5px 0 0 5px;
  display: flex;
  align-items: center;
  justify-content: center;
}
.wrapper form .pass{
  margin: -8px 0 20px 0;
}
.wrapper form .pass a{
  color: #16a085;
  font-size: 17px;
  text-decoration: none;
}
.wrapper form .pass a:hover{
  text-decoration: underline;
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
      .wrapper form .signup-linkx{
  text-align: center;
  margin-top: 20px;
  font-size: 17px;
}
.wrapper form .signup-linkx a{
  color: #16a085;
  text-decoration: none;
}
form .signup-linkx a:hover{
  text-decoration: underline;
}



      
    </style>
<script>
const path = localStorage.getItem("path");

if (path && path !== "") {
  window.location.href = path;
}

</script>

<script>
  let deferredPrompt;

window.addEventListener('beforeinstallprompt', (event) => {
  // Prevent Chrome 76+ from showing the native prompt
  event.preventDefault();
  
  // Stash the event so it can be triggered later
  deferredPrompt = event;
  
  // Show your custom installation prompt
  showInstallPrompt();
});

function showInstallPrompt() {
  // Show your custom installation prompt here
  // This can be a modal or a banner that appears on your page
}

// Trigger the deferred prompt when the user clicks your installation prompt
installButton.addEventListener('click', (event) => {
  // Show the native installation prompt
  deferredPrompt.prompt();
  
  // Wait for the user to respond to the prompt
  deferredPrompt.userChoice.then((choiceResult) => {
    if (choiceResult.outcome === 'accepted') {
      console.log('User installed the app');
    } else {
      console.log('User declined to install the app');
    }
    
    // Clear the deferred prompt variable
    deferredPrompt = null;
  });
});

</script>
<script>
const checkbox = document.getElementById('adm');
const showpassCheckbox = document.getElementById('spw');
const input = document.getElementById('email');
const pws = document.getElementById('password');
const ccbtn = document.getElementById('submitBtn');
const ccico = document.getElementById('icou');
const ccico2 = document.getElementById('icox');
const title = document.getElementById('title');
const sgnupp = document.getElementById('signupp');
const tabc = document.getElementById('tobc')

checkbox.addEventListener('change', function() {
  if (checkbox.checked) {
    input.type = 'text';
    input.placeholder = 'Enter Admin Email';
    pws.placeholder = 'Enter Admin Password';
    ccico.style.background = '#6216a0';
    ccico2.style.background = '#6216a0';
    sgnupp.style.display = 'none';
    ccbtn.style.background = '#6216a0';
    ccico.style.border = 'none';
    ccico2.style.border = 'none';
    title.textContent = 'Admin Login';
    ccbtn.style.border = 'none';
    title.style.background = '#6216a0';
    tabc.content = '#6216a0';
  } else {
    input.type = 'number';
    input.placeholder = 'Enter University Number';
    pws.placeholder = 'Enter Login Password';
    ccico.style.background = '#16a085';
    title.textContent = 'Student Login';
    title.style.background = '#16a085';
    sgnupp.style.display = 'block';
    tabc.content = '#16a085';
    ccico2.style.background = '#16a085';
    ccbtn.style.background = '#16a085';
  }
});

showpassCheckbox.addEventListener('change', function() {
  if (showpassCheckbox.checked) {
    pws.type = 'text';
    pws.style.letterSpacing = '1.5px';
  } else {
    pws.type = 'password';
    pws.style.letterSpacing = '0px';
    
  }
});

      
</script>

    <script>

    const form = document.querySelector('form');
const emailInput = document.getElementById('email');
const submitBtn = document.getElementById('submitBtn');

submitBtn.addEventListener('click', function(event) {
  // event.preventDefault();
  const emailValue = emailInput.value;
  localStorage.setItem('email', emailValue);
  // form.submit();
});


      
     // const emailInput = document.getElementById('email');
     // const emailValue = emailInput.value;
     //  localStorage.clear();
     // localStorage.setItem('email', emailValue);
    </script>
  </body>
</html>