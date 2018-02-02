<?php

namespace Blog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Blog\Model\BlogPost;
use Blog\Model\BlogUser;
use Blog\Form\BlogPostForm;


class BlogPostController extends AbstractActionController {
  
  protected $blogPostTable;
  protected $blogUserTable;
  
  public function getBlogPostTable() {
    if (!$this->blogPostTable) {
      $sm = $this->getServiceLocator();
      $this->blogPostTable = $sm->get('Blog\Model\BlogPostTable');
    }
    return $this->blogPostTable;
  }
  
  public function getBlogUserTable() {
    if (!$this->blogUserTable) {
      $sm = $this->getServiceLocator();
      $this->blogUserTable = $sm->get('Blog\Model\BlogUserTable');
    }
    return $this->blogUserTable;
  }
  
  public function indexAction() {
     $blogposts = $this->getBlogPostTable()->fetchAll();
     $usersRes = $this->getBlogUserTable()->fetchAll();
     
     $u = new ViewModel($usersRes);
     $users = $u->getVariables(); 
     
     return array(
      'blogposts' => $blogposts,
      'users' => $users,
    );
  }
  
  public function viewAction() {
    
    $id = (int) $this->params()->fromRoute('id', 0);
    
    if (!$id) {
      return $this->redirect()->toRoute('blog-post', array('action' => 'index'));
    }
    
    try {
      $blogpost = $this->getBlogPostTable()->getBlogPost($id);
      $zfcuser  = $this->getBlogUserTable()->getZfcUser($blogpost->user_id);
    } catch (\Exception $ex) {
      return $this->redirect()->toRoute('blog-post', array('action' => 'index'));
    }
    
    return array(
      'id' => $id,
      'post' => $blogpost,
      'user' => $zfcuser,
    );
  }
  
  public function addAction() {
    $form = new BlogPostForm();
    $form->get('submit')->setValue('Add');
    
    $user_id = 0;
    
    if ($this->zfcUserAuthentication()->hasIdentity()) {
      $user = $this->zfcUserAuthentication()->getIdentity();
      $user_id = (int) $user->getID();
    }
    
    $request = $this->getRequest();
    if ($request->isPost()) {
      $blogpost = new BlogPost();
      
      $form->setInputFilter($blogpost->getInputFilter());
      $form->setData($request->getPost());
      
      if ($form->isValid()) {
        $blogpost->exchangeArray($form->getData());
        $blogpost->user_id = $user_id;
        $this->getBlogPostTable()->saveBlogPost($blogpost); 
        
        // redirect to list of albums
        return $this->redirect()->toRoute('blog-post');
      }
    }
    
    // variables for the view
    return array('form' => $form);
  }
  
  public function editAction() {
   
    $id = (int) $this->params()->fromRoute('id', 0);
    
    if (!$id) {
      return $this->redirect()->toRoute('blog-post', array('action' => 'add'));
    }
    
    try {
      $blogpost = $this->getBlogPostTable()->getBlogPost($id);
      
    } catch (\Exception $ex) {
      return $this->redirect()->toRoute('blog-post', array('action' => 'index'));
    }
    
    $form = new BlogPostForm();
    $form->bind($blogpost);
    $form->get('updated')->setValue(date("Y-m-d H:i:s"));
    $form->get('submit')->setValue('Edit');
    
    $request = $this->getRequest();
    if ($request->isPost()) {
      $form->setInputFilter($blogpost->getInputFilter());
      $form->setData($request->getPost());
      
      if ($form->isValid()) {
        $this->getBlogPostTable()->saveBlogPost($blogpost);
        
        // redirect to list of albums
        return $this->redirect()->toRoute('blog-post');
      }
    }
    
    // variables for the view
    return array(
      'id' => $id,
      'form' => $form,
    );
  }
  
  public function deleteAction() {
    $id = (int) $this->params()->fromRoute('id', 0);
    
    if (!$id) {
      return $this->redirect()->toRoute('blog-post');
    }
    
    try {
      $blogpost = $this->getBlogPostTable()->getBlogPost($id);
      $zfcuser  = $this->getBlogUserTable()->getZfcUser($blogpost->user_id);
    } catch (\Exception $ex) {
      return $this->redirect()->toRoute('blog-post', array('action' => 'index'));
    }
    
    $request = $this->getRequest();
    if ($request->isPost()) {
      $del = $request->getPost('del', 'No');
      
      if ($del === 'Yes') {
        $id = (int) $request->getPost('id');
        $this->getBlogPostTable()->deleteBlogPost($id);
      }
      
      return $this->redirect()->toRoute('blog-post');
    }
    
    // variables for the view
    return array(
      'id' => $id,
      'post' => $blogpost,
      'user' => $zfcuser,
    );
  }
  
  
}

