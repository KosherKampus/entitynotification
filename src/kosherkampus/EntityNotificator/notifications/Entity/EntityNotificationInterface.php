<?php

namespace Namshi\Notificator\Notification\Entity;

use Namshi\Notificator\NotificationInterface;

/**
 * Interface used to identify notifications that should be sent on HipChat
 */
interface EntityNotificationInterface extends NotificationInterface
{
    public function getCode();
    public function getSubjectType();
    public function getObjectType();
}