<?php
session_start();
include "koneksi.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
    body{
      background-image: url("image/awokawok.jpg");
      -webkit-background-size:cover;
      -moz-background-size:cover;
      -o-background-size:cover;
      background-size: cover;
    }
    .card-prime{
      margin-right: auto;
      margin-left: auto;
      margin-top: 150px;
    }
    .card.shadow{
      border: 3px solid grey;
    }
  </style>
  </head>
  
  <body>
  <div class="card-prime col-lg-5 pl-5 pr-5">
        <div class="card shadow">
          <div class="card-header bg-primary ">
                <div class="text-center"> 
                    <h1 class="h3 mb-4 text-white">LOGIN</h1>
                  </div>
                </div>
                <div class="card-body">
                <form action="" method="POST">
              <table align="center">
            <tr>
            <td width="100">Username</td>
              <td><input type="text" name="username"></td>
          </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
          <tr>
      <td></td>
      <td class="pt-2"><input type="submit" value="login" name="Login"></td>
          </tr>
        </table>
      </form>	
          </div>
        </div>
    </div>
    <h1 class="text-white text-center mt-5">WELCOME</h1>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

<?php
  if(isset($_POST['Login'])) {
    $sql = mysqli_query($conn, "SELECT * FROM login WHERE username = '$_POST[username]'
    and password = '$_POST[password]'");

    $cek = mysqli_num_rows($sql);
    if($cek > 0){
      $_SESSION['username'] = $_POST['username'];
      echo "<meta http-equiv=refresh content=0;URL='home.php'>";
    } else {
      echo "<p align=center><b> Username dan password salah!</b></p>";
      echo "<meta http-equiv=refresh content=2;URL='login.php'>";
      
    }
  }
?>