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
                    <form action="/" method="post">
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
                                    @foreach ($estados as $estado)
                                        <option value="{{$estado->id}}">{{$estado->nome}}</option> 
                                    @endforeach
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
                                    {{-- <option value="disabled">Selecione</option> --}}
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
                                <select id="parent" name="business_parent" class="form-control select {{ $errors->has('parent') ? 'is-invalid' : '' }} " value="{{ old('parent') }}">
                                    <option value=" ">Selecione</option>
                                    @foreach ($empresarios as $empresario)
                                        <option value="{{$empresario->id}}">{{$empresario->name}}</option> 
                                    @endforeach
                                    <p id="stateError" class="text-danger">Selecione um estado válido</p>
                                </select>
                                @if($errors->has('parent'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('parent') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <input type="submit" value="Cadastrar" class="btn btn-success">
                    </form>
                    
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
                            @foreach($empresarios as $empresario)
                                <tr>
                                    <td>{{$empresario->name}}</td>
                                    <td>{{$empresario->cell}}</td>
                                    <td>{{$empresario->city}}</td>
                                    <td>{{$empresario->created_at}}</td>
                                    <td>{{$empresario->business_parent}}</td>
                                    
                                        <td class="text-center">
                                        <a href="" class="btn btn-sm btn-primary">Ver Rede</a>
                                        <a href="" class="btn btn-sm btn-danger">Excluir</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src='/js/scripts.js'></script>
    
</body>
</html>