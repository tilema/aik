


        <section class="section_width_slider">
            <div class="container">
                <h4 class="news_title"><?=lang('publications')?></h4>
            </div>
            <div class="container">
                <ul class="ul_list news_list">
                    <?
                    if(!empty($result)) :
                        foreach ($result as $value) :
                    ?>
                    <li>
                        <span class="date"><?=date_format(date_create($value['date']), 'd.m.Y')?></span>
                        <p><?=$this->load->shortText(strip_tags($value['text']), 12)?><a href="<?=base_url(($this->uri->segment(1) != '' ? $this->uri->segment(1) : 'hy').'/single_publications/').$value['id']?>">կարդալ ավելին</a></p>
                    </li>
                    <?
                        endforeach;
                    endif;
                    ?>
                </ul>
            </div>
        </section>


