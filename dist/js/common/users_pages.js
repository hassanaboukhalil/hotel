"use strict";
let choosen_room;
let date_pricker_top;
let objs_mr_hgt = [];
function to_u_rooms() {
    location.replace("user_rooms.php");
}
function to_u_restaurants() {
    location.replace("user_restaurants.php");
}
function to_u_luxary() {
    location.replace("user_luxury.php");
}
function to_u_contact() {
    location.replace("user_contact.php");
}
function to_logout() {
    location.replace("logout.php");
}
function to_whatsupp() {
    let phone_nb = "96100000000";
    location.href = "https://wa.me/" + phone_nb;
}
function close_dialog() {
    let p1 = document.getElementById("p1");
    let p2 = document.getElementById("p2");
    p1.value = "";
    p2.value = "";
    let d = document.getElementById("d");
    d.close();
    document.getElementById("divs-in-dialog1").style.display = "flex";
    document.getElementById("divs-in-dialog2").style.display = "none";
}
document.getElementById("edit-profile").addEventListener("click", function () {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        const data = JSON.parse(this.responseText);
        let nm = document.getElementById("name");
        let em = document.getElementById("email");
        let ph = document.getElementById("phone");
        nm.value = data.name;
        em.value = data.email;
        ph.value = data.phone;
    };
    var url = "php_secondary_files/recieve_user_info.php";
    xhttp.open("GET", url, true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send();
});
document.getElementById("edit-profile2").addEventListener("click", function () {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        const data = JSON.parse(this.responseText);
        let nm = document.getElementById("name");
        let em = document.getElementById("email");
        let ph = document.getElementById("phone");
        nm.value = data.name;
        em.value = data.email;
        ph.value = data.phone;
    };
    var url = "php_secondary_files/recieve_user_info.php";
    xhttp.open("GET", url, true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send();
});
function update(obj) {
    let xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        close_dialog();
        let msg = this.responseText;
        alert(msg);
    };
    var url = "php_secondary_files/update.php";
    xhttp.open("POST", url, true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    if (obj.id == "btn_name") {
        let nm = document.getElementById("name");
        xhttp.send("name=" + nm.value);
    }
    else if (obj.id == "btn_email") {
        let em = document.getElementById("email");
        xhttp.send("email=" + em.value);
    }
    else if (obj.id == "btn_phone") {
        let nm = document.getElementById("phone");
        xhttp.send("phone=" + nm.value);
    }
    else if (obj.id == "btn_p") {
        let ps1 = document.getElementById("p1");
        let ps2 = document.getElementById("p2");
        xhttp.send("curr_pass=" + ps1.value + "&pass=" + ps2.value);
    }
}
function show_password_inputs() {
    document.getElementById("divs-in-dialog1").style.display = "none";
    document.getElementById("divs-in-dialog2").style.display = "flex";
}
let classic_rooms = [];
let superior_rooms = [];
let deluxe_rooms = [];
let classic_booked = [];
let superior_booked = [];
let deluxe_booked = [];
let room_type_selected = document.getElementById("room_type");
let guests_selection = document.getElementById("guests_selection");
let beds_selection = document.getElementById("beds_selection");
let dg_book_btn = document.getElementById("dg_book_btn");
let dg_update_rm = document.getElementById("dg_update_rm");
let booking_id_for_dates_update;
let room_id;
let check_in_dt;
let check_out_dt;
let date1;
let date2;
let dialog_bk_rm = document.getElementById("d2");
function open_book_rm_dg(room_type = "Classic", guest_nb = -1, kg_nb = -1, sg_nb = -1, fr_dt = "", to_dt = "") {
    let d2 = document.getElementById("d2");
    let c = 0;
    d2.showModal();
    if (classic_rooms.length == 0) {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            const data = JSON.parse(this.responseText);
            console.log(data);
            classic_rooms = data.all_rooms.classic;
            superior_rooms = data.all_rooms.superior;
            deluxe_rooms = data.all_rooms.deluxe;
            classic_booked = data.all_booked.classic;
            superior_booked = data.all_booked.superior;
            deluxe_booked = data.all_booked.deluxe;
        };
        var url = "php_secondary_files/get_rooms_info.php";
        xhttp.open("GET", url, true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.send();
    }
    fill_using_room_type(room_type);
    if (guest_nb != -1) {
        fiil_rooms_using_guests("g" + guest_nb);
        guests_selection.value = "g" + guest_nb;
        if (kg_nb != -1 && sg_nb != -1) {
            beds_selection.value = kg_nb + "_" + sg_nb;
        }
    }
}
function close_dialog_book_room() {
    reset_some_values();
    let dialog = document.getElementById("d2");
    dialog.close();
    dg_book_btn.style.display = "inline-block";
    dg_update_rm.style.display = "none";
    booking_id_for_dates_update = -1;
    room_id = -1;
    check_in_dt = "";
    check_out_dt = "";
}
function reset_some_values() {
    let cr = document.getElementById("credit_nb");
    let nm = document.getElementById("nm");
    let expi_date = document.getElementById("expi_date");
    let sc_code = document.getElementById("sc_code");
    cr.value = "";
    nm.value = "";
    expi_date.value = "";
    sc_code.value = "";
    room_type_selected.value = "Classic";
}
function fill_using_room_type(room_type = room_type_selected.value) {
    fp.clear();
    room_type_selected.value = room_type;
    guests_selection.textContent = '';
    beds_selection.textContent = '';
    const guests_options = [
        { value: 'g1', text: '1 Guest', id: 'cl_g1' },
        { value: 'g2', text: '2 Guests', id: 'cl_g2' },
    ];
    const rooms_options = [
        { value: '0_1', text: '1 Single Bed' }
    ];
    if (room_type == "Superior" || room_type == "Deluxe") {
        guests_options.shift();
        guests_options[0].id = 'su_g2';
        guests_options.push({ value: 'g3', text: '3 Guests', id: 'su_g3' });
        rooms_options.shift();
        rooms_options.push({ value: '1_0', text: '1 King Bed' });
        rooms_options.push({ value: '0_2', text: '2 Single Bed' });
        if (room_type == "Deluxe") {
            guests_options[0].id = 'de_g2';
            guests_options[1].id = 'de_g3';
            guests_options.push({ value: 'g4', text: '4 Guests', id: 'de_g4' });
        }
    }
    guests_options.forEach(guest_number => {
        const optionElement = document.createElement('option');
        optionElement.value = guest_number.value;
        optionElement.text = guest_number.text;
        optionElement.id = guest_number.id;
        guests_selection.appendChild(optionElement);
    });
    rooms_options.forEach(room => {
        const optionElement = document.createElement('option');
        optionElement.value = room.value;
        optionElement.text = room.text;
        beds_selection.appendChild(optionElement);
        beds_selection.addEventListener("change", function () { bedsSelection_clearDates(); getting_price(min_date, min_date); user_allowed_dates(); });
    });
    user_allowed_dates();
    getting_price(min_date, min_date);
}
function fiil_rooms_using_guests(guests_nb_choosen) {
    let rooms_options;
    fp.clear();
    beds_selection.textContent = '';
    if (guests_nb_choosen == "g1") {
        rooms_options = [
            { value: '0_1', text: '1 Single Bed' }
        ];
    }
    else if (guests_nb_choosen == "g2") {
        rooms_options = [
            { value: '1_0', text: '1 King Bed' },
            { value: '0_2', text: '2 Single Beds' }
        ];
    }
    else if (guests_nb_choosen == "g3") {
        rooms_options = [
            { value: '1_1', text: '1 King Bed and 1 Single Bed' },
            { value: '0_3', text: '3 Single Beds' },
        ];
    }
    else if (guests_nb_choosen == "g4") {
        rooms_options = [
            { value: '1_2', text: '1 King Bed and 2 Single Bed' },
            { value: '0_4', text: '4 Single Beds' },
        ];
    }
    rooms_options.forEach(room => {
        const optionElement = document.createElement('option');
        optionElement.value = room.value;
        optionElement.text = room.text;
        beds_selection.appendChild(optionElement);
        beds_selection.addEventListener("change", function () { bedsSelection_clearDates(); getting_price(min_date, min_date); user_allowed_dates(); });
    });
    user_allowed_dates();
    getting_price(min_date, min_date);
}
function update_room() {
    book(booking_id_for_dates_update);
}
function bedsSelection_clearDates() {
    fp.clear();
}
function more_details() {
    let x = document.getElementById("room_type");
    let room = x.value;
    location.href = "./user_more_info_room.php?Room=" + room;
}
const book_room_form = document.getElementById("book_room_form");
let today = new Date();
let min_date = today.toISOString().split("T")[0];
let tomorrow = new Date(today);
tomorrow.setDate(today.getDate() + 1);
let tomorrow_date = tomorrow.toISOString().split("T")[0];
let guest_index;
let guest_value;
let beds_index;
let beds_value;
let king_beds_value;
let single_beds_value;
function selected_rooms_info() {
    guest_index = guests_selection.selectedIndex;
    guest_value = guests_selection.options[guest_index].value;
    guest_value = parseInt((guest_value).substring(guest_value.length - 1, guest_value.length));
    beds_index = beds_selection.selectedIndex;
    beds_value = beds_selection.options[beds_index].value;
    king_beds_value = parseInt((beds_value).substring(0, 1));
    single_beds_value = parseInt((beds_value).substring(beds_value.length - 1, beds_value.length));
}
let dates_for_fp = [];
let dt, dt2;
let input_el_for_fp = document.getElementById("date_flatpickr");
let div_of_date = document.getElementById("div-of-date");
flatpickr(document.getElementById("date_flatpickr"), {
    dateFormat: "Y-m-d",
    disable: [],
    mode: "range",
    appendTo: div_of_date,
    minDate: min_date,
    onChange: function (selectedDates, dateStr, instance) {
        if (input_el_for_fp.innerHTML.length == 0) {
            fp.set("disable", dates_for_fp);
        }
        if (selectedDates.length > 1) {
            if (!is_allrooms_has_bookdate()) {
                fp.set("disable", []);
            }
            date1 = selectedDates[0].toISOString().split("T")[0];
            date2 = selectedDates[1].toISOString().split("T")[0];
            getting_price(date1, date2);
        }
        if (selectedDates.length == 1) {
            if (is_allrooms_has_bookdate()) {
                dt = new Date(selectedDates[0].getTime() + 1000 * 60 * 60 * 24);
                date1 = dt.toISOString().split("T")[0];
                fp.set("disable", dates_for_fp);
                most_free(date1);
            }
            else {
                fp.set("disable", []);
            }
        }
    },
    onClose: function (selectedDates, dateStr, instance) {
        if (selectedDates.length == 1) {
            fp.set("disable", dates_for_fp);
        }
    }
});
let fp;
fp = document.querySelector("#date_flatpickr")._flatpickr;
input_el_for_fp.addEventListener("click", function () {
    date_pricker_top = PaddingOfObj(dialog_bk_rm, "top") + marginOfObj(div_of_date, "top") + heightofObj(document.querySelector("#div-of-date > label")) + parseInt(((window.getComputedStyle(div_of_date, null)).gap).replace("px", ""));
    objs_mr_hgt = [document.querySelector("#book_room_form > p"), document.querySelector("#book_room_form > div.first-div-in-form.div_spacing.d-flex-row"), document.querySelector("#book_room_form > div:nth-child(3)")];
    for (let i = 0; i < objs_mr_hgt.length; i++) {
        date_pricker_top += (2 * marginOfObj(objs_mr_hgt[i], "top")) + heightofObj(objs_mr_hgt[i]);
    }
    document.querySelector("#div-of-date > div").id = "date_picker";
    date_pricker_top -= parseInt(((window.getComputedStyle(document.getElementById("date_picker"), null)).height).replace("px", ""));
    document.getElementById("date_picker").style.top = date_pricker_top + "px";
});
function user_allowed_dates() {
    let arr_booked;
    let arr_booked_ids_sp = [];
    let obj;
    let choosen_type_rooms;
    let specific_rooms_of_type;
    fp = document.querySelector("#date_flatpickr")._flatpickr;
    selected_rooms_info();
    choosen_room = [
        guest_value,
        king_beds_value,
        single_beds_value
    ];
    fp.set("disable", []);
    if (room_type_selected.value == "Classic") {
        arr_booked = classic_booked;
        choosen_type_rooms = classic_rooms;
    }
    else if (room_type_selected.value == "Superior") {
        arr_booked = superior_booked;
        choosen_type_rooms = superior_rooms;
    }
    else {
        arr_booked = deluxe_booked;
        choosen_type_rooms = deluxe_rooms;
    }
    if (!is_allrooms_has_bookdate()) {
        dates_for_fp = [];
        fp.clear();
        fp.set("disable", []);
    }
    else {
        let idss = [];
        let common_dates_fr = [];
        let common_dates_to = [];
        let d1_prev;
        let d2_prev;
        let d1_curr;
        let d2_curr;
        let prev_dates_fr = [];
        let prev_dates_to = [];
        let curr_dates_fr = [];
        let curr_dates_to = [];
        for (let i = 0; i < arr_booked.length; i++) {
            if (!idss.includes(arr_booked[i].id)) {
                idss.push(arr_booked[i].id);
                obj = {
                    id: arr_booked[i].id,
                    fr_dates: [arr_booked[i].from_date],
                    to_dates: [arr_booked[i].to_date]
                };
                arr_booked_ids_sp.push(obj);
            }
            else {
                for (let j = 0; j < arr_booked_ids_sp.length; j++) {
                    if (arr_booked_ids_sp[j].id == arr_booked[i].id) {
                        arr_booked_ids_sp[j].fr_dates.push(arr_booked[i].from_date);
                        arr_booked_ids_sp[j].to_dates.push(arr_booked[i].to_date);
                    }
                }
            }
        }
        for (let k = 0; k < arr_booked_ids_sp.length; k++) {
            if (k == 0) {
                continue;
            }
            if (k == 1) {
                prev_dates_fr = arr_booked_ids_sp[k - 1].fr_dates;
                prev_dates_to = arr_booked_ids_sp[k - 1].to_dates;
            }
            curr_dates_fr = arr_booked_ids_sp[k].fr_dates;
            curr_dates_to = arr_booked_ids_sp[k].to_dates;
            for (let i = 0; i < prev_dates_fr.length; i++) {
                d1_prev = new Date(prev_dates_fr[i]);
                d2_prev = new Date(prev_dates_to[i]);
                for (let j = 0; j < curr_dates_fr.length; j++) {
                    d1_curr = new Date(curr_dates_fr[j]);
                    d2_curr = new Date(curr_dates_to[j]);
                    if ((d1_curr.getTime() > d2_prev.getTime()) || (d2_curr.getTime() < d1_prev.getTime())) {
                        continue;
                    }
                    else {
                        if ((d1_curr.getTime() >= d1_prev.getTime()) && (d2_curr.getTime() <= d2_prev.getTime())) {
                            common_dates_fr.push(curr_dates_fr[j]);
                            common_dates_to.push(curr_dates_to[j]);
                        }
                        else if ((d1_curr.getTime() < d1_prev.getTime()) && (d2_curr.getTime() > d2_prev.getTime())) {
                            common_dates_fr.push(prev_dates_fr[i]);
                            common_dates_to.push(prev_dates_to[i]);
                        }
                        else if ((d1_curr.getTime() >= d1_prev.getTime()) && (d1_curr.getTime() <= d2_prev.getTime())) {
                            common_dates_fr.push(curr_dates_fr[j]);
                            common_dates_to.push(prev_dates_to[i]);
                        }
                        else {
                            common_dates_fr.push(prev_dates_fr[i]);
                            common_dates_to.push(curr_dates_to[j]);
                        }
                    }
                }
            }
            if (common_dates_fr.length != 0) {
                prev_dates_fr = [...common_dates_fr];
                prev_dates_to = [...common_dates_to];
                common_dates_fr = [];
                common_dates_to = [];
            }
            else {
                prev_dates_fr = [];
                prev_dates_to = [];
                break;
            }
        }
        common_dates_fr = [...prev_dates_fr];
        common_dates_to = [...prev_dates_to];
        if (common_dates_fr.length != 0) {
            for (let b = 0; b < common_dates_fr.length; b++) {
                dates_for_fp.push({
                    from: common_dates_fr[b],
                    to: common_dates_to[b]
                });
            }
            fp.set("disable", dates_for_fp);
        }
        else {
            fp.set("disable", []);
        }
    }
}
let choosen_id = 0;
function most_free(start_date) {
    let rooms_of_type;
    let arr_booked;
    let max_days = 0;
    let not_allowed_dates = [];
    let d = new Date(start_date);
    let ids = [];
    let shuffle_arr_booked = [];
    let negative_dates_ids = [];
    let c1, c2;
    let index;
    let ob;
    let d1, d2;
    let obj;
    let choosen_objects = [];
    let disallowed_dates = [];
    if (room_type_selected.value == "Classic") {
        arr_booked = classic_booked;
    }
    else if (room_type_selected.value == "Superior") {
        arr_booked = superior_booked;
    }
    else {
        arr_booked = deluxe_booked;
    }
    for (let i = 0; i < arr_booked.length; i++) {
        if (not_allowed_dates.includes(arr_booked[i].id)) {
            continue;
        }
        if (getDaysBetweenDates(start_date, arr_booked[i].to_date) < 0) {
            if (ids.includes(arr_booked[i].id)) {
                continue;
            }
            else {
            }
            if (!negative_dates_ids.includes(arr_booked[i].id)) {
                negative_dates_ids.push(arr_booked[i].id);
                continue;
            }
        }
        if (getDaysBetweenDates(start_date, arr_booked[i].from_date) <= 0 && getDaysBetweenDates(start_date, arr_booked[i].to_date) >= 0) {
            if (ids.includes(arr_booked[i].id)) {
                for (let k = 0; k < ids.length; k++) {
                    if (ids[k] == arr_booked[i].id) {
                        c1 = ids.slice(0, k);
                        c2 = ids.slice(k + 1, ids.length);
                        ids = [...c1, ...c2];
                    }
                    if (shuffle_arr_booked.length != 0) {
                        if (shuffle_arr_booked[k].id == arr_booked[i].id) {
                            c1 = shuffle_arr_booked.slice(0, k);
                            c2 = shuffle_arr_booked.slice(k + 1, shuffle_arr_booked.length);
                            shuffle_arr_booked = [...c1, ...c2];
                        }
                    }
                }
            }
            if (negative_dates_ids.includes(arr_booked[i].id)) {
                for (let k = 0; k < negative_dates_ids.length; k++) {
                    if (negative_dates_ids[k] == arr_booked[i].id) {
                        c1 = ids.slice(0, k);
                        c2 = ids.slice(k + 1, negative_dates_ids.length);
                        negative_dates_ids = [...c1, ...c2];
                    }
                }
            }
            if (!not_allowed_dates.includes(arr_booked[i].id)) {
                not_allowed_dates.push(arr_booked[i].id);
            }
            continue;
        }
        if (!ids.includes(arr_booked[i].id) && !not_allowed_dates.includes(arr_booked[i].id)) {
            if (negative_dates_ids.includes(arr_booked[i].id)) {
                for (let k = 0; k < negative_dates_ids.length; k++) {
                    if (negative_dates_ids[k] == arr_booked[i].id) {
                        c1 = negative_dates_ids.slice(0, k);
                        c2 = negative_dates_ids.slice(k + 1, negative_dates_ids.length);
                        break;
                    }
                }
            }
            ids.push(arr_booked[i].id);
            shuffle_arr_booked.push(arr_booked[i]);
        }
        else {
            for (let z = 0; z < shuffle_arr_booked.length; z++) {
                if (shuffle_arr_booked[z].id == arr_booked[i].id) {
                    ob = shuffle_arr_booked[z];
                    if (getDaysBetweenDates(start_date, ob.from_date) > getDaysBetweenDates(start_date, arr_booked[i].from_date)) {
                        shuffle_arr_booked[z] = arr_booked[i];
                    }
                }
            }
        }
    }
    for (let i = 0; i < negative_dates_ids.length; i++) {
        if (!ids.includes(negative_dates_ids[i])) {
            ids.push(negative_dates_ids[i]);
            for (let j = 0; j < arr_booked.length; j++) {
                if (arr_booked[j].id == negative_dates_ids[i]) {
                    shuffle_arr_booked.push(arr_booked[j]);
                    break;
                }
            }
        }
    }
    if (shuffle_arr_booked.length == 0) {
        for (let p = 0; p < arr_booked.length; p++) {
            if (!not_allowed_dates.includes(arr_booked[p].id)) {
                shuffle_arr_booked.push(arr_booked[p]);
                break;
            }
        }
        choosen_id = shuffle_arr_booked[0].id;
    }
    else {
        let min_days = 100000000;
        for (let b = 0; b < shuffle_arr_booked.length; b++) {
            min_days = getDaysBetweenDates(start_date, shuffle_arr_booked[b].from_date);
            for (let d = 0; d < arr_booked.length; d++) {
                if (shuffle_arr_booked[b].id == arr_booked[d].id) {
                    if (min_days < 0) {
                        min_days = getDaysBetweenDates(start_date, arr_booked[d].from_date);
                        shuffle_arr_booked[b] = arr_booked[d];
                        continue;
                    }
                    if (getDaysBetweenDates(start_date, arr_booked[d].from_date) < min_days) {
                        min_days = getDaysBetweenDates(start_date, arr_booked[d].from_date);
                        shuffle_arr_booked[b] = arr_booked[d];
                    }
                }
            }
        }
        choosen_id = shuffle_arr_booked[0].id;
        for (let b = 0; b < shuffle_arr_booked.length; b++) {
            if (getDaysBetweenDates(start_date, shuffle_arr_booked[b].from_date) > max_days) {
                max_days = getDaysBetweenDates(start_date, shuffle_arr_booked[b].from_date);
                choosen_id = shuffle_arr_booked[b].id;
            }
        }
    }
    for (let g = 0; g < arr_booked.length; g++) {
        if (arr_booked[g].id == choosen_id) {
            disallowed_dates.push({
                from: arr_booked[g].from_date,
                to: arr_booked[g].to_date
            });
        }
    }
    fp = document.querySelector("#date_flatpickr")._flatpickr;
    if (arr_booked.length != 0) {
        fp.set("disable", [...dates_for_fp, ...disallowed_dates]);
    }
    else {
        fp.set("disable", []);
    }
}
function getting_price(date1 = min_date, date2 = min_date) {
    let dates = [date1, date2];
    selected_rooms_info();
    choosen_room = [
        guest_value,
        king_beds_value,
        single_beds_value
    ];
    let arr;
    let price_element = document.getElementById("price");
    let price;
    let d1, d2;
    if (dates.length != 0) {
        d1 = new Date(dates[0]);
        d2 = new Date(dates[1]);
    }
    if (room_type_selected.value == "Classic") {
        arr = classic_rooms;
    }
    else if (room_type_selected.value == "Superior") {
        arr = superior_rooms;
    }
    else {
        arr = deluxe_rooms;
    }
    let nb_of_days;
    for (let i = 0; i < arr.length; i++) {
        if (choosen_room[0] == arr[i].guests_nb && choosen_room[1] == arr[i].king_beds && choosen_room[2] == arr[i].single_beds) {
            price = arr[i].price;
            nb_of_days = getDaysBetweenDates(d1.toISOString().split("T")[0], d2.toISOString().split("T")[0]);
            price = Math.abs(price * nb_of_days);
            price_element.innerHTML = price + "$";
            break;
        }
    }
}
function book(booking_id = -1) {
    let crdt_nb = document.getElementById("credit_nb");
    let nm = document.getElementById("nm");
    let sc_code = document.getElementById("sc_code");
    let checkbox_terms = document.getElementById("checkbox");
    let expi_date = document.getElementById("expi_date");
    const d1 = new Date();
    const d2 = new Date(expi_date.value);
    selected_rooms_info();
    choosen_room = [
        guest_value,
        king_beds_value,
        single_beds_value
    ];
    if (fp.selectedDates.length == 2) {
        let fr_date = addDaysToDate(fp.selectedDates[0], 1);
        let to_date = addDaysToDate(fp.selectedDates[1], 1);
        if (parseInt(crdt_nb.value)) {
            if (nm.value.length != 0) {
                if (d1.getFullYear() < d2.getFullYear() || (d1.getFullYear() == d2.getFullYear() && d1.getMonth() + 1 < d2.getMonth() + 1) || (d1.getFullYear() == d2.getFullYear() && d1.getMonth() + 1 == d2.getMonth() + 1 && d1.getDate() <= d2.getDate())) {
                    if (sc_code.value.length != 0) {
                        if (checkbox_terms.checked) {
                            const xhttp = new XMLHttpRequest();
                            xhttp.onload = function () {
                                alert(this.responseText);
                                close_dialog_book_room();
                                window.location.replace("http://localhost/hotel/user_rooms.php");
                            };
                            var url = "php_secondary_files/add_room_bkg.php";
                            xhttp.open("POST", url, true);
                            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                            if (booking_id == -1) {
                                xhttp.send("room_id=" + choosen_id + "&room_type=" + room_type_selected.value + "&guests_nb=" + choosen_room[0] + "&kings_nb=" + choosen_room[1] + "&single_nb=" + choosen_room[2] + "&from_date=" + fr_date + "&to_date=" + to_date);
                            }
                            else {
                                xhttp.send("bkg_id=" + booking_id + "&room_id=" + choosen_id + "&room_type=" + room_type_selected.value + "&guests_nb=" + choosen_room[0] + "&kings_nb=" + choosen_room[1] + "&single_nb=" + choosen_room[2] + "&from_date=" + fr_date + "&to_date=" + to_date);
                            }
                        }
                        else {
                            alert("You should agree to our terms and conditions");
                        }
                    }
                    else {
                        alert("You should write your security code");
                    }
                }
                else {
                    alert("Your card is expired");
                }
            }
            else {
                alert("You should enter the name that are writen in the card");
            }
        }
        else {
            alert("Credit Number should contain only numbers");
        }
    }
    else {
        alert("You should select the dates for your booking");
    }
}
function open_dialog_for_update(booking_id, rm_id, check_in, check_out) {
    booking_id = parseInt(booking_id);
    booking_id_for_dates_update = booking_id;
    check_in_dt = check_in;
    check_out_dt = check_out;
    dg_book_btn.style.display = "none";
    dg_update_rm.style.display = "inline-block";
}
function check_room(room_type, guest_nb, kg_nb, sg_nb, fr_dt, to_dt) {
    selected_rooms_info();
    let choosen_room = [
        guest_value,
        king_beds_value,
        single_beds_value
    ];
    fp = document.querySelector("#date_flatpickr")._flatpickr;
    let dates_without_choosen_dts = [];
    if (room_type_selected.value == room_type && choosen_room[0] == guest_nb && choosen_room[1] == kg_nb && choosen_room[2] == sg_nb) {
        dates_for_fp = [];
        user_allowed_dates();
        for (let i = 0; i < dates_for_fp.length; i++) {
            console.log(dates_for_fp[0].from);
            if (getDaysBetweenDates(fr_dt, dates_for_fp[i].from) > 0 && getDaysBetweenDates(to_dt, dates_for_fp[i].to) < 0) {
                continue;
            }
            else {
                dates_without_choosen_dts.push(dates_for_fp[i]);
            }
        }
        fp.set("disable", dates_without_choosen_dts);
    }
    else {
        fp.set("disable", dates_for_fp);
    }
}
function getDaysBetweenDates(startDate, endDate) {
    const start = new Date(startDate);
    const end = new Date(endDate);
    const timeDifference = end.getTime() - start.getTime();
    const days = timeDifference / (1000 * 60 * 60 * 24);
    return Math.round(days);
}
function is_allrooms_has_bookdate() {
    let arr_booked;
    let choosen_type_rooms;
    let ids = [];
    let room_quantity = 0;
    let specific_rooms_of_type;
    let c = 0;
    selected_rooms_info();
    choosen_room = [
        guest_value,
        king_beds_value,
        single_beds_value
    ];
    if (room_type_selected.value == "Classic") {
        arr_booked = classic_booked;
        choosen_type_rooms = classic_rooms;
    }
    else if (room_type_selected.value == "Superior") {
        arr_booked = superior_booked;
        choosen_type_rooms = superior_rooms;
    }
    else {
        arr_booked = deluxe_booked;
        choosen_type_rooms = deluxe_rooms;
    }
    if (arr_booked.length != 0) {
        for (let i = 0; i < arr_booked.length; i++) {
            if (choosen_room[0] == arr_booked[i].guests_nb && choosen_room[1] == arr_booked[i].king_beds && choosen_room[2] == arr_booked[i].single_beds) {
                c++;
                if (!ids.includes(arr_booked[i].id)) {
                    ids.push(arr_booked[i].id);
                }
            }
        }
    }
    for (let i = 0; i < choosen_type_rooms.length; i++) {
        if (choosen_room[0] == choosen_type_rooms[i].guests_nb && choosen_room[1] == choosen_type_rooms[i].king_beds && choosen_room[2] == choosen_type_rooms[i].single_beds) {
            room_quantity = choosen_type_rooms[i].room_quantity;
            break;
        }
    }
    if (ids.length < room_quantity || ids.length == 0) {
        return false;
    }
    return true;
}
function addDaysToDate(date, daysToAdd) {
    const newDate = new Date(date);
    newDate.setDate(newDate.getDate() + daysToAdd);
    return newDate.toISOString().split("T")[0];
}
function heightofObj(documentObj) {
    let Obj = documentObj;
    let styleofObj = window.getComputedStyle(Obj, null);
    let h = styleofObj.height;
    h = h.replace("px", "");
    h = parseInt(h);
    return h;
}
function PaddingOfObj(documentObj, direction) {
    let Obj = documentObj;
    let styleofObj = window.getComputedStyle(Obj, null);
    let p;
    if (direction == "top") {
        p = styleofObj.paddingTop;
    }
    else if (direction == "left") {
        p = styleofObj.paddingLeft;
    }
    else if (direction == "right") {
        p = styleofObj.paddingRight;
    }
    else if (direction == "bottom") {
        p = styleofObj.paddingBottom;
    }
    p = p.replace("px", "");
    let pd = parseInt(p);
    return pd;
}
function marginOfObj(documentObj, direction) {
    let Obj = documentObj;
    let styleofObj = window.getComputedStyle(Obj, null);
    let m;
    if (direction == "top") {
        m = styleofObj.marginTop;
    }
    else if (direction == "left") {
        m = styleofObj.marginLeft;
    }
    else if (direction == "right") {
        m = styleofObj.marginRight;
    }
    else if (direction == "bottom") {
        m = styleofObj.marginBottom;
    }
    m = m.replace("px", "");
    let mr = parseInt(m);
    return mr;
}
