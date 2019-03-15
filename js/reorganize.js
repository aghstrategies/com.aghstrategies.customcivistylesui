CRM.$(function ($) {
  // $('div.other_amount-content input').wrap("<div class='dollaSign'></div>");
  // $('div.dollaSign').appendTo($('div.price-set-row.contribution_amount-row5'));
  $('div.crm-contribution-main-form-block').wrapInner('<div class="half">');
  $('div#intro_text').insertBefore('.half').addClass('half');
  $('div.messages').insertBefore('div#intro_text');
  $('div.content.other_amount-content').appendTo('span.price-set-option-content:last label');

  // Move intro text to be its own block so we can float it to the left
  // $('div#intro_text').insertBefore('div.crm-contribution-main-form-block');
  // $('header.entry-header h2').prependTo('div#intro_text');
});
