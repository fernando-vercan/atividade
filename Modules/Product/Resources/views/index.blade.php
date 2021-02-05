@extends('product::layouts.master')

@section('content')
    <h2>Listar Produtos</h2>

    @include('product::_partials.alert-success')
    <span id="mensagem" class="w-100"></span>

    <div class="float-right">
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
