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
                    url: '<?= base_url(); ?>' + 'ferramentas/search_getLexicalSimilarity',
                    type: 'POST',
                    data: $("#getTargetsForm").serialize(),
                    success: function(msg){

                        $("#records_table tr").slice(1).remove(); 

                        result = JSON.parse(msg);

                        $('<tr>').append(
                        $('<td>').text(result.fromPeriod),
                        $('<td>').text(result.toPeriod),
                        $('<td>').text(result.result)).appendTo('#records_table');
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
                        <h1 class="page-header">Similaridade Semântica</h1>
                    </div>
                </div>
                <div id="mensagem"></div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="jumbotron">
                             <form id="getTargetsForm"/>
                                <div class="form-group">
                                    <label for="text">Período:</label>
                                    <input type="text" class="form-control" name="from_period">
                                </div>
                                <div class="form-group">
                                    <label for="text">Período de comparação:</label>
                                    <input type="text" class="form-control" name="to_period">
                                </div>
                                <button type="submit" class="btn btn-default" id="btn_search">Analisar</button>
                            </form>
                        </div>
                        <table class="table" id="records_table">
                            <tr>
                                <th>Período</th>
                                <th>Segundo perípdo</th>
                                <th>Relação</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>