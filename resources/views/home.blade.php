@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Carteira</div>

                <div class="card-body">
                    <h2>Minha carteira: {{ number_format($wallet->balance, 2, ',', '.') }}</h2>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    Resumo de transferências
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('transaction') }}" title="Transferir" class="btn btn-sm btn-primary">Nova transferência</a>
                    <hr>
                    <table class="table table-condensed table-bordered">
                        <thead>
                            <th>Data</th>
                            <th>Valor</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                            @if (empty($transactions))
                                <tr>
                                    <td colspan="3">Você não possui transferências.</td>
                                </tr>
                            @else
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction['created_at'] }}</td>
                                        <td>{{ $transaction['value'] }}</td>
                                        <td>{{ $transaction['status'] }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
