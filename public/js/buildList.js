async function populateToDoList() {
    try {
        let response = await fetch('/get-task', {headers: {'Content-type': 'application/json'}})
        let json = await response.json()
        let uncompleted = json['uncompleted']

        document.getElementById('complete-task-form').innerHTML = ''

        uncompleted.forEach(function (task) {
            document.getElementById('complete-task-form').innerHTML += '<div class="list-item"><span>' + task['task'] + '</span><button class="complete-button button" type=submit name="task-id" value="' + task['id'] + '">Done</button></div>'
        })
    } catch (error) {
        console.error(error)
    }
    applyCompleteListeners()
}

async function populateDoneList() {
    try {
        let response = await fetch('/get-task', {headers: {'Content-type': 'application/json'}})
        let json = await response.json()
        let completed = json['completed']

        document.getElementById('delete-task-form').innerHTML = ''

        completed.forEach(function (task) {
            document.getElementById('delete-task-form').innerHTML += '<div class="list-item"><span>' + task['task'] + '</span><button class="delete-button button" type=submit name="task-id" value="' + task['id'] + '">Delete</button></div>'
        })
    } catch (error) {
        console.error(error)
    }
    applyDeleteListeners()
}

populateToDoList()
populateDoneList()