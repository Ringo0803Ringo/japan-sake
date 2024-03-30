@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="mt-3 mb-4">{{ $brand->name }}</h2>
                <p>酒造：{{ $brand->brewery->name }}</p>
                <p>産地：{{ $brand->brewery->area->name }}</p>

                @foreach ($brand->flavor_tags as $flavorTag)
                        <p>風味：{{ $flavorTag->tag->tag }}</p>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
