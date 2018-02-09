@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Posts
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
    Detalhes Post
@stop


@section('main-content')

    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Post</h3>

                        <div align="right"><a href="{{route('posts.index')}}" class="btn btn-info">Voltar</a></div>

                    </div>

                    <div class="box-body">


                        <p><strong><h2>Titulo : {{$post->title}}</h2></strong></p><br>
                        <p><strong>conteudo : {{$post->content}}</strong></p><br>



                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection