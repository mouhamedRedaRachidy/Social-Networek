@props(['type'])
<div class="alert alert-{{$type}} p-2">
    {{$slot}}
</div>