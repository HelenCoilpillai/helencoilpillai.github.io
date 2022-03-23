@extends('.layout.app')

@section('title')
    Portfolio - Overview
@endsection

@section('headerTitle')
    Kata 7
@endsection

@section('body')
    <div class="float-left m-2">
        <a href="/my-work"
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
                <th>Title</th>
                <th></th>
            @endslot
            @slot('tableBody')
                <tr>
                    <td>
                        <a target="_blank" href="https://www.codewars.com/kata/554b4ac871d6813a03000035">
                            Highest and Lowest
                        </a>
                    </td>
                    <td id="colButtons">
                        <a href="/highest-and-lowest"
                           class="btn btn-primary btn-sm btnTry">
                            Try!
                        </a>
                        <a target="_blank"
                           href="https://www.codewars.com/kata/reviews/5bd724c196b46faaea0012e4/groups/5bf27cfeff398612f800005a"
                           class="btn btn-outline-secondary btn-sm ml-md-2 btnAnswer">
                            Answer
                        </a>
                    </td>
                </tr>
            @endslot
        @endcomponent
    </div>

@endsection




