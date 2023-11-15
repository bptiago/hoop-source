function validateCadastro(input) {
    let txtName = input.name.value;
    let txtEmail = input.email.value;
    let txtDate = input.birth.value;
    let txtPassword = input.password.value;
    let txtRepeatPassword = input.confirmPassword.value

    let flag = true;

    clearAlerts();

    const alertContainer = document.getElementById('alerts');

    if (!txtName || !txtEmail || !txtDate || !txtPassword || !txtRepeatPassword) {
        flag = false;
        createAlertDiv("Todos os campos são obrigatórios", alertContainer);
    }
    if (!txtEmail.match(/[a-zA-Z0-9\.\-_]+@\w+\.(com|org|br|)/)) {
        flag = false;
        createAlertDiv("E-mail inválido", alertContainer);
    }
    if (txtPassword.length < 7) {
        flag = false;
        createAlertDiv("Senha requer pelo menos 7 caracteres", alertContainer);
    }
    if (txtRepeatPassword !== txtPassword) {
        flag = false;
        createAlertDiv("Senhas não batem", alertContainer);
    }
    return flag;
}

function validateLogin(input) {
    let txtEmail = input.email.value;
    let txtPassword = input.password.value;

    let flag = true;

    clearAlerts();

    const alertContainer = document.getElementById('alerts');
    if (!txtEmail || !txtPassword) {
        flag = false;
        createAlertDiv("Todos os campos são obrigatórios", alertContainer);
    }
    if (!txtEmail.match(/[a-zA-Z0-9\.\-_]+@\w+\.(com|org|br|)/)) {
        flag = false;
        createAlertDiv("E-mail inválido", alertContainer);
    }
    if (txtPassword.length < 7) {
        flag = false;
        createAlertDiv("Senha requer pelo menos 7 caracteres", alertContainer);
    }
    return flag;
}

function createAlertDiv(message, alertContainer) {
    let newDiv = document.createElement('div');
    newDiv.className = 'alert';
    newDiv.innerHTML = message;
    alertContainer.appendChild(newDiv);
}

function clearAlerts() {
    const alertContainer = document.getElementById('alerts');
    const alerts = document.querySelectorAll('.alert');
    for (let alert of alerts) {
        alertContainer.removeChild(alert);
    }
    return
}