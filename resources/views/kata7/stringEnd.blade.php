@extends('.layout.app')

@section('title')
    String End
@endsection

@section('headerTitle')
    String End
@endsection

@section('body')
    @component('layout.components.form')
        @slot('action')
            {{route('string-end-form-submit')}}
        @endslot
        @slot('formId')
            stringEndForm
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
                        {{ old('text', isset($name->text) ?? '') }}
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
                        {{ old('text_ending', isset($name->text_ending) ?? '') }}
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
                        <a class="stretched-link" href="../kata7">
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
                        submitBtnStringEnd
                    @endslot
                    @slot('buttonContent')
                        Submit
                    @endslot
                @endcomponent
            </div>
        @endslot
    @endcomponent

@endsection


