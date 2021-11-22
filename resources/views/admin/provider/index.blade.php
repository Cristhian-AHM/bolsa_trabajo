@extends('layouts.admin')
@section('title','Gestión de estudiantes')
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
    @if(Auth::user()->name == 'Admin')
        <li class="nav item d-none d-lg-flex">
            <a class="nav-link" href="{{route('providers.create')}}">
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
            Estudiantes
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Estudiantes</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Estudiantes</h4>
                        {{--  <i class="fas fa-ellipsis-v"></i>  --}}
                        <div class="btn-group">
                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a href="{{route('providers.create')}}" class="dropdown-item">Agregar</a>
                              {{--  <button class="dropdown-item" type="button">Another action</button>
                              <button class="dropdown-item" type="button">Something else here</button>  --}}
                            </div>
                          </div>
                    </div>

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
                                    
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($providers as $provider)
                                    @if(Auth::user()->name == 'Admin' || Auth::user()->id == $provider->user_id || Auth::user()->name == 'Empresa')
                                        <tr>
                                            <th scope="row">
                                                <a href="{{route('providers.show',$provider)}}">{{$provider->name}}</a>
                                            </th>
                                            <td>{{$provider->lastname}}</td>
                                            <td>{{$provider->phone}}</td>
                                            <td>{{$provider->email}}</td>
                                            <td>{{$provider->career}}</td>
                                            <td>{{$provider->semester}}</td>
                                            
                                            <td style="width: 50px;">
                                                {!! Form::open(['route'=>['providers.destroy',$provider], 'method'=>'DELETE']) !!}

                                                <a class="jsgrid-button jsgrid-edit-button" href="{{route('providers.edit', $provider)}}" title="Editar">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                
                                                <button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit" title="Eliminar">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>

                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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