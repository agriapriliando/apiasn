<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Data ASN Interkoneksi' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.14.9/cdn.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
</head>
<style>
    .toggle-vis.active {
        font-weight: bold;
        color: green;
    }
</style>

<body>
    {{ $slot }}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script>
        const table = new DataTable('#myTable', {
            // responsive: true,
            pagingType: "simple",
            scrollX: true,
            dom: 'Bfrtip',
            columnDefs: [{
                targets: [1, 3, 4, 6, 7, 8, 9, 10, 11, 12, 14, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25],
                visible: false
            }],
            buttons: [
                'copy',
                'csv',
                'excel',
            ]
        });
        document.querySelectorAll('a.toggle-vis').forEach((el) => {
            el.addEventListener('click', function(e) {
                e.preventDefault();

                let columnIdx = e.target.getAttribute('data-column');
                let column = table.column(columnIdx);

                // Toggle the visibility
                column.visible(!column.visible());
            });
        });
        $('a.toggle-vis').on('click', function(e) {
            e.preventDefault();
            var table = $('#example').DataTable();
            var column = table.column($(this).attr('data-column'));
            column.visible(!column.visible());

            // Toggle class aktif
            $(this).toggleClass('active');
        });
    </script>

    <script>
        function initDataTable() {
            const table = $('#myTable');

            if ($.fn.DataTable.isDataTable(table)) {
                table.DataTable().clear().destroy();
            }

            table.DataTable({
                scrollX: true,
                dom: 'Bfrtip',
                buttons: ['copy', 'excel']
            });
        }

        document.addEventListener('livewire:load', function() {
            Livewire.hook('component.initialized', (component) => {
                // Akan terpanggil saat komponen Livewire dibuat
                initDataTable(); // inisialisasi awal
            });


            // Alternatif jika render ulang tidak trigger event di atas
            Livewire.hook('message.processed', (message, component) => {
                initDataTable();
                window.addEventListener('datatable-reload', function() {
                    // Re-init setelah data diubah oleh Livewire
                    setTimeout(() => {
                        initDataTable();
                    }, 200); // kasih jeda sedikit
                });
            });
        });
    </script>


</body>

</html>
