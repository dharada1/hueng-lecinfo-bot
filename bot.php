<?php

require_once('twitteroauth.php');
require_once('config.php');
require_once('kimono.php');

$conn = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
$day = array();
$today = date("Y/m/d");
$withinthisday = date("Y/m/d",strtotime('+3 days'));

for ($i=0; $i < sizeof($lecinfo[results][HU_eng_lecinfo]); $i++) {

$day[$i] = date("Y/m/d",strtotime(mb_substr($lecinfo[results][HU_eng_lecinfo][$i][day],0,strlen($lecinfo[results][HU_eng_lecinfo][1][day])-5)));

$params = array(
  'status' => "【" . $lecinfo[results][HU_eng_lecinfo][$i][type] . "】" . $lecinfo[results][HU_eng_lecinfo][$i][day] . "[講時]" . $lecinfo[results][HU_eng_lecinfo][$i][time] . "[科目]" . $lecinfo[results][HU_eng_lecinfo][$i][subject] . "[教員]" . $lecinfo[results][HU_eng_lecinfo][$i][professor] . "[教室]" . $lecinfo[results][HU_eng_lecinfo][$i][room] . $lecinfo[results][HU_eng_lecinfo][$i][supplementation]
);
	if(strtotime($today) <= strtotime($day[$i])){
		if(strtotime($day[$i]) <= strtotime($withinthisday)){
		$result = $conn->post('statuses/update', $params);

		}
	}
}