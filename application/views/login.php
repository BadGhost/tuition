<!doctype html>

<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Pi+ Tuition Centre Management System &gt; Login</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url().'assets/css/sb-admin-2.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/vendor/fontawesome-free/css/all.min.css'; ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url().'assets/'; ?>css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url().'assets/'; ?>css/mdb.min.css" rel="stylesheet">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }


      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

    </style>



    <!-- Custom styles for this template -->
    <link href="<?php echo base_url().'assets/css/signin1.css'; ?>" rel="stylesheet">
  </head>
  <body class="text-center">




  <form class="form-signin" method="post" action="<?php echo base_url().'welcome/login'; ?>">
  <div class="rotate-n-25">
    <i class="fab fa-leanpub fa-8x"></i>
  </div>
  <h1 class="h3 mb-3 font-weight-normal">Pi+ Tuition Centre Management System</h1>
        <?php
        if(isset($_GET['pesan'])){
            if($_GET['pesan'] == "gagal"){
                echo '<div class="alert alert-danger text-left" role="alert"><strong>Login Failed!</strong><br>Username and password not matched.</div>';
            } else if($_GET['pesan'] == "logout"){
                echo '<div class="alert alert-success text-left" role="alert">Logout Success!</div>';
            } else if($_GET['pesan'] == "belumlogin"){
                echo '<div class="alert alert-warning text-left" role="alert">Please Log In!</div>';
            }
        }
        ?>
  <select class="form-control" name="user" id="choice" required>
    <option value="">Choose Login</option>
    <option value="admin">Head Admin/Accountant/Tutor</option>
    <option value="tutor">Tutor</option>
  </select>
  <div><br></div>
  <label for="inputUname" class="sr-only">Username</label>
  <input type="text" name="username" id="inputUname" class="form-control" placeholder="Username" required autofocus>
      <?php echo form_error('username'); ?>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <?php echo form_error('password'); ?>

     <div class="form-row">
       <div class="form-group col-md-6">
         <input type="text" class="form-control" readonly id="capt">
       </div>
       <div style="margin-top:10px; color: #D8000C; background-color: #FFBABA; border-radius: 7px;" id="log"></div>
       <div class="form-group col-md-6">
         <input type="text" class="form-control" name = "captcha" id="textinput" placeholder="Captcha" required>
       </div>
         </div>

 <div class="form-group">
               <button onclick="return validcap()" class="btn btn-lg btn-primary btn-block" value="Login" type="submit">Log In</button>
               <button onclick="cap()" class="btn btn-link" type="button">Captcha not visible</button>
         <p class="mt-5 mb-3 text-muted">&copy; HISNA 2021</p>
     </div>
   </form>
<script type="text/javascript">
 function cap(){
   var alpha = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V'
                ,'W','X','Y','Z','1','2','3','4','5','6','7','8','9','0','a','b','c','d','e','f','g','h','i',
                'j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z', '!','@','#','$','%','^','&','*','+'];
                var a = alpha[Math.floor(Math.random()*71)];
                var b = alpha[Math.floor(Math.random()*71)];
                var c = alpha[Math.floor(Math.random()*71)];
                var d = alpha[Math.floor(Math.random()*71)];
                var e = alpha[Math.floor(Math.random()*71)];
                var f = alpha[Math.floor(Math.random()*71)];

                var final = a+b+c+d+e+f;
                document.getElementById("capt").value=final;
              }
              function validcap()
              {
              document.getElementById('log').innerHTML = '';
               var stg1 = document.getElementById('capt').value;
               var stg2 = document.getElementById('textinput').value;
               if(stg1==stg2 && final!==null)
               {
                  alert("Successfully validated!");
                  return true;
                }
                else
                {
                  alert("Invalid! Try again");
                  return false;
                }
              }
</script>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</form>


</body>

</html>
