<?php
namespace MyApp;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Chat implements MessageComponentInterface
{
    protected $clients;
    private $subscriptions;
    private $users;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
        $this->subscriptions = [];
        $this->users = [];
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);
        $this->users[$conn->resourceId] = $conn;
    }

    public function onMessage(ConnectionInterface $conn, $msg)
    {
        $data = json_decode($msg);
        switch ($data->command) {
            case "subscribe":
                $this->subscriptions[$conn->resourceId] = $data->channel;
                break;
            case "message":
                if (isset($this->subscriptions[$conn->resourceId])) {
                    $target = $this->subscriptions[$conn->resourceId];
                    foreach ($this->subscriptions as $id=>$channel) {
                        if ($channel == $target && $id != $conn->resourceId) {
                            $html = 
                            '<div class="otherMessageCont">
                                <div class="otherUserCont">
                                    <p>'. $data->message .'</p>
                                    <span> '. date("Y/m/d") . ' //</span>
                                </div>
                            </div>'
                            ;
                            $this->users[$id]->send($html);
                        }
                    }
                }
								break;
            case "arquivo":
                if (isset($this->subscriptions[$conn->resourceId])) {
                    $target = $this->subscriptions[$conn->resourceId];
                    foreach ($this->subscriptions as $id=>$channel) {
                        if ($channel == $target && $id != $conn->resourceId) {

													// echo $data;
													// str_replace("../", "/server/",$data->fileName);

													$ext = pathinfo($data->fileName, PATHINFO_EXTENSION);
													$name = pathinfo($data->fileName, PATHINFO_FILENAME);
													// echo $data->fileName;
													
													if(
																	$ext == "png" ||
																	$ext == "jpeg" ||
																	$ext == "jpg" ||
																	$ext == "svg"
													) {
															$res = 
															'<div><img src="'.$data->fileName.'" alt=""></div>';
															
													} else {
															$res ='<a href="'. $data->fileName .'" download>'. $name .'</a>';
													}
													
													$html = 
													'<div class="otherMessageCont">
																	<div class="otherUserCont">' . 
																			$res
																	.
																			'<span> '. date("Y/m/d") . ' //</span>
																	</div>
													</div>'
													;
													$this->users[$id]->send($html);
                        }
                    }
                }
								break;
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);
        unset($this->users[$conn->resourceId]);
        unset($this->subscriptions[$conn->resourceId]);
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }
}
?>