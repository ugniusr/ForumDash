<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Forumdash\Controller\Forumdash' => 'Forumdash\Controller\ForumdashController',
            'Forumdash\Controller\Console' => 'Forumdash\Controller\ConsoleController',
        ),
    ),

    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'forumdash' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/forumdash[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Forumdash\Controller\Forumdash',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    'console' => array(
        'router' => array(
            'routes' => array(
                'printhello' => array(
                    'options' => array(
                        'route'    => 'printhello',
                        'defaults' => array(
                            'controller' => 'Forumdash\Controller\Console',
                            'action'     => 'printhello'
                        ),
                    ),
                ),
                'addtopics' => array(
                    'options' => array(
                        'route'    => 'addtopics <optionalNumber>',
                        'defaults' => array(
                            'controller' => 'Forumdash\Controller\Console',
                            'action'     => 'addtopics'
                        ),
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'forumdash' => __DIR__ . '/../view',
        ),
    ),
	'doctrine' => array(
	  'driver' => array(
		'application_entities' => array(
		  'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
		  'cache' => 'array',
		  'paths' => array(__DIR__ . '/../src/Forumdash/Entity'),
		),

		'orm_default' => array(
		  'drivers' => array(
			'Forumdash\Entity' => 'application_entities',
		  )
	))),
);