<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6 main-header">
                <h2>จัดการ<span>ธนาคาร </span></h2>
            </div>
            <div class="col-lg-6 breadcrumb-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php"><i class="pe-7s-home"></i></a></li>
                    <li class="breadcrumb-item active">จัดการธนาคาร</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- Container-fluid starts-->
    <div class="container-fluid" id="bank">
        <div class="row" style=" margin-bottom: 2rem ;">
            <!-- เพิื่มผู้ใช้งาน modal-->
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target=".addBank">เพิ่มธนาคาร</button>
            <div class="modal fade addBank" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">เพิ่มธนาคาร</h4>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            <form id="form" novalidate="">
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">ชื่อธนาคาร<span class="text-danger">*</span></label>
                                        <input class="form-control" v-model="bank_name" id="area_name" type="text" placeholder="ชื่อธนาคาร" required="">
                                        <div class="invalid-feedback">โปรดกรอกชื่อธนาคาร</div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">รูปภาพ<span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" @change="selectImgB" name="" id="">
                                    </div>
                                </div>


                                <div class="form-row" v-if="preImg != '' ">
                                    <div class="col-md-12 mb-3">
                                        <img style="width: 100%;height:16rem;" v-bind:src="preImg" accept="image/*" alt="" srcset="">
                                    </div>
                                </div>

                        </div>

                        <div class="d-flex justify-content-end mb-3 align-items-center">
                            <button class="btn btn-danger mx-2" data-dismiss="modal" type="button">ยกเลิก</button>
                            <button @click="AddBank" class="btn btn-primary mx-2" type="button">เพิ่มข้อมูลตลาด</button>
                        </div>
                        </form>
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
                        <div class="table-responsive">
                            <table class="display" id="advance-1">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>รูปภาพ</th>
                                        <th>ชื่อธนาคาร</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(val,idx) in this.Bank">
                                        <td>{{idx + 1}}</td>
                                        <td><img v-bind:src="'./images/bank/'+val.bank_img" @click="showIMG(val.bank_img)" width="100" height="100" alt="" srcset=""></td>
                                        <td>{{val.bank_name}}</td>
                                        <td>
                                            <div class="d-flex ">
                                                <i @click="setBankInfo(val)" class="fa fa-edit text-warning mx-2" data-toggle="modal" data-target=".editbank" style="font-size: 25px;cursor:pointer"></i>
                                                <i @click="delBank(val.bank_id)" class="fa fa-trash-o text-danger mx-2" style="font-size: 25px;cursor:pointer"></i>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- edit modal -->
                            <div class="modal fade editbank" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myLargeModalLabel">แก้ไขข้อมูลธนาคาร</h4>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="form" novalidate="">
                                                <div class="form-row">
                                                    <div class="col-md-12 mb-3">
                                                        <label for="validationCustom01">ชื่อธนาคาร<span class="text-danger">*</span></label>
                                                        <input class="form-control" v-model="bank_name" id="area_name" type="text" placeholder="ชื่อธนาคาร" required="">
                                                        <div class="invalid-feedback">โปรดกรอกชื่อธนาคาร</div>
                                                    </div>
                                                </div>


                                                <div class="form-row">
                                                    <div class=" col-md-12 mb-3">
                                                        <img v-if="this.preImg != ''" style="width: 100%;height:16rem;" v-bind:src="preImg" accept="image/*" alt="" srcset="">
                                                        <img v-else style="width: 100%;height:16rem;" @click="showIMG(bank_img)" v-bind:src="'./images/bank/'+bank_img" accept="image/*" alt="" srcset="">
                                                    </div>
                                                </div>


                                                <div class="form-row">
                                                    <div class="col-md-12 mb-3">
                                                        <label for="validationCustom01">รูปภาพ<span class="text-danger">*</span></label>
                                                        <input type="file" class="form-control" @change="selectImgB" name="" id="">
                                                    </div>
                                                </div>

                                        </div>

                                        <div class="d-flex justify-content-end mb-3 align-items-center">
                                            <button class="btn btn-danger mx-2" data-dismiss="modal" type="button">ยกเลิก</button>
                                            <button @click="EditBank" class="btn btn-warning mx-2" type="button">แก้ไข</button>
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


<script>
    let form = new Vue({
        el: "#bank",
        data: {
            Bank: [],
            bank_id: "",
            bank_name: "",
            bank_img: "",
            preImg: "",
        },
        methods: {
            EditBank() {
                if (this.bank_name != "" && this.bank_img != "") {
                    let formData = new FormData();
                    formData.append("action", "editBank");
                    formData.append("bank_name", this.bank_name);
                    formData.append("bank_img", this.bank_img);
                    formData.append("bank_id", this.bank_id);
                    axios.post('./apis/api_editBank.php', formData, {
                            headers: {
                                "Content-Type": "multipart/form-data",
                            },
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
                        })
                }
            },
            showIMG(img) {
                window.open('./images/bank/' + img);
            },
            AddBank() {
                if (this.bank_name != "" && this.bank_img != "") {
                    let formData = new FormData();
                    formData.append("action", "addBank");
                    formData.append("bank_name", this.bank_name);
                    formData.append("bank_img", this.bank_img);
                    axios.post('./apis/api_addBank.php', formData, {
                            headers: {
                                "Content-Type": "multipart/form-data",
                            },
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
                        })
                }
            },
            selectImgB(e) {
                this.bank_img = e.target.files[0];
                this.preImg = "";
                this.preImg = URL.createObjectURL(e.target.files[0]);
            },
            setBankInfo(val) {
                this.bank_id = val.bank_id;
                this.bank_name = val.bank_name;
                this.bank_img = val.bank_img;
            },
            delBank(id) {
                Swal.fire({
                    icon: "info",
                    title: 'คุณต้องการลบธนาคารนี้?',
                    showCancelButton: true,
                    confirmButtonText: 'ใช่',
                    cancelButtonText: "ไม่",
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        axios
                            .post("./apis/api_delBank.php", {
                                headers: {
                                    "Content-Type": "application/json",
                                },
                                action: "delBank",
                                bank_id: id,
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


            getBank() {
                ///ดึงข้อมูลจากฐานข้อมูลมาแสดง
                axios.get("./apis/api_getBank.php")
                    .then((res) => {
                        let {
                            status,
                            bank
                        } = res.data;
                        if (status) {
                            if (status) {
                                this.Bank.push(...bank);
                                $(document).ready(function() {
                                    $('#advance-1').DataTable();
                                });

                            }

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
            this.getBank();
        }
    });
</script>