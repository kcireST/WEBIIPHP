@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">

    <!-- Menu de Navegação -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">E-Commerce</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Sobre Nós</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#products">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contatos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Home -->
    <section id="home" class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1>Bem-vindo ao Nosso E-Commerce</h1>
            <p>Descubra os melhores produtos ao alcance de um clique!</p>
        </div>
    </section>

    <!-- Sobre Nós -->
    <section id="about" class="py-5">
        <div class="container">
            <h2 class="text-center">Sobre Nós</h2>
            <p class="text-center">Somos uma loja dedicada a oferecer produtos de alta qualidade com preços acessíveis. Nossa missão é proporcionar uma experiência de compra inesquecível para nossos clientes.</p>
        </div>
    </section>

    <!-- Produtos -->
    <section id="products" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center">Produtos</h2>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <p class="card-text"><strong>R$ {{ number_format($product->price, 2, ',', '.') }}</strong></p>
                                <a href="#" class="btn btn-primary">Comprar</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contatos -->
    <section id="contact" class="py-5">
        <div class="container">
            <h2 class="text-center">Contatos</h2>
            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Mensagem</label>
                    <textarea name="message" id="message" rows="4" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </section>

    <!-- Rodapé -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2024 E-Commerce. Todos os direitos reservados.</p>
    </footer>

</div>
@endsection
