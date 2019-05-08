
       
        
       
        <section>
                <h4 style="width: 60%;margin: 0 auto;margin-top: 30px;color: #394f5d; font-size: 20px;font-style: italic;"><?=$row['title']?></h4>
                <p style="width: 60%;margin: 0 auto;padding-top: 5px;color: #394f5d;"><?=date_format(date_create($row['date']), 'd.m.Y')?></p>
            <div class="container">
                <div class="homepage_content" style="margin: 0 auto;">
                    <p>
                        <?=strip_tags($row['text'])?>
                    </p>
                </div>
            </div>
        </section>
