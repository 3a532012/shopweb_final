@extends('admin.layouts.master')

@section('title', '新增商品')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            新增商品 <small>請輸入商品內容</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 商品新增
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->


<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form role="form" action="{{route('AdminDashboardController_goods_create1')}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
            <div class="form-group">
                <label>商品名稱：</label>
                <input class="form-control" name="goodsname1" placeholder="請輸入商品名稱" required>
            </div>
            <div class="form-group">
                <label>商品價格：</label>
                <input  class="form-control" name="price" placeholder="請輸入商品價格" required>
            </div>
            <div class="form-group">
                <label>商品照片：</label>
                <input type="file" name="photo1"  size="5"required>
                <input type="file" name="photo2" size="5"required>
            </div>
            <div class="form-group">
                <label>商品類型：</label>
                <select name="type" id="goodstype" required>
                    <option value="長袖" >長袖</option>
                    <option value="短袖" >短袖</option>
                    <option value="長褲" >長褲</option>
                    <option value="短褲" >短褲</option>
                    <option value="外套" >外套</option>
                </select>
            </div>




            <div class="text-right">
                <input class="btn btn-success" type="submit" name="submit" value="新增" onclick="return(confirm('確認要新增嗎？'))">
            </div>

            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

        </form>
    </div>
</div>
<!-- /.row -->
@endsection
