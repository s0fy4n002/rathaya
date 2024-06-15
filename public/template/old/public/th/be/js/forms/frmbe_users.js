/**
 *
 * FormValidation
 *
 * Interface.Forms.Validation page content scripts. Initialized from scripts.js file.
 *
 *
 */

class FormValidation {
  constructor() {
    // Initialization of the page plugins
    if (!jQuery().validate) {
      console.log('validate is undefined!');
      return;
    }

    this._initBasicForm();
  }

  // Basic form initialization
  _initBasicForm() {
    // SELECT2 : <select id="cboUserStatus">
    if (jQuery().select2) {
      jQuery('#cboUserStatus').select2({minimumResultsForSearch: Infinity, placeholder: 'Pilih Status'});
    }
    if (jQuery().select2) {
      jQuery('#cboPhoneStatus').select2({minimumResultsForSearch: Infinity, placeholder: 'Pilih Status'});
    }
    if (jQuery().select2) {
      jQuery('#cboProfileStatus').select2({minimumResultsForSearch: Infinity, placeholder: 'Pilih Status'});
    }

    // TAGS : <input class="form-control" id="tagBasic" />
    if (typeof Tagify !== 'undefined') {
      if (document.querySelector('#tagBasic') !== null) {
        new Tagify(document.querySelector('#tagBasic'));
      }
    }

    // DATE PICKER : <input type="text" class="form-control date-picker" id="datePickerBasic" />
    if (jQuery().datepicker) {
      jQuery('#datePickerBasic').datepicker({
        autoclose: true,
      });
    }
    
    // Form validation
    jQuery('#frmUser').validate();
  }
  
}
