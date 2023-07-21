<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class EmailControler extends Controller
{
  public function index(){
     /* $transport =(new \Swift_SmtpTransport('smtp.gmail.com', 465,'ssl'))
          ->setUsername('almostowred.china@gmail.com')
          ->setPassword('IsmMoali#1');

      $mailer =new \Swift_Mailer($transport);
      $message =(new \Swift_Message('هذة الرسالة بخصوص'))
          ->setFrom(array('almostowred.china@gmail.com' => 'AZHA ERP'))
          ->setTo(array("g.ali.telecom@gmail.com" => "mail@mail.com"))
          ->setBody("<h1>Welcome</h1>", 'text/html');
      $result = $mailer->send($message);*/

   Mail::to('g.ali.telecom@gmail.com')->send(new \App\Mail\Mail());
    }
}
