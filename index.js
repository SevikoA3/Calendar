
const subPage = document.querySelectorAll(".sub-page")
let counter = 0

function slide() {
    counter++
    if (counter % 2 == 0){
        subPage[0].style.transform = "translateX(-100%)"
        subPage[1].style.transform = "translateX(0%)"
        subPage[2].style.transform = "translateX(0%)"
    }
    else {
        subPage[0].style.transform = "translateX(0%)"
        subPage[1].style.transform = "translateX(66.66%)"
        subPage[2].style.transform = "translateX(100%)"
    }
}