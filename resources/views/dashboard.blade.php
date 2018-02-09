@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Dashboard
@endsection

@section('contentheader_title')

@endsection

@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                {{--@if((Auth::user()->ativo))--}}

                {{--<h1>Bem Vindo</h1>--}}

                {{--@else--}}

                <div class="row">

                    <div class="panel panel-default">
                        <div class="panel-body">

                        <h1 align="center"><b>Posts</b>Management</h1>


                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

