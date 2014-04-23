<?php
/**
 * Table Definition for factures
 */


class DataObjects_Factures extends DB_DataObject_Pluggable
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'factures';            // table name
    public $id;                              // int(4)  primary_key not_null unsigned
    public $client_id;                       // int(4)   not_null unsigned
    public $date;                            // date   not_null default_0000-00-00
    public $designation;                     // text   not_null
    public $ratio_tva;                       // float   not_null
    public $montant;                         // float   not_null
    public $paye;                            // tinyint(1)   not_null

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObjects_Factures',$k,$v); }

    function table()
    {
         return array(
             'id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'client_id' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'date' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_DATE + DB_DATAOBJECT_NOTNULL,
             'designation' =>  DB_DATAOBJECT_STR + DB_DATAOBJECT_TXT + DB_DATAOBJECT_NOTNULL,
             'ratio_tva' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'montant' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_NOTNULL,
             'paye' =>  DB_DATAOBJECT_INT + DB_DATAOBJECT_BOOL + DB_DATAOBJECT_NOTNULL,
         );
    }

    function keys()
    {
         return array('id');
    }

    function sequenceKey() // keyname, use native, native name
    {
         return array('id', true, false);
    }

    function defaults() // column default values
    {
         return array(
             '' => null,
         );
    }


    function links() {
        // links generated from .links.ini file
        return array(
			'client_id'=>'clients:id',

        );
    }
    function reverseLinks() {
        // reverseLinks generated from .links.ini file
        return array(

        );
    }
    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
    public $fb_linkOrderFields = array('date DESC');
    public $fb_enumFields = array('ratio_tva');
    public $fb_enumOptions = array('ratio_tva'=>array('0'=>'0%', '0.196'=>'19.6%'));

    public function can_add_with_parameters($field, $value)
    {
      return true;
    }

    public function getSingleMethods()
    {
      return array('outpdf'=>array('title'=>'Obtenir le PDF'));
    }
    public function getBatchMethods()
    {
      return array(
        'somme'       => array('title'=>'somme'),
        'export'      => array('title'=>'export fichiers'),
        'sendByMail' => array('title' => 'Envoyer par email'),
      );
    }
    public function prepareSendByMail($form)
    {
      $form->addElement('text',     'subject','Titre du mail', array('size=80'));
      $form->addElement('textarea', 'body',   'Corps du mail', array('rows="5" cols=80'));
      $form->setDefaults(array('subject' => Config::getPref('default_mail_subject'), 'body' => Config::getPref('default_mail_body')));

    }
    public function sendByMail($values)
    {
      while($this->fetch()) {
        $file = '/tmp/F'.$this->id.'_tau.pdf';
        $this->getPdf()->write($file);
        $tosend[$this->client_id][] = $file;
      }
      $fwd = Config::getPref('forward_to');
      foreach($tosend as $client_id => $files) {
        $client = DB_DataObject::factory('clients');
        $client->get($client_id);
        $m = Mail::factory('vide');
        $m->setVars(array('subject' => $values['subject'],'body' => $values['body']));
        foreach($files as $file) {
          $m->addFile($file);
        }
        $m->sendTo($client->email);
        if($fwd) {
          $m->sendTo($fwd);

        }
        $this->say(count($files).' fichier(s) envoyé(s) à '.$client->email);
      }
    }
    public function exportfichiers()
    {
      while($this->fetch()) {
        copy(APP_ROOT.WEB_FOLDER.'/upload/'.$this->filename,APP_ROOT.'export/'.date('ymd',strtotime($this->date)).'DEP'.Strings::stripify($this->titre).'.'.FileUtils::getFileExtension($this->filename));
      }
    }

    public function export()
    {
      while($this->fetch()) {
        $path = APP_ROOT.'export/'.date('Ym',strtotime($this->date)).'/';
        if(!is_dir($path)) mkdir($path);
        $dest = $path.'F'.$this->id.'.pdf';
        $this->say('enregistrement dans '.$dest);
        $this->getPdf()->write($dest);
      }
    }
      public function preGenerateForm($fb)
  {
    if(empty($this->id)) {
      $this->date = date('Y-m-d');
    }
  }

    public function prepareSearchForm($form)
    {
      $this->fb_fieldsToRender = array('client_id','paye','date');
      $this->fb_preDefElements['paye'] = HTML_QuickForm::createElement('select','paye','Payé?',array(''=>'','o'=>'OUI','n'=>'NON'));

    }
    public function frontEndSearch($values)
    {
      $search = new M_Office_Search($this, $values);
      $search->filterDate('date');
      switch($values['paye']) {
        case 'o':$this->whereAdd('paye=1');break;
        case 'n':$this->whereAdd('paye=0');break;
      }
      if($values['client_id']) {
        $this->client_id = $values['client_id'];
      }
    }
    public function somme()
    {
      while($this->fetch()) {
        $tot+=$this->montant;
      }
      $this->say('somme : '.$tot.' &euro;');
    }
    public function getPdf()
    {
      $pdf = MPdf::factory('facture');
      $pdf->setVars(array('facture'=>$this));
			return $pdf;
    }
    public function getRef()
    {
      return 'F'.sprintf('%05d',$this->id);
    }
    public function outpdf()
    {
      $this->getPdf()->serve($this->getRef().'.pdf');
    }
}
