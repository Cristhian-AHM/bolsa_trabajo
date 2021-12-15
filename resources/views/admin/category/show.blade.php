@extends('layouts.admin')
@section('title','Información de la compañía')
@section('styles')
<style type="text/css">
    .unstyled-button {
        border: none;
        padding: 0;
        background: none;
        color: red;
      }
</style>
@endsection
@section('create')

@endsection
@section('options')

@endsection
@section('preference')

@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{$category->name}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li> <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Compañías</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="border-bottom text-center pb-4">
                                <h3>{{$category->name}}</h3>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>
                            <div class="border-bottom py-4">
                                <div class="list-group">
                                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" user="tab" aria-controls="home">
                                        Datos de la compañía
                                    </a>
                                    <a type="button" class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" user="tab" aria-controls="profile">Ofertas publicadas</a>
                                    <a type="button" class="list-group-item list-group-item-action" id="list-post-list" data-toggle="list" href="#list-post" user="tab" aria-controls="post">Alumnos postulados</a>

                                </div>
                            </div>
                        </div>



                        <div class="col-lg-8 pl-lg-5">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="list-home" user="tabpanel" aria-labelledby="list-home-list">
                                    
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4>Información de la compañía</h4>
                                        </div>
                                    </div>
                                    <div class="profile-feed">
                                        <div class="d-flex align-items-start profile-feed-item">

                                        

                                            <div class="form-group col-md-6">
                                                <strong><i class="fab fa-product-hunt mr-1"></i> Nombre</strong>
                                                <p class="text-muted">
                                                    {{$category->name}} 
                                                </p>
                                                <hr>
                                                <strong><i class="fas fa-address-card mr-1"></i>Dirección</strong>
                                                <p class="text-muted">
                                                    {{$category->address}}
                                                </p>
                                                <hr>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <strong>
                                                    <i class="fas fa-mobile mr-1"></i>
                                                    Teléfono</strong>
                                                <p class="text-muted">
                                                    {{$category->phone}}
                                                </p>
                                                <hr>
                                                <strong><i class="fas fa-envelope mr-1"></i> Correo</strong>
                                                <p class="text-muted">
                                                    {{$category->email}}
                                                </p>
                                                <hr>
                                                <strong><i class="fas fa-map-marked-alt mr-1"></i> Ramo Empresarial</strong>
                                                <p class="text-muted">
                                                    {{$category->branch}}
                                                </p>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="list-profile" user="tabpanel" aria-labelledby="list-profile-list">
                                    
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4>Ofertas</h4>
                                        </div>
                                    </div>
                                    <div class="profile-feed">
                                        <div class="d-flex align-items-start profile-feed-item">
        
                                            <div class="table-responsive">
                                                <table id="order-listing" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Nombre</th>
                                                            <th>Descripción</th>
                                                            <th>Salario</th>
                                                            <th>Duración</th>
                                                            <th>Fecha de terminación</th>
                                                            <th>Estado</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($category->offers as $product)
                                                        <tr>
                                                            <th scope="row">
                                                                <a href="{{route('offers.show',$product)}}">{{$product->name}}</a>
                                                            </th>
                                                            <td>{{$product->description}}</td>
                                                            <td>{{$product->salary}}</td>
                                                            <td>{{$product->duration}}</td>
                                                            <td>{{$product->expiration_date}}</td>
                                                            @if ($product->status == 'ACTIVE')
                                                            <td>
                                                                <a class="jsgrid-button btn btn-success" href="{{route('change.status.offers', $product)}}" title="Editar">
                                                                    Activo <i class="fas fa-check"></i>
                                                                </a>
                                                            </td>
                                                            @else
                                                            <td>
                                                                <a class="jsgrid-button btn btn-danger" href="{{route('change.status.offers', $product)}}" title="Editar">
                                                                    Terminado <i class="fas fa-times"></i>
                                                                </a>
                                                            </td>
                                                            @endif
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            
                                                            
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                                <li class="nav item d-none d-lg-flex">
                                                    <a class="nav-link" href="{{route('offers.create_offer', $category)}}">
                                                        <span class="btn btn-primary">Registrar oferta</span>
                                                    </a>
                                                </li>
                                            </div>
        
                                        </div>
                                    </div>
        
                                </div>

                                <div class="tab-pane fade" id="list-post" user="tabpanel" aria-labelledby="list-post-list">
                                    
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4>Postulados</h4>
                                        </div>
                                    </div>
                                    <div class="profile-feed">
                                        <div class="d-flex align-items-start profile-feed-item">
        
                                            <div class="table-responsive">
                                                <table id="order-listing" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Nombre</th>
                                                            <th>Apellidos</th>
                                                            <th>Teléfono/Celular</th>
                                                            <th>Correo electrónico</th>
                                                            <th>Carrera</th>
                                                            <th>Semestre</th>
                                                            
                                                         
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                        @foreach ($students as $providers)
                                                         @foreach($providers as $provider)
                                    @if(Auth::user()->type == 'admin' || Auth::user()->id == $provider->user_id || Auth::user()->type == 'Empresa')
                                        <tr>
                                            <th scope="row">
                                                <a href="{{route('providers.show',$provider)}}">{{$provider->name}}</a>
                                            </th>
                                            <td>{{$provider->lastname}}</td>
                                            <td>{{$provider->phone}}</td>
                                            <td>{{$provider->email}}</td>
                                            <td>{{$provider->career}}</td>
                                            <td>{{$provider->semester}}</td>
                                            
                                            
                                        </tr>
                                    @endif
                                    @endforeach
                                @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>     
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{route('categories.index')}}" class="btn btn-primary float-right">Regresar</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/profile-demo.js') !!}
{!! Html::script('melody/js/data-table.js') !!}
<script>
    window.onload = function(){
        var fecha = new Date(); //Fecha actual
        var mes = fecha.getMonth()+1; //obteniendo mes
        var dia = fecha.getDate(); //obteniendo dia
        var ano = fecha.getFullYear(); //obteniendo año
        if(dia<10)
          dia='0'+dia; //agrega cero si el menor de 10
        if(mes<10)
          mes='0'+mes //agrega cero si el menor de 10
        document.getElementById('fecha_fin').value=ano+"-"+mes+"-"+dia;
      }
</script>
@endsection