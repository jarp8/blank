<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{$role->name ?? ''}}">
</div>

<div class="row">
    <div class="col-12 text-right">
        <input type="submit" class="btn btn-primary" value="Submit">
    </div>
</div>