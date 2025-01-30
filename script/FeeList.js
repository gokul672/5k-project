const confirmBtns = document.querySelectorAll(".feeCheckBtn");
const unPaidList = document.getElementById("unPaidList");
const paidList = document.getElementById("paidList");

function addItem(name, category, age) {
    const addNode = document.createElement("div");
    addNode.innerHTML = `
                <p class="student-name">${name}</p>
                <p class="student-categ">${category}</p>
                <p class="student-age">${age}</p>
            `;
    addNode.className = "ListItems";
    paidList.appendChild(addNode);
}

// Event listener for each confirm button
confirmBtns.forEach((btn) => {
    btn.addEventListener("click", function () {
        const listItem = this.closest(".unPaidListItem");
        const checkbox = listItem.querySelector(".feeCheck");

        if (checkbox.checked) {
            const name = listItem.querySelector(".student-name").textContent;
            const category =
                listItem.querySelector(".student-categ").textContent;
            const age = listItem.querySelector(".student-age").textContent;

            addItem(name, category, age);
            unPaidList.removeChild(listItem);
        }
    });
});
