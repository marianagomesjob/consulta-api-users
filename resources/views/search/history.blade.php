@extends('layouts.app')

@section('title', 'Histórico de pesquisa de usuários via API')

@section('content')

    <h1 class="display-4">Histórico de pesquisa</h1>
    <table class="table mt-3">
        <thead>
        <tr>
            <th scope="col">Nome</th>
            <th>CPF</th>
            <th>Data da pesquisa</th>
        </tr>
        </thead>
        <tbody>
        @if (count($searches) == 0)
            <tr class="odd"><td valign="top" colspan="2" class="text-center">Nenhum registro encontrado</td></tr>
        @else
            @foreach ($searches as $user)
                <tr>
                    <th scope="row">{{ $user->name }}</th>
                    <th>{{ $user->cpf }}</th>
                    <th>{{ $user->created_at }}</th>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@endsection
