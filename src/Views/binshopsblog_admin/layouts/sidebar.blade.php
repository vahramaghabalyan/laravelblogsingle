<ul class="list-group">
    <li class="list-group-item list-group-color justify-content-between lh-condensed">
        <div>
            <h6 class="my-0"><a href="{{ route('binshopsblog.admin.index') }}">Dashboard</a>
                <span class="text-muted">(<?php
                    $categoryCount = \BinshopsBlog\Models\BinshopsBlogPost::count();

                    echo $categoryCount . " " . str_plural("Post", $categoryCount);

                    ?>)</span>
            </h6>
            <small class="text-muted">Overview of your posts</small>

            <div class="list-group ">

                <a href='{{ route('binshopsblog.admin.index') }}'
                   class='list-group-item list-group-color list-group-item list-group-color-action @if(\Request::route()->getName() === 'binshopsblog.admin.index') active @endif  '><i
                            class="fa fa-th fa-fw"
                            aria-hidden="true"></i>
                    All Posts</a>
                <a href='{{ route('binshopsblog.admin.create_post') }}'
                   class='list-group-item list-group-color list-group-item list-group-color-action  @if(\Request::route()->getName() === 'binshopsblog.admin.create_post') active @endif  '><i
                            class="fa fa-plus fa-fw" aria-hidden="true"></i>
                    Add Post</a>
            </div>
        </div>
    </li>


    <li class="list-group-item list-group-color justify-content-between lh-condensed">
        <div>
            <h6 class="my-0"><a href="{{ route('binshopsblog.admin.comments.index') }}">Comments</a>

                <span class="text-muted">(<?php
                    $commentCount = \BinshopsBlog\Models\BinshopsBlogComment::withoutGlobalScopes()->count();

                    echo $commentCount . " " . str_plural("Comment", $commentCount);

                    ?>)</span>
            </h6>
            <small class="text-muted">Manage your comments</small>

            <div class="list-group ">
                <a href='{{ route('binshopsblog.admin.comments.index') }}'
                   class='list-group-item list-group-color list-group-item list-group-color-action  @if(\Request::route()->getName() === 'binshopsblog.admin.comments.index' && !\Request::get("waiting_for_approval")) active @endif   '><i
                            class="fa  fa-fw fa-comments" aria-hidden="true"></i>
                    All Comments</a>


                <?php $comment_approval_count = \BinshopsBlog\Models\BinshopsBlogComment::withoutGlobalScopes()->where("approved", false)->count(); ?>

                <a href='{{ route('binshopsblog.admin.comments.index') }}?waiting_for_approval=true'
                   class='list-group-item list-group-color list-group-item list-group-color-action  @if(\Request::route()->getName() === 'binshopsblog.admin.comments.index' && \Request::get("waiting_for_approval")) active @elseif($comment_approval_count>0) list-group-item list-group-color-warning @endif  '><i
                            class="fa  fa-fw fa-comments" aria-hidden="true"></i>
                    {{ $comment_approval_count }}
                    Waiting for approval </a>

            </div>
        </div>
    </li>


    <li class="list-group-item list-group-color  justify-content-between lh-condensed">
        <div>
            <h6 class="my-0"><a href="{{ route('binshopsblog.admin.categories.index') }}">Categories</a>
                <span class="text-muted">(<?php
                    $postCount = \BinshopsBlog\Models\BinshopsBlogCategory::count();
                    echo $postCount . " " . str_plural("Category", $postCount);
                    ?>)</span>
            </h6>


            <small class="text-muted">Blog post categories</small>

            <div class="list-group ">
                <a href='{{ route('binshopsblog.admin.categories.index') }}'
                   class='list-group-item list-group-color list-group-item list-group-color-action  @if(\Request::route()->getName() === 'binshopsblog.admin.categories.index') active @endif  '><i
                            class="fa fa-object-group fa-fw" aria-hidden="true"></i>
                    All Categories</a>
                <a href='{{ route('binshopsblog.admin.categories.create_category') }}'
                   class='list-group-item list-group-color list-group-item list-group-color-action  @if(\Request::route()->getName() === 'binshopsblog.admin.categories.create_category') active @endif  '><i
                            class="fa fa-plus fa-fw" aria-hidden="true"></i>
                    Add Category</a>
            </div>
        </div>

    </li>

    @if(config("binshopsblog.image_upload_enabled"))
        <li class="list-group-item list-group-color  justify-content-between lh-condensed">
            <div>
                <h6 class="my-0"><a href="{{ route('binshopsblog.admin.images.upload') }}">Upload images</a></h6>
                <div class="list-group ">
                    <a href='{{ route('binshopsblog.admin.images.all') }}'
                       class='list-group-item list-group-color list-group-item list-group-color-action  @if(\Request::route()->getName() === 'binshopsblog.admin.images.all') active @endif  '><i
                                class="fa fa-picture-o fa-fw" aria-hidden="true"></i>
                        View All</a>

                    <a href='{{ route('binshopsblog.admin.images.upload') }}'
                       class='list-group-item list-group-color list-group-item list-group-color-action  @if(\Request::route()->getName() === 'binshopsblog.admin.images.upload') active @endif  '><i
                                class="fa fa-upload fa-fw" aria-hidden="true"></i>
                        Upload</a>
                </div>
            </div>
        </li>
    @endif
    <li class="list-group-item list-group-color  justify-content-between lh-condensed">
        <div>
            <h6 class="my-0"><a href="{{ route('binshopsblog.admin.edit_profile') }}">User Profile</a></h6>
            <div class="list-group ">
                <a href='{{ route('binshopsblog.admin.edit_profile') }}' class='list-group-item list-group-color list-group-item list-group-color-action
                    @if(\Request::route()->getName() === 'binshopsblog.admin.edit_profile') active @endif  '>
                    <i class="fa fa-user-o fa-fw" aria-hidden="true"></i>
                    Update author data</a>

            </div>
        </div>
    </li>
</ul>
