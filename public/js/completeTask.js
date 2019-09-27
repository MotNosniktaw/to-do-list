function applyCompleteListeners() {

let completeTaskForm = document.querySelectorAll('.complete-button')

completeTaskForm.forEach( function (element) {
    console.log(element)
    element.addEventListener('click', async function (event) {
    event.preventDefault()

    console.log(element.value)

    let data = {'task-id': element.value}

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
}