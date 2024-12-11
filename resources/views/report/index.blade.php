@extends('layouts.principal')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="mt-4">Relatório da rota</h1>

            @if($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session('success'))
                <div class="alert alert-success mt-3">{{ session('success') }}</div>
            @endif
            <form>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="date_start" class="form-label">Data inicial</label>
                        <input type="date" class="form-control" id="date_start" name="date_start" value="{{ request('date_start') ?? date('Y-m-d', strtotime('-30 days')) }}">
                    </div>
                    <div class="col-md-6">
                        <label for="end_date" class="form-label">Data final</label>
                        <input type="date" class="form-control" id="date_end" name="date_end" value="{{ request('date_end') ?? date('Y-m-d') }}">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Filtrar</button>
                    </div>
                </div>
            </form>
            @if($reports->isEmpty())
                <div class="mt-3">Nenhuma dado nestas datas.</div>
            @else
                <table class="table table-striped mt-3">
                    <thead>
                    <tr>
                        <th scope="col">Data</th>
                        <th scope="col">Clicks</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($reports as $report)
                        <tr>
                            <td>{{ $report->date }}</td>
                            <td>{{ $report->clicks }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
