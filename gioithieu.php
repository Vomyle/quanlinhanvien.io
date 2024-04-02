<div class="container">

    <h3 style="    padding-left: 41px;
    font-size: 27px;
    font-weight: 700;">Bảng tin DASHBOARD</h3>
    <div class="row">
        <div class="row__child">
            <!--Tổng số sp-->
            <div class="sum">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Tổng số nhân viên</div>
                    <div class="cart-body">
                        <h2 id="baocaosanpham_s2"><?php include("api/tongsonv.php");?></h2>
                    </div>
                </div>
            </div>
            <div class="sum">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Tổng số phòng ban</div>
                    <div class="cart-body">
                        <h2 id="baocaodonhang_sl"><?php include("api/tongsophongban.php");?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row__child">
            <div class="sum-second">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">Tổng Số Bộ Phận</div>
                    <div class="cart-body">
                        <h2 id="baocaokhachhang_sl"><?php include("api/tongsobp.php");?></h2>
                    </div>
                </div>
            </div>

            <div class="sum-second">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Tổng Trình Độ

                    </div>
                    <div class="cart-body">
                        <h2 class="baocao" id="baocaodoanhthu_sl"><?php include("api/tongsotrinhdo.php");?></h2>
                    </div>
                </div>
            </div>
            <div class="sum-second">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Tổng Chức Vụ

                    </div>
                    <div class="cart-body">
                        <h2 class="baocao" id="baocaodoanhthu_sl"><?php include("api/tongsochucvu.php");?></h2>
                    </div>
                </div>
            </div>
            <div class="sum-second">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Tổng Nhân Viên thôi việc

                    </div>
                    <div class="cart-body">
                        <h2 class="baocao" id="baocaodoanhthu_sl"><?php include("api/tongsonvtv.php");?></h2>
                    </div>
                </div>
            </div>

        </div>


    </div>



    <style>
    .row {
        padding-top: 40px;
    }

    .row__child {
        display: flex;
        margin-bottom: 105px;
    }

    .sum {
        width: 35%;
        height: 50px;
        padding: 0 63px;
        text-align: center
    }

    .sum-second {
        width: 100%;
        margin: 20px 33px;
        text-align: center
    }

    .card {
        height: 120px;

    }
    </style>
    <!--/.row-->
</div>