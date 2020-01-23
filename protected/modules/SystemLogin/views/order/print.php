<style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,500,700,900);
    .title_b_invoice{
        font-family: "Roboto", sans-serif;
        font-size: 13px; font-weight: 700; color: #595959;
    }
    table td{
        font-family: "Roboto", sans-serif;
        font-size: 8px; font-weight: 400; color: #595959;
    }
    .text-right-subTOPtable{
        font-family: "Roboto", sans-serif;
        font-size: 8px; font-weight: 400; color: #595959;
        line-height: 1.4;
    }
    .text-right-subTOPtable b,
    .text-right-subTOPtable strong{
        font-size: 13px; font-weight: 500;
    }
    .clear{
        clear: both;
    }
    .tb_top_header_invoice{
    }
    .tb_top_header_invoice .tb1{
        margin-top: 1em;
        border-bottom: 2px solid #C00000;
        margin-bottom: 10px;
        max-width: 380px;
    }
    .tb_top_header_invoice .tb1 table{
        width: 380px;
    }
    .tb_top_header_invoice .tb1 table td{
        font-family: "Roboto", sans-serif;
        font-size: 8px; font-weight: 500; color: #595959;
    }
    .tb_top_header_invoice .tb1 table td.tright{
        text-align: right;
    }
    .tb_top_header_invoice .tb2{
        max-width: 380px;
    }
    .tb_top_header_invoice .tb2 table{
        width: 380px;
    }
    .tb_top_header_invoice .tb2 table td{
        font-family: "Roboto", sans-serif;
        font-size: 8px; font-weight: 400; color: #605863;
        padding:0px 10px 0px;
        border-right: 2px solid #c0c0c0;
    }
    .tb_top_header_invoice .tb2 table td:last-child{
        border-right: 0px;
    }
    .tb_top_header_invoice .tb2 table td.spacing{
        padding: 0px 5px; height: 10px;
    }
    .tb_top_header_invoice .tb2 table td.sb_header{
         font-family: "Roboto", sans-serif;
        font-size: 8px; font-weight: 400; color: #abb0ac;
    }
</style>

