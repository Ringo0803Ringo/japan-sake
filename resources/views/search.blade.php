@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header h4">銘柄検索</div>
                <div class="card-body">
                    <form action="{{ route('search') }}" method="GET">
                        <input type="text" name="keyword" placeholder="銘柄を入力してください" class="form-control">
                        <button class="btn btn-success float-end mt-1" type="submit">検索<i class="fa-solid fa-magnifying-glass ms-1"></i></button>
                    </form>
                </div>
            </div>
            <div class="card mt-3 bottom-space">
                <div class="card-header h4">銘柄一覧</div>
                <div class="card-body">
                    @foreach ($brands as $brand)
                    <li><a href="{{ route('brand.show', $brand->id) }}">{{ $brand->name }}</a></li>
                    @endforeach
                    <ul class="pagination pagination-sm mt-3">{{ $brands->links() }}</ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection