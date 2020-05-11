@extends('layout.master')
@section('title','orders')
@section('content')

    <div class="breadcumb_area bg-img" style="background-image: url({{asset('img/bg-img/breadcumb.jpg')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Orders</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <table style="line-height:50px;">
        <tr>
            <td width="200" align="center" valign="center">
                <div class="product-left">
                    <h5>訂單姓名</h5>
                </div>
            </td>
            <td width="250" align="center" valign="center">
                <div class="product-right">
                    <h5>訂單編號</h5>
                </div>
            </td>
            <td width="200" align="center" valign="center">
                <h5>訂購日期</h5>
            </td>

            <td width="200" align="center" valign="center">
                <div class="product-right1">
                    <h5>總金額</h5>
                </div>
            </td>

            <td width="200" align="center" valign="center">
            </td>
        </tr>
@isset($date)
@foreach( $date as $data)

            <tr >
                <td width="200" align="center" valign="center">
                    <div class="product-left">
                        <h5>{{$data->name}}</h5>
                    </div>
                </td>
                <td width="250" align="center" valign="center">
                    <div class="product-right">
                     <u><a  href="{{route('order_detail',$data->order_id)}}">{{$data->order_id}}</a></u>
                    </div>
                </td>


                <td width="200" align="center" valign="center">
                    <div class="product-right1">
                        <h6>{{$data->created_at}}</h6>

                    </div>
                </td>
                <td width="200" align="center" valign="center">
                    <div class="product-right1">
                        <h6>{{$data->total}}</h6>
                    </div>
                </td>



            </tr>
        @endforeach

    @else
        @endisset
    </table>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    <div class="clearfix mr-50 mt-50 mb-50">
    </div>
    <div class="clearfix mr-50 mt-50 mb-50">
    </div>
