<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Paciente</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/cadastroPaciente.css') }}">
</head>
<body id="body">
@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif
    <div id="formCadastro">
        <form action="{{ url('/cadastroNovoPaciente') }}" method="post">
            @csrf
            <div id="cadastroNome">
                <label for="nomePaciente">Nome do paciente: </label>
                <input type="text" id="nomePaciente" name="nomePaciente" required/>
            </div>
            <div id="cadastroIdade">
                <label for="idadePaciente">Idade do paciente: </label>
                <input type="number" id="idadePaciente" name="idadePaciente" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required/>
            </div>
            <div id="cadastroCPF">
                <label for="cpfPaciente" id="labelCPF">CPF do paciente: </label>
                <input type="text" id="cpfPaciente" name="cpfPaciente" required/>
            </div>
            <div id="cadastroData">
                <label for="dataCadPaciente">Data de cadastro do paciente: </label>
                <input type="date" id="dataCadPaciente" name="dataCadPaciente" required/>
            </div>
            <div id="cadastroTel">
                <label for="telPaciente">Telefone do paciente: </label>
                <input type="text" id="telPaciente" name="telPaciente" />
            </div>
            <div id="cadastroEmail">
                <label for="emailPaciente">E-mail do paciente: </label>
                <input type="text" id="emailPaciente" name="emailPaciente" />
            </div>
            <div id="cadastroCEP">
                <label for="cep">CEP: </label>
                <input id="cep" name="cep" type="text" required/>
            </div>
            <div id="cadastroEndereco">
                <label for="endereco">Endereço: </label>
                <input id="endereco" name="endereco" type="text" disabled="disabled" required/>
                <input type="hidden" id="valorEndereco" name="valorEndereco" />
            </div>
            <div id="cadastroNumero">
                <label for="numero">Número da casa: </label>
                <input id="numero" name="numero" type="text" />
            </div>
            <input type="submit" value="Enviar" id="submitPaciente" />
        </form>
    </div>
    <script type="text/javascript">
		$("#idadePaciente").change(function(){
			var idade = $("#idadePaciente").val();

            if(idade < 18){
                alert('Informe o CPF de um responsável');
                $("#labelCPF").text('CPF do responsável: ');
            }else{
                $("#labelCPF").text('CPF do paciente: ');
            }

		});
        $("#cep").focusout(function(){
			$.ajax({
				url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
				dataType: 'json',
				success: function(resposta){
					$("#endereco").val(resposta.logradouro);
                    $("#valorEndereco").val(resposta.logradouro);
					$("#numero").focus();
				}
			});
		});
        $("#cpfPaciente").focusout(function(){
			
            var value = $("#cpfPaciente").val();

            value = jQuery.trim(value);

            value = value.replace('.','');
            value = value.replace('.','');
            cpf = value.replace('-','');
            while(cpf.length < 11) cpf = "0"+ cpf;
            var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
            var a = [];
            var b = new Number;
            var c = 11;
            for (i=0; i<11; i++){
                a[i] = cpf.charAt(i);
                if (i < 9) b += (a[i] * --c);
            }
            if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11-x }
            b = 0;
            c = 11;
            for (y=0; y<10; y++) b += (a[y] * c--);
            if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11-x; }

            var retorno = true;
            if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) retorno = false;

            if(retorno == false){
                alert('Informe um cpf válido!!!!');
                $("#cpfPaciente").focus();
            }
		});
	</script>
</body>
</html>