{{-- Acciones/Botones que tienen las dataTables --}}
<div class="d-flex justify-content-around" style="gap: 10px">
    @foreach ($buttons as $button)
        @if (isset($button['modal']))
        <a
        class="delete-modal" 
        href="{{'javascript:void(0);'}}"  
        data-toggle="modal" 
        data-target="#{{$button['modal']}}"
        data-route="{{$button['route']}}"
        >{!! $button['icon'] !!}</a>
        @else
        <a href="{{$button['route']}}">{!! $button['icon'] !!}</a>
        @endif
    @endforeach
</div>