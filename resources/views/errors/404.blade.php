@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header h4">404 Not Found</div>
                <div class="card-body">
                   <p>指定されたページが見つかりません。</p>
                   <a href="{{ route('top') }}">トップページへ</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection