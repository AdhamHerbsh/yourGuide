<?php

$stmt = $conn->prepare("SELECT * FROM pages WHERE id = 1");
$stmt->execute();
$page = $stmt->fetch();

 ?>
<!-- صفحة اسفل الصفحات  -->
<!-- footer begin -->
  <footer class="footer" id="footer" style="margin-top:60px">
    <div class="container">
      <div class="row">

        <div class="col-md-4">
          <div class="link">
            <h1> معلومات التواصل </h1>
            <div class="erte">
              <ul style="margin:20px 0">

                <li>
                  <h6 style="text-align:right;font-weight:bold">العنوان</h6>
                  <a> السعودية ، الرياض</a>
                </li>



              </ul>
            </div>
            <div class="erte">
              <ul style="margin:20px 0">

                <li>
                  <h6 style="text-align:right;font-weight:bold">البريد الالكتروني</h6>
                  <a target="_blank" href="mailto:<?php echo $lg['email'] ?>"><?php echo $lg['email'] ?></a>
                </li>



              </ul>
            </div>
            <div class="erte">
              <ul style="margin:20px 0">

                <li>
                  <h6 style="text-align:right;font-weight:bold">الهاتف</h6>
                  <a ><?php echo $lg['phone'] ?></a>
                </li>



              </ul>
            </div>
            <div class="erte">
              <ul style="margin:20px 0">

                <li>
                  <h6 style="text-align:right;font-weight:bold">أيام/ساعات العمل</h6>
                  <a >Sun -Thu / 8:00AM - 6:00PM</a>
                </li>



              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <div class="link">
            <h1>مساعدة</h1>
            <ul>

              <li>
                <a href="webpage.php?page=contactus">تواصل معنا</a>
              </li>
          
              <li>
                <a href="webpage.php?page=privacy">الخصوصية</a>
              </li>

            </ul>
          </div>
        </div>

        <div class="col-md-4">
          <div class="about">
            <h1>من نحن</h1>
            <?php
              $text =  strip_tags($page['aboutus']);
             ?>
          <p style="font-size:14px">  <?php   echo  mb_strimwidth($text, 0,250, "..."); ?></p>
          <ul>

            			<?php
            				if (!empty($page['fb']))
            				{
            					?>
            					<li class="nav-item">
            						<a class="nav-link fab fa-facebook " target="_blank" href="<?php echo $page['fb'] ?>"></a>
            					</li>
            					<?php
            				}

            				if (!empty($page['snap']))
            				{
            					?>
            					<li class="nav-item">
            						<a class="nav-link fab fa-snapchat " target="_blank" href="<?php echo $page['snap'] ?>"></a>
            					</li>
            					<?php
            				}
            				if (!empty($page['inst']))
            				{
            					?>
            					<li class="nav-item">
            						<a class="nav-link fab fa-instagram " target="_blank" href="<?php echo $page['inst'] ?>"></a>
            					</li>
            					<?php
            				}
            				if (!empty($page['twi']))
            				{
            					?>
            					<li class="nav-item">
            						<a class="nav-link fab fa-twitter " target="_blank" href="<?php echo $page['twi'] ?>"></a>
            					</li>
            					<?php
            				}


            				if (!empty($page['whats']))
            				{
            					?>
            					<li class="nav-item">
            						<a class="nav-link fab fa-whatsapp " target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo $page['whats'] ?>"></a>
            					</li>
            					<?php
            				}

            			 ?>
          </ul>
          </div>
        </div>
        <div class="col-md-12">
          <div class="rights" style="text-align:center">
            <p style="margin-bottom:0;color:black;font-size:12px !important">جميع الحقوق محفوظة 2025</p>

          </div>
        </div>
      </div>
    </div>
  </footer>
<!-- footer end -->
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
   var swiper = new Swiper('.swiper-container', {
     slidesPerView: 1,
     spaceBetween: 10,
     // init: false,
     pagination: {
       el: '.swiper-pagination',
       clickable: true,
     },
     breakpoints: {
       '@0.00': {
         slidesPerView: 1,
         spaceBetween: 10,
       },
       '@0.75': {
         slidesPerView: 2,
         spaceBetween: 20,
       },
       '@1.00': {
         slidesPerView: 3,
         spaceBetween: 40,
       },
       '@1.50': {
         slidesPerView: 4,
         spaceBetween: 50,
       },
     }
   });
 </script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 	 <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
 	 <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"  crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script type="text/javascript" src="<?php echo $js ?>main.js"></script>

</body>
</html>
