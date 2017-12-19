<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>
    <script type="text/javascript">
            $(document).ready(function(){
            $('#getTargetsForm').on('submit', function(e) {
                e.preventDefault();
                e.stopPropagation();
                $.ajax({
                    url: '<?= base_url(); ?>' + 'ferramentas/search_ner',
                    type: 'POST',
                    data: $("#getTargetsForm").serialize(),
                    success: function(msg){

                        $("#records_table tr").slice(1).remove(); 

                        result = JSON.parse(msg);

                        $.each(result, function(index, value) {
                            $('<tr>').append(
                            $('<td>').text(value.text),
                            $('<td>').text(value.probability),
                            $('<td>').text(value.type)).appendTo('#records_table');
                        });
                    }
                });
            });
        });
    </script>
    
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Reconhecimento de Entidades</h1>
                    </div>
                </div>
                <div id="mensagem"></div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="jumbotron">
                             <form id="getTargetsForm"/>
                                <div class="form-group">
                                    <label for="text">Período:</label>
                                    <input type="text" class="form-control" name="from_word">
                                </div>
                                <button type="submit" class="btn btn-default" id="btn_search">Analisar</button>
                            </form>
                        </div>
                        <table class="table" id="records_table">
                            <tr>
                                <th>Palavra</th>
                                <th>Probabilidade</th>
                                <th>Relação semântica</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>