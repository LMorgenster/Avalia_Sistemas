let cadastrar = document.querySelector("#cadastrar");
let criar_veiculo = document.querySelector("#criar_veiculo");
let atualizar_veiculo = document.querySelector("#atualizar-veiculo");
let fechar = document.querySelector("#fechar");
let editar = document.querySelector("#editar");
let salvar = document.querySelector("#salvar");
let atualizar = document.querySelector("#atualizar");


cadastrar.addEventListener("click", () => {
    criar_veiculo.style.display="flex";
});

fechar.addEventListener("click", () => {
    criar_veiculo.style.display="none";
});

editar.addEventListener("click", () => {
    atualizar_veiculo.style.display="flex";
});

salvar.addEventListener("click", async () => {
    try{
        let nome=document.querySelector("#nome").value;
        let marca=document.querySelector("#marca").value;
        let ano=document.querySelector("#ano").value;
        let valor_de_venda=document.querySelector("#valor_de_venda").value;
        const res=await fetch("php/inserir.php", {
            method:"POST",
            body: JSON.stringify({"nome":nome, "marca":marca, "ano":ano, "valor_de_venda":valor_de_venda}),
            headers: {
                "Content-Type" : "application/json"
            }
        });
        const output = await res.json();
        if(output.success){
            alert(output.message);
            nome="";
            marca="";
            ano="";
            valor_de_venda="";
            criar_veiculo.style.display="none";
            getVeiculos();
        } else {
            alert(output.message);
        }
    } catch(error){
        console.log("error "+error.message)
    }
})

const getVeiculos = async() => {
    try{
        const tbody=document.querySelector('#tbody');
        let tr ="";
        const res = await fetch("php/selecionar.php", {
            method: "GET",
            headers: {
                "Content-Type" : "application/json"
            }
        });

        const output = await res.json();
        if(output.empty === "empty"){
            tr="<tr>Veículo não Encontrado</td>"
        } else {
            for(var i in output){
                tr+=`
            <tr>
            <td>${output[i].id}</td>
            <td>${output[i].nome}</td>
            <td>${output[i].ano}</td>
            <td>${output[i].marca}</td>
            <td>${output[i].valor_de_venda}</td>
            <td><button onclick="editarVeiculo(${output[i].id})" class="btn btn-success" id="editar">Editar</button></td>
            <td><button onclick="deletarVeiculo(${output[i].id})"class="btn btn-danger" id="deletar">Deletar</button></td>
            </tr>
            `
            }
        }
        tbody.innerHTML = tr;
    } catch(error){
        console.log("error " + error.message)
    }
}

getVeiculos();

const editarVeiculo = async(id) => {
    atualizar_veiculo.style.display="flex";

    const res = await fetch(`php/editar.php?id=${id}`, {
        method: "GET",
        headers: {
            "Content-Type" : "application/json"
        }
    })

    const output = await res.json();
    if(output["empty"] !== "empty"){
        for(var i in output){
            document.querySelector("#id").value = output[i].id;
            document.querySelector("#atualizar_nome").value = output[i].nome;
            document.querySelector("#atualizar_marca").value = output[i].marca;
            document.querySelector("#atualizar_ano").value = output[i].ano;
            document.querySelector("#atualizar_valor_de_venda").value = output[i].valor_de_venda;
        }
    }
}

atualizar.addEventListener("click", async () => {
    let id=document.querySelector("#id").value;
    let nome=document.querySelector("#atualizar_nome").value;
    let marca=document.querySelector("#atualizar_marca").value;
    let ano=document.querySelector("#atualizar_ano").value;
    let valor_de_venda=document.querySelector("#atualizar_valor_de_venda").value;

    const res = await fetch("php/atualizar.php", {
        method: "POST",
        body:JSON.stringify({
            "id":id,
            "nome":nome,
            "marca":marca,
            "ano":ano,
            "valor_de_venda":valor_de_venda
        })
    });

    const output = await res.json();
    if(output.success){
        alert(output.message);
        nome="";
        marca="";
        ano="";
        valor_de_venda="";
        atualizar_veiculo.style.display="none";
        getVeiculos();
    } else {
        alert(output.message);
    }
})

const deletarVeiculo = async (id) => {
    const res = await fetch("php/deletar.php?id="+id, {
        method:"GET",
    });

    const output = await res.json();
    if(output.success){
        alert(output.message);
        criar_veiculo.style.display="none";
        getVeiculos();
    } else {
        alert(output.message);
    }

}