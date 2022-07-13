
<title>salary</title>
<link rel="stylesheet" href="css.css">


<?=

ini_set('display_errors', true);
error_reporting(E_ALL);
echo "<pre>";
$host  = 'localhost';
$user_name = 'root';
$password = 'root';
$db_name = 'salary';
$link = mysqli_connect('localhost', 'root', 'root', 'salary');

if(!empty($_POST['ism']) and !empty($_POST['familiya']) and !empty($_POST['kasb']) and !empty($_POST['maosh'])){
  $ism = $_POST['ism'];
  $familiya = $_POST['familiya'];
  $kasb = $_POST['kasb'];
  $maosh = $_POST['maosh'];
  $bazaga_qowiw = "INSERT INTO salary SET ism = '$ism', familiya = '$familiya', kasb = '$kasb', maosh = '$maosh'";
  mysqli_query($link, $bazaga_qowiw);
}

?>

<div id="salary" class="salary">
  <h1>SURVEY</h1>
  <div class="sorovnoma">
    <form  method="post">
      <label for="">NAME</label>
      <input type="text" name="ism" placeholder="Write your name">
      <label for="">SURNAME</label>
      <input type="text" name="familiya" placeholder="Write your surname">
      <label for="">JOB</label>
      <input type="text" name="kasb" placeholder="In what job you work">
      <label for="">SALARY</label>
      <input type="text" name="maosh" placeholder="How much your earnings">
      <input type="submit" value="SEND">
    </form>
  </div>
</div>
<a href="./buxgalter.php" style="background-color:blue; padding:5px; color:white;">Buxgalter</a>
<script src='js.js'></script>
