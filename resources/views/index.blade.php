@extends('layouts.app')

@section('content')
@include('_partials.top_banner')

<div class="container-fliud">
    <div  class="row align-items-start">
        @foreach( $banners as $banner )
            <div data-title="{{ $banner->title }}" class="{{ $banner->col }} {{ $banner->col == 'col-lg-3' ?  'col-6    p-0' : '' }}  {{ $banner->title }} p-0 text-center          {{ $banner->device }}">
                <div class="banner-box">
                    <a class="portfolio-thumb" href="{{ $banner->link }}">
                        <img src="{{ $banner->image }}" title="{{ $banner->title }}" alt="{{ $banner->img_alt }}" />
                    </a>
                </div>
            </div> 
        @endforeach
    </div>
</div>



<div id="{{ optional($products)->count() }}" class="container-fluid">
    
    @if ( optional($products)->count() )

    <div class="products-section pt-0">
        <h1 title="fashion  top picks" class="text-center text-sm-25  eee mb-3 mt-3 ">Top Picks for You</h1>


        <div class="products-slider owl-carousel owl-theme dots-top">
            @foreach( $products as $related_product)
            @if (optional($related_product)->product_type == 'variable')
            <div class="product-default inner-quickview inner-icon">
                <figure>
                    <a href="{{ optional($related_product->variant)->link }}">
                        <img  src="{{ optional($related_product->variant)->image_to_show_m }}">
                    </a>
                    @if ( optional($related_product->variant)->default_discounted_price > 1)
                    <div class="label-group">
                        <span class="product-label label-sale">-{{ optional($related_product->variant)->default_percentage_off }}%</span>
                    </div>
                    @endif
                    
                </figure>
                <div class="product-details">
                    <h3 class="product-title">
                        <a href="{{ optional($related_product->variant)->link }}">{{ optional($related_product->variant)->name  }}</a>
                    </h3>
                    <div class="price-box">
                        @if (optional($related_product->variant)->default_discounted_price ) 
                            <span class="old-price">{{ optional($related_product->variant)->currency }}{{ number_format(optional($related_product->variant)->converted_price)  }}</span>
                            <span class="product-price">{{ optional($related_product->variant)->currency }}{{ number_format(optional($related_product->variant)->default_discounted_price)  }}</span>
                        @else
                           <span title="{{ optional($related_product->variant)->default_discounted_price }} pppp" class="product-price  pppp">{{ optional($related_product->variant)->currency }}{{ number_format(optional($related_product->variant)->converted_price)  }}</span>
                        @endif
                    </div><!-- End .price-box -->
                </div><!-- End .product-details -->
            </div>
            @else

            <div class="product-default inner-quickview inner-icon">
                <figure>
                    <a href="{{ optional($related_product)->link }}">
                        <img  src="{{ optional($related_product)->image_to_show_m }}">
                    </a>
                    @if ( optional($related_product)->default_discounted_price > 1)
                    <div class="label-group">
                        <span class="product-label label-sale">-{{ optional($related_product)->default_percentage_off }}%</span>
                    </div>
                    @endif
                    
                </figure>
                <div class="product-details">
                    <h3 class="product-title">
                        <a href="{{ optional($related_product)->link }}">{{ optional($related_product)->product_name }}</a>
                    </h3>
                    <div class="price-box">
                        @if (optional($related_product)->salePrice() ) 
                            <span class="old-price">{{ optional($related_product)->currency }}{{ number_format(optional($related_product)->price)  }}</span>
                            <span class="product-price">{{ optional($related_product)->currency }}{{ number_format(optional($related_product)->salePrice())  }}</span>
                        @else
                           <span title="{{ optional($related_product->variant)->default_discounted_price }} pppp" class="product-price  pppp">{{ optional($related_product)->currency }}{{ number_format(optional($related_product)->converted_price)  }}</span>
                        @endif
                    </div><!-- End .price-box -->
                </div><!-- End .product-details -->
            </div>
            @endif

           



            @endforeach


           
        </div><!-- End .products-slider -->

    </div><!-- End .products-section -->

    @endif
    </div><!-- End .container -->


@if ($posts->count() && optional($blog_status)->is_active) 

<div class="blog-section pt-0 mt-3">
    <h1 title="fashion blog" class="text-center mb-3">Blog</h1>

    <div class="products-slider ml-3 owl-carousel owl-theme dots-top">
       @foreach($posts as $post)
        <div class="blog-default inner-quickview inner-icon">
            <figure>
                <a href="{{ route('blog.show',['blog'=> $post->slug]) }}">
                    <img  title="{{ $post->title }}" src="{{ $post->image_m }}" alt="{{  $post->title }}">
                </a>
            </figure>
            <div class="blog-details text-left">
                <h4 class="blog-title mb-1">
                    <a title="{{ $post->title }} " href="{{ route('blog.show',['blog'=> $post->slug]) }}" class="">
                        {{ $post->title }}
                    </a>
                </h4>
                <div class="blog-teaser-box">
                    <?php echo  str_limit(html_entity_decode($post->teaser), $limit = 100, $end = '...') ?>   
                </div><!-- End .price-box -->
            </div><!-- End .product-details -->
        </div>
        @endforeach
        
    </div><!-- End .products-slider -->
</div><!-- End .products-section -->

@endif






<!-- End .blog-section -->











@endsection
@section('page-scripts')
@stop


