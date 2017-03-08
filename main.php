<?php
$is_dev = false;
$config = (object)(require 'config.php');

// print_r($config);
// var_dump($config);
// die();

$cache = $config->cache;
// die($cache);

$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
$usr = $config->usr;
$pwd = $config->pwd;
// die();

if (!preg_match('/gmail\.com$/', $usr)) die('NOT gmail.com EMAIL');
// die();

if ($is_dev) {
	$inbox = imap_open($hostname, $usr, $pwd) or die('Cannot connect to IMAP: ' . imap_last_error());

	// $emails = imap_search($inbox,'ALL');
	// $emails = imap_search($inbox, 'SUBJECT "Holy holy"');
	// $emails = imap_search($inbox, 'SINCE "18 January 2017"');
	$emails = imap_search($inbox, 'SINCE "1 January 2017"');
	$dump = array();
} else {
	// what!?
	// i need to add extra "()"
	// throw php (unsrialize) error:
	// if ($emails_data = @file_get_contents($cache) !== false) {
	if (($emails_data = @file_get_contents($cache)) !== false) {
		$emails = unserialize($emails_data);
	} else {
		die('CACHE.GET.FAIL');
	}
}

// header('Content-Type: text/plain');

$result = array();

if($emails !== false) {

	// sudah di js
	// reverse sort email, new to old
	// rsort($emails);

	foreach($emails as $email) {

		if ($is_dev) {
			$header = imap_fetchheader($inbox, $email);
			$overview = imap_fetch_overview($inbox, $email);
			$body = imap_fetchbody($inbox, $email, 1);

			$dump[] = $mail = array(
				'mail_header' => $header,
				'mail_overview' => $overview,
				'mail_body' => $body
			);

		} else {
			$mail = $email;
		}

		// ---------------------------------------------------------

		// print_r($mail);
		array_push($result, $mail);

	}

}

header('Content-Type: application/json');
echo json_encode($result);

if ($is_dev) {
	imap_close($inbox);
	@file_put_contents($cache, serialize($dump)) || die('CACHE.PUT.FAIL');
}
