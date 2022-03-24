<div class="modal fade" id="editRegister" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header dblobck">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h4 class="modal-title">Confirmar edición</h4>
            </div>
            <!--
            <div class="modal-body">                
                @lang('validation.attributes.editDescription')
                <form id="editType" name="editType" action="{{ route('nonconformities.editType') }}" method="POST">
                    <input type="hidden" id="idEditType" name="idEditType" value="">
                    <div class='row'>
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="form-group">
                                <label for="type_name" class="bmd-label-floating">@lang('validation.attributes.name')</label>
                                    <input type="text" class="form-control" id="type_name" name="type_name" value=" ">
                                <span id="invalid-feedback-name" class="invalid-feedback"></span>
                            </div>
                        </div>                        
                    </div>
                </form>                
            </div>
-->
            <div class="modal-footer mb-10 mr-10">
                <button type="button" class="btn btn-default btn-modalCancel" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary btn-raised btn-modalAccept" data-url="" data-id="">Guardar</button>
            </div>
        </div>
    </div>
</div>