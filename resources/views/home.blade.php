@extends('.layout.app')

@section('title')
    Portfolio - Overview
@endsection

@section('headerTitle')
    Course work
@endsection


@section('body')
    @component('layout.components.table')
        @slot('tableId')
            courseWork
        @endslot
        @slot('tableHeader')
            <th>Title</th>
            <th>Description</th>
            <th></th>
        @endslot
        @slot('tableBody')
            <tr>
                <td>The wide mouth frog</td>
                <td>
                    <a target="_blank" href="https://www.codewars.com/kata/57ec8bd8f670e9a47a000f89">Kata 8</a>
                </td>
                <td id="colButtons">
                    <a
                       href="/wide-mouth-frog"
                       class="btn btn-primary btn-sm" id="btnTry">
                        Try!
                    </a>

                    <a target="_blank"
                       href="https://www.codewars.com/kata/reviews/57f8de16e76492f6180000a0/groups/57fb4be43206fbc6260000a0"
                       class="btn btn-outline-secondary btn-sm ml-md-2" id="btnAnswer">
                        Answer
                    </a>
                </td>
            </tr>
        @endslot
    @endcomponent
@endsection




