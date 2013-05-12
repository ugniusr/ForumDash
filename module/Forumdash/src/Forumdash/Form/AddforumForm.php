<?php
namespace Forumdash\Form;

use Zend\Form\Form;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;


class AddforumForm extends Form implements ObjectManagerAwareInterface
{
    protected $objectManager;
    
    public function __construct(ObjectManager $om)
    {
        // we want to ignore the name passed
        $this->setObjectManager($om);

        parent::__construct('addforum');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
        $this->add(array(
            'name' => 'projectname',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'ProjectName ONLY LETTERS PLEASE (no /.,:)',
            ),
        ));
        $this->add(array(
            'name' => 'Website',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Website',
            ),
        ));
        $this->add(array(
            'name' => 'LastAccountUsed',
            'attributes' => array(
                'type'  => 'hidden',
                'value' => '3',
            ),
            
        ));
        $this->add(array(
            'name' => 'LastTopicUsed',
            'attributes' => array(
                'type'  => 'hidden',
                'value' => '0',
            ),
            
        ));
        $this->add(array(
            'name' => 'LastTemplateUsed',
            'attributes' => array(
                'type'  => 'hidden',
                'value' => '0',
            ),
            
        ));
        $this->add(array(
            'name' => 'LastProxyUsed',
            'attributes' => array(
                'type'  => 'hidden',
                'value' => '0',
            ),
            
            
        ));
        $this->add(array(
            'name' => 'ImacrosCreateAccCode',
            'attributes' => array(
                'type'  => 'textarea',
                'rows'  => '5',
				
            ),
            'options' => array(
                'label' => 'ImacrosCreateAccCode',
                
            ),
        ));
        $this->add(array(
            'name' => 'ImacrosLoginPost',
            'attributes' => array(
                'type'  => 'textarea',
                'rows'  => '5',
            ),
            'options' => array(
                'label' => 'ImacrosLoginPost',
            ),
        ));
        $this->add(array(
            'name' => 'Linkstructure',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Linkstructure',
            ),
        ));
        $this->add(array(
            'name' => 'Senderemail',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Senderemail',
            ),
        ));
               
      
        $this->add(array(
            'name'    => 'AnswerTemplate',
            'type'    => 'Zend\Form\Element\Select',
            'options' => array(
                'label'         => 'AnswerTemplate',
                'value_options' => $this->getOptionsForAnswerTmpl(),
                // 'empty_option'  => '--- please choose ---'
            )
        ));
        
        $this->add(array(
            'name'    => 'Language',
            'type'    => 'Zend\Form\Element\Select',
            'attributes' => array(
                'value' => 'en',
            ),
            'options' => array(
                'label'         => 'Language',
                'value_options' => $this->getOptionsForLanguage(),
                // 'empty_option'  => '--- please choose ---'
            ),
        ));
        
        $this->add(array(
            'name'    => 'AffprogramId1',
            'type'    => 'Zend\Form\Element\Select',
            'attributes' => array(
                'value' => 'en',
            ),
            'options' => array(
                'label'         => 'Default Aff. program',
                'value_options' => $this->getOptionsForAffiliate(),
                // 'empty_option'  => '--- please choose ---'
            ),
        ));
        
        $this->add(array(
            'name' => 'TopicsTable',
            'attributes' => array(
                'type'  => 'text',
                'value' => 'topics',
            ),
            'options' => array(
                'label' => 'TopicsTable (topics + Projectname)',
            ),
        ));
        
        $this->add(array(
            'name' => 'ShiftLinkstructureBy',
            'attributes' => array(
                'type'  => 'text',
                'value' => '0',
            ),
            'options' => array(
                'label' => 'ShiftLinkstructureBy',
            ),
        ));
        $this->add(array(
            'name' => 'Pausebeforeconfirm',
            'attributes' => array(
                'type'  => 'text',
                'value' => '1',
            ),
            'options' => array(
                'label' => 'Pausebeforeconfirm',
            ),
        ));
        $this->add(array(
            'name' => 'Pausebeforenextpost',
            'attributes' => array(
                'type'  => 'text',
                'value' => '30',
            ),
            'options' => array(
                'label' => 'Pausebeforenextpost',
            ),
        ));
       
        $this->add(array(
            'name' => 'PostQnA',
            'attributes' => array(
                'type'  => 'text',
                'value' => '0',
            ),
            'options' => array(
                'label' => 'PostQnA',
                
            ),
        ));
        
 /*
        $this->add(array(
            'name' => 'Captcha',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Captcha',
            ),
        ));
        $this->add(array(
            'name' => 'BeforeURL',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'BeforeURL',
            ),
        ));
        $this->add(array(
            'name' => 'AfterURL',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'AfterURL',
            ),
        ));
         
        */
        
        $this->add(array(
            'name' => 'ProjectStatus',
            'attributes' => array(
                'type'  => 'text',
                'value' => 'New forum. Need testing.'
            ),
            'options' => array(
                'label' => 'ProjectStatus',
            ),
        ));
        
        
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Submit',
                'id' => 'submitbutton',
            ),
        ));
    }
    public function init()
    {
        
        /*
        $this->add(
            array(
                'type' => 'DoctrineModule\Form\Element\ObjectSelect',
                'name' => 'AnswerTemplate',
                'options' => array(
                    'object_manager' => $this->getObjectManager(),
                    'target_class'   => 'Forumdash\Entity\Projects',
                    'property'       => 'AnswerTemplate',
                ),
            )
        );
        
        */

        // die("I'm never called!");

    }
    
    public function setObjectManager(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    public function getObjectManager()
    {
        return $this->objectManager;
    }
    public function getOptionsForAnswerTmpl()
    {
        
        //$objectManager = $this
        //        ->getServiceLocator()
        //        ->get('Doctrine\ORM\EntityManager');
        // die(var_dump($objectManager));
        // $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        
        $db = $this->objectManager->getConnection();
        $sql = $db->prepare("SELECT Id, AnswerTemplate FROM Projects GROUP BY AnswerTemplate;");                
        $sql->execute();
        $result = $sql->fetchAll();
        
        $selectData = array();
 
        foreach ($result as $res) {
            $selectData[$res['AnswerTemplate']] = $res['AnswerTemplate'];
        }
 
        return $selectData;
    }
    public function getOptionsForLanguage()
    {
        
        //$objectManager = $this
        //        ->getServiceLocator()
        //        ->get('Doctrine\ORM\EntityManager');
        // die(var_dump($objectManager));
        // $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        
        $db = $this->objectManager->getConnection();
        $sql = $db->prepare("SELECT Id, Language FROM Projects GROUP BY Language;");                
        $sql->execute();
        $result = $sql->fetchAll();
        
        $selectData = array();
 
        foreach ($result as $res) {
            $selectData[$res['Language']] = $res['Language'];
        }
        
        // die(var_dump($selectData));
        return $selectData;
        
    }
    
    public function getOptionsForAffiliate()
    {
        
        //$objectManager = $this
        //        ->getServiceLocator()
        //        ->get('Doctrine\ORM\EntityManager');
        // die(var_dump($objectManager));
        // $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        
        $db = $this->objectManager->getConnection();
        $sql = $db->prepare("SELECT Id, ProgramName FROM affiliateprograms;");

        $sql->execute();
        $result = $sql->fetchAll();
        
        $selectData = array();
 
        foreach ($result as $res) {
            $selectData[$res['Id']] = $res['ProgramName'];
        }
        
        // die(var_dump($selectData));
        return $selectData;
        
    }
}