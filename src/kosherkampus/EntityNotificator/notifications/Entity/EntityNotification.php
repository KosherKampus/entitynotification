<?php

namespace KosherKampus\EntityNotificator\Notifications\Entity;

use Namshi\Notificator\Notification\Email\EmailNotification;
use Namshi\Notificator\Notification\Email\EmailNotificationInterface;

/**
 * Class representing a notification that needs to be sent via email.
 */
class EntityNotification extends EmailNotification implements EntityNotificationInterface, EmailNotificationInterface
{
   /**
     * Type of the entity that performs the action.
     *
     * @var string
    */
    protected $subjectType;
    
    /**
     * Type of the entity that receives the action.
     *
     * @var string
    */
    protected $objectType;
    
    /**
     * Email Template
     *
     * @var string
     */
    protected $emailTemplate;

    /**
     * Recipient Email Addresses.
     *
     * @var array
     */
    protected $recipientAddresses = [];
    
    protected $action;
     
    /**
     * Constructor.
     * 
     * @param array|string $recipientAddress
     * @param array $parameters
     */
     
    public function __construct($emailTemplate, $recipientAddresses, array $parameters = array(), $timestamp = null)
    {
        parent::__construct($emailTemplate, $recipientAddresses, $parameters);
        $this->timestamp = $timestamp or time();
        
        //main attributes for an entity notification
        foreach(['action', 'subjectType', 'objectType', 'timestamp'] as $item) {
            if (array_key_exists($item, $parameters)) {
                $this->$item = $parameters[$item];
            }
        }
        
    }
    
    /**
     * @inheritDoc
     */
    public function getRecipientAddresses()
    {
        return $this->recipientAddresses;
    }

    /**
     * @inheritDoc
     */
    public function getEmailTemplate()
    {
        return $this->emailTemplate;
    }
    
    public function getObjectType() {
        return $this->objectType;
    }
    
    public function getSubjectType() {
        return $this->subjectType;
    }
    
    public function getTimeStamp() {
        return $this->timestamp;
    }
}
