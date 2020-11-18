<?php
  require __DIR__ . '/vendor/autoload.php';

  $options = array(
    'cluster' => 'us2',
    'useTLS' => true
  );
  $pusher = new Pusher\Pusher(
    'a43c43e8323a364ec612',
    '9eab5f4b9e78848c684e',
    '1107301',
    $options
  );

  $data['message'] = $_POST["mensagem"];
  $pusher->trigger('chat', 'send-message', $data);
?>