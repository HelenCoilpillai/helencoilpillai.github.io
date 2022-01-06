@extends('.layout.app')

@section('title')
    The Wide Mouth Frog
@endsection

@section('headerTitle')
    The Wide Mouth Frog
@endsection

@section('body')
    @component('layout.components.form')
        @slot('action')
            {{route('wide-mouth-frog-form-submit')}}
        @endslot
        @slot('formId')
            theWideMouthFrogForm
        @endslot

        @slot('formContent')
            <div class="row nav-row">
                @component('layout.components.inputField')
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
                @component('layout.components.button')
                    @slot('buttonType')
                        button
                    @endslot
                    @slot('buttonClass')
                        col-md-1 btnBack btn btn-outline-secondary inline-button ml-md-3
                    @endslot
                    @slot('buttonId')
                        btnBack
                    @endslot
                    @slot('buttonContent')
                        <a class="stretched-link" href="../index.php">
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
                        btnSubmit
                    @endslot
                    @slot('buttonContent')
                        Submit
                    @endslot
                @endcomponent
            </div>
        @endslot
    @endcomponent

@endsection


