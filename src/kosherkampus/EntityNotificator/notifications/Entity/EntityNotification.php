<?php

namespace KosherKampus\EntityNotificator\Notifications\Entity;

use Namshi\Notificator\Notification\Email\EmailNotification;
use Namshi\Notificator\Notification\Email\EmailNotificationInterface;

/**
 * Class representing a notification that needs to be sent via email.
 */
class EntityNotification extends EmailNotification implements EmailNotificationInterface
{
     protected $requiredAttributes = ['action', 'subjectType', 'objectType', 'timestamp'];
    /**
     * Constructor.
     * 
     * @param array|string $recipientAddress
     * @param array $parameters
     */
     
    public function __construct($emailTemplate, $recipientAddresses, array $parameters = array())
    {    
        if(!isset($parameters['timestamp'])) {
            //set timestamp if timestamp is currently null
            $parameters['timestamp'] = time();
        }
        //main attributes for an entity notification
        foreach($this->requiredAttributes as $item) {
            if (! array_key_exists($item, $parameters)) {
                throw new Exception ("Missing parameter $item in parameter list");
            }
        }    
        parent::__construct($emailTemplate, $recipientAddresses, $parameters);
    }
    
}
