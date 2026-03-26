<?php
use CRM_Uepalcontacts_ExtensionUtil as E;

class CRM_Uepalcontacts_Page_RecentChanges extends CRM_Core_Page {

  public function run() {
    $dsn = defined('CIVICRM_LOGGING_DSN') ? CRM_Utils_SQL::autoSwitchDSN(CIVICRM_LOGGING_DSN) : CRM_Utils_SQL::autoSwitchDSN(CIVICRM_DSN);
    $dsn = DB::parseDSN($dsn);
    $this->db = $dsn['database'];

    CRM_Utils_System::setTitle('Modifications récentes');

    $this->assign('recentChanges', $this->getData());

    parent::run();
  }

  private function getData(int $limit = 100) {
    $sql = "
      select
        l.log_date modification_date,
        l.id modified_contact_id,
        l.display_name modified_contact,
        l.log_action,
        c.display_name modified_by
      from 
        bddcivicrmlog.log_civicrm_contact l 
      inner join 
        bddcivicrmlog.log_civicrm_contact c on c.id = l.log_user_id  
      where
        l.log_date > DATE_SUB(NOW(), INTERVAL 1 MONTH)
      group by
        l.log_date, l.id, l.display_name, l.log_action, c.display_name  
      order by 
        1 desc 
    ";

    $dao = CRM_Core_DAO::executeQuery($sql);
    return $dao->fetchAll();
  }

}
