const { default: axios } = require("axios");
import bulmaQuickview from "../../node_modules/bulma-quickview/dist/js/bulma-quickview";
require('./bootstrap');
require('./my_custom_bulma');

$("#summernote").summernote({
    placeholder: "Book description",
    tabsize: 2,
    height: 140,
    maxHeight: 400,
    toolbar: [
        ["style", ["style"]],
        ["font", ["bold", "underline", "clear"]],
        ["color", ["color"]],
        ["para", ["ul", "ol", "paragraph"]],
    ],
    callbacks: {
        onKeydown: function (e) {
            var limitChars = 1000;
            var chars = $(".note-editable").text();
            var totalChars = limitChars - chars.length;

            //Update value
            $("#total-chars").text(`Characters left: ${totalChars}`);

            //Check and Limit Charaters
            if (totalChars <= 0) {
                $("#total-chars").text(
                    `Max characters of ${limitChars} reached. You are over ${totalChars} characters`
                );
                return false;
            }
        },
    },
});

// Author quickshow === 
const authorQuickshow = document.querySelectorAll(".author-quickshow");
let quickviewDom = null;

authorQuickshow.forEach((author) => {
    author.addEventListener("click", () => {

        // Close on escape press
        quickviewDom = document.querySelector(".quickview");
        document.addEventListener("keyup", (e) => {
            if (e.key === 'Escape') {
                if (quickviewDom.classList.contains("is-active")) {
                    quickviewDom.classList.remove("is-active")
                }
            }
        });

        if (document.querySelector(".quickview")) {
            getauthor(author);
        } else {
            const authorListDOM = document.querySelector("[data-author-list]");
            const quickShowBlock = `<div id="quickviewDefault" class="quickview"></div>`;
            authorListDOM.insertAdjacentHTML("afterend", quickShowBlock);
            getauthor(author);
        }
    });
});

function getauthor(authorData) {
    const authorShowDOM = document.querySelector(".quickview");
    const url = authorData.dataset.url;
    axios
        .get(url)
        .then((res) => {
            authorShowDOM.innerHTML = res.data.html;
            const quickview = bulmaQuickview.attach();
        })
        .catch((err) => console.log(err));
}
// ==================