<?php
	require_once 'vendor/autoload.php';

	use Twilio\Rest\Client;

	// Your Account SID and Auth Token from twilio.com/console
	$account_sid = 'ACb2249073159522c0e060fbbeba3b714d';
	$auth_token = '9597fec9b131589f7849d227b6a7b175';

	// Get form input
	$phone_number = $_POST['phone_number'];
	$message = $_POST['message'];

	// Remove any non-digit characters from the phone number
	$phone_number = preg_replace('/\D/', '', $phone_number);

	// Initialize the Twilio client
	$client = new Client($account_sid, $auth_token);

	try {
		// Send the SMS message
		$result = $client->messages->create(
			$phone_number,
			array(
				'messaging_service_sid' => 'YOUR_MESSAGING_SERVICE_SID',
				'body' => $message
			)
		);

		echo 'Message sent successfully: ' . $result->sid;
	} catch (Exception $e) {
		echo 'Error sending message: ' . $e->getMessage();
	}
?>