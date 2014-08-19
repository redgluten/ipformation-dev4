<html>
<body>
	<form method="post" action="">
		<label for="username">username</label><input type="text" name="username" /><br />
		<label for="date_start">date_start</label><input type="text" name="date_start" /><br />
		<label for="date_end">date_end</label><input type="text" name="date_end" /><br />
		<label for="ip_start">ip_start</label><input type="text" name="ip_start" /><br />
		<label for="ip_end">ip_end</label><input type="text" name="ip_end" /><br />
		<input type="submit"  /><br />
	</form>
	
<?php 
if ('POST' !== $_SERVER['REQUEST_METHOD']) {
	return false;
}

$options = array(
	'username' => array(
		'filter' => FILTER_VALIDATE_REGEXP,
		'options' => array('regexp' => '/^[0-9a-zA-Z-]{6,25}$/')
	),	
	'date_start' => array(
		'filter' => FILTER_VALIDATE_REGEXP,
		'options' => array('regexp' => '/^\d{4}-\d{2}-\d{2}$/')
	),	
	'date_end' => array(
		'filter' => FILTER_CALLBACK,
		'options' => 'validateDateEnd'	
	),	
	'ip_start' => array(
		'filter' => FILTER_VALIDATE_IP,
		'flags' => FILTER_FLAG_IPV4
	),	
	'ip_end' => array(
		'filter' => FILTER_CALLBACK,
		'options' => 'validateIpEnd'
	),	
);

$_CLEAN = filter_input_array(INPUT_POST, $options);
var_dump($_CLEAN);

function validateIpEnd($data)
{
	// Validation du format
	$result = filter_var(
			$data,
			FILTER_VALIDATE_IP,
			array('flags' => FILTER_FLAG_IPV4)
	);
	if (!$result) {
		return false;
	}
	
	// Récupération de Ip_start
	$start = $_POST['ip_start'];
	
	// Comparaison des IPs start et end
	$start = ip2long($start);
	$end = ip2long($data);
	
	if ($end > $start) {
		return $data;
	}
	
	return false;
}

function validateDateEnd($data)
{
	// Validation du format	
	$result = filter_var(
				$data, 
				FILTER_VALIDATE_REGEXP, 
				array('options' => array('regexp' => '/^\d{4}-\d{2}-\d{2}$/'))
				);
	if (!$result) {
		return false;
	}
	// Création des DT
	try {
		$d1 = new DateTime($_POST['date_start']);
		$d2 = new DateTime($data);
		$diff = $d2->diff($d1);
	} catch (Exception $e) {
		return false;
	}
	
	if ($diff->invert === 0) {
		return false;
	}
	
	return $data;
}

?>
</body>
</html>