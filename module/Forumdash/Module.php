<?php
namespace Forumdash;

//use Album\Model\Album;
//use Album\Model\AlbumTable;
//use Zend\Db\ResultSet\ResultSet;
//use Zend\Db\TableGateway\TableGateway;
use Zend\EventManager\EventInterface as Event;
use Zend\ModuleManager\Feature\ViewHelperProviderInterface,
    Zend\ModuleManager\Feature\AutoloaderProviderInterface,
    Zend\ModuleManager\Feature\ConfigProviderInterface,
    Zend\ModuleManager\Feature\FormElementProviderInterface;

class Module implements FormElementProviderInterface
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    /*
    public function getViewHelperConfig()
    {
        return array(
            'factories' => array(
                'FormCollection' => function($sm) {
                    $helper1 = new View\Helper\FormCollection;
                    return $helper1;
                },
                'FormElement' => function($sm) {
                    $helper2 = new View\Helper\FormElement;
                    return $helper2;
                }
            )
        );
   }
*/
	
    public function getServiceConfig()
    {
        return array(
            /*'factories' => array(
                'Album\Model\AlbumTable' =>  function($sm) {
                    $tableGateway = $sm->get('AlbumTableGateway');
                    $table = new AlbumTable($tableGateway);
                    return $table;
                },
                'AlbumTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Album());
                    return new TableGateway('album', $dbAdapter, null, $resultSetPrototype);
                },
            ),*/
        );
    }
    public function getFormElementConfig()
    {
        return array(
            'initializers' => array(
                'ObjectManagerInitializer' => function ($element, $formElements) {
                    if ($element instanceof ObjectManagerAwareInterface) {
                        $services      = $formElements->getServiceLocator();
                        $entityManager = $services->get('Doctrine\ORM\EntityManager');

                        $element->setObjectManager($entityManager);
                    }
                },
            ),
        );
    }
}