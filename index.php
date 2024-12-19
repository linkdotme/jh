<?php
include ("config.php");
$getuser = scandir("data/user/");
$alluser1 = count($getuser) + 55000;
$getgp = scandir("data/gp/");
$allgp1 = count($getgp) - 2;
$allhaghm = count($database["ha"]["normal"]);
$allhaghpb = count($database["ha"]["plus"]["boy"]);
$allhaghpg = count($database["ha"]["plus"]["girl"]);
$alljoratm = count($database["jo"]["normal"]);
$alljoratpb = count($database["jo"]["plus"]["boy"]);
$alljoratpg = count($database["jo"]["plus"]["girl"]);
//==================================================================
$Akey=json_encode([
    'keyboard'=>[
	  	  	 [
		['text'=>"⚙️ امار ربات"]             
		 ],
		 		  	[
	  	['text'=>"⚙️ افزودن حقیقت"],['text'=>"⚙️ افزودن جرئت"]
	  ],[
	      ['text'=>'📝 مدیریت سوالات'],['text' => "📢 ثبت کانال اسپانسر"]
	     ],
	             [
	  	['text'=>"⚙️ ارسال به گروه ها"],['text'=>"⚙️ فروارد به گروه ها"]
	  ],
 	[
	  	['text'=>"⚙️ ارسال به کاربران"],['text'=>"⚙️ فروارد به کاربران"]
	  ],
	  [
	      ['text'=>'📓 لیست کاربران سیاه']
	      ],
	      [ 
	      ['text'=>'🗂 پشتیبان گیری از فایل سوالات و آمار']
	      
	      ],
	      
   
       ],
  'resize_keyboard'=>true
   ]);
   $quest_key=json_encode([
    'keyboard'=>[
		 		  	[
	  	['text'=>"😿لیست حقیقت"],['text'=>"😼 لیست جرئت"]
	  ],
	  [['text'=>'برگشت 🔙']],
   ],
      'resize_keyboard'=>true
   ]);
   //========================
   $memkey=json_encode([
    'inline_keyboard'=>[
      
		[
	['text'=>"🍾 بازی در گپ",'url'=>"https://telegram.me/$usernamebot?startgroup=playgame"]
	],
			[
	['text'=>"🎲 بازی با ناشناس",'callback_data'=>"gamerandom"],
	],
	[
	['text'=>"🎮 بازی دوستانه",'callback_data'=>"gamebylink"],
	],
			[
	['text'=>"🎗 ارسال جرئت یا حقیقت",'callback_data'=>"sup"],['text'=>"🚦 راهنما",'callback_data'=>"help"]
	],
		[
	['text'=>"دیگر ربات های ما 🤖",'callback_data'=>"digar"],['text'=>"بازی اسم و فامیل 📝",'url'=>"https://telegram.me/esmfamillanabot"]
	],
	
	[
	['text'=>"پشتیبانی 📞",'callback_data'=>"supp"],['text' => "آمار و اطلاعات 📊",'callback_data' => "hesab"]
	],
/*	[ 
	 ['text' => "TapSwap Solana 🪙",'url' => "https://t.me/tapswap_bot?start=r_1101340026"]
	],*/
			[
	['text'=>"🎲",'callback_data'=>"dice"],['text'=>"🎯",'callback_data'=>"dart"],['text'=>"🏀",'callback_data'=>"basketball"],['text'=>"⚽️",'callback_data'=>"football"]
	],
	  [
	['text'=>"شارژ رایگان 💳",'callback_data'=>"shibafree"]
	],
              ]
        ]);
$questkey=json_encode([
    'inline_keyboard'=>[
		[['text'=>"حقیقت معمولی 👫",'callback_data'=>"haghi_normal"]],
	[['text'=>"حقیقت 🔞 دخترونه",'callback_data'=>"haghi_plus_girl"],['text'=>"حقیقت 🔞 پسرونه",'callback_data'=>"haghi_plus_boy"]],

        ]
        ]);
        $questj=json_encode([
    'inline_keyboard'=>[
		[['text'=>"جرئت معمولی 👫",'callback_data'=>"jorat_normal"]],
	[['text'=>"جرئت 🔞 دخترونه️",'callback_data'=>"jorat_plus_girl"],
['text'=>"جرئت 🔞 پسرونه",'callback_data'=>"jorat_plus_boy"]],

]
        ]);
//==================================================================

if(strpos("$bans","$fd\n") !== false and $fd != $Dev[0]){
exit;
    }
    if($update->message->left_chat_member->id == $botid){
    unlink("data/gp/$chat_id.json");
}elseif(preg_match('/(jorat_)/',$data)){
    $exp=explode('_',$data);
    $tp=$exp[1]; # norlam - plus
    $sex=$exp[2]; # boy - girl
    if($sex=='boy'){
        $T=count($database['jo']['plus']['boy'])-1;
        $QU=$database['jo']['plus']['boy'][rand(0,$T)];
        Bot('EditMessageText',['message_id'=>$messageid,'chat_id'=>$cd,'text'=>"<code>$QU</code>",'parse_mode'=>'html','reply_markup'=>$questj]);
    }elseif($sex=='girl'){
        $T=count($database['jo']['plus']['girl'])-1;
        $QU=$database['jo']['plus']['girl'][rand(0,$T)];
        Bot('EditMessageText',['message_id'=>$messageid,'chat_id'=>$cd,'text'=>"<code>$QU</code>",'parse_mode'=>'html','reply_markup'=>$questj]);
    }else{
        $T=count($database['jo']['normal'])-1;
        $QU=$database['jo']['normal'][rand(0,$T)];
        Bot('EditMessageText',['message_id'=>$messageid,'chat_id'=>$cd,'text'=>"<code>$QU</code>",'parse_mode'=>'html','reply_markup'=>$questj]);
    }
}elseif(preg_match('/^(haghi_)/',$data)){
    $exp=explode('_',$data);
    $tp=$exp[1]; # norlam - plus
    $sex=$exp[2]; # boy - girl
    if($sex=='boy'){
        $T=count($database['ha']['plus']['boy'])-1;
        $QU=$database['ha']['plus']['boy'][rand(0,$T)];
        Bot('EditMessageText',['message_id'=>$messageid,'chat_id'=>$cd,'text'=>"<code>$QU</code>",'parse_mode'=> 'html','reply_markup'=>$questkey]);
    }elseif($sex=='girl'){
        $T=count($database['ha']['plus']['girl'])-1;
        $QU=$database['ha']['plus']['girl'][rand(0,$T)];
        Bot('EditMessageText',['message_id'=>$messageid,'chat_id'=>$cd,'text'=>"<code>$QU</code>",'parse_mode'=> 'html','reply_markup'=>$questkey]);
    }else{
        $T=count($database['ha']['normal'])-1;
        $QU=$database['ha']['normal'][rand(0,$T)];
        Bot('EditMessageText',['message_id'=>$messageid,'chat_id'=>$cd,'text'=>"<code>$QU</code>",'parse_mode'=> 'html','reply_markup'=>$questkey]);
    }
}elseif($data=='jorat_plus_boy'){
    
}elseif($textmassage=="/start" or $textmassage=="/start@$usernamebot"){	

if(!file_exists("data/$from_id.json")){
/*$stars = json_decode(file_get_contents("data/user/$from_id.json"),true);	
$stars["userfild"]["step"]="none";
$stars = json_encode($stars,true);
file_put_contents("data/user/$from_id.json",$stars +1);*/

$forchannel = Bot('getChatMember',['chat_id'=>"@$channel",'user_id'=>"$from_id"]);
//$forchannel1 = Bot('getChatMember',['chat_id'=>"@$chnn",'user_id'=>"$from_id"]);

$tch = $forchannel->result->status;
//$tch1 = $forchannel1->result->status;
}
if($chat_id != $from_id){
    Bot('SendMessage',[
                'chat_id'=>$chat_id,
     'reply_to_message_id'=>$message_id,
     'parse_mode' => 'html',
	'text'=>"<u>🎮 راهنما بازی کردن و نحوه بازی جرئت حقیقت </u>
	
	
	
<b>⁉️ راهنمای اجرای بازی :</b>


1️⃣ ابتدا ربات را به گروه خود اضافه کنید (دسترسی اولیه ادمین را به ربات بدهید)

2️⃣ پس از اضافه کردن ربات یک پیام به صورت خودکار برای اجرای بازی ارسال میشود 

3️⃣ در هر زمان در گروه خود میتوانید با دستور /game بازی جدید بسازید
➖➖➖➖➖➖➖➖➖➖➖

<b>⁉️ راهنمای نحوه بازی :</b>

🌟 روش بازی به این شکل هست که بازیکن‌ها به شکل دایره وار بر روی زمین می‌نشینند و ۲ تا ظرف که روی یکی نوشته شده حقیقت و روی دیگری نوشته شده جرأت وجود دارد.در ظرف حقیقت سوالهایی نوشته شده که بازیکن‌ها باید به درستی به آنها جواب بدهند و در ظرف جرأت هم درخواستهایی هست که باز باید جسارت انجام آنها را داشته باشند.
➖➖➖➖➖➖➖➖➖➖➖


<u>لیست دستورات ربات 👇</u>

1- <b>/start
شروع مجدد ربات، هم در گروه و هم در پی وی ربات کاربرد دارد.</b>
➖➖➖➖➖➖➖➖➖➖➖
2- <b> /game
شروع بازی در گروه، فقط در گروه کاربرد دارد.</b>
➖➖➖➖➖➖➖➖➖➖➖
3- <b> /soalh 
نمایش پیشنهادی لیست سوالات حقیقت، فقط در گروه کاربرد دارد.</b>
➖➖➖➖➖➖➖➖➖➖➖
4- <b>/soalj نمایش پیشنهادی لیست سوالات جرئت، فقط در گروه کاربرد دارد.</b>",
'reply_markup'=>json_encode([
    'remove_keyboard'=>true])
]);
}elseif( !$channel or $tch and $tch != 'left' and $tch != 'kicked' or $from_id == $Dev[0]){
        //if(!$chnn or $tch1 and $tch1 != 'left' and $tch1 != 'kicked' or $fromid == $Dev[0]){

    if($fd==$Dev[0]){
        Bot('SendMessage',['chat_id'=>$chat_id,'text'=>'برای باز کردن پنل : /panel']);
    }
    
   /* if ($stars <= 1){
    Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"در حال بررسی عضویت اکانت شما, در کانال و ربات های اسپانسر ...
 
 لطفا چند ثانیه صبر کنید ...",]);
     sleep ('2');
     Bot('sendmessage',[
  'chat_id'=>$chat_id,
  'text'=>"<b>🛑 لطفا mini app ربات PAWS را اجرا کنید

ربات PAWS را به صورت کامل اجرا کنید
👇🏻</b>",
    'parse_mode'=>'html',
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
          [
  ['text'=>"▂▃▄▅▆▇█▓▒░ START PAWS ▒▓█▇▆▅▄▃▂",'url'=>"https://t.me/PAWSOG_bot/PAWS?startapp=lTG2AxCF"]
  ],
  ]
        ])
        ]);
sleep ('20');}*/
Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"عزیز $first_name 👋
	
🎈 به ربات جرئت یا حقیقت خوش آمدید !
برای شروع بازی کافیه از دکمه های زیر استفاده کنی تا جرئت یا حقیقت بازی کنیم
",
'reply_markup'=>$memkey
    		]);
}//}
elseif($chat_id==$from_id){
Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"سلام کاربر $first_name 👋
	
🎈 به ربات جرئت یا حقیقت خوش آمدید !

🛑 لطفا جهت حمایت ابتدا ربات های زیر را استارت و در کانال های اسپانسر جوین دهید.

سپس با لمس دستور /start ادامه دهید.",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
        	[['text'=>"sponsor 1",'url'=>"https://t.me/PAWSOG_bot/PAWS?startapp=lTG2AxCF"],['text'=>"sponsor 2",'url'=>"https://t.me/cexio_tap_bot?start=1718627624952720"]],
	[['text'=>"sponsor 3",'url'=>"https://t.me/$channel"],
	['text'=>"sponsor 4",'url'=>"https://t.me/$chnn"]],
		
              ]
        ])
    		]);
    		
    		sleep ('20');
    		Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'parse_mode'=> 'html',
	'text'=>"<b>⚠️ پیام سیستم</b>
	
	<u>لطفا mini app این دو ربات اسپانسر را دوباره اجرا نمایید</u>",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"sponsor 1",'url'=>"https://t.me/PAWSOG_bot/PAWS?startapp=lTG2AxCF"],
	
	['text'=>"sponsor 4",'url'=>"https://t.me/$chnn"]],
		
              ]
        ])
    		]);
    		sleep ("10");
}

