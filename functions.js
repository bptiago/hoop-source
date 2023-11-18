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

function validatePlayer(input) {
    let txtNome = input.nome.value;
    let txtDate = input.birth.value;
    let txtNacionalidade = input.nacionalidade.value;
    let txtPosicao = input.posicao.value;
    let txtCamiseta = input.camiseta.value;
    let txtAltura = input.altura.value;
    let txtValor = input.valorContrato.value;

    let flag = true;

    clearAlerts();

    const alertContainer = document.getElementById('alerts');

    if (!txtNome || !txtDate || !txtNacionalidade || !txtPosicao || !txtCamiseta || !txtAltura || !txtValor) {
        flag = false;
        createAlertDiv("Todos os campos são obrigatórios", alertContainer);
    }
    if (!txtPosicao.match(/(^ala$)|(^pivo$)|(^armador$)/gi)) {
        flag = false;
        createAlertDiv("Escreva a posição nos moldes: Pivo, Ala ou Armador", alertContainer);
    }
    if (!txtCamiseta.match(/(^\d{3}$)|(^\d{2}$)|(^\d$)/g)) {
        flag = false;
        createAlertDiv("Número de camiseta inválido", alertContainer);
    }
    if (!txtAltura.match(/^\d\.\d{2}$/g)) {
        flag = false;
        createAlertDiv("Escreva a altura nos moldes 1.60, 1.80 etc.", alertContainer);
    }
    if (!txtValor.match(/^\d+$/g)) {
        flag = false;
        createAlertDiv("Valor de contrato aceita apenas números. Exemplo: 1800000", alertContainer);
    }
    return flag;
}

function validateUserEdit(input) {
    let txtNome = input.nome.value;
    let txtDate = input.birth.value;
    let txtEmail = input.email.value;

    let flag = true;

    clearAlerts();

    const alertContainer = document.getElementById('alerts');

    if (!txtNome || !txtDate || !txtEmail) {
        flag = false;
        createAlertDiv("Todos os campos são obrigatórios", alertContainer);
    }
    if (!txtEmail.match(/[a-zA-Z0-9\.\-_]+@\w+\.(com|org|br|)/)) {
        flag = false;
        createAlertDiv("E-mail inválido", alertContainer);
    }
    return flag;
}

function validateTeam(input) {
    let txtNome = input.nome.value;
    let txtTecnico = input.tecnico.value;
    let txtEstado = input.estado.value;
    let txtCidade = input.cidade.value;
    let txtArena = input.arena.value;

    let flag = true;

    clearAlerts();

    const alertContainer = document.getElementById('alerts');

    if (!txtNome || !txtTecnico || !txtEstado || !txtCidade || !txtArena) {
        flag = false;
        createAlertDiv("Todos os campos são obrigatórios", alertContainer);
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