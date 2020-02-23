@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Nova transferência</div>

                    <form method="POST" action="{{ route('new-transaction') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="wallet" class="col-md-4 col-form-label text-md-right">{{ __('Selecione quem vai receber:') }}</label>

                            <div class="col-md-6">
                                {{ Form::select('wallet', $wallets) }}
                                @error('wallet')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="document" class="col-md-4 col-form-label text-md-right">{{ __('Valor') }}</label>

                            <div class="col-md-6">
                                <input id="value" type="number" min="0" max="500" class="form-control @error('value') is-invalid @enderror" name="value" value="{{ old('value') }}" required>

                                @error('value')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Tranferir') }}
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