if(!file_exists("data/$from_id.json")){
$juser = json_decode(file_get_contents("data/user/$from_id.json"),true);	
$juser["userfild"]["step"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/user/$from_id.json",$juser);
}


}elseif($data=='dart'){
    Bot('DeleteMessage',['chat_id'=>$cd,'message_id'=>($messageid - 1)]);
    Bot('DeleteMessage',['chat_id'=>$cd,'message_id'=>$messageid]);
    Bot('SendDice',['chat_id'=>$cd,'emoji'=>'🎯',]);
    Bot('sendmessage',[
	'chat_id'=>$cd,'text'=>"👆🏾اینم شانس من
حالا نوبت توعه بنداز 😼
👇🏻اگه بیخیال شدی میتونی از دکمه های زیر استفاده کنی",'reply_markup'=>$memkey]);
    }elseif($data=='dice'){
    Bot('DeleteMessage',['chat_id'=>$cd,'message_id'=>($messageid - 1)]);
    Bot('DeleteMessage',['chat_id'=>$cd,'message_id'=>$messageid]);
    Bot('SendDice',['chat_id'=>$cd,'emoji'=>'🎲']);
    Bot('sendmessage',[
	'chat_id'=>$cd,'text'=>"👆🏾اینم شانس من
حالا نوبت توعه بنداز 😼
👇🏻اگه بیخیال شدی میتونی از دکمه های زیر استفاده کنی",'reply_markup'=>$memkey]);
    }elseif($data=='football'){
    Bot('DeleteMessage',['chat_id'=>$cd,'message_id'=>($messageid - 1)]);
    Bot('DeleteMessage',['chat_id'=>$cd,'message_id'=>$messageid]);
        Bot('SendDice',['chat_id'=>$cd,'emoji'=>'⚽️']);
    Bot('sendmessage',[
	'chat_id'=>$cd,'text'=>"👆🏾اینم شانس من
حالا نوبت توعه بنداز 😼
👇🏻اگه بیخیال شدی میتونی از دکمه های زیر استفاده کنی",'reply_markup'=>$memkey]);
    }elseif($data=='basketball'){
    Bot('DeleteMessage',['chat_id'=>$cd,'message_id'=>($messageid-1)]);
    Bot('DeleteMessage',['chat_id'=>$cd,'message_id'=>$messageid]);
    Bot('SendDice',['chat_id'=>$cd,'emoji'=>'🏀']);
    Bot('sendmessage',[
	'chat_id'=>$cd,'text'=>"👆🏾اینم شانس من
حالا نوبت توعه بنداز 😼
👇🏻اگه بیخیال شدی میتونی از دکمه های زیر استفاده کنی",'reply_markup'=>$memkey]);
    }
elseif(strpos($textmassage , '/start ') !== false  ) {
$start = str_replace("/start ","",$textmassage);
$jjuser = json_decode(file_get_contents("data/user/$start.json"),true);

if($start != $from_id){
if($juser["userfild"]["ingame"] == "on"){
Bot('sendmessage',[
                'chat_id'=>$chat_id,
	'text'=>"🌟 شما یک بازی در حال انجام دارید ابتدا آن را پایان دهید",
	  'reply_markup'=>json_encode([
    'keyboard'=>[
		 	  	  	 [
					 ['text'=>"❌ پایان بازی"]                            
		 ],
   ],
      'resize_keyboard'=>true
   ])
	  	]);
}elseif($jjuser["userfild"]["ingame"]=='on'){
    Bot('sendmessage',[
                'chat_id'=>$chat_id,
	'text'=>"🌟 کابر مورد نظر مشغول بازی با یک فرد دیگر هست !",
	  'reply_markup'=>json_encode([
    'inline_keyboard'=>[
		[
	['text'=>"🍾 بازی در گپ",'url'=>"https://telegram.me/$usernamebot?startgroup=playgame"]
	],
	[
	['text'=>"🎲بازی با ناشناس",'callback_data'=>"gamerandom"]
	],
			[
	['text'=>"🎗 ارسال جرئت یا حقیقت",'callback_data'=>"sup"]
	],
              ]
   ])
	  	]);
}
else
{
Bot('sendmessage',[
                'chat_id'=>$chat_id,
	'text'=>"🔄 در حال پردازش بازی ...
	
در حال انداختن قرعه برای شروع بازی ✅",
	  'reply_markup'=>json_encode([
    'keyboard'=>[
		 	  	  	 [
					 ['text'=>"❌ پایان بازی"]                            
		 ],
   ],
      'resize_keyboard'=>true
   ])
	  	]);
$name = str_replace(["`","*","_","[","]"],["","","","",""],$first_name);
Bot('sendmessage',[
	'chat_id'=>$start,
	'text'=>"🌟 کاربر [$name](tg://user?id=$from_id) با استفاده از لینک دعوت شما وارد ربات شده
	
🔄 در حال پردازش بازی ...
	
در حال انداختن قرعه برای شروع بازی ✅",
'parse_mode'=>'MarkDown',
	  'reply_markup'=>json_encode([
    'keyboard'=>[
		 	  	  	 [
					 ['text'=>"❌ پایان بازی"]                            
		 ],
   ],
      'resize_keyboard'=>true
   ])
    		]);
$array = array("$from_id",$start);
$random = array_rand($array);
Bot('sendmessage',[
	'chat_id'=>$array[$random],
	'text'=>"❓ نوبت شماست که سوال بپرسید

🎈 منتظر بمانید تا حریف شما جرئت یا حقیقت رو انتخاب کند",
    		]);
$result = array_diff($array , array($array[$random]));
Bot('sendmessage',[
	'chat_id'=>$result[0],
	'text'=>"❓ کدام رو انتخاب میکنید !",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
			[
	['text'=>"💪🏻 جرئت",'callback_data'=>"jorats"],['text'=>"🗣 حقیقت",'callback_data'=>"haghights"]
	],
	[
	['text'=>"جرئت 🔞",'callback_data'=>"jorats18"],['text'=>"حقیقت 🔞",'callback_data'=>"haghights18"]
	],
              ]
        ])
    		]);
Bot('sendmessage',[
	'chat_id'=>$result[1],
	'text'=>"❓ کدام رو انتخاب میکنید !",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
				[
	['text'=>"💪🏻 جرئت",'callback_data'=>"jorats"],['text'=>"🗣 حقیقت",'callback_data'=>"haghights"]
	],
	[
	['text'=>"جرئت 🔞",'callback_data'=>"jorats18"],['text'=>"حقیقت 🔞",'callback_data'=>"haghights18"]
	],
              ]
        ])
    		]);
$juser["userfild"]["rival"]="$start";
$juser["userfild"]["ingame"]="on";
$juser = json_encode($juser,true);
file_put_contents("data/user/$from_id.json",$juser);
$userrival = $start;
$getrival = json_decode(file_get_contents("data/user/$userrival.json"),true);
$getrival["userfild"]["rival"]="$from_id";
$getrival["userfild"]["ingame"]="on";
$getrival = json_encode($getrival,true);
file_put_contents("data/user/$userrival.json",$getrival);
}
}
else
{
Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"🎈 خودت که نمیتونی با خودت بازی کنی !
	
ℹ️ لینک رو برای دوستات ارسال کن و اونارو به بازی دعوت کن",
'reply_markup'=>$memkey
    		]);	
}
}
elseif($textmassage=="/game" or $textmassage=="/game@$usernamebot"){
if($tc == "group" or $tc == "supergroup"){
if(count($getgp["gamer"]) < 2){
unset($getgp["gamer"]);
$getgp["gamer"][]="$from_id";
$getgamer = $getgp["gamer"];
for($z = 0;$z <= count($getgamer) - 1;$z++){
$stat = Bot('getChatMember',['chat_id'=>"$getgamer[$z]",'user_id'=>"$getgamer[$z]"]);
$name = $stat->result->user->first_name;
$zplus = $z + 1 ;
$ingamer = $ingamer."$zplus - $name"."\n";
}
$Time=date('Y-m-d|H:i:s');
	Bot('sendmessage',[
        "chat_id"=>$chat_id,
        "text"=>"🎮 بیاین جرئت حقیقت بازی کنیم

🙃 بازیکنان پایه  : 

$ingamer
➖➖➖➖➖➖➖➖➖
📅 $Time",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
			[
	['text'=>"▶️ شروع بازی",'callback_data'=>"startgame"],['text'=>"✌🏻 من پایه ام",'callback_data'=>"togame"]
	],
	/*	[ 
	    ['text'=>"🥚 سنگ کاغذ قیچی تخم مرغ ها ",'url'=>"https://t.me/egg_fight_demo_bot/demo_app?startapp=ref6148298267--u-ref"],['text' => "NotCoin 🪙",'url' => "https://t.me/notcoin_bot?start=rp_3751961"]
	],*/
			[
			    
	['text'=>"بازی اسم و فامیل 📝",'url'=>"https://t.me/esmfamillanabot"],['text'=>"کانال اسپانسر 📢",'url'=>"https://t.me/$channel"]
	],
		[
	['text'=>"اتوکلیکر بلوم",'url'=>"https://www.aparat.com/v/lrx4w98"]     
	],
              ]
        ])
		]);

	 
$getgp["creator"]="$from_id";
$getgp = json_encode($getgp,true);
file_put_contents("data/gp/$chat_id.json",$getgp);
}
else         
{
	Bot('sendmessage',[
        "chat_id"=>$chat_id,
        "text"=>"🎮 بازی قبلی هنوز تموم نشده ! امکان ساخت بازی جدید وجود ندارد 
		
⚠️ ابتدا بازی قبلی را حذف کنید یا ادامه دهید
➖➖➖➖➖➖➖➖➖",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
        	[
	['text'=>"ادامه بازی ✅",'callback_data'=>"startgame"]
	],
			[
	['text'=>"🗑 حذف بازی",'callback_data'=>"removegame"]
	],
              ]
        ])
		]);
}
}
else
{
Bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"🎈 اجرای این دستور تنها در گروه امکان پذیر است",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
		[
	['text'=>"🍾 بازی در گپ",'url'=>"https://telegram.me/$usernamebot?startgroup=playgame"]
	],
			[
	['text'=>"🎗 ارسال جرئت یا حقیقت",'callback_data'=>"sup"]
	],
              ]
        ])
    		]);
}
}
elseif($textmassage=="❌ پایان بازی"){
    if($juser['userfild']['ingame'] == 'on'){
	Bot('sendmessage',[
        "chat_id"=>$chat_id,
        "text"=>"🎈 ایا با پایان دادن به بازی موافق هستی ؟",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
			[
	['text'=>"✅ بله",'callback_data'=>"yes"],['text'=>"❌ خیر",'callback_data'=>"no"]
	],
              ]
        ])
		]);
    }else{
        
    }
}
elseif($update->message->new_chat_member->id == $botid){
unset($getgp["gamer"]);
$getgp["gamer"][]="$from_id";
$getgamer = $getgp["gamer"];
for($z = 0;$z <= count($getgamer) - 1;$z++){
$stat = Bot('getChatMember',['chat_id'=>"$getgamer[$z]",'user_id'=>"$getgamer[$z]"]);
$name = $stat->result->user->first_name;
$zplus = $z + 1 ;
$ingamer = $ingamer."$zplus - $name"."\n";
}
$Time=date('Y-m-d|H:i:s');

	Bot('sendmessage',[
        "chat_id"=>$chat_id,
        "text"=>"🎮 بیاین جرئت حقیقت بازی کنیم
		
🙃 بازیکنان پایه  : 

$ingamer
➖➖➖➖➖➖➖➖➖
📅 $Time",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
			[
	['text'=>"▶️ شروع بازی",'callback_data'=>"startgame"],['text'=>"✌🏻 من پایه ام",'callback_data'=>"togame"]
	],
	/*	[ 
	    ['text'=>"🥚 سنگ کاغذ قیچی تخم مرغ ها ",'url'=>"https://t.me/egg_fight_demo_bot/demo_app?startapp=ref6148298267--u-ref"],['text' => "NotCoin 🪙",'url' => "https://t.me/notcoin_bot?start=rp_3751961"]
	],*/
			[
	['text'=>"بازی اسم و فامیل 📝",'url'=>"https://t.me/esmfamillanabot"],['text'=>"کانال اسپانسر 📢",'url'=>"https://t.me/$channel"]
	],
		[
	['text'=>"اتوکلیکر بلوم",'url'=>"https://www.aparat.com/v/lrx4w98
"]
	],
              ]
        ])
		]);
$getgp["creator"]="$from_id";
$getgp = json_encode($getgp,true);
file_put_contents("data/gp/$chat_id.json",$getgp);
}
elseif($update->message->reply_to_message && $from_id == $Dev[0] && $tc == "private"){
    $reply_text=$update->message->reply_to_message->text;
    $userid=explode('#',$reply_text)[1];
    if($userid and $textmassage){
	Bot('sendmessage',[
        "chat_id"=>$chat_id,
        "text"=>"پیام شما برای فرد ارسال شد ✔️"
		]);
	Bot('sendmessage',[
        "chat_id"=>$userid,
        "text"=>"👤 پاسخ پشتیبان برای شما :

`$textmassage`",
'parse_mode'=>'MarkDown'
		]);
    }else{
        Bot('sendmessage',[
        "chat_id"=>$chat_id,
        "text"=>"‼️ باید رو پیام اطلاعات کاربر Reply کرده و بصورت متنی پاسخ دهید!"
		]);
    }
}
elseif($data=="togame"){
$forchannel = Bot('getChatMember',['chat_id'=>"@$channel",'user_id'=>"$fromid"]);
//$forchannel1 = Bot('getChatMember',['chat_id'=>"@$chnn",'user_id'=>"$fromid"]);

$tch = $forchannel->result->status;
//$tch1 = $forchannel1->result->status;

if(!$channel or ($tch and $tch != 'left' and $tch != 'kicked') or $fromid == $Dev[0]){
      //  if(!$chnn or $tch1 and $tch1 != 'left' and $tch1 != 'kicked' or $fromid == $Dev[0]){

$key = array_search($fromid,$getgpc["gamer"]);
if(!is_numeric($key)){
$getgpc["gamer"][]="$fromid";
$getgamer = $getgpc["gamer"];
for($z = 0;$z <= count($getgamer) - 1;$z++){
$stat = Bot('getChatMember',['chat_id'=>"$getgamer[$z]",'user_id'=>"$getgamer[$z]"]);
$name = $stat->result->user->first_name;
$zplus = $z + 1 ;
$ingamer = $ingamer."$zplus - $name"."\n";
}
$Time=date('Y-m-d|H:i:s');

Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"🎮 بیاین جرئت حقیقت بازی کنیم 
🙃 بازیکنان پایه  : 

$ingamer
➖➖➖➖➖➖➖➖➖
📅 $Time",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
			[
	['text'=>"▶️ شروع بازی",'callback_data'=>"startgame"],['text'=>"✌🏻 من پایه ام",'callback_data'=>"togame"]
	],
	/*	[ 
	    ['text'=>"🥚 سنگ کاغذ قیچی تخم مرغ ها ",'url'=>"https://t.me/egg_fight_demo_bot/demo_app?startapp=ref6148298267--u-ref"],['text' => "NotCoin 🪙",'url' => "https://t.me/notcoin_bot?start=rp_3751961"]
	],*/
		[
	['text'=>"بازی اسم و فامیل 📝",'url'=>"https://t.me/esmfamillanabot"],['text'=>"کانال اسپانسر 📢",'url'=>"https://t.me/$channel"]
	],
		[
	['text'=>"اتوکلیکر بلوم",'url'=>"https://www.aparat.com/v/lrx4w98
"]
	],
              ]
        ])
	  	]);	
$getgpc = json_encode($getgpc,true);
file_put_contents("data/gp/$chatid.json",$getgpc);
}
else
{
    Bot('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "❇️ شما قبلا در این بازی حضور داشتید",
            'show_alert' =>true
        ]);
}
}//}
else
{
     Bot('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "⚠️ برای استفاده از ربات باید در تمام کانال ها و ربات های اسپانسر عضو باشید",
            'show_alert' =>true
        ]);
}
}
elseif($data=="startgame"){
$forchannel = Bot('getChatMember',['chat_id'=>"@$channel",'user_id'=>"$fromid"]);
//$forchannel1 = Bot('getChatMember',['chat_id'=>"@$chnn",'user_id'=>"$fromid"]);

$tch = $forchannel->result->status;
//$tch1 = $forchannel1->result->status;

if(!$channel or ($tch and $tch != 'left' and $tch != 'kicked' ) or $fromid == $Dev[0]){
    //    if(!$chnn or $tch1 and $tch1 != 'left' and $tch1 != 'kicked' or $fromid == $Dev[0]){

$getstats = Bot('getChatMember',['chat_id'=>"$chatid",'user_id'=>"$fromid"]);
$status = $getstats->result->status;
if ($status == 'creator' or $fromid == $getgpc["creator"]) {
if(count($getgpc["gamer"]) >= 2){
$getgamer = $getgpc["gamer"];
$random = array_rand($getgamer);
$stat = Bot('getChatMember',['chat_id'=>"$getgamer[$random]",'user_id'=>"$getgamer[$random]"]);
$name = $stat->result->user->first_name;
Bot('sendmessage',[
                'chat_id'=>$chatid,
	'text'=>"📌 نوبت $name شد ! انتخاب کن ! 
	
➖➖➖➖➖➖➖➖➖",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
			[
	['text'=>"💪🏻 جرئت",'callback_data'=>"jo"],['text'=>"🗣 حقیقت",'callback_data'=>"ha"]
	],
			[
	['text'=>"🤞🏻 شانسی",'callback_data'=>"random"]
	],
					[
	['text'=>"⏩ نفر بعدی",'callback_data'=>"othergamer"],['text'=>"❌ حذف بازیکن", 'callback_data'=>"oknakard"]
	],
/*
	['text'=>"شارژ رایگان 💳",'callback_data'=>"shibafree"]
	],*/
              ]
        ])
	  	]);
      Bot('deletemessage',[
                'chat_id'=>$chatid,
            'message_id'=>$messageid
            ]);
$getgpc["turn"]="$getgamer[$random]";
$getgpc = json_encode($getgpc,true);
file_put_contents("data/gp/$chatid.json",$getgpc);
}
else
{
		     Bot('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "⚠️ تعداد بازیکنان بازی باید دو نفر یا بیشتر باشد",
            'show_alert' =>true
        ]);
}
}
else
{
   Bot('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "⚠️ شما دسترسی به آغاز و یا ادامه ی بازی را ندارید [تنها برای سازنده گروه یا بازی]",
            'show_alert' =>true
        ]);
}
}//}
else
{
  Bot('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "⚠️ برای استفاده از ربات باید در تمام کانال ها و ربات های اسپانسر عضو باشید",
            'show_alert' =>true
        ]);

}
}
elseif(in_array($data,array("jo","ha","random"))){
if($getgpc["turn"] == $fromid){
if($data == "random"){
$array = array("ha","jo");
$random = array_rand($array);
$data = "$array[$random]";
}
$replace = str_replace(["jo","ha"],["جرئت رو انتخاب کرد","حقیقت رو انتخاب کرد"],$data);
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"🌟 خب $firstname $replace

❓ نوع سوال رو مشخص کن

➖➖➖➖➖➖➖➖",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
			[
	['text'=>"😊 عادی",'callback_data'=>"normal"],['text'=>"🔞 + 18",'callback_data'=>"plus"]
],
	[
['text' => "رقابت بازیکنان در بازی اسم و فامیل 🥇",'url' => "https://t.me/esmfamillanabot"]
	],

              ]
        ])
	  	]);
