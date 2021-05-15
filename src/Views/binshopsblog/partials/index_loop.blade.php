<div class="card w-100">
    <div class="blog-box blog-list row">
        <div class="col-sm-4">{!! $post->image_tag("medium", true, 'img-fluid sm-100-w') !!}</div>
        <div class="col-sm-8">
            <div class="blog-details">
                <div class="blog-date digits"><span></span>{{ $post->posted_at->format('m/d/Y') }}</div>
                <h6><a href="{{$post->url()}}">{{ $post->title }}</a></h6>
                <div class="blog-bottom-content">
                    <ul class="blog-social">
                        <li>by: <a href="{{ route('binshopsblog.view_author', ['author_id' => $post->author->id]) }}">{{ $post->author->name }}</a></li>
                    </ul>
                    <hr>
                    <p class="mt-0">{{mb_strimwidth(strip_tags($post->post_body_output()), 0, 400, "...")}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
