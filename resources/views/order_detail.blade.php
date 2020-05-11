@extends('layout.master')
@section('title','single-product-details')
@section('content')
    <div class="breadcumb_area bg-img" style="background-image: url({{asset('img/bg-img/breadcumb.jpg')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Orders_detail</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <table>
        <tr>
            <td width="200" align="center" valign="center">
                <div class="product-left">
                    <h5>商品型錄</h5>
                </div>
            </td>
            <td width="200" align="center" valign="center">
                <div class="product-left">
                    <h5>商品名稱</h5>
                </div>
            </td>
            <td width="200" align="center" valign="center">
                <div class="product-left">
                    <h5>價格</h5>
                </div>
            </td>
            <td width="200" align="center" valign="center">
                <div class="product-left">
                    <h5>數量</h5>
                </div>
            </td>
            <td width="200" align="center" valign="center">
                <div class="product-left">
                    <h5>SIZE</h5>
                </div>
            </td>
        </tr>


@foreach($data as $show)
        <tr>
            <td width="200" align="center" valign="center">
                <div class="product-left">
                    <h5><img src="{{asset("img/product-img/$show->photo1")}}" alt=""></h5>
                </div>
            </td>
            <td width="200" align="center" valign="center">
                <div class="product-left">
                    <h5>{{$show->goodsname1}}</h5>
                </div>
            </td>
            <td width="200" align="center" valign="center">
                <div class="product-left">
                    <h5>{{$show->price}}</h5>
                </div>
            </td>
            <td width="200" align="center" valign="center">
                <div class="product-left">
                    <h5>{{$show->quantity}}</h5>
                </div>
            </td>
            <td width="200" align="center" valign="center">
                <div class="product-left">
                    <h5>{{$show->size}}</h5>
                </div>
            </td>
        </tr>
    @endforeach
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>



        <td width="300" align="center" valign="center">
            <div class="product-left">
                <h5 style="text-align:left">總金額:{{$show->total}}</h5>
            </div>
            <div class="product-left">
                <h5 style="text-align:left">下單時間:{{$show->created_at}}</h5>
            </div>
            <div class="product-left">
                <h5 style="text-align:left">購買人姓名:{{$show->name}}</h5>
            </div>
        </td>
    </table>



    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <!-- /.row -->

@endsection