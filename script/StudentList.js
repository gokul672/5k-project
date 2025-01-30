document.addEventListener("DOMContentLoaded", () => {
    const searchInput = document.getElementById("search-input");
    const listContainer = document.getElementById("list-container");
    const studentCards = Array.from(document.querySelectorAll(".student-card"));
    const filterBtn = document.getElementById("filterBtn");
    const filterOption = document.getElementById("filterOption");
    const filters = document.querySelector(".filters");

    function filterStudents() {
        const query = searchInput.value.toLowerCase();

        studentCards.forEach((card) => {
            const studentName = card
                .querySelector("#student-name")
                .textContent.toLowerCase();
            card.style.display = studentName.includes(query) ? "flex" : "none"; // Maintain layout
        });
    }

    function sortStudents() {
        const selectedFilter = filters.value;

        const filteredCards = studentCards.filter((card) => {
            const category = card
                .querySelector("#student-categ")
                .textContent.trim();

            // Match the selected category with student categ
            return selectedFilter === "" || category === selectedFilter;
        });

        // Clear the list and append filtered cards
        listContainer.innerHTML = "";
        filteredCards.forEach((card) => listContainer.appendChild(card));
    }

    filterBtn.addEventListener("click", () => {
        // Toggle visibility of filterOption
        filterOption.style.display =
            filterOption.style.display === "block" ? "none" : "block";
    });

    filters.addEventListener("change", () => {
        sortStudents(); // Sort when the filter changes
    });

    searchInput.addEventListener("input", filterStudents);
});
