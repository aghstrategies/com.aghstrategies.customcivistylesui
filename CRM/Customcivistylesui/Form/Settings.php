<?php
/**
 * @file
 * Admin form.
 *
 * Copyright (C) 2016, AGH Strategies, LLC <info@aghstrategies.com>
 * Licensed under the GNU Affero Public License 3.0 (see LICENSE.txt)
 */
require_once 'CRM/Core/Form.php';
/**
 * Administrative settings for the extension.
 */
class CRM_Customcivistylesui_Form_Settings extends CRM_Core_Form {
  /**
   * Build the form.
   */
  public function buildQuickForm() {
    $this->addSelect('pricesetbuttonpages', array(
      'entity' => 'Contribution',
      'field' => 'contribution_page_id',
      'multiple' => TRUE,
      'label' => ts('Contribution Pages', array('domain' => 'com.aghstrategies.customcivistylesui')),
      'placeholder' => ts('- any -', array('domain' => 'com.aghstrategies.customcivistylesui')),
    ));
    $this->addButtons(array(
      array(
        'type' => 'submit',
        'name' => ts('Save', array('domain' => 'com.aghstrategies.customcivistylesui')),
        'isDefault' => TRUE,
      ),
    ));
    // Send element names to the form.
    $this->assign('elementNames', array('pricesetbuttonpages'));
    // Set Defaults
    $defaults = array();
    try {
      $existingSetting = civicrm_api3('Setting', 'get', array(
        'sequential' => 1,
        'return' => "customcivistylesui_pricesetbuttonpages",
      ));
    }
    catch (CiviCRM_API3_Exception $e) {
      $error = $e->getMessage();
      CRM_Core_Error::debug_log_message(t('API Error: %1', array(1 => $error, 'domain' => 'com.aghstrategies.customcivistylesui')));
    }
    // TODO Get default working
    // $defaults['pricesetbuttonpages'] = $existingSetting['values'][0]['pricesetbuttonpages'];
    $defaults['pricesetbuttonpages'] = $existingSetting['values'][0]['customcivistylesui_pricesetbuttonpages'];

    $this->setDefaults($defaults);
    parent::buildQuickForm();
  }

  /**
   * Save values.
   */
  public function postProcess() {
    $values = $this->exportValues();
    try {
      $result = civicrm_api3('Setting', 'create', array('customcivistylesui_pricesetbuttonpages' => $values['pricesetbuttonpages']));
      CRM_Core_Session::setStatus(ts('You have successfully updated the civicontribution pages to style the price set as buttons.', array('domain' => 'com.aghstrategies.customcivistylesui')), 'Settings saved', 'success');
    }
    catch (CiviCRM_API3_Exception $e) {
      $error = $e->getMessage();
      CRM_Core_Error::debug_log_message(t('API Error: %1', array(1 => $error, 'domain' => 'com.aghstrategies.customcivistylesui')));
      CRM_Core_Session::setStatus(ts('Error saving pages for priceset buttons', array('domain' => 'com.aghstrategies.customcivistylesui')), 'Error', 'error');
    }
    parent::postProcess();
  }

}
