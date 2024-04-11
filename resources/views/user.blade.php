@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header h4">ユーザー情報</div>
                <div class="card-body">
                    <p>ユーザー名：{{ $user->name }}</p>
                    <p>メールアドレス：{{ $user->email }}</p>
                </div>
            </div>
            <a href="{{ route('user_edit', $user->id) }}" class="btn btn-primary mt-3 h4 float-end">ユーザー情報編集</a>
        </div>
    </div>
</div>

@endsection
