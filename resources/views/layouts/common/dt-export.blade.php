<script type="text/javascript">
    $(document).ready(function() {
        $('.datatable').DataTable({
            "pagingType": "full_numbers",
            dom: 'Bfrti',
            responsive: true,
            "bSort": false,
            "bPaginate": false,
            "paging": false,
            "bInfo" : false,
            "bFilter": {{ isset($filter) ? $filter : true }},
            "buttons": [
                {
                    extend: 'excelHtml5',
                    title: "{{ $heading }}",
                    exportOptions: {
                        columns: [ {{ $columns }} ]
                    }
                },
                {
                    extend: 'print',
                    title: "{{ $heading }}",
                    exportOptions: {
                        columns: [ {{ $columns }} ],
                        modifier: {
                            page: 'current'
                        }
                    }
                }
            ]
        });
    });
</script>