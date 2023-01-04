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
                                            <h4 class="py-3">สมัครสมาชิก</h4>

                                            <div class="row">

                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="form-label">คำนำหน้า</label>
                                                        <select v-model="user_prefix" class="form-control btn-square">
                                                            <option value="0">--เลือกคำนำหน้า--</option>
                                                            <option value="1">นาย</option>
                                                            <option value="2">นาง</option>
                                                            <option value="3">นางสาว</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-5">
                                                    <div class="form-group">
                                                        <label class="form-label">ชื่อจริง</label>
                                                        <input v-model="user_fname" class="form-control" type="text" placeholder="ชื่อจริง">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-5">
                                                    <div class="form-group">
                                                        <label class="form-label">นามสกุล</label>
                                                        <input v-model="user_lname" class="form-control" type="text" placeholder="นามสกุล">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">เบอร์โทรศัพท์</label>
                                                        <input v-model="user_tel" maxlength="10" class="form-control" type="text" placeholder="เบอร์โทรศัพท์">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">รหัสไปรษณีย์</label>
                                                        <input class="form-control" v-model="user_zipcode" max-length="6" type="text" placeholder="รหัสไปรษณีย์">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">ที่อยู่</label>
                                                        <textarea class="form-control" type="text" v-model="user_address" placeholder="ทีอยู่"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">ชื่อผู้ใช้งาน</label>
                                                        <input v-model="user_username" class="form-control" type="email" placeholder="ชือผู้ใช้งาน">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">รหัสผ่าน</label>
                                                        <input v-model="user_password" class="form-control" type="password" placeholder="รหัสผ่าน">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">ยืนยันรหัสผ่าน</label>
                                                        <input v-model="user_NewPassword" class="form-control" type="password" placeholder="ยืนยันรหัสผ่าน">
                                                    </div>
                                                </div>

                                                <div class="col-md-12 d-flex justify-content-between ">

                                                    <button type="button" @click="addUser" class="btn w-100 btn-primary btn-pill">สมัครสมาชิก</button>
                                                </div>
                                                <div class="col-md-12 text-right p-3">
                                                    <a href="login.php">เข้าสู่ระบบ</a>
                                                </div>
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
                user_username: "",
                user_password: "",
                user_NewPassword: "",
                user_fname: "",
                user_lname: "",
                user_tel: "",
                user_address: "",
                user_zipcode: "",
                user_prefix: "",
            },
            methods: {
                ///เก็บฟังชั่น
                addUser() {
                    if (this.user_address != "" && this.user_fname != "" && this.user_lname != "" && this.user_prefix != "" && this.user_password != "" && this.user_NewPassword != "" && this.user_tel != "" && this.user_zipcode != "") {
                        if (this.user_password == this.user_NewPassword) {
                            axios
                                .post("../apis/api_addUser.php", {
                                    headers: {
                                        "Content-Type": "application/json",
                                    },
                                    action: "addUser",
                                    user_level: 0,
                                    username: this.user_username,
                                    password: this.user_password,
                                    prefix: this.user_prefix,
                                    fname: this.user_fname,
                                    lname: this.user_lname,
                                    tel: this.user_tel,
                                    address: this.user_address,
                                    zipcode: this.user_zipcode,
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
                                });


                        } else {
                            Swal.fire({
                                title: "เกิดข้อผิดพลาด",
                                text: "รหัสผ่านไม่ตรงกัน!",
                                icon: "error",
                            });
                        }
                    } else {
                        Swal.fire({
                            title: "เกิดข้อผิดพลาด",
                            text: "โปรดกรอกข้อมูลให้ครบถ้วน!",
                            icon: "error",
                        });
                    }

                },
            }

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