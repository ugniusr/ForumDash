<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Doctrine\Common\ClassLoader;

// \vendor\doctrine\common\lib\Doctrine\Common\Annotations\AnnotationRegistry::registerFile('vendor/doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php');

// require 'vendor/doctrine/common/lib/Doctrine/Common/ClassLoader.php';
	

class IndexController extends AbstractActionController
{
    /*public function indexAction()
    {
        return new ViewModel();
    }*/
	public function indexAction() {

//	$classLoader = new ClassLoader('Application\Entity', 'module/Application/src');
//	$classLoader->register();

	
//	$classloader = new \Doctrine\Common\ClassLoader('Application', '/module/Application/src/Application/Entity');
//	$classloader->register();
	
	$objectManager = $this
        ->getServiceLocator()
        ->get('Doctrine\ORM\EntityManager');

//    $Config = new \Application\Entity\Config();
	
    //$Config->setVariablename('Var1');
	//$Config->setValue('1');
	$Config = $objectManager
		->getRepository('Application\Entity\Config')
		->findAll(); // (array('id' => '1'));
	
	return new ViewModel(array(
            'cfg' => $Config,
        ));
	
	//$objectManager->persist($Config);
    //$objectManager->flush();
	
	// var_dump($Config);
	
//	var_dump($Config->getId());

    // die(var_dump($user->getId())); // yes, I'm lazy
	}
}