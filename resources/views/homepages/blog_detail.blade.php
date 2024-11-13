@extends('home.layouts.app')
@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('blog')}}">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$getBlog->title}}</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    @php
                        $getImage = $getBlog->getImageSingle($getBlog->id);
                    @endphp
                    <article class="entry single-entry">
                        <figure class="entry-media">
                            @if(!empty($getImage) && !empty($getImage->getImage()))
                                <img src="{{$getImage->getImage()}}" alt="image desc">
                            @endif
                        </figure><!-- End .entry-media -->

                        <div class="entry-body">
                            <div class="entry-meta">
                                <a href="#">{{date('M d, Y', strtotime($getBlog->created_at))}}</a>
                                <span class="meta-separator">|</span>
                                <a href="#">0 Comments</a>
                            </div><!-- End .entry-meta -->

                            <h2 class="entry-title">
                                {{$getBlog->title}}
                            </h2><!-- End .entry-title -->


                            <div class="entry-content editor-content">
                                {!! $getBlog->blog_content !!}
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->


                    <div class="related-posts">
                        <h3 class="title">Related Posts</h3><!-- End .title -->

                        <div class="owl-carousel owl-simple" data-toggle="owl" 
                            data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":1
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    }
                                }
                            }'>
                            <article class="entry entry-grid">
                                <figure class="entry-media">
                                    <a href="single.html">
                                        <img src="assets/images/blog/grid/3cols/post-1.jpg" alt="image desc">
                                    </a>
                                </figure><!-- End .entry-media -->

                                <div class="entry-body">
                                    <div class="entry-meta">
                                        <a href="#">Nov 22, 2018</a>
                                        <span class="meta-separator">|</span>
                                        <a href="#">2 Comments</a>
                                    </div><!-- End .entry-meta -->

                                    <h2 class="entry-title">
                                        <a href="single.html">Cras ornare tristique elit.</a>
                                    </h2><!-- End .entry-title -->

                                    <div class="entry-cats">
                                        in <a href="#">Lifestyle</a>,
                                        <a href="#">Shopping</a>
                                    </div><!-- End .entry-cats -->
                                </div><!-- End .entry-body -->
                            </article><!-- End .entry -->

                            <article class="entry entry-grid">
                                <figure class="entry-media">
                                    <a href="single.html">
                                        <img src="assets/images/blog/grid/3cols/post-2.jpg" alt="image desc">
                                    </a>
                                </figure><!-- End .entry-media -->

                                <div class="entry-body">
                                    <div class="entry-meta">
                                        <a href="#">Nov 21, 2018</a>
                                        <span class="meta-separator">|</span>
                                        <a href="#">0 Comments</a>
                                    </div><!-- End .entry-meta -->

                                    <h2 class="entry-title">
                                        <a href="single.html">Vivamus ntulla necante.</a>
                                    </h2><!-- End .entry-title -->

                                    <div class="entry-cats">
                                        in <a href="#">Lifestyle</a>
                                    </div><!-- End .entry-cats -->
                                </div><!-- End .entry-body -->
                            </article><!-- End .entry -->

                            <article class="entry entry-grid">
                                <figure class="entry-media">
                                    <a href="single.html">
                                        <img src="assets/images/blog/grid/3cols/post-3.jpg" alt="image desc">
                                    </a>
                                </figure><!-- End .entry-media -->

                                <div class="entry-body">
                                    <div class="entry-meta">
                                        <a href="#">Nov 18, 2018</a>
                                        <span class="meta-separator">|</span>
                                        <a href="#">3 Comments</a>
                                    </div><!-- End .entry-meta -->

                                    <h2 class="entry-title">
                                        <a href="single.html">Utaliquam sollicitudin leo.</a>
                                    </h2><!-- End .entry-title -->

                                    <div class="entry-cats">
                                        in <a href="#">Fashion</a>,
                                        <a href="#">Lifestyle</a>
                                    </div><!-- End .entry-cats -->
                                </div><!-- End .entry-body -->
                            </article><!-- End .entry -->

                            <article class="entry entry-grid">
                                <figure class="entry-media">
                                    <a href="single.html">
                                        <img src="assets/images/blog/grid/3cols/post-4.jpg" alt="image desc">
                                    </a>
                                </figure><!-- End .entry-media -->

                                <div class="entry-body">
                                    <div class="entry-meta">
                                        <a href="#">Nov 15, 2018</a>
                                        <span class="meta-separator">|</span>
                                        <a href="#">4 Comments</a>
                                    </div><!-- End .entry-meta -->

                                    <h2 class="entry-title">
                                        <a href="single.html">Fusce pellentesque suscipit.</a>
                                    </h2><!-- End .entry-title -->

                                    <div class="entry-cats">
                                        in <a href="#">Travel</a>
                                    </div><!-- End .entry-cats -->
                                </div><!-- End .entry-body -->
                            </article><!-- End .entry -->
                        </div><!-- End .owl-carousel -->
                    </div><!-- End .related-posts -->

                    <div class="comments">
                        <h3 class="title">3 Comments</h3><!-- End .title -->

                        <ul>
                            <li>
                                <div class="comment">
                                    <figure class="comment-media">
                                        <a href="#">
                                            <img src="assets/images/blog/comments/1.jpg" alt="User name">
                                        </a>
                                    </figure>

                                    <div class="comment-body">
                                        <a href="#" class="comment-reply">Reply</a>
                                        <div class="comment-user">
                                            <h4><a href="#">Jimmy Pearson</a></h4>
                                            <span class="comment-date">November 9, 2018 at 2:19 pm</span>
                                        </div><!-- End .comment-user -->

                                        <div class="comment-content">
                                            <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti. </p>
                                        </div><!-- End .comment-content -->
                                    </div><!-- End .comment-body -->
                                </div><!-- End .comment -->

                                <ul>
                                    <li>
                                        <div class="comment">
                                            <figure class="comment-media">
                                                <a href="#">
                                                    <img src="assets/images/blog/comments/2.jpg" alt="User name">
                                                </a>
                                            </figure>

                                            <div class="comment-body">
                                                <a href="#" class="comment-reply">Reply</a>
                                                <div class="comment-user">
                                                    <h4><a href="#">Lena  Knight</a></h4>
                                                    <span class="comment-date">November 9, 2018 at 2:19 pm</span>
                                                </div><!-- End .comment-user -->

                                                <div class="comment-content">
                                                    <p>Morbi interdum mollis sapien. Sed ac risus.</p>
                                                </div><!-- End .comment-content -->
                                            </div><!-- End .comment-body -->
                                        </div><!-- End .comment -->
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <div class="comment">
                                    <figure class="comment-media">
                                        <a href="#">
                                            <img src="assets/images/blog/comments/3.jpg" alt="User name">
                                        </a>
                                    </figure>

                                    <div class="comment-body">
                                        <a href="#" class="comment-reply">Reply</a>
                                        <div class="comment-user">
                                            <h4><a href="#">Johnathan Castillo</a></h4>
                                            <span class="comment-date">November 9, 2018 at 2:19 pm</span>
                                        </div><!-- End .comment-user -->

                                        <div class="comment-content">
                                            <p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>
                                        </div><!-- End .comment-content -->
                                    </div><!-- End .comment-body -->
                                </div><!-- End .comment -->
                            </li>
                        </ul>
                    </div><!-- End .comments -->
                    <div class="reply">
                        <div class="heading">
                            <h3 class="title">Leave A Reply</h3><!-- End .title -->
                            <p class="title-desc">Your email address will not be published. Required fields are marked *</p>
                        </div><!-- End .heading -->

                        <form action="#">
                            <label for="reply-message" class="sr-only">Comment</label>
                            <textarea name="reply-message" id="reply-message" cols="30" rows="4" class="form-control" required placeholder="Comment *"></textarea>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="reply-name" class="sr-only">Name</label>
                                    <input type="text" class="form-control" id="reply-name" name="reply-name" required placeholder="Name *">
                                </div><!-- End .col-md-6 -->

                                <div class="col-md-6">
                                    <label for="reply-email" class="sr-only">Email</label>
                                    <input type="email" class="form-control" id="reply-email" name="reply-email" required placeholder="Email *">
                                </div><!-- End .col-md-6 -->
                            </div><!-- End .row -->

                            <button type="submit" class="btn btn-outline-primary-2">
                                <span>POST COMMENT</span>
                                <i class="icon-long-arrow-right"></i>
                            </button>
                        </form>
                    </div><!-- End .reply -->
                </div><!-- End .col-lg-9 -->

                <aside class="col-lg-3">
                    <div class="sidebar">

                        <div class="widget widget-cats">
                            <h3 class="widget-title">Categories</h3><!-- End .widget-title -->

                            <ul>
                                @foreach($getBlogCategory as $category)
                                <li><a href="{{url('/blog/category/'.$category->slug)}}">{{$category->name}}<span>{{$category->getCountBlog()}}</span></a></li>
                                @endforeach
                            </ul>
                        </div><!-- End .widget -->
                        <div class="widget">
                            <h3 class="widget-title">Popular Posts</h3><!-- End .widget-title -->

                            <ul class="posts-list">
                                @foreach ($getPopular as $popular)
                                <li>
                                    <figure>
                                        @php
                                            $getImage = $popular->getImageSingle($popular->id);
                                        @endphp
                                        <a href="#">
                                            <img src="{{$getImage->getImage()}}" alt="post">
                                        </a>
                                    </figure>

                                    <div>
                                        <span>{{date('M d, Y', strtotime($popular->created_at))}}</span>
                                        <h4><a href="{{url('blog/'.$popular->slug)}}">{{$popular->title}}</a></h4>
                                    </div>
                                </li>
                                @endforeach
                            </ul><!-- End .posts-list -->
                        </div><!-- End .widget -->

                        <div class="widget">

                    </div><!-- End .sidebar sidebar-shop -->
                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection