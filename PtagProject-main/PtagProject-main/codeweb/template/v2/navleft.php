            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="?go=ptag"> <img alt="image" src="<?php echo $home_url;?>/template/v2/assets/img/mtlogo.png" style ="width: 40px; height: 30px" class="header-logo" /> <span class="logo-name">MT Tag</span>
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="dropdown <?php if($_GET['go'] == "ptag"){echo "active";}?>">
                            <a href="<?php echo $home_url; ?>?go=ptag" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
                        </li>
                        <li class="dropdown <?php if($_GET['go'] == "pset"){echo "active";}?>">
                            <a href="<?php echo $home_url; ?>?go=pset" class="nav-link"><i data-feather="settings"></i><span>Cài Đặt</span></a>
                        </li>
                        <li class="dropdown ">
                            <a href="test" class="nav-link"><i data-feather="box"></i><span>Giao Diện Test</span></a>
                        </li>
                        <li class="dropdown ">
                            <a href="custom" class="nav-link"><i data-feather="box"></i><span>Custom Giao Diện</span></a>
                        </li>
                    </ul>
                </aside>
            </div>