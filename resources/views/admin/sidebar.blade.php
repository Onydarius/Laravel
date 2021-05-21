<div class="sidebar shadow">
    <div class="section-top">
        <div class="logo">
            <img src="{{ url('static/images/logotipo.png')}}" class="img-fluid">
        </div>
        <div class="user">
            <span class="subtitle">Hola: </span>
            <div class="name">
                {{Auth::user()->name}} {{Auth::user()->lastname}}
                <a href="{{url('/logout')}}"> <i class="fas fa-sign-out-alt"></i></a> 
            </div>
            <div class="email">
                {{Auth::user()->email}}
            </div>
        </div>
    </div>
    <div class="main">
        <ul>
            <li>
                <a href="{{url('/admin')}}"><i class="fas fa-home"></i>Dashboard</a>
            </li>
            <li>
                <a href="{{url('/admin/products')}}"><i class="fas fa-box-open"></i>Productos</a>
            </li>
            <li>
                <a href="{{url('/admin')}}"><i class="fas fa-users"></i>Usuarios</a>
            </li>
        </ul>
    </div>

</div>