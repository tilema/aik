<section class="section_width_slider">
    <div class="container"><?
        if (!empty($result)) :
            foreach ($result  as $value) :
                ?>
                <div class="team_item">
                <div class="position">
                    <h5><?=$value['position']?></h5>
                </div>
                <img class="person" src="<?=base_url('admin/assets/uploads/files/').$value['image']?>" title="" alt="">
                <h5><a href="<?=base_url(($this->uri->segment(1) != '' ? $this->uri->segment(1) : 'hy').'/staff/').$value['id']?>"><?=$value['full_name']?></a></h5>
                </div><?
            endforeach;
        endif;
        ?>
    </div>
</section>

