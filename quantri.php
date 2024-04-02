<?php
session_start();
include_once './ketnoi.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý nhân viên</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="css/styles.css" rel="stylesheet">
    <script src="js/lumino.glyphs.js"></script>
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="quantri.php">Admin</a>
                <ul class="user-menu">
                    <li class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <svg class="glyph stroked male-user">
                                <use xlink:href="#stroked-male-user"></use>
                            </svg>Xin chào <?php if(isset($_SESSION['email'])){echo $_SESSION['email'];}?> <span
                                class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="dangsuat.php"><svg class="glyph stroked cancel">
                                        <use xlink:href="#stroked-cancel"></use>
                                    </svg>Đăng xuất</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <ul class="nav menu">
            <li role="presentation" class="divider"></li>

            <li><a href="quantri.php?page_layout=danhsachpb"><svg class="glyph stroked calendar">
                        <use xlink:href="#stroked-calendar"></use>
                    </svg> Phòng ban</a></li>

            <li><a href="quantri.php?page_layout=danhsachcv"><svg class="glyph stroked line-graph">
                        <use xlink:href="#stroked-line-graph"></use>
                    </svg> Chức vụ</a></li>

            <li><a href="quantri.php?page_layout=danhsachbp"><svg class="glyph stroked line-graph">
                        <use xlink:href="#stroked-line-graph"></use>
                    </svg> Bộ phận</a></li>

            <li><a href="quantri.php?page_layout=danhsachnv"><svg class="glyph stroked line-graph">
                        <use xlink:href="#stroked-male-user"></use>
                    </svg> Nhân viên</a></li>
            <li><a href="quantri.php?page_layout=danhsachnvtv"><svg class="glyph stroked line-graph">
                        <use xlink:href="#stroked-male-user"></use>
                    </svg> Nhân viên thôi việc</a></li>        

        </ul>

    </div>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <?php
      // master page
      if(isset($_GET["page_layout"])){
        switch ($_GET["page_layout"]) {
            case 'danhsachnv':include_once './danhsachnv.php';
               break;
            case 'themnv':include_once './themnv.php';
               break;
            case 'suanv':include_once './suanv.php';
               break;
            case 'danhsachpb':include_once './danhsachpb.php';
               break;
            case 'suapb':include_once './suapb.php';
               break;
            case 'danhsachcv':include_once './danhsachcv.php';
               break;
            case 'suacv':include_once './suacv.php';
               break;
            case 'danhsachbp':include_once './danhsachbp.php';
               break;
            case 'suabp':include_once './suabp.php';
               break;
            case 'danhsachnvtv':include_once './danhsachnvtv.php';
                break;
            case 'themnvtv':include_once './themnvtv.php';
                break;
        }
      }
      else include_once './gioithieu.php';
      ?>
    </div>
    <!--/.main-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>