function getMessages() {
    const ajaxRequest = new XMLHttpRequest();
    ajaxRequest.open('GET', '../php/scripts/handler.php');

    ajaxRequest.onload = function () {
        const results = JSON.parse(ajaxRequest.responseText);
        const html = results
            .reverse()
            .map(function (message) {
                const date = new Date();
                const messageYear = message.sentAt.substring(0, 4);
                const actualYear = date.getFullYear();
                const messageMonth = message.sentAt.substring(5, 7);
                const actualMonth =
                    date.getMonth() < 10 ? `0${date.getMonth() + 1}` : date.getMonth() + 1;
                const messageDay = message.sentAt.substring(8, 10);
                const actualDay = date.getDate() < 10 ? `0${date.getDate()}` : date.getDate();

                let displayMessage;

                if (
                    messageYear == actualYear &&
                    messageMonth == actualMonth &&
                    messageDay == actualDay
                ) {
                    displayMessage = `Aujourd'hui à ${message.sentAt.substring(11, 16)}`;
                } else if (
                    messageYear == actualYear &&
                    messageMonth == actualMonth &&
                    messageDay == actualDay - 1
                ) {
                    displayMessage = `Hier à ${message.sentAt.substring(11, 16)}`;
                } else {
                    displayMessage = `${messageDay}/${messageMonth}/${messageYear}`;
                }

                return `
                <div class="message">
                    <img src="../assets/img/user.png" alt="" />
                    <div class="message__content">
                        <div class="message__content--infos">
                            <p>
                                <span class="author">${message.author}</span>
                                <span class="date">${displayMessage}</span>

                            </p>
                            
                        </div>
                        
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

const interval = window.setInterval(getMessages, 500);

getMessages();

document.querySelector('.mainSection__form').addEventListener('submit', postMessage);
