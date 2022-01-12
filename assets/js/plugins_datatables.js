$(function() {
    // datatables
    altair_datatables.dt_tableExport();
});

altair_datatables = {
    dt_tableExport: function() {
        var $dt_tableExport = $('#dt_tableExport'),
            $dt_buttons = $dt_tableExport.prev('.dt_colVis_buttons');

        if($dt_tableExport.length) {
            var table_export = $dt_tableExport.DataTable({
                buttons: [
                    {
                        extend:    'copyHtml5',
                        text:      '<i class="uk-icon-files-o"></i> Copy',
                        titleAttr: 'Copy'
                    },
                    {
                        extend:    'print',
                        text:      '<i class="uk-icon-print"></i> Print',
                        titleAttr: 'Print'
                    },
                    {
                        extend:    'excelHtml5',
                        text:      '<i class="uk-icon-file-excel-o"></i> XLSX',
                        titleAttr: ''
                    },
                    {
                        extend:    'csvHtml5',
                        text:      '<i class="uk-icon-file-text-o"></i> CSV',
                        titleAttr: 'CSV'
                    },
                    {
                        extend:    'pdfHtml5',
                        text:      '<i class="uk-icon-file-pdf-o"></i> PDF',
                        titleAttr: 'PDF'
                    }
                ]
            });

            table_export.buttons().container().appendTo( $dt_buttons );

        }
    }
};