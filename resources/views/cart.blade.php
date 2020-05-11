@extends('layout.master')
@section('title','single-product-details')
@section('content')
    <div class="breadcumb_area bg-img" style="background-image: url({{asset('img/bg-img/breadcumb.jpg')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table>
    <tr>
        <td width="200" align="center" valign="center">
            <div class="product-left">
                <h5></h5>
            </div>
        </td>
        <td width="250" align="center" valign="center">
            <div class="product-right">
                <h5>Product Name</h5>
            </div>
        </td>
        <td width="20" align="center" valign="center">
            <h5>Prcie</h5>
        </td>
        <td width="50" align="center" valign="center">
            <div class="product-right1">
                <h5>Quantity</h5>
            </div>
        </td>

        <td width="200" align="center" valign="center">
            <div class="product-right1">
                <h5>Size</h5>
            </div>
        </td>
        <td width="200" align="center" valign="center">
            <div class="product-right1">
                <h5>Total</h5>
            </div>
        </td>

        <td width="200" align="center" valign="center">
        </td>
    </tr>



    @foreach ($carts as $cart)
        <tr >
            <td width="200" align="center" valign="center">
                <div class="product-left">
                    <img src={{asset("img/product-img/$cart->photo1")}}>
                </div>
            </td>
            <td width="250" align="center" valign="center">
                <div class="product-right">
                    <h6>{{$cart->goodsname1}}</h6>
                </div>
            </td>
            <td width="200" align="center" valign="center">
                <div class="product-right1">
                    <h6>{{$cart->price}}</h6>
                    <div class="close"> </div>
                </div>
            </td>
            <td width="50" align="center" valign="center">
                <div class="product-right1">
                    <h6>{{$cart->quantity}}</h6>
                </div>
            </td>

            <td width="200" align="center" valign="center">
                <div class="product-right1">
                    <h6></h6>
                    <div> {{$cart->size}}</div>
                </div>
            </td>
            <td width="200" align="center" valign="center">
                <div class="product-right1">
                    <h6>{{$cart->price * $cart->quantity}}</h6>
                    <div class="close"> </div>
                </div>
            </td>
            <td width="200" align="center" valign="center">
                <div class="clear">
                    <form action="{{ route('cart_delete', $cart->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input  class="btn btn-success" type="submit" name="submit" value="刪除" onclick="return(confirm('確認要刪除嗎？'))">
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
        </table>

        <div class="add-to-cart-btn">
            <a href="{{route('checkout')}}" class="btn essence-btn" onclick="return(confirm('確認要下單嗎？'))">下單</a>
        </div>

        <div class="clearfix mr-50 mt-50 mb-50">
        </div>
        <div class="clearfix mr-50 mt-50 mb-50">
        </div>



    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    {{$carts->render()}}