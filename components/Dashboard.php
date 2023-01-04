<!-- Container-fluid starts-->
<div class="container-fluid" id="user">
    <div class="row" v-if="user_prefix != ''">

        <div class="col-md-12 d-flex justify-content-center  align-items-center xl-100 box-col-12 my-3">
            <h1>บริษัท : {{market_name}}</h1>
        </div>
        <div v-if="user_img != ''" class="col-md-12 xl-100 box-col-12  p-3 bg-white d-flex justify-content-center align-items-center " style="border-radius: 15px;flex-direction:column">
            <div class="owl-carousel owl-theme" id="owl-5">
                <div class="item" v-for="(val,idx) in this.user_img.length">
                    <img style="height: 20.5rem;" v-bind:src="'./images/banner/'+user_img[idx]" alt="">
                </div>
            </div>
        </div>


        <div class="col-md-12 d-flex justify-content-center  align-items-center xl-100 box-col-12 my-3 bg-white p-4 " style=" border-radius:15px">
            <p class="h6">{{market_detail}}</p>
        </div>




        <div class="row col-md-12 xl-100 box-col-12 mt-5 ">
            <div class="col-md-6 col-xl-3 box-col-6" v-for="(val,idx) in this.detail_market">
                <div class="card">
                    <div class="blog-box blog-grid text-center">
                        <img class="img-fluid top-radius-blog" v-bind:src="'./images/dm/'+val.dm_img" alt="">
                        <div class="blog-details-main my-3">
                            <h5>ตลาด : {{val.dm_name}}</h5>
                            <h6 class="blog-bottom-details">{{val.dm_description}}</h6>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="col-md-12 xl-100 box-col-12 mt-3 ">
            <div class="d-flex justify-content-around">
                <div>
                    <div class="row">

                        <div class="col-md-7 p-3">
                            <div class=" p-3 ">

                                <div class="profile-img-style bg-white " style="border-radius: 15px;">
                                    <div class="row p-3">
                                        <div class="col-sm-3 d-flex justify-content-center align-content-center align-item-center" style="flex-direction: column;">
                                            <img v-if="user_profie == '' " width="200" style="height: 12rem;" class=" rounded-circle" alt="" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/1200px-Default_pfp.svg.png">
                                            <img v-else-if="pre_img != ''" @click="showImgs" width="200" style="height: 12rem;" style="object-fit:cover;" class=" rounded-circle" alt="" v-bind:src="pre_img">
                                            <img v-else style="width: 100%;height:12rem;" style="object-fit:cover" alt="" v-bind:src="'./images/info/'+user_profie">
                                        </div>
                                        <div class="col-sm-8 mt-2">
                                            <h6>{{(user_prefix == 1) ? 'นาย ' + user_fname + " " + user_lname : (user_prefix == 2) ? 'นาง ' +user_fname + " " + user_lname : 'นางสาว ' + user_fname + " " + user_lname   }}</h6>
                                            <h6>เบอร์โทรศัพท์ : {{user_tel}} </h6>
                                            <p>ทีอยู่ : {{user_address}} รหัสไปรษณีย์ : {{user_zipcode}} </p>
                                            <hr>
                                            <h5>รายละเอียด</h5>
                                            <p>{{user_description}}</p>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 xl-50">
                            <div class="card gradient-primary o-hidden">
                                <div class="card-body">
                                    <div class="setting-dot">
                                        <div class="setting-bg-primary date-picker-setting position-set pull-right"><i class="fa fa-spin fa-cog"></i></div>
                                    </div>
                                    <div class="default-datepicker">
                                        <div class="datepicker-here" data-language="en"></div>
                                    </div><span class="default-dots-stay overview-dots full-width-dots"><span class="dots-group"><span class="dots dots1"></span><span class="dots dots2 dot-small"></span><span class="dots dots3 dot-small"></span><span class="dots dots4 dot-medium"></span><span class="dots dots5 dot-small"></span><span class="dots dots6 dot-small"></span><span class="dots dots7 dot-small-semi"></span><span class="dots dots8 dot-small-semi"></span><span class="dots dots9 dot-small"> </span></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12 xl-100 box-col-12 mt-3 bg-white my-2 mb-5 pt-3 pb-4 px-3" style="border-radius: 15px;">
            <h4 style="font-weight: bold;">สามารถติดต่อ</h4>
            <div class="row">
                <div class="col-md-6">
                    <span class="row">
                        <i class="fa fa-phone-square mx-2 text-success" style="font-size: 2rem;"></i>
                        <h5>{{market_tel}}</h5>
                    </span>
                </div>
                <div class="col-md-6">
                    <span class="row">
                        <i class="fa fa-paper-plane-o mx-2 text-warning" style="font-size: 2rem;"></i>
                        <h5>{{market_email}}</h5>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div v-else>
        <h1>เพิ่มในหน้าแก้ไขหน้าหลัก</h1>
    </div>
</div>
</div>

<script>
    let form = new Vue({
        el: "#user",
        data: {
            detail_market: [],
            Market: [],
            market_name: "",
            market_detail: "",
            market_email: "",
            market_tel: "",
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
            setIMG(e) {
                this.user_img.push(e.target.files);
            },
            addImg() {
                if (this.user_img.length != 0) {
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
                            this.market_email = user.banner_email;
                            this.market_tel = user.banner_TelCon;
                            this.market_detail = user.banner_detail;
                            this.market_name = user.banner_title;
                            if (user.banner_img != "") {
                                this.user_img = [...user.banner_img.split(",")];
                            }
                            $(document).ready(function() {
                                $('#owl-5').owlCarousel({
                                    margin: 10,
                                    loop: false,
                                    autoplay: true,

                                    nav: true,
                                    responsiveClass: true,
                                    responsive: {
                                        0: {
                                            items: 1,
                                            nav: true
                                        },
                                        600: {
                                            items: 3,
                                            nav: false
                                        },
                                        1000: {
                                            items: 1,
                                            nav: true,
                                            loop: false
                                        }
                                    }
                                })
                            });
                        }
                    })
            },
            getMarket() {
                ///ดึงข้อมูลจากฐานข้อมูลมาแสดง
                axios.get("./apis/api_getMarket.php")
                    .then((res) => {
                        let {
                            status,
                            market
                        } = res.data;
                        if (status) {
                            if (status) {
                                this.Market.push(...market);
                                $(document).ready(function() {
                                    $('#advance-1').DataTable();
                                });

                            }
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
            this.getMarket();
            this.getDetailMarket()
        }
    });
</script>