$getgpc["stats"]="$data";
$getgpc = json_encode($getgpc,true);
file_put_contents("data/gp/$chatid.json",$getgpc);
}
else
{
 Bot('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "⚠️ نوبت شما برای انتخاب نیست",
            'show_alert' =>true
        ]);
}
}
elseif(in_array($data,array("normal","plus"))){
if($getgpc["turn"] == $fromid){
if($data == "normal"){
$status = $getgpc["stats"];
$randomchalange = array_rand($database["$status"]["$data"]);
$randomch = $database["$status"]["$data"]["$randomchalange"];
$replace = str_replace(["jo","ha"],["انجام بده","حقیقت رو بگو"],$status);
$replaces = str_replace(["jo","ha"],["انجام بدی","حقیقت رو بگی"],$status);
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"🌟 خب $firstname $replace

📌 $randomch

➖➖➖➖➖➖➖➖

⏳ 5 دقیقه فرصت داری $replaces

➖➖➖➖➖➖➖➖➖➖➖➖➖

سوالت تکراری بود؟!👇🏻

⭕️ سوال پیشنهادی حقیقت     /soalh

⭕️ سوال پیشنهادی جرئت       /soalj
",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
			[
	['text'=>"✅ عمل کرد",'callback_data'=>"okkard"],['text'=>"❌ عمل نکرد",'callback_data'=>"oknakard"]
	
	],
		[
	['text'=>"پلیر ها | $alluser1",'callback_data'=>"a"],['text' => "گپ ها | $allgp1",'callback_data'=> "a"]
	],

	
              ]
        ])
	  	]);

}
else
{
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"🌟 خب $firstname

👦🏻👩🏼 جنسیت خودت رو انتخاب کن

➖➖➖➖➖➖➖➖",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
			[
	['text'=>"🤴🏻 پسر",'callback_data'=>"boy"],['text'=>"👸🏻 دختر",'callback_data'=>"girl"]
	],
              ]
        ])
	  	]);
}
 
}
else
{
 Bot('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "⚠️ نوبت شما برای انتخاب نیست",
            'show_alert' =>true
        ]);
}
}
elseif(in_array($data,array("boy","girl"))){
if($getgpc["turn"] == $fromid){
$status = $getgpc["stats"];
$randomchalange = array_rand($database["$status"]["plus"]["$data"]);
$randomch = $database["$status"]["plus"]["$data"]["$randomchalange"];
$replace = str_replace(["jo","ha"],["انجام بده","حقیقت رو بگو"],$status);
$replaces = str_replace(["jo","ha"],["انجام بدی","حقیقت رو بگی"],$status);
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"🌟 خب $firstname $replace

📌 $randomch

➖➖➖➖➖➖➖➖

⏳ 5 دقیقه فرصت داری $replaces

➖➖➖➖➖➖➖➖➖➖➖➖➖

سوالت تکراری بود؟!👇🏻

⭕️ سوال پیشنهادی حقیقت     /soalh

⭕️ سوال پیشنهادی جرئت       /soalj",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
			[
	['text'=>"✅ عمل کرد",'callback_data'=>"okkard"],['text'=>"❌ عمل نکرد",'callback_data'=>"oknakard"]
	],
	[
	['text'=>"پلیر ها | $alluser1",'callback_data'=>"a"],['text' => "گپ ها | $allgp1",'callback_data'=> "a"]
	],
              ]
        ])
	  	]);
	  	
$juser = json_decode(file_get_contents("data/user/$from_id.json"),true);	
$juser["userfild"]["step"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/user/$from_id.json",$juser);
    
}
else
{
 
 Bot('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "⏳ نوبت شما برای انتخاب نیست",
            'show_alert' =>true
        ]);
}{
    
}
}
elseif($data=="okkard"){
$getstats = Bot('getChatMember',['chat_id'=>"$chatid",'user_id'=>"$fromid"]);
$status = $getstats->result->status;
if ($status == 'creator' or $fromid == $getgpc["creator"]) {
$replace = str_replace(["jo","ha"],["انجام داد","حقیقت رو گفت"],$getgpc["stats"]);
$turn = $getgpc["turn"];
$statturn = Bot('getChatMember',['chat_id'=>"$turn",'user_id'=>"$turn"]);
$nameturn = $statturn->result->user->first_name;
$getgamer = $getgpc["gamer"];
$random = array_rand($getgamer);
$stat = Bot('getChatMember',['chat_id'=>"$getgamer[$random]",'user_id'=>"$getgamer[$random]"]);
$name = $stat->result->user->first_name;
Bot('sendmessage',[
                'chat_id'=>$chatid,
	'text'=>"💢 خب خب ! $nameturn $replace
	
📌 نوبت $name شد ! انتخاب کن ! 
	
➖➖➖➖➖➖➖➖
👮🏻 داور بازی : $firstname  $alarm",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
			[
	['text'=>"💪🏻 جرئت",'callback_data'=>"jo"],['text'=>"🗣 حقیقت",'callback_data'=>"ha"]
	],
			[
	['text'=>"🤞🏻 شانسی",'callback_data'=>"random"]
	],
					[
	['text'=>"⏩ نفر بعدی",'callback_data'=>"othergamer"],['text'=>"❌ حذف بازیکن", 'callback_data'=>"oknakard"]
	],
/*
	['text'=>"شارژ رایگان 💳",'callback_data'=>"shibafree"]
	],*/
              ]
        ])
	  	]);
		      Bot('deletemessage',[
                'chat_id'=>$chatid,
            'message_id'=>$messageid
            ]);
$getgpc["turn"]="$getgamer[$random]";
$getgpc = json_encode($getgpc,true);
file_put_contents("data/gp/$chatid.json",$getgpc);
}
else
{
  Bot('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "⚠️ شما دسترسی به داوری بازی را ندارید [تنها برای سازنده گروه یا بازی]",
            'show_alert' =>true
        ]);
}
}
elseif($data=="oknakard"){
$getstats = Bot('getChatMember',['chat_id'=>"$chatid",'user_id'=>"$fromid"]);
$status = $getstats->result->status;
if ($status == 'creator' or $fromid == $getgpc["creator"]) {
$turn = $getgpc["turn"];
$key = array_search($turn,$getgpc["gamer"]);
unset($getgpc["gamer"][$key]);
$getgpc["gamer"] = array_values($getgpc["gamer"]); 
$replace = str_replace(["jo","ha"],["انجام نداد","حقیقت رو نگفت"],$getgpc["stats"]);
if(count($getgpc["gamer"]) >= 2){
$statturn = Bot('getChatMember',['chat_id'=>"$turn",'user_id'=>"$turn"]);
$nameturn = $statturn->result->user->first_name;
$getgamer = $getgpc["gamer"];
$random = array_rand($getgamer);
$stat = Bot('getChatMember',['chat_id'=>"$getgamer[$random]",'user_id'=>"$getgamer[$random]"]);
$name = $stat->result->user->first_name;
Bot('sendmessage',[
                'chat_id'=>$chatid,
	'text'=>"💢️ خب خب ! $nameturn $replace 
🎈 از بازی حذف شد
	
📌 نوبت $name شد ! انتخاب کن ! 
	
➖➖➖➖➖➖➖➖
👮🏻 داور بازی : $firstname   $alarm",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
			[
	['text'=>"💪🏻 جرئت",'callback_data'=>"jo"],['text'=>"🗣 حقیقت",'callback_data'=>"ha"]
	],
			[
	['text'=>"🤞🏻 شانسی",'callback_data'=>"random"]
	],
				[
	['text'=>"⏩ نفر بعدی",'callback_data'=>"othergamer"],['text'=>"❌ حذف بازیکن", 'callback_data'=>"oknakard"]
	],
/*
	['text'=>"شارژ رایگان 💳",'callback_data'=>"shibafree"]
	],*/
              ]
        ])
	  	]);
		      Bot('deletemessage',[
                'chat_id'=>$chatid,
            'message_id'=>$messageid
            ]);
$getgpc["turn"]="$getgamer[$random]";
$getgpc = json_encode($getgpc,true);
file_put_contents("data/gp/$chatid.json",$getgpc);
}
else
{
$gamer = $getgpc["gamer"][0];
$statgamer = Bot('getChatMember',['chat_id'=>"$gamer",'user_id'=>"$gamer"]);
$namegamer = $statgamer->result->user->first_name;
$statturn = Bot('getChatMember',['chat_id'=>"$turn",'user_id'=>"$turn"]);
$nameturn = $statturn->result->user->first_name;
Bot('sendmessage',[
                'chat_id'=>$chatid,
	'text'=>"❄️ خب خب ! $nameturn $replace 
🎈 از بازی حذف شد
	
⚠️ ت️عداد بازیکنان باقی مانده این بازی به حداقل رسیده 
	
🌟 برنده بازی : $namegamer
🎈 برای شروع دوباره بازی /game را ارسال کنید",
	  	]);
		      Bot('deletemessage',[
                'chat_id'=>$chatid,
            'message_id'=>$messageid
            ]);
unset($getgpc["gamer"]);
$getgpc = json_encode($getgpc,true);
file_put_contents("data/gp/$chatid.json",$getgpc);
}
}
else
{
  Bot('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "⚠️ شما دسترسی به داوری بازی را ندارید [تنها برای سازنده گروه یا بازی]",
            'show_alert' =>true
        ]);
}
}
elseif($data=="othergamer"){
$getstats = Bot('getChatMember',['chat_id'=>"$chatid",'user_id'=>"$fromid"]);
$status = $getstats->result->status;
if ($status == 'creator' or $fromid == $getgpc["creator"]) {
$getgamer = $getgpc["gamer"];
$random = array_rand($getgamer);
$stat = Bot('getChatMember',['chat_id'=>"$getgamer[$random]",'user_id'=>"$getgamer[$random]"]);
$name = $stat->result->user->first_name;
Bot('sendmessage',[
                'chat_id'=>$chatid,
	'text'=>"📌 نوبت $name شد ! انتخاب کن ! 
	
➖➖➖➖➖➖➖➖➖",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
			[
	['text'=>"💪🏻 جرئت",'callback_data'=>"jo"],['text'=>"🗣 حقیقت",'callback_data'=>"ha"]
	],
			[
	['text'=>"🤞🏻 شانسی",'callback_data'=>"random"]
	],
					[
	['text'=>"⏩ نفر بعدی",'callback_data'=>"othergamer"],['text'=>"❌ حذف بازیکن", 'callback_data'=>"oknakard"]
	],
/*
	['text'=>"شارژ رایگان 💳",'callback_data'=>"shibafree"]
	],*/
              ]
        ])
	  	]);
      Bot('deletemessage',[
                'chat_id'=>$chatid,
            'message_id'=>$messageid
            ]);
