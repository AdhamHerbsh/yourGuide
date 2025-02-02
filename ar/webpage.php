<?php
ob_start();

$page = isset($_GET['page']) ? $_GET['page'] : header('location: index.php');

if ($page == "offers") {
  include 'connect.php';

  $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : header('location: index.php');
  $stmt = $conn->prepare("SELECT * FROM pages WHERE id = 1");
  $stmt->execute();
  $page = $stmt->fetch();

  $stmtr = $conn->prepare("SELECT * FROM users WHERE id = ?");
  $stmtr->execute(array($id));
  $ss = $stmtr->fetch();
  $check = $stmtr->rowCount();
  $pageTitle = $page['sname']  . ' - ' .  $ss['storename'];
  include 'init.php';

?>

  <section class="featurecards block horizontal_mode clearfix">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-12">
              <div class="rete" style="text-align:right">
                <h1 dir="rtl" style="text-transform:capitalize;font-weight:bold;margin:40px 0"><?php echo $ss['storename'] ?> - عروض متجر </h1>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>

  <section class="featurecards block horizontal_mode clearfix products-slider">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-12">
          <div class="swiper mySwiper77">
            <div class="swiper-wrapper">

              <?php
              $stmt = $conn->prepare("SELECT * FROM offers WHERE userid = ? ");
              $stmt->execute(array($id));
              $offers = $stmt->fetchAll();
              foreach ($offers as $offer) {
              ?>
                <div class="swiper-slide">
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
            <div class="swiper-pagination"></div>
          </div>

          <!-- Swiper JS -->
          <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

          <!-- Initialize Swiper -->
          <script>
            var swiper = new Swiper(".mySwiper77", {
              slidesPerView: 1,
              spaceBetween: 10,
              pagination: {
                el: ".swiper-pagination",
                clickable: true,
              },
              breakpoints: {
                "@0.00": {
                  slidesPerView: 2,
                  spaceBetween: 10,
                },
                "@0.75": {
                  slidesPerView: 2,
                  spaceBetween: 10,
                },
                "@1.00": {
                  slidesPerView: 3,
                  spaceBetween: 0,
                },
                "@1.50": {
                  slidesPerView: 3,
                  spaceBetween: 10,
                },
              },
            });
          </script>
        </div>
      </div>
    </div>
  </section>

  <section class="testmonials" style="background-image: url('<?php echo $avatar . $ss['image'] ?>');padding-top: 70px   !important;padding-bottom: 0 !important;">
    <div class="container">

      <div class="row justify-content-center">
        <div class="col-md-12 col-12 mt-30">
          <h1 style="color:white;text-align:center">اراء و تقييمات العملاء</h1>
        </div>
        <div class="col-md-9">

          <?php
          $stmt = $conn->prepare("SELECT * FROM comments WHERE store = ? AND  status = 1 ORDER BY id DESC");
          $stmt->execute(array($id));
          $comments = $stmt->fetchAll();
          ?>
          <div class="swiper mySwiper">
            <div class="swiper-wrapper">
              <?php
              foreach ($comments as $comment) {
              ?>
                <div class="swiper-slide">
                  <div class="ds" style="text-align:center;padding:0px 30px">
                    <p dir="rtl" style="margin:20px 0;font-size:18px;color:white;">" <?php echo $comment['comment'] ?> "
                    </p>


                    <h5 style="margin-top:60px;color:white !important"><?php echo $comment['fname'] ?>
                    </h5>
                    <h4 style="margin-bottom:0px;color:rgba(0,0,0,.6)"><?php echo $comment['title'] ?>
                    </h4>

                  </div>
                </div>
              <?php
              }
              ?>

            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
          </div>

          <!-- Swiper JS -->
          <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

          <!-- Initialize Swiper -->
          <script>
            var swiper = new Swiper(".mySwiper", {
              navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
              },
            });
          </script>
        </div>

      </div>

    </div>
  </section>

<?php


  include $tpl . 'footer.php';
} elseif ($page == "offer") {
  include 'connect.php';
  $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : header('location: index.php');
  $stmt = $conn->prepare("SELECT * FROM pages WHERE id = 1");
  $stmt->execute();
  $page = $stmt->fetch();
  $stmt = $conn->prepare("SELECT * FROM category WHERE Cat_id = ?");
  $stmt->execute(array($id));
  $ss = $stmt->fetch();
  $check = $stmt->rowCount();


  $stmt = $conn->prepare("SELECT * FROM sections WHERE id = ?");
  $stmt->execute(array($ss['section']));
  $sect = $stmt->fetch();
  $stmt2 = $conn->prepare("SELECT * FROM books WHERE Cat = ?");
  $stmt2->execute(array($id));
  $r = $stmt2->fetchAll();

  $prd = $stmt2->rowCount();

  $pageTitle = $page['sname']  . ' - العروض';

  include 'init.php';
?>

  <section class="featurecards block horizontal_mode clearfix">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-9">
          <div class="row">
            <div class="col-md-12">
              <div class="rete">
                <h1 style="text-align: right;text-transform:capitalize;font-weight:bold;margin:40px 0;margin-bottom:10px"><?php echo $ss['name_ar'] ?></h1>
                <p style="text-align:right"><?php echo $ss['descr'] ?></p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

<?php
  include $tpl . 'footer.php';
} elseif ($page == "post") {

  $pageTitle = 'احدث الاعلانات، الفعاليات  ';
  include 'init.php';
  $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : header('location: index.php');

  $stmt = $conn->prepare("SELECT * FROM posts WHERE id = ?");
  $stmt->execute(array($id));
  $post = $stmt->fetch();

?>
  <section class="blog-list blog-st-one-mmb" id="blog-list">
    <div class="container">
      <div class="row">
        <!-- posts space -->
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-12">
              <div class="post">
                <div class="post-header">
                  <h1 style="text-align:right"><?php echo $post['title'] ?></h1>
                  <ul>
                    <li> <span class="date"><?php echo $post['created'] ?></span> </li>
                    <?php
                    $stmt = $conn->prepare("SELECT * FROM users WHERE id =?");
                    $stmt->execute(array($post['userid']));
                    $user = $stmt->fetch();
                    ?>
                    <li> <span class="admin"><?php echo $user['fname'] ?></span> </li>
                  </ul>
                </div>
                <div class="post-body" style="text-align:right !important">
                  <a target="_blank" href="<?php echo $images . $post['image'] ?>" data-lightbox="roadtrip">
                    <img src="<?php echo $images . $post['image'] ?>" alt="<?php echo $ss['title'] ?>" style="Width:100%;height:550px !important;border-radius:20px">

                  </a>
                  <div class="erte" style="margin:20px 0; text-align:right !important">
                    <?php echo $post['content'] ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- sidebar content space -->
        <div class="col-md-3 sidebar-ctn">
          <div class="row">
            <div class="col-md-12">
              <div class="card-ctn">
                <div class="card-header-ctn">
                  <h1>احدث الاعلانات، الفعاليات </h1>
                </div>
                <div class="card-body-ctn">
                  <div class="posts-list">
                    <ul>
                      <?php
                      $stmt = $conn->prepare("SELECT * FROM posts ORDER BY id DESC LIMIT 5");
                      $stmt->execute();
                      $posts = $stmt->fetchAll();

                      foreach ($posts as $post) {
                      ?>
                        <li> <a href="webpage.php?page=post&id=<?php echo $post['id'] ?>"><?php echo $post['title'] ?></a> </li>

                      <?php
                      }
                      ?>


                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php
  include $tpl . 'footer.php';
} elseif ($page == 'blog') {

  $pageTitle = 'احدث الاعلانات، الفعاليات ';
  include 'init.php';

?>
  <section class="blog-list blog-st-one-mmb" id="blog-list">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 style="text-align:center;font-weight:bold;margin:60px 0">احدث الاعلانات، الفعاليات </h1>
        </div>
        <?php
        $stmt = $conn->prepare("SELECT * FROM posts WHERE visibility = 1 ORDER BY id DESC");
        $stmt->execute();
        $posts = $stmt->fetchAll();
        ?>
        <!-- posts space -->
        <div class="col-md-12">
          <div class="row">
            <?php
            foreach ($posts as $post) {
            ?>
              <div class="news-block col-lg-4 col-md-4 col-sm-12 wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                <div class="inner-box">
                  <div class="image-box">
                    <figure class="image"><a href="webpage.php?page=post&id=<?php echo $post['id'] ?>"><img src="<?php echo $images . $post['image'] ?>" alt=""></a></figure>
                  </div>
                  <div class="content-box">
                    <span class="date"><?php echo $post['created'] ?></span>
                    <ul class="post-info">
                      <li><i class="fa fa-user-circle"></i> by Admin</li>
                      <li><i class="fa fa-file"></i> <?php echo $post['id'] ?> </li>
                    </ul>
                    <h4 class="title"><a style="color:black" href="webpage.php?page=post&id=<?php echo $post['id'] ?>"><?php echo $post['title'] ?></a></h4>
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
  </section>
<?php


  include $tpl . 'footer.php';
} elseif ($page == "product") {

  include 'connect.php';
  $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : header('location: index.php');

  $stmt = $conn->prepare("SELECT * FROM offers WHERE id = ?");
  $stmt->execute(array($id));
  $prd = $stmt->fetch();
  $stmt = $conn->prepare("SELECT * FROM pages WHERE id = 1");
  $stmt->execute();
  $page = $stmt->fetch();
  $pageTitle = $page['sname'] . ' - ' .  $prd['title'];
  include 'init.php';




?>
  <section class="productquick">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <main class="main">
            <div class="mainWrapper">
              <div class="mainBackground clearfix">
                <div class="row">

                  <div class="column small-centered" style="min-width:100%">
                    <div class="productCard_block">
                      <div class="row">

                        <div class="small-12 large-6 columns col-md-6">
                          <div class="productCard_leftSide clearfix">


                            <div class="sliderBlock">


                              <ul class="sliderBlock_items">
                                <li class="sliderBlock_items__itemPhoto sliderBlock_items__showing">
                                  <img src="<?php echo $images . $prd['image'] ?>" alt="headphones" style="width:100%;height:400px">
                                </li>


                              </ul>

                              </ul>


                            </div>
                          </div>
                        </div>
                        <div class="small-12 large-6 columns col-md-6">
                          <div class="productCard_rightSide">



                            <div class="block_product">
                              <h2 class="block_name block_name__mainName"><?php echo $prd['title'] ?> </sup></h2>
                              <h2 class="block_name block_name__addName" style="font-size:18px !important;color:rgba(0,0,0,.6)"> <?php echo $prd['title'] ?></h2>

                              <p class="block_product__advantagesProduct">
                                الخصم : %<?php echo $prd['discount'] ?>
                              </p>

                              <div class="block_informationAboutDevice">
                                <!-- <div class="block_descriptionInformation">
                                    <?php echo $prd['descr'] ?>
                                  </div> -->
                                <div class="row ">



                                  <div class="col-md-12">
                                    <div class="acc">
                                      <h3> وصف</h3>
                                      <div class="content-faq">
                                        <div class="content-inner">
                                          <p><?php echo $prd['descr'] ?></p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="acc">
                                      <h3>رابط المتجر</h3>
                                      <div class="content-faq">
                                        <div class="content-inner">
                                          <a href="<?php echo $prd['url'] ?>" target="_blank">اضغط هنا للدخول الى المتجر </a>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="acc">
                                      <h3> المراجعات</h3>
                                      <div class="content-faq">
                                        <div class="content-inner">
                                          <a href="webpage.php?page=comment&id=<?php echo $prd['userid'] ?>">اترك تقييمك للمتجر</a>
                                        </div>
                                      </div>
                                    </div>


                                  </div>


                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </main>


        </div>
        <div class="col-md-12">
          <div class="google_map_space">
            <?php echo $prd['map'] ?>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </section>

<?php


  include $tpl . 'footer.php';
} elseif ($page == "comment") {



  $pageTitle = 'اترك مراجعتك للمتجر';
  include 'init.php';

  $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : header('location: index.php');
  $stmt = $conn->prepare("SELECT * FROM users WHERE id = ? LIMIT 1");
  $stmt->execute(array($id));
  $store = $stmt->fetch();


  $stmt = $conn->prepare("SELECT * FROM pages WHERE id = 1");
  $stmt->execute();
  $page = $stmt->fetch();

?>


  <section class="aboutus comment" style="background:#f1f1f1;padding:40px 0">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <h1 dir="rtl" style="text-align:center">اترك مراجعتك للمتجر <?php echo $store['storename'] ?></h1>
        </div>
        <div class="col-md-6">


          <form class="" action="index.html" method="post" id="message-form2">
            <div class="row">
              <div class="col-12">
                <input type="text" disabled name="storename" value="<?php echo $store['storename'] ?>" placeholder="" class="form-control" value="">
              </div>
              <div class="col-6">
                <input type="text" name="fname" placeholder="الاسم الكامل" class="form-control" value="">
              </div>
              <input type="hidden" name="store" value="<?php echo $id ?>">
              <div class="col-6">
                <input type="text" name="title" placeholder="عنوان تقييم" class="form-control" value="">
              </div>
              <div class="col-12">
                <textarea name="comment" style="padding:20px !important" class="form-control">اترك تعليق
                          </textarea>
              </div>
              <div class="col-md-12">
                <div class="ds" style="text-align:center">
                  <input id="message-btn2" type="button" style="text-align: center !important;height: 50px !important;border-radius: 10px !important;background:var(--mainColor) !important;color:white" class="btn " name="" value="ارسل">
                </div>
              </div>
              <div class="col-md-12">
                <div class="msg22" id="msg22">

                </div>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
  </section>



<?php


  include $tpl . 'footer.php';
} elseif ($page == "aboutus") {
  include 'connect.php';
  $stmt = $conn->prepare("SELECT * FROM pages WHERE id = 1");
  $stmt->execute();
  $page = $stmt->fetch();
  $pageTitle = $page['sname']  .  ' - من نحن';
  include 'init.php';


?>

  <section class="aboutus spc-content" id="aboutus" style="margin: 60px 0">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="fds" style="position:relative;overflow:hidden">
            <img src="<?php echo $images . $page['h_image'] ?>" alt="about us" style="margin-top:30px;width:100% !important;height:400px !important">
          </div>
        </div>
        <div class="col-md-6">
          <div class="content" style="text-align:right">
            <h3>من نحن</h3>
            <?php echo $page['aboutus'] ?>
          </div>
        </div>


      </div>
    </div>
  </section>
  <?php
  include $tpl . 'footer.php';
}

// store begin

elseif ($page == 'myprofile') {
  $pageTitle = "اعدادت الحساب";
  include 'init.php';

  $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : header('location: index.php');
  $stmt = $conn->prepare("SELECT * FROM users WHERE id = ? LIMIT 1");
  $stmt->execute(array($id));
  $checkIfuserExist = $stmt->rowCount();
  $userInfo = $stmt->fetch();
  if ($checkIfuserExist > 0) {

    if (isset($_SESSION['clientid'])) {

  ?>

      <div class="edit-page user-edit-pages deep-page">
        <div class="container">
          <div class="row">

            <div class="col-md-12">
              <h1 style="text-align:center;margin:60px 0">تعديل اسم المستخدم <?php echo $userInfo['username'] ?></h1>
            </div>
            <div class="col-md-4">
              <div class="row">


              </div>
              <div class="col-md-12">
                <div class="left-content">
                  <div class="user-info">
                    <div class="user-info-header">
                      <form class="pic" action="webpage.php?page=avatupdate&id=<?php echo $userInfo['id'] ?>" method="post" enctype="multipart/form-data">
                        <?php
                        if (empty($userInfo['image'])) {
                        ?>
                          <img src="<?php echo $avatar  ?>default.png" style="width: 100px;" alt="avart">

                        <?php
                        } else {
                        ?>
                          <img src="<?php echo $avatar . $userInfo['image'] ?>" style="width: 100px;" alt="avart">

                        <?php
                        }
                        ?>
                        <p class="username"><?php echo $userInfo['username'] ?></p>
                        <label for="avatar" class="avar-up">تحميل صورة جديدة للمتجر <i class="fas fa-plus"></i> </label>
                        <input type="file" id="avatar" name="avatar" class="up-ava" style="display:none;">
                        <input type="submit" name="upload" value="حفظ" class="form-control btn btn-primary " id="" style="margin:20px 0">
                      </form>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-7">
              <div class="use-fl-info">
                <form method="post" action="webpage.php?page=update" style="text-align:left !important">

                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="">اسم المتحر</label>
                      <input type="text" name="storename" class="form-control" required value="<?php echo $userInfo['storename'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">اسم الكامل</label>
                      <input type="text" name="fname" class="form-control" required value="<?php echo $userInfo['fname'] ?>">
                    </div>

                    <div class="form-group col-md-6">
                      <label for="">البريد الالكتروني</label>
                      <input type="email" name="email" class="form-control" required value="<?php echo $userInfo['email'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">اسم المستخدم</label>
                      <input type="text" name="username" class="form-control" required value="<?php echo $userInfo['username'] ?>">
                    </div>
                    <input type="hidden" name="id" value="<?php echo $userInfo['id'] ?>">
                    <div class="form-group col-md-6">
                      <label for="">تأكيد كلمة المرور </label>
                      <input type="password" name="cpassword" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">تأكيد كلمة المرور</label>
                      <input type="password" name="password" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                      <label for="">رقم الهاتف</label>
                      <input type="text" name="phone" class="form-control" required value="<?php echo $userInfo['phone'] ?>">
                    </div>





                  </div>

                  <button type="submit" class="btn btn-primary">حفظ</button>
                </form>
              </div>
            </div>

          </div>
        </div>
      </div>
      <?php





      ?>

    <?php
    } else {
      header('location: index.php');
    }
    ?>

  <?php


  } else {
    header('location: index.php');
  }
  ?>


  <?php

  include $tpl . 'footer.php';
} elseif ($page == 'avatupdate') {

  include 'init.php';

  $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : header('location: users.php');;


  $imageName = $_FILES['avatar']['name'];
  $imageSize = $_FILES['avatar']['size'];
  $imageTmp = $_FILES['avatar']['tmp_name'];
  $imageType = $_FILES['avatar']['type'];

  $imageAllowedExtension = array("jpeg", "jpg", "png");
  $Infunc = explode('.', $imageName);
  $imageExtension = strtolower(end($Infunc));
  $formErrors = array();
  if (empty($imageName)) {
    $formErrors[] = 'user avatar  cant be empty';
  }
  if (!empty($imageName) && ! in_array($imageExtension, $imageAllowedExtension)) {
    $formErrors[] = 'avatar Extension is not allowed';
  }



  foreach ($formErrors as $error) {
  ?>
    <div class="container">
      <?php
      echo '<div class="alert alert-danger" style="width: 50%;">' . $error . '</div>';
      ?>

    </div>
  <?php
  }



  if (empty($formErrors)) {
    $image = rand(0, 100000) . '_' . $imageName;
    move_uploaded_file($imageTmp, $avatar . '/' . $image);
    $stmt = $conn->prepare("UPDATE users SET image = ? WHERE id = ? LIMIT 1 ");
    $stmt->execute(array($image, $id));
  ?>

    <?php
    header('location: ' . $_SERVER['HTTP_REFERER']);
  }


  include $tpl . 'footer.php';
} elseif ($page == 'update') {


  $pageTitle = 'update page';
  include 'init.php';
  $id = $_POST['id'];

  $stmt = $conn->prepare("SELECT * FROM users WHERE id = ? LIMIT 1");
  $stmt->execute(array($id));
  $checkIfuser = $stmt->rowCount();

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];
    $phone = $_POST['phone'];
    $fname = $_POST['fname'];

    $storename = $_POST['storename'];

    $formErrors = array();
    if (empty($username)) {
      $formErrors[] = 'اسم المستخدم اجباري';
    }

    if (empty($pass)) {
      $stmt = $conn->prepare("SELECT password FROM users WHERE id = ? LIMIT 1");
      $stmt->execute(array($id));
      $passs = $stmt->fetch();

      $password = $passs['password'];
    }
    if (!empty($pass)) {
      if ($pass != $cpass) {
        $formErrors[] = 'كلمة المرور غير مطابقة';
      } else {
        $password = sha1($_POST['cpassword']);
      }
    }

    if (empty($email)) {
      $formErrors[] = 'بريد الالكتروني اجباري';
    }



    foreach ($formErrors as $error) {
    ?>
      <div class="container">
        <?php
        echo '<div class="alert alert-danger" style="width: 50%;">' . $error . '</div>';
        ?>

      </div>
    <?php
      // header('refresh:4;url=' . $_SERVER['HTTP_REFERER']);
    }
    ?>
    <div class="container">
      <a href="users.php?page=edit&id=<?php echo $id ?>">اضغط هنا للعودة الى اخر صفحة</a>
    </div>
  <?php

    if (empty($formErrors)) {
      $stmt = $conn->prepare("UPDATE users SET username = ?, password = ?,  fname = ?, email =?,phone = ?, storename=?
                             WHERE id= ? LIMIT 1  ");
      $stmt->execute(array($username, $password, $fname, $email, $phone, $storename, $id));
      header('location: ' . $_SERVER['HTTP_REFERER']);
    }
  }


  include $tpl . 'footer.php';
} elseif ($page == "contactus") {

  include 'connect.php';
  $stmt = $conn->prepare("SELECT * FROM pages WHERE id = 1");
  $stmt->execute();
  $page = $stmt->fetch();
  $pageTitle = $page['sname']  .  ' - تواصل معنا';
  include 'init.php';

  ?>


  <section class="contactuspage" id="contactuspage" data-aos="fade-left"
    data-aos-duration="1000">
    <div class="container">


      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="header-content" style="text-align:center;margin-bottom:40px">
            <h1 style="color:black !important;margin-bottom:20px !important">تواصل معنا</h1>
            <p style="color:rgba(0,0,0,0.6)">

              يرجى إعلامنا إذا كان لديك أي أسئلة، أو تريد ترك تعليق لنا، أو ترغب في معرفة المزيد عنا</p>
          </div>
        </div>

        <div class="col-md-7" style="background-size:cover;border-radius:41px;overflow:hidden">
          <div class="cnf" style="padding:50px 0;margin-bottom: 180">
            <form class="" action="index.html" method="post" id="message-form">
              <div class="row">
                <div class="col-6">
                  <i class="fas fa-envelope"></i>
                  <input type="text" name="email" placeholder="عنوان البريد الإلكتروني" class="form-control" value="">
                </div>
                <div class="col-6">
                  <i class="fas fa-user"></i>
                  <input type="text" name="fname" placeholder="الاسم الكامل" class="form-control" value="">
                </div>
                <div class="col-12">
                  <i class="fas fa-phone"></i>
                  <input type="text" name="whats" placeholder="رقم التليفون" class="form-control" value="">
                </div>
                <div class="col-12">
                  <textarea name="message" style="padding:20px !important;color:black !important" class="form-control" placeholder="التفاصيل"></textarea>
                </div>
                <div class="col-md-12">
                  <div class="ds" style="text-align:right">
                    <input id="message-btn" type="button" style="width:100% !important;text-align: center !important;height: 50px !important;border-radius: 10px !important;background:var(--mainColor) !important;color:black" class="btn " name="" value="ارسال">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="msg2" id="msg2">

                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-5">

          <div class="locationmap">
            <h3> الموقع <r class="fas fa-map" style="font-size:14px;position:relative;margin:0"></r>
            </h3>

            <p dir="ltr"> السعودية ، الرياض

            </p>
            <h3>الهاتف:+ <i class="fas fa-phone"></i> </h3>
            <p>+<?php echo $lg['phone'] ?>
            </p>
            <h3>البريد الالكتروني <i class="fas fa-envelope"></i> </h3>
            <a style="color:black" href="mailto:<?php echo $lg['email'] ?>"><?php echo $lg['email'] ?> </a>

          </div>
        </div>
      </div>
    </div>
  </section>
<?php


  include $tpl . 'footer.php';
} elseif ($page == "conditions") {
  include 'connect.php';
  $stmt = $conn->prepare("SELECT * FROM pages WHERE id = 1");
  $stmt->execute();
  $page = $stmt->fetch();
  $pageTitle = $page['sname']  .  ' - الشروط و الاحكام';
  include 'init.php';


?>

  <section class="content-fd" style="margin:80px 0">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <h1 style="text-align:center;text-transform:uppercase;margin-bottom:60px"> الشروط و الاحكام</h1>
        </div>
        <div class="col-md-6">
          <div class="content" style="text-align:right">
            <?php echo $page['terms'] ?>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php
  include $tpl . 'footer.php';
} elseif ($page == "privacy") {
  include 'connect.php';
  $stmt = $conn->prepare("SELECT * FROM pages WHERE id = 1");
  $stmt->execute();
  $page = $stmt->fetch();
  $pageTitle = $page['sname']  .  ' -  الخصوصية';
  include 'init.php';


?>

  <section class="content-fd" style="margin:80px 0">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <h1 style="text-align:center;text-transform:uppercase;margin-bottom:60px"> الخصوصية</h1>
        </div>
        <div class="col-md-6">
          <div class="content" style="text-align:center">
            <?php echo $page['privacy'] ?>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php
  include $tpl . 'footer.php';
} else {
  header('location: index.php');
}



ob_end_flush();

?>