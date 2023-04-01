<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>CRUD para Avalia Sistemas</title>
</head>
<body>
    <div class="container-fluid">
        <div class="container">
            <h1>Cadastro de Veículos</h1>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Veículos</h3>
                <button class="btn btn-primary" id="cadastrar">Cadastrar</button>
            </div>    
        </div>
    </div>

    <div class="container">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Marca</th>
                        <th>Ano</th>
                        <th>Valor de Venda</th>
                        <th>Editar</th>
                        <th>Deletar</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <tr>
                        <td>ID</td>
                        <td>Nome</td>
                        <td>Marca</td>
                        <td>Ano</td>
                        <td>Valor de Venda</td>
                        <td><button class="btn btn-success" id="editar">Editar</button></td>
                        <td><button class="btn btn-danger">Deletar</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal" id="criar_veiculo">
        <div class="modal-body">
            <h3>Cadastrar Veículo</h3>
            <form action="">
                <div class="form-group">
                    <label for=""><b>Nome do Veículo: </b>
                    <input type="text" placeholder="Nome do Veículo" id="nome" class="form-control">
                </div>
                <div class="form-group">
                    <label for=""><b>Marca do Veículo: </b>
                    <input type="text" placeholder="Marca do Veículo" id="marca" class="form-control">
                </div>
                <div class="form-group">
                    <label for=""><b>Ano do Veículo: </b>
                    <input type="text" placeholder="Ano do Veículo" id="ano" class="form-control">
                </div>
                <div class="form-group">
                    <label for=""><b>Valor de Venda do Veículo: </b>
                    <input type="text" placeholder="Valor de Venda do Veículo" id="valor_de_venda" class="form-control">
                </div>
                <div class="form-group buttons">
                    <button class="btn btn-success" type="submit" id="salvar">Salvar</button>
                    <button class="btn btn-danger" type="submit" id="fechar">Fechar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal" id="atualizar-veiculo">
        <div class="modal-body">
            <h3>Atualizar Veículo</h3>
            <form action="">
            <div class="form-group">
                    <label for=""><b>ID do Veículo: </b>
                    <input type="text" placeholder="ID do Veículo" id="id" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for=""><b>Nome do Veículo: </b>
                    <input type="text" placeholder="Nome do Veículo" id="atualizar_nome" class="form-control">
                </div>
                <div class="form-group">
                    <label for=""><b>Marca do Veículo: </b>
                    <input type="text" placeholder="Marca do Veículo" id="atualizar_marca" class="form-control">
                </div>
                <div class="form-group">
                    <label for=""><b>Ano do Veículo: </b>
                    <input type="text" placeholder="Ano do Veículo" id="atualizar_ano" class="form-control">
                </div>
                <div class="form-group">
                    <label for=""><b>Valor de Venda do Veículo: </b>
                    <input type="text" placeholder="Valor de Venda do Veículo" id="atualizar_valor_de_venda" class="form-control">
                </div>
                <div class="form-group buttons">
                    <button class="btn btn-success" type="submit" id="atualizar">Atualizar</button>
                    <button class="btn btn-danger" type="submit" id="fechar">Fechar</button>
                </div>
            </form>
        </div>
    </div>

    <script src="js/app.js"></script>

</body>
</html>