<div class="modal fade" id="viewRegister" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header dblobck">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h4 id="tituloModal" class="modal-title"></h4>
            </div>
            <div class="modal-body">                                
                <input type="hidden" id="idViewRegister" name="idViewRegister" value="">
                <p style="text-align: right">Antes del cambio</p>
                <div id="bloque_before"></div>
                <p style="text-align: right; margin-top: 3%;">Despues del cambio</p>
                <div id="bloque_after"></div>
            </div>
            <div class="modal-footer mb-10 mr-10">
                <button type="button" class="btn btn-primary btn-raised btn-modalAccept" data-dismiss="modal" id="buttonOK">OK</button>
            </div>
        </div>
    </div>
</div>