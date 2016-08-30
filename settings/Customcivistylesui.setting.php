<?php
/**
 * @file
 * Settings metadata for com.aghstrategies.customcivistylesui.
 * Copyright (C) 2016, AGH Strategies, LLC <info@aghstrategies.com>
 * Licensed under the GNU Affero Public License 3.0 (see LICENSE.txt)
 */


return array(
  'customcivistylesui_pricesetbuttonpages' => array(
    'group_name' => 'Custom Styling for Civi Contribution Pages',
    'group' => 'customcivistylesui',
    'name' => 'customcivistylesui_pricesetbuttonpages',
    'type' => 'Array',
    'default' => NULL,
    'add' => '4.6',
    'is_domain' => 1,
    'is_contact' => 0,
    'description' => 'Array of Pages to apply price set buttons styling to',
    'help_text' => 'civicontribute page(s) for which pricesets should be displayed as styled buttons',
  ),
  'customcivistylesui_responsive' => array(
    'group_name' => 'Custom Styling for Civi Contribution Pages',
    'group' => 'customcivistylesui',
    'name' => 'customcivistylesui_responsive',
    'type' => 'String',
    'default' => NULL,
    'add' => '4.6',
    'is_domain' => 1,
    'is_contact' => 0,
    'description' => 'This enables a stylesheet that makes lables be displayed over inputs on small screens',
    'help_text' => 'Sunlight Foundation API Key',
  ),
  'customcivistylesui_responsive' => array(
    'group_name' => 'Custom Styling for Civi Contribution Pages',
    'group' => 'customcivistylesui',
    'name' => 'statelegemail_stateconfig',
    'type' => 'Array',
    'default' => NULL,
    'add' => '4.6',
    'is_domain' => 1,
    'is_contact' => 0,
    'description' => 'Array of details about state legislators',
    'help_text' => 'State details',
  ),
);
