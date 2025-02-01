<x-master title='Create'>
    @if ($errors->any())
    <x-alert type='danger'>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach   
    </x-alert>     
    @endif
    <h1>Modifier Profile</h1>
    <form action="{{ route('profile.update',$profile->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="input-groupe mb-2">
            <label for="">Name</label>
            <input class="form-control" type="text" name="name"  value="{{$errors->has('name')?'':old('name',$profile->name)}}">
            @error('name') <p class="text-danger">{{$message}}</p> @endError
        </div>
        <div class="input-groupe mb-2">
            <label for="">Email</label>
            <input class="form-control" type="text" name="email"  value="{{old('email',$profile->email)}}">
            @error('email') <p class="text-danger">{{$message}}</p> @endError
        </div>
        <div class="input-groupe mb-2">
            <label for="">Password</label>
            <input class="form-control" type="password" name="password" value="{{old('password')}}">
            @error('password') <p class="text-danger">{{$message}}</p> @endError
        </div>
        <div class="input-groupe mb-2">
            <label for="">Confirmer Password</label>
            <input class="form-control" type="password" name="password_confirmation">
        </div>
        <div class="input-groupe mb-2">
        <label for="">Bio</label>          
        <textarea class="form-control" name="bio" id="" cols="20" rows="10">
            {{old('bio',$profile->bio)}}
        </textarea>
        @error('bio') <p class="text-danger">{{$message}}</p> @endError
        </div>
        <div class="input-groupe mb-2">
            <label for="">Image</label>
            <input class="form-control" type="file" name="image">
            @error('image') <p class="text-danger">{{$message}}</p> @endError
        </div>
        <button class="btn btn-primary" type="submit">Edit</button>
    </form>
</x-master>