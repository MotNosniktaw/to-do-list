let deleteTaskForm = document.getElementById('delete-task-form')

deleteTaskForm.addEventListener('submit', async function (event) {
    event.preventDefault()

    console.log(deleteTaskForm['task-id'].value)

    let data = {'task-id': deleteTaskForm['task-id'].value}

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