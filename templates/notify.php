<?php

require_once('../inc/connect.php');
require_once '../vendor/autoload.php';
mysqli_set_charset($con, 'utf8');

$sql = "SELECT tasks.id, tasks.name AS taskName, tasks.date, users.login AS login, users.email AS email
FROM tasks
JOIN users ON tasks.user_id = users.id
WHERE (TO_DAYS(tasks.date) - TO_DAYS(NOW())) >= 0 AND (TO_DAYS(tasks.date) - TO_DAYS(NOW())) <= 1  ";

$res = mysqli_query($con, $sql);

$emails = mysqli_fetch_all($res, MYSQLI_ASSOC);
mysqli_close($con);

// echo "<pre>";
//  print_r($emails);
// echo "</pre>";

foreach ($emails as $messageArr) {
    $taskName = $messageArr['taskName'];
    $login = $messageArr['login'];
    $date = $messageArr['date'];
    $email = $messageArr['email'];

    $result[$email]['message'] = (isset($result[$email]['message'])) ?  $result[$email]['message']."Уважаемый(ая)".$login." время выполения задачи ".$taskName." заканчивается $date" : "";
    // print_r( $result[$email]['message']);
   $messageText= $result[$email]['message'];
   echo "</br>"; 
   print($messageText);
   echo "</br>";
   print($login);
   echo "</br>";
   print($email);
   echo "</br>";  
    
      }


      
      try {
    
        
        $transport = (new Swift_SmtpTransport('smtp.yandex.ru', 465))
          ->setUsername('prudyusmarina@gmail.com')
          ->setPassword('A92das15');
    
        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);
    
        // Create a message
        $message = (new Swift_Message());
        $message->setSubject('Demo message using the SwiftMailer library.');
        $message->setFrom(['prudyusmarina@gmail.com' => 'Я']);
    
        $message->setTo([ $email =>  $login]);
        $message->setBody( $messageText);
    
    
        // Send the message
        $numSent = $mailer->send($message);
    
        printf("Sent %d messages\n", $numSent);
          
      } catch (Exception $e) {
        echo $e->getMessage();
      }