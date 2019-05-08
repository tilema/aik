

        <section class="section_width_slider">
            <div class="container">
                <div class="slider unset_overflow">

                    <h4><?=$row['title']?></h4>
                    <h6 class="date"><?=date_format(date_create($row['date']), 'd.m.Y')?></h6>
                    <img class="left_side_img single_news_image" src="<?=base_url('admin/assets/uploads/files/').$row['image']?>" alt="" title="" >
                </div>

                <div class="homepage_content">
                    <p>
                         <?=strip_tags($row['text'])?>
                    </p>
                </div>
            </div>
        </section>

