@extends('.layout.app')

@section('title')
    Highest and Lowest
@endsection

@section('headerTitle')
    Highest and Lowest
@endsection

@section('body')
    @component('layout.components.form')
        @slot('action')
            {{route('highest-and-lowest-form-submit')}}
        @endslot
        @slot('formId')
            highestAndLowestForm
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
                        Numbers:
                    @endslot
                    @slot('id')
                        numbers
                    @endslot
                    @slot('name')
                        numbers
                    @endslot
                    @slot('type')
                        text
                    @endslot
                    @slot('value')
                        {{ old('numbers', isset($name->numbers) ?? '') }}
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
                        backBtnHighestAndLowestNumbers
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
                        submitBtnHighestAndLowestNumbers
                    @endslot
                    @slot('buttonContent')
                        Submit
                    @endslot
                @endcomponent
            </div>
        @endslot
    @endcomponent

@endsection


