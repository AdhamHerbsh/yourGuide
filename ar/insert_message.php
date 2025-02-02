<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $fname = $_POST['fname'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  $whats = $_POST['whats'];

  $formErrors = array();
  if (empty($fname)) {
    $formErrors[] = 'الاسم اجباري';
  }
  if (empty($email)) {
    $formErrors[] = 'البريد الالكتروني اجباري';
  }

  if (empty($message)) {
    $formErrors[] = 'رسالة اجبارية';
  }
  if (empty($whats)) {
    $formErrors[] = 'رقم الهاتف اجباري';
  }


  foreach ($formErrors as $error) {
?>
    <div class="container-fluid">

      <?php
      echo '<div class="alert alert-danger"  style="text-align:right">' . $error . '</div>';
      ?>

    </div>
  <?php
  }


  if (empty($formErrors)) {
    $stmt = $conn->prepare("INSERT INTO consultation (fname, email, content, whats, created)
        VALUES(:zf, :ze, :zm,:zwa, now())");
    $stmt->execute(array(
      'zf' => $fname,
      'ze' => $email,
      'zm' => $message,
      'zwa' => $whats
    ));
    $stmt = $conn->prepare("INSERT INTO notifications(fname,content,created)
         VALUES(:zf, :ze, now())");
    $stmt->execute(array(
      'zf' => $fname,
      'ze' => $message
    ));

  ?>
    <div class="alert alert-success" style="margin-top: 15px">
      <p style="margin:0;text-align:right">تم بنجاح ارسال رسالتك</p>
    </div>
<?php
  }
} else {
  header('location: index.php');
}
?>