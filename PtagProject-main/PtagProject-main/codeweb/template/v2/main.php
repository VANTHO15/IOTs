<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 col-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>Nhiệt Độ Phòng</h4>
                  </div>
                  <div class="card-body text-center">
                    <div id="chart"></div>
                  </div>
                </div>
              </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Thiết Bị Chiếu Sáng</h4>
                        <div class="card-header-action">
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border">
                            <?php foreach ($tags as $tag):if($tag["tag_type"] == 1 && $tag["delete"] == 0 || $tag["tag_type"] == 3 && $tag["delete"] == 0 ):?>
                            <li class="media">
                                <img alt="image" mt_atr="img_tag_<?php echo $tag['tag_id']; ?>" class="mr-3 rounded-circle bg-info" width="50" height="50" src="<?php echo $home_url;?>/template/v2/assets/img/loader.gif">
                                <div class="media-body">
                                    <div class="pretty p-switch p-fill float-right">
                                        <input tag_id = "<?php echo $tag['tag_id'];?>" mt_atr="ck_tag_<?php echo $tag['tag_id']; ?>" type="checkbox" disabled>
                                        <div  mt_atr="ck_lbl_<?php echo $tag['tag_id']; ?>" class="state p-success">
                                            <label></label>
                                        </div>
                                    </div>
                                    <div mt_atr="lbl_tagname_<?php echo $tag['tag_id']; ?>" class="mt-0 mb-1 font-weight-bold">
                                        <?php echo $tag['tag_name']; ?>
                                    </div>
                                    <div mt_atr="lbl_tagstt_<?php echo $tag['tag_id']; ?>" class="text-info text-small font-600-bold"><i class="fas fa-circle"></i> Đang tải</div>
                                </div>
                            </li>
                            <?php endif;endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 col-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>Thời Gian Sử Dụng</h4>
                  </div>
                  <div class="card-body">
                    <div id="echart_area_line" style="height: 250px; width: 100%"></div>
                  </div>
                </div>
              </div>
        </div>
    </section>