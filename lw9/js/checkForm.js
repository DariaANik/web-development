function errorProcess(field, resultMessage) {
    field.classList.add('error_field');
    field.value = '';
    field.addEventListener('change', function removeFunction(event) {
        this.removeEventListener('change', removeFunction);
        this.classList.remove('error_field');
    });
    resultMessage.classList.add('hidden');
}

function resultProcess(formResult) {
    const emailField = document.getElementById('email');
    const nameField = document.getElementById('name');
    const resultMessage = document.getElementById('result');
    const form = document.getElementById('form');
    if (formResult['email'] == 'error') {
        errorProcess(emailField, resultMessage);
    }
    if (formResult['name'] == 'error') {
        errorProcess(nameField, resultMessage);
    }
    if ((formResult['name'] == 'correct') && (formResult['email'] == 'correct')) {
        resultMessage.classList.remove('hidden');
        form.reset();
    }
}

async function checkForm(event) {
    if (event.cancelable) {
        event.preventDefault();
    }
    const result = await validate();
    resultProcess(result);
}

async function validate() {
    const formInfo = {
        'email': document.getElementById('email').value,
        'name': document.getElementById('name').value
    };
    const result = fetch(`check_data.php`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(formInfo)
            })
            .then(successResponse => successResponse.status == 200
                ? successResponse.json()
                : console.log('not ok')
            );
    return await result;
}

function run() {
    const sendButton = document.getElementById('form');
    sendButton.addEventListener("submit", checkForm);
}

window.onload = run;