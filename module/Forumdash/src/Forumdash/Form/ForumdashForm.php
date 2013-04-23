<?php
namespace Forumdash\Form;

use Zend\Form\Form;

class ForumdashForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('forumdash');
        $this->setAttribute('method', 'post');
        
/*		$this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
        $this->add(array(
            'name' => 'keyword',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => '',
            ),
        ));
*/       $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }
}