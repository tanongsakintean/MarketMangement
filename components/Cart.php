<?php
require("./connect.php");
$statement = $conn->query("UPDATE tb_notify SET del_status = 1 WHERE type_status = 1");

?>
<style>
    @media only screen and (max-width:992px) {
        .respon {
            flex-direction: column;
        }
    }
</style>
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6 main-header">
                <h2>รายการ<span>เช่า</span></h2>
            </div>
            <div class="col-lg-6 breadcrumb-right">
            </div>
        </div>


        <div class="container-fluid" id="order" style="background-color: white;border-radius:15px;margin-bottom:20px">

            <div class="table-responsive p-2">
                <table class="display order" id="advance-1">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ตลาด</th>
                            <th>ชื่อแผงลอย</th>
                            <th>แถว และ บล็อก</th>
                            <th>ประเภทการชำระเงิน</th>
                            <th>ราคา</th>
                            <th>วันที่เริ่มเช่า</th>
                            <th>วันสุดท้ายการเช่า</th>
                            <th>วันคงเหลือ</th>
                            <th>สถานะ</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(val,idx) in this.order">
                            <td>{{idx + 1}}</td>
                            <td>{{val.market_name}}</td>
                            <td>{{val.area_name}}</td>
                            <td>แถว : {{val.area_row}} บล็อก : {{val.area_col}}</td>
                            <td v-if="val.rental_type == 1">รายวัน</td>
                            <td v-else>รายเดือน</td>
                            <td>{{val.area_DayPrice}}</td>
                            <td>{{val.rental_DateStart}}</td>
                            <td>{{val.rental_DateEnd}}</td>
                            <td>{{val.rental_RemainDay}}</td>
                            <td v-if="val.area_status == 2"><span class="badge bg-warning " style="font-size: 1rem;">รอตรวจสอบการชำระเงิน</span></td>
                            <td v-else><span class="badge bg-success" style="font-size: 1rem;">ชำระเงินสำเร็จ</span></td>
                            <td>
                                <div class="d-flex ">
                                    <div><button @click="setInfo(val)" data-toggle="modal" data-target=".confirmPay" type="button" class="bg-info mx-2"><i class="fa fa-eye"></i></button></div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>



            <!-- confirmPay -->
            <div class="modal fade confirmPay" style="z-index:1700 ;" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">การเช่า</h4>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex respon align-items-center justify-content-around">
                                <div>
                                    <div class="d-flex justify-content-center">
                                        <h5>รายละเอียด</h5>
                                    </div>
                                    <h6>ชื่อตลาด : {{confirmVal.market_name}}</h6>
                                    <h6>กว้าง : {{confirmVal.area_width}}</h6>
                                    <h6>ชื่อแผงลอย : {{confirmVal.area_name}}</h6>
                                    <h6>ยาว : {{confirmVal.area_length}}</h6>
                                    <p style="font-size:14px;width:250px">รายละเอียด : {{confirmVal.area_description}}</p>

                                    <div>
                                        <h6>ชื่อ - นามสกุล : <?php echo $_SESSION['ses_prefix'] . ' ' . $_SESSION['ses_fname'] . ' ' . $_SESSION['ses_lname'] ?></h6>
                                        <h6 v-if="confirmVal.rental_type == 1">ประเภทการชำระเงิน : รายวัน</h6>
                                        <h6 v-else>ประเภทการชำระเงิน : รายเดือน</h6>
                                        <h6>วันที่เริ่มเช่า : {{confirmVal.rental_DateStart}}</h6>
                                        <h6>วันสุดท้ายการเช่า : {{confirmVal.rental_DateEnd}}</h6>
                                        <h6>จำนวนเงิน : {{confirmVal.rental_money}} บาท</h6>

                                    </div>
                                </div>

                                <div>
                                    <div class="d-flex justify-content-center">
                                        <h5>ตรวจสอบการชำระเงิน</h5>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a v-bind:href="preImg" target="_blank"><img v-bind:src="preImg" style="width:16rem;height:18rem;" alt="" srcset=""></a>
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
    const order = new Vue({
        el: "#order",
        data: {
            order: [],
            preImg: "",
            confirmVal: "",
        },
        methods: {
            setInfo(data) {
                this.preImg = "./images/" + data.user_id + "/slips/" + data.rental_slip;
                this.confirmVal = data;
            },
            getOrder() {
                axios.get("./apis/api_getOrderUser.php")
                    .then((res) => {
                        let {
                            status,
                            data
                        } = res.data;

                        if (status) {
                            this.order = [...data];
                            $(document).ready(() => {
                                $("#advance-1").dataTable();
                            })
                        }
                    })
            },
        },
        created() {
            this.getOrder();
        }
    });
</script>