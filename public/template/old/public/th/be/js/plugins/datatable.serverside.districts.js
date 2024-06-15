/**
 *
 * RowsServerSide
 *
 * Interface.Plugins.Datatables.RowsServerSide page content scripts. Initialized from scripts.js file.
 *
 *
 */

class RowsServerSide {
  constructor() {
    if (!jQuery().DataTable) {
      console.log('DataTable is null!');
      return;
    }

    // Datatable instance
    this._datatable;

    // Edit or add state of the modal
    this._currentState;

    // Controls and select helper
    this._datatableExtend;

    // Datatable single item height
    this._staticHeight = 62;

    this._createInstance();
    this._extend();
  }

  // Creating datatable instance
  _createInstance() {
    const _this = this;
    this._datatable = jQuery('#datatableRowsServerSide').DataTable({
      scrollX: true,
      buttons: ['copy', 'excel', 'csv', 'print'],
      info: true,
      processing: true,
      serverSide: true,
      ajax: '/webadmin/master/zone/districts/json',
      sDom: '<"row"<"col-sm-12"<"table-container"t>r>><"row"<"col-12"p>>', // Hiding all other dom elements except table and pagination
      pageLength: 10,
      columns: [
          {data: 'id'}, 
          {data: 'nameupper'},
          {data: 'regency_name'},
          {data: 'province_name'},
          {data: 'action',orderable:false,serachable:false,},
      ],
      language: {
        paginate: {
          previous: '<i class="cs-chevron-left"></i>',
          next: '<i class="cs-chevron-right"></i>',
        },
      },

    });
  }
  _extend() {
    this._datatableExtend = new DatatableExtend({
      datatable: this._datatable,
    });
  }
}
