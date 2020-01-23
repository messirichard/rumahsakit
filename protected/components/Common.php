<?php
/**
 * Common functions
 * 
 * @author Deory Pandu
 * @link http://con.cept.me
 */
class Common {

    public static function mail($config = array())
    {
        // bila from tidak di setting 
        $config['from'] = ($config['from']=='')? 'info@suryasukses.com' :$config['from'];
        $config['bcc'] = ( empty($config['bcc']) )? array('ibnufajar372@gmail.com'):$config['bcc'];

        $config['to'] = ($config['to']=='')?array():$config['to'];
        // echo $config['to']."<br>";
        // echo $config['message'];
        // exit;
        // self::mailMail($config['to'], $config['from'], $config['subject'], $config['message'], $config['cc'], $config['bcc']);
        
        self::mailPhpMailer($config['to'], $config['from'], $config['subject'], $config['message'], $config['cc'], $config['bcc']);
        

        // self::mailSmtp($config['to'], $config['from'], $config['subject'], $config['message'], $config['cc'], $config['bcc']);
        // self::mailTest();
    }
    public static function mailMail($to=array(), $from='', $subject='', $message='', $cc=array(), $bcc=array())
    {
        // multiple recipients
        $to = ( is_array($to) )? implode(', ', $to) : $to;
        $cc = ( is_array($cc) )? implode(', ', $cc) : $cc;
        $bcc = ( is_array($bcc) )? implode(', ', $bcc) : $bcc;
        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Additional headers
        $headers .= 'To: ' . $to . " \r\n";
        $headers .= 'From: ' . $from . " \r\n";
        if ($cc!='') {
        $headers .= 'Cc: '. $cc . " \r\n";
        }
        if ($bcc!='') {
        $headers .= 'Bcc: '. $bcc . " \r\n";
        }

        // Mail it
        mail($to, $subject, $message, $headers);
    }

     public function mailSmtp($to=array(), $from='', $subject='', $message='', $cc=array(), $bcc=array())
    {
            $to = ( is_array($to) )? implode(', ', $to) : $to;
            $cc = ( is_array($cc) )? implode(', ', $cc) : $cc;
            $bcc = ( is_array($bcc) )? implode(', ', $bcc) : $bcc;

            $tujuan = "ibnudrift@gmail.com";

            Yii::import('application.extensions.phpmailer.JPhpMailer');
            $mail = new JPhpMailer;
            
            $mail->IsSMTP();  // telling the class to use SMTP
            $mail->Mailer = "smtp";
            $mail->Host = "ssl://smtp.gmail.com";
            $mail->Port = 465;
            $mail->SMTPAuth = true; // turn on SMTP authentication
            $mail->Username = "deo@markdesign.net"; // SMTP username
            $mail->Password = "markdesigndeo"; // SMTP password 
            
            $mail->ClearAddresses();

            $mail->AddAddress($tujuan, $tujuan);

            $mail->From = 'deo@markdesign.net';
            $mail->FromName = 'deo@markdesign.net';
            $mail->AddReplyTo($from, $from);
            $mail->Html = TRUE;
            $mail->Subject = $subject;
            $mail->MsgHTML($message);
            $mail->Send();
    }

    public static function mailPhpMailer($to=array(), $from='', $subject='', $message='', $cc=array(), $bcc=array())
    {

        Yii::import('application.extensions.phpmailer.JPhpMailer');
        $mail = new JPhpMailer;
        if (is_array($to)) {
            foreach ($to as $key => $value) {
                $mail -> AddReplyTo($value, "Client");
                $mail -> AddAddress($value, "Client");
            }
        }else{
            if ($to != '') {
                $mail -> AddReplyTo($to, "Client");
                $mail -> AddAddress($to, "Client");
            }
        }
        if (is_array($cc)) {
            foreach ($cc as $key => $value) {
                $mail -> AddReplyTo($value, "Client");
                $mail -> AddAddress($value, "Client");
            }
        }else{ 
            if ($cc != '') {
                $mail -> AddReplyTo($cc, "Client");
                $mail -> AddAddress($cc, "Client");
            }
        }
        if (is_array($bcc)) {
            foreach ($bcc as $key => $value) {
                $mail -> AddBCC($value, "Client");
            }
        }else{
            if ($bcc != '') {
                $mail -> AddBCC($bcc, "Client");
            }
        }

        $mail->IsSMTP();  // telling the class to use SMTP
        $mail->Mailer = "smtp";
        $mail->Host = "mail.amariupvc.com";
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = "sender@amariupvc.com"; // SMTP username
        $mail->Password = "6+_CHSZ!MxXy"; // SMTP password 

        $mail -> SetFrom($from, 'Suryasukses Group - NoReply');
        $mail -> Subject = $subject;
        $mail -> AltBody = "To view the message, please use an HTML compatible email viewer!";
        $mail -> MsgHTML($message);
        $mail->Send();
    }

