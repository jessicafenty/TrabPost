@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Exibir Usuário
@endsection

@section('contentheader_title')
    Exibir Usuário
@endsection


@section('main-content')

    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <div class="box">



                        {{--<div align="right"><a href="{{route('pais.create')}}" class="btn btn-success">Novo</a></div>--}}


                    <div class="box-body">


                        <p><strong><h2>Nome : {{$usuario->name}}</h2></strong></p><br>
                        <p><strong>Email : {{$usuario->email}}</strong></p><br>
                        <p><strong>Tipo : {{$usuario->type}}</strong></p><br>
                        <p><strong>Ativo : {{$usuario->active ? 'Sim' : 'Não'}}</strong></p><br>



                    </div>
                    <div class="box-footer">
                        <a href="{{route('usuarios.index')}}" class="btn btn-info pull-right btn-lg">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection