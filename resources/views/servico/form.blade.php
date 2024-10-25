@extends('base')

@section('base.header')
@endsection

@section('conteudo')
    <h1>{{ isset($servico) ? 'Editar Serviço' : 'Novo Serviço' }}</h1>

    <form action="{{ isset($servico) ? route('servico.update', $servico->id) : route('servico.store') }}" method="POST">
        @csrf
        @if (isset($servico))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="nome_servico">Nome do Serviço</label>
            <input type="text" class="form-control" id="nome_servico" name="nome_servico" value="{{ $servico->nome_servico ?? '' }}" required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao">{{ $servico->descricao ?? '' }}</textarea>
        </div>

        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="number" class="form-control" id="preco" name="preco" value="{{ $servico->preco ?? '' }}" required step="0.01">
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($servico) ? 'Atualizar' : 'Criar' }}</button>
        <a href="{{ route('servico.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
