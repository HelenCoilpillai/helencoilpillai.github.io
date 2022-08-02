@extends('layout.app')

@section('title')
    Results - String End
@endsection

@section('headerTitle')
    Results - String End
@endsection

@section('body')
    <div>
        @component('layout.components.table')
            @slot('tableId')
                results-string-end
            @endslot
            @slot('tableHeader')
                <th>Text</th>
                <th>Text Ending</th>
                <th></th>
            @endslot
            @slot('tableBody')

                @foreach ($stringEndResults as $stringEndResult)
                    <tr>
                        <td>{{ $stringEndResult['text'] }}</td>
                        <td>{{ $stringEndResult['text_ending'] }}</td>
                        <td>
                            <a href="/string-end/{{ $stringEndResult['id'] }}/edit">
                                <span class="btn"><i class="fa fa-edit"></i></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endslot
        @endcomponent
    </div>

@endsection


