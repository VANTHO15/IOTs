<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Thiết bị chiếu sáng</h4> <button class="btn btn-info float-right" onclick="alert('Chức năng tạm khóa!!');">Thêm</button>
                    </div>
                    <div class="card-body">
                        <div id="accordion">
                            <?php foreach ($tags as $tag):?>
                                <div class="accordion">
                                <div class="accordion-header" role="button" data-toggle="collapse" data-target="#tag-panel-<?php echo $tag["tag_id"];?>" aria-expanded="true">
                                    <h4><?php echo $tag["tag_name"];?></h4>
                                </div>
                                <div class="accordion-body collapse" id="tag-panel-<?php echo $tag["tag_id"];?>">
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <button class="btn btn-info sua-btn" tag_id = "<?php echo $tag["tag_id"];?>">Sửa</button><button class="btn btn-info luu-btn" ltag_id = "<?php echo $tag["tag_id"];?>" style = "display: none;">Lưu</button><button class="btn btn-danger" onclick="alert('Chức năng tạm khóa!')">Xóa</button>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Tên
                                            <span ntag_id = "<?php echo $tag["tag_id"];?>"><?php echo $tag["tag_name"];?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Loại Tag
                                            <?php if ($tag["tag_type"] == 1): ?>
                                                <span>Đèn Switch</span>
                                            <?php endif ?>
                                            <?php if ($tag["tag_type"] == 2): ?>
                                                <span>Cảm Biến Gauge</span>
                                            <?php endif ?>
                                        </li>
                                        <?php if ($tag["tag_type"] == 2): ?>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Đơn Vị
                                            <span utag_id = "<?php echo $tag["tag_id"];?>"><?php echo $tag["tag_unit"];?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Giá trị min.
                                            <span mitag_id = "<?php echo $tag["tag_id"];?>"><?php echo $tag["tag_min"];?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Giá trị max.
                                            <span mtag_id = "<?php echo $tag["tag_id"];?>"><?php echo $tag["tag_max"];?></span>
                                        </li>
                                        <?php endif ?>
                                    </ul>
                                </div>
                            </div>
                            <?php endforeach ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Danh Sách MCU</h4> <button class="btn btn-info float-right" onclick="alert('Chức năng tạm khóa!!');">Thêm</button>
                    </div>
                    <div class="card-body">
                        <div id="accordion">
                            <?php foreach ($mcus as $mcu):?>
                                <div class="accordion">
                                <div class="accordion-header" role="button" data-toggle="collapse" data-target="#mcu-panel-<?php echo $mcu["mcu_id"];?>" aria-expanded="true">
                                    <h4><?php echo $mcu["mcu_name"];?></h4>
                                </div>
                                <div class="accordion-body collapse" id="mcu-panel-<?php echo $mcu["mcu_id"];?>">
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <button class="btn btn-danger" onclick="alert('Chức năng tạm khóa!')">Xóa</button>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Tên
                                            <span><?php echo $mcu["mcu_name"];?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Mã Khóa
                                            <span><?php echo $mcu["mcu_key"];?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>