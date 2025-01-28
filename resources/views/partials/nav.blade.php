@once
    <nav>
        @auth
        <a href="{{route('login.logout')}}">Logout</a>
        @endauth

        @guest
        <a href="{{route('login.show')}}">Se Connecter</a>
        @endguest

        <a href="{{route('homepage')}}">Accuelle</a>
        <a href="{{route('info.index')}}">info</a>
        <a href="{{route('profile.index')}}">profile</a>
        <a href="{{route('profile.create')}}">Ajouter Profile</a>
        
        @auth
        <a href="{{route('login.logout')}}">Logout</a>
        @endauth

        @guest
        <a href="{{route('login.show')}}">Se Connecter</a>
        @endguest
    </nav>
@endonce