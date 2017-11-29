@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Blog</div>

                    <div class="panel-body">

                        {{ Form::open( ['url' => route('blogs.store'),
                        'method' => 'store', 'class' => 'form']) }}
                            <div class="form-group">
                                {{ Form::label('', 'Title', ['class' => 'control-label']) }}
                                {{ Form::text('title', null, ['class' => 'form-control', 'required' => true]) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('', 'Body', ['class' => 'control-label']) }}
                                {{ Form::textarea('body', null, ['class' => 'form-control', 'required' => true]) }}
                            </div>
                            {{ Form::submit('Create', ['class' => 'btn btn-sm btn-primary']) }}
                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
