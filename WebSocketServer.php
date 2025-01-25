<?php

namespace App;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class WebSocketServer implements MessageComponentInterface
{
    protected $connections = [];

    public function onOpen(ConnectionInterface $connection)
    {
        $this->connections[] = $connection;
        echo "New connection! ({$connection->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $message)
    {
        foreach ($this->connections as $connection) {
            if ($connection !== $from) {
                $connection->send("User {$from->resourceId} said: {$message}");
            }
        }
    }

    public function onClose(ConnectionInterface $connection)
    {
        $index = array_search($connection, $this->connections);
        unset($this->connections[$index]);
        echo "Connection {$connection->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $connection, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";
        $connection->close();
    }
}
