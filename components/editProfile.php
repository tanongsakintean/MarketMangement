<div class="col-lg-12" id="user">
    <form class="card theme-form">
        <div class="card-header">
            <h4 class="card-title mb-0">แก้ไขผู้ใช้งาน</h4>
            <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="d-flex">
                            <img v-if="user_img == '' " width="100" height="100" class=" rounded-circle" alt="" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/1200px-Default_pfp.svg.png">
                            <img v-else-if="pre_img != ''" @click="showImg" width="100" height="100" style="object-fit:cover" class=" rounded-circle" alt="" v-bind:src="pre_img">
                            <img v-else width="100" height="100" style="object-fit:cover" class=" rounded-circle" alt="" v-bind:src="'./images/'+user_id+'/profile/'+user_img">
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
                <div class="col-md-12 text-right">
                    <button type="button" @click="editUser" class="btn btn-primary btn-pill">แก้ไขผู้ใช้งาน</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    let User = new Vue({
        el: "#user",
        data: {
            pre_img: "",
            user_img: "",
            user_id: "",
            usr_prefix: "",
            user_fname: "",
            user_lname: "",
            user_tel: "",
            user_zipcode: "",
            user_address: "",
        },
        methods: {
            showImg() {
                window.open(this.pre_img);
            },
            selectImg(e) {
                this.user_img = e.target.files[0];
                this.pre_img = "";
                this.pre_img = URL.createObjectURL(e.target.files[0]);
            },
            editUser() {
                if (this.user_id != "" && this.user_prefix != "" && this.user_fname != "" && this.user_lname && this.user_tel && this.user_zipcode && this.user_address != "") {
                    let formDatas = new FormData();
                    formDatas.append("user_img", this.user_img);
                    formDatas.append("user_id", this.user_id);
                    formDatas.append("user_prefix", this.user_prefix);
                    formDatas.append("user_fname", this.user_fname);
                    formDatas.append("user_lname", this.user_lname);
                    formDatas.append("user_tel", this.user_tel);
                    formDatas.append("user_zipcode", this.user_zipcode);
                    formDatas.append("user_address", this.user_address);
                    formDatas.append("action", "editUser");
                    axios.post("./apis/api_editUserProfile.php", formDatas, {
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
                                    window.location.replace("index.php?p=editProfile");
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
            getUser() {
                axios.get("./apis/api_getUserEdit.php")
                    .then((res) => {
                        let {
                            status,
                            user
                        } = res.data;
                        this.user_id = user.user_id;
                        this.user_prefix = user.user_prefix;
                        this.user_fname = user.user_fname;
                        this.user_lname = user.user_lname;
                        this.user_tel = user.user_tel;
                        this.user_zipcode = user.user_zipcode;
                        this.user_address = user.user_address;
                        this.user_img = user.user_img;
                    })
            }
        },
        created() {
            this.getUser();
        }
    });
</script>