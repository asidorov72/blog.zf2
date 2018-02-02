<?php

namespace Blog\Form;

use Zend\Form\Form;

class BlogPostForm extends Form {
  
  public function __construct($name = null) {
    // sets the form's name 
    parent::__construct('blogpost');
    
    $this->add(
      array(
        'name' => 'id',
        'type' => 'Hidden',
      )
    );
    
    $this->add(
      array(
        'name' => 'created',
        'type' => 'Hidden',
      )
    );
    
    $this->add(
      array(
        'name' => 'updated',
        'type' => 'Hidden',
      )
    );
    
    $this->add(
      array(
        'name' => 'title',
        'type' => 'Text',
        'options' => array(
          'label' => 'Title',
        )
      )
    );
    
    $this->add(
      array(
        'name' => 'intro',
        'type' => 'Textarea',
        'attributes' => array(
          'rows'  => 4,
          'cols'  => 60,
        ),
        'options' => array(
          'label' => 'Intro text',
        )
      )
    );
    
    $this->add(
      array(
        'name' => 'fulltext',
        'type' => 'Textarea',
        'attributes' => array(
          'rows'  => 8,
          'cols'  => 60,
        ),
        'options' => array(
          'label' => 'Full text',
        )
      )
    );
    
     $this->add(
      array(
        'name' => 'submit',
        'type' => 'Submit',
        'options' => array(
          'value' => 'Go',
          'id' => 'submitbutton',
        )
      )
    );
    
    
  }
}
