const chatForm = document.querySelector('#chat'),
submitButton = chatForm.querySelector('button'),
inputField = chatForm.querySelector('#input-field'),
messageBox = document.querySelector('.message-body'),
userDetails = document.querySelector('#user-details')

chatForm.onsubmit = (e) => {
    e.preventDefault()
}
function scrollToBottom() {
    messageBox.scrollTop = messageBox.scrollHeight
}

messageBox.onmouseenter = () => {
    messageBox.classList.add('active')
}

messageBox.onmouseleave = () => {
    messageBox.classList.remove('active')
}

    
submitButton.onclick = () => {
   
    let xhr = new XMLHttpRequest()
    xhr.open('POST', 'chat.php', true)
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200 && inputField.value !== '') {
                inputField.value = ''
                scrollToBottom()
                 
            }
        }
    }
    let formData = new FormData(chatForm)
    xhr.send(formData)

}

setInterval(() => {
    
    let xhr = new XMLHttpRequest()
    xhr.open('POST', 'chatMessages.php', true)
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response
                messageBox.innerHTML = data
                if (!messageBox.classList.contains('active')) {
                    scrollToBottom()
                }
                
            }
        }
    }
    let formData = new FormData(chatForm)
    xhr.send(formData)
}, 500);

setInterval(() => {
    
    let xhr = new XMLHttpRequest()
    xhr.open('POST', 'userStatus.php', true)
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response
                userDetails.innerHTML = data
                
            }
        }
    }
    let formData = new FormData(chatForm)
    xhr.send(formData)
}, 500);