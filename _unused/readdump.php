<?php
header('Content-Type:text/plain');

$dump_file = 'maildump.txt';

$emails = unserialize(file_get_contents($dump_file));

foreach ($emails as $email) {
	print_r($email['overview']);
}
