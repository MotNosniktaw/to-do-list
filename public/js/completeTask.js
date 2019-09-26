let completeTaskForm = document.getElementById('complete-task-form')

completeTaskForm.addEventListener('submit', async function (event) {
    event.preventDefault()

    console.log(completeTaskForm['task-id'].value)

    let data = {'task-id': completeTaskForm['task-id'].value}

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