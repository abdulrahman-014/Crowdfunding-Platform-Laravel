@extends('layouts.app')

@section('content')

<h2 class="mb-4">

All Campaigns

</h2>

<div class="row">

@foreach($campaigns as $campaign)

<div class="col-md-4 mb-4">

<div class="card shadow">

@if($campaign->image)

<img src="{{ asset('storage/'.$campaign->image) }}"
     class="card-img-top"
     style="height:220px; object-fit:cover;">
@endif

<div class="card-body">

<h4>

{{ $campaign->title }}

</h4>

<p>

{{ Str::limit($campaign->description,100) }}

</p>

<h6>

Goal :
{{ $campaign->goal_amount }} $

</h6>

<h6>

Raised :
{{ $campaign->current_amount }} $

</h6>
@php
    $percentage = 0;

    if ($campaign->goal_amount > 0) {
        $percentage = ($campaign->current_amount / $campaign->goal_amount) * 100;
    }
@endphp

<div class="progress mb-3">
    <div
        class="progress-bar bg-success"
        role="progressbar"
        style="width: {{ min($percentage,100) }}%;"
        aria-valuenow="{{ min($percentage,100) }}"
        aria-valuemin="0"
        aria-valuemax="100">

        {{ number_format(min($percentage,100),1) }}%

    </div>
</div>

<a href="/campaigns/{{$campaign->id}}" class="btn btn-primary">

View

</a>

<a href="/campaigns/{{$campaign->id}}/edit" class="btn btn-warning">

Edit

</a>

<form action="/campaigns/{{$campaign->id}}" method="POST" class="d-inline">

@csrf
@method('DELETE')

<button class="btn btn-danger">

Delete

</button>

</form>

</div>

</div>

</div>

@endforeach

</div>

@endsection