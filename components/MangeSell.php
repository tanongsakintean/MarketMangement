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
                <h2>สรุปยอดรายการ<span>เช่า </span></h2>
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

    <div class="d-flex py-4 px-4 ">
        <div class="form-group d-flex align-items-center " style="align-content:center;">
            <label class="mx-2" for="validationCustom03">ตลาด<span class="text-danger">*</span></label>
            <select class="custom-select" v-model="MarketSelect" @change="getArea(MarketSelect)" required="">
                <option value="">เลือกตลาด</option>
                <option v-for="(item , idx) in Market" :value="item">{{item.market_name}}</option>
            </select>
        </div>
        <div class="mx-2">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">From</label>
                <div class="col-sm-9">
                    <input v-model="start" class="form-control digits" type="date">
                </div>
            </div>
        </div>
        <div class="mx-2">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">To</label>
                <div class="col-sm-9">
                    <input v-model="end" class="form-control digits" type="date">
                </div>
            </div>
        </div>

        <div class="mx-2 d-flex">
            <div class="mx-2">
                <button type="button" @click="search()" class="btn btn-primary">ค้นหา</button>
            </div>

            <div class="mx-2">
                <button @click="printAll" type="button" class="btn btn-dark"><i class="fa fa-file-pdf-o"></i> พิมพ์ทั้งหมด</button>
            </div>

        </div>
    </div>

    <div class="table-responsive p-2">
        <table class="display order" id="advance-1">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อ - นามสกุล</th>
                    <th>ตลาด</th>
                    <th>ชื่อแผงลอย</th>
                    <th>แถว และ บล็อก</th>
                    <th>ประเภทการชำระเงิน</th>
                    <th>ราคา</th>
                    <th>วันที่เช่า</th>
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
                    <td>{{val.rental_date}}</td>
                    <td>
                        <div class="d-flex ">
                            <!-- <div><button   class="bg-info mx-2"><i class="fa fa-eye"></i></button></div> -->
                            <div><button @click="print(val)" class="btn btn-dark" data-toggle="modal" data-target=".confirmPay" type="button"><i class="fa fa-file-pdf-o"></i> พิมพ์</button></div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>









</div>
</div>

<script>
    let order = new Vue({
        el: "#order",
        data: {
            MarketSelect: "",
            Market: [],
            order: [],
            preImg: "",
            confirmVal: [],
            start: "",
            end: "",
            Vstart: "",
            Vend: "",
        },
        methods: {
            getArea(market) {
                console.log(this.MarketSelect)
                if (market != "") {
                    axios.post("./apis/api_SelectMarketRental.php", {
                            headers: {
                                "Content-Type": "application/json",
                            },
                            action: "SelectMarket",
                            market_id: parseInt(market.market_id),
                        })
                        .then((res) => {
                            let {
                                status,
                                order
                            } = res.data;

                            if (status) {
                                this.order = [];
                                this.order = [...order];
                                console.log(this.order)
                                $(document).ready(function() {
                                    $('.order').DataTable();
                                });
                            } else {
                                console.log(res.data)
                                this.order = [];
                                $(document).ready(function() {
                                    $('.order').DataTable();
                                });
                            }
                        })
                }

            },
            printAll() {
                if (this.Vstart != "" && this.Vend != "" && this.MarketSelect != "") {
                    window.open(`export_pdf/print_pdf.php?start=${this.Vstart}&end=${this.Vend}&market_id=${this.MarketSelect.market_id}`);
                } else if (this.MarketSelect != "") {
                    window.open(`export_pdf/print_pdf.php?market_id=${this.MarketSelect.market_id}`);
                } else if (this.Vstart != "" && this.Vend != "") {
                    window.open(`export_pdf/print_pdf.php?start=${this.Vstart}&end=${this.Vend}`);
                } else {
                    window.open(`export_pdf/print_pdf.php`);
                }
                this.start = "";
                this.end = "";
                this.Vstart = "";
                this.Vend = "";
                this.MarketSelect = "";
            },
            search() {
                if (this.start != "" && this.end != "") {
                    axios.post("./apis/api_search.php", {
                            headers: {
                                "Content-Type": "application/json",
                            },
                            action: "search",
                            start: this.start,
                            end: this.end,
                        })
                        .then((res) => {
                            let {
                                status,
                                data
                            } = res.data;
                            if (status) {
                                this.order = "";
                                this.Vstart = this.start;
                                this.Vend = this.end;
                                this.start = "";
                                this.end = "";
                                this.order = [...data];
                            }
                        })
                }
            },
            print(val) {
                window.open(`export_pdf/print_slip_pdf.php?id=${val.rental_id}`);
            },
            setConfirm(data) {
                this.preImg = "./images/20/slips/" + data.rental_slip;
                this.confirmVal = data;
            },
            setPreImg(img) {
                this.preImg = "./images/20/slips/" + img;
            },
            getOrder() {
                axios.get("./apis/api_getOrderSuccess.php")
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
            this.getOrder();
            this.getMarket();
        }
    });
</script>