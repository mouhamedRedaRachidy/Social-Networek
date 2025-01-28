<div class="card {{$col ?? 'col-4'}}" style="width:{{$width ?? ''}};">

    <img src="https://tse3.mm.bing.net/th?id=OIP.DIrnbeslk6gxXhagQMA44wHaEK&pid=Api&P=0&h=220" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{Str::slug($profile->name)}}</h5>
        <p class="card-text">{{$profile->bio}}</p>
        <a class="stretched-link" href="{{ route('profile.show',$profile->id)}}"></a>
    </div>
    <div class="card-foot p-3 bg-light" style="z-index: 9">
        <form method="POST" action="{{ route('profile.delete',$profile->id)}}">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" onclick="return confirm('Are you sure')">Delete</button>
        </form>
    </div>
</div>