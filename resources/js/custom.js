import '../../vendor/masmerise/livewire-toaster/resources/js';
$.fn.dataTable.ext.errMode = 'throw'; //Disable Error Alert Popup
$(document).ready( function () {
    $('.datatable').DataTable({
        paging: false,
    });
} );

$(document).ready( function () {
    $('#orders-datatable').DataTable({
        paging: false,
        order: [[0, 'desc']],
        columnDefs: [
            { orderable: false, targets: 6}
        ]
    });
} );
