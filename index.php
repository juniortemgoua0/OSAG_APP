<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link href='css/bootstrap.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="css/style.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

<!--  Boostrap icon Link-->
  <link rel="stylesheet" href="assets/icons-1.7.1/font/bootstrap-icons.css">

<!--  jquery dabatable links-->
  <script src="js/jquery.min.js" defer></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" defer></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js" defer></script>
  <script src="js/bootstrap.min.js" defer></script>
  <script src="js/main.js" defer></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="contain">

 <?php require "views/sidebar.php" ?>

  <div class="tab-content section" id="pills-tabContent">
    <div class="tab-pane fade show active " id="pills-dashboard" role="tabpanel" aria-labelledby="pills-dashboard-tab">
    <?php require "views/dashboard.php" ?>
    </div>

    <div class="tab-pane fade" id="pills-product" role="tabpanel" aria-labelledby="pills-profile-tab">
      <?php require "views/product.php"?>
    </div>

    <div class="tab-pane fade" id="pills-stock" role="tabpanel" aria-labelledby="pills-contact-tab">
      <?php require "views/stock.php" ?>
    </div>

    <div class="tab-pane fade" id="pills-setting" role="tabpanel" aria-labelledby="pills-setting-tab">
      <?php require "views/setting.php" ?>
    </div>
  </div>
</div>


</body>
</html>



