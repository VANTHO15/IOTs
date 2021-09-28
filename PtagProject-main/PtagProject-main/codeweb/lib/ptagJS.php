<script src="<?php echo $home_url;?>/template/vendors/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<script type="text/javascript">
	var load = 1;
		queqe = 0;
	$("input[type=checkbox]").click(function() {
		var tag_id = $(this).attr("tag_id");
		var tag_stt = 0;
		load =0;
		queqe = queqe + 1;
		$("#img_"+tag_id).attr("src", "https://minhthuc.xyz/src/img/loader.gif");
		$("#img_"+tag_id).attr("style", "background-color: blue");
		$("#lbl_"+tag_id).attr("class","badge badge-pill badge-sm badge-primary");
		$("#lbl_"+tag_id).text("Xử lý");
        if (this.checked){
            tag_stt = 1;
        }
        else{
            tag_stt = 0;
        }

        $.ajax({
		type: "POST",
		url: "../model/Ajax.php",
		data: {
		event : "set_tag_stt",
		tag_id : tag_id,
		tag_stt : tag_stt,
		}
		}).done(function(msg) {
			obj = JSON.parse(msg);
			console.log(msg);
			if(obj["mess"] === true)
              {
                queqe = queqe -1;
                if (queqe < 1) {load = 1;}
              }
		});
	});
	<?php foreach ($tags as $tag):?>
		var tag_<?php echo $tag['tag_id'];?>=<?php echo $tag['tag_value1'];?>;
	<?php endforeach;?>

	setInterval(load_tag, 100);

	function load_tag() {
		$.ajax({
			type: "POST",
			url: "../model/Ajax.php",
			data: {
			event : "load_tag_stt",
			}
			}).done(function(msg) {
			obj = JSON.parse(msg);
			if (load === 1) {
				<?php foreach ($tags as $tag):?>
					tag_<?php echo $tag['tag_id'];?>=obj["tag_<?php echo $tag['tag_id'];?>"];
					if(tag_<?php echo $tag['tag_id'];?> == 1)
					{
						$("#img_<?php echo $tag['tag_id'];?>").attr("src", "https://minhthuc.xyz/src/img/bulb.svg");
						$("#img_<?php echo $tag['tag_id'];?>").attr("style", "background-color: green");
						$("#lbl_<?php echo $tag['tag_id'];?>").attr("class","badge badge-pill badge-sm badge-success");
						$("#lbl_<?php echo $tag['tag_id'];?>").text("Đang Bật");
						$("input[tag_id=<?php echo $tag['tag_id'];?>]").prop("checked", true);
					}
					else if(tag_<?php echo $tag['tag_id'];?> == 0)
					{
						$("#img_<?php echo $tag['tag_id'];?>").attr("src", "https://minhthuc.xyz/src/img/bulb.svg");
						$("#img_<?php echo $tag['tag_id'];?>").attr("style", "background-color: grey");
						$("#lbl_<?php echo $tag['tag_id'];?>").attr("class","badge badge-pill badge-sm badge-dark");
						$("#lbl_<?php echo $tag['tag_id'];?>").text("Đang Tắt");
						$("input[tag_id=<?php echo $tag['tag_id'];?>]").prop("checked", false);
					}
				<?php endforeach;?>
			}
			
		});
	}
</script>

<script type="text/javascript">
	$("#range_01").ionRangeSlider({
		min: 0,
		max: 100,
		from: 0,
		type: "single",
		grid: true,
		prefix: "%"
	});
</script>
