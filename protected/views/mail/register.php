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
                                        <h5 style="line-height:24px;color:#000;font-weight:900;font-size:17px;margin:0 0 20px;padding:0">Selamat datang <?php echo $model->email ?>:</h5>

                                        <p style="font-weight:normal;font-size:14px;line-height:1.6;margin:0 0 20px;padding:0">Trimakasih sudah mendaftar di Mama Bear, anda akan mendapatkan informasi terbaru tentang promo dan diskon Mama Bear</p>
                                        <div align="center" style="text-align:center;margin:20px;padding:0"><a target="_blank" style="margin:0;padding:7px 17px;color:#fff;text-decoration:none;display:inline-block;margin-bottom:0;vertical-align:middle;line-height:20px;font-size:13px;font-weight:600;text-align:center;white-space:nowrap;border-radius:2px;background-color:#777777;background-image:linear-gradient(top,#A2A2A2 0%,#575757 100%);border:1px solid #000000" href="<?php echo $url.CHtml::normalizeUrl(array('/product/index', 'lang'=>'en')); ?>">Lanjut Belanja</a>
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