@if(\Auth::check() && \Auth::user()->canManageBinshopsBlogPosts())
    <a href="{{$post->edit_url()}}" class="btn btn-outline-secondary btn-sm pull-right float-right">Edit Post</a>
@endif
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12" style="max-width:1000px">
            <div class="blog-single mb-5">
                <div class="blog-box blog-details">
                    {!!$post->image_tag("large", false, 'd-block mx-auto')!!}
                    <div class="blog-details">
                        <ul class="blog-social">
                            <li class="digits">{{$post->posted_at->format('m/d/Y')}}</li>
                            <li>
                                <i class="icofont icofont-user"></i>
                                @includeWhen($post->author,"binshopsblog::partials.author",['post'=>$post])
                            </li>
                        </ul>
                        <div class="single-blog-content-top">
                            <p>
                                {!! preg_replace( '#<(' . implode( '|', ['div', 'table']) . ')>.*?<\/$1>#s', '', $post->post_body_output()) !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<livewire:user.profile.author-show :userId="$post->author->id" :mode="'small'"/>
@includeWhen($post->categories,"binshopsblog::partials.categories",['post'=>$post])
