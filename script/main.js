const addbtn = document.getElementById("add-btn");
const input = document.getElementById("add-input");
const confirmBtn = document.getElementById("confirm-btn");

addbtn.addEventListener("click", () => {
    input.style.display = "flex";
});

confirmBtn.addEventListener("click", () => {
    input.style.display = "none";
});

function addevent() {
    const inputValues = [
        document.getElementById("eventName").value,
        document.getElementById("eventPlace").value,
        document.getElementById("eventDate").value,
        document.getElementById("eventCateg").value,
    ];

    const parent = document.getElementById("event-bar");

    if (inputValues.some((val) => val === "")) {
        alert("Please fill in all fields");
        return;
    }

    const newEvent = document.createElement("div");
    newEvent.className = "event-rem";
    newEvent.innerHTML = `
        <p id="event-name" class="addingEvent">${inputValues[0]}</p>
        <p id="event-date" class="addingEvent">${inputValues[1]}</p>
        <p id="event-cat" class="addingEvent">${inputValues[2]}</p>
        <p id="event-place" class="addingEvent">${inputValues[3]}</p>
        <a href="" id="dltBtn"><img src="images/delete.png"></a>
        `;

    newEvent.classList.add("event-rem");
    parent.appendChild(newEvent);
}