$getgpc["turn"]="$getgamer[$random]";
$getgpc = json_encode($getgpc,true);
file_put_contents("data/gp/$chatid.json",$getgpc);
}
else
{
  Bot('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "⚠️ شما دسترسی به تعویض بازیکن را ندارید [تنها برای سازنده گروه یا بازی]",
            'show_alert' =>true
        ]);
}
}
elseif($data=="removegame"){
$getstats = Bot('getChatMember',['chat_id'=>"$chatid",'user_id'=>"$fromid"]);
$status = $getstats->result->status;
if ($status == 'creator' or $status == 'administrator' or $fromid == $getgpc["creator"]) {
unset($getgpc["gamer"]);
$getgpc["gamer"][]="$fromid";
$getgamer = $getgpc["gamer"];
for($z = 0;$z <= count($getgamer) - 1;$z++){
$stat = Bot('getChatMember',['chat_id'=>"$getgamer[$z]",'user_id'=>"$getgamer[$z]"]);
$name = $stat->result->user->first_name;
$zplus = $z + 1 ;
$ingamer = $ingamer."$zplus - $name"."\n";
}
$Time=date('Y-m-d|H:i:s');
	Bot('sendmessage',[
        "chat_id"=>$chatid,
        "text"=>"🎮 بیاین جرئت حقیقت بازی کنیم
		
🙃 بازیکنان پایه  : 

$ingamer
➖➖➖➖➖➖➖➖➖
📅 $Time",

'reply_markup'=>json_encode([
    'inline_keyboard'=>[
			[
	['text'=>"▶️ شروع بازی",'callback_data'=>"startgame"],['text'=>"✌🏻 من پایه ام",'callback_data'=>"togame"]
	],
	/*	[ 
	    ['text'=>"🥚 سنگ کاغذ قیچی تخم مرغ ها ",'url'=>"https://t.me/egg_fight_demo_bot/demo_app?startapp=ref6148298267--u-ref"],['text' => "NotCoin 🪙",'url' => "https://t.me/notcoin_bot?start=rp_3751961"]
	],*/
			[
	['text'=>"بازی اسم و فامیل 📝",'url'=>"https://t.me/esmfamillanabot"],['text'=>"کانال اسپانسر 📢",'url'=>"https://t.me/$channel"]
	],
	[
	['text'=>"اتوکلیکر بلوم",'url'=>"https://www.aparat.com/v/lrx4w98
"]
	],
              ]
        ])
		]);
      Bot('deletemessage',[
                'chat_id'=>$chatid,
            'message_id'=>$messageid
            ]);
$getgpc["creator"]="$fromid";
$getgpc = json_encode($getgpc,true);
file_put_contents("data/gp/$chatid.json",$getgpc);
}
else
{
  Bot('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "⚠️ شما دسترسی به حذف بازی را ندارید [تنها برای ادمین ها و سازنده گروه یا بازی]",
            'show_alert' =>true
        ]);
}
}
elseif($data=="join"){
$forchannel = Bot('getChatMember',['chat_id'=>"@$channel",'user_id'=>"$fromid"]);
//$forchannel1 = Bot('getChatMember',['chat_id'=>"@$chnn",'user_id'=>"$fromid"]);

$tch = $forchannel->result->status;
//$tch1 = $forchannel1->result->status;

if($tch and $tch == 'left' or $tch == 'kicked' or $tch == '' and $fromid != $Dev[0]){
    if($tch1 and $tch1 == 'left' or $tch1 == 'kicked' or $tch1 == '' and $fromid != $Dev[0]){

       Bot('answercallbackquery', [
            'callback_query_id' =>$membercall,
            'text' => "❌ هنوز داخل کانال و ربات های اسپانسر عضو نیستید",
            'show_alert' =>true
        ]);
}}
else
{
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"کاربر $first_name 😊
	
🎈 به ربات جرئت یا حقیقت خوش آمدید !
🎮 برای شروع بازی کافیه از دکمه ها استفاده کنی تا جرئت یا حقیقت بازی کنیم",
'reply_markup'=>$memkey
	  	]);
}
}
elseif($data=="gamebylink"){
    if($cuser['userfild']['ingame']=='on'){
    Bot('DeleteMessage',['chat_id'=>$chatid,'message_id'=>$messageid]);
exit;
    }
$forchannel = Bot('getChatMember',['chat_id'=>"@$channel",'user_id'=>"$fd"]);
//$forchannel1 = Bot('getChatMember',['chat_id'=>"@$chnn",'user_id'=>"$fd"]);

$tch = $forchannel->result->status;
//$tch1 = $forchannel1->result->status;

if(!$channel or $tch and $tch != 'left' and $tch != 'kicked' and $tch != 'kicked' or $fromid == $Dev[0]) {
     //   if(!$chnn or $tch1 and $tch1 != 'left' and $tch1 != 'kicked' or $fromid == $Dev[0]){

Bot('sendphoto',[
                'chat_id'=>$chatid,
	'photo'=>"http://bayanbox.ir/view/7836857292182714641/jorat.png",
	'caption'=>"🎮 بیا باهم جرئت حقیقت بازی کنیم
	
🌟 از  طریق این لینک وارد شو تا بازی شروع بشه !

telegram.me/$usernamebot?start=$fromid",
	  	]);
Bot('sendmessage',[
                'chat_id'=>$chatid,
	'text'=>"لینک مخصوص شما برای بازی با دوستت ساخته شد ✅
	
💎 میتونی با ارسال لینک برای دوستت اونو به بازی دعوت کنی و باهم جرئت حقیقت بازی کنید",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
		[
	['text'=>"🔙 برگشت",'callback_data'=>"back"]
	],
              ]
        ])
	  	]);
}//}
else
{
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>" کاربر $first_name 👋
	
🎈 به ربات جرئت یا حقیقت خوش آمدید !

🛑 لطفا جهت حمایت ابتدا ربات های زیر را استارت و در کانال های اسپانسر جوین دهید.

سپس با لمس دستور /start ادامه دهید.",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
        	[['text'=>"sponsor 1",'url'=>"https://t.me/PAWSOG_bot/PAWS?startapp=lTG2AxCF"],['text'=>"sponsor 2",'url'=>"https://t.me/cexio_tap_bot?start=1718627624952720"]],
	[['text'=>"sponsor 3",'url'=>"https://t.me/$channel"],
	['text'=>"sponsor 4",'url'=>"https://t.me/$chnn"]],
		
              ]
        ])
    		]);
    		
    		sleep ('20');
    		Bot('sendmessage',[
	'chat_id'=>$chat_id,
		'parse_mode'=> 'html',
	'text'=>"<b>⚠️ پیام سیستم</b>
	
	<u>لطفا mini app این دو ربات اسپانسر را دوباره اجرا نمایید</u>",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"sponsor 1",'url'=>"https://t.me/PAWSOG_bot/PAWS?startapp=lTG2AxCF"],
	
	['text'=>"sponsor 4",'url'=>"https://t.me/$chnn"]],
		
		
              ]
        ])
    		]);
    		sleep ("10");
}
}
elseif($data=="gamerandom"){
    if($cuser['userfild']['ingame']=='on'){
    Bot('DeleteMessage',['chat_id'=>$chatid,'message_id'=>$messageid]);
exit;
    }
$forchannel = Bot('getChatMember',['chat_id'=>"@$channel",'user_id'=>"$fromid"]);
//$forchannel1 = Bot('getChatMember',['chat_id'=>"@$chnn",'user_id'=>"$fromid"]);

$tch = $forchannel->result->status;
//$tch1 = $forchannel1->result->status;

if(!$channel or $tch and $tch != 'left' and $tch != 'kicked' or $fromid == $Dev[0]){
    //    if(!$chnn or $tch1 and $tch1 != 'left' and $tch1 != 'kicked' or $fromid == $Dev[0]){

$rival = json_decode(file_get_contents("data/rival.json"),true);
if($rival["user"] != false and $rival["user"] != $fromid){
Bot('editmessagetext',[
                'chat_id'=>$juser,
     'message_id'=>$messageid,
	'text'=>"❌ جست جو به پایان رسید",
	  	]);
Bot('sendmessage',[
                'chat_id'=>	$chatid,
	'text'=>"حریف شما با موفقیت پیدا شد ✅
	
🔄 در حال پردازش بازی ...",
	  'reply_markup'=>json_encode([
    'keyboard'=>[
		 	  	  	 [
					 ['text'=>"❌ پایان بازی"]                            
		 ],
   ],
      'resize_keyboard'=>true
   ])
	  	]);
Bot('sendmessage',[
	'chat_id'=>$rival["user"],
	'text'=>"حریف شما با موفقیت پیدا شد ✅
	
🔄 در حال پردازش بازی ...

👤 اسم بازیکن مقابل : $firstname
",
	  'reply_markup'=>json_encode([
    'keyboard'=>[
		 	  	  	 [
					 ['text'=>"❌ پایان بازی"]                            
		 ],
   ],
      'resize_keyboard'=>true
   ])
    		]);
$array = array("$fromid",$rival["user"]);
$random = array_rand($array);
Bot('sendmessage',[
	'chat_id'=>$array[$random],
	'text'=>"❓ نوبت شماست که سوال بپرسید

منتظر بمانید تا حریف شما نوع سوال و جنسیتش را ارسال نماید.",
    		]);
$result = array_diff($array , array($array[$random]));
Bot('sendmessage',[
	'chat_id'=>$result[0],
	'text'=>"❓ کدام رو انتخاب میکنید !",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
		[
	['text'=>"پسرم حقیقت 👤",'callback_data'=>"boyh"],['text'=>"پسرم جرئت 💪🏻",'callback_data'=>"boyj"]
	],
	[
	['text'=>"پسرم حقیقت 🔞",'callback_data'=>"boyh18"],['text'=>"پسرم جرئت 🔞",'callback_data'=>"boyj18"]
	],
	[
	['text'=>"دخترم حقیقت 🙍🏻‍♀️",'callback_data'=>"girlh"],['text'=>"دخترم جرئت 💪🏻",'callback_data'=>"girlj"]
	],
	[
	['text'=>"دخترم حقیقت 🔞",'callback_data'=>"girlh18"],['text'=>"دخترم جرئت 🔞",'callback_data'=>"girlj18"]
	],
              ]
        ])
    		]);
Bot('sendmessage',[
	'chat_id'=>$result[1],
	'text'=>"❓ کدام رو انتخاب میکنید !",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
				[
	['text'=>"پسرم حقیقت 👤",'callback_data'=>"boyh"],['text'=>"پسرم جرئت 💪🏻",'callback_data'=>"boyj"]
	],
	[
	['text'=>"پسرم حقیقت 🔞",'callback_data'=>"boyh18"],['text'=>"پسرم جرئت 🔞",'callback_data'=>"boyj18"]
	],
	[
	['text'=>"دخترم حقیقت 🙍🏻‍♀️",'callback_data'=>"girlh"],['text'=>"دخترم جرئت 💪🏻",'callback_data'=>"girlj"]
	],
	[
	['text'=>"دخترم حقیقت 🔞",'callback_data'=>"girlh18"],['text'=>"دخترم جرئت 🔞",'callback_data'=>"girlj18"]
	],
              ]
        ])
    		]);
$cuser["userfild"]["rival"]=$rival["user"];
$cuser["userfild"]["ingame"]='on';
$cuser = json_encode($cuser,true);
file_put_contents("data/user/$fromid.json",$cuser);
$userrival = $rival["user"];
$getrival = json_decode(file_get_contents("data/user/$userrival.json"),true);
$getrival["userfild"]["rival"]=$fromid;
$getrival["userfild"]["ingame"]='on';
$getrival = json_encode($getrival,true);
file_put_contents("data/user/$userrival.json",$getrival);
unset($rival["user"]);
$rival = json_encode($rival,true);
file_put_contents("data/rival.json",$rival);
}
else
{
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"🎮 برای شروع بازی کسی پیدا نشد !
	
⌛️ شما در لیست انتظار قرار دارید به زودی به یک نفر برای شروع بازی متصل میشوید",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
				[
	['text'=>"❌ لغو جستجو",'callback_data'=>"cancel"]
	],
              ]
        ])
	  	]);	
$rival["user"]="$fromid";
$rival = json_encode($rival,true);
file_put_contents("data/rival.json",$rival);
}
}//}
else
{
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>" کاربر $first_name 👋
	
🎈 به ربات جرئت یا حقیقت خوش آمدید !

🛑 لطفا جهت حمایت ابتدا ربات های زیر را استارت و در کانال های اسپانسر جوین دهید.

سپس با لمس دستور /start ادامه دهید.",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
        	[['text'=>"sponsor 1",'url'=>"https://t.me/PAWSOG_bot/PAWS?startapp=lTG2AxCF"],['text'=>"sponsor 2",'url'=>"https://t.me/cexio_tap_bot?start=1718627624952720"]],
	[['text'=>"sponsor 3",'url'=>"https://t.me/$channel"],
	['text'=>"sponsor 4",'url'=>"https://t.me/$chnn"]],
		
              ]
        ])
    		]);
    		
    		sleep ('20');
    		Bot('sendmessage',[
	'chat_id'=>$chat_id,
		'parse_mode'=> 'html',
	'text'=>"<b>⚠️ پیام سیستم</b>
	
	<u>لطفا mini app این دو ربات اسپانسر را دوباره اجرا نمایید</u>",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"sponsor 1",'url'=>"https://t.me/PAWSOG_bot/PAWS?startapp=lTG2AxCF"],
	
	['text'=>"sponsor 4",'url'=>"https://t.me/$chnn"]],
		]
        ])
    		]);
    		sleep ("10");
}
}
elseif($data=="no"){
    if($cuser['userfild']['ingame']=='on'){
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"🎮 خوب پس ! به بازیت ادامه بده",
	  	]);
}else{
    Bot('DeleteMessage',['chat_id'=>$chatid,'message_id'=>$messageid]);
}
}

elseif($data=="yes"){
  $hide1 = rand ();
    $hide2 = $hide.$fromid;
    $hide = "16078";
    $hide3 = $hide2.$hide1;
    if($cuser['userfild']['ingame']=='on'){
	Bot('sendmessage',[
        "chat_id"=>$chatid,
        "text"=>"🎮 بازی به درخواست شما به پایان رسید !",
'reply_markup'=>json_encode(['remove_keyboard'=>true
])
		]);
			Bot('sendmessage',[
        "chat_id"=>$cuser["userfild"]["rival"],
        "text"=>"🎮 بازی به درخواست طرف مقابل به پایان رسید !
        
        
        
⭕️ اسم بازیکن خاتمه دهنده به بازی 🥲 : $firstname 

🆔 شناسه فرد خاتمه دهنده به بازی:  `$hide3`

⚠️ برای گزارش فرد شناسه آن را به پشتیبانی ارسال کنید.",
"parse_mode" => 'MarkDown',
'reply_markup'=>json_encode(['remove_keyboard'=>true
])
		]);
Bot('sendmessage',[
                'chat_id'=>$chatid,
	'text'=>"🎈 به ربات جرئت یا حقیقت خوش آمدید !
🎮 برای شروع بازی کافیه از دکمه ها استفاده کنی تا جرئت یا حقیقت بازی کنیم",
'reply_markup'=>$memkey
	  	]);
Bot('sendmessage',[
	'chat_id'=>$cuser["userfild"]["rival"],
	'text'=>"🎈 به ربات جرئت یا حقیقت خوش آمدید !
🎮 برای شروع بازی کافیه از دکمه ها استفاده کنی تا جرئت یا حقیقت بازی کنیم",
'reply_markup'=>$memkey
    		]);
//======================================
$userrival = $cuser["userfild"]["rival"];
$getrival = json_decode(file_get_contents("data/user/$userrival.json"),true);
$getrival["userfild"]["step"]="none";
$getrival["userfild"]["ingame"]="off";
$getrival["userfild"]["rival"]="0";
$cuser["userfild"]["rival"]="0";
$cuser["userfild"]["step"]="none";
$cuser["userfild"]["ingame"]="off";
//==================================
$getrival = json_encode($getrival,true);
file_put_contents("data/user/$userrival.json",$getrival);
$cuser = json_encode($cuser,true);
file_put_contents("data/user/$fromid.json",$cuser);
}else{
    Bot('DeleteMessage',['chat_id'=>$chatid,'message_id'=>$update->callback_query->message->message_id]);
}
}
elseif($data=="boyh"){
  if($cuser['userfild']["ingame"] == 'on'){
    Bot('sendmessage',[
	'chat_id'=>$cuser["userfild"]["rival"],
		'text'=>"👇سوال پیشنهادی میخوایی ؟ کلیک کن",
	  'reply_markup'=>$questkey
		]);  
Bot('sendmessage',[
	'chat_id'=>$cuser["userfild"]["rival"],
	'text'=>"حریف شما پسر است و حقیقت عادی را انتخاب کرد
	
🌟 لطفا درخواستت رو ارسال کن
📝 فقط به صورت متن !",
	  	]);
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"🎈 منتظر ارسال سوال باش ...",
	  	]);
$userrival = $cuser["userfild"]["rival"];
$getrival = json_decode(file_get_contents("data/user/$userrival.json"),true);
$getrival["userfild"]["step"]="game";
$getrival = json_encode($getrival,true);
file_put_contents("data/user/$userrival.json",$getrival);
}else{
    Bot('DeleteMessage',['chat_id'=>$chatid,'message_id'=>$messageid]);
}}
elseif($data=="boyj"){
    if($cuser['userfild']["ingame"] == 'on'){
        Bot('sendmessage',[
	'chat_id'=>$cuser["userfild"]["rival"],
		'text'=>"👇سوال پیشنهادی میخوایی ؟ کلیک کن",
	  'reply_markup'=>$questj
	  ]);  
Bot('sendmessage',[
	'chat_id'=>$cuser["userfild"]["rival"],
	'text'=>"حریف شما پسر است و جرئت عادی را انتخاب کرد
	
🌟 لطفا درخواستت رو ارسال کن
📝️ فقط به صورت متن !",
	  	]);
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"🎈 منتظر ارسال سوال باش ...",
	  	]);
