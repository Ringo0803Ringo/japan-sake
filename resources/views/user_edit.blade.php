@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header h4">ユーザー情報編集</div>
                <div class="card-body">
                    <form action="{{ route('user_update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <h4 class="mt-4">ユーザー名</h4>
                        <input type="text" placeholder="ユーザー名を入れてください" class="form-control" value="{{ $user->name }}">
                        <h4 class="mt-4">メールアドレス</h4>
                        <input type="text" placeholder="メールアドレスを入れてください" class="form-control" value="{{ $user->email }}">
                        <button type="submit" class="btn btn-primary btn-block mt-3 float-end">変更</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
