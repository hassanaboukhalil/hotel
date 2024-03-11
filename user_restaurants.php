<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dist/css/user-restaurant.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
    <title>Restaurants</title>
</head>
<body>
    <!-- // header and aside // -->
    <header class="section dscrpn-section" id="header_section">
        <nav class="navbar">
            <p class="logo"><a class="icon" href="./user_index.php">HASSAN HOTEL</a></p>
            <ul class="menu">
                <li onclick="to_u_rooms()">
                    <a class="opt1" href="./user_rooms.php">Rooms</a>
                </li>
                <li onclick="to_u_restaurants()">
                    <a class="opt2" href="./user_restaurants.php">Restaurants</a>
                </li>
                <li onclick="to_u_luxary()">
                    <a class="opt3" href="./user_luxury.php">Luxury & Wellness</a>
                </li>
                <li onclick="to_u_contact()">
                    <a class="opt4" href="./user_contact.php">Contact</a>
                </li>
                <li class="li-settings">
                    <a class="settings"></a>
                    <div class="dropdown-contents">
                        <a id="edit-profile" onclick="d.showModal()">edit profile</a>
                        <a href="./logout.php">logout</a>
                    </div>
                </li>
                <li>
                    <button class="book_btn"><a onclick="open_book_rm_dg()">Book a Room</a></button>
                </li>
            </ul>
            <div class="hamburger-icon" onclick="open_sidebar()">
                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 5.25C0 4.28203 0.89375 3.5 2 3.5H26C27.1063 3.5 28 4.28203 28 5.25C28 6.21797 27.1063 7 26 7H2C0.89375 7 0 6.21797 0 5.25ZM0 14C0 13.032 0.89375 12.25 2 12.25H26C27.1063 12.25 28 13.032 28 14C28 14.968 27.1063 15.75 26 15.75H2C0.89375 15.75 0 14.968 0 14ZM28 22.75C28 23.718 27.1063 24.5 26 24.5H2C0.89375 24.5 0 23.718 0 22.75C0 21.782 0.89375 21 2 21H26C27.1063 21 28 21.782 28 22.75Z" fill="white"/>
                </svg>
            </div>
        </nav>
        <div class="dscrpn-div">
            <p class="title">Restaurants</p>
            <p class="body_txt">Lorem ipsum dolor sit amet consectetur. Nam eu gravida consequat tortor quis viverra lacus. Placerat diam velit sed eget molestie risus adipiscing. Donec massa urna fermentum auctor vel id arcu. Pretium nec sodales lobortis vitae. Enim volutpat quis sed quis a. Eget quisque risus aliquet tincidunt pharetra tincidunt augue eu. Lorem dolor habitant eu duis tincidunt ut morbi rhoncus. Facilisi ullamcorper tellus maecenas pulvinar.</p>
        </div>
    </header>
    <!-- // End of header // -->
    <!-- ///////// -->
    <!-- ///////// -->
    <!-- ///////// -->
    <!-- /// dialog -->
    <dialog class="dialog" id="d">
        <div class="x-icon-div" id="x-icon" onclick="close_dialog()">
            <svg width="51" height="46" viewBox="0 0 51 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M48.543 7.79546C50.4961 6.01323 50.4961 3.1189 48.543 1.33667C46.5898 -0.445557 43.418 -0.445557 41.4648 1.33667L25.0117 16.3644L8.54297 1.35093C6.58984 -0.431299 3.41797 -0.431299 1.46484 1.35093C-0.488281 3.13316 -0.488281 6.02749 1.46484 7.80972L17.9336 22.8232L1.48047 37.8509C-0.472656 39.6332 -0.472656 42.5275 1.48047 44.3097C3.43359 46.092 6.60547 46.092 8.55859 44.3097L25.0117 29.282L41.4805 44.2955C43.4336 46.0777 46.6055 46.0777 48.5586 44.2955C50.5117 42.5132 50.5117 39.6189 48.5586 37.8367L32.0898 22.8232L48.543 7.79546Z" fill="black"/>
            </svg>
        </div>
        <div class="divs-in-dialog1" id="divs-in-dialog1">
            <div class="text-and-btn name-and-btn">
                <input class="txt" id="name" type="text" placeholder="Jorge barakat">
                <button class="btn" id="btn_name" onclick="update(this)">Update</button>
            </div>
            <div class="text-and-btn email-and-btn">
                <input class="txt" id="email" type="email" placeholder="Jorge@gmail.com">
                <button class="btn" id="btn_email" onclick="update(this)">Update</button>
            </div>
            <div class="text-and-btn phone-and-btn">
                <input class="txt" id="phone" type="text" placeholder="+987000000000">
                <button class="btn" id="btn_phone" onclick="update(this)">Update</button>
            </div>
            <div class="text-and-btn update-password-link">
                <a onclick="show_password_inputs()">Update password</a>
            </div>
        </div>
        <div class="divs-in-dialog2" id="divs-in-dialog2">
            <div class="text-and-btn password-part">
                <input class="txt" id="p1" type="password" placeholder="Current Password">
            </div>
            <div class="text-and-btn password-part">
                <input class="txt" id="p2" type="password" placeholder="new password">
            </div>
            <div class="text-and-btn password-part">
                <button class="btn" id="btn_p" onclick="update(this)">Update</button>
            </div>
        </div>
    </dialog>
    <!-- /// dialog -->
    <!-- ///////// -->
    <!-- ///////// -->
    <!-- /// dialog 2 -->
    <?php 
        include("./templates/book_room.php");
    ?>
    <!-- ///////// -->
    <!-- ///////// -->
    <!-- ///////// -->
    <!-- // aside // -->
    <div class="div_ofsidebar" id="div_ofsidebar">
        <div class="before_sidebar" onclick="close_sidebar()"></div>
        <aside class="sidebar" id="sidebar">
            <div class="x-icon" onclick="close_sidebar()">
                <svg width="28" height="28" viewBox="0 0 51 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M48.543 7.79546C50.4961 6.01323 50.4961 3.1189 48.543 1.33667C46.5898 -0.445557 43.418 -0.445557 41.4648 1.33667L25.0117 16.3644L8.54297 1.35093C6.58984 -0.431299 3.41797 -0.431299 1.46484 1.35093C-0.488281 3.13316 -0.488281 6.02749 1.46484 7.80972L17.9336 22.8232L1.48047 37.8509C-0.472656 39.6332 -0.472656 42.5275 1.48047 44.3097C3.43359 46.092 6.60547 46.092 8.55859 44.3097L25.0117 29.282L41.4805 44.2955C43.4336 46.0777 46.6055 46.0777 48.5586 44.2955C50.5117 42.5132 50.5117 39.6189 48.5586 37.8367L32.0898 22.8232L48.543 7.79546Z" fill="white"/>
                </svg>
            </div>
            <ul class="sidebar_menu">
                <li onclick="to_u_rooms()">
                    <a class="opt1" href="./user_rooms.php">Rooms</a>
                </li>
                <li onclick="to_u_restaurants()">
                    <a class="opt2" href="./user_restaurants.php">Restaurants</a>
                </li>
                <li onclick="to_u_luxary()">
                    <a class="opt3" href="./user_luxury.php">Luxury & Wellness</a>
                </li>
                <li onclick="to_u_contact()">
                    <a class="opt4" href="./user_contact.php">Contact</a>
                </li>
                <li>
                    <a onclick="open_book_rm_dg()">Book a Room</a>
                </li>
                <li id="edit-profile2" onclick="d.showModal()">
                    <a>edit profile</a>
                </li>
                <li onclick="to_logout()">
                    <a href="./logout.php">logout</a>
                </li>
            </ul>
        </aside>
    </div>
    <!-- // end of header and aside // -->
    <!--  -->
    <!-- // main // -->
    <main>
        <section class="section section1">
            <div class="texts">
                <p class="title">Ak Restaurant</p>
                <p class="body_txt">Ak Restaurant Lorem ipsum dolor sit amet consectetur. Hendrerit ac at volutpat cursus elit convallis proin. Purus adipiscing enim montes fermentum nunc arcu nulla luctus. Donec massa urna fermentum auctor vel id arcu.</p>
                <!-- <br> -->
                <div class="btns-div">
                    <!-- <button class="btn" onclick="to_sigin()">book a table</button> -->
                    <!-- // -->
                    <!-- // -->
                    <!-- // onclick redirect to whatsupp specific phone number -->
                    <button class="btn" onclick="to_whatsupp()">Order to Room</button>
                </div>
            </div>
            <div class="image1"></div>
        </section>
        <!-- // -->
        <section class="section section2">
            <div class="texts">
                <p class="title">The Delicious</p>
                <p class="body_txt">The Delicious Lorem ipsum dolor sit amet consectetur. Hendrerit ac at volutpat cursus elit convallis proin. Purus adipiscing enim montes fermentum nunc arcu nulla luctus. Donec massa urna fermentum auctor vel id arcu.</p>
                <!-- <br> -->
                <div class="btns-div">
                    <!-- <button class="btn" onclick="to_sigin()">book a table</button> -->
                    <!-- // -->
                    <!-- // -->
                    <!-- // onclick redirect to whatsupp specific phone number -->
                    <button class="btn" onclick="to_whatsupp()">Order to Room</button>
                </div>
            </div>
            <div class="image1"></div>
        </section>
        <!-- // -->
        <section class="section section3">
            <div class="texts">
                <p class="title">The Well Cafe</p>
                <p class="body_txt">The Well Cafe Lorem ipsum dolor sit amet consectetur. Hendrerit ac at volutpat cursus elit convallis proin. Purus adipiscing enim montes fermentum nunc arcu nulla luctus. Donec massa urna fermentum auctor vel id arcu.</p>
                <!-- <br> -->
                <div class="btns-div">
                    <!-- <button class="btn" onclick="to_sigin()">book a table</button> -->
                    <!-- // -->
                    <!-- // -->
                    <!-- // onclick redirect to whatsupp specific phone number -->
                    <button class="btn" onclick="to_whatsupp()">Order to Room</button>
                </div>
            </div>
            <div class="image1"></div>
        </section>
    </main>
    <!-- // end of main // -->
    <!-- // -->
    <!-- // dialogs of the footer -->
    <?php 
        include("./templates/conditions.php");
        include("./templates/services.php");
        include("./templates/library.php");

    ?>
    <!-- // end of the dialogs of the footer -->
    <!-- // -->    
    <!-- // footer // -->
    <footer>
        <div class="footer-part1">
            <div class="title-and-icons">
                <p class="title">Hassan Hotel</p>
                <div class="icons">
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 16 16" id="facebook">
                        <a target="_blank" href="https://www.facebook.com">
                            <path fill="#1976D2" d="M14 0H2C.897 0 0 .897 0 2v12c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2V2c0-1.103-.897-2-2-2z"></path>
                            <path fill="#FAFAFA" fill-rule="evenodd" d="M13.5 8H11V6c0-.552.448-.5 1-.5h1V3h-2a3 3 0 0 0-3 3v2H6v2.5h2V16h3v-5.5h1.5l1-2.5z" clip-rule="evenodd"></path>
                        </a>
                    </svg>
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 102 102" id="instagram">
                        <a target="_blank" href="https://www.instagram.com">
                            <defs><radialGradient id="a" cx="6.601" cy="99.766" r="129.502" gradientUnits="userSpaceOnUse"><stop offset=".09" stop-color="#fa8f21"></stop><stop offset=".78" stop-color="#d82d7e"></stop></radialGradient><radialGradient id="b" cx="70.652" cy="96.49" r="113.963" gradientUnits="userSpaceOnUse"><stop offset=".64" stop-color="#8c3aaa" stop-opacity="0"></stop><stop offset="1" stop-color="#8c3aaa"></stop></radialGradient></defs><path fill="url(#a)" d="M25.865,101.639A34.341,34.341,0,0,1,14.312,99.5a19.329,19.329,0,0,1-7.154-4.653A19.181,19.181,0,0,1,2.5,87.694,34.341,34.341,0,0,1,.364,76.142C.061,69.584,0,67.617,0,51s.067-18.577.361-25.14A34.534,34.534,0,0,1,2.5,14.312,19.4,19.4,0,0,1,7.154,7.154,19.206,19.206,0,0,1,14.309,2.5,34.341,34.341,0,0,1,25.862.361C32.422.061,34.392,0,51,0s18.577.067,25.14.361A34.534,34.534,0,0,1,87.691,2.5a19.254,19.254,0,0,1,7.154,4.653A19.267,19.267,0,0,1,99.5,14.309a34.341,34.341,0,0,1,2.14,11.553c.3,6.563.361,8.528.361,25.14s-.061,18.577-.361,25.14A34.5,34.5,0,0,1,99.5,87.694,20.6,20.6,0,0,1,87.691,99.5a34.342,34.342,0,0,1-11.553,2.14c-6.557.3-8.528.361-25.14.361s-18.577-.058-25.134-.361" data-name="Path 16"></path><path fill="url(#b)" d="M25.865,101.639A34.341,34.341,0,0,1,14.312,99.5a19.329,19.329,0,0,1-7.154-4.653A19.181,19.181,0,0,1,2.5,87.694,34.341,34.341,0,0,1,.364,76.142C.061,69.584,0,67.617,0,51s.067-18.577.361-25.14A34.534,34.534,0,0,1,2.5,14.312,19.4,19.4,0,0,1,7.154,7.154,19.206,19.206,0,0,1,14.309,2.5,34.341,34.341,0,0,1,25.862.361C32.422.061,34.392,0,51,0s18.577.067,25.14.361A34.534,34.534,0,0,1,87.691,2.5a19.254,19.254,0,0,1,7.154,4.653A19.267,19.267,0,0,1,99.5,14.309a34.341,34.341,0,0,1,2.14,11.553c.3,6.563.361,8.528.361,25.14s-.061,18.577-.361,25.14A34.5,34.5,0,0,1,99.5,87.694,20.6,20.6,0,0,1,87.691,99.5a34.342,34.342,0,0,1-11.553,2.14c-6.557.3-8.528.361-25.14.361s-18.577-.058-25.134-.361" data-name="Path 17"></path><path fill="#fff" d="M461.114,477.413a12.631,12.631,0,1,1,12.629,12.632,12.631,12.631,0,0,1-12.629-12.632m-6.829,0a19.458,19.458,0,1,0,19.458-19.458,19.457,19.457,0,0,0-19.458,19.458m35.139-20.229a4.547,4.547,0,1,0,4.549-4.545h0a4.549,4.549,0,0,0-4.547,4.545m-30.99,51.074a20.943,20.943,0,0,1-7.037-1.3,12.547,12.547,0,0,1-7.193-7.19,20.923,20.923,0,0,1-1.3-7.037c-.184-3.994-.22-5.194-.22-15.313s.04-11.316.22-15.314a21.082,21.082,0,0,1,1.3-7.037,12.54,12.54,0,0,1,7.193-7.193,20.924,20.924,0,0,1,7.037-1.3c3.994-.184,5.194-.22,15.309-.22s11.316.039,15.314.221a21.082,21.082,0,0,1,7.037,1.3,12.541,12.541,0,0,1,7.193,7.193,20.926,20.926,0,0,1,1.3,7.037c.184,4,.22,5.194.22,15.314s-.037,11.316-.22,15.314a21.023,21.023,0,0,1-1.3,7.037,12.547,12.547,0,0,1-7.193,7.19,20.925,20.925,0,0,1-7.037,1.3c-3.994.184-5.194.22-15.314.22s-11.316-.037-15.309-.22m-.314-68.509a27.786,27.786,0,0,0-9.2,1.76,19.373,19.373,0,0,0-11.083,11.083,27.794,27.794,0,0,0-1.76,9.2c-.187,4.04-.229,5.332-.229,15.623s.043,11.582.229,15.623a27.793,27.793,0,0,0,1.76,9.2,19.374,19.374,0,0,0,11.083,11.083,27.813,27.813,0,0,0,9.2,1.76c4.042.184,5.332.229,15.623.229s11.582-.043,15.623-.229a27.8,27.8,0,0,0,9.2-1.76,19.374,19.374,0,0,0,11.083-11.083,27.716,27.716,0,0,0,1.76-9.2c.184-4.043.226-5.332.226-15.623s-.043-11.582-.226-15.623a27.786,27.786,0,0,0-1.76-9.2,19.379,19.379,0,0,0-11.08-11.083,27.748,27.748,0,0,0-9.2-1.76c-4.041-.185-5.332-.229-15.621-.229s-11.583.043-15.626.229" data-name="Path 18" transform="translate(-422.637 -426.196)"></path>
                        </a>
                    </svg>
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill-rule="evenodd" clip-rule="evenodd" image-rendering="optimizeQuality" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" viewBox="0 0 6.827 6.827" id="twitter">
                        <a target="_blank" href="https://twitter.com/">
                            <rect width="6.827" height="6.827" fill="#0a93e2" rx="1.456" ry="1.456"></rect><path fill="#fff" d="M5.49 2.378a1.64 1.64 0 0 1-.471.129c.17-.102.3-.263.36-.454a1.65 1.65 0 0 1-.52.199.82.82 0 0 0-1.42.561A.82.82 0 0 0 3.46 3a2.33 2.33 0 0 1-1.691-.857.82.82 0 0 0 .254 1.096.816.816 0 0 1-.372-.103v.01c0 .398.283.73.658.805a.817.817 0 0 1-.37.014.822.822 0 0 0 .766.57 1.646 1.646 0 0 1-1.215.34c.363.233.794.368 1.258.368 1.51 0 2.335-1.25 2.335-2.335 0-.035 0-.07-.002-.106.16-.115.3-.26.41-.424z"></path>
                        </a>
                    </svg>
                </div>
            </div>
            <div class="info">
                <div class="info1">
                    <p>Al Sufouh 1, Al Sufouh - Dubai</p>
                    <a target="_blank" href="https://www.google.com/maps/dir//Al+Sufouh+1,+Al+Sufouh+-+Dubai+-+United+Arab+Emirates/@25.1182645,55.1494815,13z/data=!3m1!4b1!4m8!4m7!1m0!1m5!1m1!1s0x3e5f6b0ef1b8343f:0x27a64a391cbcc373!2m2!1d55.1845012!2d25.1181909">Get direction</a>
                    <p>+971 0 000 0000</p>
                </div>
                <div class="info2">
                    <a href="mailto:hassan.hotel@example.com">hassan.hotel@example.com</a>
                    <div class="subscribtion">
                        <label for="">Subscribe to newsletter</label>
                        <div>
                            <input type="text" placeholder="email address">
                            <input type="submit" value="Join">
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-nav">
                <ul>
                    <li><a href="#1">About</a></li>
                    <li><a href="./contact.php">Contact Us</a></li>
                    <li onclick="serv_dg.showModal()">Services</li>
                    <li onclick="cond_dg.showModal()">Conditions</li>
                    <li onclick="lib_dg.showModal()">Library</li>
                </ul>
            </div>
        </div>
        <div class="footer-part2">
            <p>© Copyright Hassan Hotel 2023</p>
    </footer>
    <!-- // End of Footer // -->
    <!-- // -->
    <!-- js files -->
    <script src="dist/js/common/nav.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="dist/js/common/users_pages.js"></script>
    <script src="dist/js/common/users_guests.js"></script>
</body>
</html>