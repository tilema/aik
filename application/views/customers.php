<?
if (!empty($result)) :
    foreach ($result as $value) :
        ?>
        <section class="section_width_slider">
            <h4 class="our_costumers">Մեր կորպորատիվ հաճախորդներն են՝</h4>
            <div class="container">
                <div class="costumers_item">
                    <img class="costumer" src="<?=base_url('admin/assets/uploads/files/').$value['image']?>" title="" alt="">
                    <h5><?=$value['name']?></h5>
                </div>

            </div>
        </section>
    <?
    endforeach;
endif;
?>

