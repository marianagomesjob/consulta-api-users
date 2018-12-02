@extends('layouts.app')

@section('title', 'Busca de usuários via API')

@section('content')

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Faça uma busca</h1>
            <p class="lead text-muted">Você pode buscar por nome competo e/ou CPF, basta digitar os dados abaixo.</p>
            <form action="{{ route('search.search') }}" method="get">
                <div class="row text-left">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="form-group">
                            <label for="name">Nome completo: </label>
                            <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ app('request')->input('name') }}" name="name" id="name" placeholder="Digite o nome completo">
                            @if ($errors->has('name'))
                            <span class="invalid-feedback"> {{ $errors->first('name') }} </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-3">
                        <div class="form-group">
                            <label for="cpf">CPF: </label>
                            <input type="text" class="form-control cpf {{ $errors->has('cpf') ? ' is-invalid' : '' }}" value="{{ app('request')->input('cpf') }}" name="cpf" id="cpf" placeholder="Digite o CPF">
                            @if ($errors->has('cpf'))
                            <span class="invalid-feedback"> {{ $errors->first('cpf') }} </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <button type="submit" class="btn btn-success btn-block">Pesquisar</button>
                    </div>
                </div>

            </form>
        </div>
    </section>

    @if (isset($users) && !is_null($users) )
        <h1 class="display-4">Resultados da busca</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th>CPF</th>
                </tr>
            </thead>
            <tbody>
                @if (count($users->Result) == 0)
                    <tr class="odd"><td valign="top" colspan="5" class="text-center">Nenhum registro encontrado</td></tr>
                @else
                    @foreach ($users->Result as $user)
                        <tr>
                            <th scope="row">{{ $user->BasicData->Name }}</th>
                            <th>{{ $user->BasicData->TaxIdNumber }}</th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    @endif

@endsection
