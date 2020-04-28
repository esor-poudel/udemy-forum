@extends('layouts.app')

@section('content')

            <div class="card">
                <div class="card-header text-center">Edit discussion: <h5>{{$discussion->title}}</h5></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('discussions.update',['id'=>$discussion->id])}}" method="post">

                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="content">Ask a question</label>
                        <textarea name="content"  id="content" cols="30" rows="10" class="form-control">{{$discussion->content}}</textarea>
                    </div>
                        <div class="form-group">
                            <button class="btn btn-success float-right" type="submit">update discussion</button>
                        </div>
                    </form>
                </div>
            </div>
        <
@endsection
