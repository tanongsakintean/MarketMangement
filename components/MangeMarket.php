<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6 main-header">
                <h2>จัดการ<span>ตลาด </span></h2>
            </div>
            <div class="col-lg-6 breadcrumb-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php"><i class="pe-7s-home"></i></a></li>
                    <li class="breadcrumb-item active">จัดการตลาด</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row" style=" margin-bottom: 2rem ;">
            <!-- เพิื่มผู้ใช้งาน modal-->
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target=".addMarket">เพิ่มตลาด</button>
            <div class="modal fade addMarket" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class=" modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">เพิ่มตลาด</h4>
                            <button class="close" type="button" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body" style="padding:2rem;">
                            <form class="markets-validation" id="form" novalidate="">

                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustomUsername">ชื่อตลาด<span class="text-danger">*</span> </label>
                                        <div class="input-group">
                                            <input class="form-control" id="market_name" type="text" placeholder="ชื่อตลาด" aria-describedby="inputGroupPrepend" required="">
                                            <div class="invalid-feedback">โปรดกรอก ชื่อตลาด </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustomUsername">ที่อยู่<span class="text-danger">*</span> </label>
                                        <div class="input-group">
                                            <textarea class="form-control" id="market_address" placeholder="ที่อยู่" aria-describedby="inputGroupPrepend" required=""></textarea>
                                            <div class="invalid-feedback">โปรดกรอก ที่อยู่ </div>
                                        </div>
                                    </div>

                                </div>



                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustomUsername">จำนวนแถว<span class="text-danger">*</span> </label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="market_row" placeholder="จำนวนแถว" aria-describedby="inputGroupPrepend" required="" />
                                            <div class="invalid-feedback">โปรดกรอก จำนวนแถว </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustomUsername">จำนวนช่อง<span class="text-danger">*</span> </label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="market_block" placeholder="จำนวนช่อง" aria-describedby="inputGroupPrepend" required="" />
                                            <div class="invalid-feedback">โปรดกรอก จำนวนช่อง </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-danger mx-2" type="button" data-dismiss="modal">ยกเลิก</button>
                                    <button class="btn btn-primary mx-2" type="submit">เพิ่มตลาด</button>
                                </div>

                            </form>
                        </div>

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
                        <div class="table-responsive" id="market">
                            <table class="display" id="advance-1">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ชื่อตลาด</th>
                                        <th>ที่อยู่</th>
                                        <th>แถว</th>
                                        <th>ช่อง</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(val,idx) in this.Market">
                                        <td>{{idx + 1}}</td>
                                        <td>{{val.market_name}}</td>
                                        <td>{{val.market_address}}</td>
                                        <td>{{val.market_row}}</td>
                                        <td>{{val.market_block}}</td>
                                        <td>
                                            <div class="d-flex ">
                                                <i @click="setMarket(val)" class="fa fa-edit text-warning mx-2" data-toggle="modal" data-target=".editMarket" style="font-size: 25px;cursor:pointer"></i>
                                                <i @click="delMarket(val.market_id)" class="fa fa-trash-o text-danger mx-2" style="font-size: 25px;cursor:pointer"></i>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>


                            <!-- edit modal -->
                            <div class="modal fade editMarket" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                        <div class=" modal-header">
                                            <h4 class="modal-title" id="myLargeModalLabel">แก้ไขตลาด</h4>
                                            <button class="close" type="button" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body" style="padding:2rem;">
                                            <form class="markets-EditValidation" id="form" novalidate="">
                                                <div class="form-row">
                                                    <div class="col-md-12 mb-3">

                                                        <label for="validationCustomUsername">ชื่อตลาด<span class="text-danger">*</span> </label>
                                                        <div class="input-group">
                                                            <input class="form-control" id="Emarket_name" type="text" placeholder="Username" aria-describedby="inputGroupPrepend" required="" v-model="market_name">
                                                            <div class="invalid-feedback">โปรดกรอก ชื่อตลาด </div>
                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="form-row">
                                                    <div class="col-md-12 mb-3">
                                                        <label for="validationCustomUsername">ที่อยู่<span class="text-danger">*</span> </label>
                                                        <div class="input-group">
                                                            <textarea class="form-control" id="Emarket_address" placeholder="ที่อยู่" aria-describedby="inputGroupPrepend" required="" v-model="market_address"></textarea>
                                                            <div class="invalid-feedback">โปรดกรอก ที่อยู่ </div>
                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="form-row">
                                                    <div class="col-md-12 mb-3">
                                                        <label for="validationCustomUsername">จำนวนแถว<span class="text-danger">*</span> </label>
                                                        <div class="input-group">
                                                            <input type="number" class="form-control" id="Emarket_row" placeholder="จำนวนแถว" aria-describedby="inputGroupPrepend" required="" v-model="market_row" />
                                                            <div class="invalid-feedback">โปรดกรอก จำนวนแถว </div>
                                                        </div>
                                                    </div>

                                                </div>


                                                <input type="text" v-model="market_id" id="Emarket_id" hidden>


                                                <div class="form-row">
                                                    <div class="col-md-12 mb-3">
                                                        <label for="validationCustomUsername">จำนวนช่อง<span class="text-danger">*</span> </label>
                                                        <div class="input-group">
                                                            <input type="number" class="form-control" id="Emarket_block" placeholder="จำนวนช่อง" aria-describedby="inputGroupPrepend" required="" v-model="market_block" />
                                                            <div class="invalid-feedback">โปรดกรอก จำนวนช่อง </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <button class="btn btn-danger mx-2" type="button" data-dismiss="modal">ยกเลิก</button>
                                                    <button class="btn btn-warning mx-2" type="submit">แก้ไขตลาด</button>
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
</div>


<script>
    let form = new Vue({
        el: "#market",
        data: {
            Market: [],
            market_id: "",
            market_name: "",
            market_address: "",
            market_block: "",
            market_row: "",
        },
        methods: {
            setMarket(market) {
                this.market_id = market.market_id;
                this.market_address = market.market_address;
                this.market_name = market.market_name;
                this.market_row = market.market_row;
                this.market_block = market.market_block;

            },
            delMarket(market_id) {
                Swal.fire({
                    icon: "info",
                    title: 'คุณต้องการลบตลาดนี้?',
                    showCancelButton: true,
                    confirmButtonText: 'ใช่',
                    cancelButtonText: "ไม่",
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        axios
                            .post("./apis/api_delMarket.php", {
                                headers: {
                                    "Content-Type": "application/json",
                                },
                                action: "delMarket",
                                market_id: market_id,
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
            this.getMarket();
        }
    });
</script>