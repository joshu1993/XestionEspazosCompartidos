@extends('layouts.app')

@section('content')
@include('modals.event_modal')
<div id="inner-content" class="container">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-11">
                        <h3>Eventos</h3>
                    </div>
                            
                </div>
            </div>

            <div class="card-body">
                <input type="hidden" id="idUser" name="idUser" value="{{ $auth_user['id'] ?? '' }}"> 
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="table-responsive no-scroll">
                            @if (  Auth::user()->role_id==1 ) 
                                <table id="eventosTableAdmin" class="table table-striped table-bordered table-hover dt-responsive display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Fin</th>
                                            <th>Nombre Usuario</th>
                                            <th>DNI Usuario</th>
                                            <th>Correo Usuario</th>
                                            <th>Sala</th>   
                                        </tr>
                                    </thead>
                                </table>
                            @else
                                <table id="eventosTable" class="table table-striped table-bordered table-hover dt-responsive display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Fin</th>
                                            <th>Sala</th>   
                                        </tr>
                                    </thead>
                                </table>
                            @endif 
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
    <script src="{{ asset('js/eventosTabla.js?v=1.0.0') }}"></script>
@endsection