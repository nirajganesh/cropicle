

    $('.order-dt').DataTable( {
        dom: 'Bflrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, ':visible' ]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            // {
            //     text: 'JSON',
            //     action: function ( e, dt, button, config ) {
            //         var data = dt.buttons.exportData();

            //         $.fn.dataTable.fileSave(
            //             new Blob( [ JSON.stringify( data ) ] ),
            //             'Export.json'
            //         );
            //     }
            // },
            {
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            }
        ],
        "ordering": true,
        order: [[ 0, "desc" ]]
    });
    

    $('.payment-dt').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, ':visible' ]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            // {
            //     text: 'JSON',
            //     action: function ( e, dt, button, config ) {
            //         var data = dt.buttons.exportData();

            //         $.fn.dataTable.fileSave(
            //             new Blob( [ JSON.stringify( data ) ] ),
            //             'Export.json'
            //         );
            //     }
            // },
            {
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            }
        ]
    });


    $('.report-dt').DataTable( {
        dom: 'flBrtip',
        select: true,
        buttons: [
            {
                extend: 'print',
                // autoPrint: false,
                exportOptions: {
                    columns: ':visible',
                    stripHtml: false
                },
                customize: function ( win ) {
                    $(win.document.body).find( 'h1' ).addClass( 'text-center mb-3' ).css( 'font-size', '18px' );
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: ':visible',
                    stripHtml: false,
                    stripNewlines: false
                }
            },
            {
                text:'Colums',
                extend: 'colvis',
                exportOptions: {
                    columns: ':visible'
                } 
            }
        ]
    });

    
    $('.recent-dt').DataTable( {
        dom: 'rtip',
        buttons: [
            {
                extend: 'print',
                exportOptions: {
                    columns: ':visible',
                    stripHtml: false
                },
                text: 'Export'
            }
        ]
    });
