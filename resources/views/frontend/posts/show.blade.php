@extends('frontend.layouts.master')

@section('container')
<div class="blog">
    <div class="container">

        <!--Start breadcrumbs-->
        <ul class="tz-breadcrumbs">
            {{-- <li>
                <a href="#">Home</a>
            </li>
            <li class="current">
                Deatil post
            </li> --}}
        </ul>
        <!--End breadcrumbs-->
        <div class="blog-container">
            <div class="row">
                <div class="col-md-4">

                    <!--Blog Sidebar-->
                    <div class="blog-sidebar">
                        <aside class="widget widget_search">
                            <form class="tz-search-form">
                                <input class="needsclick" id="td-header-search" type="text" value="" name="s" autocomplete="off">
                                <button class="tz-submit" type="submit"></button>
                            </form>
                        </aside>
                        <aside class="widget widget_categories">
                            <h4 class="widget-title">DANH MUC</h4>
                            <ul>
                                @foreach ( $categories as $category  )
                                <li>
                                    <a href="">{{ $category->name }}<span>( {{ count($category->posts) }} )</span></a>
                                </li>    
                                @endforeach
                            </ul>
                        </aside>
                        
                    </div>
                    <!--End Blog Sidebar-->
                </div>
                <div class="col-md-8">

                    <!--Blog Content-->
                    <div class="row">
                        <div class="col-md-12">

                            <!--Content-->
                            <article class="single-blog">

                                <div class="thumb">
                                    <img src="{{ Illuminate\Support\Facades\Storage::disk($post->disk)->url($post->image) }}" alt="will be distracted">
                                </div>

                                <h1><a href="#">{{ $post->title }}</a></h1>
                                <span class="date">{!! date('d/m/Y', strtotime($post->created_at)) !!}</span>
                                <div class="single-content">
                                    <p>
                                        {!! $post->content !!}
                                    </p>
                                   
                                </div>

                                <div class="entry-blog-meta">
                                    <span class="author">
                                        Tác giả: 
                                        <a href="blog.html">{{ $post->user->name }}</a>
                                    </span>
                                    <span class="cats">
                                        Danh mục:
                                        <a href="blog.html">{{ $post->category->name ?? 'Chưa xác định'}}</a>
                                    </span>
                                    
                                    
                                    <span class="tags">
                                        Thẻ:
                                        @foreach ($post->tags as $tag )
                                        <a href="#">{{ $tag->name }}|</a>
                                        @endforeach
                                    </span>

                                    
                                    
                                </div>

                                <div class="entry-social">
                                    <a href="#" class="fa fa-facebook"></a>
                                    <a href="#" class="fa fa-twitter"></a>
                                    <a href="#" class="fa fa-google-plus"></a>
                                    <a href="#" class="fa fa-youtube"></a>
                                    <a href="#" class="fa fa-instagram"></a>
                                    <a href="#" class="fa fa-pinterest"></a>
                                </div>

                                {{-- <nav class="post-navigation">
                                    <a class="prev pull-left" href="single-blog.html">Bài viết trước</a>
                                    <a class="Next pull-right" href="single-blog.html">Bài viết sau</a>
                                </nav> --}}

                            </article>  
                            
                            <!--End content-->

                            <!--Comment-->
                             {{-- <div class="single-comment">
                                <div id="comments">
                                    <h2>
                                        Comments
                                        <span>Lorem Ipsum is simply : 10 Comments</span>
                                    </h2>
                                    <ol class="comments-list">

                                        <li>
                                            <div class="comment-body">
                                                <div class="comment-avatar">
                                                    <img src="/frontend/images/post-md-8.jpg" alt="Angelina Jhonson">
                                                </div>
                                                <div class="comment-block">
                                                    <div class="comment-header">
                                                        <cite class="vcard">Angelina Jhonson</cite>
                                                        <span class="comment-meta">
                                                            /
                                                            <span class="time">March 19. 2015</span>
                                                            /
                                                            <a class="reply">Reply</a>
                                                        </span>
                                                    </div>
                                                    <div class="comment-content">
                                                        <p>
                                                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <ol class="children">
                                                <li>
                                                    <div class="comment-body">
                                                        <div class="comment-avatar">
                                                            <img src="/frontend/images/say.jpg" alt="Elizabeth Bayern">
                                                        </div>
                                                        <div class="comment-block">
                                                            <div class="comment-header">
                                                                <cite class="vcard">Elizabeth Bayern</cite>
                                                                <span class="comment-meta">
                                                                    /
                                                                    <span class="time"> March 19. 2015</span>
                                                                    /
                                                                    <a class="reply">Reply</a>
                                                                </span>
                                                            </div>
                                                            <div class="comment-content">
                                                                <p>
                                                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="comment-body">
                                                        <div class="comment-avatar">
                                                            <img src="/frontend/images/post-md-8.jpg" alt="Angelina Jhonson">
                                                        </div>
                                                        <div class="comment-block">
                                                            <div class="comment-header">
                                                                <cite class="vcard">James Packer</cite>
                                                                <span class="comment-meta">
                                                                    /
                                                                    <span class="time"> March 19. 2015</span>
                                                                    /
                                                                    <a class="reply">Reply</a>
                                                                </span>
                                                            </div>
                                                            <div class="comment-content">
                                                                <p>
                                                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ol>
                                        </li>

                                        <li>
                                            <div class="comment-body">
                                                <div class="comment-avatar">
                                                    <img src="/frontend/images/post-md-8.jpg" alt="Angelina Jhonson">
                                                </div>
                                                <div class="comment-block">
                                                    <div class="comment-header">
                                                        <cite class="vcard">Jhon Bayser</cite>
                                                        <span class="comment-meta">
                                                            /
                                                            <span class="time">March 19. 2015</span>
                                                            /
                                                            <a class="reply">Reply</a>
                                                        </span>
                                                    </div>
                                                    <div class="comment-content">
                                                        <p>
                                                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                    </ol>

                                    <!--Comment form-->
                                    <div id="respond" class="comment-respond">
                                        <h3 id="reply-title" class="comment-reply-title">Leave a Reply </h3>
                                        <form id="commentform">
                                            <p class="comment-for-author">
                                                <input type="text" class="author" placeholder="Name">
                                                <i class="fa fa-user"></i>
                                            </p>
                                            <p class="comment-for-email">
                                                <input type="text" class="email" placeholder="Email">
                                                <i class="fa fa-envelope"></i>
                                            </p>
                                            <p class="comment-for-url">
                                                <input type="url" class="url" placeholder="Website">
                                                <i class="fa fa-link"></i>
                                            </p>
                                            <p class="comment-for-content">
                                                <textarea class="comment" name="comment">Comment</textarea>
                                                <i class="fa fa-comment"></i>
                                            </p>
                                            <p class="comment-for-submit">
                                                <input name="submit" type="submit" id="submit" class="submit" value="Post Comments">
                                            </p>
                                        </form>
                                    </div>
                                    <!--End comment form-->

                                </div>
                            </div>  --}}
                            <!--End comment-->

                        </div>
                    </div>
                    <!--End Blog Content-->
                </div>
            </div>
        </div>
    </div>
</div>   
@endsection
