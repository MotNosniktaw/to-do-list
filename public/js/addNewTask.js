let newTaskForm = document.getElementById('new-task-form')

newTaskForm.addEventListener('submit', async function (event) {
    event.preventDefault()

    console.log(newTaskForm['new-task'].value)

    let data = {'new-task': newTaskForm['new-task'].value}

    let output = {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(data)
    }

    try {
        let response = await fetch('/add-task', output)
        let json = await response.json()
        console.log(json)
    } catch (error) {
        console.error(error)
    }

    populateToDoList();

})