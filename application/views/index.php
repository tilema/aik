<style>
    #read {
        cursor: pointer;
    }

    #more {
        display: none;
    }
</style>

<section class="section_width_slider">
    <div class="container">
        <div class="slider">
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <img src="<?= base_url('admin/assets/uploads/files/') . $image1 ?>" alt="" title="">
                    <p>
                        <a href="<?= base_url(($this->uri->segment(1) != '' ? $this->uri->segment(1) : 'hy') . '/news') ?>">Ընկերության
                            լուրեր</a></p>
                </div>
                <div class="item">
                    <img src="<?= base_url('admin/assets/uploads/files/') . $image2 ?>" alt="" title="">
                    <p>
                        <a href="<?= base_url(($this->uri->segment(1) != '' ? $this->uri->segment(1) : 'hy') . '/publishment') ?>">Հրատարակումներ</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="homepage_content">
                    <?=$this->load->readMore($text, 56)?>
                </div>
    </div>
</section>


<script src="<?= base_url('assets/js/owlcarousel/owl.carousel.min.js') ?>"></script>
<script>
    $(document).ready(function () {
        $('.owl-carousel').owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            dots: true
        });
    })


    function readMS() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("read");

        dots.style.display = "none";
        btnText.remove();
        moreText.style.display = "inline";

    }
</script>

