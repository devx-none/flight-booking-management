/*===== SHOW NAVBAR  =====*/
const showNavbar = (toggleId, navId, bodyId, headerId) => {
    const toggle = document.getElementById(toggleId),
        nav = document.getElementById(navId),
        bodypd = document.getElementById(bodyId),
        headerpd = document.getElementById(headerId)

    // Validate that all variables exist
    if (toggle && nav && bodypd && headerpd) {
        toggle.addEventListener('click', () => {
            // show navbar
            nav.classList.toggle('showw')
            // change icon
            toggle.classList.toggle('bx-x')
            // add padding to body
            bodypd.classList.toggle('body-pd')
            // add padding to header
            headerpd.classList.toggle('body-pd')
        })
    }
}

showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

/*===== LINK ACTIVE  =====*/
const linkColor = document.querySelectorAll('.nav__link')

function colorLink() {
    if (linkColor) {
        linkColor.forEach(l => l.classList.remove('active'))
        this.classList.add('active')
    }
}
linkColor.forEach(l => l.addEventListener('click', colorLink))


/*find flight*/

var oneway=document.querySelector("#onewway");
var rtrip=document.querySelector("#rtrip");
var dateR=document.querySelector("#rdate");
oneway?oneway.addEventListener('click', function(){
    dateR.style.display="none";
}): null
rtrip?rtrip.addEventListener('click', function(){
    dateR.style.display="block";
}): null

/* User  booking */

var c = document.querySelector("#count");
var Go = document.querySelector('#Go');
var save=document.querySelector('#save');
var elementParrent = document.querySelector('#row-field');
var elementChild = document.querySelector('#form_group');

Go?Go.addEventListener('click', function () {
   
    for (let i = 1; i <= c.value; i++) {
        var nom = document.createElement('label');
        var prenom = document.createElement('label');
        var date_naissance = document.createElement('label');
        var first_name = document.createElement('input');
        var last_name = document.createElement('input');
        var date = document.createElement('input')
        var divRow = document.createElement('div');
        var divCol = document.createElement('div');
        divRow.setAttribute('class', "row bg-info mb-3");
        divCol.setAttribute('class', "col-md-12 p-4");
        prenom.textContent = 'first name P:'+i;
        first_name.setAttribute('type', "text");
        first_name.setAttribute('name', "first_name[]");
        first_name.setAttribute('class', "passager");
        nom.textContent = 'Last name P:'+i;
        last_name.setAttribute('type', "text");
        last_name.setAttribute('name', "last_name[]");
        last_name.setAttribute('class', "passager");
        date_naissance.textContent = 'Date of Birth P:'+i;
        date.setAttribute('type', "date");
        date.setAttribute('name', "date[]");
        date.setAttribute('class', "passager");
        divCol.appendChild(prenom);
        divCol.appendChild(first_name);
        divCol.appendChild(nom);
        divCol.appendChild(last_name);
        divCol.appendChild(date_naissance);
        divCol.appendChild(date);
        divRow.appendChild(divCol);
        elementChild.appendChild(divRow);
        elementParrent.appendChild(elementChild);
    }
    document.querySelector("#row-field").style.display = "block";
    document.querySelector("#passager").style.display = "none";
    Go.style.display = "none";
    save.style.display = "block";

}): null


var book_btn = document.querySelectorAll('.book_flight');
for (let i = 0; i < book_btn.length; i++) {
    book_btn[i].addEventListener("click", function () {
        console.log(book_btn[i].value);

        document.querySelector('#flight_id').value = book_btn[i].value;
    });

}

