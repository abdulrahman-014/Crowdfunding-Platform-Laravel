@extends('layouts.app')

@section('content')

<div class="card shadow">

    <div class="card-header bg-primary text-white">
        <h3>Add New Campaign</h3>
    </div>

    <div class="card-body">

        <form action="{{ route('campaigns.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label class="form-label">Title</label>

                <input
                    type="text"
                    name="title"
                    class="form-control"
                    value="{{ old('title') }}"
                >

                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Description</label>

                <textarea
                    name="description"
                    class="form-control"
                    rows="5"
                >{{ old('description') }}</textarea>

                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Goal Amount</label>

                <input
                    type="number"
                    name="goal_amount"
                    class="form-control"
                    value="{{ old('goal_amount') }}"
                >

                @error('goal_amount')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Deadline</label>

                <input
                    type="date"
                    name="deadline"
                    class="form-control"
                >

                @error('deadline')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Image</label>

                <input
                    type="file"
                    name="image"
                    class="form-control"
                >

                @error('image')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-success">
                Save Campaign
            </button>

        </form>

    </div>

</div>

@endsection