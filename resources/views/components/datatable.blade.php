@push('components-css')
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.dataTables.min.css" rel="stylesheet">
    <style>
        .selected {
            background-color: #14A2B8 !important;
            color: #FFF;
        }

        .page-item.active .page-link {
            background-color: #14A2B8;
            border-color: #14A2B8;
        }

        .page-link {
            color: #14A2B8;
        }

        .page-link:hover {
            color: #0f798a;
        }
    </style>
@endpush

<div>
    <table class="table table-bordered data-table table-striped" id="{{ $id }}">
        <thead>
            <tr id="">
                @foreach ($headers as $item)
                    <th>{{$item}}</th>
                @endforeach
            </tr>
        </thead>

        <tbody>
        </tbody>
    </table>
</div>

@push('components-js')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>

    <script type="text/javascript">
    var table;
        $(document).ready(function () {
            table = $('#{{ $id }}').DataTable({
                processing: true,
                serverSide: true,
                select: 'single',
                language: {
                    sProcessing: `Procesando... <br>
                        <img src=\"{{ asset('dataTable/img/loading_bar.gif') }}\" alt='animated' />`,
                    url: 'js/json/datatable.es.json',
                },
                fixedHeader: {
                    headerOffset: {{ $headerOffset }}
                },
                ajax: "{!! route($route) !!}",
                columns: @json($columns)
            });
        });

    </script>

@endpush