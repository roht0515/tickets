<div class="modal fade" id="{{$idModal}}">
    <form id="{{$idForm}}" action="{{route($action)}}" method="{{$method}}" autocomplete="off">
        @csrf
        <div class="modal-dialog modal-{{$size}} ">
            <div class="modal-content">
                <div class="modal-header bg-{{$headerBg}}">
                    <h4 class="modal-title">{{$title}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body p-1">
                        {{$slot}}
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-{{$btnCloseClass}}" data-dismiss="modal">{{$btnCloseName}}</button>
                    <button type="submit" id="{{$idBtnSubmit}}" class="btn btn-{{$btnSubmitClass}}">{{$btnSubmitName}}</button>
                </div>
            <!-- /.modal-content -->
            </div>
        <!-- /.modal-dialog -->
        </div>
    </form>
</div>
