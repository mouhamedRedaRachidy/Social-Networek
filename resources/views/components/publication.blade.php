@props(['publication','permeUpdate'])
<div class="card ">
    <div class="card-header d-flex gap-3 align-items-center position-relative">
        <img width="70px" style="height: 70px"  class="rounded-circle" src="{{ asset('storage/'.$publication->profile->image)}}" alt="">
        <h2>{{$publication->profile->name}}</h2>
        <a href="{{ route('profile.show',$publication->profile->id)}}" class="stretched-link"></a>
    </div>
    <div class="card-body">
    
      
        <div class="btns d-flex float-end gap-2">
            @can('update',$publication)
            <a href="{{ route('publication.edit',$publication->id)}}" class="btn btn-primary ">edit</a>
            @endCan
            @can('delete', $publication)
            <form action=" {{ route('publication.destroy',$publication->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Voulez vous supprmer ce projet')" class="btn btn-danger">Delete</button>
            </form>
            @endcan
        </div>
        

        <h5 class="card-title my-2">{{$publication->titre}}</h5>
        <p class="card-text">{{$publication->body}}</p>
    </div>
    @if(!is_null($publication->image))
        <img class="img-fluid " style="height: 450px !important;" src="{{ asset('storage/'.$publication->image)}}" class="card-img-top" alt="...">
    @endIf

</div>