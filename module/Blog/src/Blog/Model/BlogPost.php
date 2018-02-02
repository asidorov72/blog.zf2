<?php

namespace Blog\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class BlogPost implements InputFilterAwareInterface {
  
  public $id;
  public $title;
  public $intro;
  public $fulltext;
  public $created;
  public $updated;
  public $user_id;
  
  protected $inputFilter;
  
  public function exchangeArray($data) {
    $this->id = (!empty($data['id'])) ? $data['id'] : null;
    $this->created = (!empty($data['created'])) ? $data['created'] : null;
    $this->updated = (!empty($data['updated'])) ? $data['updated'] : null;
    $this->title = (!empty($data['title'])) ? $data['title'] : null;
    $this->intro = (!empty($data['intro'])) ? $data['intro'] : null;
    $this->fulltext = (!empty($data['fulltext'])) ? $data['fulltext'] : null;
    $this->user_id = (!empty($data['user_id'])) ? $data['user_id'] : 0;
  }
  
  public function getArrayCopy() {
    return get_object_vars($this);
  }
  
  public function setInputFilter(InputFilterInterface $inputFilter) {
     throw new \Exception("Not used");
  }

  public function getInputFilter() {

    if (!$this->inputFilter) {
      $inputFilter = new InputFilter();
      
      $inputFilter->add(
        array(
          'name' => 'id',
          'required' => true,
          'filters' => array(
            array('name' => 'Int')
          ),
        )
      );
      
      $inputFilter->add(
        array(
          'name' => 'updated',
          'required' => false,
        )
      );
      
      $inputFilter->add(
        array(
          'name' => 'title',
          'required' => true,
          'filters' => array(
            array('name' => 'StripTags'),
            array('name' => 'StringTrim'),
          ),
          'validators' => array(
            array(
              'name' => 'StringLength',
              'options' => array(
                'encoding' => 'UTF-8',
                'min' => 1,
                'max' => 100,
              )
            ),
          ),
        )
      );
      
      $inputFilter->add(
        array(
          'name' => 'intro',
          'required' => true,
          'filters' => array(
            array('name' => 'StripTags'),
            array('name' => 'StringTrim'),
          ),
          'validators' => array(
            array(
              'name' => 'StringLength',
              'options' => array(
                'encoding' => 'UTF-8',
                'min' => 1,
                'max' => 250,
              )
            ),
          ),
        )
      );
      
      $inputFilter->add(
        array(
          'name' => 'fulltext',
          'required' => true,
          'filters' => array(
            array('name' => 'StripTags'),
            array('name' => 'StringTrim'),
          ),
          'validators' => array(
            array(
              'name' => 'StringLength',
              'options' => array(
                'encoding' => 'UTF-8',
                'min' => 1,
                'max' => 1000,
              )
            ),
          ),
        )
      );
      
      $this->inputFilter = $inputFilter;
    }
    
    return $this->inputFilter;
  }
}

