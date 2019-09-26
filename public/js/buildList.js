async function populateToDoList() {
    try {
        let response = await fetch('/get-task')
        let json = await response.json()
        console.log(json)
    } catch (error) {
        console.error(error)
    } 
}