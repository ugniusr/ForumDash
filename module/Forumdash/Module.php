<?php
namespace Forumdash;

//use Album\Model\Album;
//use Album\Model\AlbumTable;
//use Zend\Db\ResultSet\ResultSet;
//use Zend\Db\TableGateway\TableGateway;
use Zend\EventManager\EventInterface as Event;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ConsoleUsageProviderInterface;
use Zend\Console\Adapter\AdapterInterface as Console;



class Module implements
    ConfigProviderInterface,
    ConsoleUsageProviderInterface
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
    public function getConsoleUsage(Console $console)
    {
        return array(
            // Describe available commands
            'user resetpassword [--verbose|-v] EMAIL'    => 'Reset password for a user',

            // Describe expected parameters
            array( 'EMAIL',            'Email of the user for a password reset' ),
            array( '--verbose|-v',     '(optional) turn on verbose mode'        ),
        );
    }
}