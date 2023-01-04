<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Poco admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Poco admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
    <title>Login Page</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="../assets/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="../assets/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/feather-icon.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/animate.css">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
    <!-- เรียกไฟล์ม Vue js มาจาก โฟลเดอร์ assets / js / vue.js  -->
    <script src="../assets/js/vue.js"></script>
    <!-- เรียกผ่าน cdn axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- โมเดิลแจ้งเตื่อน เรัียกผ่าน cdn  sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- Loader starts-->
    <!-- <div class="loader-wrapper">
        <div class="typewriter">
            <h1>New Era Admin Loading..</h1>
        </div>
    </div> -->
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper">
        <div class="container-fluid p-0">
            <!-- login page start-->
            <div class="authentication-main">
                <div class="row">
                    <div class="col-md-12">
                        <div class="auth-innerright">
                            <div class="authentication-box">
                                <div class="card-body p-0">
                                    <div class="cont text-center">
                                        <form class="theme-form" id="login">
                                            <h4>เข้าสู่ระบบ</h4>
                                            <h6>กรอกชื่อผู้ใช้งานและรหัสผ่าน</h6>
                                            <div class="form-group text-left">
                                                <label class="col-form-label pt-0">ชื่อผู้ใช้งาน</label>
                                                <input class="form-control" v-model="username" type="text" required="">
                                            </div>
                                            <div class="form-group text-left">
                                                <label class="col-form-label">รหัสผ่าน</label>
                                                <input class="form-control" type="password" v-model="password" required="">
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div class="checkbox p-0 text-left">
                                                    <input id="checkbox1" type="checkbox">
                                                    <label for="checkbox1">จดจำ</label>
                                                </div>

                                                <div class="checkbox p-0 mt-2">
                                                    <a href="signup.php">สมัครสมาชิก</a>
                                                </div>
                                            </div>
                                            <div class="form-group form-row  mb-0">
                                                <button @click="login" class="btn btn-primary btn-block" type="button">เข้าสู่ระบบ</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- login page end-->
        </div>
    </div>


    <script type="text/javascript">
        /// สร้างตัว แปร login มีค่าเท่ากับ object ของคลาส vue  
        let login = new Vue({
            ///เข้าถึง ไอดี login
            el: "#login",
            data: {
                ///เก็บพวกตัวแปร
                username: "",
                password: "",
            },
            methods: {
                ///เก็บฟังชั่น
                login() {
                    if (this.username != "" && this.password != "") {
                        ///axios คือ เครื่องมืิที่เอาไว้ส่งข้อมูลให้ฝั่ง server  
                        axios.post("../apis/api_login.php", {
                                /// ประเภทการส่งข้อมูล content-type 
                                headers: {
                                    "Content-Type": "application/json",
                                },
                                action: "login",
                                user_username: this.username,
                                user_password: this.password,
                            })
                            .then((res) => {
                                let {
                                    status,
                                    meg
                                } = res.data;
                                if (status) {
                                    Swal.fire({
                                        title: "สำเร็จ",
                                        text: meg,
                                        icon: "success",
                                        timer: 1500,
                                        showConfirmButton: false,
                                    }).then(() => window.location.replace("../index.php"));
                                } else {
                                    Swal.fire({
                                        title: "เกิดข้อผิดพลาด",
                                        text: meg,
                                        icon: "error",
                                    });
                                }
                            })
                    }
                },
            },

        });
    </script>
    <!-- latest jquery-->
    <script src="../assets/js/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap js-->
    <script src="../assets/js/bootstrap/popper.min.js"></script>
    <script src="../assets/js/bootstrap/bootstrap.js"></script>
    <!-- feather icon js-->
    <script src="../assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="../assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- Sidebar jquery-->
    <script src="../assets/js/sidebar-menu.js"></script>
    <script src="../assets/js/config.js"></script>
    <!-- Plugins JS start-->
    <script src="../assets/js/login.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/theme-customizer/customizer.js"></script>
    <!-- login js-->
    <!-- Plugin used-->


</body>

</html>