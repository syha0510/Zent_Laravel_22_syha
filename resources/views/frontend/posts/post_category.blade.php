@extends('frontend.layouts.master')

@section('container')
    

<div class="blog">
    <div class="container">
        <ul class="tz-breadcrumbs">
            {{-- <li>
                <a href="#">Home</a>
            </li>
            <li class="current">
                Post-Category
            </li> --}}
        </ul>
        <div class="blog-container">
            <div class="row">
                <div class="col-md-4">

                    <!--Blog Sidebar-->
                    <div class="blog-sidebar" style="height: 2174px;">
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
                    <div class="row tz-blog-content">
                        @foreach ( $postcates->posts as $postcate )
                        <div class="col-md-6 col-sm-6">
                            <article class="blog-item">
                                <div class="thumb">
                                    <img style="width:350px;height:350px;" src="{{ Illuminate\Support\Facades\Storage::disk($postcate->disk)->url($postcate->image) }}" alt="Room Post Format with Beautiful">
                                </div>
                                <div class="blog-info">
                                    <h3><a href="{{ route('frontend.posts.show',$postcate->slug) }}">{{ $postcate->title }}</a></h3>
                                    <span class="entry-meta">{!! date('d/m/Y', strtotime($postcate->created_at)) !!}</span>
                                    <p>
                                        {!! $postcate->content !!}
                                    </p>
                                    <a class="continue" href="{{ route('frontend.posts.show',$postcate->slug) }}">Xem thêm...</a>
                                </div>
                            </article>
                        </div> 
                        @endforeach
                        
                       
                    </div>
                    <!--End Blog Content-->

                    
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="container">
    <ul class="tz-partners owl-carousel owl-theme" style="opacity: 1; display: block;">
        <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 4680px; left: 0px; display: block;"><div class="owl-item" style="width: 195px;"><li>
            <a href="#">
                <img src="/frontend/images/anh2.jpg" alt="partner">
            </a>
        </li></div><div class="owl-item" style="width: 195px;"><li>
            <a href="#">
                <img src="/frontend/images/anh2.jpg" alt="partner">
            </a>
        </li></div><div class="owl-item" style="width: 195px;"><li>
            <a href="#">
                <img src="/frontend/images/partner3.jpg" alt="partner">
            </a>
        </li></div><div class="owl-item" style="width: 195px;"><li>
            <a href="#">
                <img src="/frontend/images/partner4.jpg" alt="partner">
            </a>
        </li></div><div class="owl-item" style="width: 195px;"><li>
            <a href="#">
                <img src="/frontend/images/partner5.jpg" alt="partner">
            </a>
        </li></div><div class="owl-item" style="width: 195px;"><li>
            <a href="#">
                <img src="/frontend/images/partner6.jpg" alt="partner">
            </a>
        </li></div><div class="owl-item" style="width: 195px;"><li>
            <a href="#">
                <img src="/frontend/images/partner1.jpg" alt="partner">
            </a>
        </li></div><div class="owl-item" style="width: 195px;"><li>
            <a href="#">
                <img src="/frontend/images/partner2.jpg" alt="partner">
            </a>
        </li></div><div class="owl-item" style="width: 195px;"><li>
            <a href="#">
                <img src="/frontend/images/partner5.jpg" alt="partner">
            </a>
        </li></div><div class="owl-item" style="width: 195px;"><li>
            <a href="#">
                <img src="/frontend/images/partner3.jpg" alt="partner">
            </a>
        </li></div><div class="owl-item" style="width: 195px;"><li>
            <a href="#">
                <img src="/frontend/images/partner4.jpg" alt="partner">
            </a>
        </li></div><div class="owl-item" style="width: 195px;"><li>
            <a href="#">
                <img src="/frontend/images/partner6.jpg" alt="partner">
            </a>
        </li>
    </div>
</div> --}}
</div>
      
            
    </ul>
</div>

@endsection