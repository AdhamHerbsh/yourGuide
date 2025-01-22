<?php
  ob_start();
  session_start();
  if (isset($_SESSION['admin']))
  {

    $page = isset($_GET['page']) ? $_GET['page'] : 'manage';

    if ($page == 'manage')
    {
      $pageTitle = 'posts management page';
      include 'init.php';
      $ord = 'ASC';

      if (isset($_GET['ordering']))
      {
        $ord = $_GET['ordering'];
      }

      $stmt = $conn->prepare("SELECT * FROM posts ORDER BY id $ord");
                $stmt->execute();
                $posts = $stmt->fetchAll();


        ?>
        <div class="default-management-list users-management">
          <div class="container cnt-spc">
            <div class="row">



              <div class="col-md-6">
                <div class="left-header management-header">
                  <h1>Posts List</h1>
                  <p class="tt">Total Posts <?php echo Total($conn, 'posts') ?> .</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="right-header management-header">
                  <div class="btns">
                    <a href="posts.php?page=add" id="open-add-page" class="add-btn"><i class="fas fa-plus"></i></a>

                  </div>
                </div>
              </div>
              <div class="col-md-6 srch-sp">
                <div class="search-box">
                </div>
              </div>

              <div class="col-md-12">
                <div class="management-body">
                  <div class="default-management-table">
                    <table class="table" id="categories-table">
                      <thead>
                        <tr>
                          <th scope="col">id</th>
                          <th scope="col">image</th>

                          <th scope="col">title</th>
                          <th scope="col">vision</th>
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
                              <?php

                              if ($post['visibility']  == 0)
                              {
                                ?>
                                <span class="hidden">visible</span>
                                <?php
                              }else {
                                ?>
                                <span class="visible">hidden</span>
                                <?php
                              }
                               ?>

                            </td>
                        <td>
                          <p><?php $text = strip_tags($post['content']); echo mb_strimwidth($text, 0, 60, "...")  ?></p>
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
                                                <a class="dropdown-item" href="posts.php?page=edit&id=<?php echo $post['id'] ?>">
                                                  <svg width="24" height="auto" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                  <path d="M16 2H8C4.691 2 2 4.691 2 8V21C2 21.2652 2.10536 21.5196 2.29289 21.7071C2.48043 21.8946 2.73478 22 3 22H16C19.309 22 22 19.309 22 16V8C22 4.691 19.309 2 16 2ZM20 16C20 18.206 18.206 20 16 20H4V8C4 5.794 5.794 4 8 4H16C18.206 4 20 5.794 20 8V16Z" fill="black"/>
                                                  <path d="M7 14.987V16.986H8.999L14.528 11.464L12.53 9.466L7 14.987Z" fill="black"/>
                                                  <path d="M15.47 10.522L13.472 8.522L14.995 7L16.995 8.999L15.47 10.522Z" fill="black"/>
                                                  </svg>

                                                  edit
                                                </a>

                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="posts.php?page=delete&id=<?php echo $post['id'] ?>">
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

    }elseif ($page == "add") {
      $pageTitle = 'add new post';
      include 'init.php';
      ?>
      <div class="add-default-page add-post-page  add-product-page " id="add-page">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <form class="add-fomr" method="POST" action="posts.php?page=insert" enctype="multipart/form-data"  id="ca-form-info"  >
                <h3>add new post<a style="margin-left:5px;font-size:15px;border-radius: 10px;background:var(--mainColor);color:white;padding:8px" href="posts.php?page=manage" class="fas fa-long-arrow-alt-right"></a>  </h3>

                  <div class="row">
                    <div class="form-group col-12">
                      <label for="title">title</label>
                      <input type="text" name="title" id="title" placeholder="title" class="form-control">
                    </div>



                    <div class="form-group col-12">
                      <label for="image">image</label>
                      <input type="file" name="image" placeholder="صورة المنشور" class="form-control">

                    </div>
                    <input type="hidden" name="userid" value="<?php echo $_SESSION['id'] ?>">
                    <div class="form-group col-12">
                      <label for="content">content</label> <br>
                      <textarea name="content" id="content"  class="form-control ckeditor"style="text-align:right" ></textarea>

                    </div>


                    <div class="form-group col-12">
                      <label for="visibility">vision</label>
                      <select class="form-control" name="visibility">
                        <option value="0">visible</option>
                        <option value="1">hidden</option>
                      </select>

                    </div>
                    <div class="form-group col-12">
                      <label for="type">type</label>
                      <select class="form-control" name="type">
                        <option value="0">blog</option>
                        <option value="1">news</option>
                      </select>

                    </div>
                  </div>

                <input type="submit" class="btn btn-primary" id="ca-btn-option"  value="add">
                <div class="err-msg">

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php

      include $tpl . 'footer.php';
    }elseif ($page == 'insert') {
      $pageTitle = 'insert  post';
      include 'init.php';

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
        $userid = $_SESSION['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];



        $type = $_POST['type'];

        $visibility = $_POST['visibility'];
        $imageName = $_FILES['image']['name'];
        $imageSize = $_FILES['image']['size'];
        $imageTmp = $_FILES['image']['tmp_name'];
        $imageType = $_FILES['image']['type'];


        $imageAllowedExtension = array("jpeg", "jpg", "png");
        $Infunc = explode('.', $imageName);
        $imageExtension = strtolower(end($Infunc));

        $formErrors = array();
        if (empty($title))
        {
          $formErrors[] = 'عنوان المنشور اجباري';
        }

        if (empty($content))
        {
          $formErrors[] = 'نص المنشور اجباري';
        }
        if (empty($imageName))
        {
          $formErrors[] = "صورة المنشور اجبارية";
        }


                                      foreach ($formErrors as $error ) {
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



                          if (empty($formErrors))
                            {
                                $image = rand(0,100000) . '_' . $imageName;
                                move_uploaded_file($imageTmp, $images . '/' . $image);
                                $stmt = $conn->prepare("INSERT INTO posts(title,content,image,visibility,type,userid,created)
                                 VALUES(:ztitle,:zcontent,:zimg, :zvisi,:zt,:zuser,now())");
                                $stmt->execute(array(
                                  'ztitle' => $title,

                                  'zcontent' => $content,

                                  'zimg' => $image,
                                  'zvisi' => $visibility,
                                  'zt' => $type,
                                  'zuser' => $userid
                                ));
                                ?>
                                <div class="alert alert-success" style="margin-top: 15px">
                                 added posts successfully
                                </div>
                                <?php
                                header('location: posts.php?page=manage');
                              }




      }else {
        header('location: posts.php');
      }
      include $tpl . 'footer.php';

      ?>
      <?php
    }

    elseif ($page == 'edit') {
      $pageTitle = "edit post management page";
      include 'init.php';

      $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : header('location: posts.php');
      $stmt = $conn->prepare("SELECT * FROM posts WHERE id= ? LIMIT 1");
      $stmt->execute(array($id));
      $checkpost = $stmt->rowCount();
      $postinfo = $stmt->fetch();
      if ($checkpost > 0)
      {


          ?>
          <div class="edit-page user-edit-pages deep-page">
            <div class="containe cnt-spc">
              <div class="row justify-content-start">
                <div class="col-md-12">
                  <div class="pg-tt" style="text-align:left">
                    <h1><a style="margin-left:5px;font-size:15px;border-radius: 10px;background:var(--mainColor);color:white;padding:8px" href="posts.php?page=manage" class="fas fa-long-arrow-alt-left"></a>edit post - <?php echo $postinfo['title'] ?>  </h1>

                  </div>
                </div>


                <div class="col-md-7">
                  <div class="use-fl-info">
                    <form class="form" method="post" action="posts.php?page=update&id=<?php echo $postinfo['id'] ?>" enctype="multipart/form-data" style="margin-bottom:60px">
                      <input type="hidden" name="id" value="<?php echo $postinfo['id'] ?>">
                      <div class="row">
                        <div class="col-12">
                          <label for="title">title</label>
                          <input type="text" id="title" class="form-control" name="title" placeholder="" value="<?php echo $postinfo['title'] ?>">
                        </div>



                        <div class="form-group col-12">
                          <label for="image">new image</label>
                          <input type="file" name="image" placeholder="image" class="form-control">

                        </div>

                        <div class="col-12">
                          <label for="visibility">vision</label>
                          <select class="form-control" name="visibility">
                            <option value="0"  <?php if($postinfo['visibility'] == 0){ echo 'selected';} ?>>hidden</option>
                            <option value="1" <?php if($postinfo['visibility'] == 1){ echo 'selected';} ?>>visible</option>
                          </select>

                        </div>
                        <div class="form-group col-12">
                          <label for="type">type</label>
                          <select class="form-control" name="type">
                            <option value="0" <?php if($postinfo['type'] == 0){ echo 'selected';} ?>>blog</option>
                            <option value="1" <?php if($postinfo['type'] == 1){ echo 'selected';} ?>>news</option>
                          </select>

                        </div>
                        <div class="form-group col-12">
                          <label for="content">content</label> <br>
                          <textarea name="content"  class="form-control ckeditor" ><?php echo $postinfo['content'] ?></textarea>
                        </div>



                        <div class="col-6">
                          <input type="submit" class="btn btn-primary" class="form-control" value="save" style="width:200px">

                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php

      }
      else {
        header('location: posts.php');
      }
      ?>


      <?php

      include $tpl . 'footer.php';
    }

    elseif ($page == 'update') {


      $pageTitle = 'صفحة تحديث البيانات';
      include 'init.php';
                      $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : header('location: posts.php');;

                            $stmt = $conn->prepare("SELECT * FROM posts WHERE id = ? LIMIT 1");
                            $stmt->execute(array($id));
                            $checkpst = $stmt->rowCount();


                            if ($checkpst > 0 )
                            {


                                if($_SERVER['REQUEST_METHOD'] == 'POST')
                                {

                                $title = $_POST['title'];



                                $visibility = $_POST['visibility'];
                                $content = $_POST['content'];
                                $type = $_POST['type'];


                                $id=$_POST['id'];

                                $imageName = $_FILES['image']['name'];
                                $imageSize = $_FILES['image']['size'];
                                $imageTmp = $_FILES['image']['tmp_name'];
                                $imageType = $_FILES['image']['type'];

                                $formErrors = array();
                                if (empty($title))
                                {
                                  $formErrors[] = 'عنوان المنشور اجباري';
                                }

                                if (empty($content))
                                {
                                  $formErrors[] = 'نص المحتوى اجباري';
                                }



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
                                    <a href="posts.php?page=edit&id=<?php echo $id ?>">اضغط هنا للعودة الى الصفحة السابقة</a>
                                  </div>
                                <?php

                                if (empty($formErrors))
                                {
                                  if (empty($imageName))
                                  {
                                    $stmt = $conn->prepare("SELECT image FROM posts WHERE id =? LIMIT 1");
                                    $stmt->execute(array($id));
                                    $images = $stmt->fetch();
                                    $image = $images['image'];
                                  }
                                  else {
                                    $image = rand(0,100000) . '_' . $imageName;
                                    move_uploaded_file($imageTmp, $images . '/' . $image);
                                  }
                                  $stmt = $conn->prepare("UPDATE posts SET title = ?,content = ?,image=?,visibility = ?, type= ?  WHERE id=? LIMIT 1  ");
                                  $stmt->execute(array($title,$content,$image,$visibility,$type,$id));
                                  header('location: ' . $_SERVER['HTTP_REFERER']);
                                }
                              }





                              else {
                                header('location: posts.php');
                              }
                            }
                            else {
                              header('location: posts.php');
                            }
      include $tpl . 'footer.php';


    }elseif ($page == 'delete') {
     include 'init.php';
      if ($_SESSION['type'] == 2)
      {
        $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : header('location: posts.php');;
        $stmt = $conn->prepare("SELECT * FROM posts WHERE id = ? LIMIT 1");
        $stmt->execute(array($id));
        $check = $stmt->rowCount();

        if ($check > 0 )
        {
          $stmt = $conn->prepare("DELETE FROM posts WHERE id = :zid");
          $stmt->bindParam(":zid", $id);
          $stmt->execute();
          header('location: posts.php');

        }
        else {
          header('location: posts.php');
        }
      }
    }elseif ($page == 'activate') {
      if ($_SESSION['type']== 2)
      {
        include 'init.php';
        $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : header('location: posts.php');;

          $stmt = $conn->prepare("UPDATE posts SET status = 1 WHERE id= ? LIMIT 1  ");
          $stmt->execute(array($id));
          header('location:posts.php');
      }
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
