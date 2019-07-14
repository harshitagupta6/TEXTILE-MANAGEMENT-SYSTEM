<html>
<head>
<title>login form</title>
<link rel="stylesheet" href="css/login_style.css"/>
</head>
<body style="background:url(login_image1.jpg);background-size:100% 100%">
<div class="login-page">
<div class="form">
    <form action="login_form.php" method="post" class="register-form">
      
            <input style="height:30px;font-size:14pt type="text" name="uname" placeholder="USERNAME"> 
         
        
         
            
           <input style="height:30px;font-size:14pt type="password" name="pass" placeholder="PASSWORD"> 
         
            <button type="submit" name="submit">LOGIN</button>
           
         </form>
         </div>
         </div>
       </body>
       </html>

     <?php
      if(isset($_POST["uname"]) && isset($_POST["pass"])){
     $uname=$_POST['uname'];
     $pass=$_POST['pass'];
         }
        if(isset($_POST['submit']))
         {
     if((strcmp($uname,"root")==0) && (strcmp($pass,"root")==0))
      {
        header('Location:home.php');
      }
    else{
        echo "";
        
        }
     }
   ?> 
         