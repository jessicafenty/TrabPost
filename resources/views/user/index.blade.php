@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Usuários
@endsection

@section('contentheader_title')
    Usuários
@endsection


@section('main-content')



    @if (Session::get('fail'))
        <div class="box alert alert-danger">
            <div class="box-header with-border">
                <h3 class="box-title text-gray">Atenção</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool"
                            data-widget="remove" data-toggle="tooltip" title="Fechar">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            </div>
        </div>
    @endif


    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="col-md-12">

                <div class="box">
                    <div class="box-header with-border">
                        <div align="left"><a href="{{route('usuarios.create')}}" class="btn btn-small btn-success col-md-12">Novo</a></div>
                    </div>

                    <div class="box-body">

                        <table class="table table-bordered table-striped" id="tabCoordenacoes">
                            <thead>
                            <tr>
                                <td class="col-md-5"><strong>Nome</strong></td>
                                <td class="col-md-2"><strong>Ativo</strong></td>
                                <td class="col-mb-4" align="center"><strong>Ações</strong></td>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($usuarios as $u)
                                <tr align="center">
                                    <td align="left">{{ $u->name }}</td>
                                    <td align="left">{{$u->active ? 'Sim' : 'Não'}}</td>
                                    <td>
                                        <a class="btn btn-small btn-info" href="{{route('usuarios.show',$u->id)}}" >
                                            <i class="fa fa-search-plus"></i>
                                            Detalhes
                                        </a>

                                        <a class="btn btn-small btn-warning" href="{{route('usuarios.edit',$u->id)}}" >
                                            <i class="fa fa-pencil-square-o"></i>
                                            Editar
                                        </a>
                                        <a data-toggle="modal" href="#myModal{{$u->id}}" class="btn btn-small btn-danger">
                                            <i class="fa fa-trash-o"></i>
                                            Excluir
                                        </a>
                                        <div class="modal fade modal-danger" id="myModal{{$u->id}}" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <div class="modal-header" style="text-align: left">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"> Excluir Usuário </h4>
                                                    </div>

                                                    <div class="modal-body text-center">
                                                        <p>Deseja realmente excluir o Usuário {{$u->name}}?</p>
                                                    </div>

                                                    <div class="modal-footer">
                                                        {!! Form::open(array('route' => array('usuarios.destroy', $u->id), 'method' => 'delete')) !!}
                                                        {!! csrf_field() !!}
                                                        <button class="btn btn-danger" type="submit">Excluir</button>
                                                        <button class="btn btn-default" type="button" data-dismiss="modal">Cancelar</button>
                                                        {!! Form::close() !!}
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{--<div class="text-center">--}}
                        {{--{!! $coordenacoes->links() !!}--}}
                        {{--</div>--}}


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection




@section('scriptlocal')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#tabCoordenacoes').DataTable( {
                "language": {
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Próxima"
                    },
                    "sSearch": "<span>Pesquisar</span> _INPUT_", //search
                    "lengthMenu": "Exibir _MENU_ registros por página",
                    "zeroRecords": "Não há resultados para esta busca",
                    "info": "Exibindo página _PAGE_ de _PAGES_",
                    "infoEmpty": "Nenhum registro disponível",
                    "infoFiltered": "(Filtrado de _MAX_ registros)"

                }
            } );
        })
    </script>
@endsection