@extends('layouts.app')

@section('content')
@include('modals.delete_modal')
<div id="inner-content" class="container">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-11">
                        <h3>Salas</h3>
                    </div>
                    @if (  Auth::user()->role_id==1 )
                    <div class="col-md-1">
                        <span class="btn-group-sm">
                            <button id="new_sala" name="new_sala" type="button" title="Nueva sala" class="btn btn-primary bmd-btn-fab" data-target = "#create-item"><i class="material-icons">add</i></button>
                        </span>
                    </div>   
                    @endif             
                </div>
            </div>

            <div class="card-body">
                <input type="hidden"  id="idUser" name="idUser" value="{{ Auth::user()->id ?? '' }}"> 
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="table-responsive no-scroll">
                            @if (  Auth::user()->role_id==1 )   
                                <table id="salasTableAdmin" class="table table-striped table-bordered table-hover dt-responsive display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nombre Sala</th>
                                            <th>Aforo</th>
                                            <th>Proyector</th>
                                            <th>Color</th>
                                            <th>Calendario</th>
                                            <th></th>
                                            
                                        </tr>
                                    </thead>
                                </table>
                            @else
                                <table id="salasTable" class="table table-striped table-bordered table-hover dt-responsive display nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Nombre Sala</th>
                                                <th>Aforo</th>
                                                <th>Proyector</th>
                                                <th>Color</th>
                                                <th>Calendario</th>
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
    <script src="{{ asset('js/salas.js?v=1.0.0') }}"></script>
@endsection