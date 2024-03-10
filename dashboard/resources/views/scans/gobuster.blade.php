<!-- resources/views/scans/gobuster.blade.php -->
@extends('layouts.app')

@section('title', 'Gobuster')

@section('content')

<!-- Modals -->
<div id="filter-modal" class="modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <h5 class="mt-2 ms-2" style="color: #3642B0;"> <i class="fa-solid fa-chevron-down"></i> Select your scan model</h5>
            <hr>

            <div class="container">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <div class="form-check">
                            <input type="radio" class="form-check-input internal-shadow" name="option" id="option1" value="ipaddress">
                            <label class="form-check-label" for="option1">IP Address</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check">
                            <input type="radio" class="form-check-input internal-shadow" name="option" id="option2" value="s3bucket">
                            <label class="form-check-label" for="option2">S3 Bucket</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check">
                            <input type="radio" class="form-check-input internal-shadow" name="option"
                                id="option3" value="dns">
                            <label class="form-check-label" for="option3">DNS</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check">
                            <input type="radio" class="form-check-input internal-shadow" name="option"
                                id="option4" value="vhost">
                            <label class="form-check-label" for="option4">VHost</label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-5">
                        <button class="btn btn-primary shadow rounded-pill mb-3 me-4" type="button" 
                            style="margin-top: 22px; background-color: white; color: black;">Default</button>
                        <button class="btn shadow rounded-pill mb-3 me-4 btn-blue" id="applyButton" name="applyButton" 
                            type="button" data-bs-dismiss="modal">Apply</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container col-lg-12 mt-5">
        <h2 class="rg-font">Enter your IP, S3 Bucket, DNS or VHost: </h2>
        <!-- Formulário -->
        <form id="gobusterForm">
            @csrf
            <div class="row col-lg-12">
                <div class="form-group mb-3 col-lg-10">
                    <label for="ip" class="form-label" style="color: gray;"></label>
                    <input type="text" class="form-control rounded-pill shadow fontAwesome search" 
                        id="ip" name="ip" placeholder="&#xF002;">
                    <input type="hidden" name="checkedValue" id="checkedValue" value="">
                    <div class="invalid-feedback">Please, use a valid IP, S3 Bucket, DNS or VHost.</div>
                </div>
                <div class="col-lg-2">
                    <button type="button" class="btn rounded-pill shadow btn-blue"
                        data-bs-toggle="tooltip" data-bs-placement="top" 
                        title="IP address is the default scan model, please use the filters to select another.">
                            <i class="fa-solid fa-circle-info"></i></button>
                    <button type="button" id="filter-button" class="btn rounded-pill shadow btn-blue"
                        data-bs-toggle="modal" data-bs-target="#filter-modal">
                            <i class="fa-solid fa-filter"></i> </button>
                    <button type="submit" class="btn rounded-pill shadow btn-blue" 
                    id="execute" name="execute">Execute</button>
                </div>
            </div>
        </form>

        <!-- Resposta da execução -->
        <div class="mt-2 lt-font" id="responseContainer"></div>

        <!-- Resultado da execução -->
        <div><h4 class="rg-font">IP address:</h4></div>
        <div id="resultContainer" class="mt-3 ml-5 text-right col-lg-12 align-top"></div>
    </div>
@endsection

@section('pagescript')
    <script src="{{ asset('js/gobuster-script.js') }}"></script>
@endsection
