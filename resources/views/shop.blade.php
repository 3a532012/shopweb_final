@extends('layout.master')
@section('title','shop')
@section('content')

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url({{asset('img/bg-img/breadcumb.jpg')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop_sidebar_area">

                        <!-- ##### Single Widget ##### -->
                        <div class="widget catagory mb-50">
                            <!-- Widget Title -->
                            <h6 class="widget-title mb-30">種類</h6>

                            <!--  Catagories  -->
                            <div class="catagories-menu">
                                <ul id="menu-content2" class="menu-content collapse show">
                                    <!-- Single Item -->
                                    <li data-toggle="collapse" data-target="#clothing">
                                        <a href="#">衣服</a>
                                        <ul class="sub-menu collapse show" id="clothing">
                                            <li><a href="{{route('show_longsleeve')}}">長袖</a></li>
                                            <li><a href="{{route('show_shortsleeve')}}">短袖</a></li>

                                        </ul>
                                    </li>
                                    <!-- Single Item -->
                                    <li data-toggle="collapse" data-target="#shoes" class="collapsed">
                                        <a href="#">褲子</a>
                                        <ul class="sub-menu collapse" id="shoes">
                                            <li><a href="{{route('show_trousers')}}">長褲</a></li>
                                            <li><a href="{{route('show_shortpants')}}">短褲</a></li>

                                        </ul>
                                    </li>
                                    <!-- Single Item -->
                                    <li data-toggle="collapse" data-target="#accessories" class="collapsed">
                                        <a href="{{route('show_coat')}}">外套</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-topbar d-flex align-items-center justify-content-between">
                                    <!-- Total Products -->
                                    <div class="total-products">
{{--商品記數--}}                                   <p>共<span>{{$a}}</span>筆商品</p>
                                    </div>
                                    <!-- Sorting -->

                                    <div class="product-sorting d-flex">
                                        <p>經由價格排序:</p>
                                        <form action="#">
                                            <select name="sorts" id="sortByselect">
                                                <option value="DESC" >由高至低</option>
                                                <option value="ASC" >由低至高</option>

                                            </select>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                        @foreach ($goods as $good)
                            <!-- Single Product -->
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-wrapper">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <img src="{{asset("img/product-img/$good->photo1")}}" alt="">
                                        <!-- Hover Thumb -->
                                        <img class="hover-img" src="{{asset("img/product-img/$good->photo2")}}" alt="">

                                    </div>

                                    <!-- Product Description -->
                                    <div class="product-description">

                                        <a href="{{route('details',[$good->id])}}">
                                            <h6>{{$good->goodsname1}}</h6>
                                        </a>
                                        <p class="product-price">{{$good->price}}</p>

                                        <!-- Hover Content -->
                                        <div class="hover-content">
                                            <!-- Add to Cart -->
                                            <div class="add-to-cart-btn">
                                                <a href="{{route('details',$good->id)}}" class="btn essence-btn">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

@endforeach


            </div>
        </div>


        @isset($search) {{$goods ->appends(['search'=>$search])->render()}}
           @else{{$goods->render()}}
            @endisset
    </section>
    <!-- ##### Shop Grid Area End ##### -->
    @endsection

