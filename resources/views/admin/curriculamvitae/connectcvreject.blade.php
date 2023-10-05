<button class="btn btn-danger" data-toggle="modal" class="tab bg-white" data-target="#cv_{{ $result->id }}">Reject</button>
<div class="modal fade modal-fade-in-scale-up" tabindex="-1" id="cv_{{ $result->id }}" role="dialog" aria-labelledby="modalLabelfade" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-header bg-primary">
            <h4 class="modal-title" id="modalLabelfade">
                Cancel Request
                <button class="btn  btn-primary" style="float:right" data-dismiss="modal">Close</button>
            </h4>
        </div>
        <div class="modal-content" >
            <form method="POST" action="{{ url('admin/curriculamvitae/reject/'.$result->id) }}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <textarea class="form-control" name="reason" style="width:100%" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="cancel" class="btn  btn-default" value="Reject">
                </div>
            </form>
        </div>
    </div>
</div>