<?php
namespace Config\Form;

use Gc\Form\AbstractForm,
    Zend\Validator\Db,
    Zend\Validator\Identical,
    Zend\Form\Element,
    Zend\Form\SubForm,
    Zend\Locale\Locale,
    Gc\User\Permission;

class Config extends AbstractForm
{
    public function init()
    {
        $this->setMethod(self::METHOD_POST);

    }

    protected function initGeneral()
    {
        //General settings
        $general_settings = new SubForm();
        $name = new Element\Text('site_name');
        $name->setRequired(TRUE)
            ->setLabel('Site name')
            ->setAttrib('class', 'input-text')
            ->addValidator('NotEmpty');

        $is_offline = new Element\Radio('is_offline');
        $is_offline->setLabel('Is offline')
            ->addMultiOptions(array('Yes', 'No'))
            ->setAttrib('class', 'input-text');

        $offline_document = new Element\Select('offline_document');
        $offline_document->setLabel('Offline document')
            ->addMultiOptions(array())
            ->setAttrib('class', 'input-text');

        $general_settings->addElements(array($name, $is_offline));

        $this->addSubForm($general);
    }

    public function initServer()
    {
        //Session settings
        $session_settings = new SubForm('Cookie and sessions');

        $cookie_domain = new Element\Text('cookie_domain');
        $cookie_domain->setRequired(TRUE)
            ->setLabel('Cookie domain')
            ->setAttrib('class', 'input-text')
            ->addValidator('NotEmpty');

        $cookie_path = new Element\Text('cookie_path');
        $cookie_path->setRequired(TRUE)
            ->setLabel('Cookie path')
            ->setAttrib('class', 'input-text')
            ->addValidator('NotEmpty');

        $session_lifetime = new Element\Text('session_lifetime');
        $session_lifetime->setRequired(TRUE)
            ->setLabel('Session lifetime')
            ->setAttrib('class', 'input-text')
            ->addValidator('NotEmpty');

        $session_handler = new Element\Select('session_handler');
        $session_handler->setRequired(TRUE)
            ->setLabel('Session handler')
            ->addMultiOptions(array('Database', 'Files'));

        $session_settings->addElements(array($cookie_domain, $cookie_path, $session_handler, $session_lifetime));
        $this->addSubForm($session_settings);

        //Local settings
        $locale_settings = new SubForm('Locale settings');

        $locale = new Element\Select();
        $locale->setRequired(TRUE)
            ->setLabel('Server locale')
            ->addMultiOptions(Locale::getLocaleList());

        $locale_settings->addElements(array($locale));
        $this->addSubForm($locale_settings);

        //Mail settings
        $mail_settings = new SubForm();

        $mail_from = new Element\Text('mail_from');
        $mail_from->setRequired(TRUE)
            ->setLabel('From E-mail')
            ->setAttrib('class', 'input-text')
            ->addValidator('NotEmpty');

        $mail_from_name = new Element\Text('mail_from_name');
        $mail_from_name->setRequired(TRUE)
            ->setLabel('From name')
            ->setAttrib('class', 'input-text')
            ->addValidator('NotEmpty');

        $mail_settings->addElements(array($mail_from, $mail_from_name));
        $this->addSubForm($mail_settings);
    }
}