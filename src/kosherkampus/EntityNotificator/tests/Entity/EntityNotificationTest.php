<?php

use KosherKampus\EntityNotificator\Notifications\Entity\EntityNotification;
use Namshi\Notificator\Notification\Email\EmailNotification;

class EntityNotificationTest extends PHPUnit_Framework_TestCase {
    private $params = array();
    $params['subjectType'] = 'user';
    $params['objectType'] = 'user';
    $params['action'] = 'Started following';
    $params['subjectName'] = 'Jane Doe';
    $params['objectName'] = 'John Doe';
    private $recipentAddresses = ['john_doe@yahoo.com', 'john_doe@msn.com', 'joh_doe@gmail.com'];
    public function testEntityCreation() { 
       $entity = new EntityNotification('email.txt', $this->recipentAddresses, $this->params);
       $this->assertNotEmpty($entity);
       return $entity;     
   }
   
   @depends testEntityCreation
   public function assertEntityAttributes($entity) {
       $this->assertEqual($this->params['subjectType'], $entity->getSubjectType());
       $this->assertEqual($this->params['objectType'], $entity->getObjectType());
       $this->assertNotEmpty()
   }
   
   @depends testEntityCreation
   public function testHandling() {
       
   }
}
?>
