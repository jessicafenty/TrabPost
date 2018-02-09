@extends('adminlte::layouts.app')


@section('htmlheader_title')
    Exibir Posts
@endsection

@section('contentheader_title')
    Exibir Posts
@endsection


@section('main-content')

    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="col-md-12">

                <div class="box">
                    {{--<div class="box-header with-border">--}}
                        {{--<h3 class="box-title">Post</h3>--}}

                        {{--<div align="right"><a href="{{route('posts.index')}}" class="btn btn-info">Voltar</a></div>--}}

                    {{--</div>--}}

                    <div class="box-body">


                        <p><strong><h2>Post do usuário: {{$post->user->name}}</h2></strong></p><br>
                        <p><strong>Título : {{$post->title}}</strong></p><br>
                        <p><strong>Conteúdo : {{$post->content}}</strong></p><br>



                    </div>
                    <div class="box-footer">
                        <a href="{{route('posts.index')}}" class="btn btn-info pull-right btn-lg">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection