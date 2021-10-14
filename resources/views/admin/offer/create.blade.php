@extends('layouts.admin')
@section('title','Registrar oferta de trabajo')
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
            Registro de oferta de trabajo
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index')}}">Ofertas de trabajo</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro oferta de trabajo</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de oferta de trabajo</h4>
                    </div>
                    {!! Form::open(['route'=>'offers.store', 'method'=>'POST','files' => true]) !!}
                   
                    <div class="form-group">
                        <input type="text" name="category_id" id="category_id" value="{{$category->id}}" class="form-control d-none">
                    </div>
                    

                    <div class="form-group">
                      <label for="name">Nombre</label>
                      <input type="text" name="name" id="name" class="form-control" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                      <label for="code">Descripción de la oferta</label>
                      <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                      <small id="helpId" class="text-muted">Campo opcional</small>
                    </div>
                    <div class="form-group">
                        <label for="stock">Salario</label>
                        <input type="text" name="salary" id="salary" class="form-control" aria-describedby="helpId" required>
                        <small id="helpId" class="text-muted">Campo opcional</small>
                    </div>
                    <div class="form-group">
                        <label for="stock">Duración</label>
                        <input type="text" name="duration" id="duration" class="form-control" aria-describedby="helpId" required>
                        <small id="helpId" class="text-muted">Campo opcional</small>
                    </div>
                    <div class="form-group">
                        <label for="sell_price">Fecha de expiración de la oferta</label>
                        <input type="date" name="expiration_date" id="expiration_date" class="form-control" aria-describedby="helpId" required>
                        <small id="helpId" class="text-muted">Campo opcional</small>
                    </div>

                    

                    {{--  <div class="custom-file mb-4">
                        <input type="file" class="custom-file-input" name="picture" id="picture" lang="es">
                        <label class="custom-file-label" for="image">Seleccionar Archivo</label>
                    </div>  --}}

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