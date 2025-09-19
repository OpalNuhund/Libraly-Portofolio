@extends('layouts.mainForm')

@section('title')
Login
@endsection

@section('container')
        <a href="/perpustakaan" class="btn-back" data-type="book">Kembali Kehalaman Web</a>
        <main class="auth-container" role="main" aria-labelledby="auth-title">
            <h1 id="auth-title" class="auth-header">📚CardinalLibraly</h1>

            <form id="loginForm" class="active" role="tabpanel" aria-labelledby="loginTab" novalidate method="POST">
                @csrf
                <label for="loginEmail">Email</label>
                <input type="email" id="loginEmail" name="email" placeholder="name@gmail.com" required/>

                <label for="loginPassword">Password</label>
                <input type="password" id="loginPassword" name="password" placeholder="••••••••" required/>

                <button type="submit" class="btn-submit">Login</button>

                @if (session('status'))
                    <div class="alert alert-danger" id="alert-form">
                        {{ session('message') }}
                    </div>
                @endif
            </form>
            <div class="auth-footer" aria-live="polite" aria-atomic="true"></div>
        </main>
@endsection