    public function mailTest()
    {
        // multiple recipients
        // $to  = 'info@fotocopysurabaya.web.id' . ', '; // note the comma
        $to .= 'info@fotocopysurabaya.web.id';

        // subject
        $subject = 'Birthday Reminders for August';

        // message
        $message = '
        <html>
        <head>
          <title>Birthday Reminders for August</title>
        </head>
        <body>
          <p>Here are the birthdays upcoming in August!</p>
          <table>
            <tr>
              <th>Person</th><th>Day</th><th>Month</th><th>Year</th>
            </tr>
            <tr>
              <td>Joe</td><td>3rd</td><td>August</td><td>1970</td>
            </tr>
            <tr>
              <td>Sally</td><td>17th</td><td>August</td><td>1973</td>
            </tr>
          </table>
        </body>
        </html>
        ';

        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Additional headers
        $headers .= 'To: info <info@fotocopysurabaya.web.id>' . "\r\n";
        $headers .= 'From: no-reply <no-reply@suryasukses.com>' . "\r\n";
        // $headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
        // $headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

        // Mail it
        mail($to, $subject, $message, $headers);
        exit;
    }

    static public function checkAccess($akses)
    {
        $session=new CHttpSession;
        $session->open();
        $sessionID = $session->getSessionID();

        $auth=Yii::app()->cache->get($sessionID.'getUserAccess');
        if($auth===false)
        {
            $auth = User::model()->getUserAccess();
            Yii::app()->cache->set($sessionID.'getUserAccess',$auth,3600);
        }
        // print_r($akses);echo '|';print_r($auth);echo '|';

        if (isset($auth[$akses]) OR $auth === 'All'){
            return true;
        }else{
            return false;
        }
    }
    
    static public function createFormDatePick($label='', $name='Date', $type='date', $value = '')
    {
        if ($value == '0000-00-00 00:00:00') {
            $value = date("Y-m-d H:i:s");
        }
        $value = strtotime($value);
        if ($value == 0) {
            $value = strtotime('1910-01-01 00:00:00');
        }

        // Create Year
        $createYear = '<select name="'.$name.'[year]" style="width: auto;">';
        for ($i=date("Y")+10; $i >= date("Y") - 100 ; $i--) { 
            $createYear .= '<option value="'.$i.'" '.((date('Y', $value) == $i) ? 'selected="selected"' : '').'>'.$i.'</option>';
        }
        $createYear .= '</select>';

        // Create month
        $createMonth = '<select name="'.$name.'[month]" style="width: auto;">';
        for ($i=1; $i <= 12 ; $i++) { 
            $createMonth .= '<option value="'.substr('00'.$i, -2).'" '.((date('m', $value) == $i) ? 'selected="selected"' : '').'>'.substr('00'.$i, -2).'</option>';
        }
        $createMonth .= '</select>';

        // Create Date
        $createDate = '<select name="'.$name.'[date]" style="width: auto;">';
        for ($i=1; $i <= 31 ; $i++) { 
            $createDate .= '<option value="'.substr('00'.$i, -2).'" '.((date('d', $value) == $i) ? 'selected="selected"' : '').'>'.substr('00'.$i, -2).'</option>';
        }
        $createDate .= '</select>';

        // Create Date
        $createHours = '<input type="text" name="'.$name.'[hours]" value="'.date('H', $value).'" style="width: 20px;"/>';

        // Create Minute
        $createMinute = '<input type="text" name="'.$name.'[minute]" value="'.date('i', $value).'" style="width: 20px;"/>';

        // Create Second
        $createSecond = '<input type="text" name="'.$name.'[second]" value="'.date('s', $value).'" style="width: 20px;"/>';



        $str = '
        <div class="control-group">
            <label for="" class="control-label">
                '.$label.'
            </label>
            <div class="controls">
                '.$createDate.$createMonth.$createYear.$createHours.$createMinute.$createSecond.'
            </div>
        </div>
        ';

        return $str;
    }

    public static function replaceBr($data) {
        $data = preg_replace('#(?:<br\s*/?>\s*?){2,}#', '</p><p>', $data);
        return "<p>$data</p>";
    }

    public static function getVYoutube($url)
    {
        parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
        return $my_array_of_vars['v'];  
    }
    public static function explodeString($string)
    {
        return explode(',', $string);
    }

    public static function createSetting($name, $label, $type, $dual_language, $value = '', $hide = 0, $group = 'data', $sort = 0)
    {
        if (YII_DEBUG === true) {
            $data = Setting::model()->find('name = :name', array(':name'=>$name));
            if ($data === null) {
                $model = new Setting;
                $model->name = $name;
                $model->label = $label;
                $model->type = $type;
                $model->dual_language = $dual_language;
                $model->value = $value;
                $model->hide = $hide;
                $model->group = $group;
                $model->sort = $sort;
                $model->save();
            }
        }
    }

}