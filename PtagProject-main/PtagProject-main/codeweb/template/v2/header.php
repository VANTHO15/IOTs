<!DOCTYPE html>
<html lang="en">
<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Smart Home Dashboard</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php echo $home_url;?>/template/v2/assets/css/app.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo $home_url;?>/template/v2/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo $home_url;?>/template/v2/assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="<?php echo $home_url;?>/template/v2/assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='<?php echo $home_url;?>/template/v2/assets/img/icon.png' />
    <link rel="stylesheet" href="<?php echo $home_url;?>/template/v2/assets/bundles/pretty-checkbox/pretty-checkbox.min.css">

    <link rel="stylesheet" href="<?php echo $home_url;?>/template/v2/assets/bundles/prism/prism.css">
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li>
                            <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
                  collapse-btn"> <i data-feather="align-justify"></i></a>
                        </li>
                        <li>
                            <a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a>
                        </li>
                        <li>
                            <a  href="#" class="nav-link nav-link-lg text-danger" data-toggle="modal"
                      data-target=".mcu-connect">
                                <i id="ico_stt" mt_atr = "ico_stt" data-feather="cpu" class="text-info"></i> 
                            </a>

                        </li>
                        <li>
                            <a mt_atr = "lbl_stt" href="#" class="nav-link nav-link-lg text-danger">
                               M???t K???t N???i
                            </a>
                            
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg"><i data-feather="bell" class="bell"></i>
                        </a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                            <div class="dropdown-header">
                                Th??ng b??o
                                <div class="float-right">
                                    <a href="#">???? ?????c h???t</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-icons">
                                <a href="#" class="dropdown-item dropdown-item-unread"> <span class="dropdown-item-icon bg-primary text-white"> <i class="fas
                        fa-code"></i>
                                    </span> <span class="dropdown-item-desc"> V???a c???p nh???t phi??n b???n m???i <span class="time">2 Min
                                            Ago</span>
                                    </span>
                                </a>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="https://cdn.iconscout.com/icon/free/png-256/account-avatar-profile-human-man-user-30448.png" class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">Hello
                                <?php echo $user_fullname;?>
                            </div>
                            <a href="#" class="dropdown-item has-icon"> <i class="far
                    fa-user"></i> Trang C?? Nh??n
                            </a> <a href="?go=pset" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                                C??i ?????t
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                                ????ng Xu???t
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>