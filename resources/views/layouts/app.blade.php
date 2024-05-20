<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COBA COBA</title>
    <style>
   * {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    box-sizing: border-box;
    padding: 0;
    margin: 0;
}

body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

header {
    background-color: red;
    height: auto;
    padding: 1rem;
}

nav {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
}

.tittlenav {
    margin-top: 2px;
}

.tittlenav > h1 {
    font-size: 40px;
    color: blue;
}

.tittlenav > h1 > span {
    color: black;
}

ul {
    display: flex;
    list-style: none;
    gap: 2rem;
    font-size: 30px;
    padding: 0;
    margin: 0;
}

ul li a {
    text-decoration: none;
    color: white;
}

footer {
    margin-top: auto; /* Push footer to the bottom of the page */
    background-color: black;
    color: white;
    padding: 1rem;
    text-align: center;
}

/* Responsive design */
@media (max-width: 768px) {
    .tittlenav > h1 {
        font-size: 30px;
    }

    ul {
        gap: 1rem;
        font-size: 20px;
    }

    header {
        padding: 1rem;
    }

    footer {
        font-size: 20px;
        padding: 0.5rem; /* Adjusted padding for smaller screens */
    }
}

@media (max-width: 480px) {
    nav {
        flex-direction: column;
        align-items: flex-start;
    }

    .tittlenav > h1 {
        font-size: 24px;
    }

    ul {
        flex-direction: column;
        gap: 0.5rem;
        font-size: 18px;
    }

    header {
        padding: 0.5rem;
    }

    footer {
        font-size: 18px;
        padding: 0.5rem; /* Adjusted padding for smaller screens */
    }
}

        </style>
    </head>

    <body>
        <header>
            <nav>
                <div class="tittlenav">
                    <h1>HAHA<span> University</span></h1>
                </div>
                <ul>
                    <li><a href="/dashboard">Home</a></li>
                    <li><a href="/inputform">Tambah Mahasiswa</a></li>
                    <li><a href="/datamahasiswa">Mahasiswa</a></li>
                    <li><a href="/logout">Logout</a></li>
                </ul>
            </nav>
        </header>
        @yield('content')
                <footer>
        <h4 >Copyleft &copy; 2030 University Gelud Global</h4>
                </footer>

</body>
<script>
    var msg = '{{ Session::get('alert') }}';
    var exist = '{{ Session::has('alert') }}';
    if (exist) {
        alert(msg);
    }
</script>

</html>
