@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Blogs</div>

                    <div class="panel-body">
                        @if(count($blogs))

                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($blogs as $blog)
                                    <tr>
                                        <td> {{ $blog->title }} </td>
                                        <td> {{ $blog->user->name }} </td>
                                        <td>
                                            {{ Form::open( ['url' => route('blogs.show', ['blog' => $blog->id]),
                                            'method' => 'get']) }}
                                            {{ Form::submit('View', ['class' => 'btn btn-sm btn-primary']) }}
                                            {{ Form::close() }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            {{ $blogs->links() }}

                        @else

                            <div class="alert alert-danger">There are no blogs!</div>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
