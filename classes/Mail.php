<?php

namespace classes;
require 'vendor/autoload.php';
use Mailgun\Mailgun;

class Mail
{
  public static function send($to, $subject, $text, $html)
  {
    // First, instantiate the SDK with your API credentials
    $mg = Mailgun::create('key-d67987f2033196838b9ba9b59dbd8430'); // For US servers

    // Now, compose and send your message.
    // $mg->messages()->send($domain, $params);
    $mg->messages()->send('test.testlog.tk', [
      'from'    => 'recover@testlog.com',
      'to'      => $to,
      'subject' => $subject,
      'text'    => $text
    ]);
  }
}