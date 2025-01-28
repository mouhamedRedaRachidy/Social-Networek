<x-master title="Se Connecter">
    <h1>Se Cennecte</h1>
    <form class="p-4 bg-light w-75 mx-0" action="{{ route('login')}}" method="post">
        @csrf
        <div class="input-groupe mb-2">
            <label for="">Email</label>
            <input type="text" name="email" value="{{ old('email')}}" class="form-control">
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="input-groupe mb-2">
            <label for="">Password</label>
            <input type="text" name="password" class="form-control">
            @error('password')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <button class="btn btn-primary">Connecter</button>
    </form>
</x-master>