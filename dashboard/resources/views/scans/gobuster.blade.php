<!-- resources/views/scans/gobuster.blade.php -->

@extends('layouts.app')

@section('title', 'Gobuster')

@section('content')
<div class="container col-lg-12 mt-5">
        <h2 class="rg-font">Enter your IP, S3 Bucket, DNS or VHost: </h2>
        <!-- Formulário -->
        <form id="gobusterForm">
            @csrf
            <div class="row col-lg-12">
                <div class="form-group mb-3 col-lg-10">
                    <label for="ip" class="form-label" style="color: gray;"></label>
                    <input type="text" class="form-control rounded-pill shadow fontAwesome search" id="ip" name="ip" placeholder="&#xF002;">
                    <input type="hidden" name="checkedValues" id="checkedValues" value="">
                    <div class="invalid-feedback">Please, use a valid IP, S3 Bucket, DNS or VHost.</div>
                </div>
                <div class="col-lg-2">
                    <button type="button" class="btn rounded-pill shadow" style="margin-top: 22px; background-color: #3642B0; color: white;"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="This scan can take a while depending on your flags.">
                            <i class="fa-solid fa-circle-info"></i></button>
                    <button type="button" id="filter-button" class="btn rounded-pill shadow" style="margin-top: 22px; background-color: #3642B0; color: white;"
                        data-bs-toggle="modal" data-bs-target="#filter-modal">
                            <i class="fa-solid fa-filter"></i> </button>
                    <button type="submit" class="btn rounded-pill shadow" id="execute" name="execute"
                        style="margin-top: 22px; background-color: #3642B0; color: white;" >Execute</button>
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
