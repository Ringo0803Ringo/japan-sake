@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="mt-3 mb-4">{{ $brand->name }}</h2>
                <p>酒造：<a href="{{ route('brewery_search', ['breweryId' => $brand->brewery->id]) }}">{{ $brand->brewery->name }}</a></p>
                <p>産地：<a href="{{ route('area_search', ['areaId' => $brand->brewery->area->id]) }}">{{ $brand->brewery->area->name }}</a></p>

                @foreach ($brand->flavor_tags as $flavorTag)

                @if($flavorTag->tag)
                <p>風味：<a href="{{ route('flavor_search', ['flavorId' => $flavorTag->tag->id]) }}">{{ $flavorTag->tag->tag }}</a></p>
                @else
                <p>風味：情報なし</p>
                @endif  

                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
