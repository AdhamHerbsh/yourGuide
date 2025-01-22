<?php
if(!isset($_SESSION))
{
    session_start();
}
include './connect.php';
$user = $_SERVER['HTTP_USER_AGENT'];

$stmt = $conn->prepare("SELECT * FROM pages WHERE id = 1");
$stmt->execute();
$page = $stmt->fetch();

 ?>

<!-- صفحة خاصة بالقائمة العلوية للموقع -->

 <div class="header" id="bb0099a">
<!-- sidebar -->
     <div class="sidebar">
       <div class="rmkt">

         <div class="der4er5">
              <span class="fas fa-bars mprekt"></span>
         </div>

         <a id="opensearch"  style="cursor:pointer">
           <svg width="15" height="15" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
           <g clip-path="url(#clip0_1705_6)">
           <path d="M16.33 5.05C18.4961 5.04802 20.6142 5.68855 22.4162 6.89054C24.2182 8.09254 25.6233 9.80201 26.4536 11.8027C27.2839 13.8034 27.5022 16.0054 27.0808 18.1301C26.6594 20.2549 25.6173 22.2069 24.0864 23.7393C22.5554 25.2717 20.6043 26.3155 18.4799 26.7389C16.3556 27.1622 14.1534 26.9459 12.1519 26.1174C10.1505 25.2889 8.43975 23.8855 7.2361 22.0845C6.03246 20.2836 5.39 18.1661 5.39 16C5.40313 13.1017 6.55964 10.3256 8.60816 8.27522C10.6567 6.22482 13.4317 5.06578 16.33 5.05ZM16.33 3C13.7588 3 11.2454 3.76244 9.10759 5.1909C6.96975 6.61935 5.30351 8.64968 4.31957 11.0251C3.33563 13.4006 3.07818 16.0144 3.57979 18.5362C4.0814 21.0579 5.31953 23.3743 7.13761 25.1924C8.95569 27.0105 11.2721 28.2486 13.7938 28.7502C16.3156 29.2518 18.9294 28.9944 21.3049 28.0104C23.6803 27.0265 25.7106 25.3603 27.1391 23.2224C28.5676 21.0846 29.33 18.5712 29.33 16C29.33 12.5522 27.9604 9.24558 25.5224 6.80761C23.0844 4.36964 19.7778 3 16.33 3Z" fill="#111111"/>
           <path d="M35 33.29L27.63 25.87L26.21 27.28L33.58 34.7C33.6726 34.7932 33.7826 34.8673 33.9038 34.918C34.0251 34.9688 34.1551 34.9951 34.2865 34.9956C34.4179 34.996 34.5481 34.9706 34.6696 34.9207C34.7912 34.8709 34.9018 34.7976 34.995 34.705C35.0882 34.6124 35.1623 34.5024 35.213 34.3812C35.2638 34.2599 35.2901 34.1299 35.2906 33.9985C35.291 33.8671 35.2656 33.7369 35.2157 33.6154C35.1659 33.4938 35.0926 33.3832 35 33.29Z" fill="#111111"/>
           </g>
           <defs>
           <clipPath id="clip0_1705_6">
           <rect width="36" height="36" fill="white"/>
           </clipPath>
           </defs>
           </svg>

         </a>
       </div>

       <div class="ds" style="text-align:center">
         <a class="navbar-brand" href="index.php" style="text-align:center">
           <img src="<?php echo $logo . $lg['favicon'] ?>" alt="logo" style="width:90px;margin:0 !important">
         </a>
       </div>
       <div class="re">






       </div>
       <div class="lsitte">
         <div class="ds" style="text-align:center">
           <!-- <a class="navbar-brand" href="index.php" style="text-align:center">
             <img src="<?php echo $logo . $lg['logo'] ?>" alt="logo" style="width:90px;margin:0 !important">
           </a> -->
         </div>
         <ul class="merelgj">

           <li>
             <a href="index.php">الرئيسية</a>
           </li>
           <li>
             <a href="webpage.php?page=aboutus">من نحن</a>
           </li>

           <?php
            if (isset($_SESSION['clientid']))
            {
              ?>
              <li>
                <a href="webpage.php?page=myprofile&id=<?php echo $_SESSION['clientid'] ?>">حسابي</a>
              </li>
              <?php
            }
              ?>
         </ul>

         <div class="dsrte" style="text-align:center;width:100%;justify-content:center;">
           <ul class="retty" style="justify-content:center">
   <?php


             if (!empty($lg['snap']))
             {
               ?>
               <li class="nav-item">
                 <a class="nav-link fab fa-snapchat " target="_blank" href="<?php echo $lg['snap'] ?>"></a>
               </li>
               <?php
             }
             if (!empty($lg['inst']))
             {
               ?>
               <li class="nav-item">
                 <a class="nav-link fab fa-instagram " target="_blank" href="<?php echo $lg['inst'] ?>"></a>
               </li>
               <?php
             }
             if (!empty($lg['twi']))
             {
               ?>
               <li class="nav-item">
                 <a class="nav-link fab fa-twitter " target="_blank" href="<?php echo $lg['twi'] ?>"></a>
               </li>
               <?php
             }


             if (!empty($lg['whats']))
             {
               ?>
               <li class="nav-item">
                 <a class="nav-link fab fa-whatsapp " target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo $lg['whats'] ?>"></a>
               </li>
               <?php
             }

             if (!empty($lg['tik']))
             {
               ?>
               <li class="nav-item">
                 <a class="nav-link fab fa-youtube " target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo $lg['tik'] ?>"></a>
               </li>
               <?php
             }
             if (!empty($lg['fb']))
             {
               ?>
               <li class="nav-item">
                 <a class="nav-link fab fa-linkdin " target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo $lg['fb'] ?>"></a>
               </li>
               <?php
             }
   ?>



           </ul>
         </div>
       </div>
     </div>
    <div class="bottombar" id="" >
        <div class="container">
          <nav class="navbar navbar-expand-lg ">

       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bottombar" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon fas fa-bars" style="color:var(--mainColor)"></span>
       </button>
       <div class="collapse navbar-collapse" id="bottombar">
         <ul class="navbar-nav mr-auto">


                      <li>
                        <a class="navbar-brand  d-md-block" href="index.php">
                          <img class="logo img-responsive" src="<?php echo $logo . $page['logo'] ?>" alt="Bookshop|Home2">
                        </a>                      </li>


         </ul>
      <ul class="navbar-nav m-auto">
        <div class="rete">
          <form class="" action="store.php?page=search" method="post">
            <div class="input-group mb-3">
  <input type="text" class="form-control" name="key" placeholder="ادخل كلمة البحث" aria-label="search" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="submit">     <svg width="15" height="15" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
         <g clip-path="url(#clip0_1705_6)">
         <path d="M16.33 5.05C18.4961 5.04802 20.6142 5.68855 22.4162 6.89054C24.2182 8.09254 25.6233 9.80201 26.4536 11.8027C27.2839 13.8034 27.5022 16.0054 27.0808 18.1301C26.6594 20.2549 25.6173 22.2069 24.0864 23.7393C22.5554 25.2717 20.6043 26.3155 18.4799 26.7389C16.3556 27.1622 14.1534 26.9459 12.1519 26.1174C10.1505 25.2889 8.43975 23.8855 7.2361 22.0845C6.03246 20.2836 5.39 18.1661 5.39 16C5.40313 13.1017 6.55964 10.3256 8.60816 8.27522C10.6567 6.22482 13.4317 5.06578 16.33 5.05ZM16.33 3C13.7588 3 11.2454 3.76244 9.10759 5.1909C6.96975 6.61935 5.30351 8.64968 4.31957 11.0251C3.33563 13.4006 3.07818 16.0144 3.57979 18.5362C4.0814 21.0579 5.31953 23.3743 7.13761 25.1924C8.95569 27.0105 11.2721 28.2486 13.7938 28.7502C16.3156 29.2518 18.9294 28.9944 21.3049 28.0104C23.6803 27.0265 25.7106 25.3603 27.1391 23.2224C28.5676 21.0846 29.33 18.5712 29.33 16C29.33 12.5522 27.9604 9.24558 25.5224 6.80761C23.0844 4.36964 19.7778 3 16.33 3Z" fill="#111111"/>
         <path d="M35 33.29L27.63 25.87L26.21 27.28L33.58 34.7C33.6726 34.7932 33.7826 34.8673 33.9038 34.918C34.0251 34.9688 34.1551 34.9951 34.2865 34.9956C34.4179 34.996 34.5481 34.9706 34.6696 34.9207C34.7912 34.8709 34.9018 34.7976 34.995 34.705C35.0882 34.6124 35.1623 34.5024 35.213 34.3812C35.2638 34.2599 35.2901 34.1299 35.2906 33.9985C35.291 33.8671 35.2656 33.7369 35.2157 33.6154C35.1659 33.4938 35.0926 33.3832 35 33.29Z" fill="#111111"/>
         </g>
         <defs>
         <clipPath id="clip0_1705_6">
         <rect width="36" height="36" fill="white"/>
         </clipPath>
         </defs>
         </svg> </button>
  </div>
  </div>
          </form>
        </div>
      </ul>

         <ul class="navbar-nav ml-auto">

           <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M4 22C4 19.8783 4.84285 17.8434 6.34315 16.3431C7.84344 14.8429 9.87827 14 12 14C14.1217 14 16.1566 14.8429 17.6569 16.3431C19.1571 17.8434 20 19.8783 20 22H18C18 20.4087 17.3679 18.8826 16.2426 17.7574C15.1174 16.6321 13.5913 16 12 16C10.4087 16 8.88258 16.6321 7.75736 17.7574C6.63214 18.8826 6 20.4087 6 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11Z" fill="#111111"/>
                     </svg>

                   </a>
                   <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                     <?php
                      if (!isset($_SESSION['clientid']))
                      {
                        ?>

                        <a class="dropdown-item" href="account.php?page=login">تسجيل الدخول</a>
                        <a class="dropdown-item" href="account.php?page=register">انشاء حساب جديد</a>
                        <?php
                      }else {
                      ?>
                      <a class="dropdown-item" href="store.php?page=addoffer">اضف عرضك</a>

                      <a class="dropdown-item" href="webpage.php?page=myprofile&id=<?php echo $_SESSION['clientid'] ?>">اعدادات الحساب</a>
                      <a class="dropdown-item" href="logout.php">تسجيل الخروج</a>
                      <?php
                      }
                      ?>
                   </div>
                 </li>
                 <li class="nav-item dropdown">
                         <a class="nav-link" href="store.php?page=myoffers" id="" data-toggle="" aria-haspopup="true" aria-expanded="false">
                           <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M9 13H15M9 17H12M4 4V20C4 20.5304 4.21071 21.0391 4.58579 21.4142C4.96086 21.7893 5.46957 22 6 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V8.342C20 8.07556 19.9467 7.81181 19.8433 7.56624C19.7399 7.32068 19.5885 7.09824 19.398 6.912L14.958 2.57C14.5844 2.20466 14.0826 2.00007 13.56 2H6C5.46957 2 4.96086 2.21071 4.58579 2.58579C4.21071 2.96086 4 3.46957 4 4Z" stroke="#111111" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                           <path d="M14 2V6C14 6.53043 14.2107 7.03914 14.5858 7.41421C14.9609 7.78929 15.4696 8 16 8H20" stroke="#111111" stroke-width="2" stroke-linejoin="round"/>
                           </svg>


                         </a>

                       </li>





         </ul>

       </div>
     </nav>
        </div>
    </div>
    <!-- bottom bar -->


     </div>




             </header>
              </div>

<script type="text/javascript">
window.onscroll = function() {scrollFunction()};

 function scrollFunction() {
   if (document.body.scrollTop > 150 || document.documentElement.scrollTop > 150) {
     document.getElementById("bb0099a").style.position = "fixed";
     document.getElementById("bb0099a").style.width = "100%";
     document.getElementById("bb0099a").style.backgroundColor = "#fff";
     document.getElementById("bb0099a").style.top = "0";
     document.getElementById("bb0099a").style.zIndex = "9999";
     document.getElementById("bb0099a").style.transition = "5s";
     document.getElementById("bb0099a").style.boxShadow = "0px 10px 10px rgba(0,0,0,.1)";

     document.getElementById("bb0099a").style.transition = "5";

   } else {
     document.getElementById("bb0099a").style.boxShadow = "0px 10px 10px rgba(0,0,0,.0)";

        document.getElementById("bb0099a").style.position = "relative";
         document.getElementById("bb0099a").style.width = "100%";
         document.getElementById("bb0099a").style.backgroundColor = "#fff";
         document.getElementById("bb0099a").style.top = "0";
         document.getElementById("bb0099a").style.zIndex = "999";
   }

}
</script>
