@extends('layouts.admin')
@section('title','Información de la oferta')
@section('styles')

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
            {{$offer->name}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index')}}">Oferta laboral</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$offer->name}}</li>
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
                            @if(Auth::user()->type == 'admin')
                                @if ($offer->status == 'ACTIVE')
                                <a href="{{route('change.status.offers', $offer)}}" class="btn btn-success btn-block">Activo</a>
                                @else
                                <a href="{{route('change.status.offers', $offer)}}" class="btn btn-danger btn-block">Inactivo</a>
                                @endif
                            @else
                                @if ($offer->status == 'ACTIVE')
                                <a class="btn btn-success btn-block">Activo</a>
                                @else
                                <a class="btn btn-danger btn-block">Inactivo</a>
                                @endif
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
                    <a href="{{route('products.index')}}" class="btn btn-primary float-right">Regresar</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/profile-demo.js') !!}
{!! Html::script('melody/js/data-table.js') !!}
@endsection