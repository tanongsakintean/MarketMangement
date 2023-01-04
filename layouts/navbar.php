<?php
require("./connect.php");
$adminNoti = $conn->query("SELECT * FROM tb_notify WHERE noti_date = '" . date("Y/m/d") . "' AND type_status = 2 AND del_status = 0");

$userNoti = $conn->query("SELECT * FROM tb_notify WHERE noti_date = '" . date("Y/m/d") . "' AND type_status = 1 AND del_status = 0");

$Img = $conn->query("SELECT user_img FROM tb_user WHERE user_id = '" . $_SESSION['ses_userId'] . "'")->fetch_object()->user_img;

?>
<div class="page-main-header">
    <div class="main-header-right">
        <div class="main-header-left text-center">
            <div class="logo-wrapper p-2"><a href="index.php"><img height="60" src="./assets/logo.jpg" alt=""></a></div>
        </div>
        <div class="mobile-sidebar">
            <div class="media-body text-right switch-sm">
                <label class="switch ml-3"><i class="font-primary" id="sidebar-toggle" data-feather="align-center"></i></label>
            </div>
        </div>
        <div class="vertical-mobile-sidebar"><i class="fa fa-bars sidebar-bar"> </i></div>
        <div class="nav-right col pull-right right-menu">
            <ul class="nav-menus">
                <li>
                </li>
                <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>

                <li class="onhover-dropdown">
                    <span> <img class="img-fluid img-shadow-warning" src="./assets/images/dashboard/notification.png" alt="">

                        <?php if ($_SESSION['ses_level'] == 1 || $_SESSION['ses_level'] == 3) {
                            if ($adminNoti->num_rows > 0) {
                        ?>
                                <span class="badge bg-danger" style="position:absolute;font-size:12px;border-radius:50%"><?php echo $adminNoti->num_rows; ?></span>

                            <?php }
                        } else {
                            if ($userNoti->num_rows > 0) {
                            ?>
                                <span class="badge bg-danger" style="position:absolute;font-size:12px;border-radius:50%"><?php echo $userNoti->num_rows; ?></span>
                        <?php }
                        }
                        ?>

                        <ul class="onhover-show-div notification-dropdown">


                            <?php if ($_SESSION['ses_level'] == 1 || $_SESSION['ses_level'] == 3) {
                                if ($adminNoti->num_rows > 0) {
                            ?>


                                    <a href="index.php?p=MangeOrder">
                                        <li class="pt-0">
                                            <div class="media">
                                                <div class="notification-icons bg-info mr-3"><i class="fa fa-money"></i></div>
                                                <div class="media-body text-dark">
                                                    <span class="badge bg-warning " style="font-size: 15px;">รอตรวจสอบการชำระเงิน</span>
                                                    <span class="text-danger font-weight-bold">จำนวน (<?php echo $adminNoti->num_rows ?>) <span class="text-dark"><?php echo date("d/m/Y"); ?></span></span>
                                                </div>
                                            </div>
                                        </li>
                                    </a>


                                <?php
                                }
                            } else {
                                if ($userNoti->num_rows > 0) { ?>

                                    <a href="index.php?p=cart">
                                        <li class="pt-0">
                                            <div class="media">
                                                <div class="notification-icons bg-info mr-3"><i class="fa fa-money"></i></div>
                                                <div class="media-body text-dark">
                                                    <span class="badge bg-success " style="font-size: 15px;">ยืนยันการชำระเงินสำเร็จ</span>
                                                    <br>
                                                    <span class="text-danger font-weight-bold">จำนวน (<?php echo $userNoti->num_rows ?>) <span class="text-dark"><?php echo date("d/m/Y"); ?></span></span>
                                                </div>
                                            </div>
                                        </li>
                                    </a>
                            <?php }
                            } ?>


                            <!-- <a href="index.php?p=MangeUser">
                            <li class="pt-0">
                                <div class="media">
                                    <div class="notification-icons bg-info mr-3"><i class="fa fa-user"></i></div>
                                    <div class="media-body text-dark">
                                        <h6>สมาชิกใหม่ <span class="text-danger">จำนวน (1)</span></h6>
                                        <p class="mb-0"> 2202/21/12</p>
                                    </div>
                                </div>
                            </li>
                        </a> -->




                        </ul>
                </li>
                <li class="onhover-dropdown"> <span class="media user-header">
                        <?php
                        if ($Img != "") {
                        ?>
                            <img style="width:55px !important;border-radius:50%;" height="50" src="./images/<?php echo $_SESSION['ses_userId'] . '/profile/'; ?><?php echo $Img; ?>" alt=""></span>
                <?php } else { ?>
                    <img style="width:55px !important;" height="50" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/1200px-Default_pfp.svg.png" alt=""></span>
                <?php } ?>
                <ul class="onhover-show-div profile-dropdown">
                    <li class="gradient-primary">
                        <p class="f-w-600 mb-0"><?php echo $_SESSION['ses_prefix'] . " " . $_SESSION['ses_fname'] . " " . $_SESSION['ses_lname']; ?></p>
                    </li>
                    <a href="index.php?p=editProfile">
                        <li><i data-feather="user"> </i>โปรไฟล์</li>
                    </a>
                    <li><a href="logout.php"><i data-feather="log-out"> </i>ออกจากระบบ</a></li>
                </ul>
                </li>
            </ul>
            <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
        </div>
        <script id="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">                        
            <div class="ProfileCard-avatar"><i class="pe-7s-home"></i></div>
            <div class="ProfileCard-details">
            <div class="ProfileCard-realName">{{name}}</div>
            </div>
            </div>
          </script>
        <script id="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
    </div>
</div>