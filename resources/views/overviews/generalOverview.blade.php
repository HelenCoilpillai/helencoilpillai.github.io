@extends('layout.app')

@section('title')
    Portfolio - Overview
@endsection

@section('headerTitle')
    Course work
@endsection

@section('body')
    <div class="float-left m-2">
        <a href="/"
           class="btn btn-outline-primary btn-sm btnBack">
            Back
        </a>
    </div>

    <div>
        @component('layout.components.table')
            @slot('tableId')
                courseWork
            @endslot
            @slot('tableHeader')
                <th>Type</th>
                <th>Level</th>
                <th></th>
            @endslot
            @slot('tableBody')
                <tr>
                    <td>Kata</td>
                    <td>Level 8</td>
                    <td id="colButtons">
                        <a href="/kata8"
                           class="btn btn-primary btn-sm btnTry">
                            Details
                        </a>
                    </td>
                </tr>

            @endslot
        @endcomponent
    </div>
@endsection




