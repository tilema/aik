<?php

	$this->set_css($this->default_theme_path.'/datatables/css/datatables.css');
    $this->set_js_lib($this->default_javascript_path.'/jquery_plugins/jquery.form.min.js');
	$this->set_js_config($this->default_theme_path.'/datatables/js/datatables-add.js');
	$this->set_css($this->default_css_path.'/ui/simple/'.grocery_CRUD::JQUERY_UI_CSS);
	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/ui/'.grocery_CRUD::JQUERY_UI_JS);

	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/jquery.noty.js');
	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/config/jquery.noty.config.js');
?>


<style>

    .lk {
        width: 100% !important;
    }

    textarea {
        width: 100% !important;
    }

    /*-------------------------*/

    #position_hy_field_box {
        width: 31% !important;
        background: #fff;
        float: left !important;
      }

    #position_ru_field_box {
        width: 31% !important;
        background: #fff;
        float: left !important;
    }

    #position_en_field_box {
        width: 31% !important;
        background: #fff;
        float: left !important;
    }

    #position_hy_input_box {
        width: 100%;
    }

    #position_ru_input_box {
        width: 100%;
    }

    #position_en_input_box {
        width: 100%;
    }

    /*---------------------------*/

    #full_name_hy_field_box {
        width: 31% !important;
        background: #ededed;
        float: left !important;
    }

    #full_name_ru_field_box {
        width: 31% !important;
        background: #ededed;
        float: left !important;
    }

    #full_name_en_field_box {
        width: 31% !important;
        background: #ededed;
        float: left !important;
    }

    #full_name_hy_input_box {
        width: 100%;
    }

    #full_name_ru_input_box {
        width: 100%;
    }

    #full_name_en_input_box {
        width: 100%;
    }


    /*--------------------------*/


    #name_hy_field_box {
        width: 31% !important;
        background: #fff;
        float: left !important;
    }

    #name_ru_field_box {
        width: 31% !important;
        background: #fff;
        float: left !important;
    }

    #name_en_field_box {
        width: 31% !important;
        background: #fff;
        float: left !important;
    }

    #name_hy_input_box {
        width: 100%;
    }

    #name_ru_input_box {
        width: 100%;
    }

    #name_en_input_box {
        width: 100%;
    }


    /*-----------meta desc---------------*/


    #meta_desc_hy_field_box {
        width: 31% !important;
        background: #fff;
        float: left !important;
    }

    #meta_desc_ru_field_box {
        width: 31% !important;
        background: #fff;
        float: left !important;
    }

    #meta_desc_en_field_box {
        width: 31% !important;
        background: #fff;
        float: left !important;
    }

    #meta_desc_hy_input_box {
        width: 100%;
    }

    #meta_desc_ru_input_box {
        width: 100%;
    }

    #meta_desc_en_input_box {
        width: 100%;
    }


    /*-----------meta key---------------*/


    #meta_key_hy_field_box {
        width: 31% !important;
        background: #fff;
        float: left !important;
    }

    #meta_key_ru_field_box {
        width: 31% !important;
        background: #fff;
        float: left !important;
    }

    #meta_key_en_field_box {
        width: 31% !important;
        background: #fff;
        float: left !important;
    }

    #meta_key_hy_input_box {
        width: 100%;
    }

    #meta_key_ru_input_box {
        width: 100%;
    }

    #meta_key_en_input_box {
        width: 100%;
    }

</style>


<div class='ui-widget-content ui-corner-all datatables'>
	<h3 class="ui-accordion-header ui-helper-reset ui-state-default form-title">
		<div class='floatL form-title-left'>
			<a href="#"><?php echo $this->l('form_add'); ?> <?php echo $subject?></a>
		</div>
		<div class='clear'></div>
	</h3>
<div class='form-content form-div'>
	<?php echo form_open( $insert_url, 'method="post" id="crudForm" enctype="multipart/form-data"'); ?>
		<div><?php
			$counter = 0;
				foreach($fields as $field)
				{
					$even_odd = $counter % 2 == 0 ? 'odd' : 'even';
					$counter++;
			?>
			<div class='form-field-box <?php echo $even_odd?>' id="<?php echo $field->field_name; ?>_field_box">
				<div class='form-display-as-box' id="<?php echo $field->field_name; ?>_display_as_box">
					<?php echo $input_fields[$field->field_name]->display_as?><?php echo ($input_fields[$field->field_name]->required)? "<span class='required'>*</span> " : ""?> :
				</div>
				<div class='form-input-box' id="<?php echo $field->field_name; ?>_input_box">
					<?php echo $input_fields[$field->field_name]->input?>
				</div>
				<div class='clear'></div>
			</div><?php
				}
				foreach($hidden_fields as $hidden_field){
						echo $hidden_field->input;
					}
				?>
			<?php if ($is_ajax) { ?><input type="hidden" name="is_ajax" value="true" /><?php }?>
			<div class='line-1px'></div>
			<div id='report-error' class='report-div error'></div>
			<div id='report-success' class='report-div success'></div>
		</div>
		<div class='buttons-box'>
			<div class='form-button-box'>
				<input id="form-button-save" type='submit' value='<?php echo $this->l('form_save'); ?>' class='ui-input-button'/>
			</div>
<?php 	if(!$this->unset_back_to_list) { ?>
			<div class='form-button-box'>
				<input type='button' value='<?php echo $this->l('form_save_and_go_back'); ?>' class='ui-input-button' id="save-and-go-back-button"/>
			</div>
			<div class='form-button-box'>
				<input type='button' value='<?php echo $this->l('form_cancel'); ?>' class='ui-input-button' id="cancel-button" />
			</div>
<?php   } ?>
			<div class='form-button-box loading-box'>
				<div class='small-loading' id='FormLoading'><?php echo $this->l('form_insert_loading'); ?></div>
			</div>
			<div class='clear'></div>
		</div>
	<?php echo form_close(); ?>
</div>
</div>
<script>
	var validation_url = '<?php echo $validation_url?>';
	var list_url = '<?php echo $list_url?>';

	var message_alert_add_form = "<?php echo $this->l('alert_add_form')?>";
	var message_insert_error = "<?php echo $this->l('insert_error')?>";
</script>