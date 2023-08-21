const messageHistory = document.querySelector(".chat-history ul");
const his = document.querySelector(".chat .chat-history");
let opponent = null;
document.querySelector(".send__message")?.addEventListener("change", (e) => {
  sendMessage(e.target.value);
});
const sendMessage = (message) => {
  fetch("http://localhost/chat/AJAX/sendmessage.php", {
    method: "POST",
    body: new URLSearchParams({
      message: message,
      user_id: opponent.id,
    }),
  })
    .then((a) => a.json())
    .then((data) => {
      his.scrollTo(0, his.scrollHeight);
      document.querySelector(".send__message").value = "";
      const li = document.createElement("li");
      li.classList.add("clearfix");
      const messageData = document.createElement("div");
      messageData.classList.add("message-data", "text-right");
      const span = document.createElement("span");
      span.classList.add("message-data-time");
      span.textContent = data.message.created_at;
      const messageDiv = document.createElement("div");
      messageDiv.classList.add("message");
      messageData.append(span);
      messageDiv.classList.add("other-message", "float-right");
      messageDiv.textContent = message;
      li.append(messageData, messageDiv);
      messageHistory.append(li);
    });
};
const openMessageBox = (user) => {
  opponent = user;
  messageHistory.textContent = "";
  const chat = document.querySelector(".chat");
  fetch("http://localhost/chat/AJAX/getmessages.php", {
    method: "POST",
    body: new URLSearchParams({
      user_id: user.id,
    }),
  })
    .then((res) => res.json())
    .then((data) => {
      chat.classList.remove("hide");
      chat.querySelector(
        ".opponent__name"
      ).textContent = `${user.name} ${user.surname}`;
      if (data.messages.length) {
        data.messages.map((message) => {
          const li = document.createElement("li");
          li.classList.add("clearfix");
          const messageData = document.createElement("div");
          messageData.classList.add("message-data");
          const span = document.createElement("span");
          span.classList.add("message-data-time");
          span.textContent = message.created_at;
          const messageDiv = document.createElement("div");
          messageDiv.classList.add("message");
          messageData.append(span);
          if (message.sender_id !== user.id) {
            messageDiv.classList.add("other-message", "float-right");
            messageData.classList.add("text-right");
            const img = document.createElement("img");
            img.setAttribute(
              "src",
              "https://bootdey.com/img/Content/avatar/avatar7.png"
            );
            messageData.append(img);
          } else {
            messageDiv.classList.add("my-message");
          }
          messageDiv.textContent = message.message;
          li.append(messageData, messageDiv);
          messageHistory.append(li);
        });
      } else {
      }
    });
};

let searchTimeout = null;
const ul = document.querySelector(".search__results");
document.querySelector("#search__user")?.addEventListener("input", (e) => {
  let searchName = e.target.value.trim();
  if (searchName.length < 3) {
    return;
  }
  clearTimeout(searchTimeout);
  searchTimeout = setTimeout(() => {
    fetch("http://localhost/chat/AJAX/search_user.php", {
      method: "POST",
      body: new URLSearchParams({
        search: searchName,
      }),
    })
      .then((res) => res.json())
      .then((data) => {
        ul.textContent = "";
        if (data.results.length) {
          data.results.map((user) => {
            const li = document.createElement("li");
            li.addEventListener("click", () => openMessageBox(user));
            li.classList.add("clearfix");
            const img = document.createElement("img");
            img.setAttribute(
              "src",
              "https://bootdey.com/img/Content/avatar/avatar1.png"
            );
            const aboutDiv = document.createElement("div");
            aboutDiv.classList.add("about");
            const nameDiv = document.createElement("div");
            nameDiv.classList.add("name");
            nameDiv.textContent = `${user.name} ${user.surname}`;
            aboutDiv.append(nameDiv);
            li.append(img, aboutDiv);
            ul.append(li);
          });
        } else {
          //tapilmadi
        }
      });
  }, 250);
});


window.addEventListener("DOMContentLoaded", () => {
  fetch("http://localhost/chat/AJAX/getusers.php", {
    method: "POST",
    body: new URLSearchParams({
      user_id: opponent,
    }),
  })
    .then((res) => res.json())
    .then((data) => {
      if (data.users.length) {
        data.users.map((user) => {
          const li = document.createElement("li");
          li.addEventListener("click", () => openMessageBox(user));
          li.classList.add("clearfix");
          const img = document.createElement("img");
          img.setAttribute(
            "src",
            "https://bootdey.com/img/Content/avatar/avatar1.png"
          );
          const aboutDiv = document.createElement("div");
          aboutDiv.classList.add("about");
          const nameDiv = document.createElement("div");
          nameDiv.classList.add("name");
          nameDiv.textContent = `${user.name} ${user.surname}`;
          aboutDiv.append(nameDiv);
          li.append(img, aboutDiv);
          ul.append(li);
        });
      } else {
        // ------------
      }
    });
});
