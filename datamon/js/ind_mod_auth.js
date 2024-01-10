// Получаем модальное окно
var modal = document.getElementById("myModal");

// Плучаем кнопку, которая открывает модальное окно
var btn = document.getElementById("myBtn");

// Получаем элемент <span>, который закрывает модальное окно
var span = document.getElementsByClassName("close")[0];

// Когда пользователь нажимает кнопку, открывается модальное окно
btn.onclick = function() {
    modal.style.display = "block";
}

// Когда пользователь нажимает <span> (x), закройте модальное окно
span.onclick = function() {
    modal.style.display = "none";
}

// Когда пользователь нажимает где-нибудь за пределами модального окна, закройте его
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}