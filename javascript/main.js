function getMessages() {
    const ajaxRequest = new XMLHttpRequest();
    ajaxRequest.open('GET', '../php/scripts/handler.php');

    ajaxRequest.onload = function () {
        const results = JSON.parse(ajaxRequest.responseText);
        const html = results
            .reverse()
            .map(function (message) {
                return `
            <div class="message">
                <img>
                <div>
                    <span class="date">${message.sentAt.substring(11, 16)}</span>
                    <span class="author">${message.author}</span>
                    <span class="content">${message.content}</span>
                </div>
            </div>
            
            `;
            })
            .join('');

        const chatBox = document.querySelector('.messages');

        chatBox.innerHTML = html;
        chatBox.scrollTop = chatBox.scrollHeight;
    };

    ajaxRequest.send();
}

function postMessage(event) {
    event.preventDefault();
    const content = document.querySelector('#msgInput');

    const data = new FormData();
    data.append('content', content.value);

    const ajaxRequest = new XMLHttpRequest();
    ajaxRequest.open('POST', '../php/scripts/handler.php?task=write');

    ajaxRequest.onload = function () {
        getMessages();
    };

    ajaxRequest.send(data);
    document.querySelector('#msgInput').value = '';
}

window.addEventListener('load', getMessages);

document.querySelector('.mainSection__form').addEventListener('submit', postMessage);
