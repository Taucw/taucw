<?php

class M_Setup {
  public function setUpEnv()
  {
    $options = & PEAR :: getStaticProperty('DB_DataObject', 'options');
    $options = array (  'database' => DB_URI,
                        'schema_location' => APP_ROOT.PROJECT_NAME.DIRECTORY_SEPARATOR.'DOclasses',
                        'class_location' => APP_ROOT.PROJECT_NAME.DIRECTORY_SEPARATOR.'DOclasses',
                        'require_prefix' => 'DataObjects/',
                        'class_prefix' => 'DataObjects_',
                        'debug' => key_exists('debug',$_GET)?1:0,
                        'extends' =>'DB_DataObject_Pluggable',
                        'extends_location'=>'M/DB/DataObject/Pluggable.php',
                        'db_driver'=>'MDB2',
                        'quote_identifiers'=>true,
                        'generator_no_ini'=>true,
                    );
    require_once ("MDB2.php");
    $db_options = & PEAR::getStaticProperty('MDB2','options');
    $db_options['portability']=MDB2_PORTABILITY_ALL ^ MDB2_PORTABILITY_FIX_CASE;
    $pdfopt = & PEAR::getStaticProperty('MPdf', 'global');
    $pdfopt['template_dir'] = APP_ROOT.PROJECT_NAME.DIRECTORY_SEPARATOR.'_shared'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'_pdf/';

    $mailopt = & PEAR::getStaticProperty('Mail', 'global');
    $mailopt['template_dir'] = APP_ROOT.DIRECTORY_SEPARATOR.PROJECT_NAME.DIRECTORY_SEPARATOR.'_shared/templates/_mails/';
    $mailopt['drivers'] = explode(',',CONFIG_MAILDRIVERS);
    $mailopt['encoding'] = 'utf-8';
    $mailopt['logmail'] = CONFIG_LOGMAIL;
    $mailopt['log_folder'] = APP_ROOT.'mail_logs/';
    $mailopt['smtp'] = defined('SMTP') ? SMTP : false;
    $mailopt['from'] = 'contact@tau.so';
    $mailopt['fromname'] = 'Tau';
    $mailopt['smtphost'] = defined('SMTP_HOST') ? SMTP_HOST : null;
    $mailopt['smtpport'] = defined('SMTP_PORT') ? SMTP_PORT : null;
    $mailopt['smtpusername'] = defined('SMTP_USERNAME') ? SMTP_USERNAME : null;
    $mailopt['smtppassword'] = defined('SMTP_PASSWORD') ? SMTP_PASSWORD : null;

  }
}
