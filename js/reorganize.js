CRM.$(function ($) {

  // other amount
  var other = $('.price-set-row input[value="0"]').attr('id');
  console.log(other);
  // $('.other_amount-section').insertAfter('.price-set-row label[for="' + other + '"]');
  $('label[for="' + other + '"]').hide();
  $('.other_amount-content input').attr('placeholder', 'Other');
});
