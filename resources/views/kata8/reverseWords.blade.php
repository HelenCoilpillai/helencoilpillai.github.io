@extends('.layout.app')

@section('title')
    Reverse Words
@endsection

@section('headerTitle')
    Reverse Words
@endsection

@section('body')
    @component('layout.components.form')
        @slot('action')
            {{route('reverse-words-form-submit')}}
        @endslot
        @slot('formId')
            reverseWordsForm
        @endslot

        @slot('formContent')
            <div class="row nav-row">
                @component('layout.components.inputField')
                    @slot('divClass')
                        col-md-3
                    @endslot
                    @slot('label')
                        Reverse Words Text:
                    @endslot
                    @slot('class')
                    @endslot
                    @slot('id')
                        reverseWordsText
                    @endslot
                    @slot('name')
                        reverseWordsText
                    @endslot
                    @slot('type')
                        text
                    @endslot
                @endcomponent
            </div>
            <div><small>*Enter the text to be reversed</small></div>
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
                        btnBackReverseWords
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
                        btnSubmitForReverseWords
                    @endslot
                    @slot('buttonContent')
                        Submit
                    @endslot
                @endcomponent
            </div>
        @endslot
    @endcomponent

@endsection


