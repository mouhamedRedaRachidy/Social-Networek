<x-master title="Profile">
    <h1>Profiles</h1>
    <div class="row gap-2 my-4" >
            @foreach ($profiles as $profile)
                <x-profile-card width=' 24rem' :profile='$profile'/>
            @endforeach
    </div>
    {{$profiles->links()}}

</x-master>