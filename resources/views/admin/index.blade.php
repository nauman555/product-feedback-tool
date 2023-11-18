<!-- resources/views/admin/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
      

        @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


        <h3>Registered Users</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action / Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form action="{{ route('admin.destroy_user', ['id' => $user->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
</svg></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Feedback Items</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Feedback Submitted By</th>
                    <th>Action / Delete</th>
                    <th> Enable / Disable Comments </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($feedbackItems as $feedback)
                    <tr>
                        <td>{{ $feedback->title }}</td>
                        <td>{{ $feedback->category }}</td>
                        <td>{{ $feedback->user->name }}</td>
                        <td>
                            <form action="{{ route('admin.destroy_feedback', ['id' => $feedback->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
</svg></button>
                            </form>
                        </td>
                        <td>
                        @if ($feedback->comments_enabled)
                        <form method="post" action="{{ route('admin.feedback.disable-comments', ['id' => $feedback->id]) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger btn-sm">Disable</button>
                        </form>
                    @else
                        <form method="post" action="{{ route('admin.feedback.enable-comments', ['id' => $feedback->id]) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success btn-sm">Enable</button>
                        </form>
                    @endif
                        </td>
      
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
