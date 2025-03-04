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
      ajax: '/webadmin/master/zone/provinces/json',
      sDom: '<"row"<"col-sm-12"<"table-container"t>r>><"row"<"col-12"p>>', // Hiding all other dom elements except table and pagination
      pageLength: 10,
      columns: [
          {data: 'id'}, 
          {data: 'nameupper'},
          {data: 'short'},
          {data: 'f_pg'},
          {data: 'action',orderable:false,serachable:false,},
      ],
      language: {
        paginate: {
          previous: '<i class="cs-chevron-left"></i>',
          next: '<i class="cs-chevron-right"></i>',
        },
      },
      columnDefs: [
        // Adding Tag content as a span with a badge class
        {
          targets: 3,
          render: function (data, type, row, meta) {
            return  (row.f_pg == '1') ? '<span class="badge bg-success text-uppercase">PG</span>' : '';
          },
        },
      ],

    });
  }
  _extend() {
    this._datatableExtend = new DatatableExtend({
      datatable: this._datatable,
    });
  }
}
