CRM.$(function ($) {
  $('div.crm-contribution-main-form-block').wrapInner('<div class="half">');
  $('div#intro_text').insertBefore('.half').addClass('half');
  $('div.messages').insertBefore('div#intro_text');
 
  // other amount
  var other = $('.price-set-row input[value="0"]').attr('id');
  console.log(other);
  $('.other_amount-section').insertAfter('.price-set-row label[for="' + other + '"]');
});
