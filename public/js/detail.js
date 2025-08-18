const bookContainerTag = document.getElementsByClassName("bookContainer")[0];
const bookDetailForShowTag =
    document.getElementsByClassName("bookDetailForShow")[0];

const books = [
    {
        id: "1",
        title: "The Book One",
        image: "imagescartoon_love.jpg",
        author: "Author1",
        description:
            "This is the full description of Book One. It contains more detailed information about the story, the characters, and more...Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum tempore odio ipsum beatae nostrum voluptatibus porro delectus, quod sint sit minus reiciendis quidem a dolorem totam soluta amet libero nulla.Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum tempore odio ipsum beatae nostrum voluptatibus porro delectus, quod sint sit minus reiciendis quidem a dolorem totam soluta amet libero nulla.",
    },
    {
        id: "2",
        title: "The Book Two",
        image: "images/couple.jpg",
        author: "Author2",
        description:
            "This is the full description of Book Two. Explore the adventures of the protagonists and deep storytelling.Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum tempore odio ipsum beatae nostrum voluptatibus porro delectus, quod sint sit minus reiciendis quidem a dolorem totam soluta amet libero nulla.Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum tempore odio ipsum beatae nostrum voluptatibus porro delectus, quod sint sit minus reiciendis quidem a dolorem totam soluta amet libero nulla.",
    },
    {
        id: "3",
        title: "The Book Three",
        image: "images/hearts.jpg",
        author: "Author3",
        description:
            "Full details of Book Three go here. The plot, the background, and everything in between.Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum tempore odio ipsum beatae nostrum voluptatibus porro delectus, quod sint sit minus reiciendis quidem a dolorem totam soluta amet libero nulla.Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum tempore odio ipsum beatae nostrum voluptatibus porro delectus, quod sint sit minus reiciendis quidem a dolorem totam soluta amet libero nulla.",
    },
    {
        id: "4",
        title: "The Book Four",
        image: "images/lookingMoon.jpg",
        author: "Author4",
        description:
            "Book Four's full description, giving insight into the magical narrative.Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum tempore odio ipsum beatae nostrum voluptatibus porro delectus, quod sint sit minus reiciendis quidem a dolorem totam soluta amet libero nulla.Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum tempore odio ipsum beatae nostrum voluptatibus porro delectus, quod sint sit minus reiciendis quidem a dolorem totam soluta amet libero nulla.",
    },
    {
        id: "5",
        title: "The Book Five",
        image: "images/love_couple_hands.jpg",
        author: "Author5",
        description:
            "Everything about Book Five: its essence, emotions, and essence in full detail.Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum tempore odio ipsum beatae nostrum voluptatibus porro delectus, quod sint sit minus reiciendis quidem a dolorem totam soluta amet libero nulla.Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum tempore odio ipsum beatae nostrum voluptatibus porro delectus, quod sint sit minus reiciendis quidem a dolorem totam soluta amet libero nulla.",
    },
];

