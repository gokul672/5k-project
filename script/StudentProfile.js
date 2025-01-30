const navItems = document.getElementsByClassName("navItems");
const submitbtn = document.getElementById("weeklySubmitBtn");

submitbtn.onclick = function () {
    let weeklyPerformance = [
        document.getElementById("monthCounter").value,
        document.getElementById("weekCounter").value,
        document.getElementById("weeklyInputValue").value,
    ];
    const parent = document.getElementById("weeklyPerformance");

    if (weeklyPerformance.some((val) => val === "")) {
        alert("Please fill in all fields");
        return;
    }

    const updateWeeklyPerformance = document.createElement("div");
    updateWeeklyPerformance.className = "detailsItem";
    updateWeeklyPerformance.innerHTML = `
        <p>${weeklyPerformance[0]} - ${weeklyPerformance[1]}</p>
        <p>:</p>
        <p>${weeklyPerformance[2]}</p>
        <div id="deletePerformance">
            <a href="">
                <img src="images/delete.png" height="50" width="50" />
            </a>
        </div>
    `;
    updateWeeklyPerformance.classList.add("detailsItem");
    parent.children[0].appendChild(updateWeeklyPerformance);

    document.getElementById("monthCounter").value = "";
    document.getElementById("weekCounter").value = "";
    document.getElementById("weeklyInputValue").value = "";
};
