<?php
  ob_start();
  session_start();
  include 'connect.php';
  $stmt = $conn->prepare("SELECT * FROM pages WHERE id = 1");
  $stmt->execute();
  $page = $stmt->fetch();
  $pageTitle = $page['sname']  .  ' - الصفحة الرئيسية';
  include 'init.php';


  ?>

<!-- الصفحة الرئيسية -->

<?php

 ?>

  <div class="re">
    <div class="container-fluid" style="padding:0">
      <div class="row justify-content-end">

        <div class="col-md-12">

          <div class="swiper mySwiperd" style="padding-bottom:0px !important">
           <div class="swiper-wrapper">
             <div class="swiper-slide">
               <img class="d-block w-100 mainimg" src="<?php echo $images . $page['h_image'] ?>" style="height:600px !important" alt="First slide">
               <div class="overylay content">

               </div>
             </div>



           </div>
           <div class="swiper-pagination"></div>
         </div>
        </div>

      </div>
    </div>
  </div>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
 var swiper = new Swiper(".mySwiperd", {
   spaceBetween: 30,
   autoplay: {
    delay: 3000,
},
   pagination: {
     el: ".swiper-pagination",
     clickable: true,

   },
 });
</script>


<section class="featurecards block horizontal_mode clearfix products-slider">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="cotent-hd" style="text-align:center;padding:5px 20px;padding-top:10px;margin:30px 0;">
          <h1 style="font-size:20px;color:black;font-weight:bold">أحدث العروض</h1>
        </div>
      </div>
      <div class="col-md-3">

      </div>
      <div class="col-md-12">
        <div class="swiper mySwiper77">
     <div class="swiper-wrapper">

        <?php
        // جلب العروض
        $stmt = $conn->prepare("SELECT * FROM offers ORDER BY id DESC  LIMIT 3 ");
        $stmt->execute();
        $offers = $stmt->fetchAll();

        foreach ($offers as $offer)
        {
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
<?php
 ?>
<section class="sectionspace" style="margin:40px 0 !important">
<div class="container-fluid">
  <div class="row">
    <?php
    $stmt = $conn->prepare("SELECT * FROM users WHERE type = 0 ORDER BY id DESC  LIMIT 2 ");
    $stmt->execute();
    $users = $stmt->fetchAll();
      foreach($users as $user)
      {
        ?>
        <div class="col-md-6">
            <div class="vdsre">
              <img class="d-block w-100" src="<?php echo $avatar . $user['image'] ?>" alt="First slide">
              <div class="ovrsc">
                <h1><?php echo $user['storename'] ?> </h1>
                <a href="webpage.php?page=offers&id=<?php echo $user['id'] ?>">العروض <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.3 17.275C13.1 17.075 13.004 16.8333 13.012 16.55C13.02 16.2667 13.1243 16.025 13.325 15.825L16.15 13H5C4.71667 13 4.479 12.904 4.287 12.712C4.095 12.52 3.99933 12.2827 4 12C4 11.7167 4.096 11.479 4.288 11.287C4.48 11.095 4.71733 10.9993 5 11H16.15L13.3 8.15C13.1 7.95 13 7.71233 13 7.437C13 7.16167 13.1 6.92433 13.3 6.725C13.5 6.525 13.7377 6.425 14.013 6.425C14.2883 6.425 14.5257 6.525 14.725 6.725L19.3 11.3C19.4 11.4 19.471 11.5083 19.513 11.625C19.555 11.7417 19.5757 11.8667 19.575 12C19.575 12.1333 19.554 12.2583 19.512 12.375C19.47 12.4917 19.3993 12.6 19.3 12.7L14.7 17.3C14.5167 17.4833 14.2877 17.575 14.013 17.575C13.7383 17.575 13.5007 17.475 13.3 17.275Z" fill="#111111"/>
                </svg>
      </a>
              </div>
            </div>
        </div>
        <?php
      }
     ?>

  </div>
</div>
</section>




  <?php
  $stmt = $conn->prepare("SELECT * FROM posts WHERE visibility = 1 ORDER BY id DESC LIMIT 3");
  $stmt->execute();
  $posts = $stmt->fetchAll();
  if (!empty($posts))
  {
    ?>
    <section class="news-section">
    <div class="container">


    <div class="row">
      <div class="col-md-12">
        <div class="content-header" style="background: unset !important;font-weight: bold;text-align:right;margin:30px 0">

          <h1 style="font-size:30px;font-weight:bold">  أحدث المقالات  </h1>
        </div>
      </div>
    <?php

      foreach ($posts as $post)
      {
        ?>

        <div class="news-block col-lg-4 col-md-4 col-sm-12 wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
          <div class="inner-box">

            <div class="content-box">
              <ul class="post-info">
                <li><i class="fa fa-user-circle"></i> by Admin</li>
                <li><i class="fa fa-file"></i> <?php echo $post['id'] ?> </li>
              </ul>
              <h4 class="title"><a style="color:black" href="webpage.php?page=portfolio&id=<?php echo $post['id'] ?>"><?php echo $post['title'] ?></a></h4>
              <p style="font-size:13px"><?php $text = strip_tags($post['content']); echo mb_strimwidth($text, 0, 210, "...")  ?></p>

            </div>
          </div>
        </div>


        <?php
      }
     ?>
    <!-- News Block -->


    </div>
    </div>
    </div>
    </section>


    <?php
  }
   ?>



      <!-- Footer content -->







  <?php

























  include $tpl . 'footer.php';
  ob_end_flush();

 ?>