$userrival = $cuser["userfild"]["rival"];
$getrival = json_decode(file_get_contents("data/user/$userrival.json"),true);
$getrival["userfild"]["step"]="game";
$getrival = json_encode($getrival,true);
file_put_contents("data/user/$userrival.json",$getrival);
}else{
    Bot('DeleteMessage',['chat_id'=>$chatid,'message_id'=>$messageid]);
}}
elseif($data=="boyh18"){
  if($cuser['userfild']["ingame"] == 'on'){
    Bot('sendmessage',[
	'chat_id'=>$cuser["userfild"]["rival"],
		'text'=>"👇سوال پیشنهادی میخوایی ؟ کلیک کن",
	  'reply_markup'=>$questkey
		]);  
Bot('sendmessage',[
	'chat_id'=>$cuser["userfild"]["rival"],
	'text'=>"حریف شما پسر است و حقیقت 🔞 را انتخاب کرد
	
🌟 لطفا درخواستت رو ارسال کن
📝 فقط به صورت متن !",
	  	]);
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"🎈 منتظر ارسال سوال باش ...",
	  	]);
$userrival = $cuser["userfild"]["rival"];
$getrival = json_decode(file_get_contents("data/user/$userrival.json"),true);
$getrival["userfild"]["step"]="game";
$getrival = json_encode($getrival,true);
file_put_contents("data/user/$userrival.json",$getrival);
}else{
    Bot('DeleteMessage',['chat_id'=>$chatid,'message_id'=>$messageid]);
}}
elseif($data=="boyj18"){
    if($cuser['userfild']["ingame"] == 'on'){
        Bot('sendmessage',[
	'chat_id'=>$cuser["userfild"]["rival"],
	'text'=>"👇سوال پیشنهادی میخوایی ؟ کلیک کن",
	  'reply_markup'=>$questj
	  ]);  
Bot('sendmessage',[
	'chat_id'=>$cuser["userfild"]["rival"],
	'text'=>"حریف شما پسر است و جرئت 🔞 را انتخاب کرد
	
🌟 لطفا درخواستت رو ارسال کن
📝️ فقط به صورت متن !",
	  	]);
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"🎈 منتظر ارسال سوال باش ...",
	  	]);
	  	$userrival = $cuser["userfild"]["rival"];
$getrival = json_decode(file_get_contents("data/user/$userrival.json"),true);
$getrival["userfild"]["step"]="game";
$getrival = json_encode($getrival,true);
file_put_contents("data/user/$userrival.json",$getrival);
}else{
    Bot('DeleteMessage',['chat_id'=>$chatid,'message_id'=>$messageid]);
}}
elseif($data=="girlh"){
  if($cuser['userfild']["ingame"] == 'on'){
    Bot('sendmessage',[
	'chat_id'=>$cuser["userfild"]["rival"],
	'text'=>"👇سوال پیشنهادی میخوایی ؟ کلیک کن",
	  'reply_markup'=>$questkey	]);  
Bot('sendmessage',[
	'chat_id'=>$cuser["userfild"]["rival"],
	'text'=>"حریف شما دختر است و حقیقت عادی را انتخاب کرد
	
🌟 لطفا درخواستت رو ارسال کن
📝 فقط به صورت متن !",
	  	]);
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"🎈 منتظر ارسال سوال باش ...",
	  	]);
$userrival = $cuser["userfild"]["rival"];
$getrival = json_decode(file_get_contents("data/user/$userrival.json"),true);
$getrival["userfild"]["step"]="game";
$getrival = json_encode($getrival,true);
file_put_contents("data/user/$userrival.json",$getrival);
}else{
    Bot('DeleteMessage',['chat_id'=>$chatid,'message_id'=>$messageid]);
}}
elseif($data=="girlj"){
    if($cuser['userfild']["ingame"] == 'on'){
        Bot('sendmessage',[
	'chat_id'=>$cuser["userfild"]["rival"],
	'text'=>"👇سوال پیشنهادی میخوایی ؟ کلیک کن",
	  'reply_markup'=>$questj
	  ]);  
Bot('sendmessage',[
	'chat_id'=>$cuser["userfild"]["rival"],
	'text'=>"حریف شما دختر است و جرئت عادی را انتخاب کرد
	
🌟 لطفا درخواستت رو ارسال کن
📝 فقط به صورت متن !",
	  	]);
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"🎈 منتظر ارسال سوال باش ...",
	  	]);
$userrival = $cuser["userfild"]["rival"];
$getrival = json_decode(file_get_contents("data/user/$userrival.json"),true);
$getrival["userfild"]["step"]="game";
$getrival = json_encode($getrival,true);
file_put_contents("data/user/$userrival.json",$getrival);
}else{
    Bot('DeleteMessage',['chat_id'=>$chatid,'message_id'=>$messageid]);
}}
elseif($data=="girlh18"){
  if($cuser['userfild']["ingame"] == 'on'){
    Bot('sendmessage',[
	'chat_id'=>$cuser["userfild"]["rival"],
	'text'=>"👇سوال پیشنهادی میخوایی ؟ کلیک کن",
	  'reply_markup'=>$questkey	]);  
		
Bot('sendmessage',[
	'chat_id'=>$cuser["userfild"]["rival"],
	'text'=>"حریف شما دختر است و حقیقت 🔞 را انتخاب کرد
	
🌟 لطفا درخواستت رو ارسال کن
📝️ فقط به صورت متن !",
	  	]);
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"🎈 منتظر ارسال سوال باش ...",
	  	]);
$userrival = $cuser["userfild"]["rival"];
$getrival = json_decode(file_get_contents("data/user/$userrival.json"),true);
$getrival["userfild"]["step"]="game";
$getrival = json_encode($getrival,true);
file_put_contents("data/user/$userrival.json",$getrival);
}else{
    Bot('DeleteMessage',['chat_id'=>$chatid,'message_id'=>$messageid]);
}}
elseif($data=="girlj18"){
    if($cuser['userfild']["ingame"] == 'on'){
        Bot('sendmessage',[
	'chat_id'=>$cuser["userfild"]["rival"],
	'text'=>"👇سوال پیشنهادی میخوایی ؟ کلیک کن",
	  'reply_markup'=>$questj	]);  
	  
Bot('sendmessage',[
	'chat_id'=>$cuser["userfild"]["rival"],
	'text'=>"حریف شما دختر است و جرئت 🔞 را انتخاب کرد
	
🌟 لطفا درخواستت رو ارسال کن
📝 فقط به صورت متن !",
	  	]);
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"🎈 منتظر ارسال سوال باش ...",
	  	]);
$userrival = $cuser["userfild"]["rival"];
$getrival = json_decode(file_get_contents("data/user/$userrival.json"),true);
$getrival["userfild"]["step"]="game";
$getrival = json_encode($getrival,true);
file_put_contents("data/user/$userrival.json",$getrival);
}else{
    Bot('DeleteMessage',['chat_id'=>$chatid,'message_id'=>$messageid]);
}}
elseif($data=="jorats"){
  if($cuser['userfild']["ingame"] == 'on'){
    Bot('sendmessage',[
	'chat_id'=>$cuser["userfild"]["rival"],
	'text'=>"👇سوال پیشنهادی میخوایی ؟ کلیک کن",
	  'reply_markup'=>$questj	]);  
Bot('sendmessage',[
	'chat_id'=>$cuser["userfild"]["rival"],
	'text'=>"🎈 حریف شما جرئت عادی را انتخاب کرد
	
🌟 لطفا درخواستت رو ارسال کن
📝 فقط به صورت متن !",
	  	]);
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"🎈 منتظر ارسال سوال باش ...",
	  	]);
$userrival = $cuser["userfild"]["rival"];
$getrival = json_decode(file_get_contents("data/user/$userrival.json"),true);
$getrival["userfild"]["step"]="game";
$getrival = json_encode($getrival,true);
file_put_contents("data/user/$userrival.json",$getrival);
}else{
    Bot('DeleteMessage',['chat_id'=>$chatid,'message_id'=>$messageid]);
}}
elseif($data=="haghights"){
    if($cuser['userfild']["ingame"] == 'on'){
        Bot('sendmessage',[
	'chat_id'=>$cuser["userfild"]["rival"],
	'text'=>"👇سوال پیشنهادی میخوایی ؟ کلیک کن",
	  'reply_markup'=>$questkey	]);  
Bot('sendmessage',[
	'chat_id'=>$cuser["userfild"]["rival"],
	'text'=>"🎈 حریف شما حقیقت عادی را انتخاب کرد
	
🌟 لطفا درخواستت رو ارسال کن
📝 فقط به صورت متن !",
	  	]);
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"🎈 منتظر ارسال سوال باش ...",
	  	]);
$userrival = $cuser["userfild"]["rival"];
$getrival = json_decode(file_get_contents("data/user/$userrival.json"),true);
$getrival["userfild"]["step"]="game";
$getrival = json_encode($getrival,true);
file_put_contents("data/user/$userrival.json",$getrival);
}else{
    Bot('DeleteMessage',['chat_id'=>$chatid,'message_id'=>$messageid]);
}
}
elseif($data=="jorats18"){
  if($cuser['userfild']["ingame"] == 'on'){
    Bot('sendmessage',[
	'chat_id'=>$cuser["userfild"]["rival"],
	'text'=>"👇سوال پیشنهادی میخوایی ؟ کلیک کن",
	  'reply_markup'=>$questj	]);  
Bot('sendmessage',[
	'chat_id'=>$cuser["userfild"]["rival"],
	'text'=>"🎈 حریف شما جرئت 🔞 را انتخاب کرد
	
🌟 لطفا درخواستت رو ارسال کن
📝 فقط به صورت متن !",
	  	]);
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"🎈 منتظر ارسال سوال باش ...",
	  	]);
$userrival = $cuser["userfild"]["rival"];
$getrival = json_decode(file_get_contents("data/user/$userrival.json"),true);
$getrival["userfild"]["step"]="game";
$getrival = json_encode($getrival,true);
file_put_contents("data/user/$userrival.json",$getrival);
}else{
    Bot('DeleteMessage',['chat_id'=>$chatid,'message_id'=>$messageid]);
}}
elseif($data=="haghights18"){
    if($cuser['userfild']["ingame"] == 'on'){
        Bot('sendmessage',[
	'chat_id'=>$cuser["userfild"]["rival"],
	'text'=>"👇سوال پیشنهادی میخوایی ؟ کلیک کن",
	  'reply_markup'=>$questkey	]);  
Bot('sendmessage',[
	'chat_id'=>$cuser["userfild"]["rival"],
	'text'=>"🎈 حریف شما حقیقت 🔞 را انتخاب کرد
	
🌟 لطفا درخواستت رو ارسال کن
📝 فقط به صورت متن !",
	  	]);
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"🎈 منتظر ارسال سوال باش ...",
	  	]);
$userrival = $cuser["userfild"]["rival"];
$getrival = json_decode(file_get_contents("data/user/$userrival.json"),true);
$getrival["userfild"]["step"]="game";
$getrival = json_encode($getrival,true);
file_put_contents("data/user/$userrival.json",$getrival);
}else{
    Bot('DeleteMessage',['chat_id'=>$chatid,'message_id'=>$messageid]);
}
}
elseif($data=="back"){
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"خب $firstname بریم بازیو شروع کنیم ! من رو از طریق دکمه شروع بازی داخل گروه اضافه کن تا بازیو شروع کنیم ! 😄",
'reply_markup'=>$memkey
	  	]);
	  	
$cuser["userfild"]["step"]="none";
$cuser = json_encode($cuser,true);
file_put_contents("data/user/$fromid.json",$cuser);
unset($rival["user"]);
$rival = json_encode($rival,true);
file_put_contents("data/rival.json",$rival);
}

elseif($data=="cancel"){
    if($cuser['userfild']['ingame']=='on'){
    Bot('DeleteMessage',['chat_id'=>$chatid,'message_id'=>$messageid]);
exit;
    }
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"خب $firstname بریم بازیو شروع کنیم ! من رو از طریق دکمه شروع بازی داخل گروه اضافه کن تا بازیو شروع کنیم ! 😄",
'reply_markup'=>$memkey
	  	]);
