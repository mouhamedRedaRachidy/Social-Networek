@once
    <nav>

        <a href="{{route('homepage')}}">Accuelle</a>
        <a href="{{route('info.index')}}">info</a>
        <a href="{{route('profile.index')}}">profile</a>
        <a href="{{route('profile.create')}}">Ajouter Profile</a>
        <a href="{{ route('publication.index')}}">Publication</a>
        @auth
        <a href="{{route('login.logout')}}">Logout</a>
        <a href="{{route('publication.create')}}">Ajouter publication</a>
        <button class="btn btn-primary">{{Auth::user()->name}}</button>
        @endauth

        @guest
       
        <a href="{{route('login.show')}}">Se Connecter</a>
        @endguest
    </nav>
@endonce