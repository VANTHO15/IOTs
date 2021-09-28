<!--modal-->
<div class="modal fade mcu-connect" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
          aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mySmallModalLabel">Tình Trạng Mcu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Tên</th>
                          <th scope="col">Mã khóa</th>
                          <th scope="col">Tình Trạng</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($mcus as $mcu):?>
                        <tr>
                          <th scope="row"><?php echo $mcu["mcu_id"];?></th>
                          <td><?php echo $mcu["mcu_name"];?></td>
                          <td>*******</td>
                          <td class="text-success" mt_atr="lbl_mcu_stt_<?php echo $mcu["mcu_id"];?>"><?php echo $mcu["mcu_lasttime"];?></td>
                        </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
<div class="settingSidebar">
    <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
    </a>
    <div class="settingSidebar-body ps-container ps-theme-default">
        <div class=" fade show active">
            <div class="setting-panel-header">Setting Panel
            </div>
            <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                    <label class="selectgroup-item">
                        <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                        <span class="selectgroup-button">Light</span>
                    </label>
                    <label class="selectgroup-item">
                        <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                        <span class="selectgroup-button">Dark</span>
                    </label>
                </div>
            </div>
            <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                    <label class="selectgroup-item">
                        <input type="radio" id="nut1" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                        <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip" data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                    </label>
                    <label class="selectgroup-item">
                        <input type="radio" id="nut2" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                        <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip" data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                    </label>
                </div>
            </div>
            <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                    <ul class="choose-theme list-unstyled mb-0">
                        <li title="white" class="active">
                            <div class="white"></div>
                        </li>
                        <li title="cyan">
                            <div class="cyan"></div>
                        </li>
                        <li title="black">
                            <div class="black"></div>
                        </li>
                        <li title="purple">
                            <div class="purple"></div>
                        </li>
                        <li title="orange">
                            <div class="orange"></div>
                        </li>
                        <li title="green">
                            <div class="green"></div>
                        </li>
                        <li title="red">
                            <div class="red"></div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                    <label class="m-b-0">
                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" id="mini_sidebar_setting">
                        <span class="custom-switch-indicator"></span>
                        <span class="control-label p-l-10">Mini Sidebar</span>
                    </label>
                </div>
            </div>
            <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                    <label class="m-b-0">
                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" id="sticky_header_setting">
                        <span class="custom-switch-indicator"></span>
                        <span class="control-label p-l-10">Sticky Header</span>
                    </label>
                </div>
            </div>
            <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                    <i class="fas fa-undo"></i> Restore Default
                </a>
            </div>
        </div>
    </div>
</div>
</div>
<footer class="main-footer">
    <div class="footer-left">
        <a href="https://minhthuc.xyz">Minh Thức - PemyTeam</a></a>
    </div>
    <div class="footer-right">
        Phiên bản 1.0.1mt
    </div>
</footer>
</div>
</div>
<!-- General JS Scripts -->
<script src="<?php echo $home_url;?>/template/v2/assets/js/app.min.js"></script>
<!-- Template JS File -->
<script src="<?php echo $home_url;?>/template/v2/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="<?php echo $home_url;?>/template/v2/assets/js/custom.js"></script>
<!-- JS Libraies -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/echarts@5/dist/echarts.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/echarts@5/dist/extension/dataTool.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo $home_url;?>/template/v2/assets/bundles/prism/prism.js"></script>
</body>
<script type="text/javascript">
    var load = 1;
    setInterval(load_tag_stt, 100);
    function load_tag_stt() {
        $.ajax({
            type: "POST",
            url: "../../model/Ajax.php",
            data: {
                event: "load_tag_stt",
            }
        }).done(function(msg) {
            obj = JSON.parse(msg);
            if (load === 1) {
                <?php foreach ($mcus as $mcu):?>
                    mcu_stt_<?php echo $mcu['mcu_id'];?> = obj["mcu_stt_<?php echo $mcu['mcu_id'];?>"];
                    if (mcu_stt_<?php echo $mcu['mcu_id'];?> == 0) {
                        $("td[mt_atr='lbl_mcu_stt_<?php echo $mcu['mcu_id'];?>']").html("Mất kết nối");
                        $("td[mt_atr='lbl_mcu_stt_<?php echo $mcu['mcu_id'];?>']").attr("class","text-danger");
                    }
                    else if (mcu_stt_<?php echo $mcu['mcu_id'];?> == 0) {
                        $("td[mt_atr='lbl_mcu_stt_<?php echo $mcu['mcu_id'];?>']").html("Kết nối");
                        $("td[mt_atr='lbl_mcu_stt_<?php echo $mcu['mcu_id'];?>']").attr("class","text-success");
                    }
                    console.log(mcu_stt_<?php echo $mcu['mcu_id'];?>);
                <?php endforeach ?>
                

            
            if (obj["stt"] == 1) {
                $("#ico_stt").attr("class","text-success");
                $("a[mt_atr='lbl_stt']").attr("class","nav-link nav-link-lg text-success");
                $("a[mt_atr='lbl_stt']").html("Đang kết nối");
            }
            else
            {
                $("#ico_stt").attr("class","text-danger");
                $("a[mt_atr='lbl_stt']").attr("class","nav-link nav-link-lg text-danger");
                $("a[mt_atr='lbl_stt']").html("Mất kết nối");
            }

            
            }
        });
    }
</script>

<script type="text/javascript">
    $(".sua-btn").click(function () {
        var a= $(this).attr('tag_id');
        var b = $("span[tag_id='"+a+"']").text();
        $("span[tag_id='"+a+"']").html('<input tag_id = "'+a+'" type="text" class="form-control" value="' + b + '">');
        $(this).attr("style","display:none");
        $("button[ltag_id='"+a+"']").attr("style","display:block");
    });

     $(".luu-btn").click(function () {
        var a= $(this).attr('ltag_id');
        var b = $("input[tag_id='"+a+"']").val();
        $("span[tag_id='"+a+"']").html(b);
        $(this).attr("style","display:none");
        $("button[tag_id='"+a+"']").attr("style","display:block");
    });
</script>

</html>