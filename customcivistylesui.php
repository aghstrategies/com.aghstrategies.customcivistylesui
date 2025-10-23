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
  catch (CRM_Core_Exception $e) {
    $error = $e->getMessage();
    CRM_Core_Error::debug_log_message(t('API Error: %1', array(1 => $error, 'domain' => 'com.aghstrategies.customcivistylesui')));
  }
  if (!empty($pages['values'][0]['customcivistylesui_pricesetbuttonpages'])) {
    $pages = $pages['values'][0]['customcivistylesui_pricesetbuttonpages'];
  }
  if ($formName == 'CRM_Contribute_Form_Contribution_Main') {
    CRM_Core_Resources::singleton()->addStyleFile('com.aghstrategies.customcivistylesui', 'css/generalform.css');
    if (in_array($form->getVar('_id'), $pages)) {
      CRM_Core_Resources::singleton()->addScriptFile('com.aghstrategies.customcivistylesui', 'js/pricesetbuttons.js');
      CRM_Core_Resources::singleton()->addStyleFile('com.aghstrategies.customcivistylesui', 'css/pricesetbuttons.css');
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
 * Functions below this ship commented out. Uncomment as required.
 *

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *

 // */

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

// /**
//  * Implements hook_civicrm_postInstall().
//  *
//  * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
//  */
// function customcivistylesui_civicrm_postInstall() {
//   _customcivistylesui_civix_civicrm_postInstall();
// }

// /**
//  * Implements hook_civicrm_entityTypes().
//  *
//  * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
//  */
// function customcivistylesui_civicrm_entityTypes(&$entityTypes) {
//   _customcivistylesui_civix_civicrm_entityTypes($entityTypes);
// }
