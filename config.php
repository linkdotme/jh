<?php                                 //*In The Name Of GOD | بنام خدا*\\

$TOKEN="5071665305:AAErww-s2kzAaGQQnQmuT4F9BMwYdFPtNDo";
$ADMIN="1101340026";
define('API_KEY',$TOKEN);
//-----------------------------------------------------------------------------
function Bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
//-----------------------------------------------------------------------------
//متغیر ها :
// msg
$admins=file_get_contents('data/admins');
if(!$admins){
file_put_contents('data/admins',"$ADMIN");
    $admins="$ADMIN";
}
$nottext = "aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ@";
$chnn = "chillguyxmas_bot/game?startapp=6527457119";
$Dev = explode('|',$admins); // put id of admins
$usernamebot = bot('getme')->result->username;
$botid = bot('getme')->result->id;
$channel = file_get_contents("data/channel.txt");
$ChannelX = '-1001680955237';
$alarm = 'اسم نداره ☹️';
$alarm1 = 'آیدی نداری️';

//-----------------------------------------------------------------------------------------------
$input=file_get_contents('php://input');
$stats=file_get_contents("stats.txt");
if(!$input and $stats and $DDD != 1){exit;}else{file_put_contents('update.txt',$input);}
$update = json_decode($input);
$message = $update->message;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$first_name = $message->from->first_name;
$username = $message->from->username;
$textmassage = $message->text;
$text = $textmassage;
$messageid = $update->callback_query->message->message_id;
$tc = $update->message->chat->type;
$chatid = $update->callback_query->message->chat->id;
$fromid = $update->callback_query->from->id;
$fd=$from_id.$fromid;
$cd=$chat_id.$chatid;
$data = $update->callback_query->data;
$membercall = $update->callback_query->id;
$firstname = $update->callback_query->from->first_name;
$usernameca = $update->callback_query->from->username;
//==================================================================
$stars1 = -1;
$stars = $stars1 +1;
$stars = json_decode(file_get_contents("data/user/$from_id.json"),true);
$juser = json_decode(file_get_contents("data/user/$from_id.json"),true);
$cuser = json_decode(file_get_contents("data/user/$fromid.json"),true);
$getgp = json_decode(file_get_contents("data/gp/$chat_id.json"),true);
$getgpc = json_decode(file_get_contents("data/gp/$chatid.json"),true);
$database = json_decode(file_get_contents("data/database.json"),true);
$rival = json_decode(file_get_contents("data/rival.json"),true);
$stats=file_get_contents("stats.txt");
$statsgp=file_get_contents("statsgp.txt");
$bans=file_get_contents("data/bans.txt");
if(!$stats){
    $url=str_replace('/index.php','/',"https://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]).'index.php';
    $get=file_get_contents("https://api.telegram.org/bot".API_KEY."/setwebhook?url=$url");
    echo $get;
    mkdir('data');
    mkdir('data/gp');
    mkdir('data/user');
    Bot('SendMessage',['chat_id'=>$ADMIN,'text'=>'Config Success ! Re /start']);
    file_put_contents('stats.txt',"$ADMIN\n");
    file_put_contents('statsgp.txt',"$ADMIN\n");
    exit;
}elseif($fd>1000 and strpos("$stats","$fd\n") === false){
    file_put_contents('stats.txt',"$fd\n$stats");
}elseif($fd > 1000 and $cd > 1000 and $fd != $cd and strpos("$statsgp","$cd\n") === false){
    file_put_contents('statsgp.txt',"$cd\n$statsgp");
}
 if($firstname == null){
 $firstname == $alarm;
 }else{
     $alarm ='';
 }
 if($usernameca == null){
 $usernameca == $alarm1;
 }else{
     $alarm1 ='';
 }