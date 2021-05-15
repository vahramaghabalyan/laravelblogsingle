@forelse($comments as $comment)
    <div class="container-fluid">
        <div class="user-profile">
            <div class="row">
                <div class="col-sm-12" style="max-width:1000px">
                    <div class="card">
                        <div class="profile-img-style">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="media">
                                        <div class="media-body align-self-center">
                                            <h5 class="mt-0 user-name">
                                                {{$comment->author()}} <small>{{$comment->created_at->diffForHumans()}}</small>
                                                @if(config("binshopsblog.comments.ask_for_author_website") && $comment->author_website)
                                                    (<a href='{{$comment->author_website}}' target='_blank' rel='noopener'>website</a>)
                                                @endif
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 align-self-center"></div>
                            </div>
                            <hr>
                            <p>{!! nl2br(e($comment->comment))!!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@empty
    <div class='alert alert-info'>No comments yet! Why don't you be the first?</div>
@endforelse

@if(count($comments)> config("binshopsblog.comments.max_num_of_comments_to_show",500) - 1)
    <p><em>Only the first {{config("binshopsblog.comments.max_num_of_comments_to_show",500)}} comments are
            shown.</em>
    </p>
@endif

