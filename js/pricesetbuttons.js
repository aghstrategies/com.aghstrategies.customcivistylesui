CRM.$(function ($) {
  // First, fix trailing hyphens:
  $('.crm-price-amount-label').each(function () {
    var labelTextText = $(this).html();
    if (labelTextText.substring(labelTextText.length - 13, labelTextText.length) == '&nbsp;-&nbsp;') {
      $(this).html(labelTextText.slice(0, -13));
    }
  });

  $('#priceset .contribution_amount-section').addClass('featured-boxes');

  // Handle "other amount" option:
  var $otherAmountLabel = $('#priceset .contribution_amount-section .price-set-row .price-set-option-content input.crm-form-radio[value=0]')
    .siblings('label');
  $otherAmountLabel.html('<span class="crm-price-amount-amount">Other</span><span class="crm-price-amount-label" id="otheramount-wrapper">Enter the amount you would like to donate:<br/></span>');

  // Work through each price option:
  rows = $('#priceset .contribution_amount-section .price-set-row').length;
  $('#priceset .contribution_amount-section .price-set-row').each(function (index) {
    var $input = $(this).find('.price-set-option-content input.crm-form-radio');
    $(this).addClass('col-sm-6');
    if (rows == 7) {
      if (index > 3) {
        $(this).addClass('bpc-col-md-4');
      } else {
        $(this).addClass('col-md-3');
      }
    } else if (rows == 6) {
      $(this).addClass('col-md-4 col-xl-2');
    } else {
      $(this).addClass('col-md-3');
    }

    if (rows == index + 1 && rows % 2 == 1) {
      $(this).addClass('col-sm-offset-3 col-md-offset-0');
    }

    $(this).find('.price-set-option-content').addClass('featured-box featured-box-primary');
    var $label = $(this).find('.price-set-option-content label');
    $label.addClass('box-content').append($input);
    $label.prepend($label.find('.crm-price-amount-amount'));
    $(this).click(function () {
      $input.prop('checked', true);
      colorSelected();
    });
  });

  $('#otheramount-wrapper').append($('.crm-section.other_amount-section input[type="text"]'));
  $('.crm-section.other_amount-section').remove();

  // Set the boxes to have the same height:
  var maxHeight = Math.max.apply(null, $('#priceset .contribution_amount-section .price-set-row .featured-box').map(function () {
    return $(this).height();
  }).get());
  $('#priceset .contribution_amount-section .price-set-row .featured-box').each(function () {
    $(this).css('height', maxHeight);
  });

  $('#crm-container .crm-section.featured-boxes>.label>label').html('Select a <strong>Contribution Amount</strong>:');

  // Helper to set the "selected-box" class on the selected item:
  function colorSelected() {
    $('.selected-box').removeClass('selected-box');
    $('#priceset .contribution_amount-section .price-set-row .price-set-option-content input.crm-form-radio:checked').closest('.featured-box').addClass('selected-box');
  }
});
