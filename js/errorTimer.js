document.addEventListener('DOMContentLoaded', init)

function init() {
    flashmessage.addEventListener("load", setTimeout("errorTimer()",3000))
}

function errorTimer() {
    flashmessage.hidden = true
}