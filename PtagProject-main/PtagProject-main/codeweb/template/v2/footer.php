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
<!-- Chart code -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js"></script>
<script type="text/javascript">
    var size = 120,
        thickness = 40;
    var color = d3.scale.linear()
        .domain([0, 50, 100])
        .range(['#db2828', '#fbbd08', '#21ba45']);
    // .domain([0, 17, 33, 50, 67, 83, 100])
    // .range(['#db4639', '#db7f29', '#d1bf1f', '#92c51b', '#48ba17', '#12ab24', '#0f9f59']);

    var arc = d3.svg.arc()
        .innerRadius(size - thickness)
        .outerRadius(size)
        .startAngle(-Math.PI / 2);

    var svg = d3.select('#chart').append('svg')
        .attr('width', size * 2)
        .attr('height', size + 20)
        .attr('class', 'gauge');

    var chart = svg.append('g')
        .attr('transform', 'translate(' + size + ',' + size + ')')

    var background = chart.append('path')
        .datum({
            endAngle: Math.PI / 2
        })
        .attr('class', 'background')
        .attr('d', arc);

    var foreground = chart.append('path')
        .datum({
            endAngle: -Math.PI / 2
        })
        .style('fill', '#db2828')
        .attr('d', arc);

    var value = svg.append('g')
        .attr('transform', 'translate(' + size + ',' + (size * .9) + ')')
        .append('text')
        .text(0)
        .attr('text-anchor', 'middle')
        .attr('class', 'value');

    var scale = svg.append('g')
        .attr('transform', 'translate(' + size + ',' + (size + 15) + ')')
        .attr('class', 'scale');

    scale.append('text')
        .text(100)
        .attr('text-anchor', 'middle')
        .attr('x', (size - thickness / 2));

    scale.append('text')
        .text(0)
        .attr('text-anchor', 'middle')
        .attr('x', -(size - thickness / 2));
        update(0);
    function update(v) {
        v = d3.format('.1f')(v);
        foreground.transition()
            .duration(250)
            .style('fill', function() {
                return color(v);
            })
            .call(arcTween, v);

        value.transition()
            .duration(250)
            .call(textTween, v);
    }

    function arcTween(transition, v) {
        var newAngle = v / 100 * Math.PI - Math.PI / 2;
        transition.attrTween('d', function(d) {
            var interpolate = d3.interpolate(d.endAngle, newAngle);
            return function(t) {
                d.endAngle = interpolate(t);
                return arc(d);
            };
        });
    }

    function textTween(transition, v) {
        transition.tween('text', function() {
            var interpolate = d3.interpolate(this.innerHTML, v),
                split = (v + '').split('.'),
                round = (split.length > 1) ? Math.pow(10, split[1].length) : 1;
            return function(t) {
                this.innerHTML = d3.format('.1f')(Math.round(interpolate(t) * round) / round) + '<tspan> Độ C</tspan>';
            };
        });
    }
</script>
<!--EChar-->
<script type="text/javascript">
    /* line chart */
    var chart = document.getElementById('echart_area_line');
    var lineChart = echarts.init(chart);

    lineChart.setOption({
        tooltip: {
            trigger: "axis",
        },
        legend: {
            textStyle: { color: '#9aa0ac' },
            data: ["Đèn 1", "Đèn 2", "Đèn 3"]
        },
        grid: {
            bottom: 20,
            left: 30,
            right: 30,
            top: 30,
        },
        calculable: !0,
        xAxis: [{
            type: "category",
            boundaryGap: !1,
            data: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ Nhật"],
            axisLabel: {
                fontSize: 10,
                color: '#9aa0ac',
            }
        }],
        yAxis: [{
            type: "value",
            axisLabel: {
                fontSize: 10,
                color: '#9aa0ac',
                formatter: '{value}h'
            }
        }],
        series: [{
            name: "Đèn 1",
            type: "line",
            smooth: !0,
            itemStyle: {
                normal: {
                    areaStyle: {
                        type: "default"
                    }
                }
            },
            data: [2, 4, 8, 6, 1, 10, 9]
        }, {
            name: "Đèn 2",
            type: "line",
            smooth: !0,
            itemStyle: {
                normal: {
                    areaStyle: {
                        type: "default"
                    }
                }
            },
            data: [5, 7, 8, 2, 1, 3, 6]
        }, {
            name: "Đèn 3",
            type: "line",
            smooth: !0,
            itemStyle: {
                normal: {
                    areaStyle: {
                        type: "default"
                    }
                }
            },
            data: [10, 10, 6, 6, 10, 1, 12]
        }],
        color: ['#9f78ff', '#fa626b', '#32cafe', ]
    });
