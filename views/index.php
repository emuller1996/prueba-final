<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRUEBA FINAL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <h2 class="text-center">Prueba Final</h2>
    <button id="btn-login" class="btn btn-primary">Login</button>

    <button id="btn-click" class="btn btn-primary" disabled> Listar Contactos</button>
    <div class="container">
        <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">contact_no</th>
            <th scope="col">lastname</th>
            <th scope="col">createdtime</th>
            </tr>
        </thead>
        <tbody id="table-body" >
            
           
        </tbody>
        </table>

        

    </div>



    <script src="views/index.js"></script>
</div>
    
</body>
</html>