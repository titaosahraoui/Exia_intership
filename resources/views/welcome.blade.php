<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="{{ asset('css/Condidature.css') }}" />
        <link rel="manifest" href="{{ asset('manifest.json') }}">

        <!-- Other head elements -->
        /manifest.json
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            if ('serviceWorker' in navigator) {
  window.addEventListener('load', function() {
    navigator.serviceWorker.register('/service-worker.js').then(function(registration) {
      console.log('Service Worker registered with scope:', registration.scope);
    }).catch(function(error) {
      console.log('Service Worker registration failed:', error);
    });
  });
}

        </script>

        <title>Exia</title>
    </head>
    <body>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
    const userPhoto = document.getElementById("userPhoto");
    const logoutForm = document.getElementById("logoutForm");
    const loginButton = document.getElementById("loginButton");
    const registerButton = document.getElementById("registerButton");

    const isAuthenticated = userPhoto.getAttribute("src") !== "";

    if (isAuthenticated) {
        userPhoto.style.display = "inline-block";
        logoutForm.style.display = "inline-block";
        loginButton.style.display = "none";
        registerButton.style.display = "none";
    } else {
        userPhoto.style.display = "none";
        logoutForm.style.display = "none";
        loginButton.style.display = "inline-block";
        registerButton.style.display = "inline-block";
    }
});

        </script>
        <div class="body">
            <div class="navbar">
                <div class="logo">
                    <img
                        src="{{
                            asset(
                                'images/logo_EXIA_RVB_fondN-removebg-preview.png'
                            )
                        }}"
                        width="100"
                        alt="#"
                    />
                </div>
                <div class="searchbar">
                    <form class="form" action="{{ route('search') }}" method="GET">
                        <label for="search">
                            <input
                            class="input"
                            type="text"
                            name="query"
                            required=""
                            placeholder="Search..."
                            id="search"
                            />
                            <div class="fancy-bg"></div>
                            <div class="search">
                                <svg
                                    viewBox="0 0 24 24"
                                    aria-hidden="true"
                                    class="r-14j79pv r-4qtqp9 r-yyyyoo r-1xvli5t r-dnmrzs r-4wgw6l r-f727ji r-bnwqim r-1plcrui r-lrvibr"
                                >
                                    <g>
                                        <path
                                            d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"
                                        ></path>
                                    </g>
                                </svg>
                            </div>
                            <button class="close-btn" type="reset">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"
                                    ></path>
                                </svg>
                            </button>
                        </label>
                    </form>
                </div>
                <div class="links">
                    <a href="#" class="link">Entreprise</a>
                    <a href="/stage" class="link">Stage</a>
                    <a href="/" class="link">Home</a>
                    <a href="/wishlist" class="link">Wishlist</a>
                </div>
                <div class="buttons" style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                    @auth
    <img id="userPhoto" src="data:image/jpeg;base64,{{ Auth::user()->photo }}" alt="User Photo" width="30px" height="30px" style="
    border-radius: 50%;
    width: 50px;
    height: 50px;
    object-fit: cover;
    margin-bottom: 8px;
">
    <span style="color: white;">{{ Auth::user()->name }}</span>
    <form id="logoutForm" action="/logout" method="post">
        @csrf
        <button class="btn-index" id="logoutButton" type="submit">Logout</button>
    </form>
@else
    <button id="loginButton" class="btn-index"><a href="/login">Login</a></button>
    <button id="loginButton" class="btn-index">Register</button>
@endauth

                </div>
            </div>
            <div class="main">
                <div class="sidebar">
                    <div class="sidebara">
                        <div class="menu-item">
                            <a href="">
                                <img
                                    src="{{ asset('images/icone 4.png') }}"
                                    alt=""
                                    width="16%"
                                />Dashboard
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="">
                                <img
                                    src="{{ asset('images/icone 5.png') }}"
                                    alt=""
                                    width="16%"
                                />Messages<span class="notification">10</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="">
                                <img
                                    src="{{ asset('images/icone 6.png') }}"
                                    alt=""
                                    width="16%"
                                />Calendar
                            </a>
                        </div>
                        <div class="menu-section">
                            <div class="menu-section-header">ORGANIZATION</div>
                            <div class="menu-item">
                                <a href="/entreprises">
                                    <img
                                        src="{{ asset('images/icone 7.png') }}"
                                        alt=""
                                        width="16%"
                                    />Gestion d'entreprise
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="/condidature">
                                    <img
                                        src="{{ asset('images/icone 8.png') }}"
                                        alt=""
                                        width="16%"
                                    />Gestion des candidatures
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="/offrestage">
                                    <img
                                        src="{{ asset('images/icone 9.png') }}"
                                        alt=""
                                        width="16%"
                                    />Gestion des offres
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="/users">
                                    <img
                                        src="{{ asset('images/icone 10.png') }}"
                                        alt=""
                                        width="16%"
                                    />Gestion des promotions
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="sidebar">
                    <link
                        href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
                        rel="stylesheet"
                    />
                    <nav class="sidebar">
                        <div class="menu-bar">
                            <div class="menu">
                                <ul class="menu-links">
                                    <li class="nav-link">
                                        <a href="#">
                                            <i class="bx bx-home-alt icons"></i>
                                            <span class="text nav-text"
                                                >Dashboard</span
                                            >
                                        </a>
                                    </li>
                                    <li class="nav-link">
                                        <a href="/condidature">
                                            <i
                                                class="bx bx-bar-chart-alt-2 icons"
                                            ></i>
                                            <span class="text nav-text"
                                                >Gestion condidature</span
                                            >
                                        </a>
                                    </li>
                                    <li class="nav-link">
                                        <a href="#">
                                            <i class="bx bx-bell icons"></i>
                                            <span class="text nav-text"
                                                >Gestion des offre de
                                                stage</span
                                            >
                                        </a>
                                    </li>
                                    <li class="nav-link">
                                        <a href="#">
                                            <i
                                                class="bx bx-pie-chart-alt icons"
                                            ></i>
                                            <span class="text nav-text"
                                                >Gestion des Entreprise</span
                                            >
                                        </a>
                                    </li>
                                    <li class="nav-link">
                                        <a href="/CreateUser">
                                            <i class="bx bx-heart icons"></i>
                                            <span class="text nav-text"
                                                >Gestion des Etudiant</span
                                            >
                                        </a>
                                    </li>
                                    <li class="nav-link">
                                        <a href="#">
                                            <i
                                                class="bx bx-wallet-alt icons"
                                            ></i>
                                            <span class="text nav-text"
                                                >Gestion des promotion</span
                                            >
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <ul>
                        <li>Dashboard</li>
                        <li>Message</li>
                        <li>calender</li>
                    </ul>
                    <p>Organization</p>
                    <ul>
                        <li>Gestion entreprise</li>
                        <li>Gestion de condidature</li>
                        <li>Gestion des offre</li>
                        <li>Gestion des promotion</li>
                    </ul> 
                     -->
                </div>
                <div class="main_section" style="width: 100%; height: 100%;">@yield('content')</div>
            </div>
        </div>
    </body>
</html>