var delete_flight = document.querySelectorAll('.delete_flight');
var flight_id = document.querySelector('#delete_flight');
for (let i = 0; i <delete_flight.length; i++) {
    delete_flight[i]?delete_flight[i].addEventListener('click', function(){
        flight_id.value = delete_flight[i].value;
       
    }):null
}
var delete_booked = document.querySelectorAll('.delete_booked');
var booked_id = document.querySelector('#booked_id');
for (let i = 0; i <delete_booked.length; i++) {
    delete_booked[i]?delete_booked[i].addEventListener('click', function(){
        
        booked_id.value = delete_booked[i].value;
        console.log(booked_id.value);
        alert(booked_id.value);
    }):null
}
/* Add Flight */
var one_way = document.querySelector('#one-way');
var round_trip = document.querySelector('#round-trip');
one_way?one_way.addEventListener('click', function(){
    document.querySelector(".return_trip").style.display="none";
}):null
round_trip?round_trip.addEventListener('click', function(){
    document.querySelector(".return_trip").style.display="block";
}):null


/*infos edit flight*/

var edit_flight=document.querySelectorAll('.edit_flight');
edit_flight.forEach((e) => {
    e.onclick = function(){
        tr= this.parentElement.parentElement;
        airline = tr.children[1].children[0].children[1].children[1].children[0].children[0];
        LocationD = tr.children[1].children[0].children[1].children[2].children[0].children[0];
        LocationA = tr.children[1].children[0].children[1].children[2].children[0].children[1];
        departure = tr.children[1].children[0].children[1].children[3].children[0].children[0];
        returne = tr.children[1].children[0].children[1].children[4].children[0].children[0];
        seats = tr.children[2];
        price = tr.children[5];
        id = tr.children[6].children[0];
        var opAirline=document.querySelector("#airline");
        for(let i=0;i<opAirline.options.length;i++){
            if(opAirline.options[i].value==airline.innerHTML){
                opAirline.selectedIndex=i;
            }
        }
        var departL=document.querySelector("#departure_location");
        for(let i=0;i<departL.options.length;i++){
            if(departL.options[i].value==LocationD.innerHTML){
                departL.selectedIndex=i;
            }
        }
        var arrivalL=document.querySelector("#arrival_airport_id");
        for(let i=0;i<arrivalL.options.length;i++){
            if(arrivalL.options[i].value==LocationA.innerHTML){
                arrivalL.selectedIndex=i;
            }
        }
      
        let dateDepart = Date.parse(departure.innerHTML);
        let isoStr=new Date(dateDepart).toISOString();
        document.querySelector("#departure_datetime").value=isoStr.substring(0,isoStr.length-1);
        let dateA = Date.parse(returne.innerHTML);
        let isoStrI=new Date(dateA).toISOString();
        document.querySelector("#arrival_datetime").value = isoStrI.substring(0,isoStrI.length-1);
        document.querySelector("#seats").value = seats.innerHTML;
        document.querySelector("#price").value = price.innerHTML;
        document.querySelector("#ed_id_flight").value=id.value;
        
    }
})
// const myform=document.getElementById('formedit');
// myform.addEventListener("load",(e)=>{
//     document.getElementById('formedit').submit();

// })

/*infos edit booking*/
var edit_booked=document.querySelectorAll('.edit_booked');
edit_booked.forEach((e) => {
    e.onclick = function(){
        tr= this.parentElement.parentElement;
        first_name = tr.children[1].children[0].children[0];
        last_name = tr.children[1].children[1].children[0].children[0];
        id_flight = tr.children[0];
        document.querySelector("#editModal > div > div > form > div.modal-body > div > div > div > div:nth-child(1) > div > input[type=text]").value=first_name.innerHTML;
        document.querySelector("#editModal > div > div > form > div.modal-body > div > div > div > div:nth-child(2) > div > div > input[type=text]").value=last_name.innerHTML;
        document.querySelector("#id_f_booking").value=id_flight.innerHTML;
        console.log(document.querySelector("#id_f_booking").value);
    }
})

/* Booked Users*/
let select=document.querySelector(".book_flight");
select?select.addEventListener("change",function(){
if(select.selectedIndex==0){
        select.style.background="#007BF7";
}
if(select.selectedIndex==1){
    select.style.background="#01F702";
}
if(select.selectedIndex==2){
    select.style.background="#F75C1E";
}
}):null


// var R_trip=document.querySelector("#rtrip");
// if(R_trip){
//     R_trip.addEventListener('click', function(){
//         document.querySelector("#rdate").style.display="none"; 
//     })
// }



