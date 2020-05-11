@if (Session::has('message'))
    <script>

        alert("{{session('message')}}");

    </script>
@endif
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">管理後台</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 管理員 <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="{{route('index')}}"><i class="fa fa-fw fa-user"></i> 回前端</a>
                </li>
                <li>
                    <a href="{{route('logout')}}"  onclick="event.preventDefault();
                    document.getElementById('aaas').click(); "><i class="fa fa-fw fa-power-off" ></i> Log Out</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    <input id="aaas" class="btn btn-success" type="submit" name="submit" value="刪除" onclick="return(confirm('確認要登出嗎？'))">

                    @csrf
                </form>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="active">
                <a href="{{route('AdminDashboardController_order_index')}}"><i class="fa fa-fw fa-dashboard"></i> 主控台</a>
            </li>
            <li>
                <a href="{{route('AdminDashboardController_order_index')}}"><i class="fa fa-fw fa-edit"></i> 訂單管理</a>
            </li>
            <li>
                <a href="{{route('AdminDashboardController_goods_create')}}"><i class="fa fa-fw fa-edit"></i> 商品新增</a>
            </li>
            <li>
                <a href="{{route('AdminDashboardController_goods_show')}}"><i class="fa fa-fw fa-edit"></i> 商品編輯</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
