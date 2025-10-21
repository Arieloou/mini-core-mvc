<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Comission Calculator Core" />
    <title>Comisiones</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <div class="card">
        <h1 class="card__title">Calculadora de Comisiones</h1>
        
        <form class="card__form" action="{{ route('commission.calculate') }}" method="POST">
            @csrf
            
            <div class="card__form-group">
                <label class="card__label" for="start_date">Fecha Inicio:</label>
                <input class="card__input" id="start_date" type="date" name="start_date" value="{{ $start_date ?? '' }}" required>
            </div>
            
            <div class="card__form-group">
                <label class="card__label" for="end_date">Fecha Fin:</label>
                <input class="card__input" id="end_date" type="date" name="end_date" value="{{ $end_date ?? '' }}" required>
            </div>

            <button class="button" type="submit">Calcular</button>
        </form>
    </div>

    @if ($errors->any())
        <div class="error-message">
            <ul class="error-message__list">
                @foreach ($errors->all() as $error)
                    <li class="error-message__item">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <h2 class="card__title">Resultados</h2>
        @isset($results)
            <div class="table-wrapper"> 
                
                <table class="styled-table">
                    <thead class="styled-table__header">
                        <tr class="styled-table__row">
                            <th class="styled-table__cell styled-table__cell--header">Vendedor</th>
                            <th class="styled-table__cell styled-table__cell--header">Comisión Total</th>
                        </tr>
                    </thead>
                    <tbody class="styled-table__body">
                        @forelse ($results as $result => $commission)
                            <tr class="styled-table__row">
                                <td class="styled-table__cell"><strong>{{ $result }}</strong></td>
                                <td class="styled-table__cell">${{ number_format($commission, 2) }}</td>
                            </tr>
                        @empty
                            <tr class="styled-table__row">
                                <td class="styled-table__cell styled-table__cell--empty" colspan="2">
                                    No se encontraron ventas en ese rango.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @endisset
    </div>

    <div class="card">
        <h2 class="card__title">Vendedores</h2>
        <div class="table-wrapper">
            <table class="styled-table">
                <thead class="styled-table__header">
                    <tr class="styled-table__row">
                        <th class="styled-table__cell styled-table__cell--header">Vendedor</th>
                        <th class="styled-table__cell styled-table__cell--header">Email</th>
                    </tr>
                </thead>
                <tbody class="styled-table__body">
                    @foreach ($sellers as $seller)
                        <tr class="styled-table__row">
                            <td class="styled-table__cell"><strong> {{ $seller->name }} </strong></td>
                            <td class="styled-table__cell"> {{ $seller->email }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <h2 class="card__title">Reglas de Comisión</h2>
        
        <ul class="info-list">
            @foreach ($rules as $rule)
                <li class="info-list__item">Si la venta es >= ${{ $rule->threshold_amount }}, la comisión es del {{ $rule->percentage * 100 }}%</li>
            @endforeach
        </ul>
    </div>
</body>
</html>