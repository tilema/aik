<section>
    <div class="container container_100 pos_rel">
        <img class="abs_img" src="<?=base_url('assets/img/homepage/Layer-31.png')?>" alt="" title="" >
        <p class="row_text"><?=lang('aik_ltd')?></p>
    </div>
</section>
</div>
<footer>
    <div class="container">
        <p class="footer_title" id="footer_title"><?=lang('Contact_us')?></p>
    </div>

    <div class="container mt_10">
        <div class="map">
            <div class="mark_phone">
                <p><img src="<?=base_url('assets/img/homepage/marker.png')?>" alt="" title="" > ք.Երևան, Կիևյան 4</p>
                <p><img src="<?=base_url('assets/img/homepage/phone.png')?>" alt="" title="" > +374 10 23 01 21</p>
            </div>
            <div class="my_map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3047.723094600095!2d44.483056514797454!3d40.19297547714236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x406abd0ccd5a15ef%3A0x99fd3616b210d79b!2zNCBLaWV2eWFuIFN0LCBZZXJldmFuIDAwMjgsINCQ0YDQvNC10L3QuNGP!5e0!3m2!1sru!2s!4v1553958905884!5m2!1sru!2s" width="90%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>

        <div class="form">
            <p class="send_me_message">Ուղարկել էլ. նամակ</p>

            <input type="text" placeholder="<?=lang('firstLast_name')?>" />
            <input type="email" placeholder="<?=lang('yourEmail')?>" />

            <textarea></textarea>

            <div class="position_right">
                <button class="send"><?=lang('Submit')?></button>
            </div>
        </div>
    </div>

    <div class="container_100 bg_100 pos_rel">
        <div class="nav">
            <ul>
                <li><a href="<?=base_url(($this->uri->segment(1) != '' ? $this->uri->segment(1) : 'hy'))?>"><?=lang('Home')?></a></li>
                <li><a href="<?=base_url(($this->uri->segment(1) != '' ? $this->uri->segment(1) : 'hy').'/company')?>"><?=lang('company')?></a></li>
                <li><a href="<?=base_url(($this->uri->segment(1) != '' ? $this->uri->segment(1) : 'hy').'/our_team')?>"><?=lang('our_team')?></a></li>
                <li><a href="<?=base_url(($this->uri->segment(1) != '' ? $this->uri->segment(1) : 'hy').'/customers')?>"><?=lang('customers')?></a></li>
            </ul>



            <ul>
                <li><a href="<?=base_url(($this->uri->segment(1) != '' ? $this->uri->segment(1) : 'hy').'/library')?>"><?=lang('library')?></a></li>
                <li><a href="<?=base_url(($this->uri->segment(1) != '' ? $this->uri->segment(1) : 'hy').'/services')?>"><?=lang('services')?></a></li>
                <li><a href="#footer_title"><?=lang('Contact_us')?></a></li>
            </ul>
        </div>
        <img class="footer_abs_img" src="<?=base_url('assets/img/homepage/Layer-31.png')?>" alt="" title="" >
    </div>
</footer>

<script>
    $(document).on('click', '.language > span:not(.active)', function () {
        var lang = $(this).data('lang');
        var current_url = '<?=current_url()?>';
        var page = '<?=$this->router->fetch_method()?>';
        $.ajax({
            type: 'POST',
            url: '<?=base_url('Main/change_lang')?>',
            data: {lang: lang, current_url: current_url, page: page},
            success: function (url) {
                console.log(url);
                if (url != '') {
                    $(location).attr('href', url);
                }
            }
        });
    });
</script>



</body>
</html>