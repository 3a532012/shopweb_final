@extends('admin.layouts.master')

@section('title', '新增商品')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                編輯商品 <small>請編輯商品內容</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-edit"></i> 商品編輯
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-info-circle"></i>  <strong>警告！</strong> 請修正表單錯誤：
            </div>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <form role="form" action="#" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label>商品名稱：</label>
                    <input class="form-control" name="goodsname1" placeholder="請輸入商品名稱">
                </div>
                <div class="form-group">
                    <label>商品價格：</label>
                    <input  class="form-control" name="price" placeholder="請輸入商品價格">
                </div>
                <div class="form-group">
                    <label>商品照片：</label>
                    <input type="file" name="photo1"  size="5">
                    <input type="file" name="photo2" size="5">
                </div>
                <div class="form-group">
                    <label>商品類型：</label>
                    <select name="type" id="goodstype">
                        <option value="長袖" >長袖</option>
                        <option value="短袖" >短袖</option>
                        <option value="長褲" >長褲</option>
                        <option value="短褲" >短褲</option>
                        <option value="外套" >外套</option>
                    </select>
                </div>




                <div class="text-right">
                    <button type="submit" class="btn btn-success">新增</button>
                </div>

                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>

            </form>
        </div>
    </div>
    <!-- /.row -->
@endsection
