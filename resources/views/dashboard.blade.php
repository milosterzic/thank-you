@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ $company->name }}

                    <a class="btn btn-primary float-right" href="{{ route('philanthropists.create') }}">
                        {{ __('Add Philanthropists') }}
                    </a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($company->getActivePhilanthropists() as $philanthropist)
                                <tr>
                                    <th scope="row">{{ $philanthropist->id }}</th>
                                    <td>{{ $philanthropist->first_name . ' ' . $philanthropist->last_name }}</td>
                                    <td>{{ $philanthropist->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
