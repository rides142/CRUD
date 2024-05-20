@extends('layouts.app')

@section('content')
<style>
main {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 50vh;
    padding: 2rem; /* Increased padding for better spacing on small screens */
}

h3 {
    font-size: 4em;
    text-align: center;
}

h2 {
    font-size: 2em;
    text-align: center;
}

/* Responsive design */
@media (max-width: 1200px) {
    main {
        padding: 1.5rem; /* Adjusted padding for large screens */
    }

    h3 {
        font-size: 3.5em;
    }

    h2 {
        font-size: 1.75em;
    }
}

@media (max-width: 992px) {
    main {
        padding: 1rem; /* Adjusted padding for medium screens */
    }

    h3 {
        font-size: 3em;
    }

    h2 {
        font-size: 1.5em;
    }
}

@media (max-width: 768px) {
    main {
        padding: 0.75rem; /* Adjusted padding for small screens */
    }

    h3 {
        font-size: 2.5em;
    }

    h2 {
        font-size: 1.25em;
    }
}

@media (max-width: 576px) {
    main {
        padding: 0.5rem; /* Adjusted padding for extra small screens */
    }

    h3 {
        font-size: 2em;
    }

    h2 {
        font-size: 1em;
    }
}

@media (max-width: 360px) {
    h3 {
        font-size: 1.5em; /* Adjusted font size for smaller screens */
    }

    h2 {
        font-size: 0.75em; /* Adjusted font size for smaller screens */
    }
}

</style>
    <main>
        <h3>Welcome To HAHA University</h3>
        <h2 >Universitas Mahasiswa Hacker</h2>

        <h2>Nama : {{ $user->name }}</h2>
        <h2>Email : {{ $user->email }}</h2>
        <h2>Google ID : {{ $user->google_id }}</h2>
        <img src="{{ $user->avatar }}">
        <h2>Akun Dibuat : {{ $user->created_at }}</h2>
        <h2>Status : {{ $user->status }}</h2>
    </main>
@endsection
