@extends('layouts.admin')
@section('title','Registrar experiencia')
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
            Registro de experiencia laboral
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index')}}">Experiencia de trabajo</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de experiencia laboral</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de experiencia laboral</h4>
                    </div>
                    {!! Form::open(['route'=>'products.store', 'method'=>'POST','files' => true]) !!}
                   

                    <div class="form-group">
                      <label for="name">Nombre</label>
                      <input type="text" name="name" id="name" class="form-control" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                      <label for="code">Descripción de las tareas desempeñadas</label>
                      <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                      <small id="helpId" class="text-muted">Campo opcional</small>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <label for="sell_price">Fecha de inicio</label>
                                <input type="date" name="start_date" id="start_date" class="form-control" aria-describedby="helpId" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="sell_price">Fecha de terminación</label>
                                <input type="date" name="end_date" id="end_date" class="form-control" aria-describedby="helpId" required>
                                <small id="helpId" class="text-muted">Campo opcional</small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="stock">Posición</label>
                        <input type="text" name="position" id="position" class="form-control" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Persona de referencia</label>
                        <input type="text" name="reference" id="reference" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="text" name="provider_id" id="provider_id" value="{{$provider->id}}" class="form-control d-none">
                    </div>

                    {{-- <div class="custom-file mb-4">
                        <input type="file" class="custom-file-input" name="curriculum" id="curriculum" lang="es">
                        <label class="custom-file-label" for="curriculum">Seleccionar Archivo</label>
                    </div> 
 --}}
                     <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                     <a href="{{route('products.index')}}" class="bg-transparent text-dark btn">
                        Cancelar
                     </a>
                     {!! Form::close() !!}
                </div>
                {{--  <div class="card-footer text-muted">
                    
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
{!! Html::script('melody/js/dropify.js') !!}
@endsection