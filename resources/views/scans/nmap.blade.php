<!-- resources/views/form.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nmap Scan</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&family=Roboto&display=swap" rel="stylesheet">


    <!-- Bootstrap CSS (pode ser substituído pela versão online) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/nmap-styles.css') }}">
    <script src="https://kit.fontawesome.com/6aa92d4619.js" crossorigin="anonymous"></script>
</head>
<body>

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
                            <input type="checkbox" class="form-check-input internal-shadow" id="option1" checked>
                            <label class="form-check-label" for="option1">-sV</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input internal-shadow" id="option2">
                            <label class="form-check-label" for="option2">-sn</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input internal-shadow" id="option3" checked>
                            <label class="form-check-label" for="option3">-iR</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input internal-shadow" id="option4">
                            <label class="form-check-label" for="option4">-sS</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input internal-shadow" id="option1" checked>
                            <label class="form-check-label" for="option1">-A</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input internal-shadow" id="option2">
                            <label class="form-check-label" for="option2">--top-ports</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input internal-shadow" id="option3">
                            <label class="form-check-label" for="option3">-v</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input internal-shadow" id="option4">
                            <label class="form-check-label" for="option4">-oN</label>
                        </div>
                    </div>

                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input internal-shadow" id="option1">
                            <label class="form-check-label" for="option1">-oX</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input internal-shadow" id="option2">
                            <label class="form-check-label" for="option2">-F</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input internal-shadow" id="option3">
                            <label class="form-check-label" for="option3">-T0</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input internal-shadow" id="option4">
                            <label class="form-check-label" for="option4">-T1</label>
                        </div>
                    </div>

                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input internal-shadow" id="option1">
                            <label class="form-check-label" for="option1">-T2</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input internal-shadow" id="option2">
                            <label class="form-check-label" for="option2">-T3</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input internal-shadow" id="option3">
                            <label class="form-check-label" for="option3">-T4</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input internal-shadow" id="option4">
                            <label class="form-check-label" for="option4">-T5</label>
                        </div>
                    </div>

                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary shadow rounded-pill mb-3 me-4" style="margin-top: 22px; background-color: white; color: black;">Default</button>
                    <button class="btn shadow rounded-pill mb-3 me-4" style="margin-top: 22px; background-color: #3642B0; color: white;">Apply</button>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container col-lg-12 mt-5">

    <h2 class="rg-font">Enter your IP address: </h2>

    <!-- Formulário -->
    <form id="nmapForm">
    @csrf
        <div class="row col-lg-12">
            <div class="form-group mb-3 col-lg-10">
                <label for="ip" class="form-label" style="color: gray;"></label>
                <input type="text" class="form-control rounded-pill shadow fontAwesome search" id="ip" name="ip" placeholder="&#xF002;  To enter more than one IP use ;">
                <div class="invalid-feedback">Please, use a valid IP address.</div>
            </div>
            <div class="col-lg-2">
                <button type"button" class="btn rounded-pill shadow" style="margin-top: 22px; background-color: #3642B0; color: white;"> <i class="fa-solid fa-circle-info"></i> </button>
                <button type="button" id="filter-button" class="btn rounded-pill shadow" style="margin-top: 22px; background-color: #3642B0; color: white;" data-bs-toggle="modal" data-bs-target="#filter-modal"> <i class="fa-solid fa-filter"></i> </button>
                <button type="submit" class="btn rounded-pill shadow" style="margin-top: 22px; background-color: #3642B0; color: white;">Execute</button>
            </div>
        <div>
    </form>

    <!-- Resposta da execução -->
    <div class="mt-2 lt-font" id="responseContainer"></div>

    <!-- Resultado da execução -->
    <div><h4 class="rg-font">IP address:</h4></div>
    <div class="content row">
        <div class="text-right mt-3 col-lg-2 rg-font" id="ipAddress"></div>
        <div id="resultContainer" class="mt-3 ml-5 text-right col-lg-9"></div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Script para AJAX e validação de IP -->
<script src="{{ asset('js/nmap-script.js') }}"></script>

</body>
</html>
