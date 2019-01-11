@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Vuelos</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table>
                        <thead>
                          <tr>
                            <td>ID</td><td>NOMBRE</td>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach  ($vuelos as $vuelo)
                          <tr>
                            <td>{{$vuelo->id}}</td><td></td>
                          </tr>
                          @endforeach
                        </tbody>

                    </table>
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
