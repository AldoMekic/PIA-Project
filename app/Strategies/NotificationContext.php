<?php

namespace App\Strategies;

class NotificationContext
{
    private $strategy;

    public function __construct(NotificationStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function getNotifications()
    {
        return $this->strategy->getNotifications();
    }
}