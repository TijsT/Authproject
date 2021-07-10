@extends('template')
@section('content')
    @if (Auth::user())

        <div class="row mt-5 mb-5">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>Create New Post</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-secondary" href="{{ route('posts.index') }}"> Back</a>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
            </div>
        @endif

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Title:</strong>
                        <input type="text" name="title" class="form-control" placeholder="fill in your title here (use letters only)">
                        <span class="text-danger">
                            @if ($errors->has('title'))
                                <div class="error">{{ $errors->first('title') }}</div>
                            @endif
                        </span>

                    </div>
                </div>
                

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Content:</strong>
                        <textarea class="form-control" style="height:150px" name="content"
                            placeholder="add content in this textarea"></textarea>
                        <span class="text-danger">
                            @if ($errors->has('content'))
                                <div class="error">{{ $errors->first('content') }}</div>
                            @endif
                        </span>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>

    @else
        <br>
        <a class="btn btn-success" href="{{ route('login') }}">Login</a>
    @endif
@endsection