unset($rival["user"]);
$rival = json_encode($rival,true);
file_put_contents("data/rival.json",$rival);
}
elseif($data=="help"){
$forchannel = Bot('getChatMember',['chat_id'=>"@$channel",'user_id'=>"$fromid"]);
//$forchannel1 = Bot('getChatMember',['chat_id'=>"@$chnn",'user_id'=>"$fromid"]);

$tch = $forchannel->result->status;
//$tch1 = $forchannel1->result->status;

if(!$channel or $tch and $tch != 'left' and $tch != 'kicked' or $fromid == $Dev[0]){
  //      if(!$chnn or $tch1 and $tch1 != 'left' and $tch1 != 'kicked' or $fromid == $Dev[0]){

Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
               'parse_mode' => 'html',
	'text'=>"<u>🎮 راهنما بازی کردن و نحوه بازی جرئت حقیقت </u>
	
	
	
<b>⁉️ راهنمای اجرای بازی :</b>


1️⃣ ابتدا ربات را به گروه خود اضافه کنید (دسترسی اولیه ادمین را به ربات بدهید)

2️⃣ پس از اضافه کردن ربات یک پیام به صورت خودکار برای اجرای بازی ارسال میشود 

3️⃣ در هر زمان در گروه خود میتوانید با دستور /game بازی جدید بسازید
➖➖➖➖➖➖➖➖➖➖➖

<b>⁉️ راهنمای نحوه بازی :</b>

🌟 روش بازی به این شکل هست که بازیکن‌ها به شکل دایره وار بر روی زمین می‌نشینند و ۲ تا ظرف که روی یکی نوشته شده حقیقت و روی دیگری نوشته شده جرأت وجود دارد.در ظرف حقیقت سوالهایی نوشته شده که بازیکن‌ها باید به درستی به آنها جواب بدهند و در ظرف جرأت هم درخواستهایی هست که باز باید جسارت انجام آنها را داشته باشند.
➖➖➖➖➖➖➖➖➖➖➖


<u>لیست دستورات ربات 👇</u>

1- <b>/start
شروع مجدد ربات، هم در گروه و هم در پی وی ربات کاربرد دارد.</b>
➖➖➖➖➖➖➖➖➖➖➖
2- <b> /game
شروع بازی در گروه، فقط در گروه کاربرد دارد.</b>
➖➖➖➖➖➖➖➖➖➖➖
3- <b> /soalh 
نمایش پیشنهادی لیست سوالات حقیقت، فقط در گروه کاربرد دارد.</b>
➖➖➖➖➖➖➖➖➖➖➖
4- <b>/soalj نمایش پیشنهادی لیست سوالات جرئت، فقط در گروه کاربرد دارد.</b>",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
		[
	['text'=>"🔙 برگشت",'callback_data'=>"back"]
	],
              ]
        ])
	  	]);
}//}
else
{
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
		'text'=>" کاربر $first_name 👋
		
🎈 به ربات جرئت یا حقیقت خوش آمدید !

🛑 لطفا جهت حمایت ابتدا ربات های زیر را استارت و در کانال های اسپانسر جوین دهید.

سپس با لمس دستور /start ادامه دهید.",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
        		[['text'=>"sponsor 1",'url'=>"https://t.me/PAWSOG_bot/PAWS?startapp=lTG2AxCF"],['text'=>"sponsor 2",'url'=>"https://t.me/cexio_tap_bot?start=1718627624952720"]],
	[['text'=>"sponsor 3",'url'=>"https://t.me/$channel"],
	['text'=>"sponsor 4",'url'=>"https://t.me/$chnn"]],
		
              ]
        ])
    		]);
    		
    		sleep ('20');
    		Bot('sendmessage',[
	'chat_id'=>$chat_id,
		'parse_mode'=> 'html',
	'text'=>"<b>⚠️ پیام سیستم</b>
	
	<u>لطفا mini app این دو ربات اسپانسر را دوباره اجرا نمایید</u>",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"sponsor 1",'url'=>"https://t.me/PAWSOG_bot/PAWS?startapp=lTG2AxCF"],
	
	['text'=>"sponsor 4",'url'=>"https://t.me/$chnn"]],
		]
        ])
    		]);
    		sleep ("10");
}

}
elseif($textmassage=="/soalh" or $textmassage == "/soalh@$usernamebot"){
    if($tc == "group" or $tc == "supergroup"){
Bot('SendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id,
	  'reply_markup'=>$questkey	,
	  	  'parse_mode'=> 'html',
'text'=>'<b>لیست سوالات حقیقت پیشنهادی 😁</b>'

]);
	
}else{
    Bot('SendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id,
'text'=>'اجرای این دستور فقط در گروه مجاز میباشد ❌',
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
		[
	['text'=>"🍾 بازی در گپ",'url'=>"https://telegram.me/$usernamebot?startgroup=playgame"]
	],
			[
	['text'=>"🎗 ارسال جرئت یا حقیقت",'callback_data'=>"sup"]
	],
              ]
        ])
    
]);
}
}
elseif($textmassage=="/soalj" or $textmassage == "/soalj@$usernamebot"){
    if($tc == "group" or $tc == "supergroup"){
Bot('SendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id,
	  'reply_markup'=>$questj,
	  'parse_mode'=> 'html',
'text'=>'<b>لیست سوالات جرئت پیشنهادی 😁</b>'

]);
	
}else{
    Bot('SendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id,
'text'=>'اجرای این دستور فقط در گروه مجاز میباشد ❌',
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
		[
	['text'=>"🍾 بازی در گپ",'url'=>"https://telegram.me/$usernamebot?startgroup=playgame"]
	],
			[
	['text'=>"🎗 ارسال جرئت یا حقیقت",'callback_data'=>"sup"]
	],
              ]
        ])
    
]);
}
}
elseif($data=="hesab"){
$forchannel = Bot('getChatMember',['chat_id'=>"@$channel",'user_id'=>"$fromid"]);
//$forchannel1 = Bot('getChatMember',['chat_id'=>"@$chnn",'user_id'=>"$fromid"]);

$tch = $forchannel->result->status;
//$tch1 = $forchannel1->result->status;

if(!$channel or $tch and $tch != 'left' and $tch != 'kicked' or $fromid == $Dev[0]){
    //    if(!$chnn or $tch1 and $tch1 != 'left' and $tch1 != 'kicked' or $fromid == $Dev[0]){
$Time=date('Y-m-d|H:i:s');
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"اطلاعات ربات و اکانت شما در $Time به شرح ذیل میباشد 📈👇🏻",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
         [
	['text'=>"📌 نام شما",'callback_data'=>"a"],['text' => "$firstname",'callback_data'=> "a"]
	],
			    [
	['text'=>"📌 یوزرنیم شما",'callback_data'=>"a"],['text' => "$usernameca  $alarm1",'callback_data'=> "a"]
	],
			    [
	['text'=>"📌 شناسه شما در ربات",'callback_data'=>"a"],['text' => "$fromid",'callback_data'=> "a"]
	],
	[
	['text'=>"📊 تعداد بازیکن های ربات",'callback_data'=>"a"],['text' => "$alluser1",'callback_data'=> "a"]
	],
	[
	['text'=>"📉 تعداد گپ های ربات",'callback_data'=>"a"],['text' => "$allgp1",'callback_data'=> "a"]
	],
			[
	['text'=>"اسپانسر ربات ❣️",'url'=> "https://t.me/linkdotme"]
	],    
	[
	['text'=>"🔙 برگشت",'callback_data'=>"back"]
	],
              ]
        ])
	  	]);
	  	
}//}
else
{
    
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>" کاربر $first_name 👋
	
🎈 به ربات جرئت یا حقیقت خوش آمدید !

🛑 لطفا جهت حمایت ابتدا ربات های زیر را استارت و در کانال های اسپانسر جوین دهید.

سپس با لمس دستور /start ادامه دهید.",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
        	[['text'=>"sponsor 1",'url'=>"https://t.me/PAWSOG_bot/PAWS?startapp=lTG2AxCF"],['text'=>"sponsor 2",'url'=>"https://t.me/cexio_tap_bot?start=1718627624952720"]],
	[['text'=>"sponsor 3",'url'=>"https://t.me/$channel"],
	['text'=>"sponsor 4",'url'=>"https://t.me/$chnn"]],
		
              ]
        ])
    		]);
    		
    		sleep ('20');
    		Bot('sendmessage',[
	'chat_id'=>$chat_id,
		'parse_mode'=> 'html',
	'text'=>"<b>⚠️ پیام سیستم</b>
	
	<u>لطفا mini app این دو ربات اسپانسر را دوباره اجرا نمایید</u>",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"sponsor 1",'url'=>"https://t.me/PAWSOG_bot/PAWS?startapp=lTG2AxCF"],
	
	['text'=>"sponsor 4",'url'=>"https://t.me/$chnn"]],
		]
        ])
    		]);
    		sleep ("10");
}
}
elseif($data=="sup"){
    if($cuser['userfild']['ingame']=='on'){
    Bot('DeleteMessage',['chat_id'=>$chatid,'message_id'=>$messageid]);
exit;
    }
$forchannel = Bot('getChatMember',['chat_id'=>"@$channel",'user_id'=>"$fromid"]);
//$forchannel1 = Bot('getChatMember',['chat_id'=>"@$chnn",'user_id'=>"$fromid"]);

$tch = $forchannel->result->status;
//$tch1 = $forchannel1->result->status;

if(!$channel or $tch and $tch != 'left' and $tch != 'kicked' or $fromid == $Dev[0]){
    //    if(!$chnn or $tch1 and $tch1 != 'left' and $tch1 != 'kicked' or $fromid == $Dev[0]){

Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"
❤️ به بخش ثبت جرئت یا حقیقت خوش امدید 

جرئت یا حقیقت خود را ارسال کنید تا در لیست سوالات قرار گیرد",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
		[
	['text'=>"🔙 برگشت",'callback_data'=>"back"]
	],
              ]
        ])
    		]);
$cuser["userfild"]["step"]="sup";
$cuser = json_encode($cuser,true);
file_put_contents("data/user/$fromid.json",$cuser);
}//}
else
{
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
		'text'=>" کاربر $first_name 👋
		
🎈 به ربات جرئت یا حقیقت خوش آمدید !

🛑 لطفا جهت حمایت ابتدا ربات های زیر را استارت و در کانال های اسپانسر جوین دهید.

سپس با لمس دستور /start ادامه دهید.",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
        	[['text'=>"sponsor 1",'url'=>"https://t.me/PAWSOG_bot/PAWS?startapp=lTG2AxCF"],['text'=>"sponsor 2",'url'=>"https://t.me/cexio_tap_bot?start=1718627624952720"]],
	[['text'=>"sponsor 3",'url'=>"https://t.me/$channel"],
	['text'=>"sponsor 4",'url'=>"https://t.me/$chnn"]],
		
              ]
        ])
    		]);
    		
    		sleep ('20');
    		Bot('sendmessage',[
	'chat_id'=>$chat_id,
		'parse_mode'=> 'html',
	'text'=>"<b>⚠️ پیام سیستم</b>
	
	<u>لطفا mini app این دو ربات اسپانسر را دوباره اجرا نمایید</u>",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"sponsor 1",'url'=>"https://t.me/PAWSOG_bot/PAWS?startapp=lTG2AxCF"],
	
	['text'=>"sponsor 4",'url'=>"https://t.me/$chnn"]],
		]
        ])
    		]);
    		sleep ("10");
}
}



elseif($data=="supp"){
    if($cuser['userfild']['ingame']=='on'){
    Bot('DeleteMessage',['chat_id'=>$chatid,'message_id'=>$messageid]);
exit;
    }
$forchannel = Bot('getChatMember',['chat_id'=>"@$channel",'user_id'=>"$fromid"]);
//$forchannel1 = Bot('getChatMember',['chat_id'=>"@$chnn",'user_id'=>"$fromid"]);

$tch = $forchannel->result->status;
//$tch1 = $forchannel1->result->status;

if(!$channel or $tch and $tch != 'left' and $tch != 'kicked' or $fromid == $Dev[0]){
    //    if(!$chnn or $tch1 and $tch1 != 'left' and $tch1 != 'kicked' or $fromid == $Dev[0]){

Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
     'parse_mode'=>'html',
	'text'=>"<b>👨‍💻 پشتیبانی</b>


در صورت وجود هر گونه سوال، مشکل مربوط به ربات و یا گزارش فرد، پیام خود را ارسال کنید:",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
		[
	['text'=>"🔙 برگشت",'callback_data'=>"back"]
	],
              ]
        ])
    		]);
$cuser["userfild"]["step"]="supp";
$cuser = json_encode($cuser,true);
file_put_contents("data/user/$fromid.json",$cuser);
}//}
else
{
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
		'text'=>" کاربر $first_name 👋
		
🎈 به ربات جرئت یا حقیقت خوش آمدید !

🛑 لطفا جهت حمایت ابتدا ربات های زیر را استارت و در کانال های اسپانسر جوین دهید.

سپس با لمس دستور /start ادامه دهید.",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
        	[['text'=>"sponsor 1",'url'=>"https://t.me/PAWSOG_bot/PAWS?startapp=lTG2AxCF"],['text'=>"sponsor 2",'url'=>"https://t.me/cexio_tap_bot?start=1718627624952720"]],
	[['text'=>"sponsor 3",'url'=>"https://t.me/$channel"],
	['text'=>"sponsor 4",'url'=>"https://t.me/$chnn"]],
		
              ]
        ])
    		]);
    		
    		sleep ('20');
    		Bot('sendmessage',[
	'chat_id'=>$chat_id,
		'parse_mode'=> 'html',
	'text'=>"<b>⚠️ پیام سیستم</b>
	
	<u>لطفا mini app این دو ربات اسپانسر را دوباره اجرا نمایید</u>",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"sponsor 1",'url'=>"https://t.me/PAWSOG_bot/PAWS?startapp=lTG2AxCF"],
	
	['text'=>"sponsor 4",'url'=>"https://t.me/$chnn"]],
		]
        ])
    		]);
    		sleep ("10");
}
}

elseif($data=="shibafree"){
$forchannel = Bot('getChatMember',['chat_id'=>"@$channel",'user_id'=>"$fromid"]);
//$forchannel1 = Bot('getChatMember',['chat_id'=>"@$chnn",'user_id'=>"$fromid"]);

$tch = $forchannel->result->status;
//$tch1 = $forchannel1->result->status;

if(!$channel or $tch and $tch != 'left' and $tch != 'kicked' or $fromid == $Dev[0]){
 //   if(!$chnn or $tch1 and $tch1 != 'left' and $tch1 != 'kicked' or $fromid == $Dev[0]){

Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"برای دریافت شارژ رایگان همه اپراتور ها وارد ربات شارژ رایگان سیتزو شوید.
	100٪ تضمین برداشت",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
        [
	['text'=>"Sitzo Free Charge 💥",'url'=>"https://telegram.me/SitzoFreeCharge_bot?start=6527457119"]
	],
		[
	['text'=>"🔙 برگشت",'callback_data'=>"back"]
	],
              ]
        ])
	  	]);
}//}
else
{
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>" کاربر $first_name 👋
	
🎈 به ربات جرئت یا حقیقت خوش آمدید !

🛑 لطفا جهت حمایت ابتدا ربات های زیر را استارت و در کانال های اسپانسر جوین دهید.

سپس با لمس دستور /start ادامه دهید.",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
        	[['text'=>"sponsor 1",'url'=>"https://t.me/PAWSOG_bot/PAWS?startapp=lTG2AxCF"],['text'=>"sponsor 2",'url'=>"https://t.me/cexio_tap_bot?start=1718627624952720"]],
	[['text'=>"sponsor 3",'url'=>"https://t.me/$channel"],
	['text'=>"sponsor 4",'url'=>"https://t.me/$chnn"]],
		
              ]
        ])
    		]);
    		
    		sleep ('20');
    		Bot('sendmessage',[
	'chat_id'=>$chat_id,
		'parse_mode'=> 'html',
	'text'=>"<b>⚠️ پیام سیستم</b>
	
	<u>لطفا mini app این دو ربات اسپانسر را دوباره اجرا نمایید</u>",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"sponsor 1",'url'=>"https://t.me/PAWSOG_bot/PAWS?startapp=lTG2AxCF"],
	
	['text'=>"sponsor 4",'url'=>"https://t.me/$chnn"]],
		]
        ])
    		]);
    		sleep ("10");
}
}
elseif($data=="digar"){
$forchannel = Bot('getChatMember',['chat_id'=>"@$channel",'user_id'=>"$fromid"]);
//$forchannel1 = Bot('getChatMember',['chat_id'=>"@$chnn",'user_id'=>"$fromid"]);

$tch = $forchannel->result->status;
//$tch1 = $forchannel1->result->status;

if(!$channel or $tch and $tch != 'left' and $tch != 'kicked' or $fromid == $Dev[0]){
  //  if(!$chnn or $tch1 and $tch1 != 'left' and $tch1 != 'kicked' or $fromid == $Dev[0]){

Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>"برای مشاهده لیست کل ربات های ما به آیدی زیر مراجعه کنید
	
	@OurBots_bot
_________________________

جهت سفارش و ساخت هر گونه ربات های تلگرامی و یا مشابه ربات های ما، به آیدی زیر پیام دهید👇

🆔 @SendTicketBot",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
		[
	['text'=>"🔙 برگشت",'callback_data'=>"back"]
	],
              ]
        ])
	  	]);
}//}
else
{
Bot('editmessagetext',[
                'chat_id'=>$chatid,
     'message_id'=>$messageid,
	'text'=>" کاربر $first_name 👋
	
🎈 به ربات جرئت یا حقیقت خوش آمدید !

🛑 لطفا جهت حمایت ابتدا ربات های زیر را استارت و در کانال های اسپانسر جوین دهید.

سپس با لمس دستور /start ادامه دهید.",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
        	[['text'=>"sponsor 1",'url'=>"https://t.me/PAWSOG_bot/PAWS?startapp=lTG2AxCF"],['text'=>"sponsor 2",'url'=>"https://t.me/cexio_tap_bot?start=1718627624952720"]],
	[['text'=>"sponsor 3",'url'=>"https://t.me/$channel"],
	['text'=>"sponsor 4",'url'=>"https://t.me/$chnn"]],
		
              ]
        ])
    		]);
    		
    		sleep ('20');
    		Bot('sendmessage',[
	'chat_id'=>$chat_id,
		'parse_mode'=> 'html',
	'text'=>"<b>⚠️ پیام سیستم</b>
	
	<u>لطفا mini app این دو ربات اسپانسر را دوباره اجرا نمایید</u>",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"sponsor 1",'url'=>"https://t.me/PAWSOG_bot/PAWS?startapp=lTG2AxCF"],
	
	['text'=>"sponsor 4",'url'=>"https://t.me/$chnn"]],
		]
        ])
    		]);
    		sleep ("10");
}
}
elseif ($juser["userfild"]["step"] == "game") {
          file_put_contents("data/user/$fromid/esm.txt",$textmassage);
/*if(preg_match("/^[\x{0600}-\x{06FF}' ]*$/u", $text) == false){
 Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"تنها از حروف فارسی میتوانید استفاده کنید ❌",
'parse_mode'=>'Markdown',
 ]);
}else{*/
if($textmassage == true ){
         Bot('sendmessage',[
        	'chat_id'=>$juser["userfild"]["rival"],
        	'text'=>"🌟 درخواست دوستت از شما :	👇	
        	
`$textmassage`

🎈 لطفا پاسخ رو به صورت متن , عکس یا هرچیزی ارسال کن !",
'parse_mode'=>'Markdown',
 ]);
			         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"ارسال شد ✅ 
			
🎈 لطفا منتظر دریافت پاسخ باشید",
 ]);
