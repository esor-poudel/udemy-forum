@extends('layouts.app')

@section('content')

            <div class="card">
                <div class="card-header text-center">Edit Reply:</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('replys.update',['id'=>$reply->id])}}" method="post">

                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="content">leave a reply..</label>
                        <textarea name="content"  id="content" cols="30" rows="10" class="form-control">{{str_limit($reply->content,75)}}</textarea>
                    </div>
                        <div class="form-group">
                            <button class="btn btn-success float-right" type="submit">update reply</button>
                        </div>
                    </form>
                </div>
            </div>
        <
@endsection
