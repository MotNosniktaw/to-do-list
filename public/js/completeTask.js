let completeTaskForm = document.querySelectorAll('.complete-button')

completeTaskForm.forEach( function (element) {
    element.addEventListener('submit', async function (event) {
    event.preventDefault()

    let data = {'task-id': completeTaskForm}

    let output = {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(data)
    }

    try {
        let response = await fetch('/complete-task', output)
        let json = await response.json()
        console.log(json)
    } catch (error) {
        console.error(error)
    }

    populateToDoList();
    populateDoneList();

})
})