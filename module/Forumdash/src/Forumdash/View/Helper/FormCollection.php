<?php
// ./src/Application/View/Helper/FormCollection.php
namespace Forumdash\View\Helper;

use Zend\Form\ElementInterface;
use Zend\Form\View\Helper\FormCollection as BaseFormCollection;

class FormCollection extends BaseFormCollection {
    public function render(ElementInterface $element) {
        return '<table>'.parent::render($element).'</table>';
    }
}