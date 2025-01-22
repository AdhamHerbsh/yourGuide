<?php

// صفحة تسجيل متجر جديد
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $email = $_POST['email'];
  $pass = $_POST['password'];
  $cpass = $_POST['cpassword'];

  $type = 0;

  $formErrors = array();

  if (empty($email)) {
    $formErrors[] = 'بريد الالكتروني اجباري';
  }

  if (empty($pass)) {
    $formErrors[] =  'كلمة المرور اجبارية';
  }
  if (empty($cpass)) {
    $formErrors[] =  'تاكيد كلمة المرور اجباري';
  }
  if (!empty($pass)) {
    if ($pass != $cpass) {
      $formErrors[] = 'كلمة المرور وتاكيد كلمة المرور لا يتشبهان';
    } else {
      $password = sha1($_POST['password']);
    }
  }

  foreach ($formErrors as $error) {
?>
    <div class="container-fluid" style="text-align:right">
      <?php
      echo '<div class="alert alert-danger" >' . $error . '</div>';
      ?>
    </div>
  <?php
  }

  if (empty($formErrors)) {
    $stmt = $conn->prepare("INSERT INTO users(password, email, type, joined) VALUES(:zpass, :zemail,:ztype, now())");
    $stmt->execute(array(
      'zpass' => $password,
      'zemail' => $email,
      'ztype' => $type
    ));
  ?>
    <div class="alert alert-success" style="margin-top: 15px">
      لقد تم بنجاح تسجيل حسابك على موقعنا
    </div>
<?php
  }
}
?>