<?php
namespace Forumdash\Form;

use Zend\Form\Form;

class AddaccountpropertyForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('addaccountproperty');
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
            'name' => 'PropertyName',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'New Property Name',
            ),
        ));
        
        $this->add(array(
            'name' => 'Propvalues',
            'attributes' => array(
                'type'  => 'textarea',
                'rows' => '20',
            ),
            'options' => array(
                'label' => 'Paste a list of property values (single column). 
                    Make sure it is always 30 values or else the script 
                    will ruin the previous data;',
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