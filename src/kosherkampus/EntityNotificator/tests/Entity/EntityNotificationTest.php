<?php

use KosherKampus\EntityNotificator\Notifications\Entity\EntityNotification;
use Namshi\Notificator\Notification\Email\EmailNotification;
use Namshi\Notificator\Manager;

class EntityNotificationTest extends PHPUnit_Framework_TestCase {
    private $params = ['subjectType' => 'user', 'objectType' => 'user', 'action' => 'started following',
    'subjectName' => 'Jane Doe', 'objectName'=> 'John Doe'];
    private $recipentAddresses = ['john_doe@yahoo.com', 'john_doe@msn.com', 'joh_doe@gmail.com'];
    private $manager = new Manager();
    
    public function testEntityCreation() { 
       $entity = new EntityNotification('email.txt', $this->recipentAddresses, $this->params);
       $this->assertNotEmpty($entity);
       return $entity;     
   }
   
   /**
     @depends testEntityCreation
   */
   public function assertEntityAttributes($entity) {
       $this->assertEqual($this->params['subjectType'], $entity->getSubjectType());
       $this->assertEqual($this->params['objectType'], $entity->getObjectType());
       $this->assertNotEmpty($entity->getTimestamp());
   }
   
   /**
   @depends testEntityCreation
   */
   public function testHandling($entity     ) {
       
   }
}
?>
