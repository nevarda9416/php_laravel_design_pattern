<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 7/24/2022
 * Time: 8:26 PM
 */

namespace App\Queue\Jobs;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;


class RabbitMQJob
{
    /**
     * Gửi message
     */
    public function sendMessage()
    {
        # Create a connection to RabbitMQ
        $connection = new AMQPStreamConnection(
            config()->get('constants.RABBITMQ_HOST'),
            config()->get('constants.RABBITMQ_PORT'), # Port 15672 for rabbitmq web interface, port 5672 for rabbitmq client
            config()->get('constants.RABBITMQ_USERNAME'),
            config()->get('constants.RABBITMQ_PASSWORD')
        );
        # Khai báo 1 kênh
        $channel = $connection->channel();
        # Create the queue if it does not already exist
        $channel->queue_declare(
            $queue = config()->get('constants.RABBITMQ_QUEUE_EMAIL_NAME'), # tên hàng đợi
            $passive = false,
            $durable = true,
            $exclusive = false,
            $auto_delete = false,
            $nowait = false,
            $arguments = null,
            $ticket = null
        );
        // Example sinh job đẩy vào trong queue
        $jobId = 0;
        # Vòng lặp sinh ra n job
        for ($i = 0; $i <= 9; $i++) {

        }
    }
}
