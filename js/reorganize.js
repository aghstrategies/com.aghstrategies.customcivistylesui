CRM.$(function ($) {
  $('div#intro_text').insertBefore('div.crm-contribution-main-form-block');
 
   var other = $('.price-set-row input[value="0"]').attr('id');
   console.log(other);
   // $('.other_amount-section').insertAfter('.price-set-row label[for="' + other + '"]');
   $('label[for="' + other + '"]').hide();

  $('.other_amount-section').insertAfter('.price-set-row:last');
  
  // other amount
  $('.other_amount-content input').attr('placeholder', '$0.00');
});
