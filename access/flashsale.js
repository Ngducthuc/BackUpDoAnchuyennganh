var tabLinks = document.querySelectorAll(".tablinks");
var tabContent = document.querySelectorAll(".tabcontent");

tabLinks.forEach(function(el) {
    el.addEventListener("click", openTabs);
});

function openTabs(event) {
    var btn = event.currentTarget;
    var electronic = btn.dataset.electronic;

    tabContent.forEach(function(content) {
        content.classList.remove("active");
    });

    tabLinks.forEach(function(link) {
        link.classList.remove("active");
    });

    document.getElementById(electronic).classList.add("active");

    btn.classList.add("active");
}