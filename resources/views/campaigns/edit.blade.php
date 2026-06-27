@extends('layouts.app')

@section('content')

<div class="card shadow">

    <div class="card-header bg-warning">
        <h3>Edit Campaign</h3>
    </div>

    <div class="card-body">

        <form action="{{ route('campaigns.update',$campaign->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Title</label>

                <input
                    type="text"
                    name="title"
                    class="form-control"
                    value="{{ old('title',$campaign->title) }}"
                >

            </div>

            <div class="mb-3">

                <label>Description</label>

                <textarea
                    name="description"
                    class="form-control"
                    rows="5"
                >{{ old('description',$campaign->description) }}</textarea>

            </div>

            <div class="mb-3">

                <label>Goal Amount</label>

                <input
                    type="number"
                    name="goal_amount"
                    class="form-control"
                    value="{{ old('goal_amount',$campaign->goal_amount) }}"
                >

            </div>

            <div class="mb-3">

                <label>Deadline</label>

                <input
                    type="date"
                    name="deadline"
                    class="form-control"
                    value="{{ $campaign->deadline }}"
                >

            </div>

            @if($campaign->image)

                <img
                    src="{{ asset('storage/'.$campaign->image) }}"
                    width="250"
                    class="mb-3 rounded"
                >

            @endif

            <div class="mb-3">

                <label>New Image</label>

                <input
                    type="file"
                    name="image"
                    class="form-control"
                >

            </div>

            <button class="btn btn-success">

                Update Campaign

            </button>

        </form>

    </div>

</div>

@endsection