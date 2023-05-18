const listCon = document.querySelector("#listContainer")
let div

function addTodo(){
    console.log("l")
    div = document.createElement("div");
    div.classList.add("todoTitle")
    listCon.appendChild(div)
}