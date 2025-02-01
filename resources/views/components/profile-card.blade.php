<div class="card {{$col ?? 'col-4'}}" style="width:{{$width ?? ''}};">
    <!--https://tse3.mm.bing.net/th?id=OIP.DIrnbeslk6gxXhagQMA44wHaEK&pid=Api&P=0&h=220-->
    <img src=" {{ asset('storage/'.$profile->image) }}" class="card-img-top" alt="..." style="height:400px !important">
    <div class="card-body">
        <h5 class="card-title">{{Str::slug($profile->name)}}</h5>
        <p class="card-text">{{$profile->bio}}</p>
        <a class="stretched-link" href="{{ route('profile.show',$profile->id)}}"></a>
    </div>
    <div class="card-foot p-3 bg-light  d-flex" style="z-index: 9">
        @can('delete', $profile)
        <form method="POST" action="{{ route('profile.destroy',$profile->id)}}">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger mx-2 " onclick="return confirm('Are you sure')">Delete</button>
        </form>
        @endcan
        @can('delete', $profile)
        <form action="{{ route('profile.edit',$profile->id)}}" method="GET">
            @csrf
            <button class="btn btn-primary">Edit</button>
        </form>
        @endcan
    </div>
</div>