    $(document).ready(function() {

        // Formulário de validação
        var form = document.getElementById('nmapForm');
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity() || !isValidIP(form.elements.ip.value)) {
                event.preventDefault();
                event.stopPropagation();
            }

            form.classList.add('was-validated');
        });

        // Função para validar IP
        function isValidIP(ip) {
            var ipRegex = /^(25[0-5]|2[0-4][0-9]|[0-1]?[0-9][0-9]?)\.([25[0-5]|2[0-4][0-9]|[0-1]?[0-9][0-9]?)\.([25[0-5]|2[0-4][0-9]|[0-1]?[0-9][0-9]?)\.([25[0-5]|2[0-4][0-9]|[0-1]?[0-9][0-9]?)$/;
            return ipRegex.test(ip);
        }

        // AJAX para enviar formulário
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            var formData = new FormData(form);

            console.log('Sending data...', formData);

            $.ajax({
                type: 'POST',
                url: '/run-nmap',
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log('sucess', data);

                    // Limpar contêineres existentes
                    $('#resultContainer').empty();
                    $('#responseContainer').empty();
                    $('#ipAddress').empty();

                    // Iterar sobre os resultados
                    for (var i = 0; i < data.length; i++) {
                        var result = data[i];
                        var ipAddress = data[i].ip;

                        // Criar um novo contêiner para cada resultado
                        var resultContainerId = 'resultContainer_' + i;
                        $('#resultContainer').append('<div id="' + resultContainerId + '" class="mb-5 rounded shadow lt-font"></div>');

                        // Exibir o resultado da execução dentro do novo contêiner
                        var formattedOutput = result.output.replace(/\n/g, "<br />");
                        console.log('formattedOutput', formattedOutput);
                        $('#' + resultContainerId).html('<pre class="ms-2">' + formattedOutput + '</pre>');

                        // Exibir o IP dentro do novo contêiner
                        var ipAddressId = 'ipAddress_' + i;
                        $('#ipAddress').append('<div id="' + ipAddressId + '"></div>');
                        $('#' + ipAddressId).html('<h4 style="color: #3642B0; margin-bottom: 102px;" >• ' + ipAddress + '</h4>');
                    }

                    $('#responseContainer').html('<p class="text-success">Your scan ran successfully!</p>');
                },
                error: function(error) {
                    console.error('Erro na execução do Nmap:', error);
                    $('#responseContainer').html('<p class="text-danger">Your scan failed: ' + error.message + '</p>');
                }
            });
        });
    });
