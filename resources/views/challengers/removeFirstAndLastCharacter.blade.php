@extends('.layout.app')

@section('title')
    Remove First and Last Character
@endsection

@section('headerTitle')
    Remove First and Last Character
@endsection

@section('body')
    @component('layout.components.form')
        @slot('action')
            {{route('remove-first-and-last-character-form-submit')}}
        @endslot
        @slot('formId')
            removeFirstAndLastCharacterForm
        @endslot

        @slot('formContent')
            <div class="row nav-row">
                @component('layout.components.inputField')
                    @slot('divClass')
                        col-md-3
                    @endslot
                    @slot('label')
                        Input:
                    @endslot
                    @slot('class')
                    @endslot
                    @slot('id')
                        textInput
                    @endslot
                    @slot('name')
                        input
                    @endslot
                    @slot('type')
                        text
                    @endslot
                @endcomponent
            </div>
            <br>

            <div class="row nav-row">
                @component('layout.components.button')
                    @slot('buttonType')
                        button
                    @endslot
                    @slot('buttonClass')
                        col-md-1 btnBack btn btn-outline-secondary inline-button ml-md-3
                    @endslot
                    @slot('buttonId')
                        btnBackRremoveFirstAndLastCharacter
                    @endslot
                    @slot('buttonContent')
                        <a class="stretched-link" href="../kata8">
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
                        btnSubmitTextInput
                    @endslot
                    @slot('buttonContent')
                        Submit
                    @endslot
                @endcomponent
            </div>
        @endslot
    @endcomponent

@endsection


