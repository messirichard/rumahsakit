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
        border-bottom: 1px solid #C00000;
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
        border-right: 1px solid #c0c0c0;
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
    .default_list_shipping{

        }
    .default_list_shipping .lists{
        /*padding-bottom: 12px;
        border-bottom: 2px dashed #000;
        margin-bottom: 12px;*/
    }
    .default_list_shipping .lists table{
        width: 100%;
        border: 1px solid #000;
    }
    .default_list_shipping .lists table td{
        padding: 20px 10px;
        /*font-size: 10px;*/
        font-size: 11px;
        border: 1px solid #000;
    }
    .default_list_shipping .lists table td h5{
        font-size: 13px;
        margin: 0; margin-bottom: 2px;
    }
    .default_list_shipping .lists table td p{
        margin: 0;
    }
    .fleft{
        float: left;
    }
    b.red{
        color: #ff0000;
    }
</style>

<!-- <table border="0" cellspacing="0" cellpadding="4" style="width: 660px;"> -->
<table border="0" cellspacing="0" cellpadding="4" style="width: 100%; max-width: 300px;">
    <tr>
        <td>
            <div class="default_list_shipping">
                <?php if ($model): ?>
                    <?php $model = array_chunk($model, 1); ?>
                    <div class="lists">
                        <table border="0" cellspacing="0" cellpadding="0">
                        <?php foreach ($model as $ke => $vans): ?>
                        <tr>
                            <?php foreach ($vans as $key => $value): ?>
                            <?php 
                            $data = OrOrderProduct::model()->findAll('order_id = :order_id', array(':order_id'=>$value->id));
                            $qtys = 0;
                            foreach ($data as $ke => $val) {
                                $qtys = $qtys + $val->qty;
                            }
                            ?>
                            <td width="50%">
                                <h5><?php echo strtoupper($value->shipping_first_name).' '.strtoupper($value->shipping_last_name) ?></h5> 
                                <div class="clear" style="clear:both; height: 7px;"></div>
                                <p>
                                <?php 
                                    // $customer_phn = MeMember::model()->findByPk($value->customer_id)->hp;
                                    // echo $customer_phn;
                                    echo $value->phone; 
                                 ?><br>
                                    <?php echo $value->shipping_address_1 ?> <br>
                                    <?php if ($value->shipping_address_2 != '' || $value->shipping_postcode != ''): ?>
                                        <?php echo $value->shipping_address_2 ?>, <?php echo $value->shipping_postcode; ?> <br>
                                    <?php endif ?>
                                    <?php echo City::model()->findByPk($value->shipping_city)->city_name; ?>
                                    <br>
                                    <b class="red">JNE <?php echo strtoupper($value->delivery_package) ?></b>
                                 </p>
                                <div class="clear height-10"></div>                                
                                <h5>DARI: <?php echo nl2br($alamat_kantor) ?></h5> 
                                <p>
                                (<?php echo $qtys ?> Box)
                                </p>
                            </td>
                            <?php endforeach ?>
                        </tr>
                        <?php endforeach ?>
                        </table>
                        <div class="clear"></div>
                    </div>
                <?php endif ?>
                <div class="clear"></div>
            </div>
        </td>
        
    </tr>
</table>


<script type="text/javascript">
    setTimeout(function(){ window.print(); }, 2000);
</script>