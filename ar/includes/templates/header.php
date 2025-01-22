<!DOCTYPE html>
<html lang=ar dir="ltr">
  <head>
       <meta charset="UTF-8">
       <?php


           $stmt = $conn->prepare("SELECT * FROM pages WHERE id = 1");
           $stmt ->execute();

           $lg = $stmt->fetch();
        ?>
    <link rel="stylesheet" href="<?php echo $css ?>chartist.css">
    <title><?php echo getTitle(); ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="<?php echo $logo . $lg['favicon'] ?>">
    <script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"  crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo $css ?>style.css">
  </head>
  <body class="ar">
<section class="searchbar">
  <div class="container">
    <div class="row">


      <div class="col-md-12">
      <i class="fas fa-times closebar"></i>
          <form class="" action="webpage.php?page=search" method="post">
              <input type="text" name="key" style="text-align:center !important" placeholder="ادخل كلمة البحث" value="">
              <input type="submit" name="" class="btn" value="ابحث">

          </form>
      </div>
    </div>
  </div>
</section>
