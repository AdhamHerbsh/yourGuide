<?php

// سيشن هو نظام يسمح بمعرفة ان كان مستخدم دخل الى حساب او لا
session_start();
ob_start();


// نفس الشيء لباقي الصفحات كلها تعمل بهذا نظام من التقسيم
$page = isset($_GET['page']) ? $_GET['page'] : header('location: index.php');




if ($page == 'search') {
  include 'connect.php';
  $stmt = $conn->prepare("SELECT * FROM pages WHERE id = 1");
  $stmt->execute();
  $page = $stmt->fetch();
  $pageTitle = $page['sname'] . ' - البحث';
  include 'init.php';
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $key = $_POST['key'];

    $stmt = $conn->prepare("SELECT * FROM offers WHERE title like '$key' ");
    $stmt->execute();
    $check = $stmt->rowCount();
    $bodoks = $stmt->fetchAll();

    if ($check > 0) {
?>
      <section class="addtocart">
        <div class="container">
          <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
              <div class="col-md-12">
                <div class="ibox">
                  <div class="ibox-title">
                    <span class="pull-right"> <i class="fas fa-search"></i> نتائج البحث (<strong><?php echo $check ?></strong>) </span>
                  </div>
                  <div class="ibox-content" style="padding-top:40px;">
                    <div class="row">
                      <?php
                      foreach ($bodoks as $offer) {

                      ?>
                        <div class="col-md-3">

                          <div class="cate" style="">
                            <img src="<?php echo $images . $offer['image'] ?>" alt="">
                            <div class="mmrep">
                              <h3><?php echo $offer['title'] ?></h3>
                              <p><?php echo $offer['descr'] ?></p>
                              <a href="webpage.php?page=product&id=<?php echo $offer['id'] ?>" class="btn">مشاهدة العرض</a>
                            </div>
                          </div>


                        </div>

                      <?php
                      }
                      ?>
                    </div>

                  </div>

                </div>

              </div>

            </div>
          </div>
        </div>
      </section>
    <?php
    } else {
    ?>
      <section class="rekte">
        <div class="container">
          <div class="row justify-content-end">
            <div class="col-md-8">
              <h1> <i class="fas fa-search"></i> not found</h1>
              <a href="index.php">الصفحة الرئيسية</a>
            </div>
          </div>
        </div>
      </section>
    <?php
    }
    ?>


  <?php
  } else {
    header('location: account.php?page=login');
  }
  ?>

  <?php


  include $tpl . 'footer.php';
} elseif ($page == 'myoffers') {
  include 'connect.php';
  $stmt = $conn->prepare("SELECT * FROM pages WHERE id = 1");
  $stmt->execute();
  $page = $stmt->fetch();
  $pageTitle = $page['sname'] . ' - عروض';
  include 'init.php';

  if (!isset($_SESSION['clientid'])) {
    header('location: account.php?page=login');
  }
  $stmt = $conn->prepare("SELECT * FROM offers WHERE userid = ?");
  $stmt->execute(array($_SESSION['clientid']));
  $check = $stmt->rowCount();
  $bodoks = $stmt->fetchAll();

  if ($check > 0) {
  ?>
    <section class="addtocart">
      <div class="container">
        <div class="wrapper wrapper-content animated fadeInRight">
          <div class="row">
            <div class="col-md-12">
              <div class="ibox">
                <div class="ibox-title">
                  <span class="pull-right"> <i class="far fa-star"></i> العروض (<strong><?php echo $check ?></strong>) </span>
                  <h5 style="font-size:14px">كل ما تم اضافته كعروض</h5>
                </div>
                <div class="ibox-content" style="padding-top:40px;">
                  <div class="row">
                    <?php foreach ($bodoks as $of) { ?>
                      <div class="col-md-3">
                        <div class=" active">
                          <div class="product-default inner-quickview inner-icon">
                              <a href="webpage.php?page=product&id=<?php echo $of['id'] ?>"><img src="<?php echo $images . $of['image'] ?>" alt="product" width="100%" height="205"></a>
                            <div class="row m-2">
                              <div class="col-6">
                                <a href="store.php?page=deletefv&id=<?php echo $of['id'] ?>"> <i class="fa fa-trash"></i> حذف</a>
                              </div>
                              <div class="col-6">
                                <a href="webpage.php?page=product&id=<?php echo $of['id'] ?>"><?php echo $of['title'] ?></a>                               
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php
  }
  ?>


  <?php

  ?>

<?php


  include $tpl . 'footer.php';
} elseif ($page == 'deletefv') {
  $pageTitle = 'صفحة الحذف';
  include 'init.php';

  $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : header('location: index.php');;
  $stmt = $conn->prepare("SELECT * FROM offers WHERE id = ? LIMIT 1");
  $stmt->execute(array($id));
  $pfl = $stmt->fetch();
  $check = $stmt->rowCount();


  $stmt = $conn->prepare("DELETE FROM offers WHERE id = :zid");
  $stmt->bindParam(":zid", $id);
  $stmt->execute();
  header('location: ' . $_SERVER['HTTP_REFERER']);

?>

  <?php

  ?>

<?php


  include $tpl . 'footer.php';
} elseif ($page == "addoffer") {
  $pageTitle = 'أضف عرض متجرك';
  include 'init.php';
?>
  <div class="add-default-page add-post-page  add-product-page " id="add-page" style="margin:80px 0">
    <div class="container cnt-spc">
      <div class="row justify-content-end">
        <div class="col-md-9">
          <form class="add-fomr" method="POST" action="store.php?page=insert" enctype="multipart/form-data" id="ca-form-info">
            <h3 style="text-align:right">ملئ </h3>
            <div class="err-msg">
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="name">عنوان العرض</label>
                  <input type="text" name="title" id="name" placeholder="" class="form-control">
                </div>

                <div class="form-group col-md-6">
                  <label for="image"> صورة ترويجية للعرض</label>
                  <input type="file" name="image" class="form-control">

                </div>



                <div class="form-group col-md-6">
                  <label for="discount">نسبة الخصم</label>
                  <input type="text" name="discount" id="discount" placeholder="" class="form-control">
                </div>

                <div class="form-group col-md-6">
                  <label for="discount">رابط المتجر</label>
                  <input type="text" name="url" id="" placeholder="" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label for="discount">رابط غوغل ماب للخريطة</label>
                  <input type="text" name="map" id="" placeholder="" class="form-control">
                </div>



                <div class="form-group col-12">
                  <p for="description" style="display:block;text-align:left">وصف العرض</p>

                  <textarea name="descr" id="content" class="form-control ckeditor" style="text-align:right"></textarea>

                </div>




              </div>

              <input type="submit" class="btn btn-primary" id="ca-btn-option" value="أضف ">
              <div class="err-msg">

              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php

  include $tpl . 'footer.php';
} elseif ($page == 'insert') {
  $pageTitle = 'ادخال البيانات';
  include 'init.php';

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $descr = $_POST['descr'];
    $discount = $_POST['discount'];
    $map = $_POST['map'];
    $url = $_POST['url'];


    $imageName = $_FILES['image']['name'];
    $imageSize = $_FILES['image']['size'];
    $imageTmp = $_FILES['image']['tmp_name'];
    $imageType = $_FILES['image']['type'];



    $imageAllowedExtension = array("jpeg", "jpg", "png");
    $Infunc = explode('.', $imageName);
    $imageExtension = strtolower(end($Infunc));



    $formErrors = array();
    if (empty($title)) {
      $formErrors[] = 'عنوان العرض اجباري';
    }

    if (empty($descr)) {
      $formErrors[] = 'وصف العرض اجباري';
    }

    if (empty($imageName)) {
      $formErrors[] = "صورة العرض اجبارية";
    }


    foreach ($formErrors as $error) {
  ?>
      <div class="container" style="margin-top:50px">
        <div class="row justify-content-center">
          <div class="col-md-4">
            <?php
            echo '<div class="alert alert-danger" style="width: 100%;text-align:center">' . $error . '</div>';
            ?>

          </div>
        </div>
      </div>
    <?php
    }



    if (empty($formErrors)) {
      $image = rand(0, 100000) . '_' . $imageName;
      move_uploaded_file($imageTmp, $images . '/' . $image);


      $stmt = $conn->prepare("INSERT INTO offers(title,descr,discount,image,userid,url,map,created)

                   VALUES
                   (:z1,:z2,:z3,:z4,:z5,:z6,:z7,now() )");
      $stmt->execute(array(

        'z1' => $title,
        'z2' => $descr,
        'z3' => $discount,
        'z4' => $image,
        'z5' => $_SESSION['clientid'],
        'z6' => $url,
        'z7' => $map
      ));
    ?>
      <div class="alert alert-success" style="margin-top: 15px">
        تم اضافة عرضك بنجاح
      </div>
  <?php
      header('location: index.php');
    }
  } else {
    header('location: books.php');
  }
  include $tpl . 'footer.php';

  ?>
<?php
} else {
  header('location: index.php');
}

?>

<?php



ob_end_flush();

?>