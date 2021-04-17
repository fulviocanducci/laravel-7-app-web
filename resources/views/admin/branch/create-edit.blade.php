@extends('_layout.index')
@section('content')
@include('_layout.title', ['title' => 'Filial - '.(isset($model) ? "Alteração" : "Cadastro")])
@include('_layout.errors.error')
<form action="{{route('branch.store')}}" method="POST">
    @csrf
    @if (isset($model) && $model->id > 0)
    @include('_layout.forms.hidden', ['name' => 'id', 'value' => $model->id])
    @endif
    @include('_layout.forms.input',['name' => 'name', 'value' => isset($model) ? $model->name:"", 'label' => "Descrição:", 'placeholder' => "Digite a descrição"])
    @include('_layout.forms.check',['name' => 'active', 'checked' => isset($model) ? $model->active:0, 'label' => "Ativo"])
    <div class="mt-4">
        @include('_layout.buttons.button-submit', ['label' => (isset($model) ? "Alterar" : "Cadastrar")])
        @include('_layout.buttons.button-cancel', ['route' => 'branch.index'])
    </div>
</form>
@endsection