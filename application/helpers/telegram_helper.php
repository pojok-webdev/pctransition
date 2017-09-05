<?php
function newtickettext($clientname,$sales,$kdticket,$complaint,$createuser,$baseurl,$rowid){
    return "Sebuah Tiket baru telah dibuat: ".$clientname."(AM:".$sales."), \nkode ticket ".$kdticket."\nKomplain: ".$complaint." \nTS: ".$createuser."  \n\nTiket dapat dilihat pada tautan berikut ".$baseurl."tickets/filter/".$rowid." \n\n(padiApp)";  
}
function sendtelegram($bot_token,$chat_id,$message){
    exec("wget https://api.telegram.org/bot".$bot_token."/sendMessage --post-data 'chat_id=".$chat_id."&text=".$message." '");
}
?>