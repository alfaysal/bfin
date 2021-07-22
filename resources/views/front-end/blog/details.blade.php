@extends('front-end.master')

@section('title')
    <title>BFIN Blog Details</title>
@endsection


@section('content')
        <div class="container mt-5">
            <div class="row">
                @foreach($blog_details as $blog_detail)
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">{{ $blog_detail->title }}</h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Posted on <strong>{{ Carbon\Carbon::parse($blog_detail->created_at)->format('Y-m-d') }}</strong>  by <strong>{{ $blog_detail->name }}</strong> </div>
                        </header>
                        <figure class="mb-4"><img class="img-fluid rounded" src="{{ asset($blog_detail->image) }}" alt="..." /></figure>
                        <section class="mb-5">
                           {{ $blog_detail->body }}
                        </section>
                    </article>

                    @if(Auth::guard('web')->check())
                        <section class="mb-5">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <!-- Comment form-->
                                    <form class="mb-4" action="{{ route('add_comment') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $blog_detail->id }}">
                                        <textarea name="comments" class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea>
                                        <input type="submit" style="float:right;" class="btn btn-primary mt-2" name="add comment" value="submit">
                                    </form>
                                    @foreach($comments as $comment)
                                    <div class="d-flex mb-4 mt-4">
                                        <!-- Parent comment-->
                                        <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                        <div class="ms-3">
                                            <div class="fw-bold">{{ $comment->name }}</div>
                                           {{ $comment->comments }}
                                            
                                            @foreach($comment_replies as $reply)

                                            @if($reply->comment_id == $comment->id)
                                            <div class="d-flex mt-4">
                                                <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                                <div class="ms-3">
                                                    <div class="fw-bold">{{ $reply->name }}</div>
                                                    {{ $reply->reply }}
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach

                                            <button style="float:right" class="btn btn-primary btn-sm" onclick="appendReplyForm({{ $comment->id }})">reply</button>
                                            <form action="{{ route('reply_save') }}" method="POST" >
                                                @csrf
                                                
                                                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                                <div id="reply_form{{$comment->id}}">  
                                                </div>
                                                
                                            </form>
                                        </div>

                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    @endif
                </div>
                @endforeach
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                            </div>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">Web Design</a></li>
                                        <li><a href="#!">HTML</a></li>
                                        <li><a href="#!">Freebies</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">JavaScript</a></li>
                                        <li><a href="#!">CSS</a></li>
                                        <li><a href="#!">Tutorials</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('js')
    <script type="text/javascript">
        function appendReplyForm(id) {
            var append_id = '#reply_form'+id
            var html = ''

            html = '<textarea class="form-control" name="reply" rows="2"></textarea><input style="float:right" type="submit" value="submit" name="submit" class="btn btn-sm btn-success">'
            $(append_id).html(html)
        }
    </script>
@endsection





