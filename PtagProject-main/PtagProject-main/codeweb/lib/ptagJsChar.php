<script src="<?php echo $home_url; ?>/template/vendors/plugins/jQuery-Knob-master/jquery.knob.min.js"></script>
<?php foreach ($tags as $tag): if($tag["tag_type"]==2):?>
    <script>
        $(".tag_<?php echo $tag["tag_id"];?>").knob();
        $({animatedVal: 0}).animate({animatedVal: <?php echo $tag["tag_value1"];?>}, {
            duration: 1000,
            easing: "swing",
            step: function() {
                $(".tag_<?php echo $tag["tag_id"];?>").val(Math.ceil(this.animatedVal)).trigger("change");
            }
        });
    </script>
<?php endif; endforeach;?>