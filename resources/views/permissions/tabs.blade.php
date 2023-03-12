<ul class="nav nav-tabs" id="myTab" role="tablist">
    @foreach ($modulePermissions as $modulePermission)
        @php
            $name = $modulePermission['name'];
        @endphp

        <li class="nav-item">
            <a 
                class="nav-link @if ($loop->index == 0) {{'active'}} @endif" 
                id="{{$name}}-tab" 
                data-toggle="tab" 
                href="#{{$name}}" 
                role="tab" 
                aria-controls="{{$name}}" 
                aria-selected="true"
            >{{$name}}</a>
        </li>
    @endforeach
</ul>

<div class="tab-content" id="myTabContent">
    @foreach ($modulePermissions as $modulePermission)
        @php
            $name = $modulePermission['name'];
        @endphp
        <div class="tab-pane fade pt-2 @if ($loop->index == 0) {{'show active'}} @endif" id="{{$name}}" role="tabpanel" aria-labelledby="{{$name}}-tab">
            <div class="form-check mb-2">
                <input 
                class="form-check-input checkAll" 
                type="checkbox"
                id="{{$name}}CheckAll"
                data-me="{{$modulePermission['id']}}"
                @if ($modulePermission['permission_module_id'] != null) {{"data-parent={$modulePermission['permission_module_id']}"}} @endif
                >
                <label class="form-check-label" for="{{$name}}CheckAll">Check all</label>
            </div>

            @if (!empty($modulePermission['all_sub_modules']))
                @include('permissions.tabs', ['modulePermissions' => $modulePermission['all_sub_modules']])
            @else
                @foreach ($modulePermission['permission_permissions'] as $permission)
                    <div class="form-check">
                        <input 
                            class="form-check-input checkChild" 
                            type="checkbox" 
                            name="permissions[{{$permission['id']}}]"
                            id="{{$name . '-' . $permission['id']}}"
                            data-parent="{{$modulePermission['id']}}" 
                            @if (isset($rolePermissions[$permission['id']]))
                                {{'checked'}}
                            @elseif (isset($userPermissions[$permission['id']]))
                                {{'checked'}}
                            @endif
                            @if (isset($rolePermissions[$permission['id']]) && isset($user))
                                {{'disabled'}}
                            @endif
                        >
                        <label class="form-check-label" for="{{$name . '-' . $permission['id']}}">
                        {{$permission['permission_function']['name']}}
                        </label>
                    </div>
                @endforeach
            @endif
        </div>
    @endforeach
</div>