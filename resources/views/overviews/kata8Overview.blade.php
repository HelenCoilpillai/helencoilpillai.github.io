@extends('.layout.app')

@section('title')
    Portfolio - Overview
@endsection

@section('headerTitle')
    Kata 8
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
                        <a target="_blank" href="https://www.codewars.com/kata/57ec8bd8f670e9a47a000f89">
                            The wide mouth frog
                        </a>
                    </td>
                    <td id="colButtons">
                        <a href="/wide-mouth-frog"
                           class="btn btn-primary btn-sm btnTry">
                            Try!
                        </a>
                        <a target="_blank"
                           href="https://www.codewars.com/kata/reviews/57f8de16e76492f6180000a0/groups/57fb4be43206fbc6260000a0"
                           class="btn btn-outline-secondary btn-sm ml-md-2 btnAnswer">
                            Answer
                        </a>
                    </td>
                </tr>

                <tr>
                    <td>
                        <a target="_blank" href="https://www.codewars.com/kata/563e320cee5dddcf77000158">
                            The mean of an array
                        </a>
                    </td>
                    <td id="colButtons">
                        <a href="/calculate-the-mean"
                           class="btn btn-primary btn-sm btnTry">
                            Try!
                        </a>
                        <a target="_blank"
                           href="https://www.codewars.com/kata/reviews/5815dfe0bc8bb6c73800000a/groups/5815e5cec7e37d1c16000246"
                           class="btn btn-outline-secondary btn-sm ml-md-2 btnAnswer">
                            Answer
                        </a>
                    </td>
                </tr>
            @endslot
        @endcomponent
    </div>
@endsection




