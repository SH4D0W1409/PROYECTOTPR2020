@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('municipalities.create') }}" title="Create a project"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Introduction</th>
            <th>Location</th>
            <th>Cost</th>
            <th>Date Created</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($municipalities as $municipality)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $municipality->name }}</td>
                <td>{{ $municipality->introduction }}</td>
                <td>{{ $municipality->location }}</td>
                <td>{{ $municipality->cost }}</td>
                <td>{{ date_format($municipality->created_at, 'jS M Y') }}</td>
                <td>
                    <form action="{{ route('municipalities.destroy', $municipality->id) }}" method="POST">

                        <a href="{{ route('municipalities.show', $municipality->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('municipalities.edit', $municipality->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $municipalities->links() !!}

@endsection