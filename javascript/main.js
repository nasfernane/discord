let currentChan = 'general';
let chanTitle = document.querySelector('.chanTitle');

function getMessages(chan) {
    const ajaxRequest = new XMLHttpRequest();
    ajaxRequest.open('GET', `../php/scripts/handler.php?chan=${chan}`);

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
    ajaxRequest.open('POST', `../php/scripts/handler.php?task=write&chan=${currentChan}`);

    ajaxRequest.onload = function () {
        getMessages(currentChan);
    };

    ajaxRequest.send(data);
    document.querySelector('#msgInput').value = '';
}

getMessages('general');

document.querySelector('.mainSection__form').addEventListener('submit', postMessage);

document
    .querySelector('.channelSection__Container__channel--general')
    .addEventListener('submit', function (e) {
        e.preventDefault();
        getMessages('general');
        currentChan = 'general';
        chanTitle.innerText = 'general';
    });

document
    .querySelector('.channelSection__Container__channel--live')
    .addEventListener('submit', function (e) {
        e.preventDefault();
        getMessages('live');
        currentChan = 'live';
        chanTitle.innerText = 'live';
    });

document
    .querySelector('.channelSection__Container__channel--tutos')
    .addEventListener('submit', function (e) {
        e.preventDefault();
        getMessages('tutos');
        currentChan = 'tutos';
        chanTitle.innerText = 'tutos';
    });

const interval = window.setInterval(function () {
    getMessages(currentChan);
}, 500);
