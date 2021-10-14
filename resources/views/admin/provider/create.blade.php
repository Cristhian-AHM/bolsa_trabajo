@extends('layouts.admin')
@section('title','Registrar estudiante')
@section('styles')
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Registro de estudiantes
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('providers.index')}}">Estudiantes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de estudiantes</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de estudiantes</h4>
                    </div>
                    {!! Form::open(['route'=>'providers.store', 'method'=>'POST']) !!}
                    
                    {{--  'name', 'email','ruc_number', 'address','phone',  --}}

                    <div class="form-group">
                      <label for="name">Nombre</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder = "Nombre" aria-describedby="helpId" required>
                    </div>

                    <div class="form-group">
                        <label for="name">Apellidos</label>
                        <input type="text" class="form-control" name="lastname" placeholder = "Apellido" id="lastname" aria-describedby="helpId" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Número de contacto</label>
                        <input type="number" class="form-control" name="phone" id="phone" placeholder = "Ej. 656 222 14 52" aria-describedby="helpId" required>
                    </div>

                    <div class="form-group">
                      <label for="email">Correo electrónico</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder = "Ej. email@email.com" aria-describedby="emailHelpId" placeholder="ejemplo@gmail.com" required>
                    </div>

                    <div class="form-group">
                        <label for="ruc_number">Carrera</label>
                        <input type="text" class="form-control" name="career" id="career" placeholder = "Ej. Sistemas Computacionales" aria-describedby="helpId">
                    </div>

                    <div class="form-group">
                        <label for="address">Semestre</label>
                        <input type="number" class="form-control" name="semester" id="semester" aria-describedby="helpId">
                    </div>

                     <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                     <a href="{{route('providers.index')}}" class="bg-transparent text-dark btn">
                        Cancelar
                     </a>
                     {!! Form::close() !!}
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$providers->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
@endsection