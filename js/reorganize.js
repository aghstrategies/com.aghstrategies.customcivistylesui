CRM.$(function ($) {
  $('div.crm-contribution-main-form-block').wrapInner('<div class="half">');
  $('div#intro_text').insertBefore('.half').addClass('half');
  $('div.messages').insertBefore('div#intro_text');
});
