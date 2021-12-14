@extends('layouts.app')





@section('content')
<div class="content-wrapper">
    <div class="row">
            <div class="container container2">
                <div class="card-form-container">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mt-2 bold-text">Registro de usuario</h4>
                    </div>
                    {!! Form::open(['route'=>'users.store_login', 'method'=>'POST']) !!}

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId">
                      </div>
                      <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="" aria-describedby="helpId">
                      </div>

                      <div class="form-group">
                        <label for="category_id">Tipo</label>
                        <select class="form-control" name="type" id="type">
                          <option value="Estudiante">Estudiante</option>
                          <option value="Empresa">Empresa</option>
                        </select>
                      </div>
                      
                      <div class="form-group">
                          <label for="password">Contraseña</label>
                          <input type="password" name="password" id="password" class="form-control" placeholder="" aria-describedby="helpId">
                      </div>

                     <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                     <a href="{{route('login')}}" class="btn btn-light">
                        Cancelar
                     </a>
                     {!! Form::close() !!}
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$users->render()}}
                </div>  --}}
            </div>
        </div>
</div>
@endsection
