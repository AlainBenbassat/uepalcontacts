<?php

require_once 'uepalcontacts.civix.php';

use CRM_Uepalcontacts_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function uepalcontacts_civicrm_config(&$config): void {
  _uepalcontacts_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function uepalcontacts_civicrm_install(): void {
  _uepalcontacts_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function uepalcontacts_civicrm_enable(): void {
  _uepalcontacts_civix_civicrm_enable();
}
