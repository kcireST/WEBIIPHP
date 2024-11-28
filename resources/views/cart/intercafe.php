@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="fw-bold">Carrinho</h1>
    @if (session('cart') && count(session('cart')) > 0)
        <table class="table table-hover mt-4">
            <thead class="table-light">
                <tr>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Total</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach (session('cart') as $id => $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>R$ {{ number_format($item['price'], 2, ',', '.') }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>R$ {{ number_format($item['quantity'] * $item['price'], 2, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Remover</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end mt-3">
            <a href="#" class="btn btn-primary btn-lg">Finalizar Compra</a>
        </div>
    @else
        <p class="text-center text-muted mt-5">Seu carrinho está vazio. Adicione produtos para continuar.</p>
    @endif
</div>
@endsection
