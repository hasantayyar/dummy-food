<?php

class Get
{
	protected $attributes = array();

	public function __construct($url)
	{
		$this->attributes['url'] = $url;
	}

	public static function build($url)
	{
		return new static($url);
	}

	public function send()
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->attributes['url']);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
	        curl_setopt($ch, CURLOPT_TIMEOUT, 2);
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}
}
