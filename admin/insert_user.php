<?php
    include 'connect.php';



                        if ($_SERVER['REQUEST_METHOD'] == 'POST')
                        {
                          $username = $_POST['username'];
                          $email = $_POST['email'];
                          $fname = $_POST['fname'];
                          $npass = $_POST['npassword'];
                          $cpass = $_POST['cpassword'];
                          $type = 2;
                          $formErrors = array();
                          if (empty($username))
                          {
                            $formErrors[] = 'username can be empty';
                          }

                          if (empty($email))
                        {
                          $formErrors[] = 'Email Cant be Empty';
                        }

                          if (empty($fname))
                          {
                            $formErrors[] = 'First Name Cant be Empty';
                          }


                          if (empty($cpass))
                          {
                            $formErrors[] =  'confirm password cant be empty';
                          }
                          if(!empty($npass))
                          {
                              if ($npass!=$cpass)
                              {
                                $formErrors[] = 'passwords Not match';
                              }
                              else {
                                $password = sha1($_POST['npassword']);
                              }
                          }


                          if ($type == 'default')
                          {
                            $formErrors[] = 'User type Cant be Empty';
                          }
                    


                          foreach ($formErrors as $error ) {
                            ?>
                            <div class="container">
                              <?php
                              echo '<div class="alert alert-danger" >' . $error . '</div>';
                              ?>

                            </div>
                            <?php
                          }




                          if (empty($formErrors))
                          {
                            $stmt = $conn->prepare("INSERT INTO users(username, password, fname,email,type, joined) VALUES(:zusername, :zpass, :zfname, :zemail, :ztype, now())");
                            $stmt->execute(array(
                              'zusername' => $username,
                              'zpass' => $password,
                              'zfname' => $fname,
                              'zemail' => $email,
                              'ztype' => $type

                            ));
                            ?>
                            <div class="alert alert-success" style="margin-top: 15px;text-align:center" >
    The user has been added successfully. Please reload the page
                            </div>
                            <?php
                            header('refresh:3;url= users.php');
                          }



                        }





 ?>
