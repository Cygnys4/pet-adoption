let link = document.getElementsByClassName("link");
	
let currentValue = 1;

function activelink(){
    for( l of link){
        l.classList.remove("active");
    }

    event.target.classList.add("active");
    currentValue = event.target.value;
}

function backBtn(){
    if(currentValue > 1){
        for(l of link){
            l.classList.remove("active")
        }
        currentValue--;
        link[currentValue-1].classList.add("active");
    }
}

function nextBtn(){
    if(currentValue < 3){
        for(l of link){
            l.classList.remove("active")
        }
        currentValue++;
        link[currentValue-1].classList.add("active");
    }
}

var $id = "#";
var $front = "#front";
var $back = "#back";
for(var i = 1; i < 13; i++ ){
    $($id + i).flip({
        front: $front + i,
        back: $back + i,
        trigger: 'hover',
        reverse: true,
        autoSize: true,
        forceHeight: true
    });
}
$(document).ready(function() {
$(window).scroll( function(){
    $('.hideme').each( function(i){
        var bottom_of_object = ($(this).offset().top + $(this).outerHeight())/1.4;
        var bottom_of_window = $(window).scrollTop() + $(window).height();
        if( bottom_of_window > bottom_of_object ){
            $(this).animate({'opacity':'1'},100);
        }
    });
});
});
function myFunction() {
var x = document.getElementById("nav");
if (x.className === "navbar") {
    x.className += " responsive";
} else {
    x.className = "navbar";
}
}
$(".button").click(function() {
$('html,body').animate({
    scrollTop: $(".row1").offset().top},
'slow');
});
$(".top").click(function() {
$('html,body').animate({
    scrollTop: $(".navbar").offset().top},
'slow');
});

function searchTabs() {
var input = document.getElementById("searchInput");
var filter = input.value.toUpperCase();
var cards = document.getElementsByClassName("card");
var selectedFilter = document.getElementById("itemFilter").value;

for (var i = 0; i < cards.length; i++) {
    var card = cards[i];
    var cardContainer = card.getElementsByClassName("cardContainer")[0];
    var h2Name = cardContainer.getElementsByTagName("h2")[0];
    var h3Name = cardContainer.getElementsByTagName("h3")[0];
    var category = card.querySelector("[itemid]").getAttribute("itemid");

    if (
        (selectedFilter === "all" || category === selectedFilter) &&
        (h2Name.innerText.toUpperCase().indexOf(filter) > -1 ||
            h3Name.innerText.toUpperCase().indexOf(filter) > -1 ||
            category.toUpperCase().indexOf(filter) > -1)
    ) {
        card.style.display = "";
    } else {
        card.style.display = "none";
    }
}
}


function filterByItemID() {
var filter = document.getElementById("itemFilter").value;
var cards = document.getElementsByClassName("card");

for (var i = 0; i < cards.length; i++) {
    var card = cards[i];
    var category = card.querySelector("[itemid]").getAttribute("itemid");

    if (filter === "all" || category === filter) {
        card.style.display = "";
    } else {
        card.style.display = "none";
    }
}
}






function myFunction() {
var x = document.getElementById("nav");
if (x.className === "navbar") {
x.className += " responsive";
} else {
x.className = "navbar";
}
}