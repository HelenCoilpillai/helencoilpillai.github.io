@extends('.layout.app')

@section('title')
    The mean of an array
@endsection

@section('headerTitle')
    The mean of an array
@endsection

@section('body')
    @component('layout.kata8.form')
        @slot('action')
            {{route('calculate-the-mean-form-submit')}}
        @endslot
        @slot('formId')
            meanOfArrayForm
        @endslot

        @slot('formContent')
            <div class="row nav-row">
                @component('layout.kata8.inputField')
                    @slot('divClass')
                        col-md-3
                    @endslot
                    @slot('label')
                        Marks:
                    @endslot
                    @slot('class')
                    @endslot
                    @slot('id')
                        textInputMarks
                    @endslot
                    @slot('name')
                        marks
                    @endslot
                    @slot('type')
                        text
                    @endslot
                @endcomponent
            </div>
            <div><small>*Enter your marks in comma separated format</small></div>
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
                        btnBackMeanOfAnArray
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
                        btnSubmitMarks
                    @endslot
                    @slot('buttonContent')
                        Submit
                    @endslot
                @endcomponent
            </div>
        @endslot
    @endcomponent

@endsection


