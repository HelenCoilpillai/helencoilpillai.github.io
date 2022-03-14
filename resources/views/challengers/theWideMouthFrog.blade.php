@extends('.layout.app')

@section('title')
    The Wide Mouth Frog
@endsection

@section('headerTitle')
    The Wide Mouth Frog
@endsection

@section('body')
    @component('layout.kata8.form')
        @slot('action')
            {{route('wide-mouth-frog-form-submit')}}
        @endslot
        @slot('formId')
            wideMouthFrogForm
        @endslot

        @slot('formContent')
            <div class="row nav-row">
                @component('layout.kata8.inputField')
                    @slot('divClass')
                        col-md-3
                    @endslot
                    @slot('label')
                        Animal:
                    @endslot
                    @slot('class')
                    @endslot
                    @slot('id')
                        textInputAnimal
                    @endslot
                    @slot('name')
                        animal
                    @endslot
                    @slot('type')
                        text
                    @endslot
                @endcomponent
            </div>
            <br>

            <div class="row nav-row">
                @component('layout.kata8.button')
                    @slot('buttonType')
                        button
                    @endslot
                    @slot('buttonClass')
                        col-md-1 btnBack btn btn-outline-secondary inline-button ml-md-3
                    @endslot
                    @slot('buttonId')
                        btnBackWideMouthFrog
                    @endslot
                    @slot('buttonContent')
                        <a class="stretched-link" href="../kata8">
                            Back
                        </a>
                    @endslot
                @endcomponent

                @component('layout.kata8.button')
                    @slot('buttonType')
                        submit
                    @endslot
                    @slot('buttonClass')
                        col-md-1  btn btn-primary inline-button ml-md-3
                    @endslot
                    @slot('buttonId')
                        btnSubmitAnimal
                    @endslot
                    @slot('buttonContent')
                        Submit
                    @endslot
                @endcomponent
            </div>
        @endslot
    @endcomponent

@endsection


