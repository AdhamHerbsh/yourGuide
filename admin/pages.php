<?php
  ob_start();
  session_start();
  if (isset($_SESSION['admin']))
  {

    $page = isset($_GET['page']) ? $_GET['page'] : 'manage';

    if ($page == 'manage')
    {
      $pageTitle = 'settings management';
      include 'init.php';
      $ord = 'ASC';

      if (isset($_GET['ordering']))
      {
        $ord = $_GET['ordering'];
      }

      $stmt = $conn->prepare("SELECT * FROM pages ORDER BY id $ord");
                $stmt->execute();
                $posts = $stmt->fetchAll();


        ?>
        <div class="content-management default-management-list users-management">
          <div class="container cnt-spc">
            <div class="row justify-content-start">


              <div class="col-md-6">
                <div class="right-header management-header">
                  <div class="btns">
                    <!-- <a href="posts.php?page=add" id="open-add-page" class="add-btn"><i class="fas fa-plus"></i> اضافة منشور</a> -->

                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="left-header management-header">
                </div>
              </div>
              <div class="col-md-6 srch-sp">
                <div class="search-box">
                  <!-- <input type="search" class="form-control" name="search" id="categories-search" onkeyup="tabletwo()" autocomplete="off" placeholder="search by name"> -->
                </div>
              </div>
              <div class="col-md-6">

              </div>
              <?php
                $stmt = $conn->prepare("SELECT * FROM pages WHERE id =1");
                $stmt->execute();
                $ctn = $stmt->fetch();

               ?>
              <div class="col-md-8">
                <div class="management-body">
                  <div class="default-management-table pages-content">
                    <form class="" action="pages.php?page=update" method="post" style="text-align:left" enctype="multipart/form-data">
                      <h3>Store logo</h3>
                      <img src="<?php echo $logo . $ctn['logo'] ?>" alt="logo" style="width:80px;margin-bottom:20px">
                        <input type="file" name="logo" class="form-control">

                        <h3>Store favicon</h3>
                        <img src="<?php echo $logo . $ctn['favicon'] ?>" alt="logo" style="width:80px;margin-bottom:20px">
                          <input type="file" name="favicon" class="form-control">





                        <h3>Header image</h3>
                        <img src="<?php echo $images . $ctn['h_image'] ?>" alt="logo" style="width:80px;height:80px;margin:20px 0">
                          <input type="file" name="h_image" class="form-control">








                                                                      <h3>image 4</h3>
                                                                      <img src="<?php echo $images . $ctn['h_image4'] ?>" alt=""  style="width:80px;margin:20px 0">

                                                                        <input type="file" name="h_image4" class="form-control">
                                                                        <h3>store name</h3>
                                                                        <input type="text" name="sname" class="form-control" value="<?php echo $ctn['sname'] ?>">



                                                                                        <h3>phone</h3>
                                                                                        <input type="text" name="phone" class="form-control" value="<?php echo $ctn['phone'] ?>">
                                                                                        <h3>Email adress</h3>
                                                                                        <input type="text" name="email" class="form-control" value="<?php echo $ctn['email'] ?>">



                      <input type="submit"  class="btn btn-primary" name="" value="save" style="margin:10px 0" style="background:var(--mainColor) !important">

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



        <?php


      ?>

        <?php
      include $tpl . 'footer.php';

    }

    elseif ($page == 'update') {


      $pageTitle = 'صفحة حفظ التعديلات';
      include 'init.php';




                                if($_SERVER['REQUEST_METHOD'] == 'POST')
                                {




                                $phone = $_POST['phone'];
                                $email = $_POST['email'];

                                $sname = $_POST['sname'];



                                $formErrors = array();
                                if (empty($abouts))
                                {
                                  $formErrors[] = 'محتوى من نحن اجباري';
                                }
                                if (empty($ht))
                                {
                                  $formErrors[] = 'عنوان الهيدر اجباري';
                                }

                                if (empty($hp))
                                {
                                  $formErrors[] = 'فقرة الهيدر اجباري';
                                }
                                $imageName = $_FILES['logo']['name'];
                                $imageSize = $_FILES['logo']['size'];
                                $imageTmp = $_FILES['logo']['tmp_name'];
                                $imageType = $_FILES['logo']['type'];


                                $imageName2 = $_FILES['h_image']['name'];
                                $imageSize2 = $_FILES['h_image']['size'];
                                $imageTmp2 = $_FILES['h_image']['tmp_name'];
                                $imageType2 = $_FILES['h_image']['type'];



                                $imageName4 = $_FILES['h_image4']['name'];
                                $imageSize4 = $_FILES['h_image4']['size'];
                                $imageTmp4 = $_FILES['h_image4']['tmp_name'];
                                $imageType4 = $_FILES['h_image4']['type'];


                                $imageName3 = $_FILES['favicon']['name'];
                                $imageSize3 = $_FILES['favicon']['size'];
                                $imageTmp3 = $_FILES['favicon']['tmp_name'];
                                $imageType3 = $_FILES['favicon']['type'];





                                $formErrors = array();









                                foreach ($formErrors as $error ) {
                                  ?>
                                  <div class="container">
                                      <?php
                                        echo '<div class="alert alert-danger" style="width: 50%;">' . $error . '</div>';
                                       ?>

                                  </div>
                                  <?php
                                }
                                ?>
                                  <div class="container">
                                    <a href="pages.php?page=edit&id=<?php echo $id ?>">اضغط هنا للعودة الى الصفحة السابقة</a>
                                  </div>
                                <?php

                                if (empty($formErrors))
                                {
                                  $stmt3 =$conn->prepare("SELECT * FROM pages WHERE id = 1");
                                  $stmt3->execute();
                                  $inf = $stmt3->fetch();

                                  if (empty($imageName))
                                  {
                                    $image = $inf['logo'];
                                  }
                                  if (!empty($imageName))
                                  {
                                    $image = rand(0,100000) . '_' . $imageName;
                                    move_uploaded_file($imageTmp, $logo . '/' . $image);
                                  }


                                  if (empty($imageName2))
                                  {
                                    $image2 = $inf['h_image'];
                                  }
                                  if (!empty($imageName2))
                                  {
                                    $image2 = rand(0,100000) . '_' . $imageName2;
                                    move_uploaded_file($imageTmp2, $images . '/' . $image2);
                                  }









                                  if (empty($imageName3))
                                  {
                                    $image3 = $inf['favicon'];
                                  }
                                  if (!empty($imageName3))
                                  {
                                    $image3 = rand(0,100000) . '_' . $imageName3;
                                    move_uploaded_file($imageTmp3, $logo . '/' . $image3);
                                  }


                                  if (empty($imageName4))
                                  {
                                    $image4 = $inf['h_image4'];
                                  }
                                  if (!empty($imageName4))
                                  {
                                    $image4 = rand(0,100000) . '_' . $imageName4;
                                    move_uploaded_file($imageTmp4, $images . '/' . $image4);
                                  }



                                  $stmt = $conn->prepare("UPDATE pages SET   logo = ?,favicon =?, h_image=? ,phone=?,email=?,h_image4=?,sname=? WHERE id=1   ");
                                  $stmt->execute(array($image,$image3,$image2,$phone,$email,$image4,$sname));
                                  header('location: ' . $_SERVER['HTTP_REFERER']);
                                }
                              }





                              else {
                                header('location: index.php');
                              }

      include $tpl . 'footer.php';


    }
    elseif ($page == 'active') {

        include 'init.php';

          $stmt = $conn->prepare("UPDATE pages SET sv = 1 WHERE id= 1 LIMIT 1  ");
          $stmt->execute();
          header('location:pages.php');

    }
    elseif ($page == 'deletenoti') {
     include 'init.php';
      if ($_SESSION['type'] == 2)
      {
        $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : header('location: users.php');;



          $stmt = $conn->prepare("DELETE FROM notifications WHERE id = :zid");
          $stmt->bindParam(":zid", $id);
          $stmt->execute();
          header('location: index.php');



      }
    }
    elseif ($page == 'deletenoti') {

        include 'init.php';

          $stmt = $conn->prepare("UPDATE pages SET sv = 0 WHERE id= 1 LIMIT 1  ");
          $stmt->execute();
          header('location:pages.php');

    }
    else {
      header('location: index.php');
    }

    ?>


    <?php


  }else {
    header('location: logout.php');
  }
  ob_end_flush();
 ?>
