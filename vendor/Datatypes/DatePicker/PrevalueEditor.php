<?php
namespace Datatypes\DatePicker;

use Application\Model\Datatype\AbstractDatatype;

class PrevalueEditor extends AbstractDatatype\PrevalueEditor
{

    public function save($request = null) {
        //Save prevalue in column Datatypes\prevalue_value

        $this->setConfiguration(array());

        return $this->getConfiguration();
    }

    public function load() {
        $configuration = $this->getConfiguration();

        return array($required, $length);
    }
}