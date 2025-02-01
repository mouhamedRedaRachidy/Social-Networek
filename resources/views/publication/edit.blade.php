<x-master title="Update">
    <h1>Modifier</h1>
    <form action="{{ route('publication.update',$publication->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="input-groupe">
            <label for="">Titre</label>
            <input type="text" name="titre" class="form-control" value="{{!$errors->has('titre')?old('body',$publication->titre):''}}">
            @error('titre') <span class="text-danger">{{$message}}</span> @endError
        </div>
        <div class="input-groupe">
            <label for="">Description</label>
            <textarea name="body" id="" cols="30" rows="10" class="form-control">
                {{!$errors->has('body')?old('body',$publication->body):''}}
            </textarea>
            @error('titre') <span class="text-danger">{{$message}}</span> @endError
        </div>
        <div class="input-groupe">
            <label for="">Image</label>
            <input type="file" name="image" class="form-control">
            @error('image') <span class="text-danger">{{$message}}</span> @endError
        </div>
        <div class="my-2">
            <img src="{{asset('storage/'.$publication->image)}}" width="200px" alt="">
        </div>
        <button class="btn btn-primary" type="submit">Edit</button>
    </form>
</x-master>