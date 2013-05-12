<?php
// ./src/Application/View/Helper/FormElement.php
namespace Forumdash\View\Helper;

use Zend\Form\ElementInterface;
use Zend\Form\View\Helper\FormElement as BaseFormElement;

class FormElement extends BaseFormElement {

    public function render(ElementInterface $element) {
        if ($element->getOption('required')) {
            $req = 'required';
        }
        //$type = $element->getAttribute('type');
        //$name = $element->getAttribute('name');
        return sprintf('<tr>%s</tr>', parent::render($element));
    }
}