
<link rel="stylesheet" href="{{ asset('css/Condidature.css') }}" />
<style>
    .container4{
    width: 1052px;
    height: 502px;
    
    margin-left: 181px;
    border-radius: 39px;
    background: linear-gradient(283.29deg, #B5D7DD -18.76%, #4C4CCD 106.02%);
    
    align-items: center;
}
.Offredestage{
    width: 349px;
height: 73px;
border-radius: 100px;
opacity: 0.8px;
background: #B5D7DD;
font-family: Roboto;
font-size: 32px;
font-weight: 700;
line-height: 28px;
letter-spacing: 0em;
text-align: center;
color: white;
margin-top: 50px;
}
.ETUDIANT{
    width: 211px;
    height: 70px;
    background: #9F9BDC;

    border-radius: 100px;
    font-family: Roboto;
font-size: 24px;
font-weight: 700;
line-height: 26px;
letter-spacing: 0em;
text-align: center;
color: white;
cursor: pointer;
margin-top: 50px;
}



.ENTREPRISE{
    margin-top: 50px;
    width: 211px;
height: 70px;
background: #B5D7DD;
font-family: Roboto;
font-size: 24px;
font-weight: 700;
line-height: 26px;
letter-spacing: 0em;
text-align: center;
color: white;
border-radius: 100px;
cursor: pointer;

}

.footer {
    background: linear-gradient(283.29deg, #B5D7DD -18.76%, #4C4CCD 106.02%);
    color: #fff;
    padding: 30px 0;
}

.footer-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
}

.footer-logo img {
    width: 80px; /* Adjust the logo size as needed */
}

.footer-links ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.footer-links li {
    display: inline;
    margin-right: 20px;
}

.footer-links a {
    color: #fff;
    text-decoration: none;
}

.footer-social ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.footer-social li {
    display: inline;
    margin-right: 10px;
}

.footer-social img {
    width: 30px; /* Adjust the social media icon size as needed */
    vertical-align: middle;
}

.footer-bottom {
    text-align: center;
    margin-top: 20px;
}

.footer-bottom p {
    font-size: 14px;
}
</style>



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
<div class="container" style="display: flex; justify-content: space-around; align-items: center; color: white;">
    <div class="Texte1" style="font-size: larger; font-weight: bold; width: 50%; padding: 50px">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci at mollitia blanditiis alias culpa assumenda dolore suscipit tempore velit. Accusamus amet magni et corporis quo! Eveniet maiores ex dolorem dignissimos.</p>
    </div>
    <div class="img1" style="width: 50%;">
        <img src="{{ asset('images/Image3.png') }}" width="549" height="501" alt="" />
    </div>
</div>

<div class="Text2" style="color: white; font-size: 1.2rem; font-weight: bold;" >
    <p>Featured on</p>
</div>
<div style="width: 100%;">
    <img class="img2" src="{{ asset('images/Image4.png') }}" width="100%"  alt="" />
</div>

<div class="container2" style="display: flex; justify-content: space-around; align-items: center; color: white; margin-top: 50px;">
    <div class="img3">
        <img src="{{ asset('images/Image5.png') }}" width="500" height="500" alt="" />
    </div>
    <div class="Texte2" style="color: white; font-size: 1.2rem; font-weight: bold; width: 50%; padding: 50px">
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore exercitationem eius ut quis voluptatem, quod aliquid modi eligendi molestias odio quisquam blanditiis odit distinctio libero. Placeat quisquam esse saepe in.</p>
        <div><button class="Offredestage">Offre de stage</button></div>
    </div>
</div>

<div class="container3" style="display: flex; justify-content: space-around; align-items: center; color: white; margin-top: 50px;">
    <div class="Texte3" style="width: 50%; padding: 50px;">
        <p>Découvrez votre chemin pour l'avenir</p>
        <div class="Texte4">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente debitis perferendis est alias veniam sint corporis unde aspernatur beatae voluptatum, minus saepe repudiandae, maxime fugiat sequi nisi, architecto odio nostrum..</p>
        </div>
        <div>
            <button class="ETUDIANT">ETUDIANT</button>
            <button class="ENTREPRISE">ENTREPRISE</button>
        </div>
    </div>
    <div class="img4">
        <img src="{{ asset('images/Image6.png') }}" width="500" height="500" alt="" />
    </div>
</div>

<div class="container5">
    <div class="square"></div>
</div>

<div class="container4" style="display: flex; flex-direction: column; justify-content: space-around; align-items: center; color: black; margin-top: 50px;">
    <p class="ARE" style="font-size: 1.7rem;">ARE YOU READY ?</p>
    <p class="BE" style="font-size: 1.7rem;">BE A PART OF THE NEXT BIG THING</p>
    <button class="GET STARTED" style="padding: 20px; background-color: black; border: 2px solid white; border-radius: 20px; width: 30vw; color: white;">GET STARTED</button>
</div>

<footer class="footer" style="margin-top: 50px;">
    <div class="footer-content">
        <div class="footer-logo">
            <img  src="{{
                asset(
                    'images/logo_EXIA_RVB_fondN-removebg-preview.png'
                )
            }}" alt="Logo" width="100">
        </div>
        <div class="footer-links">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
        <div class="footer-social">
            <ul>
                <li><a href="#"><img src="{{ asset('images/facebook.png') }}" alt="Facebook"></a></li>
                <li><a href="#"><img src="{{ asset('images/twitter.png') }}" alt="Twitter"></a></li>
                <li><a href="#"><img src="{{ asset('images/instagram.png') }}" alt="Instagram"></a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 Your Company. All Rights Reserved.</p>
    </div>
</footer>
