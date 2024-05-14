@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header h4"><a href="{{ route('brand.show', $photo->brand->id) }}">{{ $photo->brand->name }}</a>の画像データ</div>
                <div class="card-body">
                    <img src="data:image/jpeg;base64,{{ $photo->filename }}" alt="Uploaded Image" width="300" height="300"> 
                    <form action="{{ route('photo_destroy', $photo->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-block mt-3 float-end" onclick='return confirm("本当に削除しますか？")'>画像削除</button>
                    </form>               
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
