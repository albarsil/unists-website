<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>
    <script type="text/javascript">
            $(document).ready(function(){
            $('#getTargetsForm').on('submit', function(e) {
                if($( "#boxRel option:selected" ).text() == "Todas"){
                    e.preventDefault();
                    e.stopPropagation();
                    $.ajax({
                        url: '<?= base_url(); ?>' + 'ferramentas/search_getRelationTargets',
                        type: 'POST',
                        data: $("#getTargetsForm").serialize(),
                        success: function(msg){

                            $("#records_table tr").slice(1).remove(); 

                            teste = JSON.parse(msg);

                            $.each(teste, function(index, value) {
                                $('<tr>').append(
                                $('<td>').text($("input[name='from_word']").val()),
                                $('<td>').text(value.relation),
                                $('<td>').text(value.target)).appendTo('#records_table');
                            });
                        }
                    });
                }
                else{
                    e.preventDefault();
                    e.stopPropagation();
                    $.ajax({
                        url: '<?= base_url(); ?>' + 'ferramentas/search_getTargets',
                        type: 'POST',
                        data: $("#getTargetsForm").serialize(),
                        success: function(msg){

                            $("#records_table tr").slice(1).remove(); 

                            teste = JSON.parse(msg);

                            $.each(teste, function(index, value) {
                                $('<tr>').append(
                                $('<td>').text($("input[name='from_word']").val()),
                                $('<td>').text("be_in_state"),
                                $('<td>').text(value)).appendTo('#records_table');
                            });
                        }
                    });
                }
            });
        });
    </script>
    
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Relações semânticas</h1>
                    </div>
                </div>
                <div id="mensagem"></div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="jumbotron">
                             <form id="getTargetsForm"/>
                                <div class="form-group">
                                    <label for="text">Palavra:</label>
                                    <input type="text" class="form-control" name="from_word">
                                </div>
                                <div class="form-group">
                                    <label for="text">Relação semântica:</label>
                                    <select id="boxRel" name="rel_word" class="selectpicker">
                                        <option value="all">Todas</option>
                                        <option value="be_in_state">be_in_state</option>
                                        <option value="causes">causes</option>
                                        <option value="has_derived">has_derived</option>
                                        <option value="has_holo_madeof">has_holo_madeof</option>
                                        <option value="has_holo_member">has_holo_member</option>
                                        <option value="has_holo_part">has_holo_part</option>
                                        <option value="has_hyponym">has_hyponym</option>
                                        <option value="has_subevent">has_subevent</option>
                                        <option value="near_antonym">near_antonym</option>
                                        <option value="near_synonym">near_synonym</option>
                                        <option value="see_also_wn15">see_also_wn15</option>
                                        <option value="verb_group">verb_group</option>
                                        <option value="rgloss">rgloss</option>
                                        <option value="category_term">category_term</option>
                                        <option value="related_to">related_to</option>
                                        <option value="region_term">region_term</option>
                                        <option value="usage_term">usage_term</option>
                                        <option value="has_hyperonym">has_hyperonym</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-default" id="btn_search">Pesquisar</button>
                            </form>
                        </div>
                        <table class="table" id="records_table">
                            <tr>
                                <th>Palavra</th>
                                <th>Relação semantica</th>
                                <th>Palavra relacionada</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>