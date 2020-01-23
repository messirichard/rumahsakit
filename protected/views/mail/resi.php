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
                        <table bgcolor="#fff" style="max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0">
                            <tbody>
                                <tr style="margin:0;padding:0">
                                    <td bgcolor="#706B5F" height="4" style="background-color:#B4B4B4!important;line-height:4px;font-size:4px;margin:0;padding:0">&nbsp;
                                    </td>
                                    <td bgcolor="#d50f25" height="4" style="background-color:#959595!important;line-height:4px;font-size:4px;margin:0;padding:0">&nbsp;
                                    </td>
                                    <td bgcolor="#3369E8" height="4" style="background-color:#000000!important;line-height:4px;font-size:4px;margin:0;padding:0">&nbsp;
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
                <td bgcolor="#FFFFFF" style="display:block!important;max-width:600px!important;clear:both!important;margin:0 auto;padding:0">

                    <div style="max-width:600px;display:block;border-collapse:collapse;margin:0 auto;padding:30px 15px;border:1px solid #e7e7e7">
                        <table bgcolor="transparent" style="max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0">
                            <tbody>
                                <tr style="margin:0;padding:0">
                                    <td style="margin:0;padding:0">
                                        <h5 style="line-height:24px;color:#000;font-weight:900;font-size:17px;margin:0 0 20px;padding:0">Pesanan anda telah kami kirim, Berikut ini rincian kiriman anda:</h5>
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
                                                        <td valign="top" style="font-size:13px;vertical-align:top;line-height:18px;margin:0;padding:0 10px 0 0"><?php echo $modelOrder->tracking_id ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div style="border-bottom-width:1px;border-bottom-color:#eee;border-bottom-style:solid;margin:0;padding:0">
                                            </div>
                                        </div>


                                        <p style="font-weight:normal;font-size:14px;line-height:1.6;margin:0 0 20px;padding:0">Anda dapat memantau pesanan anda di sini</p>
                                        <div align="center" style="text-align:center;margin:20px;padding:0"><a target="_blank" style="margin:0;padding:7px 17px;color:#fff;text-decoration:none;display:inline-block;margin-bottom:0;vertical-align:middle;line-height:20px;font-size:13px;font-weight:600;text-align:center;white-space:nowrap;border-radius:2px;background-color:#777777;background-image:linear-gradient(top,#A2A2A2 0%,#575757 100%);border:1px solid #000000" href="<?php echo $url.CHtml::normalizeUrl(array('/member/vieworder', 'lang'=>'en', 'nota'=>$modelOrder->invoice_prefix.'-'.$modelOrder->invoice_no)); ?>">Pantau Pesanan</a>
                                        </div>

                                        <p style="font-weight:normal;font-size:14px;line-height:1.6;margin:0 0 20px;padding:0">Anda dapat memantau status pesanan dengan mengakses halaman Status Pemesanan pada akun <span class="lG">Mama Bear</span> Anda.</p>
                                        <hr style="border-top-color:#d0d0d0;border-top-style:solid;border-bottom-color:#ffffff;border-bottom-style:solid;margin:20px 0;padding:0;border-width:3px 0 1px">
                                        <h5 style="font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;line-height:1.1;color:#000;font-weight:900;font-size:17px;margin:0 0 20px;padding:0">Rincian Pesanan:</h5>

                                        <div style="padding-top:20px;padding-bottom:20px;padding-right:20px;padding-left:20px;border-width:1px;border-style:dashed;border-color:#9D72C9;background-color:#F7F5FD;border-radius:5px;margin-bottom:20px">

                                            <div style="margin:0;padding:0">
                                            	<?php foreach ($data as $key => $value): ?>
									    		<?php
									    		$dataSerialize = unserialize($value->data);
									    		?>
                                                <ol style="font-weight:normal;font-size:14px;line-height:1.6;margin:0 0 20px;padding:0 0 0 21px">
                                                    <li style="font-size:13px;margin:0 0 15px;padding:0">
                                                    	<b style="margin:0;padding:0">
                                                    		<?php echo $value['name'] ?>
									    					<?php if ($value['attributes_id'] != '0'): ?>
									    					(<?php echo $value['attributes_name'] ?>)
									    					<?php endif ?>
                					    					<?php if ($dataSerialize['box'] != ''): ?>
									    					With box + <?php echo Cart::money($dataSerialize['box']) ?>
									    					<?php endif ?>

                                                    	</b>
                                                    	<br style="margin:0;padding:0">Jumlah: <?php echo $value['qty'] ?> Buah (<?php echo Cart::money($subTotal = ($value['total'])) ?>)</li>
                                                </ol>
                                            	<?php endforeach ?>

                                                <div style="font-size:13px;line-height:18px;margin:0 0 15px;padding:0">

                                                    <div style="margin:0 0 5px;padding:0"><b style="margin:0;padding:0">Tujuan Pengiriman:</b>
                                                    </div><?php echo $modelOrder->shipping_first_name ?> <?php echo $modelOrder->shipping_last_name ?> 
                                                    <br style="margin:0;padding:0">
                                                    <?php echo $modelOrder->shipping_address_1 ?>
                                                    <br style="margin:0;padding:0">
                                                    <?php echo City::model()->find('id = :id', array(':id'=>$modelOrder->shipping_city))->type ?> <?php echo City::model()->find('id = :id', array(':id'=>$modelOrder->shipping_city))->city_name ?>, <?php echo City::model()->find('province_id = :province_id GROUP BY province_id', array(':province_id'=>$modelOrder->shipping_zone))->province ?>, <?php echo $modelOrder->payment_postcode ?>
                                                    <br style="margin:0;padding:0">Telp: <?php echo $modelOrder->phone ?>
                                                </div>

                                                <div style="font-size:13px;line-height:18px;margin:0 0 15px;padding:0">

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

                                        <p style="margin-bottom:20px;font-weight:normal;font-size:14px;line-height:1.6;margin:40px 0 0 0;padding:10px 0 0 0;border-top:3px solid #d0d0d0"><small style="color:#999">Pantau status pemesanan Anda pada halaman <a target="_blank" style="margin:0;padding:0;color:#0f990f;text-decoration:none" href="<?php echo $url.CHtml::normalizeUrl(array('/member/index')); ?>">Status Pemesanan</a>. <br style="margin:0;padding:0">Email ini dibuat secara otomatis. Mohon tidak mengirimkan balasan ke email ini.</small></p>
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

                    <div style="max-width:600px;display:block;border-collapse:collapse;margin:0 auto;padding:20px 15px;border-color:#e7e7e7;border-style:solid;border-width:0 1px 1px">
                        <table bgcolor="transparent" width="100%" style="max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0">
                            <tbody style="margin:0;padding:0">
                                <tr style="margin:0;padding:0">
                                    <td valign="top" style="margin:0;padding:0 10px 0 0;width:75%">

                                        <span style="font-size:12px;margin-bottom:6px;display:inline-block">
                                        	<b>Hubungi <span class="lG">Mama Bear</span></b> <br>
                                        	Whats App: <?php echo $this->setting['contact_wa'] ?> <br>
											Line: <a href="<?php echo $this->setting['url_line'] ?>"><?php echo $this->setting['url_line'] ?></a> <br>
											BBM: <?php echo $this->setting['contact_pin'] ?> <br>
											Email: <?php echo $this->setting['contact_email'] ?>
                                        </span> 
										<?php /*
                                        <div style="text-align:left">
                                            <a data-saferedirecturl="https://www.google.com/url?q=http://mandrillapp.com/track/click/12090311/itunes.apple.com?p%3DeyJzIjoiUHRJN2I2TDY4Vm5MdFF0WS1wekhSUm5FU2c0IiwidiI6MSwicCI6IntcInVcIjoxMjA5MDMxMSxcInZcIjoxLFwidXJsXCI6XCJodHRwczpcXFwvXFxcL2l0dW5lcy5hcHBsZS5jb21cXFwvdXNcXFwvYXBwXFxcL3Rva29wZWRpYVxcXC9pZDEwMDEzOTQyMDE_bHM9MSZtdD04XCIsXCJpZFwiOlwiYTA1Njc5MzFmNTI5NGYwMDgyZGM0YmU1ZmZiYmYxYTVcIixcInVybF9pZHNcIjpbXCI5MjQxODEyYzZmMTU0NzA3ODE0ZWI3OGUzYThiZWQ5OWMzZWQ2Mjg0XCJdfSJ9&amp;source=gmail&amp;ust=1459306536673000&amp;usg=AFQjCNF6o8QgWebBcF7--ThZIK1M3AQJ6Q" target="_blank" href="http://mandrillapp.com/track/click/12090311/itunes.apple.com?p=eyJzIjoiUHRJN2I2TDY4Vm5MdFF0WS1wekhSUm5FU2c0IiwidiI6MSwicCI6IntcInVcIjoxMjA5MDMxMSxcInZcIjoxLFwidXJsXCI6XCJodHRwczpcXFwvXFxcL2l0dW5lcy5hcHBsZS5jb21cXFwvdXNcXFwvYXBwXFxcL3Rva29wZWRpYVxcXC9pZDEwMDEzOTQyMDE_bHM9MSZtdD04XCIsXCJpZFwiOlwiYTA1Njc5MzFmNTI5NGYwMDgyZGM0YmU1ZmZiYmYxYTVcIixcInVybF9pZHNcIjpbXCI5MjQxODEyYzZmMTU0NzA3ODE0ZWI3OGUzYThiZWQ5OWMzZWQ2Mjg0XCJdfSJ9" style="color:#008000"><img alt="Download iOS App" style="border:0;min-height:auto;max-width:120px;outline:0" src="https://ci3.googleusercontent.com/proxy/mow-rlkbJjvXETkuK0phOMqdlK6JhErtD8jeMjd80-BHl9Zj2lFze7s3ejODNAtRiW67oLp4FtPIB4_fCppMo7_890J2Kfc8vTsfBMI=s0-d-e1-ft#https://ecs7.tokopedia.net/img/email/apple-download.png"></a>
                                            <a data-saferedirecturl="https://www.google.com/url?q=http://mandrillapp.com/track/click/12090311/play.google.com?p%3DeyJzIjoic0VISmk1cWphSVVQQURIcWU5WGEtc1hlQUZzIiwidiI6MSwicCI6IntcInVcIjoxMjA5MDMxMSxcInZcIjoxLFwidXJsXCI6XCJodHRwczpcXFwvXFxcL3BsYXkuZ29vZ2xlLmNvbVxcXC9zdG9yZVxcXC9hcHBzXFxcL2RldGFpbHM_aWQ9Y29tLnRva29wZWRpYS50a3BkJmhsPWVuXCIsXCJpZFwiOlwiYTA1Njc5MzFmNTI5NGYwMDgyZGM0YmU1ZmZiYmYxYTVcIixcInVybF9pZHNcIjpbXCJhZGEyYzFiZjNlZWYwMDI0NzAzYjJiNTdmMmNmMjc3YTU2MDIyYjU1XCJdfSJ9&amp;source=gmail&amp;ust=1459306536673000&amp;usg=AFQjCNGcyvjK2yB6OlYm7SOAOhnYoQAqiw" target="_blank" href="http://mandrillapp.com/track/click/12090311/play.google.com?p=eyJzIjoic0VISmk1cWphSVVQQURIcWU5WGEtc1hlQUZzIiwidiI6MSwicCI6IntcInVcIjoxMjA5MDMxMSxcInZcIjoxLFwidXJsXCI6XCJodHRwczpcXFwvXFxcL3BsYXkuZ29vZ2xlLmNvbVxcXC9zdG9yZVxcXC9hcHBzXFxcL2RldGFpbHM_aWQ9Y29tLnRva29wZWRpYS50a3BkJmhsPWVuXCIsXCJpZFwiOlwiYTA1Njc5MzFmNTI5NGYwMDgyZGM0YmU1ZmZiYmYxYTVcIixcInVybF9pZHNcIjpbXCJhZGEyYzFiZjNlZWYwMDI0NzAzYjJiNTdmMmNmMjc3YTU2MDIyYjU1XCJdfSJ9" style="color:#008000"><img alt="Download Android App" style="border:0;min-height:auto;max-width:120px;outline:0" src="https://ci5.googleusercontent.com/proxy/2x1UnJnjiQxKNKMf1XswuulERktxkS5zM1D8JpJtorufw1Q2JCju4axF4eMLiEhUKuv3NKzsb3bFYFaVQ3mZ2dUveWnQz1E6Zihn-LtfJQ=s0-d-e1-ft#https://ecs7.tokopedia.net/img/email/android-download.png"></a>
                                        </div>
                                        */ ?>
                                    </td>
                                    <td valign="top" style="margin:0;padding:0">

                                        <span style="font-size:12px;margin-bottom:6px;display:inline-block">Ikuti Kami
</span>

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

                                        <p style="color:#91908e;font-size:10px;line-height:150%;font-weight:normal;margin:0px;padding:0px">Jika butuh bantuan, gunakan halaman <a target="_blank" style="color:#0f990f;text-decoration:none;margin:0;padding:0" href="<?php echo $url.CHtml::normalizeUrl(array('/home/pcontact')); ?>">Kontak Kami</a>.<br style="margin:0;padding:0">2016 &copy;

                                            <span class="lG">Mama Bear</span></p>
                                    </td>
                                    <td valign="middle" style="width:40%">

                                        <div style="text-align:right"><img alt="Mama Bear" style="max-width: 120px;" src="<?php echo $baseUrl ?>/asset/images/logo.png">
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
</div>