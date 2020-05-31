function removeError(field) {
    field.classList.remove('error_field');
}

function resultProcess(formResult) {
    const emailField = document.getElementById('email');
    const nameField = document.getElementById('name');
    const resultMessage = document.getElementById('result');
    const form = document.getElementById('form');
    if (formResult['email'] == 'error') {
        emailField.classList.add('error_field');
        emailField.value = '';
        emailField.addEventListener('change', () => removeError(emailField));
        resultMessage.classList.add('hidden');
    }
    if (formResult['name'] == 'error') {
        nameField.classList.add('error_field');
        nameField.value = '';
        nameField.addEventListener('change', () => removeError(nameField));
        resultMessage.classList.add('hidden');
    }
    if ((formResult['name'] == 'correct') && (formResult['email'] == 'correct')) {
        resultMessage.classList.remove('hidden');
        form.reset();
    }
}

async function checkForm(event) {
    event.preventDefault();
    const result = await validate();
    resultProcess(result);
}

async function validate() {
    const formInfo = {
        'email': document.getElementById('email').value,
        'name': document.getElementById('name').value
    };
    const result = fetch(`check_data.php`,
        {
                method: 'POST',
                headers:
                    {
                        'Content-Type': 'application/json'
                    },
                body: JSON.stringify(formInfo)
            })
        .then(successResponse => successResponse.status == 200
            ? successResponse.json() // читаем как json
            : console.log('not ok')
        );
    return await result;
}

async function run() {
    const sendButton = document.getElementById('form');
    sendButton.addEventListener("submit", checkForm);
}

window.onload = run;