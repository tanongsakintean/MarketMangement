<!-- Container-fluid starts-->
<div class="container-fluid" id="dashboard">
    <div class="row">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-md-12  xl-100 box-col-12  p-3 bg-white d-flex justify-content-center align-items-center " style="border-radius: 15px;flex-direction:column">
                    <div v-if="user_img != ''" class="owl-carousel owl-theme" id="owl-5">

                        <div class="item" v-for="(val,idx) in this.user_img.length">
                            <img style="height: 20.5rem;" v-bind:src="'./images/banner/'+user_img[idx]" alt="">
                        </div>

                    </div>
                </div>

                <div class="col-md-12 my-3  xl-100 box-col-12  p-3 bg-white d-flex justify-content-center align-items-center " style="border-radius: 15px;flex-direction:column">
                    <div>
                        <input type="file" @change="setIMG" ref="uploadfiles" name="" class="form-control" multiple id="">
                    </div>
                    <div class="my-3">
                        <button @click="addImg" class="btn btn-primary ">เพิ่มรูปภาพ</button>
                    </div>
                </div>

                <div class="col-md-12 row  xl-100 box-col-12  p-3 bg-white  " style="border-radius: 15px;flex-direction:column">
                    <div class="d-flex justify-content-center align-items-center">
                        <h4 style="font-weight: bold;">เพิ่มข้อมูลบริษัท</h4>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4 col-sm-4"> <label class="form-label">ชื่อบริษัท</label>
                            <input v-model="market_name" style="border-radius: 15px;" class="form-control" type="text" placeholder="ชื่อตลาด">
                        </div>

                        <div class="form-group col-md-4 col-sm-4">
                            <label class="form-label">เบอร์โทรศัพท์</label>
                            <input v-model="market_tel" style="border-radius: 15px;" class="form-control" type="text" placeholder="เบอร์โทรศัพท์">
                        </div>

                        <div class="form-group col-md-4 col-sm-4">
                            <label class="form-label">อีเมลล์</label>
                            <input v-model="market_email" class="form-control" style="border-radius: 15px;" type="email" placeholder="อีเมลล์">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">รายละเอียดบริษัท</label>
                        <textarea class="form-control" type="text" rows="6" style="border-radius: 15px;" v-model="market_detail" placeholder="รายละเอียดตลาด"></textarea>
                    </div>


                    <div class="d-flex justify-content-center align-items-center ">
                        <div>
                            <button @click="addMarket" class="btn btn-primary">
                                เพิ่มข้อมูลบริษัท
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class=" col-lg-6">
            <form class="card theme-form">
                <div class="card-header">
                    <h4 class="card-title mb-0">เพิ่มประวัติเจ้าของที่</h4>
                    <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="d-flex">
                                    <img v-if="user_profie == '' " width="100" height="100" class=" rounded-circle" alt="" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/1200px-Default_pfp.svg.png">
                                    <img v-else-if="pre_img != ''" @click="showImgs" width="100" height="100" style="object-fit:cover" class=" rounded-circle" alt="" v-bind:src="pre_img">
                                    <img v-else width="100" height="100" style="object-fit:cover" class=" rounded-circle" alt="" v-bind:src="'./images/info/'+user_profie">
                                    <div class="d-flex justify-content-center align-items-center ml-4">
                                        <input accept="image/*" @change="selectImg" type="file" name="" class="form-control" id="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">คำนำหน้า</label>
                                <select v-model="user_prefix" class="form-control btn-square">
                                    <option value="0">--คำนำหน้า--</option>
                                    <option value="1">นาย</option>
                                    <option value="2">นาง</option>
                                    <option value="3">นางสาว</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label class="form-label">ชื่อจริง</label>
                                <input v-model="user_fname" class="form-control" type="text" placeholder="ชื่อจริง">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
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

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">รายละเอียด</label>
                                <textarea class="form-control" rows="8" type="text" v-model="user_description" placeholder="รายละเอียด"></textarea>
                            </div>
                        </div>


                        <div class="col-md-12 text-right">
                            <button type="button" @click="addInfo" class="btn btn-primary btn-pill">เพิ่มประวัติเจ้าของที่</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-lg-12 bg-white p-3 " style="border-radius: 15px;">
            <h3 class="px-3 pt-3">ข้อมูลตลาด</h3>
            <div class="table-responsive p-2">
                <div class="p-3">
                    <button class="btn btn-primary" @click="addDm" data-toggle="modal" data-target=".detailMarket" type="button">เพิ่มข้อมูลตลาด</button>
                </div>
                <table class="display order" id="advance-1">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>รูปภาพ</th>
                            <th>ชื่อตลาด</th>
                            <th>รายละเอียดตลาด</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(val,idx) in this.detail_market">
                            <td>{{idx + 1}}</td>
                            <td><img v-bind:src="'./images/dm/'+val.dm_img" @click="showIMG(val.dm_img)" width="100" height="100" alt="" srcset=""></td>
                            <td>{{val.dm_name}}</td>
                            <td>{{val.dm_description}}</td>
                            <td>
                                <div class="d-flex ">
                                    <div><button @click="setInfoDM(val)" data-toggle="modal" data-target=".infoDM" type="button" class="bg-info mx-2"><i class="fa fa-eye"></i></button></div>
                                    <div><button @click="setInfoDM(val)" data-toggle="modal" data-target=".editDM" type="button" class="bg-warning mx-2"><i class="fa fa-pencil"></i></button></div>
                                    <div><button @click="delDM(val.dm_id)" type="button" class="bg-danger mx-2"><i class="fa fa-trash-o"></i></button></div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!--  info modal--->
    <div class="modal fade infoDM" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">ข้อมูลตลาด</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form id="form" novalidate="">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">ชื่อตลาด<span class="text-danger">*</span></label>
                                <input style=" background-color:white" disabled class="form-control" v-model="dm_name" id="area_name" type="text" placeholder="ชื่อแผงลอย" required="">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">รายละเอียด<span class="text-danger">*</span></label>
                                <textarea disabled style=" background-color:white" class="form-control" v-model="dm_description" id="area_description" type="text" placeholder="รายละเอียด" required=""></textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <img @click="showIMG(dm_img)" style=" width: 100%;height:14rem;" v-bind:src="'./images/dm/'+dm_img" accept="image/*" alt="" srcset="">
                            </div>
                        </div>

                </div>


                </form>
            </div>

        </div>
    </div>


    <!--  edit modal--->
    <div class="modal fade editDM" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">แก้ไขข้อมูลตลาด</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form id="form" novalidate="">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">ชื่อตลาด<span class="text-danger">*</span></label>
                                <input class="form-control" v-model="dm_name" id="area_name" type="text" placeholder="ชื่อตลาด" required="">
                                <div class="invalid-feedback">โปรดกรอกชื่อตลาด</div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">รายละเอียด<span class="text-danger">*</span></label>
                                <textarea class="form-control" v-model="dm_description" id="area_description" type="text" placeholder="รายละเอียด" required=""></textarea>
                                <div class="invalid-feedback">โปรดกรอกรายละเอียด</div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <img v-if="this.preDmImg != ''" style=" width: 100%;height:14rem;" v-bind:src="preDmImg" accept="image/*" alt="" srcset="">
                                <img v-else @click="showIMG(dm_img)" style=" width: 100%;height:14rem;" v-bind:src="'./images/dm/'+dm_img" accept="image/*" alt="" srcset="">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">รูปภาพ<span class="text-danger">*</span></label>
                                <input type="file" class="form-control" @change="selectImgS" name="" id="">
                            </div>
                        </div>
                </div>

                <div class="d-flex justify-content-end mb-3 align-items-center">
                    <button class="btn btn-danger mx-2" data-dismiss="modal" type="button">ยกเลิก</button>
                    <button @click="EditDetailMarket" class="btn btn-warning mx-2" type="button">แก้ไข</button>
                </div>
                </form>
            </div>

        </div>
    </div>

    <!-- add modal--->
    <div class="modal fade detailMarket" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">เพิ่มข้อมูลตลาด</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form id="form" novalidate="">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">ชื่อตลาด<span class="text-danger">*</span></label>
                                <input class="form-control" v-model="dm_name" id="area_name" type="text" placeholder="ชื่อแผงลอย" required="">
                                <div class="invalid-feedback">โปรดกรอกชื่อแผงลอย</div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">รายละเอียด<span class="text-danger">*</span></label>
                                <textarea class="form-control" v-model="dm_description" id="area_description" type="text" placeholder="รายละเอียด" required=""></textarea>
                                <div class="invalid-feedback">โปรดกรอกรายละเอียด</div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">รูปภาพ<span class="text-danger">*</span></label>
                                <input type="file" class="form-control" @change="selectImgS" name="" id="">
                            </div>
                        </div>


                        <div class="form-row" v-if="this.preDmImg != ''">
                            <div class="col-md-12 mb-3">
                                <img style="width: 100%;height:14rem;" v-bind:src="preDmImg" accept="image/*" alt="" srcset="">
                            </div>
                        </div>

                </div>

                <div class="d-flex justify-content-end mb-3 align-items-center">
                    <button class="btn btn-danger mx-2" data-dismiss="modal" type="button">ยกเลิก</button>
                    <button @click="AddDetailMarket" class="btn btn-primary mx-2" type="button">เพิ่มข้อมูลตลาด</button>
                </div>
                </form>
            </div>

        </div>
    </div>
