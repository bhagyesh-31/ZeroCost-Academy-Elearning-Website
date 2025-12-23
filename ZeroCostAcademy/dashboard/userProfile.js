function toggleProfileDropdown(event) {
    event.preventDefault();
    const dropdown = document.getElementById("profileDropdown");
    dropdown.style.display = (dropdown.style.display === "block") ? "none" : "block";
}

function logout() {
    window.location.href = "logout.php"; // Adjust logout path as needed
}

window.addEventListener("click", function (e) {
    const profileDropdown = document.getElementById("profileDropdown");
    const profileLink = document.querySelector(".profile-dropdown a");

    if (!profileDropdown.contains(e.target) && !profileLink.contains(e.target)) {
        profileDropdown.style.display = "none";
    }
});