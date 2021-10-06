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
                                    <img src="/frontend/images/parallax.jpg" alt="will be distracted">
                                </div>
                                <div class="blog-info">
                                    <h3><a href="{{ route('frontend.posts.show') }}">It is a long established fact that a reader will be distracted</a></h3>
                                    <span class="entry-meta">Posted at March 19. 2015</span>
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                        when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                    </p>
                                    <a class="continue" href="single-blog.html">Continue Reading</a>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <article class="blog-item">
                                <div class="thumb">
                                    <img src="/frontend/images/post-lg-1.jpg" alt="Room Post Format with Beautiful Water Nature">
                                </div>
                                <div class="blog-info">
                                    <h3><a href="{{ route('frontend.posts.show') }}">Room Post Format with Beautiful</a></h3>
                                    <span class="entry-meta">Posted at March 19. 2015</span>
                                    <p>
                                        Excellence is never an accident. It is always the result of high intention and intelligent execution; it represents the wise choice of many alternatives.
                                    </p>
                                    <a class="continue" href="single-blog.html">Continue Reading</a>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <article class="blog-item">
                                <div class="thumb">
                                    <img src="/frontend/images/post-lg-1.jpg" alt="Apple iPad Mini is Gorgeous For Business Faculty">
                                </div>
                                <div class="blog-info">
                                    <h3><a href="single-blog.html">Apple iPad Mini is Gorgeous For</a></h3>
                                    <span class="entry-meta">Posted at March 19. 2015</span>
                                    <p>
                                        Excellence is never an accident. It is always the result of high intention and intelligent execution; it represents the wise choice of many alternatives.
                                    </p>
                                    <a class="continue" href="single-blog.html">Continue Reading</a>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <article class="blog-item">
                                <div class="thumb">
                                    <img src="/frontend/images/post-lg-1.jpg" alt="Vitae luctus tortor feugiat">
                                </div>
                                <div class="blog-info">
                                    <h3><a href="single-blog.html">Vitae luctus tortor feugiat</a></h3>
                                    <span class="entry-meta">Posted at March 19. 2015</span>
                                    <p>
                                        Excellence is never an accident. It is always the result of high intention and intelligent execution; it represents the wise choice of many alternatives.
                                    </p>
                                    <a class="continue" href="single-blog.html">Continue Reading</a>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <article class="blog-item">
                                <div class="thumb">
                                    <img src="/frontend/images/post-lg-1.jpg" alt="Get In-Car Entertainment With New">
                                </div>
                                <div class="blog-info">
                                    <h3><a href="single-blog.html">Get In-Car Entertainment With New</a></h3>
                                    <span class="entry-meta">Posted at March 19. 2015</span>
                                    <p>
                                        Excellence is never an accident. It is always the result of high intention and intelligent execution; it represents the wise choice of many alternatives.
                                    </p>
                                    <a class="continue" href="single-blog.html">Continue Reading</a>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <article class="blog-item">
                                <div class="thumb">
                                    <img src="/frontend/images/post-lg-1.jpg" alt="Ready tablet picture with rating">
                                </div>
                                <div class="blog-info">
                                    <h3><a href="single-blog.html">Ready tablet picture with rating</a></h3>
                                    <span class="entry-meta">Posted at March 19. 2015</span>
                                    <p>
                                        Excellence is never an accident. It is always the result of high intention and intelligent execution; it represents the wise choice of many alternatives.
                                    </p>
                                    <a class="continue" href="single-blog.html">Continue Reading</a>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <article class="blog-item">
                                <div class="thumb">
                                    <img src="/frontend/images/post-lg-1.jpg" alt="Room Post Format with Beautiful">
                                </div>
                                <div class="blog-info">
                                    <h3><a href="single-blog.html">Room Post Format with Beautiful</a></h3>
                                    <span class="entry-meta">Posted at March 19. 2015</span>
                                    <p>
                                        Excellence is never an accident. It is always the result of high intention and intelligent execution; it represents the wise choice of many alternatives.
                                    </p>
                                    <a class="continue" href="single-blog.html">Continue Reading</a>
                                </div>
                            </article>
                        </div>
                    </div>
                    <!--End Blog Content-->

                    <nav class="pagination">
                        <ul class="pagination_list pull-right">
                            <li>
                                <a href="blog.html">1</a>
                            </li>
                            <li>
                                <span class="current">2</span>
                            </li>
                            <li>
                                <a href="blog.html">3</a>
                            </li>
                            <li>
                                <a href="blog.html">4</a>
                            </li>
                            <li>
                                <a href="blog.html">5</a>
                            </li>
                            <li>
                                <span>...</span>
                            </li>
                            <li>
                                <a href="blog.html">Next</a>
                            </li>
                        </ul>
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
                            <h4 class="widget-title">CATEGORIES</h4>
                            <ul>
                                <li>
                                    <a href="blog.html">Creative <span>(30)</span></a>
                                </li>
                                <li>
                                    <a href="blog.html">Fashion <span>(30)</span></a>
                                </li>
                                <li>
                                    <a href="blog.html">Creative <span>(30)</span></a>
                                </li>
                                <li>
                                    <a href="blog.html">Image <span>(30)</span></a>
                                </li>
                                <li>
                                    <a href="blog.html">Photography <span>(30)</span></a>
                                </li>
                                <li>
                                    <a href="blog.html">Videos <span>(30)</span></a>
                                </li>
                                <li>
                                    <a href="blog.html">WordPress <span>(30)</span></a>
                                </li>
                                <li>
                                    <a href="blog.html">Antiquarianism  <span>(30)</span></a>
                                </li>
                                <li>
                                    <a href="blog.html">Championship <span>(30)</span></a>
                                </li>
                                <li>
                                    <a href="blog.html">Clerkship <span>(30)</span></a>
                                </li>
                            </ul>
                        </aside>
                        <aside class="widget widget_recent_posts">
                            <h4 class="widget-title">RECENT POSTS</h4>
                            <ul>
                                <li>
                                    <img src="/frontend/images/post-lg-1.jpg" alt="Ready tablet picture with rating review">
                                    <div class="recent-info">
                                        <h5><a href="single-blog.html">Ready tablet picture with rating review</a></h5>
                                        <span class="date">Posted at March 19. 2015</span>
                                    </div>
                                </li>
                                <li>
                                    <img src="/frontend/images/post-lg-1.jpg" alt="Room Post Format with Beautiful Water Nature">
                                    <div class="recent-info">
                                        <h5><a href="single-blog.html">Room Post Format with Beautiful Water Nature</a></h5>
                                        <span class="date">Posted at March 19. 2015</span>
                                    </div>
                                </li>
                                <li>
                                    <img src="/frontend/images/post-lg-1.jpg" alt="15 cooking gadgets new rating review system">
                                    <div class="recent-info">
                                        <h5><a href="single-blog.html">15 cooking gadgets new rating review system</a></h5>
                                        <span class="date">Posted at March 19. 2015</span>
                                    </div>
                                </li>
                                <li>
                                    <img src="/frontend/images/post-lg-1.jpg" alt="Apple iPad Mini is Gorgeous For Business">
                                    <div class="recent-info">
                                        <h5><a href="single-blog.html">Apple iPad Mini is Gorgeous For Business</a></h5>
                                        <span class="date">Posted at March 19. 2015</span>
                                    </div>
                                </li>
                                <li>
                                    <img src="/frontend/images/post-lg-1.jpg" alt="iPhone Fingerprint Scanner Hacked">
                                    <div class="recent-info">
                                        <h5><a href="single-blog.html">iPhone Fingerprint Scanner Hacked</a></h5>
                                        <span class="date">Posted at March 19. 2015</span>
                                    </div>
                                </li>
                            </ul>
                        </aside>
                        <aside class="widget widget_instagram">
                            <h4 class="widget-title">instagram</h4>
                            <div class="img-instagram">
                                <img src="/frontend/images/post-lg-1.jpg" alt="instangram1">
                                <img src="/frontend/images/post-lg-1.jpg" alt="instangram1">
                                <img src="/frontend/images/post-lg-1.jpg" alt="instangram1">
                                <img src="/frontend/images/post-lg-1.jpg" alt="instangram1">
                                <img src="/frontend/images/post-lg-1.jpg" alt="instangram1">
                                <img src="/frontend/images/post-lg-1.jpg" alt="instangram1">
                            </div>
                        </aside>
                        <aside class="widget widget_recent_posts">
                            <h4 class="widget-title">FEATURES POSTS</h4>
                            <ul>
                                <li>
                                    <img src="/frontend/images/post-lg-1.jpg" alt="15 cooking gadgets new rating review system">
                                    <div class="recent-info">
                                        <h5><a href="single-blog.html">15 cooking gadgets new rating review system</a></h5>
                                        <span class="date">Posted at March 19. 2015</span>
                                    </div>
                                </li>
                                <li>
                                    <img src="/frontend/images/post-lg-1.jpg" alt="Apple iPad Mini is Gorgeous For Business">
                                    <div class="recent-info">
                                        <h5><a href="single-blog.html">Apple iPad Mini is Gorgeous For Business</a></h5>
                                        <span class="date">Posted at March 19. 2015</span>
                                    </div>
                                </li>
                                <li>
                                    <img src="/frontend/images/post-lg-1.jpg" alt="iPhone Fingerprint Scanner Hacked">
                                    <div class="recent-info">
                                        <h5><a href="single-blog.html">iPhone Fingerprint Scanner Hacked</a></h5>
                                        <span class="date">Posted at March 19. 2015</span>
                                    </div>
                                </li>
                                <li>
                                    <img src="/frontend/images/post-lg-1.jpg" alt="Ready tablet picture with rating review">
                                    <div class="recent-info">
                                        <h5><a href="single-blog.html">Ready tablet picture with rating review</a></h5>
                                        <span class="date">Posted at March 19. 2015</span>
                                    </div>
                                </li>
                                <li>
                                    <img src="/frontend/images/post-lg-1.jpg" alt="Room Post Format with Beautiful Water Nature">
                                    <div class="recent-info">
                                        <h5><a href="single-blog.html">Room Post Format with Beautiful Water Nature</a></h5>
                                        <span class="date">Posted at March 19. 2015</span>
                                    </div>
                                </li>
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