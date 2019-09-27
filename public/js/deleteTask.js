function applyDeleteListeners() {

let deleteTaskButtons = document.querySelectorAll('.delete-button')

deleteTaskButtons.forEach( function (element) {
    element.addEventListener('click', async function (event) {
        event.preventDefault()

        let data = {'task-id': element.value}

        let output = {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify(data)
        }

        try {
            let response = await fetch('/delete-task', output)
            let json = await response.json()
            console.log(json)
        } catch (error) {
            console.error(error)
        }

        populateDoneList();

    })
})
}
