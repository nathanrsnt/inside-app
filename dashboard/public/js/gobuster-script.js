$(document).ready(function() {
  // Validation form
  var form = document.getElementById('gobusterForm');
  var applyButton = document.getElementById('applyButton');
  var defaultChecked = "ipaddress";

  // Get defaults
  $('#checkedValue').val(defaultChecked);

  applyButton.addEventListener('click', function() {
      var checked = document.querySelector('input[name="option"]:checked');
      $('#checkedValue').val(checked);
      console.log(checked.value)
  });

  // IP validation
  function isValidIP(ip) {
    var ipRegex = /\b(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\b(?:;|$)/;
    return ipRegex.test(ip);
  }

  function isValidDNS(dns) {
    var dnsRegex = /^(?:(?:www\.)?[A-Za-z0-9-]+\.[A-Za-z]{2,3})(?:;(?:www\.)?[A-Za-z0-9-]+\.[A-Za-z]{2,3})*$/;
    return dnsRegex.test(dns);
  }

  function loading() {
    document.getElementById("execute").innerHTML = "";
    document.getElementById("execute").setAttribute('disabled', 'disabled');
    document.getElementById("ip").setAttribute('disabled', 'disabled');
    document.getElementById("filter-button").setAttribute('disabled', 'disabled');
    $('#execute').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    $('#execute').append('<span class="sr-only">Loading...</span>');
  }

  function loadingDone() {
      $('#execute').empty();
      document.getElementById("execute").innerHTML = "Execute";
      document.getElementById("execute").removeAttribute('disabled');
      document.getElementById("ip").removeAttribute('disabled');
      document.getElementById("filter-button").removeAttribute('disabled');
  }

  form.addEventListener('submit', function(event) {
    event.preventDefault();

    var formData = new FormData(form);

    console.log('Running')
    loading();

    if (!form.checkValidity() || (!isValidIP(form.elements.ip.value) && !isValidDNS(form.elements.ip.value))) {
        event.preventDefault();
        event.stopPropagation();
        loadingDone();

        $('#responseContainer').html('<p class="text-danger">Please enter a valid IP Address</p>');
    } else {
        $.ajax({
            type: 'POST',
            url: '/run-gobuster',
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                // Limpar existentes
                $('#resultContainer').empty();
                $('#responseContainer').empty();
                $('#ipAddress').empty();

                // Iterate over the results
                for (var i = 0; i < data.length; i++) {
                    var result = data[i];
                    var ipAddress = data[i].ip;

                    // Create a new container for the result
                    var resultContainerId = 'resultContainer_' + i;
                    $('#resultContainer').append('<div id="' + resultContainerId + '" class="content row mb-5 rounded lt-font"></div>');

                    // Show result inside the new container
                    var formattedOutput = result.output.replace(/\n/g, "<br />");

                    $('#' + resultContainerId).append('<div class="col-lg-2"><h4 class="text-right mt-3 rg-font align-top" style="color: #3642B0;" >• ' + ipAddress + '</h4></div>');
                    $('#' + resultContainerId).append('<div class="col-lg-10 shadow"><pre class="ms-2">' + formattedOutput + '</pre></div>');
                }

                loadingDone();
                $('#responseContainer').html('<p class="text-success">Your scan ran successfully!</p>');
            },
            error: function(error) {
                console.error('Scan execution error:', error);

                loadingDone();
                $('#responseContainer').html('<p class="text-danger">Your scan failed: ' + error.responseJSON.error + '</p>');
            }
        });
      }
  });
});

