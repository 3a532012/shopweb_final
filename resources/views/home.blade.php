@extends('layout.master')
@section('title','alreadyloging')
@section('content')
    <br><br><br><br><br><br><br><br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">訊息視窗</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    歡迎登入  {{ Auth::user()->name }}
                </div>
            </div>
        </div>
    </div>
</div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection
