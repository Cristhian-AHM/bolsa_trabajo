@extends('layouts.admin')
@section('title','Información del estudiante')
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
            {{$provider->name}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li> <li class="breadcrumb-item"><a href="{{route('providers.index')}}">Estudiantes</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$provider->name}}</li>
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
                                <h3>{{$provider->name}}</h3>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>
                            <div class="border-bottom py-4">
                                <div class="list-group">
                                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" user="tab" aria-controls="home">
                                        Datos del estudiante
                                    </a>
                                    <a type="button" class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" user="tab" aria-controls="profile">Experiencia laboral</a>
                                    <a type="button" class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" user="tab" aria-controls="messages">Historial de postulaciones</a>
                                    {{-- <a type="button" class="list-group-item list-group-item-action" href="{{route('reports.provider', $provider)}}">Reporte de ventas</a> --}}
                                </div>
                            </div>
                        </div>



                        <div class="col-lg-8 pl-lg-5">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="list-home" user="tabpanel" aria-labelledby="list-home-list">
                                    
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4>Información del estudiante</h4>
                                        </div>
                                    </div>
                                    <div class="profile-feed">
                                        <div class="d-flex align-items-start profile-feed-item">

                                        

                                            <div class="form-group col-md-6">
                                                <strong><i class="fab fa-product-hunt mr-1"></i> Nombre</strong>
                                                <p class="text-muted">
                                                    {{$provider->name}} {{$provider->lastname}} 
                                                </p>
                                                <hr>
                                                <strong><i class="fas fa-address-card mr-1"></i>Semestre</strong>
                                                <p class="text-muted">
                                                    {{$provider->semester}}
                                                </p>
                                                <hr>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <strong>
                                                    <i class="fas fa-mobile mr-1"></i>
                                                    Teléfono</strong>
                                                <p class="text-muted">
                                                    {{$provider->phone}}
                                                </p>
                                                <hr>
                                                <strong><i class="fas fa-envelope mr-1"></i> Correo</strong>
                                                <p class="text-muted">
                                                    {{$provider->email}}
                                                </p>
                                                <hr>
                                                <strong><i class="fas fa-map-marked-alt mr-1"></i> Carrera</strong>
                                                <p class="text-muted">
                                                    {{$provider->career}}
                                                </p>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="list-profile" user="tabpanel" aria-labelledby="list-profile-list">
                                    
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4>Experiencia de trabajo</h4>
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
                                                            <th>Fecha de inicio</th>
                                                            <th>Fecha de terminación</th>
                                                            <th>Posición</th>
                                                            <th>Referencia</th>
                                                            <th>Estado</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($provider->products as $product)
                                                        <tr>
                                                            <th scope="row">
                                                                <a href="{{route('products.show',$product)}}">{{$product->name}}</a>
                                                            </th>
                                                            <td>{{$product->description}}</td>
                                                            <td>{{$product->start_date}}</td>
                                                            <td>{{$product->end_date}}</td>
                                                            <td>{{$product->position}}</td>
                                                            <td>{{$product->reference}}</td>
                                                            @if ($product->status == 'ACTIVE')
                                                            <td>
                                                                <a class="jsgrid-button btn btn-success" href="{{route('change.status.products', $product)}}" title="Editar">
                                                                    Activo <i class="fas fa-check"></i>
                                                                </a>
                                                            </td>
                                                            @else
                                                            <td>
                                                                <a class="jsgrid-button btn btn-danger" href="{{route('change.status.products', $product)}}" title="Editar">
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
                                                    <a class="nav-link" href="{{route('products.create_work', $provider)}}">
                                                        <span class="btn btn-primary">Registrar trabajo</span>
                                                    </a>
                                                </li>
                                            </div>
        
                                        </div>
                                    </div>
        
                                </div>

                                <div class="tab-pane fade" id="list-messages" user="tabpanel" aria-labelledby="list-messages-list">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4>Historial de Ofertas</h4>
                                        </div>
                                    </div>
                                    <div class="profile-feed">
                                        <div class="d-flex align-items-start profile-feed-item">
    
                                            <div class="table-responsive">
                                                <table id="order-listing1" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Nombre</th>
                                                            <th>Descripción</th>
                                                            <th>Fecha de aplicación</th>
                                                            <th>Salario</th>
                                                            <th>Duración</th>
                                                            <th>Estado</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                          $index = 0;  
                                                        @endphp
                                                        
                                                        @foreach ($offers as $offer)
                                                        <tr>
                                                            <th scope="row">
                                                                @foreach($offersLeft as $left)
                                                                    @if ($left->id == $offer->offer_id)
                                                                        @php
                                                                            $index = $left;
                                                                        @endphp
                                                                        @break
                                                                    @endif
                                                                @endforeach
                                                                
                                                                
                                                                <a href="{{route('offers.show', $index)}}">{{$offer->name}}</a>
                                                            </th>
                                                            <td>{{$offer->description}}</td>
                                                            <td>{{$offer->application_date}}</td>
                                                            <td>{{$offer->salary}}</td>
                                                            <td>{{$offer->duration}}</td>
                        
                                                            @if ($offer->status == 'ACTIVE')
                                                            <td>
                                                                <a class="jsgrid-button btn btn-success" title="Editar">
                                                                    Activo <i class="fas fa-check"></i>
                                                                </a>
                                                            </td>
                                                            @else
                                                            <td>
                                                                <a class="jsgrid-button btn btn-danger" title="Editar">
                                                                    Cancelado <i class="fas fa-times"></i>
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
                                            </div>
    
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                        




                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{route('providers.index')}}" class="btn btn-primary float-right">Regresar</a>
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