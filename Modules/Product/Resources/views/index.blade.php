@extends('product::layouts.master')

@section('content')
    <h2>Listar Produtos</h2>

    @include('product::_partials.alert-success')
    <div id="mensagem" class="w-100"></div>

    <div class="float-right mb-3">
        <a href="{{ route('produtos.create') }}" class="btn btn-sm btn-success">Cadastrar Produto</a>
    </div>
    <table class="mb-0 table data-table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Ativo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <!--Import jQuery before export.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>


    <!--Data Table-->
    <script type="text/javascript" src=" https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src=" https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            var table = $('.data-table').DataTable({
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "Não encontrou nenhum resultado",
                    "sEmptyTable": "Nenhum dado dispovível nessa tabela",
                    "sInfo": "Mostrando registros de _START_ a _END_ de um total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros de 0 a 0 de um total de 0 registros",
                    "sInfoFiltered": "(filtrado de um total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Carregando...",
                    "oPaginate": {
                        "sFirst": "Primeiro",
                        "sLast": "Último",
                        "sNext": "Próximo",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Ativar para ordenar columna ascendente",
                        "sSortDescending": ": Ativar para ordenar columna descendente"
                    }
                },
                processing: true,
                serverSide: true,
                ajax: "{{ url('produtos') }}",
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'active',
                        name: 'active'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });

        $('body').on('click', '#delete', function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            $.ajax({
                method: 'DELETE',
                url: "produtos/excluir/" + id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                success: function(data) {
                    $('#mensagem').addClass('alert alert-success').text(data.message)
                    var oTable = $('.data-table').dataTable();
                    oTable.fnDraw(false);
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });

    </script>
@endsection
