@extends('layouts.app')

@section('content')

<div class="card card-default">
                <div class="card-header">
                   <span> {{$d->user->name}}<b>      {{$d->created_at->diffForHumans()}}</b>  ({{$d->user->points}})</span>
                    <img src="{{($d->user->avatar)}}" alt="" >
                    @if($d->hasBestAnswer())
                    <span class="btn btn float-right btn-danger btn-sm">closed</span>
                    @else
                    <span class="btn btn float-right btn-success btn-sm">open</span>
                    @endif
                    @if(Auth::id()==$d->user->id)
                    @if(!$d->hasBestAnswer())
                    <a href="{{route('discussion.edit',['slug'=>$d->slug])}}" class="btn btn-info float-right btn-sm"style="margin-right:8px;">edit</a>
                    @endif
                    @endif
                    
                    @if($d->is_being_watched_by_auth_user())
                    
                    <a href="{{route('discussion.unwatch',['id'=>$d->id])}}" class="btn btn-info float-right btn-sm"style="margin-right:8px;">unwatch</a>
                    @else
                    <a href="{{route('discussion.watch',['id'=>$d->id])}}" class="btn btn-info float-right btn-sm"style="margin-right:8px;">watch</a>
                    @endif
                </div>
                <div class="card-body">
                    
                    <h4 class="text-center">
                       <b> {{$d->title}}</b>
                    </h4>
                    <p class="text-center">
                        {{($d->content)}}
                    </p>
                    <hr><br><br>
                    @if($best_answer)
                        <div class="text-center" style="padding: 40px">
                        <h3 class="text-center">BEST ANSWER</h3>
                        <div class="card bg-light mb-3">
                        <div class="card-heading">
                        <span> {{$best_answer->user->name}}  ({{$best_answer->user->points}})</span>
                        </div>
                        <div class="card-body">
                        {{($best_answer->content)}}
                        </div>
                        </div>
                        </div>
                 
                     @endif

                </div>
                <div class="card-footer bg-transparent border-success">
                <span>
                    {{$d->replies->count()}} replies
                    </span>
                    <a href="{{route('channel',['slug'=>$d->channel->slug])}}" class="float-right btn btn-default">{{$d->channel->title}}</a>
                   
                </div>
            </div>
                    <br><br>@if($d->replies->count()>0)<h4>Replies</h4>@endif
            @foreach($d->replies as $r)
                            
                <div class="card card-default">
                <div class="card-header">
                   <span> {{$r->user->name}}<b>      {{$r->created_at->diffForHumans()}}  ({{$r->user->points}})</b></span>
                  
                
                    <img src="{{($r->user->avatar)}}" alt="" >
                </div>
                <div class="card-body">
                    <p class="text-center">
                        {{($r->content)}}
                    </p>
                </div>
                <div class="card-footer bg-transparent border-success">
                  @if($r->is_liked_by_auth_user())
                    <a href="{{route('reply.unlike',['id'=>$r->id])}}" class="btn btn-danger btn-sm">unlike <span class="badge">{{$r->likes->count()}}</span></a>
                  @else
                  <a href="{{route('reply.like',['id'=>$r->id])}}" class="btn btn-success btn-sm">Like <span class="badge">{{$r->likes->count()}}</span> </a>
                  @endif
                  @if(!$best_answer)
                 @if(Auth::id()==$d->user->id)
                 <a href="{{route('discussion.best.answer',['id'=>$r->id])}}"class="btn btn-info btn-sm btn float-right">mark as best answer</a>
                


                 @endif
                @endif
                @if(Auth::id()==$r->user->id)
                @if(!$best_answer)
                <a href="{{route('replys.edit',['id'=>$r->id])}}"class="btn btn-danger btn-sm btn float-right"style="margin-right:8px;">edit</a>
                @endif
                @endif
               
                 
                </div>
            </div>
            @endforeach

            <div class="card card-default">
                <div class="card-body">
                   @if(Auth::check())
                   <form action="{{route('discussions.reply',['id'=>$d->id])}}" method="post">
                        {{csrf_field()}}
                        <label for="reply">leave a reply...</label>
                        <div class="form-group">
                            <textarea name="reply" id="reply" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn float-right">leave a reply</button>
                        </div>
                    </form>

                   @else

                    <div class="text-center"><h2>Sign in to leave reply</h2></div>
                   @endif
                </div>
            </div>
        
@endsection

