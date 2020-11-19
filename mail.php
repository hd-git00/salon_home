

<?php

$request_param = $_POST;

$request_datetime = date("Y年m月d日 H時i分s秒");


$mailto = $request_param['form_email'];
$to = 'take393hide@gmail.com';
$mailfrom = 'take393hide@gmail.com';
$subject = "お問い合わせ、ありがとうございます。";

$content = "";
$content .= $request_param['form_name']. "様\r\n";
$content .= "お問い合わせ、ありがとうございます。\r\n";
$content .= "=================================\r\n";
$content .= "お名前　 　　　　　　" . htmlspecialchars($request_param['form_name'])."\r\n";
$content .= "メールアドレス　 　　" . htmlspecialchars($request_param['form_email'])."\r\n";
$content .= "お問い合わせ内容　 　" . htmlspecialchars($request_param['form_contents'])."\r\n";
$content .= "お問い合わせ日時　 　" . $request_datetime."\r\n";
$content .= "=================================\r\n";

//管理者確認用メール
$subject2 = "お問い合わせがありました。";
$content2 = "";
$content2 .= "お問い合わせがありました。\r\n";
$content2 .= "=================================\r\n";
$content2 .= "お名前　 　　　　　" . htmlspecialchars($request_param['form_name'])."\r\n";
$content2 .= "メールアドレス　 　" . htmlspecialchars($request_param['form_email'])."\r\n";
$content2 .= "お問い合わせ内容　 " . htmlspecialchars($request_param['form_content'])."\r\n";
$content2 .= "お問い合わせ日時   " . $request_datetime."\r\n";
$content2 .= "================================="."\r\n";

mb_language("ja");
mb_internal_encoding("UTF-8");
//mail 送信
if($request_param['token'] === '1234567'){
if(mb_send_mail($to, $subject2, $content2, $mailfrom)){
   mb_send_mail($mailto,$subject,$content,$mailfrom);
   ?>
   <script>
       window.location = "file:///Users/takehide/Programing/HTML:CSS/201020_%E3%83%98%E3%82%A2%E3%82%B5%E3%83%AD%E3%83%B3%E3%82%B5%E3%82%A4%E3%83%88%E3%81%AE%E3%82%B3%E3%83%94%E3%83%BC/index.html";
   </script>
   <?php
} else {
   header('Content-Type: text/html; charset=UTF-8');
 echo "メールの送信に失敗しました";
};
} else {
echo "メールの送信に失敗しました（トークンエラー）";
}

?>