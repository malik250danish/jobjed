<!----Edit Icon----->
<i class="livicon" data-toggle="modal" data-target="#edit_{{ $result->id }}" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update {{ $result->name }}"></i>
<!----Edit Form----->
<div class="modal fade modal-fade-in-scale-up" tabindex="-1" id="edit_{{ $result->id }}" role="dialog" 
    aria-labelledby="modalLabelfade" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form  action="{{ url('admin/settings/occupations/update/'.$result->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title" id="modalLabelfade">Update Occuption</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- CSRF Token -->
                            @csrf
                            <label for="name" class="control-label">Name *</label><br>
                            <input id="name" required name="name" type="text" value="{{ $result->name }}" 
                            placeholder="Name" class="form-control required" value="{!! old('name') !!}"/>
                            {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Work Hold<br><span>Type then key press "Enter" and next tab type</span></label><br>
                            <textarea name="workhold" value="" placeholder="Work Hold" class="form-control workhold" rows="5">
                                @if(!is_null($result->workhold)) 
                                    @foreach($result->workhold as $work)
                                        {{ $work }}
                                    @endforeach
                                @endif
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn  btn-success" value="Update">
                    <button class="btn  btn-primary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>