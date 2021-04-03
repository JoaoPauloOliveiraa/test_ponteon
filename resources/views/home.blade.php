<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body class="bg-secondary">
    <div class="container-fluid col-10 mt-3">
    <div class="fade-in">
        <div class="card">
            <div class="card-header"> <h1 class="text-center text-dark font-weight-bold">Cadastro de Empresários</h1>
                <div class="card-header-actions">
                </div>
            </div>
            <div class="card-body col-8 offset-2">
                    <form action="{{url('@create')}}" method="post">
                        @csrf
                        <div class="input mb-3">
                            <label>Nome</label><br>
                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                value="{{ old('name') }}" placeholder="Nome Completo" autofocus>           
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </div>
                            @endif
                        </div>
            
                        <div class="input mb-3">
                            <label>Celular</label><br>
                            <input type="cell" name="cell" class="form-control {{ $errors->has('cell') ? 'is-invalid' : '' }}"
                                value="{{ old('cell') }}" placeholder="Celular">
                            @if($errors->has('cell'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('cell') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="input mb-3">
                            <label>Estado</label><br>
                            <div class="form-inline">
                                <select id="state" name="state" class="form-control">
                                        <option value="">Selecione</option>
                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="AP">Amapá</option>
                                        <option value="AM">Amazonas</option>
                                        <option value="BA">Bahia</option>
                                        <option value="CE">Ceará</option>
                                        <option value="DF">Distrito Federal</option>
                                        <option value="ES">Espirito Santo</option>
                                        <option value="GO">Goiás</option>
                                        <option value="MA">Maranhão</option>
                                        <option value="MS">Mato Grosso do Sul</option>
                                        <option value="MT">Mato Grosso</option>
                                        <option value="MG">Minas Gerais</option>
                                        <option value="PA">Pará</option>
                                        <option value="PB">Paraíba</option>
                                        <option value="PR">Paraná</option>
                                        <option value="PE">Pernambuco</option>
                                        <option value="PI">Piauí</option>
                                        <option value="RJ">Rio de Janeiro</option>
                                        <option value="RN">Rio Grande do Norte</option>
                                        <option value="RS">Rio Grande do Sul</option>
                                        <option value="RO">Rondônia</option>
                                        <option value="RR">Roraima</option>
                                        <option value="SC">Santa Catarina</option>
                                        <option value="SP">São Paulo</option>
                                        <option value="SE">Sergipe</option>
                                        <option value="TO">Tocantins</option>
                                    <p id="stateError" class="text-danger">Selecione um estado válido</p>
                                </select>
                                @if($errors->has('state'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="input mb-3">
                            <label>Cidade</label><br>
                            <div class="form-inline">
                                <select id="city" name="city" class="form-control custom-select" disabled>
                                    <option value="disabled">Selecione...</option>
                                    <p id="stateError" class="text-danger">Selecione um estado válido</p>
                                </select>
                                @if($errors->has('city'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="input mb-3">
                            <label>Pai Empresarial</label><br>
                            <div class="form-inline">
                                <select id="parent" name="parent" class="form-control select {{ $errors->has('parent') ? 'is-invalid' : '' }} " value="{{ old('parent') }}">
                                    <option value="">Selecione...</option>
                                    <p id="stateError" class="text-danger">Selecione um estado válido</p>
                                </select>
                                @if($errors->has('parent'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('parent') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </form>
                    <a href="" class="btn btn-sm btn-success">Cadastrar</a>
                </div>
            </div>
        </div>
    </div>








    
    <div class="container-fluid col-10 mt-3">
        @if (session('deleted'))
            <div class="alert alert-danger" role="alert">
                {{ session('deleted') }}
            </div>
        @endif
        
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="fade-in">
            <div class="card">
                <div class="card-header"> <h1 class="text-center text-dark font-weight-bold">Empresários cadastrados</h1>
                    <div class="card-header-actions">
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="thead text-center">
                            <tr role="row">
                                <th>Nome Completo</th>
                            
                                <th>Celular</th>
                                
                                <th>Cidade/UF</th>
                                
                                <th>Cadastrado em</th>
                                
                                <th>Pai Empresarial</th>
                    
                                <th>Acões</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                        <td class="text-center">
                                        <a href="" class="btn btn-sm btn-primary">Ver Rede</a>
                                        <a href="" class="btn btn-sm btn-danger">Excluir</a>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>