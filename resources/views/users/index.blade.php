@extends('layouts.app')

@section('content')
@include('modals.delete_modal')
<div id="inner-content" class="container">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-11">
                        <h3>Usuarios</h3>
                    </div>
                    <div class="col-md-1">
                        <span class="btn-group-sm">
                            <button id="new_user" name="new_user" type="button" title="Nuevo usuario" class="btn btn-primary bmd-btn-fab" data-target = "#create-item"><i class="material-icons">add</i></button>
                        </span>
                    </div>                
                </div>
            </div>

            <div class="card-body">
                <input type="hidden" id="idUser" name="idUser" value="{{ $auth_user['id'] ?? '' }}">            
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="table-responsive no-scroll">
                            <table id="usersTable" class="table table-striped table-bordered table-hover dt-responsive display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nombre Usuario</th>
                                        <th>DNI</th>
                                        <th>Email</th>
                                        <th>Rol</th>
                                        <th></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('js/users.js?v=1.0.0') }}"></script>
@endsection
