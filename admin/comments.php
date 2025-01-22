<?php
  ob_start();
  session_start();
  if (isset($_SESSION['admin']))
  {


    $page = isset($_GET['page']) ? $_GET['page'] : 'manage';


        if ($page == 'manage')
        {
          $pageTitle = 'reviews management page';
          include 'init.php';
          $ord = 'ASC';

          if (isset($_GET['ordering']))
          {
            $ord = $_GET['ordering'];
          }

          $stmt = $conn->prepare("SELECT * FROM comments  ORDER BY id $ord");
                    $stmt->execute();
                    $posts = $stmt->fetchAll();


            ?>
            <div class="default-management-list users-management">
              <div class="container-fluid cnt-spc">
                <div class="row">






                  <?php
                      foreach($posts as $post)

                      {

                        ?>
                        <div class="col-md-12">
                          <div class="row boxds">

                            <div class="col-md-10">
                              <div class="contenttrea">
                                <a style="color:rgba(0,0,0,.6)" href="comments.php?page=edit&id=<?php echo $d['id'] ?>">
      <h3 style="color:black"><?php echo $post['fname'] ?></h3>

      <h6 style="margin-bottom:20px;font-size:13px;color:var(--mainColor)"><?php echo $post['title'] ?></h6>
      <p><?php echo $post['comment'] ?></p>
                                </a>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <div class="tticon" style="text-align: center;padding-top:50px">
                                <a style="background:red;color:white;padding:8px 10px;border-radius:50%" href="comments.php?page=delete&id=<?php echo $post['id'] ?>" class="fas fa-trash"></a>
                                <?php
                                if ($post['status'] == 1)
                                {
                                  ?>
                            <a style="background:green;color:white;padding:8px 10px;border-radius:50%" href="comments.php?page=unactive&id=<?php echo $post['id'] ?>" class="fas fa-eye"></a>
                                  <?php
                                }else {
                                ?>
                                <a style="background:grey;color:white;padding:8px 10px;border-radius:50%" href="comments.php?page=active&id=<?php echo $post['id'] ?>" class="fas fa-eye-slash"></a>

                                <?php
                                }
                                 ?>


                              </div>
                            </div>
                          </div>
                        </div>
                        <?php
                      }
                   ?>


                </div>
              </div>
            </div>



            <?php


          ?>

            <?php
          include $tpl . 'footer.php';

        }
  


  elseif ($page == 'delete') {
     include 'init.php';
      if ($_SESSION['type'] == 2)
      {
        $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : header('location: comments.php');;
        $stmt = $conn->prepare("SELECT * FROM comments WHERE id = ? LIMIT 1");
        $stmt->execute(array($id));
        $check = $stmt->rowCount();

        if ($check > 0 )
        {
          $stmt = $conn->prepare("DELETE FROM comments WHERE id = :zid");
          $stmt->bindParam(":zid", $id);
          $stmt->execute();
          header('location: comments.php');

        }
        else {
          header('location: comments.php');
        }
      }
    }
    elseif ($page == 'active') {

        include 'init.php';
        $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : header('location: users.php');;

          $stmt = $conn->prepare("UPDATE comments SET status = 1 WHERE id= ? LIMIT 1  ");
          $stmt->execute(array($id));
          header('location:comments.php');

    }
    elseif ($page == 'unactive') {

        include 'init.php';
        $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : header('location: users.php');;

          $stmt = $conn->prepare("UPDATE comments SET status = 0 WHERE id= ? LIMIT 1  ");
          $stmt->execute(array($id));
          header('location:comments.php');

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
