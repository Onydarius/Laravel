@extends ('connect.master')
@section('title','Registro')

@section('content')
    <div class="box box_register shadow">
        <div class="header">
             <a href="{{url('/')}}">
                <img src="{{url('/static/images/logotipo.png')}}" alt="">
           </a>
        </div>
        <div class="inside">
            {!! Form::open(['url' => '/register'])!!}
            <label for="name">Nombre:</label>
            <div class="input-group">
                {!! Form::text('name',null,['class' => 'form-control','required']) !!}
            </div>
            <label for="lastn" class="mtop16">Apellido:</label>
            <div class="input-group">
                {!! Form::text('lastn',null,['class' => 'form-control','required']) !!}
            </div>

            <label for="email" class="mtop16">Correo electrónico:</label>
            <div class="input-group">
                {!! Form::email('email',null,['class' => 'form-control','required']) !!}
            </div>

            <label for="password" class="mtop16">Contraseña:</label>
            <div class="input-group">
                {!! Form::password('password',['class' => 'form-control','required']) !!}
            </div>

            <label for="cpassword" class="mtop16">Confirmar contraseña:</label>
            <div class="input-group">
                {!! Form::password('cpassword',['class' => 'form-control','required']) !!}
            </div>

            {!!Form::submit('Registrarse',['class'=> 'btn btn-success mtop16'])!!}
            {!! Form::Close() !!}

           <div class="container">
                    @if(Session::has('message'))
                    <div class="container">
                        <div class="mtop16 alert alert-{{Session::get('typealert')}}" style="display: none">
                            {{Session::get('message')}}
                            @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                            @endif
                            <script>
                                $('.alert').slideDown();
                                setTimeout(function(){ $('.alert').slideUp(); }, 5000)
                            </script>
                        </div>
                    </div>
                @endif
           </div>

            <div class="footer mtop16">
                <a href="{{url('/login')}}">Ya tengo una cuenta</a>
            </div>
        </div>
    </div>
@stop