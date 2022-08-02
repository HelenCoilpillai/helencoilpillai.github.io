@extends('layout.app')

@section('title')
    String End - Update
@endsection

@section('headerTitle')
    String End - Update
@endsection

@section('body')
    @component('layout.components.form')
        @slot('action')
            {{ route('string-end-edit-form-submit', $stringEndResults['id']) }}
        @endslot
        @slot('formId')
            stringEndEditForm
        @endslot

        @slot('formContent')
            <div class="row">
                @component('layout.components.inputField')
                    @slot('divClass')
                        col-md-3 form-group required
                    @endslot
                    @slot('labelClass')
                        control-label
                    @endslot
                    @slot('label')
                        Text:
                    @endslot
                    @slot('id')
                        textValue
                    @endslot
                    @slot('name')
                        text
                    @endslot
                    @slot('type')
                        text
                    @endslot
                    @slot('value')
                        {{ $stringEndResults['text'] }}
                    @endslot
                @endcomponent
            </div>

            <br>

            <div class="row">
                @component('layout.components.inputField')
                    @slot('divClass')
                        col-md-2 form-group required
                    @endslot
                    @slot('labelClass')
                        control-label
                    @endslot
                    @slot('label')
                        Text Ending:
                    @endslot
                    @slot('id')
                        text_ending
                    @endslot
                    @slot('required')
                        true
                    @endslot
                    @slot('name')
                        text_ending
                    @endslot
                    @slot('type')
                        text
                    @endslot
                    @slot('value')
                        {{ $stringEndResults['text_ending'] }}
                    @endslot
                @endcomponent
            </div>

            <br>

            <div class="row">
                @component('layout.components.button')
                    @slot('buttonType')
                        button
                    @endslot
                    @slot('buttonClass')
                        col-md-1 btnBack btn btn-outline-secondary inline-button ml-md-3
                    @endslot
                    @slot('buttonId')
                        backBtnStringEnd
                    @endslot
                    @slot('buttonContent')
                        <a class="stretched-link" href="../../string-end-result-history">
                            Back
                        </a>
                    @endslot
                @endcomponent

                @component('layout.components.button')
                    @slot('buttonType')
                        submit
                    @endslot
                    @slot('buttonClass')
                        col-md-1  btn btn-primary inline-button ml-md-3
                    @endslot
                    @slot('buttonId')
                        updateBtnStringEnd
                    @endslot
                    @slot('buttonContent')
                        Update
                    @endslot
                @endcomponent
            </div>
        @endslot
    @endcomponent

@endsection


