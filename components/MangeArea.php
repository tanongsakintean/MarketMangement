<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6 main-header">
                <h2>จัดการ<span>แผงลอย </span></h2>
            </div>
            <div class="col-lg-6 breadcrumb-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php"><i class="pe-7s-home"></i></a></li>
                    <li class="breadcrumb-item active">จัดการแผงลอย</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Container-fluid starts-->
<div class="container-fluid" id="area" style="background-color: white;border-radius:15px;margin-bottom:20px">
    <div class="d-flex  align-items-center pt-5   " style="justify-content: space-between;">

        <div class="form-group">
            <label for="validationCustom03">ตลาด<span class="text-danger">*</span></label>
            <select class="custom-select" v-model="MarketSelect" @change="getArea(MarketSelect)" required="">
                <option value="">เลือกตลาด</option>
                <option v-for="(item , idx) in market" :value="item">{{item.market_name}}</option>
            </select>
            <div class="my-3 mx-2 ">
                <p>ที่อยู่ : {{MarketSelect.market_address}}</p>
            </div>
        </div>
    </div>
    <div class="d-flex  align-items-center  " style="justify-content: space-between;">
        <div class="d-flex m-2">

            <div class="d-flex  align-items-center  mx-3">
                <div class=" bg-success " style="height: 40px;width:50px"></div> <label for="" class="ml-4">ไม่มีผู้เช่า/ว่าง</label>
            </div>

            <div class="d-flex  align-items-center mx-3">
                <div class=" bg-warning " style="height: 40px;width:50px"></div> <label for="" class="ml-4">รอตรวจสอบการชำระเงิน</label>
            </div>

            <div class="d-flex  align-items-center mx-3">
                <div class=" bg-info " style="height: 40px;width:50px"></div> <label for="" class="ml-4">ชำระเงินเรียบร้อยแล้ว</label>
            </div>


            <div class="d-flex  align-items-center mx-3">
                <div class=" bg-danger " style="height: 40px;width:50px"></div> <label for="" class="ml-4">ปิดปรับปรุง</label>
            </div>


            <div class="d-flex  align-items-center mx-3">
                <div class=" bg-light " style="height: 40px;width:50px"></div> <label for="" class="ml-4">ยังไม่เปิดใช้งาน</label>
            </div>

        </div>
        <div class="d-flex">

            <div class="mr-4">
                <button @click="InCreRow" class="btn btn-primary d-flex  align-items-center"><i data-feather="plus"></i> <span> เพิ่มแถว</span></button>
            </div>

            <div class="ml-4">
                <button @click="DelRow" class="btn btn-danger d-flex  align-items-center"><i data-feather="trash-2"></i><span> ลบแถว</span></button>
            </div>

        </div>
    </div>
    <div>

        <div v-for="(item, index) in row">
            <div class="mt-5">
                <p>แถวที่ <b>{{index + 1}}</b></p>
            </div>
            <div class="row ">
                <div v-for="(item,idx) in col" class="col-md mt-3 dropup-basic mb-3 d-flex  justify-content-center align-items-center">
                    <div class="dropup">

                        <button style="width: 110px;" v-if="areaData.filter((v) => {
                            return v.area_col == (idx + 1) && v.area_row == (index + 1) && v.area_status == 1
                        }).length != 0  " class="btn btn-lg dropbtn  btn-success">{{ areaData.filter((v) => {
                            return v.area_col == (idx + 1) && v.area_row == (index + 1)
                        })[0].area_name}}</button>


                        <button style="width: 110px;" v-else-if="areaData.filter((v) => {
                            return v.area_col == (idx + 1) && v.area_row == (index + 1) && v.area_status == 2
                        }).length != 0  " class="btn btn-lg dropbtn  btn-warning">{{ areaData.filter((v) => {
                            return v.area_col == (idx + 1) && v.area_row == (index + 1)
                        })[0].area_name}}</button>


                        <button style="width: 110px;" v-else-if="areaData.filter((v) => {
                            return v.area_col == (idx + 1) && v.area_row == (index + 1) && v.area_status == 3
                        }).length != 0  " class="btn btn-lg dropbtn  btn-info">{{ areaData.filter((v) => {
                            return v.area_col == (idx + 1) && v.area_row == (index + 1)
                        })[0].area_name}}</button>


                        <button style="width: 110px;" v-else-if="areaData.filter((v) => {
                            return v.area_col == (idx + 1) && v.area_row == (index + 1) && v.area_status == 4
                        }).length != 0  " class="btn btn-lg dropbtn  btn-danger">{{ areaData.filter((v) => {
                            return v.area_col == (idx + 1) && v.area_row == (index + 1)
                        })[0].area_name}}</button>

                        <button style="width: 110px;" v-else class="btn btn-lg dropbtn btn-light text-dark">{{idx + 1}}</button>

                        <div class="dropup-content">
                            <a v-if="areaData.filter((v) => {
                            return v.area_col == (idx + 1) && v.area_row == (index + 1)
                        }).length == 0 " href="#" @click="setColRow((idx+1),(index+1))" data-toggle="modal" data-target=".addArea" type="button" class=" text-success font-weight-bold "><i class="fa fa-plus"></i> <span>เพิ่ม</span> </a>

                            <a v-if="areaData.filter((v) => {
                            return v.area_col == (idx + 1) && v.area_row == (index + 1) && ( v.area_status == 1 || v.area_status == 4 )
                        }).length != 0  " href="#" class="text-warning font-weight-bold" @click="setAreaEdit((idx + 1),(index + 1))" data-toggle="modal" data-target=".editArea" type="button"><i class="fa fa-edit"></i> <span>แก้ไข</span></a>

                            <a v-if="areaData.filter((v) => {
                            return v.area_col == (idx + 1) && v.area_row == (index + 1) && ( v.area_status == 1 || v.area_status == 4 )
                        }).length != 0  " href="#" class="text-danger font-weight-bold" @click="delArea((idx + 1),(index + 1))"><i class="fa fa-trash-o"></i> <span>ลบ</span></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>


    <!-- edit modal--->
    <div class="modal fade editArea" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">แก้ไขแผงลอย</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form class="validation-Area" id="form" novalidate="">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">ชื่อแผงลอย<span class="text-danger">*</span></label>
                                <input class="form-control" v-model="area.area_name" id="area_name" type="text" placeholder="ชื่อแผงลอย" required="">
                                <div class="invalid-feedback">โปรดกรอกชื่อแผงลอย</div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">รายละเอียด<span class="text-danger">*</span></label>
                                <textarea class="form-control" v-model="area.area_description" id="area_description" type="text" placeholder="รายละเอียด" required=""></textarea>
                                <div class="invalid-feedback">โปรดกรอกรายละเอียด</div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">ความกว้าง<span class="text-danger">*</span></label><label for=""> หน่วย(เมตร)</label>
                                <input class="form-control" v-model="area.area_width" id="area_width" type="number" placeholder="ความกว้าง" required="">
                                <div class="invalid-feedback">โปรดกรอกความกว้าง</div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">ความยาว<span class="text-danger">*</span></label><label for=""> หน่วย(เมตร)</label>
                                <input class="form-control" v-model="area.area_length" id="area_length" type="number" placeholder="ความยาว" required="">
                                <div class="invalid-feedback">โปรดกรอกความยาว</div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">ราคารายวัน<span class="text-danger">*</span></label><label for=""> หน่วย(บาท)</label>
                                <input class="form-control" v-model="area.area_DayPrice" id="area_price" type="number" placeholder="ราคา" required="">
                                <div class="invalid-feedback">โปรดกรอกราคารายวัน</div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">ราคารายเดือน<span class="text-danger">*</span></label><label for=""> หน่วย(บาท)</label>
                                <input class="form-control" v-model="area.area_MonthPrice" id="area_price" type="number" placeholder="ราคา" required="">
                                <div class="invalid-feedback">โปรดกรอกราคารายเดือน</div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom03">สถานะ<span class="text-danger">*</span></label>
                                <select class="custom-select" v-model="area.area_status" required="">
                                    <option value="">เลือกสถานะ</option>
                                    <option value="1">ว่าง</option>
                                    <!-- <option value="2">รอการชำระเงิน</option>
                                    <option value="3">ชำระเงินเรียบร้อยแล้ว</option> -->
                                    <option value="4">ปิดปรับปรุง</option>
                                </select>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end align-items-center">
                            <button @click="EditArea" class="btn btn-warning" type="submit">แก้ไขแผงลอย</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- add modal--->
    <div class="modal fade addArea" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">เพิ่มแผงลอย</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form class="validation-Area" id="form" novalidate="">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">ชื่อแผงลอย<span class="text-danger">*</span></label>
                                <input class="form-control" v-model="area.area_name" id="area_name" type="text" placeholder="ชื่อแผงลอย" required="">
                                <div class="invalid-feedback">โปรดกรอกชื่อแผงลอย</div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">รายละเอียด<span class="text-danger">*</span></label>
                                <textarea class="form-control" v-model="area.area_description" id="area_description" type="text" placeholder="รายละเอียด" required=""></textarea>
                                <div class="invalid-feedback">โปรดกรอกรายละเอียด</div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">ความกว้าง<span class="text-danger">*</span></label><label for=""> หน่วย(เมตร)</label>
                                <input class="form-control" v-model="area.area_width" id="area_width" type="number" placeholder="ความกว้าง" required="">
                                <div class="invalid-feedback">โปรดกรอกความกว้าง</div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">ความยาว<span class="text-danger">*</span></label><label for=""> หน่วย(เมตร)</label>
                                <input class="form-control" v-model="area.area_length" id="area_length" type="number" placeholder="ความยาว" required="">
                                <div class="invalid-feedback">โปรดกรอกความยาว</div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">ราคารายวัน<span class="text-danger">*</span></label><label for=""> หน่วย(บาท)</label>
                                <input class="form-control" v-model="area.area_DayPrice" id="area_price" type="number" placeholder="ราคา" required="">
                                <div class="invalid-feedback">โปรดกรอกราคารายวัน</div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">ราคารายเดือน<span class="text-danger">*</span></label><label for=""> หน่วย(บาท)</label>
                                <input class="form-control" v-model="area.area_MonthPrice" id="area_price" type="number" placeholder="ราคา" required="">
                                <div class="invalid-feedback">โปรดกรอกราคารายเดือน</div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom03">สถานะ<span class="text-danger">*</span></label>
                                <select class="custom-select" v-model="area.area_status" required="">
                                    <option value="">เลือกสถานะ</option>
                                    <option value="1">ว่าง</option>
                                    <!-- <option value="2">รอการชำระเงิน</option>
                                    <option value="3">ชำระเงินเรียบร้อยแล้ว</option> -->
                                    <option value="4">ปิดปรับปรุง</option>
                                </select>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end align-items-center">
                            <button @click="AddArea" class="btn btn-primary" type="submit">เพิ่มแผงลอย</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
