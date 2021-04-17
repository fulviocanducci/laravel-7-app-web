@extends('_layout.index')
@section('content')
@include('_layout.title', ['title' => 'Filial - Listagem'])
@include('_layout.buttons.button-new', ['route' => 'branch.create'])
<table class="table table-sm table-hover">
    <thead>
        <tr>
            <th scope="col" class="text-center">Descrição</th>
            <th scope="col" class="text-center">Ativo</th>
            <th scope="col" class="text-center">...</th>
        </tr>
    </thead>
    <tbody>
        @foreach($model as $item)
        <tr>
            <td class="align-middle">{{$item->name}}</td>
            <td class="align-middle text-center">
                @include('_layout.icons.active', ['status' => isset($model) ? $item->active: 0])
            </td>
            <td class="align-middle text-center">
                @include('_layout.buttons.button-edit', ['route' => 'branch.edit', 'params' => ['id' => $item->id]])
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection