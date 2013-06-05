<?php
/**
 * BjyAuthorize Module (https://github.com/bjyoungblood/BjyAuthorize)
 *
 * @link https://github.com/bjyoungblood/BjyAuthorize for the canonical source repository
 * @license http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'bjyauthorize' => array(
 /*       // default role for unauthenticated users
        'default_role'          => 'guest',

        // default role for authenticated users (if using the
        // 'BjyAuthorize\Provider\Identity\AuthenticationIdentityProvider' identity provider)
        'authenticated_role'    => 'user',

        // identity provider service name
        //'identity_provider'     => 'BjyAuthorize\Provider\Identity\ZfcUserZendDb',

        // Role providers to be used to load all available roles into Zend\Permissions\Acl\Acl
        // Keys are the provider service names, values are the options to be passed to the provider
        'role_providers'        => array(),

        // Resource providers to be used to load all available resources into Zend\Permissions\Acl\Acl
        // Keys are the provider service names, values are the options to be passed to the provider
        'resource_providers'    => array(),

        // Rule providers to be used to load all available rules into Zend\Permissions\Acl\Acl
        // Keys are the provider service names, values are the options to be passed to the provider
        'rule_providers'        => array(),
*/
        // Guard listeners to be attached to the application event manager
        'guards'                => array(

                'BjyAuthorize\Guard\Controller' => array(
                    array('controller' => 'zfcuser', 'roles' => array()),
                    array('controller' => 'error', 'roles' => array('guest')),
                    // Below is the default index action used by the [ZendSkeletonApplication](https://github.com/zendframework/ZendSkeletonApplication)
                    array('controller' => 'Application\Controller\Index', 'roles' => array('guest','user')),
                    array('controller' => 'Forumdash\Controller\Forumdash', 'roles' => array('user')),
                    array('controller' => 'Forumdash\Controller\Console', 'roles' => array('guest')),
            ),

        ),
/*
        // strategy service name for the strategy listener to be used when permission-related errors are detected
        'unauthorized_strategy' => 'BjyAuthorize\View\UnauthorizedStrategy',

        // Template name for the unauthorized strategy
        'template'              => 'error/403',
        */
    ),
);
