<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>Shop Single</h2>
                        <p>Home <span>-</span> Shop Category</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!--================Blog Area =================-->
    <section class="blog_area padding_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        @foreach ($blogs as $blog )
                            <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="{{ asset('storage/blog/'.$blog->image) }}" alt="">
                                <a href="#" class="blog_item_date">
                                    <h3>{{$blog->dateJ  }}</h3>
                                    <p>{{ $blog->dateM }}</p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="/blog/{{ $blog->id }}">
                                    <h2>{{ $blog->titre }}</h2>
                                </a>
                                <p>
                                    @if (Str::length($blog->texte > 165))
                                       {{ Str::substr($blog->texte, 0, 165) }} ...
                                    @else
                                    {{ $blog->texte }}
                                    @endif
                                    
                                </p>
                                <ul class="blog-info-link">
                                   
                                        <li><a href="#"><i class="far fa-user"></i>
                                        @foreach ($blog->tag as $tag )
                                            {{ $tag->tag }}
                                            @endforeach
                                        </a></li>
                                    
                                    <li><a href="#"><i class="far fa-comments"></i> {{ $blog->comblog->count() }} Comments</a></li>
                                </ul>
                            </div>
                        </article>
                        @endforeach
                        <nav class="blog-pagination justify-content-center d-flex">
                            @if (Request::path() == 'blog')
                            {{ $blogs->links('partials.frontend.paginationBlog') }}
                            @endif
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="/blog/search" method="GET">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" name="recherche" class="form-control" placeholder='Search Keyword'
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Search Keyword'">
                                        <div class="input-group-append">
                                            <button class="btn" type="submit"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1"
                                    type="submit">Search</button>
                            </form>
                        </aside>

                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Category</h4>
                            <ul class="list cat-list">
                                    @foreach ($categoryBlogs as $category )
                                    <li>
                                        <a href="/blogs/category/{{ $category->id }}" class="d-flex">
                                            <p>{{ $category->categorie }}</p>
                                        </a>   
                                    </li> 
                                    @endforeach
                            </ul>
                        </aside>
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Recent Post</h3>
                            @foreach ($recentBlogs as $blog )
                               <div class="media post_item">
                                <img src="{{ asset('storage/recentPost/'.$blog->image) }}" alt="post">
                                <div class="media-body">
                                    <a href="/blog/{{ $blog->id }}">
                                        @if ( Str::length($blog->titre)>20) 
                                        <h3> {{ Str::substr($blog->titre, 0, 20) }}...</h3>  
                                    @else
                                    <h3>{{ $blog->titre }}</h3>
                                    @endif
                                    </a>
                                    <p>{{ $blog->dateJ }} {{ $blog->dateM }}</p>
                                </div>
                            </div> 
                            @endforeach
                        </aside>
                        <aside class="single_sidebar_widget tag_cloud_widget">
                            <h4 class="widget_title">Tag Clouds</h4>
                            <ul class="list">
                                @foreach ($tags as $tag)
                                   <li>
                                    <a href="/tags/{{ $tag->id }}">{{ $tag->tag }}</a>
                                </li> 
                                @endforeach
                            </ul>
                        </aside>
                        <aside class="single_sidebar_widget newsletter_widget">
                            <h4 class="widget_title">Newsletter</h4>

                            <form action="/mail/newsletter" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1"
                                    type="submit">Subscribe</button>
                            </form>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->