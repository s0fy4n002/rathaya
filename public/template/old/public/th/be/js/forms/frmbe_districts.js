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

  // Basic validation
  _initBasicForm() {
    // Form validation
    jQuery('#frmPermission').validate();
    jQuery('#select2Regencies').select2({placeholder: ''});
  }
}
