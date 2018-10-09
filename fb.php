<?php
// Create a Facebook App, and insert the App ID and Secret here
$appId = '';
$appSecret = '';

$accessToken = $appId.'|'.$appSecret;

$pages = [
	/*Insert page-names in this array, to be able to pull posts from them */
];

if ( !isset($_GET['p']) && ($_SERVER['REMOTE_ADDR'] == '217.63.118.190') )
{
	foreach($pages as $title)
	{
		echo '<a href="?p='.$title.'">'.$title.'</a> - ';
		echo '<a href="?p='.$title.'&pretty"> (View source)</a>';
		echo '<br>';
	}

}
elseif ( in_array($_GET['p'], $pages) )
{
	$page = $_GET['p'];
	$fields = $_GET['fields'];
	$type = (isset($_GET['type'])) ? $_GET['type'] : 'feed';
	
	if( $_GET['access_token'] )
		$accessToken = $_GET['access_token'];
	
	if( empty($fields) ){
		$dataRaw = file_get_contents("https://graph.facebook.com/$page/$type?fields=rating,id,object_id,created_time,picture,full_picture,message,link,permalink_url,shares,type&access_token=$accessToken");
	} else {
		if($fields = 'none'){
			$dataRaw = file_get_contents("https://graph.facebook.com/$page/$type?access_token=$accessToken");
		} else {
			$dataRaw = file_get_contents("https://graph.facebook.com/$page/$type?fields=$fields&access_token=$accessToken");
		}
	}
	$data = json_decode($dataRaw);

	if ( isset($_GET['pretty']) )
		echo '<pre>';

	echo json_encode($data, JSON_PRETTY_PRINT);
}
else
{
	http_response_code(404);
	die();
}
