<?php

namespace ForumdashTest;

use Zend\Loader\AutoloaderFactory;
use Zend\Mvc\Service\ServiceManagerConfig;
use Zend\ServiceManager\ServiceManager;
use RuntimeException;

error_reporting(E_ALL | E_STRICT);
chdir(__DIR__);

/**
 * Test bootstrap, for setting up autoloading
 */
class Bootstrap
{
    protected static $serviceManager;

    
    public static function init()
    {
        // define("APPLICATION_PATH", "/Users/ugniusr/Projects/ForumDash");
        $zf2ModulePaths = array(dirname(dirname(__DIR__)));
        if (($path = static::findParentPath('vendor'))) {
            $zf2ModulePaths[] = $path;
        }
        if (($path = static::findParentPath('module')) !== $zf2ModulePaths[0]) {
            $zf2ModulePaths[] = $path;
        }
        
        // Composer autoloading
        if (file_exists($zf2ModulePaths[1] .'/autoload.php')) {
            $loader = include $zf2ModulePaths[1] .'/autoload.php';
        }
        //var_dump($zf2ModulePaths[1] .'/autoload.php');

        static::initAutoloader();

        // use ModuleManager to load this module and it's dependencies
                // use ModuleManager to load this module and it's dependencies
        
        $config = array(
            'module_listener_options' => array(
                'module_paths' => $zf2ModulePaths,
            ),
            'modules' => array(
                'Application',
                'Forumdash',
                'Album',
            ),
            'config_glob_paths' => array(
             '/Users/ugniusr/Projects/ForumDash/config' . '/autoload/{,*.}{global,local}.php',
            ),

        );

        //        $config = include '/Users/ugniusr/Projects/ForumDash/'. 'config/application.config.php';

        $serviceManager = new ServiceManager(new ServiceManagerConfig());
        $serviceManager->setService('ApplicationConfig', $config);
        $serviceManager->get('ModuleManager')->loadModules();
        static::$serviceManager = $serviceManager;
    }

    public static function getServiceManager()
    {
        return static::$serviceManager;
    }

    protected static function initAutoloader()
    {
        $vendorPath = static::findParentPath('vendor');

        $zf2Path = getenv('ZF2_PATH');
        if (!$zf2Path) {
            if (defined('ZF2_PATH')) {
                $zf2Path = ZF2_PATH;
            } else {
                if (is_dir($vendorPath . '/zendframework/zendframework/library')) {
                    $zf2Path = $vendorPath . '/zendframework/zendframework/library';
                }
            }
        }

        if (!$zf2Path) {
            throw new RuntimeException('Unable to load ZF2. Run `php composer.phar install` or define a ZF2_PATH environment variable.');
        }

        include $zf2Path . '/Zend/Loader/AutoloaderFactory.php';
        AutoloaderFactory::factory(array(
            'Zend\Loader\StandardAutoloader' => array(
                'autoregister_zf' => true,
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/' . __NAMESPACE__,
                ),
            ),
        ));
    }

    protected static function findParentPath($path)
    {
        $dir = __DIR__;
        $previousDir = '.';
        while (!is_dir($dir . '/' . $path)) {
            $dir = dirname($dir);
            if ($previousDir === $dir) return false;
            $previousDir = $dir;
        }
        return $dir . '/' . $path;
    }
}

Bootstrap::init();