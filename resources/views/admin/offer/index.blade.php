@extends('layouts.admin')
@section('title','Gestión de ofertas')
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
@if(Auth::user()->name == 'Admin' || Auth::user()->name == 'Empresa')
    <li class="nav item d-none d-lg-flex">
        <a class="nav-link" href="{{route('offers.create_offer', $category[0])}}">
            <span class="btn btn-primary">+ Crear nuevo</span>
        </a>
    </li>
@endif
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Ofertas
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ofertas</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Ofertas laborales</h4>
                        {{--  <i class="fas fa-ellipsis-v"></i>  --}}
                        <div class="btn-group">
                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a href="{{route('offers.create')}}" class="dropdown-item">Agregar</a>
                              {{--<a class="dropdown-item" href="{{route('print_barcode')}}">Exportar códigos de barras</a> --}}
                              {{--  <button class="dropdown-item" type="button">Another action</button>
                              <button class="dropdown-item" type="button">Something else here</button>  --}}
                            </div>
                          </div>
                    </div>

                    <div class="table-responsive">
                        
                                @foreach ($offers as $offer)
                                <div class="card shadow mt-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="border-bottom text-center pb-4">
                    
                                                    <h3>{{$offer->name}}</h3>
                                                    <div class="d-flex justify-content-between">
                                                    </div>
                                                </div>
                                                {{--  <div class="border-bottom py-4">
                                                    <div class="list-group">
                                                        <button type="button" class="list-group-item list-group-item-action active">
                                                            Sobre producto
                                                        </button>
                                                        <button type="button"
                                                            class="list-group-item list-group-item-action">Productos</button>
                                                        <button type="button" class="list-group-item list-group-item-action">Registrar
                                                            producto</button>
                                                    </div>
                                                </div>  --}}
                    
                                                <div class="py-4">
                                                    <p class="clearfix">
                                                        <span class="float-left">
                                                            Estatus
                                                        </span>
                                                        <span class="float-right text-muted">
                                                            {{$offer->status}}
                                                        </span>
                                                    </p>
                                                    <p class="clearfix">
                                                        <span class="float-left">
                                                            Compañía
                                                        </span>
                                                        <span class="float-right text-muted">
                                                            <a href="{{route('providers.show',$offer->category->id)}}">
                                                            {{$offer->category->name}}
                                                            </a>
                                                        </span>
                                                    </p>
                                                    
                                                    {{--  <p class="clearfix">
                                                        <span class="float-left">
                                                            Facebook
                                                        </span>
                                                        <span class="float-right text-muted">
                                                            <a href="#">David Grey</a>
                                                        </span>
                                                    </p>  --}}
                                                    {{--  <p class="clearfix">
                                                        <span class="float-left">
                                                            Twitter
                                                        </span>
                                                        <span class="float-right text-muted">
                                                            <a href="#">@davidgrey</a>
                                                        </span>
                                                    </p>  --}}
                                                </div>
                    
                                                {{--  <button class="btn btn-primary btn-block">{{$offer->status}}</button>  --}}
                                                @if ($offer->status == 'ACTIVE')
                                                <a href="{{route('change.status.offers', $offer)}}" class="btn btn-success btn-block">Activo</a>
                                                @else
                                                <a href="{{route('change.status.offers', $offer)}}" class="btn btn-danger btn-block">Inactivo</a>
                                                @endif
                                            </div>
                                            <div class="col-lg-8 pl-lg-5">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <h4>Información de la oferta</h4>
                                                    </div>
                                                </div>
                                                <div class="profile-feed">
                                                    <div class="d-flex align-items-start profile-feed-item">
                    
                                                        <div class="form-group col-md-6">
                                                            <strong><i class="fab fa-product-hunt mr-1"></i> Descripción</strong>
                                                            <p class="text-muted">
                                                                {{$offer->description}}
                                                            </p>
                                                            <hr>
                                                            <strong><i class="fab fa-product-hunt mr-1"></i> Salario</strong>
                                                            <p class="text-muted">
                                                                {{$offer->salary}}
                                                            </p>
                                                            <hr>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <strong>
                                                                <i class="fas fa-mobile mr-1"></i>
                                                                Fecha de expiración</strong>
                                                            <p class="text-muted">
                                                                {{$offer->expiration_date}}
                                                            </p>
                                                            <hr>
                                                            <strong><i class="fab fa-product-hunt mr-1"></i> Duración</strong>
                                                            <p class="text-muted">
                                                                {{$offer->duration}}
                                                            </p>
                                                            <hr>
                                                            <!--<strong><i class="fas fa-envelope mr-1"></i> Código de barras</strong>
                                                            <p class="text-muted">
                                                               {{-- {!!DNS1D::getBarcodeHTML($offer->code, 'EAN13'); !!} --}}
                                                            </p>-->
                                                            
                                                            {{--  <strong><i class="fas fa-map-marked-alt mr-1"></i> Categoría</strong>
                                                            <p class="text-muted">
                                                                {{$offer->category->name}}
                                                            </p>
                                                            <hr>  --}}
                                                            {{--  <strong><i class="fas fa-map-marked-alt mr-1"></i> Proveedor</strong>
                                                            <p class="text-muted">
                                                                {{$offer->provider->name}}
                                                            </p>
                                                            <hr>  --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted">
                                        @php
                                        $show = true;
                                    @endphp
                                        @foreach ($offer->applicants as $applicant)
                                            
                                            @if ($applicant->id != $offer->id && $applicant->id !=  Auth::user()->id || $offer->status == 'INACTIVE')
                                                @php
                                                    $show = false;
                                                @endphp
                                            @endif
                                        @endforeach
                                        
                                        @if ($show)
                                        {!! Form::open(['route'=>'purchaseDetails.store', 'method'=>'POST','files' => true]) !!}
                                            <div class="form-group">
                                                <input type="text" name="offer_id" id="offer_id" value="{{$offer->id}}" class="form-control d-none">
                                            </div>
                                            <button type="submit" class="btn btn-primary mr-2">Postularse</button>
                                        {!! Form::close() !!}
                                        @endif
                                    </div>
                                </div>
                            </div>
                                {{--<tr>
                                    <th scope="row">
                                        <a href="{{route('offers.show',$offer)}}">{{$offer->name}}</a>
                                    </th>
                                    <td>{{$offer->description}}</td>
                                    <td>{{$offer->salary}}</td>
                                    <td>{{$offer->duration}}</td>
                                    <td>{{$offer->expiration_date}}</td>
                                    <td>{{$offer->category->name}}</td>
                                    
                                    @if ($offer->status == 'ACTIVE')
                                    <td>
                                        <a class="jsgrid-button btn btn-success" href="{{route('change.status.offers', $offer)}}" title="Editar">
                                            Activo <i class="fas fa-check"></i>
                                        </a>
                                    </td>
                                    @else
                                    <td>
                                        <a class="jsgrid-button btn btn-danger" href="{{route('change.status.offers', $offer)}}" title="Editar">
                                            Desactivado <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                    @endif
                                    <td style="width: 50px;">
                                        {!! Form::open(['route'=>['offers.destroy',$offer], 'method'=>'DELETE']) !!}

                                        <a class="jsgrid-button jsgrid-edit-button" href="{{route('offers.edit', $offer)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        
                                        <button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit" title="Eliminar">
                                            <i class="far fa-trash-alt"></i>
                                        </button>

                                        {!! Form::close() !!}
                                    </td>
                                </tr>--}}
                                
                                @endforeach
                            
                    </div>
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$offers->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
@endsection