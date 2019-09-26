async function populateToDoList() {
    try {
        let response = await fetch('/get-task', {headers: {'Content-type': 'application/json'}})
        console.log(response)
        let json = await response.json()
        console.log(json)
        let uncompleted = json['uncompleted']
        console.log(uncompleted)
        uncompleted.forEach(function (task) {
            document.getElementById('complete-task-form').innerHTML += '<div class="list-item"><span>' + task['task'] + '</span><button class="complete-button button" type=submit name="task-id" value="' + task['id'] + '">Done</button></div>'
        })
    } catch (error) {
        console.error(error)
    }
}

populateToDoList()