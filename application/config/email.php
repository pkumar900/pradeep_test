
<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
    'smtp_host' => 'ssl://smtp.gmail.com',
    'smtp_port' => 465,
    'smtp_user' => 'vinaysahani67@gmail.com',
    'smtp_pass' => '7737819145',
    'smtp_crypto' => 'security', //can be 'ssl' or 'tls' for example
    'mailtype' => 'text', //plaintext 'text' mails or 'html'
    'smtp_timeout' => '2', //in seconds
    'charset' => 'iso-8859-1',
    'wordwrap' => TRUE
);