<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dist/css/signup.css">
    <title>Sign up</title>
</head>
<body>
    <!-- // header and aside // -->
    <header class="section" id="header_section">
        <nav class="navbar">
            <p class="logo"><a class="icon" href="./index.php">HASSAN HOTEL</a></p>
            <ul class="menu">
                <li onclick="to_rooms()">
                    <a class="opt1" href="rooms.php">Rooms</a>
                </li>
                <li onclick="to_restaurants()">
                    <a class="opt2" href="./restaurants.php">Restaurants</a>
                </li>
                <li onclick="to_luxary()">
                    <a class="opt3" href="./luxury_and_wellness.php">Luxury & Wellness</a>
                </li>
                <li onclick="to_contact()">
                    <a class="opt4" href="./contact.php">Contact</a>
                </li>
                <li onclick="to_sigin()">
                    <a class="opt5" href="./signin.php">Sign in</a>
                </li>
                <li>
                    <button class="book_btn"><a href="./signin.php">Book a Room</a></button>
                </li>
            </ul>
            <div class="hamburger-icon" onclick="open_sidebar()">
                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 5.25C0 4.28203 0.89375 3.5 2 3.5H26C27.1063 3.5 28 4.28203 28 5.25C28 6.21797 27.1063 7 26 7H2C0.89375 7 0 6.21797 0 5.25ZM0 14C0 13.032 0.89375 12.25 2 12.25H26C27.1063 12.25 28 13.032 28 14C28 14.968 27.1063 15.75 26 15.75H2C0.89375 15.75 0 14.968 0 14ZM28 22.75C28 23.718 27.1063 24.5 26 24.5H2C0.89375 24.5 0 23.718 0 22.75C0 21.782 0.89375 21 2 21H26C27.1063 21 28 21.782 28 22.75Z" fill="white"/>
                </svg>
            </div>
        </nav>
        <div class="signin_and_photo" id="signin_and_photo">
            <form class="signin-form" method="post" action="php_secondary_files/login_or_register.php">
                <p class="title">Sign Up</p>
                <input class="txts_input" id="name" type="text" placeholder="Full name" name="name" required>
                <input class="txts_input" id="phone" type="tel" placeholder="Phone Number" name="phone" required>
                <input class="txts_input" id="email" type="email" placeholder="Email address" name="email" required>
                <input class="txts_input" id="pass" type="password" placeholder="Password" name="pass" required>
                <input class="btn btn1" type="submit" value="Sign up">
                <label for="">Or</label>
                <p class="btn-and-googleicon"><a href="login_with_google.php" style="text-decoration: none;color:black;font-weight: normal;">Sign up with google</a><svg class="googleicon" xmlns="http://www.w3.org/2000/svg" width="2443" height="2500" preserveAspectRatio="xMidYMid" viewBox="0 0 256 262" id="google"><path fill="#4285F4" d="M255.878 133.451c0-10.734-.871-18.567-2.756-26.69H130.55v48.448h71.947c-1.45 12.04-9.283 30.172-26.69 42.356l-.244 1.622 38.755 30.023 2.685.268c24.659-22.774 38.875-56.282 38.875-96.027"></path><path fill="#34A853" d="M130.55 261.1c35.248 0 64.839-11.605 86.453-31.622l-41.196-31.913c-11.024 7.688-25.82 13.055-45.257 13.055-34.523 0-63.824-22.773-74.269-54.25l-1.531.13-40.298 31.187-.527 1.465C35.393 231.798 79.49 261.1 130.55 261.1"></path><path fill="#FBBC05" d="M56.281 156.37c-2.756-8.123-4.351-16.827-4.351-25.82 0-8.994 1.595-17.697 4.206-25.82l-.073-1.73L15.26 71.312l-1.335.635C5.077 89.644 0 109.517 0 130.55s5.077 40.905 13.925 58.602l42.356-32.782"></path><path fill="#EB4335" d="M130.55 50.479c24.514 0 41.05 10.589 50.479 19.438l36.844-35.974C195.245 12.91 165.798 0 130.55 0 79.49 0 35.393 29.301 13.925 71.947l42.211 32.783c10.59-31.477 39.891-54.251 74.414-54.251"></path></svg></p>
                <a href="./signin.php">Already have an account? Login</a>
            </form>
            <!--  -->
            <div class="image">
                <!-- // -->
            </div>
        </div>
    </header>
    <!--  -->
    <div class="div_ofsidebar" id="div_ofsidebar">
        <div class="before_sidebar" onclick="close_sidebar()"></div>
        <aside class="sidebar" id="sidebar">
            <div class="x-icon" onclick="close_sidebar()">
                <svg width="28" height="28" viewBox="0 0 51 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M48.543 7.79546C50.4961 6.01323 50.4961 3.1189 48.543 1.33667C46.5898 -0.445557 43.418 -0.445557 41.4648 1.33667L25.0117 16.3644L8.54297 1.35093C6.58984 -0.431299 3.41797 -0.431299 1.46484 1.35093C-0.488281 3.13316 -0.488281 6.02749 1.46484 7.80972L17.9336 22.8232L1.48047 37.8509C-0.472656 39.6332 -0.472656 42.5275 1.48047 44.3097C3.43359 46.092 6.60547 46.092 8.55859 44.3097L25.0117 29.282L41.4805 44.2955C43.4336 46.0777 46.6055 46.0777 48.5586 44.2955C50.5117 42.5132 50.5117 39.6189 48.5586 37.8367L32.0898 22.8232L48.543 7.79546Z" fill="white"/>
                </svg>
            </div>
            <ul class="sidebar_menu">
                <li onclick="to_rooms()">
                    <a class="opt1" href="rooms.php">Rooms</a>
                </li>
                <li onclick="to_restaurants()">
                    <a class="opt2" href="./restaurants.php">Restaurants</a>
                </li>
                <li onclick="to_luxary()">
                    <a class="opt3" href="./luxury_and_wellness.php">Luxury & Wellness</a>
                </li>
                <li onclick="to_contact()">
                    <a class="opt4" href="./contact.php">Contact</a>
                </li>
                <li onclick="to_sigin()">
                    <a class="opt5" href="./signin.php">Sign in</a>
                </li>
                <li>
                    <a href="./signin.php">Book a Room</a>
                </li>
            </ul>
        </aside>
    </div>
    <!-- // end of header and aside // -->
    <!--  -->
    <!-- js files -->
    <script src="dist/js/signup.js"></script>
    <script src="dist/js/signin.js"></script>
    <script src="dist/js/common/nav.js"></script>
</body>
</html>