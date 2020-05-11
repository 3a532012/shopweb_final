@extends('admin.layouts.master')

@section('title', '主控台')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            商品總覽<small></small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> 商品總覽
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<table>
    <tr>
        <td width="200" align="center" valign="center">
            <div class="product-left">
                <h5>功能</h5>
            </div>
        </td>
        <td width="200" align="center" valign="center">
            <div class="product-left">
                <h5>商品名稱</h5>
            </div>
        </td>
        <td width="200" align="center" valign="center">
            <div class="product-left">
                <h5>商品價格</h5>
            </div>
        </td>
        <td width="200" align="center" valign="center">
            <div class="product-left">
                <h5>類型</h5>
            </div>
        </td>

    </tr>



@foreach($data as $show)
        <tr >
            <td width="200" align="center" valign="center">
                <div class="product-left">
                    <h5>
                        <form action="{{ route('AdminDashboardController_goods_delete', $show->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input class="btn btn-success" type="submit" name="submit" value="刪除" onclick="return(confirm('確認要刪除嗎？'))">

                        </form>
                    </h5>

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
                    <h5>{{$show->type}}</h5>
                </div>
            </td>

        </tr>
    @endforeach

</table>
<!-- /.row -->

@endsection
