@extends('frontend.layouts.master')

@section('container')
<div class="blog">
    <div class="container">

        <!--Start breadcrumbs-->
        <ul class="tz-breadcrumbs">
            <li>
                <a href="#">Home</a>
            </li>
            <li class="current">
                Deatil post
            </li>
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
                                    <img src="/frontend/images/parallax.jpg" alt="Ready tablet picture with rating review">
                                    <div class="recent-info">
                                        <h5><a href="single-blog.html">Ready tablet picture with rating review</a></h5>
                                        <span class="date">Posted at March 19. 2015</span>
                                    </div>
                                </li>
                                <li>
                                    <img src="/frontend/images/parallax.jpg" alt="Room Post Format with Beautiful Water Nature">
                                    <div class="recent-info">
                                        <h5><a href="single-blog.html">Room Post Format with Beautiful Water Nature</a></h5>
                                        <span class="date">Posted at March 19. 2015</span>
                                    </div>
                                </li>
                                <li>
                                    <img src="/frontend/images/parallax.jpg" alt="15 cooking gadgets new rating review system">
                                    <div class="recent-info">
                                        <h5><a href="single-blog.html">15 cooking gadgets new rating review system</a></h5>
                                        <span class="date">Posted at March 19. 2015</span>
                                    </div>
                                </li>
                                <li>
                                    <img src="/frontend/images/parallax.jpg" alt="Apple iPad Mini is Gorgeous For Business">
                                    <div class="recent-info">
                                        <h5><a href="single-blog.html">Apple iPad Mini is Gorgeous For Business</a></h5>
                                        <span class="date">Posted at March 19. 2015</span>
                                    </div>
                                </li>
                                <li>
                                    <img src="/frontend/images/parallax.jpg" alt="iPhone Fingerprint Scanner Hacked">
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
                                <img src="/frontend/images/parallax.jpg" alt="instangram1">
                                <img src="/frontend/images/parallax.jpg" alt="instangram1">
                                <img src="/frontend/images/parallax.jpg" alt="instangram1">
                                <img src="/frontend/images/parallax.jpg" alt="instangram1">
                                <img src="/frontend/images/parallax.jpg" alt="instangram1">
                                <img src="/frontend/images/parallax.jpg" alt="instangram1">
                            </div>
                        </aside>
                        <aside class="widget widget_recent_posts">
                            <h4 class="widget-title">FEATURES POSTS</h4>
                            <ul>
                                <li>
                                    <img src="/frontend/images/parallax.jpg" alt="15 cooking gadgets new rating review system">
                                    <div class="recent-info">
                                        <h5><a href="single-blog.html">15 cooking gadgets new rating review system</a></h5>
                                        <span class="date">Posted at March 19. 2015</span>
                                    </div>
                                </li>
                                <li>
                                    <img src="/frontend/images/parallax.jpg" alt="Apple iPad Mini is Gorgeous For Business">
                                    <div class="recent-info">
                                        <h5><a href="#">Apple iPad Mini is Gorgeous For Business</a></h5>
                                        <span class="date">Posted at March 19. 2015</span>
                                    </div>
                                </li>
                                <li>
                                    <img src="/frontend/images/parallax.jpg" alt="iPhone Fingerprint Scanner Hacked">
                                    <div class="recent-info">
                                        <h5><a href="single-blog.html">iPhone Fingerprint Scanner Hacked</a></h5>
                                        <span class="date">Posted at March 19. 2015</span>
                                    </div>
                                </li>
                                <li>
                                    <img src="/frontend/images/parallax.jpg" alt="Ready tablet picture with rating review">
                                    <div class="recent-info">
                                        <h5><a href="single-blog.html">Ready tablet picture with rating review</a></h5>
                                        <span class="date">Posted at March 19. 2015</span>
                                    </div>
                                </li>
                                <li>
                                    <img src="/frontend/images/parallax.jpg" alt="Room Post Format with Beautiful Water Nature">
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
                <div class="col-md-8">

                    <!--Blog Content-->
                    <div class="row">
                        <div class="col-md-12">

                            <!--Content-->
                            <article class="single-blog">

                                <div class="thumb">
                                    <img src="/frontend/images/parallax.jpg" alt="will be distracted">
                                </div>

                                <h1><a href="#">It is a long established fact that a reader will be distracted</a></h1>
                                <span class="date">Posted at March 19. 2015</span>
                                <div class="single-content">
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                        when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                        It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                    </p>
                                    <blockquote>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
                                    </blockquote>
                                    <p>
                                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,
                                        eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                                        Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,
                                        sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
                                    </p>
                                    <p>
                                        Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,
                                        sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam,
                                        quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?
                                    </p>
                                </div>

                                <div class="entry-blog-meta">
                                    <span class="author">
                                        Author:
                                        <a href="blog.html">Admin</a>
                                    </span>
                                    <span class="cats">
                                        Categories:
                                        <a href="blog.html">Tips,</a>
                                        <a href="blog.html">Tips</a>
                                    </span>
                                    <span class="tags">
                                        Tags:
                                        <a href="blog.html">ullamcorper,</a>
                                        <a href="blog.html">vulputate</a>
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

                                <nav class="post-navigation">
                                    <a class="prev pull-left" href="single-blog.html">Previous post</a>
                                    <a class="Next pull-right" href="single-blog.html">Next post</a>
                                </nav>

                            </article>
                            <!--End content-->

                            <!--Comment-->
                            <div class="single-comment">
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
                            </div>
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