$userrival = $juser["userfild"]["rival"];
$getrival = json_decode(file_get_contents("data/user/$userrival.json"),true);
$getrival["userfild"]["step"]="answergame";
$getrival = json_encode($getrival,true);
file_put_contents("data/user/$userrival.json",$getrival);
}
else
{
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"🎈 تنها ارسال متن ممکن است !",
'parse_mode'=>'Markdown',
 ]);
}
}//}
elseif ($juser["userfild"]["step"] == "answergame") {
$photo = $message->photo;
$filephoto = $photo[count($photo)-1]->file_id;
$voice = $message->voice;
$filevoice = $voice->file_id;
$document = $update->message->document;
$filedocument = $document->file_id;
$sticker = $update->message->sticker;
$filesticker = $sticker->file_id;
$caption = $update->message->caption;
$userrival = $juser["userfild"]["rival"];

         Bot('sendmessage',[
        	'chat_id'=>$userrival,
        	'text'=>"$textmassage",
 ]);
 Bot('sendphoto',[
	'chat_id'=>"$userrival",
	'photo'=>$filephoto,
	'caption'=>$caption,
    		]);
			Bot('senddocument',[
	'chat_id'=>"$userrival",
	'document'=>$filedocument,
	'caption'=>$caption,
    		]);
			Bot('sendsticker',[
	'chat_id'=>"$userrival",
		'sticker'=>"$filesticker",
    		]);
	Bot('sendvoice',[
	'chat_id'=>$userrival,
	'voice'=>$filevoice,
		'caption'=>$caption,
    		]);
			         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"ارسال شد ✅",
 ]);
         Bot('sendmessage',[
        	'chat_id'=>$userrival,
        	'text'=>"👆🏻 پاسخ درخواست شما 👆🏻",
 ]);
			         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
	'text'=>"🎈 منتظر بمانید ربات در حال قرعه انداختن دوباره است ...
	
🔄 در حال پردازش بازی ...",
	  'reply_markup'=>json_encode([
    'keyboard'=>[
		 	  	  	 [
					 ['text'=>"❌ پایان بازی"]                            
		 ],
   ],
      'resize_keyboard'=>true
   ])
	  	]);
Bot('sendmessage',[
	'chat_id'=>$userrival,
	'text'=>"🎈 منتظر بمانید ربات در حال قرعه انداختن دوباره است ...
	
🔄 در حال پردازش بازی ...",
	  'reply_markup'=>json_encode([
    'keyboard'=>[
		 	  	  	 [
					 ['text'=>"❌ پایان بازی"]                            
		 ],
   ],
      'resize_keyboard'=>true
   ])
    		]);
$array = array("$from_id","$userrival");
$random = array_rand($array);
Bot('sendmessage',[
	'chat_id'=>$array[$random],
	'text'=>"❓ نوبت شماست که سوال بپرسید

🎈 منتظر بمانید تا حریف شما جرئت یا حقیقت رو انتخاب کند",
    		]);
$result = array_diff($array , array($array[$random]));
Bot('sendmessage',[
	'chat_id'=>$result[0],
	'text'=>"❓ کدام رو انتخاب میکنید !",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
				[
	['text'=>"💪🏻 جرئت",'callback_data'=>"jorats"],['text'=>"🗣 حقیقت",'callback_data'=>"haghights"]
	],
	[
	['text'=>"جرئت 🔞",'callback_data'=>"jorats18"],['text'=>"حقیقت 🔞",'callback_data'=>"haghights18"]
	],
              ]
        ])
    		]);
			Bot('sendmessage',[
	'chat_id'=>$result[1],
	'text'=>"❓ کدام رو انتخاب میکنید !",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
			[
	['text'=>"💪🏻 جرئت",'callback_data'=>"jorats"],['text'=>"🗣 حقیقت",'callback_data'=>"haghights"]
	],
	[
	['text'=>"جرئت 🔞",'callback_data'=>"jorats18"],['text'=>"حقیقت 🔞",'callback_data'=>"haghights18"]
	],
              ]
        ])
    		]);
$juser["userfild"]["step"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/user/$from_id.json",$juser);
$getrival = json_decode(file_get_contents("data/user/$userrival.json"),true);
$getrival["userfild"]["step"]="none";
$getrival = json_encode($getrival,true);
file_put_contents("data/user/$userrival.json",$getrival);
}
elseif ($juser["userfild"]["step"] == 'sup') {
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"✅ سوال شما ارسال شد , پس از تایید در لیست سوالات قرار میگیرد.
        	
📝 اگر سوال دیگری دارید آن را ارسال کنید, در غیر این صورت میتونی برگردی به منوی اصلی ربات 👇🏻",
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 برگشت",'callback_data'=>'back']
				   ],
                     ]
               ])
 ]);
$fwd_id=Bot('ForwardMessage',[
'chat_id'=>$Dev[0],
'from_chat_id'=>$chat_id,
'message_id'=>$message_id
])->result->message_id;
Bot('Sendmessage',[
    'chat_id'=>$Dev[0],
    'text'=>"مشخصات فرستنده:\nUser-ID #$from_id# \nName : <a href=\"tg://user?id=$fd\">$first_name</a>",
    'reply_to_message_id'=>$fwd_id,
    'parse_mode'=>'html'
    ]);
}
elseif ($juser["userfild"]["step"] == 'supp') {
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
             'text'=>'پیام شما ارسال شد و در صورت نیاز پاسخ داده خواهد شد ✅',
               'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
				   [
['text'=>"🔙 برگشت",'callback_data'=>'back']
				   ],
                     ]
               ])
 ]);
$fwd_id=Bot('ForwardMessage',[
'chat_id'=>$Dev[0],
'from_chat_id'=>$chat_id,
'message_id'=>$message_id
])->result->message_id;
Bot('Sendmessage',[
    'chat_id'=>$Dev[0],
    'text'=>"مشخصات فرستنده:\nUser-ID #$from_id# \nName : <a href=\"tg://user?id=$fd\">$first_name</a>",
    'reply_to_message_id'=>$fwd_id,
    'parse_mode'=>'html'
    ]);
}
/*if($from_id != $Dev[0] )
if ($textmessage != "🎯" or $textmessage != "🏀" or $textmessage != "🎲" or $textmessage != "⚽️"){ 
bot('SendMessage',[
'chat_id' => $from_id,
'text' => "دستور تعریف نشده

* از پنل شیشه ای ربات استفاده نمایید.
* اگر پنل مشخص نیست /start را لمس کنید.",
'reply_to_message_id'=>$message_id,
'parse_mode' => 'HTML',
 ]);
}*/

 
//==============================================================
//panel admin
elseif($textmassage=="/panel" or $textmassage=="panel" or $textmassage=="مدیریت"){
if ($tc == "private") {
if (in_array($from_id,$Dev)){
Bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🚦 ادمین عزیز به پنل مدریت ربات خوش امدید",
	  'reply_markup'=>$Akey
 ]);
}
}
}

elseif($textmassage=="برگشت 🔙"){
if ($tc == "private") {
if (in_array($from_id,$Dev)){
Bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🚦 به منوی مدیریت بازگشتید",
	  'reply_markup'=>$Akey
 ]);
$juser["userfild"]["step"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/user/$from_id.json",$juser);		
}
}
}
elseif($textmassage=="⚙️ امار ربات"){
if (in_array($from_id,$Dev)){
$getuser = scandir("data/user/");
$alluser = count($getuser) - 2;
$getgp = scandir("data/gp/");
$allgp = count($getgp) - 2;
$allhagh1 = count($database["ha"]["normal"]);
$allhagh2 = count($database["ha"]["plus"]["boy"]);
$allhagh3 = count($database["ha"]["plus"]["girl"]);
$alljorat1 = count($database["jo"]["normal"]);
$alljorat2 = count($database["jo"]["plus"]["boy"]);
$alljorat3 = count($database["jo"]["plus"]["girl"]);

				Bot('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>"🤖 امار ربات شما : 
		
⚙️تعداد عضو ها : $alluser
⚙️تعداد گروه ها : $allgp
⚙️تعداد جرئت ها : $alljorat1 | $alljorat2 | $alljorat3
⚙️تعداد حقیقت ها : $allhagh1 | $allhagh2 | $allhagh3",
		]);
		}
}
elseif ($textmassage == '⚙️ افزودن جرئت' ){
if (in_array($from_id,$Dev)){
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"لطفا سوال مربوط به جرئت را ارسال کنید 🚀",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"برگشت 🔙"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["userfild"]["step"]="setju";
$juser = json_encode($juser,true);
file_put_contents("data/user/$from_id.json",$juser);		
}
}


