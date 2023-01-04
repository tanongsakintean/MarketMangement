<?php
$statement = $conn->query("UPDATE tb_notify SET type_status = 1 ");
?>
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
                <h2>รายการ<span>เช่า </span></h2>
            </div>
            <div class="col-lg-6 breadcrumb-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php"><i class="pe-7s-home"></i></a></li>
                    <li class="breadcrumb-item active">รายการเช่า</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Container-fluid starts-->
<div class="container-fluid" id="order" style="background-color: white;border-radius:15px;margin-bottom:20px">

    <div class="table-responsive p-2">
        <table class="display order" id="advance-1">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <!-- <th>สลิปโอนเงิน</th> -->
                    <th>ชื่อ - นามสกุล</th>
                    <th>ตลาด</th>
                    <th>ชื่อแผงลอย</th>
                    <th>แถว และ บล็อก</th>
                    <th>ประเภทการชำระเงิน</th>
                    <th>ราคา</th>
                    <th>วันที่เริ่มเช่า</th>
                    <th>วันสุดท้ายการเช่า</th>
                    <th>สถานะ</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(val,idx) in this.order">
                    <td>{{idx + 1}}</td>
                    <!-- <td><img @click="setPreImg(val.rental_slip)" data-toggle="modal" data-target=".preImg" type="button" width="100" height="100" style="object-fit: cover;" v-bind:src="'./images/20/slips/'+val.rental_slip" alt="" srcset=""></td> -->
                    <td>{{(val.user_prefix == 1) ? 'นาย ' + val.user_fname + " " + val.user_lname : (val.user_prefix == 2) ? 'นาง ' +val.user_fname + " " + val.user_lname : 'นางสาว ' + val.user_fname + " " + val.user_lname   }}</td>
                    <td>{{val.market_name}}</td>
                    <td>{{val.area_name}}</td>
                    <td>แถว : {{val.area_row}} บล็อก : {{val.area_col}}</td>
                    <td v-if="val.rental_type == 1">รายวัน</td>
                    <td v-else>รายเดือน</td>
                    <td>{{val.area_DayPrice}}</td>
                    <td>{{val.rental_DateStart}}</td>
                    <td>{{val.rental_DateEnd}}</td>
                    <td><span class="badge bg-warning " style="font-size: 1rem;">รอตรวจสอบการชำระเงิน</span></td>
                    <td>
                        <div class="d-flex ">
                            <!-- <div><button   class="bg-info mx-2"><i class="fa fa-eye"></i></button></div> -->
                            <div><button @click="setConfirm(val)" class="btn btn-primary" data-toggle="modal" data-target=".confirmPay" type="button">จัดการ</button></div>
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
                    <h4 class="modal-title" id="myLargeModalLabel">ตรวจสอบการชำระเงิน</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-center justify-content-around">
                        <div style="margin-top: -4rem;">
                            <div class="d-flex justify-content-center">
                                <h5>รายละเอียด</h5>
                            </div>
                            <h6>ชื่อตลาด : {{confirmVal.market_name}}</h6>
                            <h6>กว้าง : {{confirmVal.area_width}}</h6>
                            <h6>ชื่อแผงลอย : {{confirmVal.area_name}}</h6>
                            <h6>ยาว : {{confirmVal.area_length}}</h6>
                            <p style="font-size:14px;width:250px">รายละเอียด : {{confirmVal.area_description}}</p>

                            <div>
                                <h6>ชื่อ - นามสกุล : {{(confirmVal.user_prefix == 1) ? 'นาย ' + confirmVal.user_fname + " " + confirmVal.user_lname : (confirmVal.user_prefix == 2) ? 'นาง ' +confirmVal.user_fname + " " + confirmVal.user_lname : 'นางสาว ' + confirmVal.user_fname + " " + confirmVal.user_lname   }}</h6>
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
                            <div class="justify-content-center d-flex align-items-center pt-3" style="flex-direction:column;">
                                <div>
                                    <button @click="payment" class="btn btn-success btn-lg w-100"><i class="fa fa-check"></i> ชำระเงินแล้ว</button>
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
    let order = new Vue({
        el: "#order",
        data: {
            order: [],
            preImg: "",
            confirmVal: [],
        },
        methods: {
            payment() {
                Swal.fire({
                    icon: "info",
                    title: 'คุณต้องการยืนยันการชำระเงินนี้?',
                    showCancelButton: true,
                    confirmButtonText: 'ใช่',
                    cancelButtonText: "ไม่",
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        axios.post("./apis/api_ConfirmPayment.php", {
                            headers: {
                                "Content-Type": "application/json",
                            },
                            action: "confirmPay",
                            area_id: this.confirmVal.area_id,
                            rental_id: this.confirmVal.rental_id
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
                    }
                })

            },
            setConfirm(data) {
                this.preImg = "./images/" + data.user_id + "/slips/" + data.rental_slip;
                this.confirmVal = data;
            },
            setPreImg(img) {
                this.preImg = "./images/" + data.user_id + "/slips/" + img;
            },
            getOrder() {
                axios.get("./apis/api_getOrder.php")
                    .then((res) => {
                        let {
                            status,
                            data
                        } = res.data;
                        if (status) {
                            this.order = [...data];
                            $(document).ready(function() {
                                $('.order').DataTable();
                            });

                        }

                    })
            }
        },
        created() {
            this.getOrder();
        }
    });
</script>