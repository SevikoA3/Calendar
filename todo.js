const listCon = document.querySelector("#listContainer")
let div
let list = document.querySelectorAll(".todoTitle")
const desc = document.querySelector("#todoDescription")
let currentTodo = null
const title = document.querySelector("#txt1")
const isi = document.querySelector("#txt2")
const submit = document.querySelector("#txt3")
const form = document.querySelector("#testForm")

const navbar = document.querySelector(".navbar")
const navbarText = document.querySelectorAll(".navbarText")



navbar.classList.remove("navbarAppear")
navbarText.forEach(text => text.classList.remove("navbarTextAppear"))

const timeout = setTimeout(() => {
    navbar.classList.remove("navbarAppear")
    navbarText.forEach(text => text.classList.remove("navbarTextAppear"))
    console.log("P")
}, 100)

// let temp = title.value
// title.value =""

// const test = setTimeout(()=> {title.value = temp}, 0)





//----------------------------------------------------------------

// function appear(){
//     console.log("p")
//     desc.style.marginLeft = "5vw"
// }

//----------------------------------------------------------------


// function txtappear(){
//     title.style.display = "inline-block";
//     isi.style.display = "inline-block";
//     submit.style.display = "inline-block";
// }


function delay (URL) {
    setTimeout( function() { window.location = URL }, 500 );
    console.log("P")
}
