<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
<?php
session_start();
$link = mysqli_connect('localhost', 'root', 'root', 'bugalter');
if ((!empty($_POST['user_login']) and !empty($_POST['user_password']) ) and !empty($_POST['btn_log'])) {

  $log_in = $_POST['user_login'];
  $pass_word = $_POST['user_password'];
  $pdo = new PDO('mysql:host=localhost;dbname=bugalter','root','root');
    $sql = "SELECT * FROM bugalter WHERE login='$log_in' AND password='$pass_word'";
    $query = $pdo->prepare($sql);
    $query->execute();
    $users = $query->fetch(PDO::FETCH_ASSOC);
    
  if (!empty($users)) {
    $_SESSION['logged'] = $users;
    // header('location: ./buxgalter.php/');
    
  } else {
    echo " <script> alert('Parol yoki loginni hato yozdingiz!') </script>";
  }
session_destroy();
// echo '<pre>'; print_r($_SESSION['logged']); echo '</pre>';
}
  
?>

<div id="login" class="login">
   <div class="login_min" style='text-align:center;'>
     <h1>Sahifaga kirish</h1>
     <?php if(isset($_SESSION['logged'])): ?>
    <p style='font-size:27px;'>Salom <b><?= $_SESSION['logged']['login'] ?></b></p>
   <?php endif; ?>
     <form action="./buxgalter.php" method="post">
       <label for="">Login</label>
       <input type="text" name="user_login" placeholder="Login yozing">
       <label for="">Password</label>
       <input type="password" name="user_password" placeholder="Parol yozing">
       <input class="kirish" name="btn_log" type="submit" value="Kirish">
     </form>
   </div>
 </div>
<script src='js.js'></script>

<?php if(isset($_SESSION['logged'])): ?>
  
  <div class="">
    <div class="">
      <table >
        <tr>
          <th>NAME</th>
          <th>SURNAME</th>
          <th>JOB</th>
          <th>SALARY</th>
        </tr>
        <?php if(isset($_POST['kasb'])){
          $kasb = $_POST['kasb'];
          $query = "SELECT * FROM bugalter WHERE kasb='$kasb'";
          $result = mysqli_query($link, $query);
          for ($value = []; $all_value = mysqli_fetch_assoc($result); $value[] = $all_value);
          foreach ($value as $elems) {
            // echo "<tr><td>".$elems['ism']."</td><td>" .$elems['familiya']. "</td><td>". $elems['kasb']. "</td><td>". $elems['maosh'] ."$". "</td></tr>";
          };
        }
        ?>
        
      </table>
    </div>
  </div>
<?php endif; ?>

<!-- <div class="">
  <div class="">
    <form class="" method="post">
      <input type="text" name="kasb" value="">
      <input type="submit">
  </div>
</div> -->

</body>
</html>