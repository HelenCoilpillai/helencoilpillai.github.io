@extends('.layout.app')

@section('title')
    String Repeat
@endsection

@section('headerTitle')
    String Repeat
@endsection

@section('body')
    @component('layout.components.form')
        @slot('action')
            {{route('string-repeat-form-submit')}}
        @endslot
        @slot('formId')
            stringRepeatForm
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
                        Text to repeat:
                    @endslot
                    @slot('id')
                        textToRepeat
                    @endslot
                    @slot('name')
                        textToRepeat
                    @endslot
                    @slot('type')
                        text
                    @endslot
                    @slot('value')
                        {{ old('textToRepeat', isset($name->textToRepeat) ?? '') }}
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
                        Repeat Times:
                    @endslot
                    @slot('id')
                        repeatTimes
                    @endslot
                    @slot('required')
                        true
                    @endslot
                    @slot('name')
                        repeatTimes
                    @endslot
                    @slot('type')
                        text
                    @endslot
                    @slot('value')
                        {{ old('repeatTimes', isset($name->repeatTimes) ?? '') }}
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
                        backBtnStringRepeat
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
                        submitBtnStringRepeat
                    @endslot
                    @slot('buttonContent')
                        Submit
                    @endslot
                @endcomponent
            </div>
        @endslot
    @endcomponent

@endsection


