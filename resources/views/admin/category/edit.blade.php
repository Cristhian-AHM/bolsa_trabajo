@extends('layouts.admin')
@section('title','Editar categoría')
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
            Editar categoría
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorías</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar categoría</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Editar categoría</h4>
                    </div>
                    {!! Form::model($category,['route'=>['categories.update',$category], 'method'=>'PUT']) !!}
                    

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" value="{{$category->name}}" class="form-control" placeholder="Nombre" required>
                      </div>
                      <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea class="form-control" name="description" id="description" rows="3">{{$category->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="description">Dirección</label>
                        <input type="text" class="form-control" name="address" id="address" value="{{$category->address}}" placeholder="Ej. Av. Nacional #522" required>
                      </div>
                      <div class="form-group">
                        <label for="description">Teléfono</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="{{$category->phone}}" placeholder="Ej. 656 888 44 12" required>
                      </div>
                      <div class="form-group">
                        <label for="description">Email</label>
                        <input type="text" class="form-control" name="email" id="email" value="{{$category->email}}" placeholder="Ej. email@domain.com" required>
                      </div>
                      <div class="form-group">
                        <label for="description">Ramo Empresarial</label>
                        <input type="text" class="form-control" name="branch" id="branch" value="{{$category->branch}}" placeholder="Ej. Servicios, Administrativa" required>
                      </div>
                    

                     <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                     <a href="{{route('categories.index')}}" class="bg-transparent text-dark btn">
                        Cancelar
                     </a>
                     {!! Form::close() !!}
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$categories->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
@endsection