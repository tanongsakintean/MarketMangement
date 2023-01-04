<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6 main-header">
                <h2>ข้อมูล<span>แผงลอย </span></h2>
            </div>
            <div class="col-lg-6 breadcrumb-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php"><i class="pe-7s-home"></i></a></li>
                    <li class="breadcrumb-item active">ข้อมูลแผงลอย</li>
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


        </div>
        <div class="d-flex">



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


                        <div class="dropup-content">
                            <a href="#" @click="setAreaEdit((idx + 1),(index + 1))" data-toggle="modal" data-target=".infoArea" type="button" class=" text-success font-weight-bold "><i class="fa fa-eye"></i> <span> รายละเอียดเพิ่มเติม</span> </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>


    <!-- info modal--->
    <div class="modal fade infoArea" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">รายละเอียดแผงลอย</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form class="validation-Area" id="form" novalidate="">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">ชื่อแผงลอย<span class="text-danger">*</span></label>
                                <input class="form-control" style="background-color:#ffffff ;" disabled v-model="area.area_name" id="area_name" type="text" placeholder="ชื่อแผงลอย" required="">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">รายละเอียด<span class="text-danger">*</span></label>
                                <textarea class="form-control" style="background-color:#ffffff ;" disabled v-model="area.area_description" id="area_description" type="text" placeholder="รายละเอียด" required=""></textarea>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">ความกว้าง<span class="text-danger">*</span></label><label for=""> หน่วย(เมตร)</label>
                                <input class="form-control" style="background-color:#ffffff ;" disabled v-model="area.area_width" id="area_width" type="number" placeholder="ความกว้าง" required="">
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">ความยาว<span class="text-danger">*</span></label><label for=""> หน่วย(เมตร)</label>
                                <input class="form-control" disabled v-model="area.area_length" style="background-color:#ffffff ;" id="area_length" type="number" placeholder="ความยาว" required="">
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">ราคารายวัน<span class="text-danger">*</span></label><label for=""> หน่วย(เมตร)</label>
                                <input class="form-control" disabled v-model="area.area_DayPrice" style="background-color:#ffffff ;" id="area_price" type="number" placeholder="ราคา" required="">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">ราคารายเดือน<span class="text-danger">*</span></label><label for=""> หน่วย(เมตร)</label>
                                <input class="form-control" disabled v-model="area.area_MonthPrice" id="area_price" style="background-color:#ffffff ;" type="number" placeholder="ราคา" required="">
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom03">สถานะ<span class="text-danger">*</span></label>
                                <h5 v-if="area.area_status == 1"><span class="badge bg-success">ไม่มีผู้เช่า/ว่าง</span></h5>
                                <h5 v-else-if="area.area_status == 2"><span class="badge bg-warning">รอตรวจสอบการชำระเงิน
                                    </span></h5>
                                <h5 v-else-if="area.area_status == 3"><span class="badge bg-info">ชำระเงินเรียบร้อยแล้ว</span></h5>
                                <h5 v-else><span class="badge bg-danger">
                                        ปิดปรับปรุง
                                    </span> </h5>
                                <!-- <select class="custom-select" disabled v-model="" style="background-color:#ffffff ;" required="">
                                    <option value="">เลือกสถานะ</option>
                                    <option value="1">ว่าง</option>
                                    <option value="2">รอการชำระเงิน</option>
                                    <option value="3">ชำระเงินเรียบร้อยแล้ว</option>
                                    <option value="4">ปิดปรับปรุง</option>
                                </select> -->
                            </div>
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
                area_DayPrice: "",
                area_MonthPrice: "",
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
                            })
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