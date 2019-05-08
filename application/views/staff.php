<section class="section_width_slider">
    <div class="container">
        <div class="slider unset_overflow" style="text-align:center;">
            <img class="left_side_img" src="<?=base_url('admin/assets/uploads/files/').$row['image']?>" alt="" title="" width="124px">
            <p style="color:#4d5b6b;font-size: 13px;"><?=$row['full_name']?></p>
        </div>

        <div class="homepage_content">
            <p>
                <?=strip_tags($row['description'])?>
            </p>

        </div>
    </div>
</section>