</script>
<!--SW Tag-->
<script type="text/javascript">
    var load = 1;
    <?php foreach ($tags as $tag):?>
    var tag_value1_<?php echo $tag['tag_id'];?> = <?php echo $tag['tag_value1'];?>;
    <?php endforeach;?>
    $("input[type = checkbox]").click(function() {
        load = 0;
        var tag_id = $(this).attr("tag_id");
        $(this).prop("disabled", true);
        $("img[mt_atr='img_tag_"+tag_id+"']").attr("src", "<?php echo $home_url;?>/template/v2/assets/img/loader.gif");
        $("div[mt_atr='lbl_tagstt_"+tag_id+"']").html("<i class=\"fas fa-circle\"></i> Đang Bật");
        $("div[mt_atr='lbl_tagstt_"+tag_id+"']").attr("class", "text-success text-small font-600-bold");
        if (this.checked){
            tag_value1 = 1;
        }
        else{
            tag_value1 = 0;
        }

        $.ajax({
        type: "POST",
        url: "../../model/Ajax.php",
        data: {
            event : "set_tag_stt",
            tag_id : tag_id,
            tag_value1 : tag_value1,
        }
        }).done(function(msg) {
            obj = JSON.parse(msg);
            if(obj["mess"] === true)
              {
                load = 1;
              }
        });
    });
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
                    else if (mcu_stt_<?php echo $mcu['mcu_id'];?> == 1) {
                        $("td[mt_atr='lbl_mcu_stt_<?php echo $mcu['mcu_id'];?>']").html("Kết nối");
                        $("td[mt_atr='lbl_mcu_stt_<?php echo $mcu['mcu_id'];?>']").attr("class","text-success");
                    }
                    console.log(mcu_stt_<?php echo $mcu['mcu_id'];?>);
                <?php endforeach ?>
                <?php foreach ($tags as $tag):if($tag["tag_type"] == 1 && $tag["delete"] == 0 || $tag["tag_type"] == 3 && $tag["delete"] == 0 ):?>
                tag_value1_<?php echo $tag['tag_id'];?> = obj["tag_value1_<?php echo $tag['tag_id'];?>"];
                if (tag_value1_<?php echo $tag['tag_id'];?> == 1 && obj["stt"] == 1) {
                    $("img[mt_atr='img_tag_<?php echo $tag['tag_id'];?>']").attr("src", "<?php echo $home_url;?>/template/v2/assets/img/bulb_on.png");
                    $("div[mt_atr='lbl_tagstt_<?php echo $tag['tag_id'];?>']").html("<i class=\"fas fa-circle\"></i> Đang Bật");
                    $("div[mt_atr='lbl_tagstt_<?php echo $tag['tag_id'];?>']").attr("class", "text-success text-small font-600-bold");
                    $("input[mt_atr='ck_tag_<?php echo $tag['tag_id'];?>']").prop("disabled", false);
                    $("input[mt_atr='ck_tag_<?php echo $tag['tag_id'];?>']").prop("checked", true);
                } else if (tag_value1_<?php echo $tag['tag_id'];?> == 0 && obj["stt"] == 1) {
                    $("img[mt_atr='img_tag_<?php echo $tag['tag_id'];?>']").attr("src", "<?php echo $home_url;?>/template/v2/assets/img/bulb_off.png");
                    $("div[mt_atr='lbl_tagstt_<?php echo $tag['tag_id'];?>']").html("<i class=\"fas fa-circle\"></i> Đang Tắt");
                    $("div[mt_atr='lbl_tagstt_<?php echo $tag['tag_id'];?>']").attr("class", "text-danger text-small font-600-bold");
                    $("input[mt_atr='ck_tag_<?php echo $tag['tag_id'];?>']").prop("disabled", false);
                    $("input[mt_atr='ck_tag_<?php echo $tag['tag_id'];?>']").prop("checked", false);
                }

            <?php endif; if($tag["tag_type"] == 2):?>
                tag_value1_<?php echo $tag['tag_id'];?> = obj["tag_value1_<?php echo $tag['tag_id'];?>"];
            <?php endif;endforeach;?>
                else if (obj["stt"] == 0) {
            <?php foreach ($tags as $tag):if($tag["tag_type"] == 1 && $tag["delete"] == 0 || $tag["tag_type"] == 3 && $tag["delete"] == 0 ):?>
                    $("img[mt_atr='img_tag_<?php echo $tag['tag_id'];?>']").attr("src", "https://cdn3.iconfinder.com/data/icons/living/24/251_plug_socket_disconnect-512.png");
                    $("div[mt_atr='lbl_tagstt_<?php echo $tag['tag_id'];?>']").html("<i class=\"fas fa-circle\"></i> Mất kết nối");
                    $("div[mt_atr='lbl_tagstt_<?php echo $tag['tag_id'];?>']").attr("class", "text-danger text-small font-600-bold");
                    $("input[mt_atr='ck_tag_<?php echo $tag['tag_id'];?>']").prop("disabled", true);
                    $("input[mt_atr='ck_tag_<?php echo $tag['tag_id'];?>']").prop("checked", false);
            <?php endif;endforeach;?>
                }

            
            if (obj["stt"] == 1) {
                update(tag_value1_3);
                $("#ico_stt").attr("class","text-success");
                $("a[mt_atr='lbl_stt']").attr("class","nav-link nav-link-lg text-success");
                $("a[mt_atr='lbl_stt']").html("Đang kết nối");
            }
            else
            {
                update(null);
                $("#ico_stt").attr("class","text-danger");
                $("a[mt_atr='lbl_stt']").attr("class","nav-link nav-link-lg text-danger");
                $("a[mt_atr='lbl_stt']").html("Mất kết nối");
            }

            
            }
        });
    }
$("input[mt_atr='ck_tag_1']").prop("checked", true);
$("input[mt_atr='ck_tag_1']").prop("disabled", false);
</script>

</html>