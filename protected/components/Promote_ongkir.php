<?php
/*
 * promo ongkir
 * By Ibnu Fajar
 */
class Promote_ongkir {

    public static function promote($id_product, $var='')
    {
        $str = false;

        $id_product = intval($id_product);
        $id_pr = intval(1);

        // checking promo bila aktif
        $gPromod = PromoOngkir::model()->find('id = :id AND status = 1', array(':id'=>$id_pr));
        if ($gPromod->status == '1') {
            // get all promotion products
            $prm_ongkir = PromoOngkirProduct::model()->find('id_promo = :id_promo AND id_product = :id_product', array(
                ':id_promo'=> $gPromod->id,
                ':id_product'=> $id_product,
                ));

            if ($prm_ongkir) {
                $str = array(
                        'status'=> true,
                        'nilai_potongan_kg' => $gPromod->maxnilaikg,
                    );
            }else{
                return false;                
            }
        }

        return $str;
    }

}