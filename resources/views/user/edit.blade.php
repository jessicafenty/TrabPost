@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Editar Usuário
@endsection

@section('contentheader_title')
    Editar Usuário
@endsection


@section('main-content')


    @if (Session::has('mensagem'))
        <div class="alert alert-info">{{ Session::get('mensagem') }}</div>
    @endif

    @if($errors->any())
        <div class="box alert alert-danger">
            <div class="box-header with-border">
                <h3 class="box-title text-gray">Opss! Alguma coisa errada</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool"
                            data-widget="remove" data-toggle="tooltip" title="Fechar">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        </div>
    @endif



    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="col-md-12">

                <div class="box">
                    {{--<div class="box-header with-border">--}}
                        {{--<h3 class="box-title">Edição do Usuário</h3>--}}

                        {{--<div align="right"><a href="{{route('pais.create')}}" class="btn btn-success">Novo</a></div>--}}
                    {{--</div>--}}

                    <div class="box-body">

                        <form class="form-horizontal" action="{{route('usuarios.update',$usuario->id)}}" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="_method" value="PUT">


                            {{csrf_field()}}

                            <input type="hidden" value="0" name="perfil" id="perfil">



                            <div class="form-group">
                                <label for="nome" class="col-sm-2 control-label" >Nome</label>
                                <div class="col-sm-10">
                                    <input name="nome" value="{{ $usuario->name }}" type="text" class="form-control input-lg"
                                           id="nome" placeholder="Nome do Usuário" autofocus>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="sigla" class="col-sm-2 control-label" >Tipo</label>
                                <div class="col-sm-10">
                                    <select name="tipo" id="tipo" class="form-control">
                                        <option value="ADMIN" {{$usuario->type == 'ADMIN' ? "selected" : ""}}>ADMIN</option>
                                        <option value="USER" {{$usuario->type == 'USER' ? "selected" : ""}}>USER</option>

                                    </select>
                                </div>
                            </div>


                            {{--Ativo, Resp--}}



                            <div class="form-group">
                                <label for="status" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-10">
                                    <select name="ativo" id="ativo" class="form-control">
                                        <option value="1" {{$usuario->active == '1' ? "selected" : ""}}>Ativado</option>
                                        <option value="0" {{$usuario->active == '0' ? "selected" : ""}}>Desativado</option>

                                    </select>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label" >Email</label>
                                <div class="col-sm-10">
                                    <input name="email" value="{{ $usuario->email }}" type="text" class="form-control input-lg"
                                           id="email" placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSenha" class="col-sm-2 control-label">Senha</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control input-lg" id="inputSenha" name="password"
                                           value="{{$usuario->password}}" placeholder="Senha">
                                </div>
                            </div>



                            <div class="box-footer">
                                <a href="{{route('usuarios.index')}}" class="btn btn-info pull-left btn-lg">Voltar</a>
                                <button type="submit" class="btn btn-success pull-right btn-lg">
                                    Salvar</button>
                            </div>



                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection