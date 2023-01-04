<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6 main-header">
                <h2>จัดการ<span>ผู้เช่า </span></h2>
            </div>
            <div class="col-lg-6 breadcrumb-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php"><i class="pe-7s-home"></i></a></li>
                    <li class="breadcrumb-item active">จัดการผู้เช่า</li>
                </ol>
            </div>
        </div>
    </div>


    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row" style=" margin-bottom: 2rem ;">
            <!-- เพิื่มผู้ใช้งาน modal-->
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target=".addUser">เพิ่มผู้เช่า</button>
            <div class="modal fade addUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class=" modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">เพิ่มผู้เช่า</h4>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body" style="padding:2rem;">
                            <form class="addUser-validation" id="form" novalidate="">
                                <div class="form-row">

                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom03">คำนำหน้า<span class="text-danger">*</span></label>
                                        <select class="custom-select" id="prefix" required="">
                                            <option value="">เลือกคำนำหน้า</option>
                                            <option value="1">นาย</option>
                                            <option value="2">นาง</option>
                                            <option value="3">นางสาว</option>
                                        </select>
                                        <div class="invalid-feedback">โปรดเลือกคำนำหน้า</div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom01">ชื่อจริง<span class="text-danger">*</span></label>
                                        <input class="form-control" id="fname" type="text" placeholder="ชื่อจริง" required="">
                                        <div class="invalid-feedback">โปรดกรอกชื่อจริง</div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom02">นามสกุล<span class="text-danger">*</span></label>
                                        <input class="form-control" id="lname" type="text" placeholder="นามสกุล" required="">
                                        <div class="invalid-feedback">โปรดกรอกนามสกุล</div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustomUsername">เบอร์โทรศัพท์<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input class="form-control" id="tel" type="text" maxlength="10" placeholder="เบอร์โทรศัพท์" aria-describedby="inputGroupPrepend" required="">
                                            <div class="invalid-feedback">โปรดกรอก เบอร์โทรศัพท์</div>
                                        </div>
                                    </div>


                                </div>
                                <div class="form-row">
                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustomUsername">ชื่อผู้ใช้งาน<span class="text-danger">*</span> </label>
                                        <div class="input-group">
                                            <input class="form-control" id="username" type="email" placeholder="Username" aria-describedby="inputGroupPrepend" required="">
                                            <div class="invalid-feedback">โปรดกรอก ชื่อผู้ใช้งาน </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustomUsername">รหัสผ่าน<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input class="form-control" id="newPassword" type="password" placeholder="รหัสผ่าน" aria-describedby="inputGroupPrepend" required="">
                                            <div class="invalid-feedback">โปรดกรอกรหัสผ่าน</div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustomUsername">ยืนยันรหัสผ่าน<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input class="form-control" id="replyPassword" type="password" placeholder="รหัสผ่าน" aria-describedby="inputGroupPrepend" required="">
                                            <div class="invalid-feedback">โปรดกรอกยืนยันรหัสผ่าน</div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustomUsername">รหัสไปรษณีย์<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input class="form-control" id="zipcode" maxlength="5" type="text" placeholder="ไปรษณีย์" aria-describedby="inputGroupPrepend" required="">
                                            <div class="invalid-feedback">โปรดกรอกรหัสไปรษณีย์</div>
                                        </div>
                                    </div>

                                </div>


                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustomUsername">ที่อยู่<span class="text-danger">*</span> </label>
                                        <div class="input-group">
                                            <textarea class="form-control" id="address" placeholder="ที่อยู่" aria-describedby="inputGroupPrepend" required=""></textarea>
                                            <div class="invalid-feedback">โปรดกรอก ที่อยู่ </div>
                                        </div>
                                    </div>

                                </div>
                                <input type="number" value="0" id="user_level" class="d-none">
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-primary" type="submit">เพิ่มผู้เช่า</button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" id="user">
                            <table class="display" id="advance-1">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ชื่อ - นามสกุล</th>
                                        <th>ชื่อผู้ใช้งาน</th>
                                        <th>เบอร์โทรศัพท์</th>
                                        <th>ที่อยู่</th>
                                        <th>รหัสไปรษณีย์</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(val,idx) in this.User">
                                        <td>{{idx + 1}}</td>
                                        <td>{{(val.user_prefix == 1) ? 'นาย ' + val.user_fname + " " + val.user_lname : (val.user_prefix == 2) ? 'นาง ' +val.user_fname + " " + val.user_lname : 'นางสาว ' + val.user_fname + " " + val.user_lname   }}</td>
                                        <td>{{val.user_username}}</td>
                                        <td>{{val.user_tel}}</td>
                                        <td>{{val.user_address}}</td>
                                        <td>{{val.user_zipcode}}</td>
                                        <td>
                                            <div class="d-flex justify-content-between">
                                                <i @click="setInfo(val)" class="fa fa-eye text-info mx-2 " data-toggle="modal" data-target=".infoUser" style="font-size: 25px;cursor:pointer"></i>
                                                <i class="fa fa-edit text-warning mx-2" @click="setInfo(val)" data-toggle="modal" data-target=".editUser" style="font-size: 25px;cursor:pointer"></i>
                                                <i @click="delUser(val.user_id)" class="fa fa-trash-o text-danger mx-2" style="font-size: 25px;cursor:pointer"></i>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>


                            <!-- edit modal-->
                            <div class="modal fade editUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myLargeModalLabel">แก้ไขผู้เช่า</h4>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body" style="padding:2rem ;">
                                            <form class="edit-validation" id="form" novalidate="">
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                        <label for="validationCustom03">คำนำหน้า<span class="text-danger">*</span></label>
                                                        <select class="custom-select" id="prefix" v-model="user_prefix" required="">
                                                            <option value="">เลือกคำนำหน้า</option>
                                                            <option value="1">นาย</option>
                                                            <option value="2">นาง</option>
                                                            <option value="3">นางสาว</option>
                                                        </select>
                                                        <div class="invalid-feedback">โปรดเลือกคำนำหน้า</div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="validationCustom01">ชื่อจริง<span class="text-danger">*</span></label>
                                                        <input class="form-control" id="fname" type="text" v-model="user_fname" placeholder="ชื่อจริง" required="">
                                                        <div class="invalid-feedback">โปรดกรอกชื่อจริง</div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="validationCustom02">นามสกุล<span class="text-danger">*</span></label>
                                                        <input class="form-control" id="lname" type="text" v-model="user_lname" placeholder="นามสกุล" required="">
                                                        <div class="invalid-feedback">โปรดกรอกนามสกุล</div>
                                                    </div>

                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                        <label for="validationCustomUsername">เบอร์โทรศัพท์<span class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <input class="form-control" id="tel" v-model="user_tel" type="text" maxlength="10" placeholder="เบอร์โทรศัพท์" aria-describedby="inputGroupPrepend" required="">
                                                            <div class="invalid-feedback">โปรดกรอก เบอร์โทรศัพท์</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="validationCustomUsername">ชื่อผู้ใช้งาน<span class="text-danger">*</span> </label>
                                                        <div class="input-group">
                                                            <input class="form-control" id="username" v-model="user_username" type="email" placeholder="Username" aria-describedby="inputGroupPrepend" required="">
                                                            <div class="invalid-feedback">โปรดกรอก ชื่อผู้ใช้งาน </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 mb-3">
                                                        <label for="validationCustomUsername">รหัสไปรษณีย์<span class="text-danger">*</span></label>
                                                        <div class="input-group">
                                                            <input class="form-control" v-model="user_zipcode" id="zipcode" maxlength="5" type="text" placeholder="ไปรษณีย์" aria-describedby="inputGroupPrepend" required="">
                                                            <div class="invalid-feedback">โปรดกรอกรหัสไปรษณีย์</div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-row">
                                                    <div class="col-md-12 mb-3">
                                                        <label for="validationCustomUsername">ที่อยู่<span class="text-danger">*</span> </label>
                                                        <div class="input-group">
                                                            <textarea class="form-control" v-model="user_address" id="address" placeholder="ที่อยู่" aria-describedby="inputGroupPrepend" required=""></textarea>
                                                            <div class="invalid-feedback">โปรดกรอก ที่อยู่ </div>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <button @click="EditUser" class="btn btn-warning" type="submit">แก้ไข</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- info modal-->
                            <div class="modal fade infoUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myLargeModalLabel">รายละเอียดผู้เช่า</h4>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body" style="padding:2rem ;">
                                            <form class="needs-validation" id="form" novalidate="">
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-3">
                                                        <img v-if="user_img != ''" width="100" height="100" style="object-fit:cover" class=" rounded-circle" v-bind:src="'./images/'+user_id+'/profile/'+user_img" alt="">
                                                        <img v-else width="100" height="100" style="object-fit:cover" class=" rounded-circle" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/1200px-Default_pfp.svg.png" alt="">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="col-md-6 mb-3">
                                                        <label style="font:17px ;font-weight:bold;" for="validationCustom01">ชื่อ - นามสกุล<span class="text-danger">*</span></label>
                                                        <p style="font-size: 16px;">{{(user_prefix == 1) ? "นาย" : (user_prefix == 2) ? "นาง" : "นางสาว" }} {{ user_fname + " " + user_lname }}</p>
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label style="font:17px ;font-weight:bold;" for="validationCustom01">เบอร์โทรศัพท์<span class="text-danger">*</span></label>
                                                        <p style="font-size: 16px;">{{ user_tel}}</p>
                                                    </div>
                                                </div>


                                                <div class="form-row">

                                                    <div class="col-md-6 mb-3">
                                                        <label style="font:17px ;font-weight:bold;" for="validationCustom01">ชื่อผู้ใช้งาน<span class="text-danger">*</span></label>
                                                        <p style="font-size: 16px;">{{ user_username}}</p>
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label style="font:17px ;font-weight:bold;" for="validationCustom01">รหัสไปรษณีย์<span class="text-danger">*</span></label>
                                                        <p style="font-size: 16px;">{{user_zipcode}}</p>
                                                    </div>

                                                </div>
                                                <div class="form-row">

                                                    <div class="col-md-12 mb-3">
                                                        <label style="font:17px ;font-weight:bold;" for="validationCustom01">ที่อยู่<span class="text-danger">*</span></label>
                                                        <p style="font-size: 16px;">{{ user_address}}</p>
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
            </div>

        </div>



    </div>
