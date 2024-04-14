@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header h4">Top100銘柄</div>
                <div class="card-body">
                    @foreach ($rankings as $ranking)
                    <div style="white-space: nowrap;">
                        <p>{{ $ranking->rank }}位: <a href="{{ route('brand.show', $ranking->brand->id) }}">{{ $ranking->brand->name }}</a> (スコア: {{ round($ranking->score, 2) }})</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
