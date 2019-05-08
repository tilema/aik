<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="<?=base_url('assets/img/homepage/Logo.png')?>" type="image/png">
    <?= (isset($meta_tags) ? $meta_tags : '') ?>
    <title><?=($title)?></title>

    <link rel="stylesheet" href="<?=base_url('assets/css/reset.css')?>" >
    <link rel="stylesheet" href="<?=base_url('assets/css/owlcarousel/owl.carousel.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/owlcarousel/owl.theme.default.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/style.css')?>" >
    <script src="<?=base_url('assets/js/jquery-3.3.1.min.js')?>"></script>
</head>
<body>

<div class="background">
    <header>
        <div class="container">
            <div class="logo">
                <a href="<?=base_url()?>">
                    <img src="<?=base_url('assets/img/homepage/Logo.png')?>" alt="logo" title="logo" >
                </a>
            </div>
            <nav>
                <ul>
                    <li><a href="<?=base_url(($this->uri->segment(1) != '' ? $this->uri->segment(1) : 'hy'))?>"><?=lang('Home')?></a></li>
                    <li><a href="<?=base_url(($this->uri->segment(1) != '' ? $this->uri->segment(1) : 'hy').'/company')?>"><?=lang('company')?></a></li>
                    <li><a href="<?=base_url(($this->uri->segment(1) != '' ? $this->uri->segment(1) : 'hy').'/our_team')?>"><?=lang('our_team')?></a></li>
                    <li><a href="<?=base_url(($this->uri->segment(1) != '' ? $this->uri->segment(1) : 'hy').'/customers')?>"><?=lang('customers')?></a></li>
                </ul>

                <ul>
                    <li class="parent_sub_menu"><a href="<?=base_url(($this->uri->segment(1) != '' ? $this->uri->segment(1) : 'hy').'/library')?>"><?=lang('library')?></a>
                        <ul class="sub_menu">
                            <li><a href="<?=base_url(($this->uri->segment(1) != '' ? $this->uri->segment(1) : 'hy').'/datakan_akter')?>"><?=lang('judicial_acts')?></a></li>
                            <li><a href="<?=base_url(($this->uri->segment(1) != '' ? $this->uri->segment(1) : 'hy').'/orensdrakan_popoxutyunner_naxagcer')?>"><?=lang('ordinary_changes_projects')?></a></li>
                            <li><a href="<?=base_url(($this->uri->segment(1) != '' ? $this->uri->segment(1) : 'hy').'/orensdrakan_popoxutyunner')?>"><?=lang('ordinary_changes')?></a></li>
                            <li><a href="<?=base_url(($this->uri->segment(1) != '' ? $this->uri->segment(1) : 'hy').'/iravakan_verlucutyunner')?>"><?=lang('legal_analysis')?></a></li>
                        </ul>
                    </li>
                    <li><a href="<?=base_url(($this->uri->segment(1) != '' ? $this->uri->segment(1) : 'hy').'/services')?>"><?=lang('services')?></a></li>
                    <li><a href="#footer_title"><?=lang('Contact_us')?></a></li>
                </ul>
            </nav>

            <div class="language">
                <span class="<?= (($this->uri->segment(1) == 'hy' or $this->uri->segment(1) == '') ? 'active' : '') ?>" data-lang="hy" >Հայ</span>
                <span class="<?= ($this->uri->segment(1) == 'ru'  ? 'active' : '') ?>" data-lang="ru" >Рус</span>
                <span class="<?= ($this->uri->segment(1) == 'en'  ? 'active' : '') ?>"  data-lang="en" >Eng</span>
            </div>
        </div>
    </header>