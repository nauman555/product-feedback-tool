<!-- resources/views/feedback/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Submit Feedback</h2>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('feedback.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <!-- <div class="form-group">
                <label for="category">Category</label>
                <input type="text" class="form-control" id="category" name="category" required>
            </div> -->
            <div class="form-group">
        <label for="category">Category:</label>
        <select id="category" name="category" class="form-control">
            @foreach($categories as $category)
                <option value="{{ $category }}">{{ $category }}</option>
            @endforeach
        </select>
    </div>
            <button type="submit" class="btn btn-primary">Submit Feedback</button>
        </form>
    </div>
@endsection
