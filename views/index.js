const btnLogin = document.getElementById('btn-login');
const btnClick = document.getElementById('btn-click');
const tableBody = document.getElementById('table-body')



var tokens;
var sessionName;
var datos;


//SE HACE LA PETICION GET CHALLENGER
addEventListener('DOMContentLoaded', async () => {

    const result = await fetch('http://localhost/prueba/getChallenger')
        .then(response => response.text())
        .then(result => {
            //tokens = JSON.parse(result.toString().slice(0, result.length - 1)).result.token
            tokens = JSON.parse(result).result.token
        })
        .catch(error => console.log('error', error));

});

//ESCUCHADOR DE BOTON LOGIN PARA HACER LA PETICION LOGIN
btnLogin.addEventListener('click', () => {
    var myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

    var urlencoded = new URLSearchParams();
    urlencoded.append("token", tokens);

    var requestOptions = {
        method: 'POST',
        headers: myHeaders,
        body: urlencoded,
        redirect: 'follow'
    };

    fetch("http://localhost/prueba/login", requestOptions)
        .then(response => response.text())
        .then(resultado => {
            console.log(JSON.parse(resultado))
            sessionName = JSON.parse(resultado).result.sessionName
            btnClick.disabled = false;
        })
        .catch(error => console.log('error', error));
})

//ESCUCHADOR DE BOTON LISTAR CONTACTOS PARA HACER LA CONSULTA .
btnClick.addEventListener('click', () => {

    var tableStr = '';

    fetch("http://localhost/prueba/consulta?sessionName=" + sessionName)
        .then(response => response.text())
        .then(resultado => {
            datos = JSON.parse(resultado).result;
            datos.forEach(d => {
                tableStr += `
                    <tr>
                        <th scope="row">${d.id}</th>
                        <td>${d.contact_no}</td>
                        <td>${d.lastname}</td>
                        <td>${d.createdtime}</td>
                    </tr>
                    `;
            })
            tableBody.innerHTML = tableStr;
        })
        .catch(error => console.log('error', error));
});