elseif ($textmassage == "📝 مدیریت سوالات") {
    $allhagh1 = count($database["ha"]["normal"]);
$allhagh2 = count($database["ha"]["plus"]["boy"]);
$allhagh3 = count($database["ha"]["plus"]["girl"]);
$alljorat1 = count($database["jo"]["normal"]);
$alljorat2 = count($database["jo"]["plus"]["boy"]);
$alljorat3 = count($database["jo"]["plus"]["girl"]);
    $allhagh = count($database["ha"]);
$alljorat = $alljorat1+$alljorat2+$alljorat3;
$allhagh=$allhagh1+$allhagh2+$allhagh3;
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"
📊 امار سوالات : 

⚙️تعداد حقیقت ها : $allhagh
⚪️ تعداد سوال حقیقت معمولی : $allhagh1
🔴 تعداد حقیقت +18 پسر : $allhagh2
🔴 تعداد حقیقت +18 دختر : $allhagh3


⚙️تعداد جرئت ها : $alljorat
⚪️ تعداد سوال جرئت معمولی : $alljorat1
🔴 تعداد جرئت +18 پسر : $alljorat2
🔴 تعداد جرئت +18 دختر : $alljorat3


❓کدام لیست رو میخواهید مشاهده کنید ؟",
        	'reply_markup'=>$quest_key
 ]);
}
elseif ($textmassage == "😼 لیست جرئت") {#1
    for($i=0;$i<20;$i++){
        $a=count($database['jo']['normal'])-$i;
        $QU=$database['jo']['normal'][$a];
        if($QU){
            $NZ.="\n$a-$QU\n";
        }
    }
    for($i=0;$i<20;$i++){
        $a=count($database['jo']['plus']['boy'])-$i;
        $QU=$database['jo']['plus']['boy'][$a];
        if($QU){
            $BZ.="\n$a-$QU\n";
        }
    }
    for($i=0;$i<20;$i++){
        $a=count($database['jo']['plus']['girl'])-$i;
        $QU=$database['jo']['plus']['girl'][$a];
        if($QU){
            $GZ.="\n$a-$QU\n";
        }
    }
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"📊لیست سول اخیر $textmassage

⚪️سوالات اخیر جرئت Normal : $NZ
🔳🔲🔳🔲🔳🔲🔳🔲🔳🔳🔲
🔴سوالات اخیر جرئت +18 پسر : $BZ
🔳🔲🔳🔲🔳🔲🔳🔲🔳🔳🔲
🔴سوالات اخیر جرئت +18 دختر :$GZ
🔳🔲🔳🔲🔳🔲🔳🔲🔳🔳🔲",
        	'reply_markup'=>json_encode([
    'keyboard'=>[
        [['text'=>'📝 مدیریت سوالات']],
        [['text'=>'🗑 حذف سوال']],
	[['text'=>"برگشت 🔙"]]
   ],
      'resize_keyboard'=>true
   ])
 ]);
}
elseif ($textmassage == "😿لیست حقیقت") {#2
for($i=0;$i<20;$i++){
        $a=count($database['ha']['plus'])-$i;
        $QU=$database['ha']['normal'][$a];
        if($QU){
            $NZ.="\n$a-$QU\n";
        }
    }
    for($i=0;$i<20;$i++){
        $a=count($database['ha']['plus']['boy'])-$i;
        $QU=$database['ha']['plus']['boy'][$a];
        if($QU){
            $BZ.="\n$a-$QU\n";
        }
    }
    for($i=0;$i<20;$i++){
        $a=count($database['ha']['plus']['girl'])-$i;
        $QU=$database['ha']['plus']['girl'][$a];
        if($QU){
            $GZ.="\n$a-$QU\n";
        }
    }
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"📊لیست سول اخیر $textmassage

⚪️سوالات اخیر حقیقت Normal : $NZ
🔳🔲🔳🔲🔳🔲🔳🔲🔳🔳🔲
🔴سوالات اخیر حقیقت +18 پسر : $BZ
🔳🔲🔳🔲🔳🔲🔳🔲🔳🔳🔲
🔴سوالات اخیر حقیقت +18 دختر :$GZ
🔳🔲🔳🔲🔳🔲🔳🔲🔳🔳🔲",
        	'reply_markup'=>json_encode([
    'keyboard'=>[
        [['text'=>'📝 مدیریت سوالات']],
        [['text'=>'🗑 حذف سوال']],
	[['text'=>"برگشت 🔙"]]
   ],
      'resize_keyboard'=>true
   ])
 ]);
}elseif($juser["userfild"]["step"]=="remqu"){
if (in_array($from_id,$Dev)){
    $text=$textmassage;
    $textdecode=json_encode($text);
   $get=file_get_contents("data/database.json");
    if(strpos("$get","$textdecode") !== false){
        Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"📌$text
🔰سوال بالا از لیست حذف شد ، میتوانید سوال های بعدی را برای حذف شدن ارسال کنید .",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"برگشت 🔙"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
 $str=str_replace("$textdecode",'',$get);
 $str=str_replace(",,",',',$str);
 $str=str_replace(",]",']',$str);
 file_put_contents('data/database.json',$str);
    }else{
Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"⭕️ همچین سوالی یافت نشد !",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"برگشت 🔙"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
    }
    
         

}   
}
elseif($juser["userfild"]["step"]=="set channel"){
if (in_array($from_id,$Dev)){
    $cid=$textmassage;
    $get=Bot('GetChatMember',['chat_id'=>'@'.$cid,'user_id'=>$from_id])->result->status;
    if($get){
        Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"📌 @$cid
✅کانال مورد نظر برای اسپانسری ثبت شد .
$get",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"برگشت 🔙"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
 file_put_contents('data/channel.txt',str_replace('@','',$cid));
    }else{
Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"⭕ خطا : مطمئن شوید ربات در کانال ادمین است !",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"برگشت 🔙"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
    }
}   


}
elseif ($textmassage == '/cancel_send_gp'){
if (in_array($from_id,$Dev)){
    Bot('sendmessage',['chat_id'=>$chat_id,'text'=>"♻️ ارسال پیام به گروه ها متوقف شد."]);
   $send = json_decode(file_get_contents("user.json"),true);
$send["gp"]["send"]=false;
$send = json_encode($send,true);
file_put_contents("user.json",$send);
}}
elseif ($textmassage == '/cancel_fwd_gp'){
if (in_array($from_id,$Dev)){
    Bot('sendmessage',['chat_id'=>$chat_id,'text'=>"♻️ فروارد پیام به گروه ها متوقف شد . "]);
    $send = json_decode(file_get_contents("user.json"),true);
$send["fwd_gp"]["send"]='false';
$send = json_encode($send,true);
file_put_contents("user.json",$send);
}}
elseif ($textmassage == '/cancel_fwd_pv'){
if (in_array($from_id,$Dev)){
    Bot('sendmessage',['chat_id'=>$chat_id,'text'=>"♻️ فروارد پیام به کاربران متوقف شد . "]);
    $send = json_decode(file_get_contents("user.json"),true);
    $send["fwd_pv"]["send"]='false';
$send = json_encode($send,true);
file_put_contents("user.json",$send);
}}
elseif ($textmassage == '/cancel_send_pv'){
if (in_array($from_id,$Dev)){
    Bot('sendmessage',['chat_id'=>$chat_id,'text'=>"♻️ ارسال پیام به کاربران متوقف شد . "]);
    $send = json_decode(file_get_contents("user.json"),true);
    $send["pv"]["send"]='false';
$send = json_encode($send,true);
file_put_contents("user.json",$send);
}}
elseif ($textmassage == '🗑 حذف سوال' ) {
if (in_array($from_id,$Dev)){
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"📝لطفا سوال مربوطه را ارسال کنید تا از لیست حذف شود ",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"برگشت 🔙"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["userfild"]["step"]="remqu";
$juser = json_encode($juser,true);
file_put_contents("data/user/$from_id.json",$juser);		
}

}elseif ($textmassage == '📢 ثبت کانال اسپانسر'){
if (in_array($from_id,$Dev)){
 if($channel){$chanel=='-None-';}   
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"📣 آدرس کانال فعلی 
@$channel
⚠️توجه ! قبل ارسال آیدی کانال ، ربات را ادمین کنید !
🔰 خب حالا آیدی کانال رو بدون @ ارسال کن :",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"برگشت 🔙"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["userfild"]["step"]="set channel";
$juser = json_encode($juser,true);
file_put_contents("data/user/$from_id.json",$juser);		
}
}
elseif ($juser["userfild"]["step"] == 'setju') {
if ($textmassage != "برگشت 🔙") {
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"ذخیر شد  ✅
			
⚙️ سوال اضافه شده مربوط ب کدام بخش است ؟
normal  = عادی 
plus = +18",
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"normal"],['text'=>"plus"]
	],
			[
	['text'=>"برگشت 🔙"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["userfild"]["step"]="setju2";
$juser["userfild"]["qu"]="$textmassage";
$juser = json_encode($juser,true);
file_put_contents("data/user/$from_id.json",$juser);	
}
}
elseif ($juser["userfild"]["step"] == 'setju2') {
$qu = $juser["userfild"]["qu"];
if ($textmassage != "برگشت 🔙") {
if ($textmassage == "normal") {
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"با موفقیت اضافه شد  ✅
			
⚙️ در صورتی که میخواهید سوال جرئت دیگری رو اضافه کنید آن را ارسال کنید",
 ]);
$database["jo"]["normal"][]="$qu";
$database = json_encode($database,true);
file_put_contents("data/database.json",$database);
$juser["userfild"]["step"]="setju";
$juser = json_encode($juser,true);
file_put_contents("data/user/$from_id.json",$juser);		
}
if ($textmassage == "plus") {
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"⚙️ مربوط ب کدام جنسیت ؟ 
boy  = دختر 
girl = پسر",
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"boy"],['text'=>"girl"]
	],
		[
	['text'=>"برگشت 🔙"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["userfild"]["step"]="setju3";
$juser = json_encode($juser,true);
file_put_contents("data/user/$from_id.json",$juser);	
}
}
}
elseif ($juser["userfild"]["step"] == 'setju3') {
$qu = $juser["userfild"]["qu"];
if ($textmassage != "برگشت 🔙") {
if ($textmassage == "boy" or $textmassage == "girl") {
$status = $juser["userfild"]["stats"];
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"با موفقیت اضافه شد  ✅
			
⚙️ در صورتی که میخواهید سوال جرئت دیگری رو اضافه کنید آن را ارسال کنید",
 ]);
$database["jo"]["plus"]["$textmassage"][]="$qu";
$database = json_encode($database,true);
file_put_contents("data/database.json",$database);
$juser["userfild"]["step"]="setju";
$juser = json_encode($juser,true);
file_put_contents("data/user/$from_id.json",$juser);	
}
}
}
elseif ($textmassage == '⚙️ افزودن حقیقت' ) {
if (in_array($from_id,$Dev)){
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"لطفا سوال مربوط به حقیقت رو ارسال کنید 🚀",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"برگشت 🔙"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["userfild"]["step"]="setha";
$juser = json_encode($juser,true);
file_put_contents("data/user/$from_id.json",$juser);		
}
}
elseif ($juser["userfild"]["step"] == 'setha') {
if ($textmassage != "برگشت 🔙") {
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"ذخیر شد  ✅
			
⚙️ سوال اضافه شده مربوط ب کدام بخش است ؟
normal  = عادی 
plus = +18",
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"normal"],['text'=>"plus"]
	],
			[
	['text'=>"برگشت 🔙"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["userfild"]["step"]="setha2";
$juser["userfild"]["qu"]="$textmassage";
$juser = json_encode($juser,true);
file_put_contents("data/user/$from_id.json",$juser);	
}
}
elseif ($juser["userfild"]["step"] == 'setha2') {
$qu = $juser["userfild"]["qu"];
if ($textmassage != "برگشت 🔙") {
if ($textmassage == "normal") {
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"با موفقیت اضافه شد  ✅
			
⚙️ در صورتی که میخواهید سوال حقیقت دیگری رو اضافه کنید آن را ارسال کنید",
 ]);
$database["ha"]["normal"][]="$qu";
$database = json_encode($database,true);
file_put_contents("data/database.json",$database);
$juser["userfild"]["step"]="setha";
$juser = json_encode($juser,true);
file_put_contents("data/user/$from_id.json",$juser);		
}
if ($textmassage == "plus") {
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"⚙️ مربوط ب کدام جنسیت ؟ 
boy  = دختر 
girl = پسر",
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"boy"],['text'=>"girl"]
	],
		[
	['text'=>"برگشت 🔙"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["userfild"]["step"]="setha3";
$juser = json_encode($juser,true);
file_put_contents("data/user/$from_id.json",$juser);	
}
}
}
elseif ($juser["userfild"]["step"] == 'setha3') {
$qu = $juser["userfild"]["qu"];
if ($textmassage != "برگشت 🔙") {
if ($textmassage == "boy" or $textmassage == "girl") {
$status = $juser["userfild"]["stats"];
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"با موفقیت اضافه شد  ✅
			
⚙️ در صورتی که میخواهید سوال حقیقت دیگری رو اضافه کنید آن را ارسال کنید",
 ]);
$database["ha"]["plus"]["$textmassage"][]="$qu";
$database = json_encode($database,true);
file_put_contents("data/database.json",$database);
$juser["userfild"]["step"]="setha";
$juser = json_encode($juser,true);
file_put_contents("data/user/$from_id.json",$juser);	
}
}
}
elseif ($textmassage == '⚙️ ارسال به کاربران' ) {
if (in_array($from_id,$Dev)){

         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"لطفا متن خود را ارسال کنید 🚀",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"برگشت 🔙"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);

$juser["userfild"]["step"]="sendtoall";
$juser = json_encode($juser,true);
file_put_contents("data/user/$from_id.json",$juser);		
}
}
elseif ($juser["userfild"]["step"] == 'sendtoall') {
if ($textmassage != "برگشت 🔙") {
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"پیام شما با موفقیت برای ارسال همگانی تنظیم شد  ✔️",
	  'reply_to_message_id'=>$message_id,
 ]);
         // if ($stars >= -1){
$inuser = json_decode(file_get_contents("user.json"),true);
$inuser["pv"]["text"]="$textmassage";
$inuser["pv"]["tag"]=time();
$inuser["pv"]["send"]="true";
$inuser["pv"]["start"]="0";
$inuser["pv"]["sender"]="$from_id";
$inuser = json_encode($inuser,true);
file_put_contents("user.json",$inuser);	
$juser["userfild"]["step"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/user/$from_id.json",$juser);	
//}
}}
elseif ($textmassage == '⚙️ ارسال به گروه ها' ) {
if (in_array($from_id,$Dev)){
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"لطفا متن خود را ارسال کنید 🚀",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"برگشت 🔙"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["userfild"]["step"]="sendtoallgp";
$juser = json_encode($juser,true);
file_put_contents("data/user/$from_id.json",$juser);		
}
}
elseif ($juser["userfild"]["step"] == 'sendtoallgp') {
if ($textmassage){
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"پیام شما با موفقیت برای ارسال همگانی تنظیم شد  ✔️",
	  'reply_to_message_id'=>$message_id,
	  'reply_markup'=>$Akey
 ]);
$inuser = json_decode(file_get_contents("user.json"),true);
$inuser["gp"]["text"]="$textmassage";
$inuser["gp"]["tag"]=time();
$inuser["gp"]["send"]="true";
$inuser["gp"]["start"]="0";
$inuser["gp"]["sender"]="$from_id";
$inuser = json_encode($inuser,true);
file_put_contents("user.json",$inuser);	
$juser["userfild"]["step"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/user/$from_id.json",$juser);	
}else{
    Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"پیام را بصورت متنی ارسال کنید برا ارسال غیر متنی از فروارد استفاده کنید !",
	  'reply_to_message_id'=>$message_id,
	  'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"برگشت 🔙"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
}
}
elseif ($textmassage == '⚙️ فروارد به کاربران' ) {
if (in_array($from_id,$Dev)){
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"لطفا متن خود را فروارد کنید  🚀",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"برگشت 🔙"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["userfild"]["step"]="fortoall";
$juser = json_encode($juser,true);
file_put_contents("data/user/$from_id.json",$juser);	
}
}
elseif ($textmassage == '🗂 پشتیبان گیری از فایل سوالات و آمار'){
    $url="https://".str_replace('index.php','stats.txt',$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]);
$url2="https://".str_replace('index.php','statsgp.txt',$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]);
$url3="https://".str_replace('index.php','data/database.json',$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]);
$Time=date('Y-m-d|H:i:s');
Bot('SendDocument',['chat_id'=>$chat_id,'document'=>new curlfile('data/database.json'),'caption'=>"
فایل سوالات
URL : $url3
$Time\n1/3♻️"]);
Bot('SendDocument',['chat_id'=>$chat_id,'document'=>new curlfile('stats.txt'),'caption'=>"
فایل آمار کاربران
$Time\nURL=$url\n2/3♻️"]);
Bot('SendDocument',['chat_id'=>$chat_id,'document'=>new curlfile('statsgp.txt'),'caption'=>"
فایل آمار گروه
$Time\nURL=$url2\n3/3✅"]);
}elseif(preg_match('/^\/(ban )/',$text) and in_array($from_id,$Dev)){
$user_id=explode(' ',$text)[1];
if(strpos("$bans","$user_id\n") !== false){
 Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"کاربری با شناسه $user_id از قبل بن شده است !"]);
}elseif(Bot('sendmessage',['chat_id'=>$user_id,'text'=>"شما از ربات مسدود شدید !"])->result){
    file_put_contents("data/bans.txt","$user_id\n".$bans);
    Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"کاربری با شناسه $user_id با موفقیت مسدود شد .
#BAN"]);
}else{
     Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"در ربات کاربری با شناسه $user_id پیدا نشد !"]);
}
}elseif(preg_match('/^\/(unban )/',$text) and in_array($from_id,$Dev)){
$user_id=explode(' ',$text)[1];
if(strpos("$bans","$user_id\n") !== false){
     Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"کاربری با شناسه $user_id آزاد شد ."]);
        	file_put_contents("data/bans.txt",str_replace("$user_id\n","",$bans));
}else{
     Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"کاربری با شناسه $user_id مسدود نیست !"]);
}
}elseif( ($text== "/ban" or $text== "/ubban" or $text== "📓 لیست کاربران سیاه") and in_array($from_id,$Dev)){
    Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"آخرین افراد لیست سیاه :
$bans=======|اتمام لیست|========
راهنمای بن کردن :
/ban <USER-ID>
راهنمای آنبن / آزاد کردن :
/unban <USER-ID>

مثال ها :
/ban 123456789
/unban 123456789"]);
}
elseif ($juser["userfild"]["step"] == 'fortoall') {
if ($textmassage != "برگشت 🔙") {
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"پیام شما با موفقیت به عنوان فروارد همگانی تنظیم شد ✔️",
	  'reply_to_message_id'=>$message_id,
 ]);
$inuser = json_decode(file_get_contents("user.json"),true);
$inuser["fwd_pv"]['fid']="$message_id";
$inuser["fwd_pv"]['fcd']="$chat_id";
$inuser["fwd_pv"]['tag']=time();
$inuser["fwd_pv"]['start']="0";
$inuser["fwd_pv"]['sender']="$from_id";
$inuser["fwd_pv"]['send']="true";
$inuser = json_encode($inuser,true);
file_put_contents("user.json",$inuser);	
$juser["userfild"]["step"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/user/$from_id.json",$juser);		
}
}
elseif ($textmassage == '⚙️ فروارد به گروه ها' ) {
if (in_array($from_id,$Dev)){
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"لطفا متن خود را فروارد کنید  🚀",
	  'reply_to_message_id'=>$message_id,
	   'reply_markup'=>json_encode([
    'keyboard'=>[
	[
	['text'=>"برگشت 🔙"] 
	]
   ],
      'resize_keyboard'=>true
   ])
 ]);
$juser["userfild"]["step"]="fortoallgp";
$juser = json_encode($juser,true);
file_put_contents("data/user/$from_id.json",$juser);		
}
}
elseif ($juser["userfild"]["step"] == 'fortoallgp') {
if ($textmassage != "برگشت 🔙") {
         Bot('sendmessage',[
        	'chat_id'=>$chat_id,
        	'text'=>"پیام شما با موفقیت به عنوان فروارد همگانی در گروه ها نظیم شد ✔️",
	  'reply_to_message_id'=>$message_id,
 ]);
$inuser = json_decode(file_get_contents("user.json"),true);
$inuser["fwd_gp"]['fid']="$message_id";
$inuser["fwd_gp"]['fcd']="$chat_id";
$inuser["fwd_gp"]['tag']=time();
$inuser["fwd_gp"]['start']="0";
$inuser["fwd_gp"]['sender']="$from_id";
$inuser["fwd_gp"]['send']="true";
$inuser = json_encode($inuser,true);
file_put_contents("user.json",$inuser);	
$juser["userfild"]["step"]="none";
$juser = json_encode($juser,true);
file_put_contents("data/user/$from_id.json",$juser);	
}
}
unlink('error_log');
?>
