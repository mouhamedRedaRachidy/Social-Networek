@props(['publication'])

<div class="card my-2">
    <div class="card-header d-flex gap-5 ">
        <div class="d-flex gap-2 align-items-center">
            <h5>{{$publication->profile?->name}}</h5>
            <img  width="40px" style="height: 40px !important; border-radius:50% !important;" src="{{ asset('storage/'.$publication->profile?->image)}}" alt="" class="rounded">
        </div>
        <div class="d-flex gap-2 aligns-items-center">
            @can('update', $publication)
            <a href="{{ route('publication.edit',$publication->id)}}" class="btn btn-primary">Edit</a>
            @endcan
            @can('delete', $publication)
            <form action="{{ route('publication.destroy',$publication->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            @endcan
        </div>
    </div>
    <div class="card-body">
        <h6>{{$publication->titre}}</h6>
        @if (!is_null($publication->image))
        <img class="img-fluid " style="height: 450px !important;" src="{{ asset('storage/'.$publication->image)}}" class="card-img-top" alt="...">
        @endif
    </div>
</div>

