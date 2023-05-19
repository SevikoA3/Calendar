const listCon = document.querySelector("#listContainer")
let div
let list = document.querySelectorAll(".todoTitle")
const desc = document.querySelector("#todoDescrpition")
let currentTodo
const title = document.querySelector("#txt1")


function addTodo(){
   
    div = document.createElement("textarea")
    div.cols = 1
    div.rows = 1
    div.placeholder = "title"
    div.oninput = "input1()"
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

function input1(){
    title.value = currentTodo.value
}

function input2(){
    currentTodo.value = title.value
}

Array.from(list).forEach(title => {
    title.addEventListener('click', function() {
        currentTodo = title
    })
})