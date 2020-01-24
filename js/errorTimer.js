/*
 * Author : Christopher Pardo
 * Date : 24.01.2020
 * Project : Rent a snow
 */

document.addEventListener('DOMContentLoaded', init)

//Set a timer for the flash message
function init() {
    setTimeout("errorTimer()",3000)
}

//Hides the flash message
function errorTimer() {
    flashmessage.hidden = true
}