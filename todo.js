const listCon = document.querySelector("#listContainer")
let div
let list = document.querySelectorAll(".todoTitle")
const desc = document.querySelector("#todoDescrpition")
let currentTodo = null
const title = document.querySelector("#txt1")

current()

function addTodo(){
    div = document.createElement("textarea")
    div.cols = 1
    div.rows = 1
    div.placeholder = "title"
    div.addEventListener("input", function(){
        title.value = currentTodo.value
    })
    // div.addEventListener("click", function(){
    //     currentTodo = div
    //     title.value = currentTodo.value
    // })
    div.classList.add("todoTitle")
    listCon.appendChild(div)

    list = document.querySelectorAll(".todoTitle")
    current()
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

function current(){
    Array.from(list).forEach(link => {
        link.addEventListener('click', function() {
            currentTodo = link
            title.value = currentTodo.value
        })
    })
}

function changepfp() {
    console.log(1);
}