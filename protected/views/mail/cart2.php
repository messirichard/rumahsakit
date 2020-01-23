<?php
$baseUrl = Yii::app()->request->hostInfo . Yii::app()->request->baseUrl;
$url = Yii::app()->request->hostInfo;
?>
<div style="font-family:'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif;width:100%!important;min-height:100%;font-size:14px;color:#404040;margin:0;padding:0" bgcolor="#FFFFFF">
    <table bgcolor="transparent" style="max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0">
        <tbody>
            <tr style="margin:0;padding:0">
                <td style="margin:0;padding:0">
                </td>
                <td style="display:block!important;max-width:600px!important;clear:both!important;margin:0 auto;padding:0">

                    <div style="max-width:600px;display:block;border-collapse:collapse;margin:0 auto;padding:0;border:0 solid #e7e7e7">
                        <table bgcolor="#fff" style="max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:#fff;margin:0;padding:0">
                            <tbody>
                                <tr style="margin:0;padding:0">
                                    <td>
                                        <div style="padding: 15px 0;">
                                            <img src="<?php echo $baseUrl ?>/asset/images/logo.png" alt="logo mamabear" style="text-align: center; margin: 0 auto; display: block;">
                                        </div>
                                        <div style="background-color: rgb(202, 169, 116); padding: 15px 15px; height: 24px; ">
                                            <table border="0" style="border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0;">
                                                <tr style="margin:0;padding:0">
                                                    <td>
                                                        <span style="font-size: 14px;font-family: Arial, Helvetica, sans-serif;line-height: 18px; color: #FFFFFF;">
                                                            Kepada, <?php echo $modelOrder->first_name.' '.$modelOrder->last_name ?>
                                                        </span>
                                                    </td>
                                                    <td style="text-align: right;">
                                                        <span style="font-size: 14px;font-family: Arial, Helvetica, sans-serif;line-height: 18px; color: #FFFFFF;">
                                                            <?php echo date("l, d M Y", strtotime($modelOrder->date_add)) ?>
                                                        </span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
                <td style="margin:0;padding:0">
                </td>
            </tr>
        </tbody>
    </table>
    <table bgcolor="transparent" style="max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0">
        <tbody>
            <tr style="margin:0;padding:0">
                <td style="margin:0;padding:0">
                </td>
                <td bgcolor="#f6f6f6" style="display:block!important;max-width:600px!important;clear:both!important;margin:0 auto;padding:0">

                    <div style="max-width:600px;display:block;border-collapse:collapse;margin:0 auto;padding:30px 15px;border:1px solid #e7e7e7">
                        <table bgcolor="transparent" style="max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0">
                            <tbody>
                                <tr style="margin:0;padding:0">
                                    <td style="margin:0;padding:0 10px;">
                                        <h5 style="line-height:24px;color:#936937;font-weight:400;font-size:22px;margin:0 0 40px;padding:0;">Pesanan anda telah kami terima,<br style="margin:0;padding:0;"> silahkan transfer sesuai dengan total belanja anda ke:</h5>

                                        <div style="margin:0 0 20px;padding:0">
                                        <?php foreach ($bank as $key => $value): ?>
                                            <table bgcolor="transparent" style="width:100%;max-width:100%;border-collapse:collapse;border-spacing:0;background-color:transparent;margin:5px 0;padding:0; border:0px;">
                                                <tbody style="margin:0;padding:0">
                                                    <tr style="margin:0;padding:0">
                                                        <td valign="top" style="width:18%;font-size:16px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0;font-weight:700;color:#666666;border:0px;"><?php echo strtoupper(ListBank::model()->findByPk($value->id_bank)->nama) ?>
                                                        </td>
                                                        <td valign="top" style="font-family: Arial, Helvetica, sans-serif;font-size: 16px;color:#666666;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0"><span style="font-family: Arial, Helvetica, sans-serif;color:#936937;font-size:16px;border:0px;"><?php echo $value->rekening ?></span> an <?php echo $value->nama ?> 
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div style="border-bottom-width:1px;border-bottom-color:transparent;border-bottom-style:solid;margin:0;padding:0">
                                            </div>
                                        <?php endforeach ?>
                                        </div>
										<?php /*
                                        <div style="margin:0 0 20px;padding:0">
                                            <table bgcolor="transparent" style="width:100%;max-width:100%;border-collapse:collapse;border-spacing:0;background-color:transparent;margin:5px 0;padding:0">
                                                <tbody style="margin:0;padding:0">
                                                    <tr style="margin:0;padding:0">
                                                        <td valign="top" style="width:25%;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">Pengiriman via:
                                                        </td>
                                                        <td valign="top" style="font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">JNE
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div style="border-bottom-width:1px;border-bottom-color:#eee;border-bottom-style:solid;margin:0;padding:0">
                                            </div>
                                            <table bgcolor="transparent" style="width:100%;max-width:100%;border-collapse:collapse;border-spacing:0;background-color:transparent;margin:5px 0;padding:0">
                                                <tbody style="margin:0;padding:0">
                                                    <tr style="margin:0;padding:0">
                                                        <td valign="top" style="width:25%;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">No. resi pengiriman:
                                                        </td>
                                                        <td valign="top" style="font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">CGKRE00201337116
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div style="border-bottom-width:1px;border-bottom-color:#eee;border-bottom-style:solid;margin:0;padding:0">
                                            </div>
                                            <table bgcolor="transparent" style="width:100%;max-width:100%;border-collapse:collapse;border-spacing:0;background-color:transparent;margin:5px 0;padding:0">
                                                <tbody style="margin:0;padding:0">
                                                    <tr style="margin:0;padding:0">
                                                        <td valign="top" style="width:25%;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">Tanggal pengiriman:
                                                        </td>
                                                        <td valign="top" style="font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">11 Maret 2016
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div style="border-bottom-width:1px;border-bottom-color:#eee;border-bottom-style:solid;margin:0;padding:0">
                                            </div>
                                        </div>
                                        */ ?>


                                        <p style="font-weight:normal;font-size:15px;line-height:1.6;margin:0 0 20px;padding:0;color:#666666;">Setelah anda mentransfer, segera lakukan konfirmasi pembayaran melalui link di bawah ini</p>
                                        <div align="center" style="text-align:center;margin:25px 20px;padding:0"><a target="_blank" style="margin:0;padding:16px 25px;color:#fff;text-decoration:none;display:inline-block;margin-bottom:0;vertical-align:middle;line-height:20px;font-size:16px;font-weight:400;text-align:center;white-space:nowrap;border-radius:2px;background-color:rgb(51,1,0);border:1px solid #000000;font-family: Arial, Helvetica, sans-serif;" href="<?php echo $url.CHtml::normalizeUrl(array('/home/paymentconf', 'lang'=>'en', 'nota'=>$modelOrder->invoice_prefix.'-'.$modelOrder->invoice_no)); ?>">Konfirmasi Pembayaran</a>
                                        </div>

                                        <p style="font-weight:normal;font-size:14px;line-height:1.6;margin:0 0 20px;color:#666666;padding:0">Anda dapat memantau status pesanan dengan mengakses halaman Status Pemesanan pada akun <span class="lG">Mama Bear</span> Anda.</p>
                                        <p style="font-weight:normal;font-size:14px;line-height:1.6;margin:0 0 20px;color:#666666;padding:0;margin-bottom:30px;">Kami akan kembali memberikan notifikasi kepada Anda jika ada perubahan status pada pesanan anda.</p>
                                        

                                        <div style="padding-top:20px;padding-bottom:20px;padding-right:20px;padding-left:20px;border-width:0px;border-style:dashed;border-color:#9D72C9;background-color:#fff;border-radius:5px;margin-bottom:20px">
                                        <h5 style="font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;line-height:1.1;color:#936937;font-weight:700;font-size:17px;margin:0 0 20px;padding:0">Rincian Pesanan:</h5>

                                            <div style="margin:0;padding:0">
                                            	<?php foreach ($data as $key => $value): ?>
									    		<?php
									    		$dataSerialize = unserialize($value->data);
									    		?>
                                                <ol style="font-weight:normal;font-size:14px;line-height:1.6;margin:0 0 20px;padding:0 0 0 21px">
                                                    <li style="font-size:13px;margin:0 0 15px;padding:0;">
                                                    	<b style="margin:0;padding:0">
                                                    		<?php echo $value['name'] ?>
									    					<?php if ($value['attributes_id'] != '0'): ?>
									    					(<?php echo $value['attributes_name'] ?>)
									    					<?php endif ?>
                					    					<?php if ($dataSerialize['box'] != ''): ?>
									    					With box + <?php echo Cart::money($dataSerialize['box']) ?>
									    					<?php endif ?>
                                                            <?php if ($dataSerialize['qty_box'] != ''): ?>
                                                            <?php echo 'Isi '.$dataSerialize['qty_box'].' Box'; ?>
                                                            <?php endif ?>

                                                    	</b>
                                                    	<br style="margin:0;padding:0">Jumlah: <?php echo $value['qty'] ?> Buah (<?php echo Cart::money($subTotal = ($value['total'])) ?>)</li>
                                                </ol>
                                            	<?php endforeach ?>

                                                <div style="font-size:13px;line-height:18px;margin:0 0 15px;padding:0;color:#666;">

                                                    <div style="margin:0 0 5px;padding:0"><b style="margin:0;padding:0">Tujuan Pengiriman:</b>
                                                    </div><?php echo $modelOrder->shipping_first_name ?> <?php echo $modelOrder->shipping_last_name ?> 
                                                    <br style="margin:0;padding:0">
                                                    <?php echo $modelOrder->shipping_address_1 ?>
                                                    <?php if ($modelOrder->shipping_district): ?>
                                                        <br style="margin:0;padding:0">
                                                        Kec. <?php echo Subdistrict::model()->find('id = :id', array(':id'=>$modelOrder->shipping_district))->subdistrict_name ?>
                                                    <?php endif ?>
                                                    <br style="margin:0;padding:0">
                                                    <?php echo City::model()->find('id = :id', array(':id'=>$modelOrder->shipping_city))->type ?> <?php echo City::model()->find('id = :id', array(':id'=>$modelOrder->shipping_city))->city_name ?>, <?php echo City::model()->find('province_id = :province_id GROUP BY province_id', array(':province_id'=>$modelOrder->shipping_zone))->province ?>, <?php echo $modelOrder->payment_postcode ?>
                                                    <br style="margin:0;padding:0">Telp: <?php echo $modelOrder->phone ?>
                                                </div>

                                                <div style="font-size:13px;line-height:18px;margin:0 0 15px;padding:0;color:#666;">
                                                    <div style="margin:0 0 5px;padding:0"><b style="margin:0;padding:0">Komentar:</b>
                                                    </div>
                                                    <?php echo nl2br($modelOrder->comment) ?>
                                                </div>

                                                <div style="margin:20px 0 0;padding:0">
                                                	<?php /*
                                                    <table bgcolor="transparent" style="width:100%;max-width:100%;border-collapse:collapse;border-spacing:0;background-color:transparent;margin:5px 0;padding:0">
                                                        <tbody style="margin:0;padding:0">
                                                            <tr style="margin:0;padding:0">
                                                                <td valign="top" style="width:50%;font-weight:700;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">Total Harga Produk:
                                                                </td>
                                                                <td align="right" valign="top" style="text-align:right;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">Rp 700.000
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    <div style="border-bottom-width:1px;border-bottom-color:#eee;border-bottom-style:solid;margin:0;padding:0">
                                                    </div>
                                                    <table bgcolor="transparent" style="width:100%;max-width:100%;border-collapse:collapse;border-spacing:0;background-color:transparent;margin:5px 0;padding:0">
                                                        <tbody style="margin:0;padding:0">
                                                            <tr style="margin:0;padding:0">
                                                                <td valign="top" style="width:50%;font-weight:700;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">Ongkos kirim:
                                                                </td>
                                                                <td align="right" valign="top" style="text-align:right;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">Rp 17.000
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    <div style="border-bottom-width:1px;border-bottom-color:#eee;border-bottom-style:solid;margin:0;padding:0">
                                                    </div>
                                                    <table bgcolor="transparent" style="width:100%;max-width:100%;border-collapse:collapse;border-spacing:0;background-color:transparent;margin:5px 0;padding:0">
                                                        <tbody style="margin:0;padding:0">
                                                            <tr style="margin:0;padding:0">
                                                                <td valign="top" style="width:50%;font-weight:700;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">Asuransi:
                                                                </td>
                                                                <td align="right" valign="top" style="text-align:right;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">Rp 6.400
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
													*/ ?>
                                                    <div style="border-bottom-width:1px;border-bottom-color:#eee;border-bottom-style:solid;margin:0;padding:0">
                                                    </div>
                                                    <table bgcolor="transparent" style="width:100%;max-width:100%;border-collapse:collapse;border-spacing:0;background-color:transparent;margin:5px 0;padding:0">
                                                        <tbody style="margin:0;padding:0">
                                                            <tr style="margin:0;padding:0">
                                                                <td valign="top" style="width:50%;font-weight:700;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">Total:
                                                                </td>
                                                                <td align="right" valign="top" style="text-align:right;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0"><?php echo Cart::money($modelOrder->total, 0) ?>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div style="border-bottom-width:1px;border-bottom-color:#eee;border-bottom-style:solid;margin:0;padding:0">
                                                    </div>
                                                    <table bgcolor="transparent" style="width:100%;max-width:100%;border-collapse:collapse;border-spacing:0;background-color:transparent;margin:5px 0;padding:0">
                                                        <tbody style="margin:0;padding:0">
                                                            <tr style="margin:0;padding:0">
                                                                <td valign="top" style="width:50%;font-weight:700;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">Biaya Pengiriman:
                                                                </td>
                                                                <td align="right" valign="top" style="text-align:right;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0"><?php echo Cart::money($modelOrder->delivery_price, 0) ?>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div style="border-bottom-width:1px;border-bottom-color:#eee;border-bottom-style:solid;margin:0;padding:0">
                                                    </div>
                                                    <table bgcolor="transparent" style="width:100%;max-width:100%;border-collapse:collapse;border-spacing:0;background-color:transparent;margin:5px 0;padding:0">
                                                        <tbody style="margin:0;padding:0">
                                                            <tr style="margin:0;padding:0">
                                                                <td valign="top" style="width:50%;font-weight:700;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0">Total Pembayaran:
                                                                </td>
                                                                <td align="right" valign="top" style="text-align:right;font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0"><?php echo Cart::money($modelOrder->grand_total, 0) ?>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <p style="margin-bottom:20px;font-weight:normal;font-size:13px;line-height:1.6;margin:25px 0 0 0;padding:10px 0 0 0;color:#666;">Pantau status pemesanan Anda pada halaman <a target="_blank" style="margin:0;padding:0;color:rgb(202, 169, 116);text-decoration:none" href="<?php echo $url.CHtml::normalizeUrl(array('/member/index')); ?>">Status Pemesanan</a>. <br style="margin:0;padding:0">Email ini dibuat secara otomatis. Mohon tidak mengirimkan balasan ke email ini.</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
                <td style="margin:0;padding:0">
                </td>
            </tr>
        </tbody>
    </table>
    <table bgcolor="transparent" style="max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;clear:both!important;background-color:transparent;margin:0 0 60px;padding:0">
        <tbody>
            <tr style="margin:0;padding:0">
                <td style="margin:0;padding:0">
                </td>
                <td style="display:block!important;max-width:600px!important;clear:both!important;margin:0 auto;padding:0">
                    <div style="max-width:600px;display:block;border-collapse:collapse;margin:0 auto;padding:20px 15px;border-color:#e7e7e7;border-style:solid;border-width:0 1px 1px; background-color:#fff;">
                        <table bgcolor="#fff" width="100%" style="max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:#fff;margin:0;padding:0">
                            <tbody style="margin:0;padding:0">
                                <tr style="margin:0;padding:0">
                                    <td valign="top" style="margin:0;padding:0 10px 0 0;width:75%">

                                        <span style="margin-bottom:6px;display:block; font-size: 13px;font-family: Arial, Helvetica, sans-serif;line-height: 21px;color: #949494;">
                                        	<b style="font-size:16px; font-weight:700;color:#92682e;">Hubungi <span class="lG">Mama Bear</span></b> <br>
                                        	Whats App: <?php echo $this->setting['contact_wa'] ?> <br>
											Line: <a href="<?php echo $this->setting['url_line'] ?>" style="color:#92682e;"><?php echo $this->setting['url_line'] ?></a> <br>
											BBM: <?php echo $this->setting['contact_pin'] ?> <br>
											Email: <span style="color:#92682e;"><?php echo $this->setting['contact_email'] ?></span>
                                        </span> 
										
                                    </td>
                                    <td valign="top" style="margin:0;padding:0">

                                        <span  style="font-family: Arial, Helvetica, sans-serif;font-size:15px; font-weight:700;color:#92682e;margin-bottom:6px;display:block;">Ikuti Kami</span>

                                        <div style="text-align:left">
                                            <?php if ($this->setting['url_facebook'] != ''): ?>
                                                <a target="_blank" style="color:#008000;display:inline-block" href="<?php echo $this->setting['url_facebook'] ?>"><img style="border:0;min-height:auto;max-width:100%;outline:0" alt="Facebook" src="<?php echo $baseUrl ?>/asset/images/icon-facebook.png"></a>
                                            <?php endif ?>
                                            <?php if ($this->setting['url_instagram'] != ''): ?>
                                            <a target="_blank" style="color:#008000;display:inline-block" href="<?php echo $this->setting['url_instagram'] ?>"><img style="border:0;min-height:auto;max-width:100%;outline:0" alt="Instagram" src="<?php echo $baseUrl ?>/asset/images/icon-instagram.png"></a>
                                            <?php endif ?>
                                            <?php if ($this->setting['url_twitter'] != ''): ?>
                                            <a target="_blank" style="color:#008000;display:inline-block" href="<?php echo $this->setting['url_twitter'] ?>"><img style="border:0;min-height:auto;max-width:100%;outline:0" alt="Twitter" src="<?php echo $baseUrl ?>/asset/images/icon-twitter.png"></a>
                                            <?php endif ?>
                                            <?php /*
                                            <a data-saferedirecturl="https://www.google.com/url?q=http://mandrillapp.com/track/click/12090311/twitter.com?p%3DeyJzIjoiaFVOemV4WUtXWEdrSjh0U1lqZWdYSXBHQ3F3IiwidiI6MSwicCI6IntcInVcIjoxMjA5MDMxMSxcInZcIjoxLFwidXJsXCI6XCJodHRwOlxcXC9cXFwvdHdpdHRlci5jb21cXFwvdG9rb3BlZGlhXFxcL1wiLFwiaWRcIjpcImEwNTY3OTMxZjUyOTRmMDA4MmRjNGJlNWZmYmJmMWE1XCIsXCJ1cmxfaWRzXCI6W1wiMWEyZTVlODdmZjI4N2IwMzAyZGFkNjVmYTFkOWU0NzU1MzAzN2EwZlwiXX0ifQ&amp;source=gmail&amp;ust=1459306536673000&amp;usg=AFQjCNE4kU-8Fxx5Knbj73Ke8pgw1vwhUg" target="_blank" style="color:#008000;display:inline-block" href="http://mandrillapp.com/track/click/12090311/twitter.com?p=eyJzIjoiaFVOemV4WUtXWEdrSjh0U1lqZWdYSXBHQ3F3IiwidiI6MSwicCI6IntcInVcIjoxMjA5MDMxMSxcInZcIjoxLFwidXJsXCI6XCJodHRwOlxcXC9cXFwvdHdpdHRlci5jb21cXFwvdG9rb3BlZGlhXFxcL1wiLFwiaWRcIjpcImEwNTY3OTMxZjUyOTRmMDA4MmRjNGJlNWZmYmJmMWE1XCIsXCJ1cmxfaWRzXCI6W1wiMWEyZTVlODdmZjI4N2IwMzAyZGFkNjVmYTFkOWU0NzU1MzAzN2EwZlwiXX0ifQ"><img style="border:0;min-height:auto;max-width:100%;outline:0" alt="Twitter" src="https://ci5.googleusercontent.com/proxy/-8wtK8UCwzgYf5r7ap2pOwgzm80lU2Rgr-FwOsUB0ZUkt96Cp_Cqn3UnIjzdnxVN7F8cBbt6y7XQoBqLZk95pTaRicik7Q=s0-d-e1-ft#https://ecs7.tokopedia.net/img/email/twitter.png"></a>
                                            <a data-saferedirecturl="https://www.google.com/url?q=http://mandrillapp.com/track/click/12090311/gplus.to?p%3DeyJzIjoiNExLUk1BSy1YRm5meHVRbm5PZGstY3loakhNIiwidiI6MSwicCI6IntcInVcIjoxMjA5MDMxMSxcInZcIjoxLFwidXJsXCI6XCJodHRwOlxcXC9cXFwvZ3BsdXMudG9cXFwvdG9rb3BlZGlhXCIsXCJpZFwiOlwiYTA1Njc5MzFmNTI5NGYwMDgyZGM0YmU1ZmZiYmYxYTVcIixcInVybF9pZHNcIjpbXCI1MjdiYjU0MjdmZGUyNTIxZmFiNmMyYWU4YWY0NWQ0Zjk0YzRjYjk5XCJdfSJ9&amp;source=gmail&amp;ust=1459306536673000&amp;usg=AFQjCNEZfJpQq_cpriVwv2W1vNWDuFuazQ" target="_blank" style="color:#008000;display:inline-block" href="http://mandrillapp.com/track/click/12090311/gplus.to?p=eyJzIjoiNExLUk1BSy1YRm5meHVRbm5PZGstY3loakhNIiwidiI6MSwicCI6IntcInVcIjoxMjA5MDMxMSxcInZcIjoxLFwidXJsXCI6XCJodHRwOlxcXC9cXFwvZ3BsdXMudG9cXFwvdG9rb3BlZGlhXCIsXCJpZFwiOlwiYTA1Njc5MzFmNTI5NGYwMDgyZGM0YmU1ZmZiYmYxYTVcIixcInVybF9pZHNcIjpbXCI1MjdiYjU0MjdmZGUyNTIxZmFiNmMyYWU4YWY0NWQ0Zjk0YzRjYjk5XCJdfSJ9"><img style="border:0;min-height:auto;max-width:100%;outline:0" alt="Google Plus" src="https://ci6.googleusercontent.com/proxy/W-I_th7pkNgG9aiQPXzB6HeDi0Rsg7rpvo-FYkluJv4CqZOeVKBUj01VOEiyTc-mzJKqOeDqhvfKkMC0AOMzuYtOscqHmPd89dQ=s0-d-e1-ft#https://ecs7.tokopedia.net/img/email/google-plus.png"></a>
                                            */ ?>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
                <td style="margin:0;padding:0">
                </td>
            </tr>
            <tr style="margin:0;padding:0">
                <td style="margin:0;padding:0">
                </td>
                <td style="display:block!important;max-width:600px!important;clear:both!important;margin:0 auto;padding:0">

                    <div style="max-width:600px;display:block;border-collapse:collapse;background-color:#f7f7f7;margin:0 auto;padding:20px 15px;border-color:#e7e7e7;border-style:solid;border-width:0 1px 1px">
                        <table bgcolor="transparent" width="100%" style="max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0">
                            <tbody style="margin:0;padding:0">
                                <tr style="margin:0;padding:0">
                                	<?php /*
                                    <td valign="middle" style="margin:0;padding:0;width:7%"><img alt="Mascot Mama Bear" style="border:0;min-height:auto;width:41px;outline:0" src="https://ci3.googleusercontent.com/proxy/M5Wa2sXn-ww54cW0Q7cs8swuyUmJmbj4UUcz23zINirnroSu9FRxReISsFpTIHGkHWB32RlSkbrgCtZ3NK7gNsN2NNmYtpWiGkC2Vo5FEOnqwmj94FGsrw=s0-d-e1-ft#https://ecs7.tokopedia.net/img/email/buble-owl-color-tokopedia.png">
                                    </td>
                                    */ ?>
                                    <td valign="middle" style="margin:0;padding:0;width:53%">

                                        <p style="color:#91908e;font-size:12px;line-height:150%;font-weight:normal;margin:0px;padding:0px">Jika butuh bantuan, gunakan halaman <a target="_blank" style="color:#92682e;text-decoration:none;margin:0;padding:0" href="<?php echo $url.CHtml::normalizeUrl(array('/home/pcontact')); ?>">Kontak Kami</a>.</p>
                                    </td>
                                    <td valign="middle" style="width:40%; text-align:right;">
                                        <p style="color:#91908e;font-size:12px;line-height:150%;font-weight:normal;margin:0px;padding:0px">2016 &copy;<span class="lG">Mama Bear</span></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
                <td style="margin:0;padding:0">
                </td>
            </tr>
        </tbody>
    </table>
</div>