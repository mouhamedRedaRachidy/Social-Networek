<x-master title="show">
    <div class="row">
        <x-profile-card col='col-12' :profile='$profile'/>
    </div>
    <div class="row">
        <h2>Publication</h2>
        @foreach($profile->publication as $publication)
            <x-publication  :permeUpdate='Auth::id()===$publication->profile_id' :publication='$publication' />
        @endforeach
    </div>
</x-master>