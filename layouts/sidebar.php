    <!-- Page Sidebar Start-->
    <div class="iconsidebar-menu">
        <div class="sidebar">
            <ul class="iconMenu-bar custom-scrollbar">
                <?php if ($_SESSION['ses_level'] == 1 || $_SESSION['ses_level'] == 3) { ?>
                    <li><a class="bar-icons " href="index.php">
                            <!--img(src='./assets/images/menu/home.png' alt='')--><i class="pe-7s-home"></i><span>หน้าหลัก </span>
                        </a>
                        <!-- <ul class="iconbar-mainmenu custom-scrollbar">
                        <li class="iconbar-header">Dashboard</li>
                        <li><a href="index.html">Default</a></li>
                    </ul> -->
                    </li>

                    <li><a class="bar-icons " href="index.php?p=editHome">
                            <!--img(src='./assets/images/menu/home.png' alt='')--><i class="fa fa-desktop"></i><span>แก้ไขหน้าหน้าหลัก </span>
                        </a>
                    </li>


                    <li><a class="bar-icons " href="index.php?p=bank">
                            <!--img(src='./assets/images/menu/home.png' alt='')--><i class="fa fa-qrcode"></i><span>จัดการธนาคาร </span>
                        </a>
                    </li>


                    <li><a class="bar-icons ">
                            <!--img(src='./assets/images/menu/home.png' alt='')--><i class="fa fa-user"></i><span>จัดการผู้ใช้งาน </span>
                        </a>
                        <ul class="iconbar-mainmenu custom-scrollbar">
                            <li class="iconbar-header">ผู้ใช้งาน</li>
                            <li><a href="index.php?p=MangeUser">ผู้เช่า</a></li>
                            <?php if ($_SESSION['ses_level'] == 3) {  ?>

                                <li><a href="index.php?p=MangeOwner">เจ้าของที่</a></li>
                            <?php } ?>
                        </ul>
                    </li>

                    <li><a class="bar-icons " href="index.php?p=MangeMarket">
                            <!--img(src='./assets/images/menu/home.png' alt='')--><i class="fa fa-institution"></i><span>จัดการตลาด</span>
                        </a>
                        <!-- <ul class="iconbar-mainmenu custom-scrollbar">
                        <li class="iconbar-header">ตลาด</li>
                        <li><a href="index.php?p=ShowArea">ข้อมูลพื้นที่</a></li>
                        <li><a href="index.php?p=MangeArea">จัดการแผงลอย</a></li>
                    </ul> -->
                    </li>

                    <li><a class="bar-icons ">
                            <!--img(src='./assets/images/menu/home.png' alt='')--><i class="fa fa-map-marker"></i><span>จัดการแผงลอย</span>
                        </a>
                        <ul class="iconbar-mainmenu custom-scrollbar">
                            <li class="iconbar-header">แผงลอย</li>
                            <li><a href="index.php?p=ShowArea">ข้อมูลพื้นที่</a></li>
                            <li><a href="index.php?p=MangeArea">จัดการแผงลอย</a></li>
                        </ul>
                    </li>

                    <li><a class="bar-icons " href="index.php?p=MangeRent">
                            <!--img(src='./assets/images/menu/home.png' alt='')-->
                            <i class="fa fa-shopping-cart"></i> <span>การเช่า</span>
                        </a>
                    </li>

                    <li><a class="bar-icons " href="index.php?p=MangeOrder">
                            <!--img(src='./assets/images/menu/home.png' alt='')-->
                            <i class="fa fa-money"></i> <span>รายการเช่า</span>
                        </a>
                    </li>

                    <li><a class="bar-icons " href="index.php?p=MangeSell">
                            <!--img(src='./assets/images/menu/home.png' alt='')-->
                            <i class="fa fa-file-pdf-o"></i> <span>สรุปรายการเช่า</span>
                        </a>
                    </li>
                <?php  } else { ?>
                    <li><a class="bar-icons " href="index.php">
                            <!--img(src='./assets/images/menu/home.png' alt='')--><i class="pe-7s-home"></i><span>หน้าหลัก </span>
                        </a>
                        <!-- <ul class="iconbar-mainmenu custom-scrollbar">
                        <li class="iconbar-header">Dashboard</li>
                        <li><a href="index.html">Default</a></li>
                    </ul> -->
                    </li>

                    <li><a class="bar-icons " href="index.php?p=Home">
                            <!--img(src='./assets/images/menu/home.png' alt='')-->
                            <i class="fa fa-shopping-cart"></i> <span>การเช่า</span>
                        </a>
                    </li>

                    <li><a class="bar-icons " href="index.php?p=Cart">
                            <!--img(src='./assets/images/menu/home.png' alt='')-->
                            <i class="fa fa-money"></i> <span>รายการเช่า</span>
                        </a>
                    </li>

                <?php } ?>

                <!-- <li><a class="bar-icons " href="index.php?p=Lab"> -->
                <!-- img(src='./assets/images/menu/home.png' alt='')<i class="pe-7s-user"></i><span>Lab </span> -->
                <!-- </a> -->
                <!-- <ul class="iconbar-mainmenu custom-scrollbar">
                        <li class="iconbar-header">ผู้ใช้งาน</li>
                        <li><a href="index.html">Default</a></li>
                    </ul> -->
                <!-- </li> -->
            </ul>
        </div>
    </div>
    <!-- Page Sidebar Ends-->