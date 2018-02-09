@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Editar Post
@endsection

@section('contentheader_title')
    Editar Post
@endsection


@section('main-content')

    {{--@if(\Illuminate\Support\Facades\Session::has('mensagem'))--}}
    {{--<div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('mensagem')}}</div>--}}
    {{--@endif--}}

    @if (Session::get('fail'))
        <div class="alert alert-info">{{ Session::get('fail') }}</div>
    @endif

    {{--@if(Session::get('fail'))--}}
    {{--{{Session::get('fail')}}--}}
    {{--@endif--}}


    @if (session('alert'))
        <div class="alert alert-success">
            {{ session('alert') }}
        </div>
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


                    <div class="box-body">

                        <form class="form-horizontal" action="{{route('posts.update',$post->id)}}" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="_method" value="PUT">

                            {{csrf_field()}}



                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label" >Título</label>
                                <div class="col-sm-10">
                                    <input name="title" value="{{ $post->title }}" type="text" class="form-control input-lg"
                                           id="title" placeholder="Título do Post" autofocus>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="conteudo" class="col-sm-2 control-label" >Conteúdo</label>
                                <div class="col-sm-10">
                                    <input name="conteudo" value="{{$post->content}}" type="text" class="form-control input-lg"
                                           id="conteudo" placeholder="Conteúdo" autofocus>
                                </div>
                            </div>



                            <div class="box-footer">
                                <button type="submit" class="btn btn-success pull-right btn-lg">
                                    Salvar</button>
                                <a href="{{route('posts.index')}}" class="btn btn-info pull-left btn-lg">Voltar</a>
                            </div>



                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

