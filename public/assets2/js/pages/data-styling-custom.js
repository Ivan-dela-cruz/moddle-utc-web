$(document).ready(function() {

    setTimeout(function() {
        // [ base style ]
        $('#base-style').DataTable( {
            "language": {
                "lengthMenu": "Ver _MENU_ por página",
                "zeroRecords": "Lo siento no se hallarón concidencias",
                "info": "Página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "search": "Buscar por:",
                "paginate": {
                    "first":      "primera",
                    "last":       "última",
                    "next":       "siguiente",
                    "previous":   "anterior"
                },
            }
        } );

        // [ no style ]
        $('#no-style').DataTable();

        // [ compact style ]
        $('#compact').DataTable();

        // [ hover style ]
        $('#table-style-hover').DataTable();

    },1000);
});

