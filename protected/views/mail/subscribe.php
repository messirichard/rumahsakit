<?php
$baseUrl = Yii::app()->request->hostInfo . Yii::app()->request->baseUrl;
$url = Yii::app()->request->hostInfo;
?>
<div bgcolor="#ffffff">
	<div class="adM">
</div>
<table width="750" cellspacing="0" cellpadding="0" style="BORDER-BOTTOM:#0a5aaa 2px solid">
<tbody>
<tr valign="bottom" align="left">
<td width="" height="62"><a target="_blank" name="" href="<?php echo $url.CHtml::normalizeUrl(array('/home/index')) ?>"><img width="180" height="62" src="<?php echo $baseUrl ?>/asset/images/logo-dv-comp.png"></a></td>
<td width="" style="PADDING-BOTTOM:7px">&nbsp;</td>
</tr>
</tbody>
</table>
<font face="tahoma, arial"> 
<h2>Hallo Administrator DV Computers</h2>

<p>Email: <?php echo $email; ?> want to subscribe DV Computers.</p>
<p>&nbsp;</p>
<p>Regards,</p>
<p>&nbsp;</p>
<p>DV Computers</p>
<table width="750" height="90" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td align="left" style="FONT-SIZE:11px">Copyright DV Computers - <?php date("Y") ?>. </td>
</tr>
</tbody>
</table>
</div>