function closePUP() {
    document.querySelector(".container").style.zIndex="-1"
}

function openPUP() {
    document.querySelector(".container").style.zIndex="10"
}

function closeOpacity() {
    document.querySelector(".container").classList.add("formAnimateClose")
    document.querySelector(".container").classList.remove("formAnimateOpen")
}

function openOpacity() {
    document.querySelector(".container").classList.remove("formAnimateClose")
    document.querySelector(".container").classList.add("formAnimateOpen")
}