<?php
use CRM_Uepalcontacts_ExtensionUtil as E;

class CRM_Uepalcontacts_Page_RecentChanges extends CRM_Core_Page {

  public function run() {
    CRM_Utils_System::setTitle('Modifications récentes');

    $this->assign('recentChanges', $this->getData());

    parent::run();
  }

  private function getData(int $limit = 100) {
    $sql = "
      select
        l.log_date modification_date,
        l.id modified_contact,
        l.display_name modified_contact,
        l.log_action,
        c.display_name modified_by
      from 
        log_civicrm_contact l 
      inner join 
        log_civicrm_contact c on c.id = l.log_user_id  
      order by 
        1 desc 
      limit 
        0,$limit
    ";

    $dao = CRM_Core_DAO::executeQuery($sql);
    return $dao->fetchAll();
  }

}
