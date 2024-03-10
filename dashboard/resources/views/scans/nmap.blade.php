<!-- resources/views/scans/nmap.blade.php -->

@extends('layouts.app')

@section('title', 'Nmap Scan')

@section('content')
    <!-- modals -->
    <div id="filter-modal" class="modal">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <h5 class="mt-2 ms-2" style="color: #3642B0;"> <i class="fa-solid fa-chevron-down"></i> Filter by flags</h5>
                <hr>

                <div class="container">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input internal-shadow" id="option1" value="-sV">
                                <label class="form-check-label" for="option1">-sV</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input internal-shadow" id="option2" value="-sn" checked>
                                <label class="form-check-label" for="option2">-sn</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input internal-shadow" id="option3" value="-iR">
                                <label class="form-check-label" for="option3">-iR</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input internal-shadow" id="option4" value="-sS">
                                <label class="form-check-label" for="option4">-sS</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input internal-shadow" id="option5" value="-A">
                                <label class="form-check-label" for="option1">-A</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input internal-shadow" id="option6" value="--top-ports">
                                <label class="form-check-label" for="option2">--top-ports</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input internal-shadow" id="option7" value="-V">
                                <label class="form-check-label" for="option3">-v</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input internal-shadow" id="option8" value="-oN">
                                <label class="form-check-label" for="option4">-oN</label>
                            </div>
                        </div>

                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input internal-shadow" id="option9" value="-oX">
                                <label class="form-check-label" for="option1">-oX</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input internal-shadow" id="option10" value="-F">
                                <label class="form-check-label" for="option2">-F</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input internal-shadow" id="optio11" value="-T0">
                                <label class="form-check-label" for="option3">-T0</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input internal-shadow" id="option12" value="-T1">
                                <label class="form-check-label" for="option4">-T1</label>
                            </div>
                        </div>

                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input internal-shadow" id="option13" value="-T2">
                                <label class="form-check-label" for="option1">-T2</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input internal-shadow" id="option14" value="-T3">
                                <label class="form-check-label" for="option2">-T3</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input internal-shadow" id="option15" value="-T4">
                                <label class="form-check-label" for="option3">-T4</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input internal-shadow" id="option16" value="-T5">
                                <label class="form-check-label" for="option4">-T5</label>
                            </div>
                        </div>

                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input internal-shadow" id="option14" value="-T6">
                                <label class="form-check-label" for="option1">-T6</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input internal-shadow" id="option15" value="-Pn">
                                <label class="form-check-label" for="option2">-Pn</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input internal-shadow" id="option16" value="-p-">
                                <label class="form-check-label" for="option3">-p-</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input internal-shadow" id="option17" value="-P">
                                <label class="form-check-label" for="option4">-P</label>
                            </div>
                        </div>

                    </div>

                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary shadow rounded-pill mb-3 me-4" type="button" 
                            style="margin-top: 22px; background-color: white; color: black;">Default</button>
                        <button class="btn shadow rounded-pill mb-3 me-4 btn-blue" id="applyButton" name="applyButton" 
                            type="button" data-bs-dismiss="modal">Apply</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container col-lg-12 mt-5">

        <h2 class="rg-font">Enter your IP address: </h2>

        <!-- Formulário -->
        <form id="nmapForm"  >
            @csrf
            <div class="row col-lg-12">
                <div class="form-group mb-3 col-lg-10">
                    <label for="ip" class="form-label" style="color: gray;"></label>
                    <input type="text" class="form-control rounded-pill shadow fontAwesome search" id="ip" name="ip" 
                        placeholder="&#xF002;  To enter more than one IP use ;">
                    <input type="hidden" name="checkedValues" id="checkedValues" value="">
                    <div class="invalid-feedback">Please, use a valid IP address.</div>
                </div>
                <div class="col-lg-2">
                    <button type="button" class="btn rounded-pill shadow btn-blue" data-bs-toggle="tooltip" 
                        data-bs-placement="top" title="This scan can take a while depending on your flags.">
                        <i class="fa-solid fa-circle-info"></i>
                    </button>
                    <button type="button" id="filter-button" class="btn rounded-pill shadow btn-blue" 
                        data-bs-toggle="modal" data-bs-target="#filter-modal"> 
                        <i class="fa-solid fa-filter"></i> 
                    </button>
                    <button type="submit" class="btn rounded-pill shadow btn-blue" id="execute" name="execute">Execute</button>
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
    <script src="{{ asset('js/nmap-script.js') }}"></script>
@endsection