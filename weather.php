<?php
require_once ('class.conexion.php');
class weather 
{
	function buildBaseString($baseURI, $method, $params) {
	    $r = array();
	    ksort($params);
	    foreach($params as $key => $value) {
	        $r[] = "$key=" . rawurlencode($value);
	    }
	    return $method . "&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r));
	}
	function buildAuthorizationHeader($oauth) {
	    $r = 'Authorization: OAuth ';
	    $values = array();
	    foreach($oauth as $key=>$value) {
	        $values[] = "$key=\"" . rawurlencode($value) . "\"";
	    }
	    $r .= implode(', ', $values);
	    return $r;
	}
	function curl($query){
		$url = 'https://weather-ydn-yql.media.yahoo.com/forecastrss';
		$app_id = 'XEpdww4g';
		$consumer_key = 'dj0yJmk9MFVNaEZoZVZNZzcyJmQ9WVdrOVdFVndaSGQzTkdjbWNHbzlNQS0tJnM9Y29uc3VtZXJzZWNyZXQmc3Y9MCZ4PTA2';
		$consumer_secret = 'f8c1955ea301eb4aae6859d091ebf48c2beae102';
		
		$oauth = array(
		    'oauth_consumer_key' => $consumer_key,
		    'oauth_nonce' => uniqid(mt_rand(1, 1000)),
		    'oauth_signature_method' => 'HMAC-SHA1',
		    'oauth_timestamp' => time(),
		    'oauth_version' => '1.0'
		);
		$base_info = $this->buildBaseString($url, 'GET', array_merge($query, $oauth));
		$composite_key = rawurlencode($consumer_secret) . '&';
		$oauth_signature = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
		$oauth['oauth_signature'] = $oauth_signature;
		$header = array(
		    $this->buildAuthorizationHeader($oauth),
		    'X-Yahoo-App-Id: ' . $app_id
		);
		$options = array(
		    CURLOPT_HTTPHEADER => $header,
		    CURLOPT_HEADER => false,
		    CURLOPT_URL => $url . '?' . http_build_query($query),
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_SSL_VERIFYPEER => false
		);
		$ch = curl_init();
		curl_setopt_array($ch, $options);
		$response = curl_exec($ch);
		curl_close($ch);
		$this->newHistorico($query['location'],json_decode($response, true));
		return $response;
	}

	function newHistorico($city,$response){
		$modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT c.id FROM ciudades c WHERE c.nombre = '".$city."'";
        $statement = $conexion->prepare($sql);
        $statement->execute();
        $citys=$statement->fetchAll(PDO::FETCH_ASSOC);
        $city=$citys[0]["id"];
        $sql="INSERT INTO historico(id_ciudad, fecha, humedad) values (:id_ciudad, now(), :humedad)";
        $statement=$conexion->prepare($sql);
        $statement->bindParam(':id_ciudad',$city);
        $statement->bindParam(':humedad', $response['current_observation']['atmosphere']['humidity']);
        if($statement){
        	$statement->execute();
        	return true;
        }
	}
}
?>