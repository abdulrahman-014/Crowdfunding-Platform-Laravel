@extends('layouts.app')

@section('content')

<div class="row">

<div class="col-md-8">

<div class="card shadow">

@if($campaign->image)

<img src="{{ asset('storage/'.$campaign->image) }}"
class="card-img-top">

@endif

<div class="card-body">

<h2>

{{ $campaign->title }}

</h2>

<p>

{{ $campaign->description }}

</p>

<hr>

<h4>

Goal :

{{ $campaign->goal_amount }} $

</h4>

<h4>

Raised :

{{ $campaign->current_amount }} $

</h4>

<h4>

Deadline :

{{ $campaign->deadline }}

</h4>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card shadow">

<div class="card-header bg-success text-white">

Donate

</div>

<div class="card-body">

<form action="/campaigns/{{$campaign->id}}/donate" method="POST">

@csrf

<div class="mb-3">

<label>Your Name</label>

<input
type="text"
name="donor_name"
class="form-control">

</div>

<div class="mb-3">

<label>Amount</label>

<input
type="number"
name="amount"
class="form-control">

</div>

<button class="btn btn-success w-100">

Donate

</button>

</form>

</div>

</div>

</div>

</div>

@endsection

<hr>

<h3>Recent Donations</h3>

<table class="table table-bordered">

    <thead class="table-dark">

        <tr>

            <th>Donor</th>

            <th>Amount</th>

        </tr>

    </thead>

    <tbody>

    @forelse($donations as $donation)

        <tr>

            <td>{{ $donation->donor_name }}</td>

            <td>${{ $donation->amount }}</td>

        </tr>

    @empty

        <tr>

            <td colspan="2" class="text-center">

                No Donations Yet

            </td>

        </tr>

    @endforelse

    </tbody>

</table>