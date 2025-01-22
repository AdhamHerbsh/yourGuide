<?php
    include 'connect.php';

    // صفحة ادخال تقييمات العملاء
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $fname = $_POST['fname'];
      $title = $_POST['title'];
      $comment = $_POST['comment'];

      $store = $_POST['store'];

      $formErrors = array();
      if (empty($fname) )
      {
        $formErrors[] = 'خانة اسم الكامل اجبارية';
      }
      if (empty($title))
      {
        $formErrors[] = 'خانة العنوان اجباري';
      }

      if (empty($comment))
      {
        $formErrors[] = 'خانة التعليق اجباري';
      }







      foreach ($formErrors as $error ) {
        ?>
        <div class="container-fluid">

          <?php
          echo '<div class="alert alert-danger"  style="text-align:right">' . $error . '</div>';
          ?>

        </div>
        <?php
      }




      if (empty($formErrors))
      {
        $stmt = $conn->prepare("INSERT INTO comments(comment,fname,title,store,created)
         VALUES(:zf,:ze,:zm,:zstore,now())");
        $stmt->execute(array(
          'zf' => $comment,
          'ze' => $fname,
          'zm' => $title,
          'zstore' => $store


        ));
        $type = '1';
        $stmt = $conn->prepare("INSERT INTO notifications(type,fname,content,created)
         VALUES(:zty,:zf,:ze,now())");
        $stmt->execute(array(
          'zty' => $type,
          'zf' => $fname,
          'ze' => $comment



        ));

        ?>
        <div class="alert alert-success" style="margin-top: 15px">
          <p style="text-align:right">    تم ارسال تعليقك بنجاح</p>
        </div>
        <?php
      }


    }else {
      header('location: index.php');
    }
 ?>
