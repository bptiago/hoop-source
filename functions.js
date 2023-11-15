function validateForm(input) {
    let txtName = input.name.value;
    let txtUserName = input.username.value;
    let txtEmail = input.email.value;
    let txtDate = input.birth.value;
    let txtPassword = input.password.value;
    let txtRepeatPassword = input.confirmPassword.value

    let flag = true;

    clearAlerts();

    const alertContainer = document.getElementById('alerts');
    console.log(txtDate);
    console.log(txtName);
    console.log(txtPassword);
    console.log(txtRepeatPassword);
    console.log(txtEmail);
    console.log(txtUserName);
    if (!txtName || !txtUserName || !txtEmail || !txtDate || !txtPassword || !txtRepeatPassword) {
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