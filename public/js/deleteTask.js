let deleteTaskForm = document.querySelectorAll('.delete-button')

deleteTaskForm.forEach( function (element) {
    element.addEventListener('submit', async function (event) {
    event.preventDefault()

    let data = {'task-id': deleteTaskForm}

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
