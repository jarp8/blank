<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{$user->name ?? ''}}">
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{$user->email ?? ''}}">
</div>

<div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
</div>

<div class="form-group">
    <label for="role_id">Role</label>
    <select class="custom-select" name="role_id">
        @if (!isset($user))
            <option selected disabled>--Select role--</option>
        @endif

        @foreach ($roles as $key => $role)
            <option value="{{$key}}" {{isset($user) && $user->role_id == $key ? 'selected' : ''}}>{{$role}}</option>
        @endforeach
    </select>
</div>
<div class="row">
    <div class="col-12 text-right">
        <input type="submit" class="btn btn-primary" value="Submit">
    </div>
</div>