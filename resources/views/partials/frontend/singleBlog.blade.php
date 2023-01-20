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
    <section class="blog_area single-post-area padding_top">
        <div class="container">
           <div class="row">
              <div class="col-lg-8 posts-list">
                 <div class="single-post">
                    <div class="feature-img">
                       <img class="img-fluid" src="{{ $show->image ? asset('storage/blog/'.$show->image) : asset('storage/blog/'.$show->imageFile) }}" alt="">
                    </div>
                    <div class="blog_details">
                       <h2>{{ $show->titre }}
                       </h2>
                       <ul class="blog-info-link mt-3 mb-4">
                          <li><a href="#"><i class="far fa-user"></i>@foreach ($show->tag as $tag )
                              {{ $tag->tag }}
                          @endforeach</a></li>
                          <li><a href="#"><i class="far fa-comments"></i>{{ $show->comblog->count() }}  Comments</a></li>
                       </ul>
                       <p class="excert">
                          {{ $show->texte }}
                       </p>
                       <p>
                        {{ $show->texte }}
                       </p>
                       <div class="quote-wrapper">
                          <div class="quotes">
                            {{ $show->texte }}
                          </div>
                       </div>
                       <p>
                        {{ $show->texte }}
                       </p>
                       <p>
                        {{ $show->texte }}
                       </p>
                    </div>
                 </div>
                 <div class="comments-area">
                    <h4>{{$show->comblog->count()}} Comments</h4>
                    @foreach ($comBlogs->where('blog_id', $show->id) as $com )
                        <div class="comment-list">
                       <div class="single-comment justify-content-between d-flex">
                          <div class="user justify-content-between d-flex">
                             <div class="thumb">
                                @if ($users->where('email', $com->email)->count() > 0)
                                                @if ($com->user->image == true)
                                                    <img class="rounded-circle"
                                                        src="{{ asset('storage/users/'. $com->user->image) }}"
                                                        alt="" />
                                                @endif
                                                @if ($com->user->imageFile)
                                                    <img class="rounded-circle" src="{{ asset('storage/users/' . $com->user->imageFile) }}"
                                                        alt="" />
                                                @endif   
                                                @else
                                                    
                                                <div class="h5 d-flex justify-content-center align-items-center text-center p-0 text-white" style="height: 50px; width:50px; border-radius:50%; background-color:#455a64;">{{ strtoupper($com->nom[0])  }}</div>
                                            @endif
                             </div>
                             <div class="desc">
                                <p class="comment">
                                   {{ $com->message }}
                                </p>
                                <div class="d-flex justify-content-between">
                                   <div class="d-flex align-items-center">
                                      <h5>
                                         <a href="#">{{ $com->nom }}</a>
                                      </h5>
                                      <p class="date">{{ $com->date }} </p>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                    @endforeach
                 </div>
                 <div class="comment-form">
                    <h4>Leave a Reply</h4>
                    <form class="form-contact comment_form" action="/comBlog" id="commentForm" method="POST">
                        @csrf
                       <div class="row">
                          <div class="col-12">
                             <div class="form-group">
                                <textarea class="form-control w-100" name="message" id="comment" cols="30" rows="9"
                                   placeholder="Write Comment">{{ old('site') ? old('site') : null }}</textarea>
                             </div>
                          </div>
                          <div class="col-sm-6">
                             <div class="form-group">
                                <input class="form-control" value="{{ Auth::check() ? Auth::user()->username : (old('nom') ? old('nom') : null) }}" name="nom" id="nom" type="text" placeholder="Name">
                             </div>
                          </div>
                          <div class="col-sm-6">
                             <div class="form-group">
                                <input class="form-control" name="email" value="{{ Auth::check() ? Auth::user()->email : (old('email') ? old('email') : null) }}" id="email" type="email" placeholder="Email">
                                <input type="hidden" name="id" value="{{ $show->id }}">
                             </div>
                          </div>
                          <div class="col-12">
                             <div class="form-group">
                                <input class="form-control" value="{{ old('site') ? old('site') : null }}" name="site" id="website" type="text" placeholder="Website">
                             </div>
                          </div>
                       </div>
                       <div class="form-group mt-3">
                          <button type="submit" class="btn_3 button-contactForm">Send Message</a>
                       </div>
                    </form>
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
                                 <a href="/blog/{{ $blog->id }}">
                                <img src="{{ $blog->image ? asset('storage/recentPost/'.$blog->image) : asset('storage/recentPost/'.$blog->imageFile) }}" alt="post">
                                 </a>
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