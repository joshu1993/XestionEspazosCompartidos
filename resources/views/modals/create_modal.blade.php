<div class="modal fade" id="createRegister" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header dblobck">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h4 class="modal-title">Confirmar Creación</h4>
            </div>
            <!--
            <div class="modal-body">                
                @lang('validation.attributes.createDescription')
                <form id="createType" name="createType" action="{{ route('nonconformities.createType') }}" method="POST">
                    <div class='row'>
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="form-group">
                                <label for="create_type_name" class="bmd-label-floating">@lang('validation.attributes.name')</label>
                                    <input type="text" class="form-control" id="create_type_name" name="create_type_name" value="">
                                <span id="invalid-feedback-name" class="invalid-feedback"></span>
                            </div>
                        </div>                        
                    </div>
                </form>                
            </div>
-->
            <div class="modal-footer mb-10 mr-10">
                <button type="button" class="btn btn-default btn-modalCancel" data-dismiss="modal">@lang('validation.attributes.cancel')</button>
                <button type="button" class="btn btn-primary btn-raised btn-modalAccept" data-url="" data-id="">@lang('validation.attributes.create')</button>
            </div>
        </div>
    </div>
</div>