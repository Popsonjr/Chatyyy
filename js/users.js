const searchButton = document.querySelector('.search button'),
searchBar = document.querySelector('.search input'),
displayedText = document.querySelector('#text'),
users = document.querySelector('.list-group')

searchButton.onclick = () => {
    
    searchBar.classList.toggle('d-none')
    searchButton.classList.toggle('active')
    displayedText.classList.toggle('d-none')
    if (searchButton.classList.contains('active')) {
        searchButton.innerHTML = 'X'
    } else {
        searchButton.innerHTML = 'Search'
    }
}

// let searchTerm = ''
searchBar.onkeyup = () => {
    searchTerm = searchBar.value

    let xhr = new XMLHttpRequest() //creating new xml object
    xhr.open('POST', 'search.php', true)
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response
                users.innerHTML = data   
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xhr.send("searchTerm=" + searchTerm)
}

setInterval(() => {
    let xhr = new XMLHttpRequest()
    xhr.open('GET', 'users.php', true)
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response
                if (!searchButton.classList.contains('active')) {
                    users.innerHTML = data
                    console.log('refresh')
                }
            }
        }
    }
    xhr.send();
}, 500);
