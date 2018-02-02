<?php

namespace Blog;

use Blog\Model\BlogPost;
use Blog\Model\BlogPostTable;
use Blog\Model\BlogUser;
use Blog\Model\BlogUserTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface,
    Zend\ModuleManager\Feature\ConfigProviderInterface,
    Zend\ModuleManager\Feature\ViewHelperProviderInterface;

use Blog\View\Helper\Dateformathelper;
use Blog\View\Helper\Getzfcuserbyidhelper;


class Module implements
    AutoloaderProviderInterface, 
    ConfigProviderInterface, 
    ViewHelperProviderInterface
{
    public function getViewHelperConfig()
    {
        return array(
            'factories' => array(
                'date_format_helper' => function($sm) {
                    $helper = new Dateformathelper;
                    return $helper;
                },
                'get_zfcuser_by_id_helper' => function($sm) {
                    $helper = new Getzfcuserbyidhelper;
                    return $helper;
                }
            )
        );   
    }
   
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
          'factories' => array(
            'Blog\Model\BlogPostTable' => function($sm){
              $tableGateway = $sm->get('BlogPostTableGateway');
              $table = new BlogPostTable($tableGateway);
              return $table;
            },
            'BlogPostTableGateway' => function($sm){
              $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
              $resultSetPrototype = new ResultSet();
              $resultSetPrototype->setArrayObjectPrototype(new BlogPost());
              return new TableGateway('blogpost', $dbAdapter, null, $resultSetPrototype);
            },
            'Blog\Model\BlogUserTable' => function($sm){
              $tableBlogUserGateway = $sm->get('BlogUserTableGateway');
              $tableBlogUser = new BlogUserTable($tableBlogUserGateway);
              return $tableBlogUser;
            },
            'BlogUserTableGateway' => function($sm){
              $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
              $resultSetPrototype = new ResultSet();
              $resultSetPrototype->setArrayObjectPrototype(new BlogUser());
              return new TableGateway('user', $dbAdapter, null, $resultSetPrototype);
            },
          )
        );
    }
}
