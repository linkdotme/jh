
<?php
$DDD=1;
include "index.php";
//===================================================================
$send = json_decode(file_get_contents("user.json"),true);

if($send['gp']["send"] == "true"){ //===============SEND GP
$text=$send["gp"]["text"];
$sender=$send["gp"]["sender"];
$tag=$send["gp"]["tag"];
$num=$send["gp"]["num"];
$start=$send["gp"]["start"];
if($start == 0){
$files = scandir('data/gp/');
    for($z = 0;$z <= count($files);$z++){
$file = pathinfo($files[$z]);
$mmd = $file['filename'];
if(!filter_var($mmd, FILTER_VALIDATE_INT) === false){$Z.="$mmd\n";}
}
file_put_contents("data/statsGP.txt",$Z);
$send["gp"]["start"]="1";
$send["gp"]["num"]='0';
$send = json_encode($send,true);
file_put_contents("user.json",$send);
if($sender!=$Dev[0]){
$MSG_ID=Bot('SendMessage',[
    'chat_id'=>$sender,
    'text'=>$text
    ])->result->message_id;
    
    Bot('SendMessage',[
    'chat_id'=>$sender,
    'reply_to_message_id'=>$MSG_ID,
    'text'=>'✅ پیام بالا تا 60 ثانیه دیگر در همه گروه ها ارسال خواهد شد '."\n⭕️  /cancel_send_gp - لغو ارسال ",
    ]);
    Bot('SendMessage',[
    'chat_id'=>$Dev[0],
    'text'=>"🔰این پیام توسط ادمین <a href=\"tg://user?id=$sender\">$sender</a> در همه گروه ها ارسال خواهد شد !",
    'parse_mode'=>'html'
    ]);
}
    $msg_id=Bot('SendMessage',[
    'chat_id'=>$Dev[0],
    'text'=>$text
    ])->result->message_id;
    Bot('SendMessage',[
    'chat_id'=>$Dev[0],
    'reply_to_message_id'=>$msg_id,
    'text'=>'✅ پیام بالا تا 60 ثانیه دیگر در همه گروه ها ارسال خواهد شد '."\n⭕️  /cancel_send_gp - لغو ارسال ",
    ]);

}elseif($start==1){
$statsGP=file_get_contents("data/statsGP.txt");
if(!$statsGP){
    $send["gp"]["send"]='End';
$send = json_encode($send,true);
file_put_contents("user.json",$send);
    exit;
}
$exp=explode("\n",$statsGP);
$TDD=count($exp);

if(count($exp)>100){$TDD=100;}
if($TDD>0){$TDD=0;}
    for($i=0;$i<=$TDD;$i++){
$ID=$exp[$i];
if(!filter_var($ID, FILTER_VALIDATE_INT) === false){
Bot('sendmessage',['chat_id'=>$ID,'text'=>$text]);
        $CC.="$ID\n";
    }
    }
    $str=str_replace("$CC",'',$statsGP);
    $CGP=$num+count(explode("\n",$CC))-1;
$send["gp"]["num"]=$CGP;
file_put_contents("user.json",json_encode($send,true));
file_put_contents('data/statsGP.txt',$str);
if($i==count($exp) and $str){
Bot('sendmessage',['chat_id'=>$Dev[0],'text'=>"📊 تعداد ارسال شده در گروه : $CGP"]);
}elseif(!$str){
    
$MD=Bot('sendmessage',['chat_id'=>$Dev[0],'text'=>"$text"])->result->message_id;
Bot('sendmessage',['chat_id'=>$Dev[0],'reply_to_message_id'=>$MD,'text'=>"
✅ارسال پیام بالا به گروه ها پایان یافت.
📊 تعداد ارسال شده در گروه : $CGP
/cancel_send_gp - تایید و خاموش کردن اعلان "]);
$send = json_decode(file_get_contents("user.json"),true);
$send["gp"]["send"]="false";

}

}

}
//============================================================================
elseif($send['pv']["send"] == "true"){ //==============Send PV

$text=$send["pv"]["text"];
$sender=$send["pv"]["sender"];
$tag=$send["pv"]["tag"];
$num=$send["pv"]["num"];
$start=$send["pv"]["start"];
if($start == 0){
$files = scandir('data/user/');
    for($z = 0;$z <= count($files);$z++){
$file = pathinfo($files[$z]);
$mmd = $file['filename'];
if(!filter_var($mmd,FILTER_VALIDATE_INT) === false){$Z.="$mmd\n";}
}
file_put_contents("data/statsPV.txt",$Z);
$send["pv"]["start"]="1";
$send["pv"]["num"]='0';
$send = json_encode($send,true);
file_put_contents("user.json",$send);
if($sender != $Dev[0]){
$MSG_ID=Bot('SendMessage',[
    'chat_id'=>$sender,
    'text'=>$text
    ])->result->message_id;
    
    Bot('SendMessage',[
    'chat_id'=>$sender,
    'reply_to_message_id'=>$MSG_ID,
    'text'=>'✅ پیام بالا تا 60 ثانیه دیگر در همه PV ها ارسال خواهد شد '."\n⭕️  /cancel_send_gp - لغو ارسال ",
    ]);
    Bot('SendMessage',[
    'chat_id'=>$Dev[0],
    'text'=>"🔰این پیام توسط ادمین <a href=\"tg://user?id=$sender\">$sender</a> در همه PV ها ارسال خواهد شد !",
    'parse_mode'=>'html'
    ]);
}
    $msg_id=Bot('SendMessage',[
    'chat_id'=>$Dev[0],
    'text'=>$text,
    ])->result->message_id;
    Bot('SendMessage',[
    'chat_id'=>$Dev[0],
    'reply_to_message_id'=>$msg_id,
    'text'=>'✅ پیام بالا تا 60 ثانیه دیگر در همه PV ها ارسال خواهد شد '."\n⭕️  /cancel_send_pv - لغو ارسال ",
    ]);

}
elseif($start==1){
$statsPV=file_get_contents("data/statsPV.txt");
if(!$statsPV){
    $send["pv"]["send"]='End';
$send = json_encode($send,true);
file_put_contents("user.json",$send);
    exit;
}
$exp=explode("\n","$statsPV");
$TDD=count($exp);
if(count($exp)>50){$TDD=50;}
    for($i=0;$i<=$TDD;$i++){
$ID=$exp[$i];
if(!filter_var($ID, FILTER_VALIDATE_INT) === false){
Bot('sendmessage',['chat_id'=>$ID,'text'=>$text]);
$CC.="$ID\n";
}}
    $str=str_replace("$CC",'',$statsPV);
    $EXE=explode("\n",$CC);
    $CGP=$num + count($EXE);
$send["pv"]["num"]=$CGP - 1;
file_put_contents("user.json",json_encode($send,true));
file_put_contents('data/statsPV.txt',$str);
if($str){
    $MD=Bot('sendmessage',['chat_id'=>$Dev[0],'text'=>"$text"])->result->message_id;
Bot('sendmessage',['chat_id'=>$Dev[0],'reply_to_message_id'=>$MD,'text'=>"📊 تعداد ارسال شده در PV : ".($CGP-1)]);
}elseif(!$str){
$send["pv"]["send"]='none';
$send = json_encode($send,true);
$MD=Bot('sendmessage',['chat_id'=>$Dev[0],'text'=>"$text"])->result->message_id;
Bot('sendmessage',['chat_id'=>$Dev[0],'reply_to_message_id'=>$MD,'text'=>"
✅ارسال پیام بالا به PV ها پایان یافت.
📊 تعداد ارسال شده در PV : $CGP
/cancel_send_pv - تایید و خاموش کردن اعلان "]);
}


}
}
//===========================================================================
elseif($send['fwd_gp']["send"] == "true"){
$sender=$send['fwd_gp']["sender"];
$tag=$send['fwd_gp']["tag"];
$num=$send['fwd_gp']["num"];
$FID=$send['fwd_gp']["fid"];
$FCD=$send['fwd_gp']["fcd"];
$start=$send["fwd_gp"]["start"];
if($start == 0){
    #PUT LIST GP : START
$files = scandir('data/gp/');
    for($z = 0;$z <= count($files);$z++){
$file = pathinfo($files[$z]);
$mmd = $file['filename'];
if(!filter_var($mmd,FILTER_VALIDATE_INT) === false){$Z.="$mmd\n";}
}
file_put_contents("data/FstatsGP.txt",$Z);
#PUT LIST GP : END
Bot('SendMessage',[
    'chat_id'=>$Dev[0],
    'text'=>"🔰این پیام توسط ادمین <a href=\"tg://user?id=$sender\">$sender</a> در همه گروه ها فروارد خواهد شد !",
    'parse_mode'=>'html'
    ]);
$msg_id=Bot('ForwardMessage',[
    'chat_id'=>$Dev[0],
    'from_chat_id'=>$FCD,
    'message_id'=>$FID,
    ])->result->message_id;
$send["fwd_gp"]["start"]="1";
$send["fwd_gp"]["num"]='0';
if(!$msg_id){
    $send["fwd_gp"]["send"]="false";
    $send = json_encode($send,true);
file_put_contents("user.json",$send);
exit;
}
$send = json_encode($send,true);
file_put_contents("user.json",$send);

    Bot('SendMessage',[
    'chat_id'=>$Dev[0],
    'reply_to_message_id'=>$msg_id,
    'text'=>'✅ پیام بالا تا 60 ثانیه دیگر در همه گروه ها فروارد خواهد شد '."\n⭕️  /cancel_fwd_gp - لغو ارسال ",
    ]);
if($sender != $Dev[0]){ #WARN SENDER : SRART
$MSG_ID=Bot('ForwardMessage',[
    'chat_id'=>$sender,
    'from_chat_id'=>$Dev[0],
    'message_id'=>$msg_id,
    ])->result->message_id;
    
    Bot('SendMessage',[
    'chat_id'=>$sender,
    'reply_to_message_id'=>$MSG_ID,
    'text'=>'✅ پیام بالا تا 60 ثانیه دیگر در همه گروه ها فروارد خواهد شد '."\n⭕️  /cancel_fwd_gp - لغو ارسال ",
    ]);
    
} #WARN SENDER : END
#START 0 : END
}elseif($start=='1'){
$FstatsGP=file_get_contents("data/FstatsGP.txt");
if(!$FstatsGP){
    $send["fwd_gp"]["send"]='End';
$send = json_encode($send,true);
file_put_contents("user.json",$send);
    exit;
}
$exp=explode("\n","$FstatsGP");
$TDD=count($exp);
if(count($exp)>100){$TDD=100;}
for($i=0;$i<=$TDD;$i++){
$ID=$exp[$i];
if(!filter_var($ID, FILTER_VALIDATE_INT) === false){
Bot('forwardmessage',['chat_id'=>$ID,'from_chat_id'=>$FCD,'message_id'=>$FID]);
$CC.="$ID\n";
}}
    $str=str_replace("$CC",'',$FstatsGP);
    $EXE=explode("\n",$CC);
    $CGP=$num + count($EXE) - 1;
$send["fwd_gp"]["num"]=$CGP;
$send = json_encode($send,true);
file_put_contents("user.json",$send);
file_put_contents("data/FstatsGP.txt",$str);
    if($str){
        $MSG_ID=Bot('ForwardMessage',[
    'chat_id'=>$sender,
    'from_chat_id'=>$FCD,
    'message_id'=>$FID,
    ])->result->message_id;
    
    Bot('SendMessage',[
    'chat_id'=>$sender,
    'reply_to_message_id'=>$MSG_ID,
    'text'=>"📊 این پیام تا الان به $CGP گروه فروارد شده",
    ]);
    }else{
         $MSG_ID=Bot('ForwardMessage',[
    'chat_id'=>$sender,
    'from_chat_id'=>$FCD,
    'message_id'=>$FID,
    ])->result->message_id;
    Bot('SendMessage',[
    'chat_id'=>$sender,
    'reply_to_message_id'=>$MSG_ID,
    'text'=>"✅ فروارد این پیام به گروه ها پایان رسید
📊 تعداد فروارد : $CGP",
    ]);
    }
    
}

}
//===========================================================================
elseif($send['fwd_pv']["send"] == "true"){
$sender=$send['fwd_pv']["sender"];
$tag=$send['fwd_pv']["tag"];
$num=$send['fwd_pv']["num"];
$FID=$send['fwd_pv']["fid"];
$FCD=$send['fwd_pv']["fcd"];
$start=$send["fwd_pv"]["start"];
if($start == 0){
    #PUT LIST GP : START
$files = scandir('data/user/');
    for($z = 0;$z <= count($files);$z++){
$file = pathinfo($files[$z]);
$mmd = $file['filename'];
if(!filter_var($mmd,FILTER_VALIDATE_INT) === false){$Z.="$mmd\n";}
}
file_put_contents("data/FstatsPV.txt",$Z);
#PUT LIST GP : END
Bot('SendMessage',[
    'chat_id'=>$Dev[0],
    'text'=>"🔰این پیام توسط ادمین <a href=\"tg://user?id=$sender\">$sender</a> به همه کاربران فروارد خواهد شد !",
    'parse_mode'=>'html'
    ]);
$msg_id=Bot('ForwardMessage',[
    'chat_id'=>$Dev[0],
    'from_chat_id'=>$FCD,
    'message_id'=>$FID,
    ])->result->message_id;
$send["fwd_pv"]["start"]="1";
$send["fwd_pv"]["num"]='0';
if(!$msg_id){
    $send["fwd_pv"]["send"]="false";
    $send = json_encode($send,true);
file_put_contents("user.json",$send);
exit;
}
$send = json_encode($send,true);
file_put_contents("user.json",$send);

    Bot('SendMessage',[
    'chat_id'=>$Dev[0],
    'reply_to_message_id'=>$msg_id,
    'text'=>'✅ پیام بالا تا 60 ثانیه دیگر به همه کاربران فروارد خواهد شد '."\n⭕️  /cancel_fwd_pv - لغو ارسال ",
    ]);
if($sender != $Dev[0]){ #WARN SENDER : SRART
$MSG_ID=Bot('ForwardMessage',[
    'chat_id'=>$sender,
    'from_chat_id'=>$Dev[0],
    'message_id'=>$msg_id,
    ])->result->message_id;
    
    Bot('SendMessage',[
    'chat_id'=>$sender,
    'reply_to_message_id'=>$MSG_ID,
    'text'=>'✅ پیام بالا تا 60 ثانیه دیگر به همه کاربران فروارد خواهد شد '."\n⭕️  /cancel_fwd_pv - لغو ارسال ",
    ]);
    
} #WARN SENDER : END
#START 0 : END
}elseif($start=='1'){
$FstatsPV=file_get_contents("data/FstatsPV.txt");
if(!$FstatsPV){
    $send["fwd_pv"]["send"]='End';
$send = json_encode($send,true);
file_put_contents("user.json",$send);
    exit;
}
$exp=explode("\n","$FstatsPV");
$TDD=count($exp);
if(count($exp)>100){$TDD=100;}
for($i=0;$i<=$TDD;$i++){
$ID=$exp[$i];
if(!filter_var($ID, FILTER_VALIDATE_INT) === false){
Bot('forwardmessage',['chat_id'=>$ID,'from_chat_id'=>$FCD,'message_id'=>$FID]);
$CC.="$ID\n";
}}
    $str=str_replace("$CC",'',$FstatsPV);
    $EXE=explode("\n",$CC);
    $CGP=$num + count($EXE) - 1;
$send["fwd_pv"]["num"]=$CGP;
$send = json_encode($send,true);
file_put_contents("user.json",$send);
file_put_contents("data/FstatsPV.txt",$str);
    if($str){
        $MSG_ID=Bot('ForwardMessage',[
    'chat_id'=>$sender,
    'from_chat_id'=>$FCD,
    'message_id'=>$FID,
    ])->result->message_id;
    
    Bot('SendMessage',[
    'chat_id'=>$sender,
    'reply_to_message_id'=>$MSG_ID,
    'text'=>"📊 این پیام تا الان به $CGP کاربر فروارد شده",
    ]);
    }else{
         $MSG_ID=Bot('ForwardMessage',[
    'chat_id'=>$sender,
    'from_chat_id'=>$FCD,
    'message_id'=>$FID,
    ])->result->message_id;
    Bot('SendMessage',[
    'chat_id'=>$sender,
    'reply_to_message_id'=>$MSG_ID,
    'text'=>"✅ فروارد این پیام به کاربران پایان یافت .
📊 تعداد فروارد : $CGP",
    ]);
    }
    
}

}
