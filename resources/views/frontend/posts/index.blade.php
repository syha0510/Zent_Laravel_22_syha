@extends('frontend.layouts.master')

@section('container')

<div class="blog">
    <div class="container">
        <ul class="tz-breadcrumbs">
            <li>
                <a href="#">Home</a>
            </li>
            <li class="current">
                Category
            </li>
        </ul>
        <div class="blog-container">
            <div class="row">
                <div class="col-md-8">

                    <!--Blog Content-->
                    <div class="row tz-blog-content">
                        <div class="col-md-12">
                            <article class="blog-item blog-heading">
                                <div class="thumb">
                                    <img src="{{ Illuminate\Support\Facades\Storage::disk($newpost->disk)->url($newpost->image) }}" alt="will be distracted">
                                </div>
                                <div class="blog-info">
                                    <h3><a href="{{ route('frontend.posts.show',$newpost->slug) }}">{{ $newpost->title }}</a></h3>
                                    <span class="entry-meta">{!! date('d/m/Y', strtotime($newpost->created_at)) !!}</span>
                                    <p>
                                        {!! $newpost->content !!}
                                    </p>
                                    <a class="continue" href="{{ route('frontend.posts.show',$newpost->slug) }}">Xem thêm...</a>
                                </div>
                            </article>
                        </div>  
                        @foreach ( $posts as $post )
                        <div class="col-md-6 col-sm-6">
                            <article class="blog-item">
                                <div class="thumb">
                                    <img src="/frontend/images/post-lg-1.jpg" alt="Room Post Format with Beautiful Water Nature">
                                </div>
                                <div class="blog-info">
                                    <h3><a href="{{ route('frontend.posts.show', $post->slug) }}">{{ $post->title }}</a></h3>
                                    <span class="entry-meta">{!! date('d/m/Y', strtotime($post->created_at)) !!}</span>
                                    <p>
                                       {!! $post->content !!} 
                                    </p>
                                    <a class="continue" href="{{ route('frontend.posts.show',$post->slug) }}">Xem thêm...</a>
                                </div>
                            </article>
                        </div>   
                        @endforeach
                        
                    </div>
                    <!--End Blog Content-->

                    <nav>
                        {!! $posts->appends(request()->input())->links() !!}
                    </nav>
                </div>
                <div class="col-md-4">

                    <!--Blog Sidebar-->
                    <div class="blog-sidebar blog-right-sidebar" style="height: 2174px;">
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
            </div>
        </div>
    </div>
</div>

@endsection