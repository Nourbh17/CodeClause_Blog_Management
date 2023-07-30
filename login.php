<?php 
include 'config.php';
include 'header.php';
session_start();
if(isset($_SESSION['user_data'])){
  header("location:http://localhost/blog/admin/index.php");
}
?>
  <section>
  <div class="login-box">
    <form action="" method="POST">
      <h2> Login</h2>
      <div class="input-box">
        <span class="icon"><ion-icon name="mail"></ion-icon></span>
        <input type="email" name="email" required>
        <label>Email</label>
      </div>
      <div class="input-box">
        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
        <input type="password" name="password" required>
        <label>Password</label>
      </div>
      <div class="remember-forgot">
        <label> <input type="checkbox"> Remember me</label>
        <a href="#"> Forget Password? </a>
      </div>
      <button type="submit" name="login_btn">Login</button>
      <div class="register-link">
        <p>Don't have an account? <a href="#">Register</a></p>
      </div>
      <?php 
      if (isset($_SESSION['error'])) {
        $error=$_SESSION['error'];
        echo "<p class='bg-danger p-2 
        text-white'>".$error."</p>";
        unset($_SESSION['error']);
      }
      ?>
    </form>
</div></section>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<?php
if(isset($_POST['login_btn'])){
  $email=mysqli_real_escape_string($config,$_POST['email']);
  $pass=mysqli_real_escape_string($config,sha1($_POST['password']));
  
  $sql="SELECT * FROM user WHERE email='{$email}' AND 
  password='{$pass}'";
  $query=mysqli_query($config,$sql);
  $data=mysqli_num_rows($query);
  if($data){
    $result=mysqli_fetch_assoc($query);
    $user_data=array($result['user_id'],
    $result['username'],$result['role']);
    $_SESSION['user_data']=$user_data;
    header("location:admin/index.php");
  }
  else{
    $_SESSION['error']="Invalid email or Invalid password";
    header("location:login.php");
  }
} 
?>