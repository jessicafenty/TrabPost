@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Login
@endsection

<style>
    body {
        background: #eee !important;
    }

    .wrapper {
        margin-top: 80px;
        margin-bottom: 80px;
    }

    .form-signin {
        max-width: 380px;
        padding: 15px 35px 45px;
        margin: 0 auto;
        background-color: #fff;
        border: 1px solid rgba(0, 0, 0, 0.1);
    }

    p {
        text-align: center;
    }
    .form-signin .botaoEntrar {
        margin-top: 25px;
    }
    .form-signin .form-control {
        position: relative;
        font-size: 16px;
        height: auto;
        padding: 10px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    .form-signin .form-control:focus {
        z-index: 2;
    }
    .form-signin input[type="text"] {
        margin-bottom: -1px;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }
    .form-signin input[type="password"] {
        margin-bottom: 20px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
    .mensagemErro{
        color: red;
    }
</style>

@section('content')

<div class="wrapper">

    <form class="form-signin" action="{{route('login.attempt')}}" method="post">
        {{--@if (Session::get('mensagem'))--}}
            {{--<div>--}}
                {{--<div class="box danger alert-danger">--}}
                    {{--<div class="box-header with-border">--}}
                        {{--<h3 class="box-title" style="color:white">{{Session::get('mensagem')}}</h3>--}}
                        {{--<div class="box-tools pull-right">--}}
                            {{--<button type="button" class="btn btn-box-tool"--}}
                                    {{--data-widget="remove" data-toggle="tooltip" title="Fechar">--}}
                                {{--<i class="fa fa-times"></i>--}}
                            {{--</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--@endif--}}
        @if (Session::get('mensagemOK'))
            <div>
                <div class="box success alert-success">
                    <div class="box-header with-border">
                        <h3 class="box-title" style="color:white">{{Session::get('mensagemOK')}}</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool"
                                    data-widget="remove" data-toggle="tooltip" title="Fechar">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="login-logo">
            <a href="{{ url('/') }}"><b>Posts</b>Management</a>
        </div><!-- /.login-logo -->
        {{--<h2 class="form-signin-heading">Please login</h2>--}}
        <p class="category text-center mensagemErro">
            @foreach($errors->all() as $error)
                {{$error}}<br>
            @endforeach
            @if(Session::get('fail'))
                {{Session::get('fail')}}
            @endif
        </p>
        <input type="text" class="form-control" id="inputEmail" name="email" placeholder="Email" required="" autofocus="" />
        <input type="password" class="form-control" name="password" placeholder="Senha" required=""/>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="remember">Relembrar senha
            </label>
        </div>
        <p><a href="{{route('password.request')}}" id="linkSenha">Esqueci minha senha</a></p>
        <button class="btn btn-lg btn-primary btn-block botaoEntrar" type="submit">Login</button>
    </form>
    {{--<div class="modal fade modal-danger" id="myModal" role="dialog">--}}
        {{--<div class="modal-dialog">--}}
            {{--<div class="modal-content">--}}

                {{--<div class="modal-header" style="text-align: left">--}}
                    {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                    {{--<h4 class="modal-title"> Recuperação de Senha </h4>--}}
                {{--</div>--}}

                {{--<div class="modal-body text-center">--}}
                    {{--<p>Favor preencher o campo email e repetir operação!</p>--}}
                {{--</div>--}}

                {{--<div class="modal-footer">--}}
                    {{--<button class="btn btn-default" type="button" data-dismiss="modal">Cancelar</button>--}}
                {{--</div>--}}

            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
</div>
@include('adminlte::layouts.partials.scripts_auth')
@endsection