</div>

<script>
    let area = new Vue({
        el: "#area",
        data: {
            MarketSelect: "",
            market: [],
            areaData: [],
            area: {
                area_name: "",
                area_description: "",
                area_width: "",
                area_length: "",
                area_MonthPrice: "",
                area_DayPrice: "",
                area_row: "",
                area_col: "",
                area_id: "",
                area_status: "",
            },
            row: "",
            col: "",
        },
        methods: {

            getMarket() {
                axios.get("./apis/api_getMarket.php").then((res) => {
                    this.market.push(...res.data.market);
                })
            },
            delArea(col, row) {
                Swal.fire({
                    icon: "info",
                    title: 'คุณต้องการลบแผงลอยนี้?',
                    showCancelButton: true,
                    confirmButtonText: 'ใช่',
                    cancelButtonText: "ไม่",
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        axios
                            .post("./apis/api_delArea.php", {
                                headers: {
                                    "Content-Type": "application/json",
                                },
                                action: "delArea",
                                area_id: this.areaData.filter((v) => {
                                    return v.area_col == col && v.area_row == row
                                })[0].area_id,
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
                                        $(".close").click();
                                        window.localStorage.setItem("market", JSON.stringify(this.MarketSelect));
                                        this.getArea(JSON.parse(window.localStorage.getItem("market")));
                                        this.area.area_name = "";
                                        this.area.area_description = "";
                                        this.area.area_width = "";
                                        this.area.area_length = "";
                                        this.area.area_DayPrice = "";
                                        this.area.area_MonthPrice = "";
                                        this.area.area_row = "";
                                        this.area.area_col = "";
                                        this.area.area_id = "";
                                        this.area.area_status = "";
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
            EditArea() {
                if (this.area.area_name != "" && this.area.area_row != "" && this.area.area_description && this.area.area_length != "" && this.area.area_price != "" && this.area.area_width != "" && this.area.area_status != "") {
                    axios
                        .post("./apis/api_editArea.php", {
                            headers: {
                                "Content-Type": "application/json",
                            },
                            action: "editArea",
                            area_name: this.area.area_name,
                            area_description: this.area.area_description,
                            area_width: this.area.area_width,
                            area_length: this.area.area_length,
                            area_DayPrice: this.area.area_DayPrice,
                            area_MonthPrice: this.area.area_MonthPrice,
                            area_row: this.area.area_row,
                            area_col: this.area.area_col,
                            area_id: this.area.area_id,
                            area_status: this.area.area_status,
                            market_id: this.MarketSelect.market_id,
                        })
                        .then((res) => {
                            let {
                                status,
                                meg
                            } = res.data;
                            console.log(res.data)
                            if (status) {
                                Swal.fire({
                                    title: "สำเร็จ",
                                    text: meg,
                                    icon: "success",
                                    timer: 1500,
                                    showConfirmButton: false,
                                }).then(() => {
                                    $(".close").click();
                                    window.localStorage.setItem("market", JSON.stringify(this.MarketSelect));
                                    this.getArea(JSON.parse(window.localStorage.getItem("market")));
                                    this.area.area_name = "";
                                    this.area.area_description = "";
                                    this.area.area_width = "";
                                    this.area.area_length = "";
                                    this.area.area_DayPrice = "";
                                    this.area.area_MonthPrice = "";
                                    this.area.area_row = "";
                                    this.area.area_col = "";
                                    this.area.area_id = "";
                                    this.area.area_status = "";
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

            },
            setAreaEdit(col, row) {
                this.area.area_name = this.areaData.filter((v) => {
                    return v.area_col == col && v.area_row == row
                })[0].area_name;


                this.area.area_description = this.areaData.filter((v) => {
                    return v.area_col == col && v.area_row == row
                })[0].area_description;



                this.area.area_width = this.areaData.filter((v) => {
                    return v.area_col == col && v.area_row == row
                })[0].area_width;


                this.area.area_length = this.areaData.filter((v) => {
                    return v.area_col == col && v.area_row == row
                })[0].area_length;


                this.area.area_DayPrice = this.areaData.filter((v) => {
                    return v.area_col == col && v.area_row == row
                })[0].area_DayPrice;


                this.area.area_MonthPrice = this.areaData.filter((v) => {
                    return v.area_col == col && v.area_row == row
                })[0].area_MonthPrice;


                this.area.area_row = this.areaData.filter((v) => {
                    return v.area_col == col && v.area_row == row
                })[0].area_row;

                this.area.area_col = this.areaData.filter((v) => {
                    return v.area_col == col && v.area_row == row
                })[0].area_col;


                this.area.area_id = this.areaData.filter((v) => {
                    return v.area_col == col && v.area_row == row
                })[0].area_id;


                this.area.area_status = this.areaData.filter((v) => {
                    return v.area_col == col && v.area_row == row
                })[0].area_status;

            },
            getArea(market) {
                this.row = "";
                this.col = "";
                this.areaData = [];
                row = "";
                col = "";
                if (market != "") {
                    axios.get("./apis/api_getMarket.php").then((res) => {
                        this.row = parseInt(res.data.market.filter((item) => {
                            return item.market_id == this.MarketSelect.market_id
                        })[0].market_row);
                        this.col = parseInt(res.data.market.filter((item) => {
                            return item.market_id == this.MarketSelect.market_id
                        })[0].market_block);
                        axios.post("./apis/api_getArea.php", {
                                headers: {
                                    "Content-Type": "application/json",
                                },
                                action: "getArea",
                                market_id: parseInt(market.market_id),
                            })
                            .then((res) => {
                                this.areaData.push(...res.data.area)
                                // console.log(this.areaData)
                            })
                    })
                }

            },
            setColRow(col, row) {
                this.area.area_col = col;
                this.area.area_row = row;
                this.area.area_name = "";
                this.area.area_description = "";
                this.area.area_length = "";
                this.area.area_DayPrice = "";
                this.area.area_MonthPrice = "";
                this.area.area_width = "";
                this.area.area_id = "";
            },
            AddArea() {
                if (this.area.area_name != "" && this.area.area_row != "" && this.area.area_description && this.area.area_length != "" && this.area.area_price != "" && this.area.area_width != "" && this.area.area_status != "") {
                    axios
                        .post("./apis/api_addArea.php", {
                            headers: {
                                "Content-Type": "application/json",
                            },
                            action: "addArea",
                            market_id: this.MarketSelect.market_id,
                            area_name: this.area.area_name,
                            area_description: this.area.area_description,
                            area_width: this.area.area_width,
                            area_length: this.area.area_length,
                            area_MonthPrice: this.area.area_MonthPrice,
                            area_DayPrice: this.area.area_DayPrice,
                            area_row: this.area.area_row,
                            area_col: this.area.area_col,
                            area_status: this.area.area_status,
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
                                    $(".close").click();
                                    window.localStorage.setItem("market", JSON.stringify(this.MarketSelect));
                                    this.getArea(JSON.parse(window.localStorage.getItem("market")));
                                    this.area.area_name = "";
                                    this.area.area_description = "";
                                    this.area.area_width = "";
                                    this.area.area_length = "";
                                    this.area.area_DayPrice = "";
                                    this.area.area_MonthPrice = "";
                                    this.area.area_row = "";
                                    this.area.area_col = "";
                                    this.area.area_id = "";
                                    this.area.area_status = "";
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

            },
            DelRow() {
                if (this.areaData.length != 0) {
                    ///check data on row length == 0 can delete
                    if (this.areaData.filter((item) => {
                            return item.area_row == this.row
                        }).length != 0) {
                        Swal.fire({
                            title: "เกิดข้อผิดพลาด",
                            text: "มีแผงลอยในแถวต้องทำการลบก่อน!",
                            icon: "error",
                        });
                    } else {
                        axios.post("./apis/api_delRow.php", {
                            headers: {
                                "Content-Type": "application/json",
                            },
                            action: "delRow",
                            market_id: this.MarketSelect.market_id,
                        }).then((res) => {
                            this.row -= 1;
                            if (!res.data) {
                                Swal.fire({
                                    title: "เกิดข้อผิดพลาด",
                                    text: "เกิดข้อผิดพลาดโปรดลองอีกครั้ง",
                                    icon: "error",
                                });
                            }
                        })
                    }
                }
            },
            InCreRow() {
                if (this.MarketSelect != "") {
                    axios.post("./apis/api_addRow.php", {
                        headers: {
                            "Content-Type": "application/json",
                        },
                        action: "addRow",
                        market_id: this.MarketSelect.market_id,

                    }).then((res) => {
                        this.row += 1;
                        if (!res.data) {
                            Swal.fire({
                                title: "เกิดข้อผิดพลาด",
                                text: "เกิดข้อผิดพลาดโปรดลองอีกครั้ง",
                                icon: "error",
                            });
                        }
                    })
                }
            },

        },
        updated() {},
        created() {
            this.getMarket();
        }
    });
</script>