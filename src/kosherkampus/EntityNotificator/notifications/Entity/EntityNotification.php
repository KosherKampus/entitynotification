<?php

namespace Namshi\Notificator\Notification\Entity;

use Namshi\Notificator\Notification;
use Namshi\Notification\Email\EmailNotificationInterface;

/**
 * Class representing a notification that needs to be sent via email.
 */
class EntityNotification extends Notification implements EntityNotificationInterface, EmailNotificationInterface
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
    
     /**
     * Unique id for use in factory class when instantiating new notifications
     *
     * @var string
     */
     protected static $entityCode;
     
    /**
     * Constructor.
     * 
     * @param array|string $recipientAddress
     * @param array $parameters
     */
    public function __construct($emailTemplate, $recipientAddresses, $subjectType ='' ,
    $objectType = '', array $parameters = array())
    {
        $this->recipientAddresses = is_array($recipientAddresses) ? $recipientAddresses : [$recipientAddresses];
        $this->parameters         = $parameters;
        $this->emailTemplate      = $emailTemplate;
        $this->subjectType = $subjectType;
        $this->onjectType = $objectType;
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
    
     /**
     * @inheritDoc
     */
    public function getCode() {
        return SELF::$entityCode;
    }
}
