
const subPage = document.querySelectorAll(".sub-page")
let counter = 0

function slide() {
    counter++
    if (counter % 2 == 0){
        subPage[0].style.transform = "translateX(-101%)"
        subPage[1].style.transform = "translateX(0%)"
        subPage[2].style.transform = "translateX(0%)"
        document.getElementById("quote").innerHTML = "With Tense-Fi, productivity becomes a necessity."
    }
    else {
        subPage[0].style.transform = "translateX(0%)"
        subPage[1].style.transform = "translateX(46%)"
        subPage[2].style.transform = "translateX(101%)"
        document.getElementById("quote").innerHTML = "You are welcomed to start your daily journey with Tense-Fi."
    }
}