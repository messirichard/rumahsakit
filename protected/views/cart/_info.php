<?php 
// Get data promo ongkir
$id_n = intval(1);
$gPromod_info = Yii::app()->db->createCommand()
    ->select('*')
    ->from('tb_promo_ongkir u')
    ->where('id=:id AND status = 1', array(':id'=>$id_n))
    ->queryRow();

$gPromod_info = (object) $gPromod_info;
?>
<div class="padding-left-30">
    <?php if ($gPromod_info->status == '1'): ?>
    <div class="box-information-cart promo">
        <div class="texts">
            <div class="titles"><?php echo Tt::t('front', 'INFO GRATIS PENGIRIMAN') ?></div>
            <div class="clear height-10"></div>
            <div class="height-2"></div>
            <div class="lines-litle-l-black"></div>
            <div class="clear height-15"></div><div class="height-3"></div>
            <p>
                <?php // echo Tt::t('front', 'Gratis biaya pengiriman ke seluruh indonesia dengan memakai kurir JNE dan Wahana untuk berat 1kg') ?>
                <?php if ($this->languageID == 2): ?>
                    Buying products with free shipping marks will get a free discount on <?php echo $gPromod_info->maxnilaikg.' Kg.'; ?> with delivery service <?php echo Tt::t('front', 'WAHANA & JNE') ?>.        
                <?php else: ?>
                Membeli produk dengan bertanda free shipping akan mendapatkan potongan Gratis Ongkir sebesar <?php echo $gPromod_info->maxnilaikg.' Kg.'; ?> dengan jasa pengiriman <?php echo Tt::t('front', 'WAHANA & JNE') ?>.
                <?php endif ?>
            </p>

            <div class="clear"></div>
        </div>
    </div>
    <?php endif ?>

    <div class="box-information-cart">
        <div class="texts">
            <div class="titles"><?php echo Tt::t('front', 'CUSTOMER CARE') ?></div>
            <div class="clear height-10"></div>
            <div class="height-2"></div>
            <div class="lines-litle-l-black"></div>
            <div class="clear height-15"></div><div class="height-3"></div>
            <p><?php echo Tt::t('front', 'Jika anda mempunyai pertanyaan, silahkan hubungi customer care kami:') ?> <br>
                Whatsapp&nbsp;&nbsp;&nbsp;<?php echo $this->setting['contact_wa'] ?> <br>
                BBM Pin&nbsp;&nbsp;&nbsp;<?php echo $this->setting['contact_pin'] ?>
            </p>

            <div class="clear"></div>
        </div>
    </div>
    <div class="box-information-cart">
        <div class="texts">
            <div class="titles"><?php echo Tt::t('front', 'INFORMASI PENGIRIMAN') ?></div>
            <div class="clear height-10"></div>
            <div class="height-2"></div>
            <div class="lines-litle-l-black"></div>
            <div class="clear height-15"></div><div class="height-3"></div>
            <p><?php echo Tt::t('front', 'EXPRESS') ?> <br>
                <?php echo Tt::t('front', 'Biaya pengiriman akan kami emailkan <br>
                Pengiriman antara 2-4 hari menggunakan JNE. <br>
                Tracking code akan kami kirimkan by email.') ?>
            </p>

            <div class="clear"></div>
        </div>
    </div>

    <div class="clear"></div>
</div>