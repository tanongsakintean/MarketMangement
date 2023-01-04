<!-- Loader starts-->
<!-- <div class="loader-wrapper">
  <div class="typewriter">
    <h1>New Era Admin Loading..</h1>
  </div>
</div> -->
<!-- Loader ends-->
<!-- page-wrapper Start-->
<div class="page-wrapper">
  <!-- Page Header Start-->
  <?php
  include_once("./layouts/navbar.php");
  ?>
  <!-- Page Header Ends                              -->
  <!-- Page Body Start-->
  <div class="page-body-wrapper">


    <?php
    include_once("./layouts/sidebar.php");
    ?>


    <!-- dynamic component  -->
    <div class="page-body">

      <?php

      if (isset($_REQUEST['p'])) {
        include("./components/" . $_REQUEST['p'] . ".php");
      } else {
        include("./components/Dashboard.php");
      }

      ?>

    </div>
    <!-- footer start-->
    <?php

    include_once("./layouts/footer.php");

    ?>
  </div>
</div>