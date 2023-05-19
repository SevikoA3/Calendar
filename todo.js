const listCon = document.querySelector("#listContainer")
let div
let list = document.querySelectorAll(".todoTitle")
const desc = document.querySelector("#todoDescrpition")

list.onclick = appear()

function addTodo(){
   
    div = document.createElement("div")
    div.classList.add("todoTitle")
    listCon.appendChild(div)
}

function input(){
    console.log("l")
}

function appear(){
    console.log("p")
    desc.style.marginLeft = "5vw"
}