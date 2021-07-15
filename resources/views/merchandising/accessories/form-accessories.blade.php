<div class="card-body">
    <div class="form-group">
        <label for="code" class="col-sm-3 control-label">Name</label>

        <div class="col-sm-10">
            {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Name']) }}
            {{--<input type="text" class="form-control" id="" placeholder="Buyer Code">--}}
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-sm-3 control-label">Description</label>

        <div class="col-sm-10">
            {{ Form::text('description',null,['class'=>'form-control','placeholder'=>'Description']) }}
        </div>
    </div>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-info">Save</button>
    <button type="reset" class="btn btn-warning float-right">Reset</button>
</div>
