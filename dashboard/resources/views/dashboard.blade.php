<!-- resources/views/pentesting/dashboard.blade.php -->
@extends('layouts.app')

@section('title', 'Pentesting Analysis')

@section('content')

<!-- Modal Pentest-->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Terminal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class"card">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-lg-6">
                        <p> Lorem ipsum dolor sit amet, qui minim labore adipisicing minim sint cillum sint consectetur cupidatat.</p>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel scan</button>
      </div>
    </div>
  </div>
</div>

<div class="container col-lg-12 mt-5">
  <div class="card">
    <div class="card-body">
      <div class="row d-flex align-items-center justify-content-center">
          <div class="form-group mb-3 me-5 col-lg-10">
              <h2>Website Analysis</h2>
              <p>
                This mode will run a simulation of the most used ways to attack a website, and provide information about weak points.
              </p>
          </div>
          <div class="col-lg-1 ms-5">
              <button type="submit" class="btn btn-lg rounded-circle shadow" id="execute"
              name="execute" style="background-color: #3642B0; color: white;"
              data-bs-toggle="modal" data-bs-target="#staticBackdrop"
              >
              <i class="fa-solid fa-play"></i>
          </div>
      </div>
    </div>
  </div>

  <div class="card mt-3">
    <div class="card-body">
      <div class="row d-flex align-items-center justify-content-center">
          <div class="form-group mb-3 me-5 col-lg-10">
              <h2>Internal Network Analysis</h2>
              <p>
                Network-wide attack simulation, using the most common tactics to try and get RCE in any of your network devices, prividing an detailed analysis about weak points.
              </p>
          </div>
          <div class="col-lg-1 ms-5">
              <button type="submit" class="btn btn-lg rounded-circle shadow" id="execute" name="execute" style="background-color: #3642B0; color: white;">
              <i class="fa-solid fa-play"></i>
          </div>
      </div>
    </div>
  </div>
</div>

@endsection
