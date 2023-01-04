<style>
    .swal2-container {
        z-index: 20000 !important;
    }

    @media only screen and (max-width:768px) {
        .responsive {
            flex-wrap: wrap;

        }
    }
</style>
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6 main-header">
                <h2>การเช่า<span>แผงลอย </span></h2>
            </div>
            <div class="col-lg-6 breadcrumb-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php"><i class="pe-7s-home"></i></a></li>
                    <li class="breadcrumb-item active">การเช่าแผงลอย</li>
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
        <div class="d-flex m-2" style="flex-wrap: wrap;">

            <div class="d-flex  align-items-center  m-3">
                <div class=" bg-success " style="height: 40px;width:50px"></div> <label for="" class="ml-4">ไม่มีผู้เช่า/ว่าง</label>
            </div>

            <div class="d-flex  align-items-center m-3">
                <div class=" bg-warning " style="height: 40px;width:50px"></div> <label for="" class="ml-4">รอตรวจสอบการชำระเงิน</label>
            </div>

            <div class="d-flex  align-items-center m-3">
                <div class=" bg-info " style="height: 40px;width:50px"></div> <label for="" class="ml-4">ชำระเงินเรียบร้อยแล้ว</label>
            </div>


            <div class="d-flex  align-items-center m-3">
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
                            <a v-if=" areaData.filter((v)=> {
                                return v.area_col == (idx + 1) && v.area_row == (index + 1) && v.area_status == 1
                                }).length != 0 " href="#" @click="setAreaEdit((idx+1),(index+1))" data-toggle="modal" data-target=".dayPay" type="button" class=" text-success font-weight-bold "><i class="fa fa-plus-square"></i> <span></span>เช่ารายวัน </a>

                            <a v-if=" areaData.filter((v)=> {
                                return v.area_col == (idx + 1) && v.area_row == (index + 1) && v.area_status == 1
                                }).length != 0 " href="#" @click="setAreaEdit((idx+1),(index+1))" data-toggle="modal" data-target=".monthPay" type="button" class=" text-warning font-weight-bold "><i class="fa fa-plus-square"></i> <span></span>เช่ารายเดือน </a>


                            <a v-if=" areaData.filter((v)=> {
                                return v.area_col == (idx + 1) && v.area_row == (index + 1) && v.area_status == 3
                                }).length != 0 " href="#" @click="setInfoPre((idx+1),(index+1))" data-toggle="modal" data-target=".modalInfo" type="button" style="color:blue" class="  font-weight-bold "><i class="fa fa-eye"></i> <span></span>รายละเอียดผู้เช่า </a>



                            <a v-if=" areaData.filter((v)=> {
                                return v.area_col == (idx + 1) && v.area_row == (index + 1) && v.area_status == 2
                                }).length != 0 " href="#" @click="setInfoPre((idx+1),(index+1))" data-toggle="modal" data-target=".modalInfo" type="button" style="color:blue" class="  font-weight-bold "><i class="fa fa-eye"></i> <span></span>รายละเอียดผู้เช่า </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>


    <!-- modalInfo -->
    <div class="modal fade modalInfo" style="z-index:1700 ;" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">รายละเอียดผู้เช่า</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex respon align-items-center justify-content-around">
                        <div>
                            <h6>ชื่อตลาด : {{showPre.market_name}}</h6>
                            <h6>กว้าง : {{showPre.area_width}}</h6>
                            <h6>ชื่อแผงลอย : {{showPre.area_name}}</h6>
                            <h6>ยาว : {{showPre.area_length}}</h6>
                            <p style="font-size:14px;width:250px">รายละเอียด : {{showPre.area_description}}</p>

                            <div>
                                <h6>ชื่อ - นามสกุล : {{(showPre.user_prefix == 1) ? 'นาย ' + showPre.user_fname + " " + showPre.user_lname : (showPre.user_prefix == 2) ? 'นาง ' +showPre.user_fname + " " + showPre.user_lname : 'นางสาว ' + showPre.user_fname + " " + showPre.user_lname   }}</h6>
                                <h6 v-if="showPre.rental_type == 1">ประเภทการชำระเงิน : รายวัน</h6>
                                <h6 v-else>ประเภทการชำระเงิน : รายเดือน</h6>
                                <h6>วันที่เริ่มเช่า : {{showPre.rental_DateStart}}</h6>
                                <h6>วันสุดท้ายการเช่า : {{showPre.rental_DateEnd}}</h6>
                                <h6>จำนวนเงิน : {{showPre.rental_money}} บาท</h6>

                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <a v-bind:href="preImg" target="_blank"><img v-bind:src="preImg" style="width:10rem;height:18rem;object-fit:cover;" alt="" srcset=""></a>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>




    <div class="modal fade selectUser" style="z-index:1700 ;" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">เลือกผู้เช่า</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <table class="display" id="advance-1">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>ชื่อ - นามสกุล</th>
                                <th>เลือก</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(val,idx) in this.User">
                                <td>{{idx + 1}}</td>
                                <td>{{(val.user_prefix == 1) ? 'นาย ' + val.user_fname + " " + val.user_lname : (val.user_prefix == 2) ? 'นาง ' +val.user_fname + " " + val.user_lname : 'นางสาว ' + val.user_fname + " " + val.user_lname   }}</td>
                                <td><button @click="setUserSelect(val)" type="button" data-dismiss="modal" class="btn btn-info ">เลือก</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>





    <!-- month modal--->
    <div class="modal fade monthPay" style="z-index: 1600;" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog " style="max-width:41rem ;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">เช่ารายเดือน</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">

                    <div class="d-flex responsive">
                        <div style="width:52rem ;">
                            <form class="validation-Area" novalidate="">
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">ชื่อแผงลอย<span class="text-danger">*</span></label>
                                        <input class="form-control" v-model="area.area_name" style="background-color: #ffffff;" disabled type="text" required="">
                                    </div>
                                </div>


                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">รายละเอียด<span class="text-danger">*</span></label>
                                        <textarea class="form-control" v-model="area.area_description" style="background-color: #ffffff;" disabled type="text" required=""></textarea>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">ความกว้าง<span class="text-danger">*</span>หน่วย(เมตร)</label>
                                        <input class="form-control" v-model="area.area_width" style="background-color: #ffffff;" disabled type="text" required="">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">ความยาว<span class="text-danger">*</span>หน่วย(เมตร)</label>
                                        <input class="form-control" v-model="area.area_length" style="background-color: #ffffff;" disabled type="text" required="">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <!-- <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">ราคาต่อวัน<span class="text-danger">*</span>หน่วย(บาท)</label>
                                        <input class="form-control" v-model="area.area_DayPrice" style="background-color: #ffffff;" disabled type="text" required="">
                                    </div> -->

                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">ราคาต่อเดือน<span class="text-danger">*</span>หน่วย(บาท)</label>
                                        <input class="form-control" v-model="area.area_MonthPrice" style="background-color: #ffffff;" disabled type="text" required="">
                                    </div>
                                </div>




                            </form>
                        </div>

                        <div style="width: 100% ;" class=" ml-5   ">
                            <div class="row mb-3 ">
                                <button data-toggle="modal" data-target=".selectUser" type="button" class="btn mx-2   btn-info">เลือกผู้เช่า</button>
                                <button data-toggle="modal" data-target=".AddUser" type="button" class="btn  mx-2  btn-primary">เพิ่มผู้เช่า</button>
                            </div>

                            <div>
                                <div class="form-row h-full">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">ชื่อ - นามสกุล<span class="text-danger">*</span></label>
                                        <div style="padding: 10px ;display:flex;align-items:center;border-radius:.25rem;border:1px solid #ced4da ;background:#ffffff">
                                            <h5 style="font-size: 1rem;" v-if="user_id != ''">{{(user_prefix == 1) ? 'นาย ' + user_fname + " " + user_lname : (user_prefix == 2) ? 'นาง ' +user_fname + " " + user_lname : 'นางสาว ' + user_fname + " " + user_lname   }}</h5>
                                            <h5 v-else></h5>
                                        </div>
                                    </div>


                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">จำนวนเงินรับมา<span class="text-danger">*</span>หน่วย(บาท)</label>
                                        <input class="form-control" v-model="money" style="background-color: #ffffff;" type="number" required="">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">วันที่เริ่มเช่า<span class="text-danger">*</span></label>
                                        <input class="form-control" v-model="date_start" style="background-color: #ffffff;" type="date" required="">
                                    </div>

                                    <!-- <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">วันสุดท้ายการเช่า<span class="text-danger">*</span></label>
                                        <input class="form-control" v-model="date_end" style="background-color: #ffffff;" type="date" required="">
                                    </div> -->

                                    <div class="col-md-12 mb-3"></div>

                                    <div class="d-flex justify-content-end">
                                        <div class="mx-2">
                                            <button type="button" data-dismiss="modal" class="btn btn-danger ">ยกเลิก</button>
                                        </div>
                                        <div class="mx-2">
                                            <button @click="MonthPayment" type="button" class="btn btn-primary ">ชำระเงิน</button>
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




    <!-- day modal--->
    <div class="modal fade dayPay" style="z-index: 1600;" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog " style="max-width:41rem ;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">เช่ารายวัน</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <!-- {{area.area_name}} -->

                    <div class="d-flex responsive">
                        <div style="width:52rem ;">
                            <form class="validation-Area" novalidate="">
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">ชื่อแผงลอย<span class="text-danger">*</span></label>
                                        <input class="form-control" v-model="area.area_name" style="background-color: #ffffff;" disabled type="text" required="">
                                    </div>
                                </div>


                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">รายละเอียด<span class="text-danger">*</span></label>
                                        <textarea class="form-control" v-model="area.area_description" style="background-color: #ffffff;" disabled type="text" required=""></textarea>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">ความกว้าง<span class="text-danger">*</span>หน่วย(เมตร)</label>
                                        <input class="form-control" v-model="area.area_width" style="background-color: #ffffff;" disabled type="text" required="">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">ความยาว<span class="text-danger">*</span>หน่วย(เมตร)</label>
                                        <input class="form-control" v-model="area.area_length" style="background-color: #ffffff;" disabled type="text" required="">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">ราคาต่อวัน<span class="text-danger">*</span>หน่วย(บาท)</label>
                                        <input class="form-control" v-model="area.area_DayPrice" style="background-color: #ffffff;" disabled type="text" required="">
                                    </div>

                                    <!-- <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">ราคาต่อเดือน<span class="text-danger">*</span>หน่วย(บาท)</label>
                                        <input class="form-control" v-model="area.area_MonthPrice" style="background-color: #ffffff;" disabled type="text" required="">
                                    </div> -->
                                </div>




                            </form>
                        </div>

                        <div style="width: 100% ;" class=" ml-5   ">
                            <div class="row mb-3 ">
                                <button data-toggle="modal" data-target=".selectUser" type="button" class="btn mx-2   btn-info">เลือกผู้เช่า</button>
                                <button data-toggle="modal" data-target=".AddUser" type="button" class="btn  mx-2  btn-primary">เพิ่มผู้เช่า</button>
                            </div>

                            <div>
                                <div class="form-row h-full">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">ชื่อ - นามสกุล<span class="text-danger">*</span></label>
                                        <div style="padding: 10px ;display:flex;align-items:center;border-radius:.25rem;border:1px solid #ced4da ;background:#ffffff">
                                            <h5 style="font-size: 1rem;" v-if="user_id != ''">{{(user_prefix == 1) ? 'นาย ' + user_fname + " " + user_lname : (user_prefix == 2) ? 'นาง ' +user_fname + " " + user_lname : 'นางสาว ' + user_fname + " " + user_lname   }}</h5>
                                            <h5 v-else></h5>
                                        </div>
                                    </div>


                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">จำนวนเงินรับมา<span class="text-danger">*</span>หน่วย(บาท)</label>
                                        <input class="form-control" v-model="money" style="background-color: #ffffff;" type="number" required="">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">วันที่เริ่มเช่า<span class="text-danger">*</span></label>
                                        <input class="form-control" v-model="date_start" style="background-color: #ffffff;" type="date" required="">
                                    </div>

                                    <!-- <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">วันสุดท้ายการเช่า<span class="text-danger">*</span></label>
                                        <input class="form-control" v-model="date_end" style="background-color: #ffffff;" type="date" required="">
                                    </div> -->

                                    <div class="col-md-12 mb-3"></div>

                                    <div class="d-flex justify-content-end">
                                        <div class="mx-2">
                                            <button type="button" data-dismiss="modal" class="btn btn-danger ">ยกเลิก</button>
                                        </div>
                                        <div class="mx-2">
                                            <button @click="DayPayment" type="button" class="btn btn-primary ">ชำระเงิน</button>
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



    <!--- add user modal--->
    <div class="modal fade AddUser" style="z-index: 1610;" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class=" modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">เพิ่มผู้เช่า</h4>
                    <button class="close" id="closeUserRent" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body" style="padding:2rem;">
                    <form class="addUser-validation-Rent" id="form" novalidate="">
                        <div class="form-row">

                            <div class="col-md-3 mb-3">
                                <label for="validationCustom03">คำนำหน้า<span class="text-danger">*</span></label>
                                <select class="custom-select" v-model="user.user_prefix" id="prefix" required="">
                                    <option value="">เลือกคำนำหน้า</option>
                                    <option value="1">นาย</option>
                                    <option value="2">นาง</option>
                                    <option value="3">นางสาว</option>
                                </select>
                                <div class="invalid-feedback">โปรดเลือกคำนำหน้า</div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="validationCustom01">ชื่อจริง<span class="text-danger">*</span></label>
                                <input class="form-control" v-model="user.user_fname" id="fname" type="text" placeholder="ชื่อจริง" required="">
                                <div class="invalid-feedback">โปรดกรอกชื่อจริง</div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom02">นามสกุล<span class="text-danger">*</span></label>
                                <input class="form-control" id="lname" v-model="user.user_lname" type="text" placeholder="นามสกุล" required="">
                                <div class="invalid-feedback">โปรดกรอกนามสกุล</div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="validationCustomUsername">เบอร์โทรศัพท์<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input class="form-control" id="tel" v-model="user.user_tel" type="text" maxlength="10" placeholder="เบอร์โทรศัพท์" aria-describedby="inputGroupPrepend" required="">
                                    <div class="invalid-feedback">โปรดกรอก เบอร์โทรศัพท์</div>
                                </div>
                            </div>


                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for="validationCustomUsername">ชื่อผู้ใช้งาน<span class="text-danger">*</span> </label>
                                <div class="input-group">
                                    <input class="form-control" id="username" v-model="user.user_username" type="email" placeholder="Username" aria-describedby="inputGroupPrepend" required="">
                                    <div class="invalid-feedback">โปรดกรอก ชื่อผู้ใช้งาน </div>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="validationCustomUsername">รหัสผ่าน<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input class="form-control" v-model="user.user_NewPassword" id="newPassword" type="password" placeholder="รหัสผ่าน" aria-describedby="inputGroupPrepend" required="">
                                    <div class="invalid-feedback">โปรดกรอกรหัสผ่าน</div>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="validationCustomUsername">ยืนยันรหัสผ่าน<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input class="form-control" v-model="user.user_ReplyPassword" id="replyPassword" type="password" placeholder="รหัสผ่าน" aria-describedby="inputGroupPrepend" required="">
                                    <div class="invalid-feedback">โปรดกรอกยืนยันรหัสผ่าน</div>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="validationCustomUsername">รหัสไปรษณีย์<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input class="form-control" v-model="user.user_zipcode" id="zipcode" maxlength="5" type="text" pattern="\d*" placeholder="ไปรษณีย์" aria-describedby="inputGroupPrepend" required="">
                                    <div class="invalid-feedback">โปรดกรอกรหัสไปรษณีย์</div>
                                </div>
                            </div>

                        </div>


                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustomUsername">ที่อยู่<span class="text-danger">*</span> </label>
                                <div class="input-group">
                                    <textarea class="form-control" v-model="user.user_address" id="address" placeholder="ที่อยู่" aria-describedby="inputGroupPrepend" required=""></textarea>
                                    <div class="invalid-feedback">โปรดกรอก ที่อยู่ </div>
                                </div>
                            </div>

                        </div>
                        <div class="d-flex justify-content-end">
                            <button @click="addUser" class="btn btn-primary" type="submit">เพิ่มผู้เช่า</button>
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
            showPre: "",
            preImg: "",
            user: {
                user_username: "",
                user_fname: "",
                user_lname: "",
                user_tel: "",
                user_address: "",
                user_id: "",
                user_zipcode: "",
                user_NewPassword: "",
                user_ReplyPassword: "",
                user_prefix: "",
            },
            date_start: "",
            money: "",
            User: [],
            user_fname: "",
            user_lname: "",
            user_id: "",
            user_prefix: "",
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
            setInfoPre(col, row) {
                this.showPre = "";
                this.preImg = "";
                axios.post("./apis/api_SelectInfo.php", {
                        headers: {
                            "Content-Type": "application/json",
                        },
                        action: "getUserInfo",
                        area_id: this.area.area_name = this.areaData.filter((v) => {
                            return v.area_col == col && v.area_row == row
                        })[0].area_id
                    })
                    .then((res) => {
                        let {
                            status,
                            order
                        } = res.data;
                        if (status) {
                            this.showPre = order;
                            this.preImg = "./images/" + order.user_id + "/profile/" + order.user_img;
                        }
                    })
            },
            MonthPayment() {
                if (this.money != "" && this.user_id != "" && this.date_start != "") {
                    Swal.fire({
                        icon: "info",
                        title: 'คุณแน่ใจหรือไม่ชำระเงิน?',
                        showCancelButton: true,
                        confirmButtonText: 'ใช่',
                        cancelButtonText: "ไม่",
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            if (parseInt(this.money) < parseInt(this.area.area_DayPrice)) {
                                Swal.fire({
                                    title: "เกิดข้อผิดพลาด",
                                    text: "ยอดเงินที่รับมาไม่พอต่อการเช่า!",
                                    icon: "error",
                                });
                            } else {
                                axios.post("./apis/api_MonthPayment.php", {
                                        headers: {
                                            "Content-Type": "application/json",
                                        },
                                        action: "MonthPay",
                                        user_id: this.user_id,
                                        rental_type: 2,
                                        area_id: this.area.area_id,
                                        money: this.money,
                                        date_start: this.date_start,
                                        market_id: this.MarketSelect.market_id,
                                    })
                                    .then((res) => {
                                        let {
                                            status,
                                            meg,
                                            data
                                        } = res.data;
                                        if (status) {
                                            Swal.fire({
                                                title: "สำเร็จ",
                                                text: meg,
                                                icon: "success",
                                                timer: 1500,
                                                showConfirmButton: false,
                                            }).then(() => {
                                                window.open(`export_pdf/print_slip_pdf.php?id=${data.max_id}`);
                                                $(".close").click();
                                                window.localStorage.setItem("market", JSON.stringify(this.MarketSelect));
                                                this.getArea(JSON.parse(window.localStorage.getItem("market")));
                                                this.area.area_name = "";
                                                this.area.area_description = "";
                                                this.area.area_width = "";
                                                this.area.area_length = "";
                                                this.area.area_price = "";
                                                this.area.area_row = "";
                                                this.area.area_col = "";
                                                this.area.area_id = "";
                                                this.area.area_status = "";
                                            });
                                        } else {
                                            Swal.fire({
                                                title: "เกิดข้อผิดพลาด",
                                                text: "โปรดกรอก จำนวนเงิน และ เลือกผู้เช่า และ วันที่เช่า!",
                                                icon: "error",
                                            });
                                        }
                                    })
                            }

                        }
                    })
                } else {
                    Swal.fire({
                        title: "เกิดข้อผิดพลาด",
                        text: "โปรดกรอก จำนวนเงิน และ เลือกผู้เช่า!",
                        icon: "error",
                    });
                }
            },
            addUser() {
                if (this.user.user_Newpassword != "" && this.user.user_ReplyPassword != "" && this.user.user_address != "" && this.user.user_fname != "" && this.user.user_lname != "" && this.user.user_tel != "" && this.user.user_username != "") {
                    if (this.user.user_ReplyPassword == this.user.user_NewPassword) {
                        axios
                            .post("./apis/api_addUser.php", {
                                headers: {
                                    "Content-Type": "application/json",
                                },
                                action: "addUser",
                                user_level: 0,
                                username: this.user.user_username,
                                password: this.user.user_newPassword,
                                prefix: this.user.user_prefix,
                                fname: this.user.user_fname,
                                lname: this.user.user_lname,
                                tel: this.user.user_tel,
                                address: this.user.user_address,
                                zipcode: this.user.user_zipcode,
                            })
                            .then((res) => {
                                let {
                                    status,
                                    meg,
                                    data
                                } = res.data;
                                if (status) {
                                    Swal.fire({
                                        title: "สำเร็จ",
                                        text: meg,
                                        icon: "success",
                                        timer: 1500,
                                        showConfirmButton: false,
                                    }).then(() => {
                                        $("#closeUserRent").click();
                                        this.user_fname = data.user_fname;
                                        this.user_lname = data.user_lname;
                                        this.user_id = data.user_id;
                                        this.user_prefix = data.user_prefix;

                                        this.user.user_username = "";
                                        this.user.user_fname = "";
                                        this.user.user_lname = "";
                                        this.user.user_tel = "";
                                        this.user.user_address = "";
                                        this.user.user_id = "";
                                        this.user.user_zipcode = "";
                                        this.user.user_NewPassword = "";
                                        this.user.user_ReplyPassword = "";
                                        this.user.user_prefix = "";
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
                }
            },
            DayPayment() {
                if (this.money != "" && this.user_id != "" && this.date_start != "") {
                    Swal.fire({
                        icon: "info",
                        title: 'คุณแน่ใจหรือไม่ชำระเงิน?',
                        showCancelButton: true,
                        confirmButtonText: 'ใช่',
                        cancelButtonText: "ไม่",
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            if (parseInt(this.money) < parseInt(this.area.area_DayPrice)) {
                                Swal.fire({
                                    title: "เกิดข้อผิดพลาด",
                                    text: "ยอดเงินที่รับมาไม่พอต่อการเช่า!",
                                    icon: "error",
                                });
                            } else {
                                axios.post("./apis/api_DayPayment.php", {
                                        headers: {
                                            "Content-Type": "application/json",
                                        },
                                        action: "DayPay",
                                        user_id: this.user_id,
                                        rental_type: 1,
                                        area_id: this.area.area_id,
                                        money: this.money,
                                        date_start: this.date_start,
                                        market_id: this.MarketSelect.market_id,
                                    })
                                    .then((res) => {
                                        let {
                                            status,
                                            meg,
                                            data
                                        } = res.data;
                                        if (status) {
                                            Swal.fire({
                                                title: "สำเร็จ",
                                                text: meg,
                                                icon: "success",
                                                timer: 1500,
                                                showConfirmButton: false,
                                            }).then(() => {
                                                window.open(`export_pdf/print_slip_pdf.php?id=${data.max_id}`);
                                                $(".close").click();
                                                window.localStorage.setItem("market", JSON.stringify(this.MarketSelect));
                                                this.getArea(JSON.parse(window.localStorage.getItem("market")));
                                                this.area.area_name = "";
                                                this.area.area_description = "";
                                                this.area.area_width = "";
                                                this.area.area_length = "";
                                                this.area.area_price = "";
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
                                    })
                            }

                        }
                    })
                } else {
                    Swal.fire({
                        title: "เกิดข้อผิดพลาด",
                        text: "โปรดกรอก จำนวนเงิน และ เลือกผู้เช่า และ วันที่เช่า!",
                        icon: "error",
                    });
                }
            },
            setUserSelect(user) {
                this.user_fname = user.user_fname;
                this.user_lname = user.user_lname;
                this.user_prefix = user.user_prefix;
                this.user_id = user.user_id;
            },
            getUser() {
                axios.get("./apis/api_getUser.php").then((res) => {
                    this.User = [...res.data.user];
                    $(document).ready(function() {
                        $('#advance-1').DataTable();
                    });
                })
            },
            getMarket() {
                axios.get("./apis/api_getMarket.php").then((res) => {
                    this.market.push(...res.data.market);
                })
            },

            setAreaEdit(col, row) {

                this.user_fname = "";
                this.user_lname = "";
                this.user_id = "";
                this.user_prefix = "";
                this.date_start = "";
                this.money = "";
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


                this.area.area_MonthPrice = this.areaData.filter((v) => {
                    return v.area_col == col && v.area_row == row
                })[0].area_MonthPrice;

                this.area.area_DayPrice = this.areaData.filter((v) => {
                    return v.area_col == col && v.area_row == row
                })[0].area_DayPrice;

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
            setColRow(col, row) {
                this.area.area_col = col;
                this.area.area_row = row;
                this.area.area_name = "";
                this.area.area_description = "";
                this.area.area_length = "";
                this.area.area_price = "";
                this.area.area_width = "";
                this.area.area_id = "";
            },


        },
        updated() {},
        created() {
            this.getMarket();
            this.getUser();
        }
    });
</script>