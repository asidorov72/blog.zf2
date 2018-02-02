<?php

namespace Blog\View\Helper;

use Zend\View\Helper\AbstractHelper;
 
class Getzfcuserbyidhelper extends AbstractHelper
{
    public function __invoke($bloguser_id, $zfcuser, $users = null)
    {
      $bloguser_id = (int) $bloguser_id;
      $name = 'Guest';
      $user_id = 0;
      
      if (!empty($users)) {        
        foreach($users as $user) {
          if ((int) $user['user_id'] === $bloguser_id) {
            $name = (!empty($user['display_name'])) ? $user['display_name'] : $name;
            break;
          }
        }
      } else {
        if(!empty($zfcuser) && isset($zfcuser->user_id)) {
          $user_id = (int) $zfcuser->user_id;
          $name = (!empty($zfcuser->display_name)) ? $zfcuser->display_name : $name;
        }
      }

      return $name;
    }
}