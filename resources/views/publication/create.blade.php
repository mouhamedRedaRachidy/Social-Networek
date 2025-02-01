<x-master title="Publication">
    <h1>Ajouter Publication</h1>
    <form action="{{ route('publication.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-groupe mb-2">
            <label for="">Titre</label>
            <input type="text" name="titre" class="form-control" value="{{!$errors->has('titre')?old('titre'):''}}">
            @error('titre') <span class="text-danger"> {{$message}}</span> @endError
        </div>
        <div class="input-groupe mb-2">
            <label for="">Description</label>
            <textarea name="body" class="form-control" id="" cols="30" rows="10">{{!$errors->has('body')?old('body'):''}}</textarea>
            @error('body') <span class="text-danger"> {{$message}}</span>  @endError
        </div>
        <div class="input-groupe mb-2">
            <label for="">Image</label>
            <input type="file" name="image" class="form-control">
            @error('image') <span class="text-danger"> {{$message}}</span> @endError
        </div>
        <button class="btn btn-primary" type="submit">Ajouter</button>
    </form>
</x-master>