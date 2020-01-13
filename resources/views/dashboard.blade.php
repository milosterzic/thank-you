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
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                            @csrf

                            @foreach($company->getActivePhilanthropists() as $philanthropist)
                                <tr>
                                    <td scope="row">
                                        @if($philanthropist->donations()->exists() && !$philanthropist->hasNotThakedDonations())
                                            <i class="fa fa-check"></i>
                                        @else
                                            {{ $philanthropist->id }}
                                        @endif
                                    </td>
                                    <td>{{ $philanthropist->first_name . ' ' . $philanthropist->last_name }}</td>
                                    <td>{{ $philanthropist->email }}</td>
                                    <td>
                                        <a href="{{ route('philanthropists.edit', [$philanthropist->id]) }}" class="dashboard-icon float-right">
                                            <i class="fa fa-pencil float-right" aria-hidden="true"></i>
                                        </a>
                                        @if ($philanthropist->hasNotThakedDonations())
                                            <a class="dashboard-icon float-right">
                                                <i class="fa fa-heart float-right" aria-hidden="true" data-id="{{ $philanthropist->id }}"></i>
                                            </a>
                                        @endif
                                    </td>
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

@section('scripts')
    <script src="{{ asset('js/dashboard.js') }}" defer></script>
@endsection