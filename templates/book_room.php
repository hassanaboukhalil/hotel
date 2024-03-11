<dialog class="dialog2" id="d2">
    <div class="x-icon-div" id="x-icon" onclick="close_dialog_book_room()">
        <svg width="51" height="46" viewBox="0 0 51 46" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M48.543 7.79546C50.4961 6.01323 50.4961 3.1189 48.543 1.33667C46.5898 -0.445557 43.418 -0.445557 41.4648 1.33667L25.0117 16.3644L8.54297 1.35093C6.58984 -0.431299 3.41797 -0.431299 1.46484 1.35093C-0.488281 3.13316 -0.488281 6.02749 1.46484 7.80972L17.9336 22.8232L1.48047 37.8509C-0.472656 39.6332 -0.472656 42.5275 1.48047 44.3097C3.43359 46.092 6.60547 46.092 8.55859 44.3097L25.0117 29.282L41.4805 44.2955C43.4336 46.0777 46.6055 46.0777 48.5586 44.2955C50.5117 42.5132 50.5117 39.6189 48.5586 37.8367L32.0898 22.8232L48.543 7.79546Z" fill="black" />
        </svg>
    </div>
    <form class="txt2 book_room_form d-flex-column" id="book_room_form">
        <p class="txt1 d-flex-center">Book Your Stay</p>
        <div class="first-div-in-form div_spacing d-flex-row">
            <select id="room_type" name="room_type" onchange="fill_using_room_type()">
                <option id="cl" value="Classic">Classic Room</option>
                <option id="su" value="Superior">Superior Room</option>
                <option id="de" value="Deluxe">Deluxe Room</option>
            </select>
            <input class="btn" type="button" value="More Details" onclick="more_details()">
            <!-- <button onclick="more_details()">More Details</button> -->
        </div>
        <!-- <br> -->
        <div class="div_spacing d-flex-row">
            <div class="d-flex-column">
                <label for="">Guests</label>
                <select name="Guests_nb" id="guests_selection" onchange="fiil_rooms_using_guests(this.value)">
                    <option id="cl_g1" value="g1">1 Guest</option>
                    <option id="cl_g1" value="g2">2 Guests</option>
                </select>
            </div>
            <!--  -->
            <div class="d-flex-column">
                <label for="">Beds</label>
                <select name="beds_nb" id="beds_selection" onchange="getting_price()">
                    <option id="cl_g1_rm1" value="0_1" onchange="bedsSelection_clearDates()">1 Single Bed</option> <!-- value = 0_1 means eno feh 0 king bed wa 1 single bed -->
                    <!-- <option id="b2" value="0_2">2 Single Bed</option>
                    <option id="b3" value="1_0">1 King Bed</option> -->
                </select>
            </div>
        </div>
        <!-- <br> -->
        <div class="div_spacing d-flex-column" id="div-of-date">
            <label for="">Check-In</label>
            <input type="text" class="flatpickr flatpickr-input" id="date_flatpickr" placeholder="Select Date.." readonly="readonly" required>
        </div>

        <!-- <br> -->
        <div class="div_spacing d-flex-column">
            <label>Price</label>
            <label style="background-color: #DCFCDD;" id="price">0$</label>
        </div>
        <!-- <br> -->
        <div class="div-creditcard-and-kaza div_spacing d-flex-row">
            <div class="d-flex-column">
                <label>Credit Card number</label>
                <input type="text" name="credit_nb" id="credit_nb" placeholder="XXXXXXXXXXXXXXXX" minlength="16" maxlength="16" required>
            </div>
            <!--  -->
            <div class="d-flex-column">
                <label>Name on Card</label>
                <input type="text" name="" id="nm" placeholder="Jorge Barakat" required>
            </div>
        </div>
        <!-- <br> -->
        <div class="div-expiration-and-kaza div_spacing d-flex-row d-flex-center">
            <div class="d-flex-column">
                <label>Expiration Date</label>
                <input type="date" name="expi_date" id="expi_date" required>
            </div>
            <!--  -->
            <div class="d-flex-column">
                <label>Security Code</label>
                <input type="text" name="sc_code" id="sc_code" minlength="3" maxlength="5" required>
            </div>
            <!--  -->
            <div class="div-icons d-flex-row">
                <!-- iconsss  -->
                <svg width="50" height="31" viewBox="0 0 78 49" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="78" height="49" fill="url(#pattern0)" />
                    <defs>
                        <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0_110_142" transform="scale(0.0128205 0.0204082)" />
                        </pattern>
                        <image id="image0_110_142" width="78" height="49" xlink:href="data:image/jpeg;base64,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" />
                    </defs>
                </svg>
                <!--  -->
                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="78" height="49" viewBox="0 0 192.756 192.756" id="mastercard"><g fill-rule="evenodd" clip-rule="evenodd"><path fill="#fff" d="M0 0h192.756v192.756H0V0z"></path><path fill="#1b3771" d="M8.504 151.977h175.748V40.78H8.504v111.197z"></path><path fill="#e9b040" d="M96.52 131.904c8.48 7.729 19.883 12.439 32.229 12.439 26.574 0 48.059-21.486 48.059-48.061 0-26.479-21.484-48.059-48.059-48.059-12.346 0-23.748 4.712-32.229 12.439-9.707 8.857-15.832 21.485-15.832 35.62 0 14.138 6.125 26.859 15.832 35.622z"></path><path fill="#e9b040" d="M170.4 123.047c0-.848.658-1.508 1.602-1.508.848 0 1.508.66 1.508 1.508s-.66 1.602-1.508 1.602a1.589 1.589 0 0 1-1.602-1.602zm1.602 1.224c.564 0 1.131-.564 1.131-1.225s-.566-1.131-1.131-1.131c-.66 0-1.225.471-1.225 1.131s.565 1.225 1.225 1.225zm-.283-.47h-.283v-1.414h.566c.094 0 .283 0 .377.094.094.096.188.189.188.283 0 .189-.094.377-.281.377l.281.66h-.377l-.188-.566h-.283v.566zm0-.848h.377c.094 0 .094-.096.094-.189 0 0 0-.094-.094-.094h-.377v.283z"></path><path fill="#cc2131" d="M112.068 91.195a47.818 47.818 0 0 0-.848-5.088H81.819a51.097 51.097 0 0 1 1.414-5.089h26.574a56.747 56.747 0 0 0-1.979-5.089H85.211a68.395 68.395 0 0 1 2.827-5.089H105a31.658 31.658 0 0 0-3.674-5.088h-9.613c1.414-1.791 3.11-3.487 4.806-5.088-8.481-7.728-19.79-12.439-32.229-12.439-26.574 0-48.06 21.58-48.06 48.059 0 26.574 21.486 48.061 48.06 48.061 12.439 0 23.747-4.711 32.229-12.439 1.695-1.602 3.393-3.297 4.9-5.088h-9.707a50.187 50.187 0 0 1-3.675-5.088H105a44.338 44.338 0 0 0 2.828-5.09H85.211a40.765 40.765 0 0 1-1.979-5.088h26.574a51.661 51.661 0 0 0 1.414-5.09c.377-1.695.658-3.393.848-5.088a45.936 45.936 0 0 0 0-10.179z"></path><path fill="#fff" d="M170.4 107.404c0-.848.658-1.508 1.602-1.508.848 0 1.508.66 1.508 1.508s-.66 1.602-1.508 1.602a1.588 1.588 0 0 1-1.602-1.602zm1.602 1.225c.564 0 1.131-.566 1.131-1.225 0-.66-.566-1.131-1.131-1.131-.66 0-1.225.471-1.225 1.131 0 .658.565 1.225 1.225 1.225zm-.283-.471h-.283v-1.414h.566c.094 0 .283 0 .377.094.094.096.188.189.188.283 0 .189-.094.377-.281.377l.281.66h-.377l-.188-.566h-.283v.566zm0-.847h.377c.094 0 .094-.096.094-.189 0 0 0-.094-.094-.094h-.377v.283z"></path><path fill="#1b3771" d="M80.217 110.137c-1.602.471-2.733.66-3.958.66-2.45 0-3.958-1.508-3.958-4.336 0-.564.094-1.131.188-1.789l.282-1.885.283-1.604 2.262-13.569h4.994l-.565 3.015h3.11l-.754 4.995h-3.109l-1.414 8.104c0 .283-.094.564-.094.754 0 1.037.565 1.508 1.791 1.508.66 0 1.037-.094 1.602-.189l-.66 4.336zM96.331 109.947a17.74 17.74 0 0 1-5.372.85c-5.56 0-8.858-3.016-8.858-8.859 0-6.784 3.864-11.873 9.141-11.873 4.241 0 6.973 2.827 6.973 7.256 0 1.414-.188 2.828-.658 4.9H87.19v.566c0 2.355 1.508 3.486 4.523 3.486 1.885 0 3.581-.377 5.466-1.225l-.848 4.899zm-3.11-11.779v-.941c0-1.602-.942-2.544-2.45-2.544-1.696 0-2.827 1.225-3.298 3.486h5.748v-.001zM40.355 110.42h-5.183l3.016-18.753-6.691 18.753h-3.58l-.377-18.659-3.205 18.659h-4.994l4.052-24.408h7.444l.284 15.078 4.994-15.078h8.293l-4.053 24.408zM52.889 101.561c-.565 0-.66-.094-1.037-.094-2.921 0-4.429 1.131-4.429 3.016 0 1.318.753 2.074 1.884 2.074 2.545 0 3.487-2.075 3.582-4.996zm4.146 8.859h-4.523l.094-2.074c-1.131 1.602-2.639 2.451-5.466 2.451-2.544 0-4.617-2.262-4.617-5.467 0-.941.188-1.789.376-2.543.848-3.111 3.958-4.996 8.67-5.09.565 0 1.508 0 2.261.094.188-.658.188-.941.188-1.318 0-1.319-1.036-1.696-3.486-1.696-1.508 0-3.109.283-4.335.565l-.659.283h-.377l.754-4.429c2.45-.754 4.146-1.037 6.031-1.037 4.523 0 6.879 1.979 6.879 5.843 0 .941.094 1.695-.283 3.863l-1.036 7.068-.188 1.225-.188 1.035v.66l-.095.567zM121.398 90.819c1.412 0 2.732.376 4.617 1.319l.848-5.372c-.471-.188-.566-.188-1.225-.471l-2.168-.471c-.66-.188-1.414-.282-2.355-.282-2.545 0-4.053 0-5.654 1.036-.848.471-1.885 1.225-3.109 2.545l-.566-.189-5.371 3.77.283-2.073h-5.561l-3.109 19.79h5.184l1.885-10.648s.754-1.508 1.131-1.98c.941-1.225 1.789-1.225 2.826-1.225h.377c-.094 1.131-.189 2.451-.189 3.77 0 6.502 3.676 10.555 9.33 10.555 1.414 0 2.639-.189 4.523-.754l.941-5.561c-1.695.85-3.109 1.225-4.428 1.225-3.016 0-4.807-2.166-4.807-5.936 0-5.279 2.638-9.048 6.597-9.048zM165.404 86.012l-1.131 6.974c-1.225-1.885-2.732-2.733-4.711-2.733-2.732 0-5.277 1.508-6.879 4.429l-3.299-1.979.283-2.073h-5.561l-3.203 19.79h5.277l1.695-10.648s1.32-1.508 1.697-1.98c.754-.941 1.602-1.225 2.262-1.225a18.507 18.507 0 0 0-.943 5.844c0 4.994 2.639 8.291 6.408 8.291 1.885 0 3.393-.658 4.807-2.26l-.283 1.979h4.994l3.959-24.408h-5.372v-.001zm-6.312 19.695c-1.791 0-2.639-1.225-2.639-3.863 0-3.863 1.602-6.69 4.051-6.69 1.791 0 2.734 1.413 2.734 3.958 0 3.863-1.697 6.595-4.146 6.595zM135.061 101.561c-.564 0-.658-.094-1.035-.094-2.922 0-4.43 1.131-4.43 3.016 0 1.318.754 2.074 1.885 2.074 2.544 0 3.486-2.075 3.58-4.996zm4.146 8.859h-4.521l.094-2.074c-1.131 1.602-2.639 2.451-5.467 2.451-2.543 0-4.805-2.168-4.805-5.467.094-4.711 3.58-7.633 9.234-7.633.566 0 1.508 0 2.262.094.189-.658.189-.941.189-1.318 0-1.319-1.037-1.696-3.488-1.696-1.508 0-3.203.283-4.334.565l-.754.283h-.283l.754-4.429c2.451-.754 4.146-1.037 6.031-1.037 4.523 0 6.879 1.979 6.879 5.843 0 .941.094 1.695-.283 3.863l-1.035 7.068-.189 1.225-.188 1.035-.096.66v.567zM67.872 94.871c1.037 0 2.45.094 3.958.283l.754-4.618c-1.508-.188-3.486-.377-4.711-.377-5.749 0-7.727 3.11-7.727 6.785 0 2.355 1.13 4.146 3.863 5.371 2.167 1.037 2.544 1.227 2.544 2.074 0 1.225-1.131 1.979-3.204 1.979-1.507 0-2.921-.283-4.618-.754l-.565 4.523h.095l.942.189c.282.094.754.188 1.319.188 1.319.188 2.355.188 3.015.188 5.749 0 8.199-2.166 8.199-6.596 0-2.732-1.319-4.334-3.958-5.465-2.167-1.037-2.45-1.131-2.45-2.074 0-.942.942-1.696 2.544-1.696z"></path><path fill="#fff" d="M128.277 85.259l-.85 5.277c-1.885-.942-3.203-1.319-4.617-1.319-3.957 0-6.689 3.77-6.689 9.141 0 3.676 1.885 5.936 4.898 5.936 1.32 0 2.734-.375 4.43-1.225l-.941 5.561c-1.885.471-3.109.66-4.617.66-5.561 0-9.047-3.959-9.047-10.461 0-8.764 4.805-14.794 11.684-14.794.943 0 1.697.094 2.357.188l2.166.565c.66.282.754.282 1.226.471zM111.598 88.934c-.189-.094-.377-.094-.566-.094-1.695 0-2.639.848-4.24 3.204l.471-3.016h-4.805l-3.111 19.884h5.184c1.885-12.156 2.355-14.23 4.9-14.23h.377c.471-2.356 1.037-4.146 1.979-5.749h-.189v.001zM81.536 108.629c-1.414.471-2.544.66-3.77.66-2.639 0-4.146-1.508-4.146-4.336 0-.564.094-1.131.188-1.789l.282-1.98.283-1.508 2.262-13.569h5.183l-.565 2.921h2.639l-.754 4.9H80.5l-1.414 8.199c0 .377-.094.66-.094.848 0 1.037.565 1.508 1.791 1.508.66 0 1.037-.094 1.414-.189l-.661 4.335zM61.464 95.342c0 2.449 1.225 4.24 3.958 5.465 2.167 1.037 2.45 1.32 2.45 2.262 0 1.225-.942 1.791-3.016 1.791-1.508 0-2.921-.283-4.618-.848l-.754 4.617h.283l.943.189a4.37 4.37 0 0 0 1.319.188c1.225.094 2.262.188 2.921.188 5.466 0 8.01-2.072 8.01-6.596 0-2.732-1.036-4.334-3.675-5.561-2.168-.941-2.45-1.224-2.45-2.072 0-1.131.848-1.696 2.544-1.696 1.037 0 2.45.188 3.769.377l.754-4.618c-1.319-.188-3.393-.377-4.617-.377-5.842 0-7.821 3.016-7.821 6.691zM168.139 108.912h-4.994l.281-1.979c-1.414 1.508-2.922 2.166-4.807 2.166-3.768 0-6.312-3.203-6.312-8.197 0-6.597 3.863-12.157 8.48-12.157 2.074 0 3.582.848 4.994 2.733l1.131-6.974h5.184l-3.957 24.408zm-7.729-4.713c2.451 0 4.146-2.732 4.146-6.689 0-2.451-.941-3.864-2.732-3.864-2.355 0-4.053 2.732-4.053 6.69 0 2.545.848 3.863 2.639 3.863zM97.461 108.441c-1.79.564-3.486.848-5.371.848-5.843 0-8.858-3.111-8.858-8.859 0-6.878 3.864-11.873 9.141-11.873 4.241 0 6.973 2.827 6.973 7.256 0 1.414-.188 2.828-.564 4.9H88.416c-.095.283-.095.377-.095.566 0 2.262 1.508 3.486 4.618 3.486 1.791 0 3.487-.377 5.372-1.225l-.85 4.901zm-2.92-11.781v-1.036c0-1.602-.849-2.544-2.45-2.544s-2.827 1.319-3.298 3.58h5.748zM41.675 108.912h-5.183l3.015-18.753-6.691 18.753h-3.58l-.377-18.659-3.204 18.659h-4.806l4.052-24.408h7.444l.283 15.078 4.995-15.078h8.104l-4.052 24.408zM54.585 100.053c-.566-.094-.848-.094-1.225-.094-2.921 0-4.429 1.037-4.429 3.016 0 1.225.753 2.074 1.884 2.074 2.168 0 3.676-2.074 3.77-4.996zm3.769 8.859h-4.335l.095-2.074c-1.319 1.604-3.016 2.355-5.466 2.355-2.827 0-4.712-2.166-4.712-5.371 0-4.805 3.299-7.633 9.141-7.633.565 0 1.319 0 2.073.094.188-.565.188-.847.188-1.224 0-1.319-.848-1.791-3.298-1.791-1.508 0-3.204.188-4.335.565l-.754.188-.471.094.754-4.429c2.638-.754 4.334-1.037 6.219-1.037 4.523 0 6.879 1.979 6.879 5.749 0 1.037-.095 1.79-.472 3.958l-1.036 7.068-.188 1.225-.095 1.035-.094.66-.093.568zM136.758 100.053c-.564-.094-.848-.094-1.225-.094-2.922 0-4.43 1.037-4.43 3.016 0 1.225.754 2.074 1.885 2.074 2.073 0 3.676-2.074 3.77-4.996zm3.769 8.859h-4.334l.094-2.074c-1.32 1.604-3.109 2.355-5.467 2.355-2.826 0-4.805-2.166-4.805-5.371 0-4.805 3.393-7.633 9.234-7.633.564 0 1.32 0 2.072.094.189-.565.189-.847.189-1.224 0-1.319-.848-1.791-3.299-1.791-1.508 0-3.203.188-4.334.565l-.754.188-.471.094.754-4.429c2.637-.754 4.334-1.037 6.219-1.037 4.523 0 6.879 1.979 6.879 5.749 0 1.037-.094 1.79-.471 3.958l-1.037 7.068-.188 1.225-.189 1.035-.094.66v.568h.002zM154.475 88.934c-.096-.094-.283-.094-.473-.094-1.695 0-2.732.848-4.334 3.204l.471-3.016h-4.711l-3.205 19.884h5.277c1.791-12.156 2.357-14.23 4.807-14.23h.377c.471-2.356 1.131-4.146 1.979-5.749h-.188v.001z"></path></g>
                </svg> -->
                <div class="mastercard"></div>
                <!-- end of iconsss -->
            </div>
            <!--  -->
        </div>
        <!-- <br> -->
        <div class="div_spacing d-flex-row conditions">
            <input type="checkbox" name="" id="checkbox" required>
            <p class="txt3">by choosing to book , I acknowledge having read and agreed to the <a style="color: blue;cursor: pointer;" onclick="cond_dg.showModal()">terms and conditions</a></p>
        </div>
        <!-- <br> -->
        <input class="btn" id="dg_book_btn" type="button" value="Book" onclick="book()">
        <input class="btn" id="dg_update_rm" style="display: none;" type="button" value="Update" onclick="update_room()">

        <!-- <button onclick="book()">Book</button> -->
    </form>
</dialog>