books.forEach((book) => {
    const card = document.createElement("div");
    card.className = "bookCard";

    const img = document.createElement("img");
    img.className = "thumbnail";
    img.src = book.image;

    const details = document.createElement("div");
    details.className = "bookDetails";

    const title = document.createElement("h5");
    title.textContent = book.title;

    const author = document.createElement("p");
    author.innerHTML = `<strong>Author:</strong> ${book.author}`;

    const desc = document.createElement("p");
    desc.textContent = book.description.slice(0, 100) + "...";

    details.appendChild(title);
    details.appendChild(author);
    details.appendChild(desc);
    card.appendChild(img);
    card.appendChild(details);
    bookContainerTag.appendChild(card);

    img.addEventListener("click", () => {
        bookContainerTag.style.display = "none";
        bookDetailForShowTag.innerHTML = ""; // Clear previous

        const bookDiv = document.createElement("div");
        bookDiv.classList.add("book");
        bookDiv.style.position = "relative";

        const closeIcon = document.createElement("span");
        closeIcon.innerHTML = `<i class="fa-solid fa-circle-xmark"></i>`; // × symbol
        closeIcon.classList.add("closeIcon");
        closeIcon.style.position = "absolute";
        closeIcon.style.top = "10px";
        closeIcon.style.right = "10px";
        closeIcon.style.cursor = "pointer";
        closeIcon.style.fontSize = "24px";
        closeIcon.style.color = "white";
        closeIcon.addEventListener("click", () => {
            bookDetailForShowTag.style.display = "none";
            bookContainerTag.style.display = "grid";
        });

        const bookImage = document.createElement("img");
        bookImage.classList.add("imageOfBook");
        bookImage.src = book.image;

        const bookDetailDiv = document.createElement("div");
        bookDetailDiv.classList.add("bookDetail");

        const bookTitle = document.createElement("div");
        bookTitle.classList.add("bookTitle");
        bookTitle.textContent = book.title;

        const bookDescription = document.createElement("div");
        bookDescription.classList.add("bookDescription");
        bookDescription.textContent = book.description;

        const icons = document.createElement("div");
        icons.className = "icons";

        const starIcon = document.createElement("div");
        starIcon.className = "starIcon";
        starIcon.innerHTML = `<i class="fa-solid fa-star" title="Rate"></i>
                              <i class="fa-solid fa-star" title="Rate"></i>
                              <i class="fa-solid fa-star" title="Rate"></i>
                              <i class="fa-solid fa-star" title="Rate"></i>
                              <i class="fa-solid fa-star" title="Rate"></i>`;

        const bookMarkIcon = document.createElement("div");
        bookMarkIcon.className = "bookmark";
        bookMarkIcon.innerHTML = `<i class="fa-solid fa-bookmark" title="Save" id="save"><span class="count">0</span></i>
                                <i class="fa-solid fa-download" title="Download" id="download"></i>
                                <i class="fa-solid fa-comment" title="Comment" id="comment"></i>`;

        icons.append(starIcon, bookMarkIcon);

        const commentIcon = bookMarkIcon.querySelector(".fa-comment");
        commentIcon.addEventListener("click", () => {
            mb3Div.style.display = "block";
        });
        let isClicked = false;
        let count = 0;

        let countTag = document.getElementsByClassName("count")[0];
        const saveIcon = bookMarkIcon.querySelector(".fa-bookmark");

        const clickedOrNot = () => {
            if (isClicked) {
                saveIcon.style.color = "gold";
                count++;
                saveIcon.textContent = count;
            } else {
                saveIcon.style.color = "white";
                count = 0;
                saveIcon.textContent = count;
            }
        };

        saveIcon.addEventListener("click", () => {
            isClicked = !isClicked;
            clickedOrNot();
        });

        const stars = starIcon.querySelectorAll("i");
        let selectedIndex = -1; // no star selected initially

        // Set default style
        stars.forEach((star) => {
            star.style.color = "white";
        });

        // Add event listeners
        stars.forEach((star, index) => {
            star.addEventListener("click", () => {
                // If clicked the same star again, reset
                if (selectedIndex === index) {
                    selectedIndex = -1;
                } else {
                    selectedIndex = index;
                }

                // Update star colors
                stars.forEach((s, i) => {
                    s.style.color = i <= selectedIndex ? "gold" : "white";
                });
            });
        });

        const mb3Div = document.createElement("div");
        mb3Div.className = "mb-3";

        const sendAndText = document.createElement("div");
        sendAndText.className = "sendAndText";
        const textarea = document.createElement("textarea");
        textarea.className = "form-control";
        textarea.id = "comment";
        textarea.rows = 1;
        textarea.placeholder = "Add your comment...";
        textarea.required = true;

        const sendBtn = document.createElement("div");
        sendBtn.className = "send";
        sendBtn.innerHTML = `<i class="fas fa-paper-plane" id="send"></i>`;
        const sendIcon = sendBtn.querySelector(".fa-paper-plane");
        sendIcon.addEventListener("click", () => {
            alert("You clicked the send icon...");
        });
        sendAndText.appendChild(textarea);
        sendAndText.appendChild(sendBtn);
        mb3Div.appendChild(sendAndText);

        bookDetailDiv.append(bookTitle, bookDescription, icons, mb3Div);

        bookDiv.append(bookImage, bookDetailDiv, closeIcon);
        bookDetailForShowTag.append(bookDiv);
        bookDetailForShowTag.style.display = "block";
    });
});
