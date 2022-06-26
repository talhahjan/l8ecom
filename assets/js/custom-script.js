const dropDowns = document.querySelectorAll(".dropdown-item");
const searchInput = document.querySelector("#search-query");
const categories = document.querySelector("#dropdownMenuLink");

for (let i = 0; i < dropDowns.length; i++) {
  dropDowns[i].addEventListener("click", function (event) {
    searchInput.setAttribute(
      "placeholder",
      `Search in ${this.innerText} Department`
    );
  });
}

searchInput.addEventListener("focus", function () {
  categories.classList.add("search-cate");
});

searchInput.addEventListener("blur", function () {
  categories.classList.remove("search-cate");
});

for (let i = 0; i < categories.length; i++) {
  categories[i].addEventListener("click", function (event) {
    searchInput.setAttribute(
      "placeholder",
      `Search in ${this.innerText} Department`
    );
  });
}

searchInput.addEventListener("focus", function () {
  categories.classList.add("search-cate");
});

searchInput.addEventListener("blur", function () {
  categories.classList.remove("search-cate");
});
