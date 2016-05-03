<?php

namespace KosherKampus\EntityNotificator\Notifications\Entity;

use Namshi\Notificator\NotificationInterface;

/**
 * Interface used to identify notifications that should be sent on HipChat
 */
interface EntityNotificationInterface extends NotificationInterface
{
    public function getSubjectType();
    public function getObjectType();
    public function getTimestamp();
}