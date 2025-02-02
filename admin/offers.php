<?php
  ob_start();
  session_start();
  if (isset($_SESSION['admin']))
  {


    $page = isset($_GET['page']) ? $_GET['page'] : 'manage';

    if ($page == 'manage')
    {
      $pageTitle = 'products managements page';
      include 'init.php';
      $ord = 'DESC';

      if (isset($_GET['ordering']))
      {
        $ord = $_GET['ordering'];
      }

      $stmt = $conn->prepare("SELECT * FROM offers ORDER BY id $ord");
                $stmt->execute();
                $posts = $stmt->fetchAll();


        ?>
        <div class="default-management-list users-management">
          <div class="container cnt-spc">
            <div class="row">



              <div class="col-md-6">
                <div class="left-header management-header">
                  <h1>offers list</h1>
                  <p class="tt">Total offers is : <?php echo Total($conn, 'offers') ?></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="right-header management-header">
                  <div class="btns">

                  </div>
                </div>
              </div>
              <div class="col-md-6 srch-sp">
                <div class="search-box">
                  <!-- <input type="search" class="form-control" name="search" id="categories-search" onkeyup="tabletwo()" autocomplete="off" placeholder="search by name"> -->
                </div>
              </div>

              <div class="col-md-12">
                <div class="management-body">
                  <div class="default-management-table">
                    <table class="table" id="categories-table">
                      <thead>
                        <tr>
                          <th scope="col">id</th>
                          <th scope="col">Image</th>

                          <th scope="col">name</th>

                          <th scope="col">discount</th>
                          <th scope="col">content</th>

                          <th scope="col">created</th>

                          <th scope="col">action</th>

                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        foreach($posts as $post)
                        {
                          ?>
                          <tr>
                            <td>
                              <p><?php echo $post['id'] ?></p>
                            </td>
                            <td>
                              <div class="avatar">
                                <?php
                                    if (empty($post['image']))
                                    {
                                      ?>
                                      <img src="<?php echo $images  ?>default.png" alt="" style="width:40px">

                                      <?php
                                    }
                                    if (!empty($post['image']))
                                    {
                                      ?>
                                      <img src="<?php echo $images . $post['image']  ?>" alt="" style="width:40px">

                                      <?php
                                    }
                                 ?>
                              </div>
                            </td>
                            <td>
                              <p class="f-n"><?php echo $post['title']; ?> </p>
                            </td>
                            <td>
                              <p class="f-n"><?php echo $post['discount']; ?> </p>
                            </td>




                            <td><?php
                              echo $post['descr'];
                               ?>
                            </td>
                            <td>
                              <?php
                              echo $post['created'];
                               ?>
                            </td>

                            <td>
                              <?php

                                    ?>
                                    <ul>
                                      <li class=" dropdown">
                                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-h"></i>
                                              </a>
                                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">


                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="offers.php?page=delete&id=<?php echo $post['id'] ?>">
                                                  <svg width="16" height="auto" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                  <path d="M5.625 2.875H5.5C5.56875 2.875 5.625 2.81875 5.625 2.75V2.875H10.375V2.75C10.375 2.81875 10.4312 2.875 10.5 2.875H10.375V4H11.5V2.75C11.5 2.19844 11.0516 1.75 10.5 1.75H5.5C4.94844 1.75 4.5 2.19844 4.5 2.75V4H5.625V2.875ZM13.5 4H2.5C2.22344 4 2 4.22344 2 4.5V5C2 5.06875 2.05625 5.125 2.125 5.125H3.06875L3.45469 13.2969C3.47969 13.8297 3.92031 14.25 4.45312 14.25H11.5469C12.0813 14.25 12.5203 13.8313 12.5453 13.2969L12.9312 5.125H13.875C13.9438 5.125 14 5.06875 14 5V4.5C14 4.22344 13.7766 4 13.5 4ZM11.4266 13.125H4.57344L4.19531 5.125H11.8047L11.4266 13.125Z" fill="black"/>
                                                  </svg>
delete
                                                </a>
                                              </div>
                                            </li>
                                    </ul>
                                    <?php




                               ?>

                            </td>

                          </tr>
                          <tr>

                          <?php
                        }
                         ?>



                      </tbody>
                    </table>
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

    }elseif ($page == 'delete') {
     include 'init.php';
      if ($_SESSION['type'] == 2)
      {
        $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : header('location: offers.php');;
        $stmt = $conn->prepare("SELECT * FROM offers WHERE id = ? LIMIT 1");
        $stmt->execute(array($id));
        $check = $stmt->rowCount();

        if ($check > 0 )
        {
          $stmt = $conn->prepare("DELETE FROM offers WHERE id = :zid");
          $stmt->bindParam(":zid", $id);
          $stmt->execute();
          header('location: offers.php');

        }
        else {
          header('location: offers.php');
        }
      }
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
