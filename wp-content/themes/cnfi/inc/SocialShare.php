<?php
/**
 *
 *  Social Share Class
 *
 */
class shareCount 
{
  private $url, $timeout;
  
  function __construct( $url, $timeout = 30 ) 
  {
	$this->url		= rawurlencode($url);
	$this->timeout	= $timeout;
  }
  
  function get_tweets() 
  { 
	$json_string	= $this->file_get_contents_curl('http://urls.api.twitter.com/1/urls/count.json?url=' . $this->url);
	$json			= json_decode($json_string, true);
	return isset($json['count'])?intval($json['count']):0;
  }
  
  function get_fb() 
  {
	$json_string	= $this->file_get_contents_curl('http://api.facebook.com/restserver.php?method=links.getStats&format=json&urls='.$this->url);
	$json			= json_decode($json_string, true);
	return isset($json[0]['total_count'])?intval($json[0]['total_count']):0;
  }
  
  function get_google() 
  {
	$iCount = $this->get_plusones(urldecode($this->url));
	return $iCount;
  }
  
  private function file_get_contents_curl($url)
  {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
	curl_setopt($ch, CURLOPT_FAILONERROR, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
	$cont = curl_exec($ch);
	if(curl_error($ch))
	{
	  //die(curl_error($ch));
	  $cont = 0;
	}
	return $cont;
  }
  
  
  private function get_plusones($url) 
  {
	    if(!$url) return 0;

		if(!filter_var($url, FILTER_VALIDATE_URL)) return 0;

		foreach (array('apis', 'plusone') as $host) {
			$ch = curl_init(sprintf('https://%s.google.com/u/0/_/+1/fastbutton?url=%s',
										  $host, urlencode($url)));
			curl_setopt_array($ch, array(
				CURLOPT_FOLLOWLOCATION => 1,
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_SSL_VERIFYPEER => 0,
				CURLOPT_USERAGENT      => 'Mozilla/5.0 (Windows NT 6.1; WOW64) ' .
										  'AppleWebKit/537.36 (KHTML, like Gecko) ' .
										  'Chrome/32.0.1700.72 Safari/537.36' ));
			$response = curl_exec($ch);
			$curlinfo = curl_getinfo($ch);
			curl_close($ch);

			if (200 === $curlinfo['http_code'] && 0 < strlen($response)) { break 1; }
			$response = 0;
		}
		!$response && die("Requests to Google's server fail..?!");

		preg_match_all('/window\.__SSR\s\=\s\{c:\s(\d+?)\./', $response, $match, PREG_SET_ORDER);
		return (1 === sizeof($match) && 2 === sizeof($match[0])) ? intval($match[0][1]) : 0;
  }
}
