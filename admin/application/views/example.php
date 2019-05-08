<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>



</head>


<body>
	<div>


        <a <?=($this->router->fetch_method() == 'homepage_management' ? 'class="active"' : '')?> href='<?php echo site_url('examples/homepage_management/edit/1')?>'>Homepage</a> |
        <a <?=($this->router->fetch_method() == 'content_management' ? 'class="active"' : '')?> href='<?php echo site_url('examples/content_management')?>'>Content</a> |
        <a <?=($this->router->fetch_method() == 'staff_management' ? 'class="active"' : '')?> href='<?php echo site_url('examples/staff_management')?>'>Staff</a> |
        <a <?=($this->router->fetch_method() == 'customer_management' ? 'class="active"' : '')?> href='<?php echo site_url('examples/customer_management')?>'>Customer</a> |
        <a <?=($this->router->fetch_method() == 'company_management' ? 'class="active"' : '')?> href='<?php echo site_url('examples/company_management/edit/1')?>'>Company</a> |
        <a <?=($this->router->fetch_method() == 'library_management' ? 'class="active"' : '')?> href='<?php echo site_url('examples/library_management/edit/1')?>'>Library</a> |
        <a <?=($this->router->fetch_method() == 'services_management' ? 'class="active"' : '')?> href='<?php echo site_url('examples/services_management/edit/1')?>'>Services</a> |

        <a class="navbar-nav ml-auto" href="<?= base_url() ?>index.php/welcome/logout"><img width="30" height="30"
                                                           src="<?= base_url() ?>/assets/img/logout.png"></a>
	</div>
	<div style='height:20px;'></div>  
    <div style="padding: 10px">
		<?php echo $output; ?>
    </div>
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
    <?
    if($this->router->fetch_method() == 'content_management') {
        ?>
        <script>
            if($('select[name="type_id"]').val() != 5) {
                $('#image_field_box').css('display', 'none');
            }

            <?
            if($this->uri->segment(3) == 'add') {
            ?>
                $('input[name="date"]').val('<?=date('d/m/Y');?>');
            <?
            }
            ?>

            $(document).on('change', 'select[name="type_id"]', function () {
                if($(this).val() != 5) {
                    $('#image_field_box').css('display', 'none');
                } else {
                    $('#image_field_box').css('display', 'block');
                }
            });

        </script>
        <?
    } else if($this->router->fetch_method() == 'homepage_management') {

        if($this->uri->segment(3) != 'edit') {
            redirect(site_url('examples/homepage_management/edit/1'));
        }

        ?>
         <script>
            $('.datatables-add-button').remove();
            $('.ui-icon-copy').parent('a').remove();
            $('.ui-icon-circle-minus').parent('a').remove();
            $('#save-and-go-back-button').remove();
         </script>
        <?
    }  else if($this->router->fetch_method() == 'company_management') {

        if($this->uri->segment(3) != 'edit') {
            redirect(site_url('examples/company_management/edit/1'));
        }

        ?>
    <script>
        $('.datatables-add-button').remove();
        $('.ui-icon-copy').parent('a').remove();
        $('.ui-icon-circle-minus').parent('a').remove();
        $('#save-and-go-back-button').remove();
    </script>
    <?
    } else if($this->router->fetch_method() == 'library_management') {

    if($this->uri->segment(3) != 'edit') {
        redirect(site_url('examples/library_management/edit/1'));
    }

    ?>
        <script>
            $('.datatables-add-button').remove();
            $('.ui-icon-copy').parent('a').remove();
            $('.ui-icon-circle-minus').parent('a').remove();
            $('#save-and-go-back-button').remove();
        </script>
        <?
    } else if($this->router->fetch_method() == 'services_management') {

    if($this->uri->segment(3) != 'edit') {
        redirect(site_url('examples/services_management/edit/1'));
    }

    ?>
        <script>
            $('.datatables-add-button').remove();
            $('.ui-icon-copy').parent('a').remove();
            $('.ui-icon-circle-minus').parent('a').remove();
            $('#save-and-go-back-button').remove();
        </script>
        <?
    }
    ?>

    <style>
        #field-full_title_hy {
            width: 800px !important;
        }
        #field-full_title_ru {
            width: 800px !important;
        }
        #field-full_title_en {
            width: 800px !important;
        }

        a.navbar-nav.ml-auto {
            float: right;
        }

        a.active {
            color: red;
            /* background: white; */
        }
    </style>

</body>
</html>
