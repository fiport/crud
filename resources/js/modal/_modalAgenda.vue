<template>
    <div>
        <div class="container mt-5">
            <div class="modal fade" id="editSchedule" tabindex="-1" role="dialog" aria-labelledby="editSchedule" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background: #212529; color: white;">
                            <h5 class="modal-title" id="editSchedule1">Editar Agenda</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form @submit.prevent="editScheduling" id="formEdit">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="input_name">Nome completo</label>
                                        <input type="text" class="form-control" name="input_name" id="input_name" placeholder="Nome completo" :value="data.input_name">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="input_number">Tel/Cel</label>
                                        <input type="tel" class="form-control" name="input_number" id="input_number" :value="data.input_number">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="input_email">E-mail</label>
                                        <input type="email" class="form-control" name="input_email" id="input_email" placeholder="E-mail" :value="data.input_email">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="input_cep">CEP</label>
                                        <input type="text" class="form-control"  name="input_cep" id="input_cep"  :value="data.input_cep">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="intpu_n">Nº</label>
                                        <input type="number" class="form-control" name="intpu_n" id="intpu_n" :value="data.intpu_n">
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="input_address">Endereço</label>
                                        <input type="text" class="form-control" name="input_address" id="input_address" :value="data.input_address"  >
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="input_city">Cidade</label>
                                        <input type="text" class="form-control" name="input_city" id="input_city" :value="data.input_city" >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="input_district">Bairro</label>
                                        <input type="text" class="form-control" name="input_district" id="input_district" :value="data.input_district" >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="input_state">Estado</label>
                                        <input type="text" class="form-control" name="input_state" id="input_state" :value="data.input_state" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 text-right">
                                        <a type="button" class="btn btn-danger" data-dismiss="modal" @click="delSchedule">Excluir</a>
                                        <button type="submit" class="btn btn-warning">Salvar Alteração</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

import Swal from 'sweetalert2'

export default {


    data() {
        return {
            data: [],
            cep: '',
            address: []
        }
    },

    props: {
        data: {
            type: Object,
            default: '',
        },
    },

    methods:{

        fetchCep(event) {
            this.cep = event.target.value;

            this.getAddress();
        },

        editScheduling: function() {
            var formData = new FormData(document.getElementById('formEdit'));
            var id = this.data.id;

            axios.post('edit-scheduling/' + id, formData)
            .then(function(response){

                if (response.data) {
                    Swal.fire(
                        'Ótimo!',
                        'Agendamento alterado com sucesso!',
                        'success'
                    )

                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                }
            })
        },

        delSchedule: function() {
            var id = this.data.id;

            axios.put('del-scheduling/' + id)
            .then(function(response){

                if (response.data) {
                    Swal.fire(
                        'Ótimo!',
                        'Agendamento excluido com sucesso!',
                        'success'
                    )

                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                }
            })
        }

    }

}
</script>