<table border="0" cellspacing="0" cellpadding="4" style="width:660px;">
    <tr>
        <td>
            <font class="title_b_invoice">INVOICE</font> <br>

            
            <div class="tb_top_header_invoice">
                <div class="tb1">
                    <table border="0" cellspacing="0" cellpadding="4">
                        <tr>
                            <td colspan="2"># <?php echo $modelOrder->invoice_prefix ?>-<?php echo $modelOrder->invoice_no ?></td>
                            <td colspan="2" align="right" class="tright"><?php echo date("d/m/Y", strtotime($modelOrder->date_add)) ?></td>
                        </tr>
                    </table>
                </div>
                <div class="clear"></div>
                <div class="tb2">
                    <?php
                    $qty = 0;
                    $berat = 0;
                    foreach ($data as $key => $value){
                        $qty = $qty + $value->qty;
                        $berat = $berat + ($value->qty*$value->berat);
                    }
                    ?>
                    <table border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td align="center" class="sb_header" width="35%"><font>Total:</font></td>
                            <td align="center" class="sb_header" width="20%"><font>qty:</font></td>
                            <td align="center" class="sb_header" width="45%"><font>Biaya Kirim:</font></td>
                        </tr>
                        <tr>
                            <td align="center"><?php echo Cart::money($modelOrder->grand_total) ?></td>
                            <td align="center"><?php echo $qty ?></td>
                            <td align="center"><?php echo Cart::money($modelOrder->delivery_price, 0) ?></td>
                        </tr>
                        <tr>
                            <td colspan="4" class="spacing">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="center" class="sb_header">Delivery:</td>
                            <td align="center" class="sb_header">Berat</td>
                            <td align="center" class="sb_header">Email:</td>
                        </tr>
                        <tr>
                            <td align="center"><?php echo City::model()->find('id = :id', array(':id'=>$modelOrder->shipping_city))->type ?> <?php echo City::model()->find('id = :id', array(':id'=>$modelOrder->shipping_city))->city_name ?></td>
                            <td align="center"><?php echo $berat ?> g</td>
                            <td align="center" colspan="2"><?php echo $modelOrder->email ?></td>
                        </tr>
                    </table>
                </div>
                <div class="clear clearfix"></div>
            </div>
        </td>
        
        <td align="right">
            <img src="<?php echo Yii::app()->baseUrl ?>/asset/images/logo.png" border="0" />
            <br><br>
            <div class="text-right-subTOPtable">
                <b>Mama Bear</b><br>
                Whatsapp&nbsp;&nbsp;&nbsp;<?php echo $this->setting['contact_wa'] ?> <br>
                BBM Pin&nbsp;&nbsp;&nbsp;<?php echo $this->setting['contact_pin'] ?>
            </div>
        </td>
    </tr>
    <style type="text/css">
    .box_bottom_descriptt{}
    .box_bottom_descriptt .tops_bottom_middle{
        margin-bottom: 1em;
    }
    .box_bottom_descriptt .tops_bottom_middle table{
        width: 650px;
    }

    .box_bottom_descriptt .tops_bottom_middle table td{
        font-size: 8px; font-weight: 400; color: #5c5959;
        font-family: "Roboto", sans-serif; line-height: 1.4;
        text-transform: capitalize;
    }
    .box_bottom_descriptt .tops_bottom_middle table td b{
        font-weight: 500;
    }
    .box_bottom_descriptt .tops_bottom_middle table td span{
        font-family: "Roboto", sans-serif;
        font-size: 8px; color: #a7b3d1; font-weight: 400;
    }

    .bottoms_detail_tabling{
        max-width: 650px;
    }
    .bottoms_detail_tabling table{
        width: 650px;
    }
    .bottoms_detail_tabling table thead{}
    .bottoms_detail_tabling table thead tr{}
    .bottoms_detail_tabling table thead tr th{
        font-family: "Roboto", sans-serif;
        font-size: 8px; 
        color: #fff; 
        font-weight: 400;
        text-transform: uppercase;   
        background-color: #808080;
        text-align: left;
    }

    .bottoms_detail_tabling table tbody{}
    .bottoms_detail_tabling table tbody tr td{
        font-family: "Roboto", sans-serif;
        font-size: 8px; 
        color: #595959; 
        font-weight: 400;
        text-transform: uppercase;
        border-bottom: 1px solid #bfbfbf;
        padding: 3px 10px;
    }
    .bottoms_detail_tabling table tbody tr td b{
        font-weight: 700;
    }
    .bottoms_detail_tabling table tbody tr.bottom_paid td{
        border-bottom: 3px solid #595959;
    }
    .bottoms_detail_tabling table tbody tr td.spacing{
        padding: 3px 0;
    }
    .bottoms_detail_tabling table tbody tr.bottom_fix_red td{
        border-bottom: 0px;
    }
    .bottoms_detail_tabling table tbody tr.bottom_fix_red td.b_red{
        border-bottom: 3px solid #c00000;
    }
    </style>
    <tr>
        <td colspan="2">
            <hr>
            <div class="clear" style="height: 5px;"></div>
            <div class="box_bottom_descriptt">
                    <div class="tops_bottom_middle">
                        <table border="0" cellspacing="0" cellpadding="4">
                            <tr>
                                <td style="width:67%;">
                                   <span>Bill to:</span> <br>
                                   <div class="clear" style="height:10px;"></div>

                                    <b><?php echo $modelOrder->payment_first_name ?> <?php echo $modelOrder->payment_last_name ?></b><br>
                                    <?php echo $modelOrder->payment_address_1 ?><br>
                                    <?php echo City::model()->find('id = :id', array(':id'=>$modelOrder->payment_city))->type ?> <?php echo City::model()->find('id = :id', array(':id'=>$modelOrder->payment_city))->city_name ?><br>
                                    <?php echo City::model()->find('province_id = :province_id GROUP BY province_id', array(':province_id'=>$modelOrder->shipping_zone))->province ?>, <?php echo $modelOrder->payment_postcode ?><br>
                                    <?php echo Tt::t('front', 'Mobile phone :') ?> <?php echo $modelOrder->phone ?><br>
                                </td>
                                <td>
                                    <span>Ship to:</span> <br>
                                    <div class="clear" style="height:10px;"></div>

                                    <b><?php echo $modelOrder->shipping_first_name ?> <?php echo $modelOrder->shipping_last_name ?></b><br>
                                    <?php echo $modelOrder->shipping_address_1 ?><br>
                                    <?php echo City::model()->find('id = :id', array(':id'=>$modelOrder->shipping_city))->type ?> <?php echo City::model()->find('id = :id', array(':id'=>$modelOrder->shipping_city))->city_name ?><br>
                                    <?php echo City::model()->find('province_id = :province_id GROUP BY province_id', array(':province_id'=>$modelOrder->shipping_zone))->province ?>, <?php echo $modelOrder->shipping_postcode ?><br>
                                    <?php echo Tt::t('front', 'Mobile phone :') ?> <?php echo $modelOrder->phone ?><br>
                                </td>
                            </tr>
                        </table>
                        <div class="clear"></div>
                    </div>
                    <div class="bottoms_detail_tabling">
                        <table border="0" cellspacing="0" cellpadding="4">
                            <thead>
                                <tr>
                                    <th width="7%">LN</th>
                                    <th width="7%">QTY</th>
                                    <th width="45%">DESCRIPTION</th>
                                    <th width="20%">PRICE</th>
                                    <th width="20%" align="right">EXTENSION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="spacing" colspan="5">&nbsp;</td>
                                </tr>
                                <?php $total = 0 ?>
                                <?php foreach ($data as $key => $value): ?>
                                <?php
                                $dataSerialize = unserialize($value->data);
                                ?>
                                <tr>
                                    <td><?php echo $key+1 ?></td>
                                    <td><?php echo $value['qty'] ?></td>
                                    <td><?php echo $value['name'] ?></td>
                                    <td><?php echo Cart::money($value['price']) ?>.-</td>
                                    <td align="right"><?php echo Cart::money($subTotal = ($value['total'])) ?>.-</td>
                                </tr>
                                <?php endforeach ?>

                                <tr>
                                   <td class="spacing" colspan="5" style="border-bottom:0px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>SUBTOTAL:</td>
                                    <td align="right"><?php echo Cart::money($modelOrder->total, 0) ?>.-</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>BIAYA KIRIM:</td>
                                    <td align="right"><?php echo Cart::money($modelOrder->delivery_price, 0) ?>.-</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><b>TOTAL:</b></td>
                                    <td align="right"><b><?php echo Cart::money($modelOrder->grand_total, 0) ?>.-</b></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="clear" style="height:25px;"></div>
                    </div>
                <div class="clear"></div>
            </div>
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>
            Payment Details: <br>
            <?php foreach ($bank as $key => $value): ?>
                <b><?php echo ListBank::model()->findByPk($value->id_bank)->nama ?></b> 
                <?php echo $value->rekening ?> an <?php echo $value->nama ?> <br>
            <?php endforeach ?>

        </td>
        <td align="right">

            http://mamabear.co.id/
        </td>
    </tr>
</table>


<script type="text/javascript">
    window.print();
</script>