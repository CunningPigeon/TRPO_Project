function validation(form){

    function createError(input, text) {
        const parent = input.parentNode;
        const errorLabel = document.createElement('label')

        errorLabel.classList.add('error-label')
        errorLabel.textContent= text

        parent.classList.add('error')

        parent.append(errorLabel)
        console.log(parent);
    }
    let result = true;

    const allInputs = form.querySelectorAll('input');

    for (const input of allInputs){
        
        if (input.value == "") {
            console.log('Error fo');
            createError(input, 'Поле не заполнено')
            result = false;
        }
    }

    return result
}


document.getElementById('add-form').addEventListener('submit', function(event){
    
    if (validation(this) == true){
        alert('Forma')
    }
})