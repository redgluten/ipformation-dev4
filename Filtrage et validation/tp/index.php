<?php 

function validateEndingDate($data) {

	// Validation du format
	$result = filter_var(
		$data,
		FILTER_VALIDATE_REGEXP,
		array('regexp' => '/^\d{4}-\d{2}-\d{2}$/')
	);
	if (!$result) { return false; }

	// Création des datetime
	try {
		$d1 = new DateTime($_POST['starting-date']);
		$d2 = new DateTime($data);
		$diff = $d12->diff($d1);
	} catch (Exception $e) {
		return false;
	}

	if ($diff->invert === 1) {
		return false;
	} else { 
		return $data;
	}
}

function validateIpEnd($data)	{
	// Validation du format
	$result = filter_var(
		$data,
		FILTER_VALIDATE_IP,
		array('flags' => 'FILTER_FLAG_IPV4')
	);
	 if (!$result) {
	 	return false;
	 }

	 // Récupération de IP start
	 $start = $_POST['ip-adress-start'];

	 // Comparaison des IPs start et end
	 $start = ip2long($start);
	 $end = ip2long($data);

	 if ($end > $start) {
	 	return $data;
	 } else {
	 	return false;
	 }
}

$args = array(
	'username' => array(
		"filter" => "FILTER_VALIDATE_REGEXP",
		'regexp' => '/^[a-zA-Z0-9-]{6,25}$/'
	),
	'starting-date' => array(
		"filter" => "FILTER_VALIDATE_REGEXP",
		'regexp' => '/^\d{4}-\d{2}-\d{2}$/'
	),
	'ending-date' => FILTER_CALLBACK, array(
		"options" => "validateEndingDate"
	),
	'ip-adress-start' => array(
		'filter' => FILTER_VALIDATE_IP,
		'flags' => FILTER_FLAG_IPV4
	),
	'ip-adress-end' => array(
		'filter' => FILTER_CALLBACK,
		'options' => 'validateIpEnd'
	)
);

$myinputs = filter_input_array(INPUT_POST, $args);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TP Validation formulaire</title>
</head>
<body>

<?php 

if (isset($_POST[username]) && isset($_POST[starting-date]) && isset($_POST[ending-date]) && isset($_POST[ip-adress-start]) && isset($_POST[ip-adress-end]) && $myinputs != false) {
	var_dump($myinputs);
} else {
?>
	<form action="index.php" method="post" name="contact-form">
		<input type="text" name="username" placeholder="username"><br />
		<input type="date" name="starting-date"><br />
		<input type="date" name="ending-date"><br />
		<input type="text" name="ip-adress-start" placeholder="IP adress start"><br />
		<input type="text" name="ip-adress-end" placeholder="IP adress end"><br />
		<button type="submit" name='ok' value='ok'>Submit</button>
	</form>
<?php 
}

 ?>

</body>
</html>