</div>


<script>
    let form = new Vue({
        el: "#user",
        data: {
            User: [],
            user_username: "",
            user_fname: "",
            user_lname: "",
            user_tel: "",
            user_address: "",
            user_id: "",
            user_zipcode: "",
            user_prefix: "",
            user_img: "",
        },
        methods: {
            delUser(user_id) {
                Swal.fire({
                    icon: "info",
                    title: 'คุณต้องการลบผู้ใช้เช่าคนนี้?',
                    showCancelButton: true,
                    confirmButtonText: 'ใช่',
                    cancelButtonText: "ไม่",
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        axios
                            .post("./apis/api_delUser.php", {
                                headers: {
                                    "Content-Type": "application/json",
                                },
                                action: "delUser",
                                user_id: user_id,
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
                                    }).then(() => window.location.reload());
                                } else {
                                    Swal.fire({
                                        title: "เกิดข้อผิดพลาด",
                                        text: meg,
                                        icon: "error",
                                    });
                                }
                            });
                    }
                })
            },
            EditUser() {
                ///แก้ไขข้อมูล
                if (this.user_address != "" && this.user_fname != "" && this.user_lname != "" && this.user_username != "" && this.user_prefix != "" && this.user_tel != "" && this.user_zipcode != "") {
                    axios
                        .post("./apis/api_editUser.php", {
                            headers: {
                                "Content-Type": "application/json",
                            },
                            action: "editUser",
                            user_username: this.user_username,
                            user_fname: this.user_fname,
                            user_lname: this.user_lname,
                            user_tel: this.user_tel,
                            user_address: this.user_address,
                            user_id: this.user_id,
                            user_zipcode: this.user_zipcode,
                            user_prefix: this.user_prefix,
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
                                }).then(() => window.location.reload());
                            } else {
                                Swal.fire({
                                    title: "เกิดข้อผิดพลาด",
                                    text: meg,
                                    icon: "error",
                                });
                            }
                        });
                }
            },
            setInfo(user) {
                /// เอาค่าจาก แถวในตารางใส่ตัวแปร 
                this.user_username = user.user_username;
                this.user_fname = user.user_fname;
                this.user_lname = user.user_lname;
                this.user_id = user.user_id;
                this.user_address = user.user_address;
                this.user_zipcode = user.user_zipcode;
                this.user_prefix = user.user_prefix;
                this.user_tel = user.user_tel;
                this.user_img = user.user_img;
            },
            getUser() {
                ///ดึงข้อมูลจากฐานข้อมูลมาแสดง
                axios.get("./apis/api_getUser.php")
                    .then((res) => {
                        let {
                            status,
                            user
                        } = res.data;
                        if (status) {
                            this.User.push(...user);
                            $(document).ready(function() {
                                $('#advance-1').DataTable();
                            });

                            // $('#advance-1 tbody').on('click', 'tr', function() {
                            //     var data = table.row(this).data();
                            //     alert('You clicked on ' + data[0] + '\'s row');
                            // });
                            // console.log(this.User)
                        }
                    })
            },
        },
        created() {
            this.getUser();
        }
    });
</script>