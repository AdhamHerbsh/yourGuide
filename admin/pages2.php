<?php
  ob_start();
  session_start();
  if (isset($_SESSION['admin']))
  {

    $page = isset($_GET['page']) ? $_GET['page'] : 'manage';

    if ($page == 'manage')
    {
      $pageTitle = ' content management page';
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
            <div class="row justify-content-end">

              <div class="col-md-6 srch-sp">
                <div class="search-box">
                </div>
              </div>
              <div class="col-md-6">

              </div>
              <?php
                $stmt = $conn->prepare("SELECT * FROM pages WHERE id =1");
                $stmt->execute();
                $ctn = $stmt->fetch();

               ?>
              <div class="col-md-12">
                <div class="management-body">
                  <div class="default-management-table pages-content">
                    <form class="" action="pages2.php?page=update" method="post" style="text-align:left" enctype="multipart/form-data">
                      <div class="row">

                        <div class="col-6">
                          <h3>Header title</h3>
                          <input class="form-control" type="text" name="h_title" value="<?php echo $ctn['h_title'] ?>">

                        </div>
                        <div class="col-6">
                          <h3>header paragraph </h3>
                          <input class="form-control" type="text" name="h_paragraph" value="<?php echo $ctn['h_paragraph'] ?>">

                        </div>



                        <div class="col-12">
                          <h3>about us content</h3>
                          <textarea id="content2" name="aboutus" class="form-control" ><?php echo $ctn['aboutus'] ?></textarea>

                        </div>

                      </div>

                      <h3>privacy</h3>
                      <textarea id="content3" name="privacy" class="form-control" ><?php echo $ctn['privacy'] ?></textarea>




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




                                $aboutus = $_POST['aboutus'];
                                $privacy = $_POST['privacy'];




                                $h_title = $_POST['h_title'];
                                $h_paragraph = $_POST['h_paragraph'];








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



                                  $stmt = $conn->prepare("UPDATE pages SET   aboutus = ?,privacy=?,h_title=?,h_paragraph=? WHERE id=1   ");
                                  $stmt->execute(array($aboutus,$privacy,$h_title,$h_paragraph));
                                  header('location: ' . $_SERVER['HTTP_REFERER']);
                                }
                              }





                              else {
                                header('location: dashboard.php');
                              }

      include $tpl . 'footer.php';


    }
    elseif ($page == 'active') {

        include 'init.php';

          $stmt = $conn->prepare("UPDATE pages SET sv = 1 WHERE id= 1 LIMIT 1  ");
          $stmt->execute();
          header('location:pages.php');

    }
    elseif ($page == 'unactive') {

        include 'init.php';

          $stmt = $conn->prepare("UPDATE pages SET sv = 0 WHERE id= 1 LIMIT 1  ");
          $stmt->execute();
          header('location:pages.php');

    }

    else {
      header('location: dashboard.php');
    }

    ?>


    <?php


  }else {
    header('location: logout.php');
  }
  ob_end_flush();
 ?>
