<?php

namespace Blog\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class BlogPostTable {
  protected $tableGateway;
  
  public function __construct(TableGateway $tableGateway) {
    $this->tableGateway = $tableGateway;
  }
  
  public function fetchAll() {
    
    $resultSet = $this->tableGateway->select(function (Select $select) {
          $select->order('id DESC');
    });
    
    return $resultSet;
  }
  
  public function getBlogPost($id) {
    $id = (int) $id;
    $rowset = $this->tableGateway->select(array('id' => $id));
    $row = $rowset->current();
    
    if (!$row) {
      throw new Exception("Could not find row $id");
    }
    
    return $row;
  }
  
  public function saveBlogPost(BlogPost $blogpost) {
    $data = array(
      'title' => $blogpost->title,
      'intro' => $blogpost->intro,
      'fulltext' => $blogpost->fulltext,
      'updated' => $blogpost->updated,
    );
    
    $user_id = (int) $blogpost->user_id;
    
    if ($user_id) {
      $data['user_id'] = $user_id;
    }
   
    $id = (int) $blogpost->id;
    
    if ($id == 0) {
      $this->tableGateway->insert($data);
    } else {
      if ($this->getBlogPost($id)) {
        $this->tableGateway->update($data, array('id' => $id));
      } else {
        throw new Exception('The Post does not exist');
      }
    }
  }
  
  public function deleteBlogPost($id) {
    $id = (int) $id;
    $this->tableGateway->delete(array('id' => $id));
  }
  
  
  public function getZfcUserName($id) {
    $id = (int) $id;
    $rowset = $this->tableGateway->select('user', array('user_id' => $id));
    $row = $rowset->current();
    
    if (!$row) {
      throw new Exception("Could not find row $id");
    }
    
    return $row;
  }
  
}

