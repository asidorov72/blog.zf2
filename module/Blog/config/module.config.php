<?php

return array(
  'controllers' => array(
        'invokables' => array(
            'Blog\Controller\BlogPost' => 'Blog\Controller\BlogPostController'
        ),
    ),
  
    'view_manager' => array(
        'template_path_stack' => array(
          'blog-post' =>  __DIR__ . '/../view',
        ),
    ),
  
    'router' => array(
        'routes' => array(
            'blog-post' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/blog-post[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Blog\Controller\BlogPost',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
  
);
