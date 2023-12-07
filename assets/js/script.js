$(".sidebar ul li").on('click', function () {
    $(".sidebar ul li.active").removeClass('active');
    $(this).addClass('active');
});

$('.open-btn').on('click', function () {
    $('.sidebar').addClass('active');
});

$('.close-btn').on('click', function () {
    $('.sidebar').removeClass('active');
});

const openBtn = document.querySelector(".open-btn");
const closeBtn = document.querySelector(".close-btn");

const sidebar = document.querySelector(".sidebar");


document.addEventListener('click', function (e) {
    if (!openBtn.contains(e.target) && !closeBtn.contains(e.target) && !sidebar.contains(e.target)) {
        sidebar.classList.remove("active");
    }
})


// Show Password
$(document).ready(function () {
    $('#show-password').click(function () {
        if ($(this).is(':checked')) {
            $('#inputPassword').attr('type', 'text');
        } else {
            $('#inputPassword').attr('type', 'password');
        }
    });
});



// Slide Effect
var tablinks = document.getElementsByClassName("tab-links");
var tabcontents = document.getElementsByClassName("tab-contents");

function opentab(tabname) {
    for (tablink of tablinks) {
        tablink.classList.remove("active-link");
    }
    for (tabcontent of tabcontents) {
        tabcontent.classList.remove("active-tab");
    }
    event.currentTarget.classList.add("active-link");
    document.getElementById(tabname).classList.add("active-tab");
}