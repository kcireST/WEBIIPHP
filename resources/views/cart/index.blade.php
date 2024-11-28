@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Carrinho</h1>
    @if (session('cart'))
        <ul class="list-group">
            @foreach (session('cart') as $id => $item)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $item['name'] }} ({{ $item['quantity'] }} x R$ {{ number_format($item['price'], 2, ',', '.') }})
                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Remover</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>Seu carrinho está vazio!</p>
    @endif
</div>
@endsection
