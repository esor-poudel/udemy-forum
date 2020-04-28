@extends('layouts.app')

@section('content')

           @foreach($discussions as $d)
            <div class="card card-default">
                <div class="card-header">
                   <span> {{$d->user->name}}<b>      {{$d->created_at->diffForHumans()}}</b></span>
                    <img src="{{($d->user->avatar)}}" alt="" >
                    @if($d->hasBestAnswer())
                    <span class="btn btn float-right btn-danger btn-sm">closed</span>
                    @else
                    <span class="btn btn float-right btn-success btn-sm">open</span>
                    @endif
                    
                    
                    <a href="{{route('discussion',['slug'=>$d->slug])}}" class="btn btn-info float-right btn-sm"style="margin-right:8px;">view</a>
                </div>
                <div class="card-body">
                    
                    <h4 class="text-center">
                       <b> {{$d->title}}</b>
                    </h4>
                    <p class="text-center">
                        {{str_limit($d->content,100)}}
                    </p>
                </div>
                <div class="card-footer bg-transparent border-success">
                    <p>
                    {{$d->replies->count()}} replies
                    </p>
                   
                </div>
            </div>
           @endforeach

           <div class="text-center">{{$discussions->links()}}</div>
           
@endsection
