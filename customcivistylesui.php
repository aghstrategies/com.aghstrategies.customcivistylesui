<?php

require_once 'customcivistylesui.civix.php';

/**
 * Implements hook_civicrm_buildform().
 * @param  string $formName  Name of form
 * @param  object $form     form object
 */
function customcivistylesui_civicrm_buildform($formName, &$form) {
  try {
    $pages = civicrm_api3('Setting', 'get', array(
      'sequential' => 1,
      'return' => "customcivistylesui_pricesetbuttonpages",
    ));
  }
  catch (CiviCRM_API3_Exception $e) {
    $error = $e->getMessage();
    CRM_Core_Error::debug_log_message(t('API Error: %1', array(1 => $error, 'domain' => 'com.aghstrategies.customcivistylesui')));
  }
  if (!empty($pages['values'][0]['customcivistylesui_pricesetbuttonpages'])) {
    $pages = $pages['values'][0]['customcivistylesui_pricesetbuttonpages'];
  }
  if ($formName == 'CRM_Event_Form_Registration_Confirm' || $formName == 'CRM_Event_Form_Registration_ThankYou' || $formName == 'CRM_Contribute_Form_Contribution_ThankYou' || $formName == 'CRM_Contribute_Form_Contribution_Confirm'|| $formName == 'CRM_Contribute_Form_Contribution_Main' || $formName == 'CRM_Event_Form_Registration_Register') {
    // For all civicrm forms
    CRM_Core_Resources::singleton()->addStyleFile('com.aghstrategies.customcivistylesui', 'css/generalform.css');
    if (in_array($form->getVar('_id'), $pages)) {
      CRM_Core_Resources::singleton()->addScriptFile('com.aghstrategies.customcivistylesui', 'js/reorganize.js');
      // CRM_Core_Resources::singleton()->addScriptFile('com.aghstrategies.customcivistylesui', 'js/pricesetbuttons.js');
      // CRM_Core_Resources::singleton()->addStyleFile('com.aghstrategies.customcivistylesui', 'css/pricesetbuttons.css');
      CRM_Core_Resources::singleton()->addStyleFile('com.aghstrategies.customcivistylesui', 'css/friends.css');
    }
  }
}

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function customcivistylesui_civicrm_config(&$config) {
  _customcivistylesui_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @param array $files
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function customcivistylesui_civicrm_xmlMenu(&$files) {
  _customcivistylesui_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function customcivistylesui_civicrm_install() {
  _customcivistylesui_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function customcivistylesui_civicrm_uninstall() {
  _customcivistylesui_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function customcivistylesui_civicrm_enable() {
  _customcivistylesui_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function customcivistylesui_civicrm_disable() {
  _customcivistylesui_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed
 *   Based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function customcivistylesui_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _customcivistylesui_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function customcivistylesui_civicrm_managed(&$entities) {
  _customcivistylesui_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * @param array $caseTypes
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function customcivistylesui_civicrm_caseTypes(&$caseTypes) {
  _customcivistylesui_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function customcivistylesui_civicrm_angularModules(&$angularModules) {
_customcivistylesui_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function customcivistylesui_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _customcivistylesui_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Functions below this ship commented out. Uncomment as required.
 *

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function customcivistylesui_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function customcivistylesui_civicrm_navigationMenu(&$menu) {
  _customcivistylesui_civix_insert_navigation_menu($menu, NULL, array(
    'label' => ts('The Page', array('domain' => 'com.aghstrategies.customcivistylesui')),
    'name' => 'the_page',
    'url' => 'civicrm/the-page',
    'permission' => 'access CiviReport,access CiviContribute',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _customcivistylesui_civix_navigationMenu($menu);
} // */
