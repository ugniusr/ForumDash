<?php
namespace Forumdash\Form;

use Zend\Form\Form;

class AddtopicsForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('addtopics');
        $this->setAttribute('method', 'post');
        
/*		
 *      $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
 * 
 */
        $this->add(array(
            'name' => 'topics',
            'attributes' => array(
                'type'  => 'textarea',
                'rows' => '20',
            ),
            'options' => array(
                'label' => 'Paste topics from Excel here (Link<TAB>Topic):',
            ),
        ));
       $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }
}