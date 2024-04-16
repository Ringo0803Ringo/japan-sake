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
                    <a href="{{ route('user_edit', $user->id) }}" class="btn btn-primary float-end">ユーザー情報編集</a>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header h4">お気に入り登録した銘柄</div>
                <div class="card-body">
                    @foreach ($user->favorites as $favorite)
                    <li><a href="{{ route('brand.show', $favorite->brand->id) }}">{{ $favorite->brand->name }}</a></li>
                    @endforeach
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header h4">レビューした銘柄</div>
                <div class="card-body">
                    @foreach ($user->reviews as $review)
                    <li><a href="{{ route('review_show', $review->id) }}">{{ $review->brand->name }}</a></li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
