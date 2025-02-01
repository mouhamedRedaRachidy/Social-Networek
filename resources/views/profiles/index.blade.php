<x-master title="Profile">
    <h1>Profiles</h1>

    @if ($profiles->isEmpty())
        <h2 class="text-center text-primary">Pas profile</h2>
    @endif
    <div class="row gap-2 my-4" >
        @foreach ($profiles as $profile)
            <x-profile-card width=' 24rem' :profile='$profile'/>
        @endforeach
    </div>
{{$profiles->links()}}

</x-master>