</div>



</div>
<!-- Container-fluid Ends-->
<!-- <div class="welcome-popup modal fade" id="loadModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <div class="modal-body">
                  <div class="modal-header"></div>
                  <div class="contain p-30">
                    <div class="text-center">
                      <h3>Welcome to creative admin</h3>
                      <p>start your project with developer friendly admin </p>
                      <button class="btn btn-primary btn-lg txt-white" type="button" data-dismiss="modal" aria-label="Close">Get Started</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> -->

<script>
    let form = new Vue({
        el: "#dashboard",
        data: {
            dm_id: "",
            preDmImg: "",
            dm_name: "",
            dm_description: "",
            dm_img: "",
            detail_market: [],
            market_name: "",
            market_email: "",
            market_tel: "",
            market_detail: "",
            pre_img: "",
            showImg: "",
            user_fname: "",
            user_lname: "",
            user_tel: "",
            user_address: "",
            user_zipcode: "",
            user_prefix: "",
            user_description: "",
            user_profie: "",
            user_img: [],
        },
        methods: {
            delDM(id) {
                Swal.fire({
                    icon: "info",
                    title: 'คุณต้องการลบข้อมูลตลาดนี้?',
                    showCancelButton: true,
                    confirmButtonText: 'ใช่',
                    cancelButtonText: "ไม่",
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        axios
                            .post("./apis/api_delDM.php", {
                                headers: {
                                    "Content-Type": "application/json",
                                },
                                action: "delDM",
                                dm_id: id,
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
                                    }).then(() => {
                                        window.location.reload()
                                    });
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
            EditDetailMarket() {
                if (this.dm_name != "" && this.dm_description != "" && this.dm_img != "" && this.dm_id != "") {
                    let formData = new FormData();
                    formData.append("action", "EditDm");
                    formData.append("dm_name", this.dm_name);
                    formData.append("dm_description", this.dm_description);
                    formData.append("dm_id", this.dm_id);
                    formData.append("dm_img", this.dm_img);
                    axios.post("./apis/api_editDM.php", formData, {
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
                                }).then(() => {
                                    window.location.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: "เกิดข้อผิดพลาด",
                                    text: meg,
                                    icon: "error",
                                });
                            }
                        })
                } else {
                    Swal.fire({
                        title: "เกิดข้อผิดพลาด",
                        text: "โปรดกรอกข้อมูลให้ครบถ้วน!",
                        icon: "error",
                    });
                }
            },
            setInfoDM(val) {
                this.dm_name = val.dm_name;
                this.dm_description = val.dm_description;
                this.dm_img = val.dm_img;
                this.dm_id = val.dm_id;
            },
            showIMG(img) {
                window.open('./images/dm/' + img);
            },
            addDm() {
                this.dm_description = "";
                this.dm_img = "";
                this.dm_name = "";
            },
            selectImgS(e) {
                this.dm_img = e.target.files[0];
                this.preDmImg = "";
                this.preDmImg = URL.createObjectURL(e.target.files[0]);
            },
            AddDetailMarket() {
                if (this.dm_name != "" && this.dm_description != "" && this.dm_img != "") {
                    let formData = new FormData();
                    formData.append("action", "addDm");
                    formData.append("dm_name", this.dm_name);
                    formData.append("dm_description", this.dm_description);
                    formData.append("dm_img", this.dm_img);
                    axios.post("./apis/api_addDM.php", formData, {
                        headers: {
                            "Content-Type": "multipart/form-data",
                        },
                    }).then((res) => {
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
                            }).then(() => {
                                window.location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: "เกิดข้อผิดพลาด",
                                text: meg,
                                icon: "error",
                            });
                        }
                    })
                } else {
                    Swal.fire({
                        title: "เกิดข้อผิดพลาด",
                        text: "โปรดกรอกข้อมูลให้ครบถ้วน!",
                        icon: "error",
                    });
                }
            },
            addMarket() {
                if (this.market_detail != "" && this.market_tel != "" && this.market_email != "" && this.market_name != "") {
                    axios.post("./apis/api_addDetailMarket.php", {
                            headers: {
                                "Content-Type": "application/json",
                            },
                            action: "AddDetailMarket",
                            market_detail: this.market_detail,
                            market_email: this.market_email,
                            market_tel: this.market_tel,
                            market_name: this.market_name
                        })
                        .then((res) => {
                            if (res.data.status) {
                                Swal.fire({
                                    title: "สำเร็จ",
                                    text: res.data.meg,
                                    icon: "success",
                                    timer: 1500,
                                    showConfirmButton: false,
                                }).then(() => {
                                    window.location.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: "เกิดข้อผิดพลาด",
                                    text: res.data.meg,
                                    icon: "error",
                                });
                            }
                        })
                }
            },
            setIMG(e) {
                this.user_img.push(e.target.files);
            },
            addImg() {
                if (this.user_img.length != 1) {
                    let formData = new FormData();
                    formData.append('action', "addImgBanner");

                    var files = this.$refs.uploadfiles.files;
                    var totalfiles = this.$refs.uploadfiles.files.length;
                    for (var index = 0; index < totalfiles; index++) {
                        formData.append("banner_img[]", files[index]);
                    }

                    axios.post("./apis/api_addBanner.php", formData, {
                            headers: {
                                "Content-Type": "multipart/form-data",
                            },
                        })

                        .then((res) => {
                            if (res.data.status) {
                                Swal.fire({
                                    title: "สำเร็จ",
                                    text: res.data.meg,
                                    icon: "success",
                                    timer: 1500,
                                    showConfirmButton: false,
                                }).then(() => {
                                    window.location.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: "เกิดข้อผิดพลาด",
                                    text: res.data.meg,
                                    icon: "error",
                                });
                            }

                        })
                }
            },
            showImgs() {
                window.open(this.pre_img);
            },
            selectImg(e) {
                this.user_profie = e.target.files[0];
                this.pre_img = "";
                this.pre_img = URL.createObjectURL(e.target.files[0]);
            },
            addInfo() {
                if (this.user_profie != "" && this.user_address != "" && this.user_fname != "" && this.user_lname != "" && this.user_prefix != "" && this.user_tel != "" && this.user_zipcode != "") {
                    let formDatas = new FormData();
                    formDatas.append("user_profile", this.user_profie);
                    formDatas.append("user_prefix", this.user_prefix);
                    formDatas.append("user_fname", this.user_fname);
                    formDatas.append("user_lname", this.user_lname);
                    formDatas.append("user_tel", this.user_tel);
                    formDatas.append("user_zipcode", this.user_zipcode);
                    formDatas.append("user_address", this.user_address);
                    formDatas.append("user_description", this.user_description);
                    formDatas.append("action", "info");
                    axios.post("./apis/api_addInfo.php", formDatas, {
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
                                }).then(() => {
                                    window.location.reload();
                                });
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
            getInfo() {
                ///ดึงข้อมูลจากฐานข้อมูลมาแสดง
                axios.get("./apis/api_getInfo.php")
                    .then((res) => {
                        let {
                            status,
                            user
                        } = res.data;
                        if (status) {
                            this.user_fname = user.banner_fname;
                            this.user_lname = user.banner_lname;
                            this.user_tel = user.banner_tel;
                            this.user_address = user.banner_address;
                            this.user_zipcode = user.banner_zipcode;
                            this.user_prefix = user.banner_prefix;
                            this.user_description = user.banner_descrption;
                            this.user_profie = user.banner_profile;
                            this.user_img = [...user.banner_img.split(",")];

                            this.market_email = user.banner_email;
                            this.market_tel = user.banner_TelCon;
                            this.market_detail = user.banner_detail;
                            this.market_name = user.banner_title;
                            $(document).ready(function() {
                                $('#owl-5').owlCarousel({
                                    margin: 10,
                                    loop: true,
                                    autoWidth: true,
                                    items: 5,
                                    nav: false
                                })
                            });
                        }
                    })
            },
            getDetailMarket() {
                axios.get("./apis/api_getDetailMarket.php")
                    .then((res) => {
                        let {
                            status,
                            market
                        } = res.data;

                        if (status) {
                            this.detail_market = [...market]
                            $(document).ready(() => {
                                $("#advance-1").dataTable();
                            })
                        }
                    })
            }
        },
        created() {
            this.getInfo();
            this.getDetailMarket()
        }
    });
</script>