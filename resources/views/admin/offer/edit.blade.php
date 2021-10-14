@extends('layouts.admin')
@section('title','Editar producto')
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
            Edición de productos
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index')}}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edición de producto</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Edición de producto</h4>
                    </div>

                    {!! Form::model($product,['route'=>['products.update',$product], 'method'=>'PUT','files' => true]) !!}


                    <div class="form-group">
                      <label for="name">Nombre</label>
                      <input type="text" name="name" id="name" value="{{$product->name}}" class="form-control" aria-describedby="helpId" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Descripción de las tareas desempeñadas</label>
                        <textarea class="form-control" name="description" id="description" rows="3" value="{{$product->description}}">{{$product->description}}</textarea>
                        <small id="helpId" class="text-muted">Campo opcional</small>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <label for="sell_price">Fecha de inicio</label>
                                <input type="date" name="start_date" id="start_date" value="{{$product->start_date}}" class="form-control" aria-describedby="helpId" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="sell_price">Fecha de terminación</label>
                                <input type="date" name="end_date" id="end_date" value="{{$product->end_date}}" class="form-control" aria-describedby="helpId" required>
                                <small id="helpId" class="text-muted">Campo opcional</small>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="sell_price">Precio de venta</label>
                        <input type="number" name="sell_price" id="sell_price" value="{{$product->sell_price}}" class="form-control" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                        <label for="stock">Cantidad disponible</label>
                        <input type="number" name="stock" id="stock" class="form-control" value="{{$product->stock}}" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción </label>
                        
                    </div>
                    <div class="form-group">
                      <label for="category_id">Categoría</label>
                      <select class="form-control" name="category_id" id="category_id">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}" 
                            @if ($category->id == $product->category_id)
                            selected
                            @endif
                            >{{$category->name}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                        <label for="provider_id">Proveedor</label>
                        <select class="form-control" name="provider_id" id="provider_id">
                          @foreach ($providers as $provider)
                          <option value="{{$provider->id}}"
                            @if ($provider->id == $provider->provider_id)
                            selected
                            @endif
                            >{{$provider->name}}</option>
                          @endforeach
                        </select>
                    </div>

                    {{--  <div class="custom-file mb-4">
                        <input type="file" class="custom-file-input" name="image" id="image" lang="es">
                        <label class="custom-file-label" for="image">Seleccionar Archivo</label>
                    </div>  --}}

                    <img src="{{ URL::asset('/image/'.$product->image) }}" width="400" height="300"/>
                   
                    <div class="card-body">
                        <h4 class="card-title d-flex">Imagen de producto
                          <small class="ml-auto align-self-end">
                            <a href="dropify.html" class="font-weight-light" target="_blank">Seleccionar Archivo</a>
                          </small>
                        </h4>
                        <input type="file"  name="picture" id="picture" class="dropify" />
                    </div>

                     <button type="submit" class="btn btn-primary mr-2">Editar</button>
                     <a href="{{route('products.index')}}" class="bg-transparent text-dark btn">
                        Cancelar
                     </a>
                     {!! Form::close() !!}
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$products->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/dropify.js') !!}
@endsection