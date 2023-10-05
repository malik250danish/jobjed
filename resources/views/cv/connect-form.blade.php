<button class="btn  btn-default" data-toggle="modal" data-target="#form_{{ $result->id }}">Connect</button>
<div class="modal fade modal-fade-in-scale-up" tabindex="-1" id="form_{{ $result->id }}" role="dialog" 
    aria-labelledby="modalLabelfade" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form  action="{{ url('/cv/connect/'.$result->id) }}" method="POST" class="form-horizontal">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title" id="modalLabelfade">CV Connect Form</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- CSRF Token -->
                            @csrf
                            <label for="name" class="control-label">Name *</label><br>
                            <input id="name" required name="name" type="text" value="" 
                            placeholder="Name" class="form-control required" value="{!! old('name') !!}"/>
                            {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="name" class="control-label">Email *</label><br>
                            <input required name="email" type="text" value="" 
                            class="form-control required" value="{!! old('email') !!}"/>
                            {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn  btn-success" value="Save">
                    <button class="btn  btn-primary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>