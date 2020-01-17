document.addEventListener('DOMContentLoaded', init)

function init() {
    setTimeout("errorTimer()",3000)
}

function errorTimer() {
    flashmessage.hidden = true
}