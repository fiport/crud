<template>
    <div>
        <div class="container mt-5">
            <div class="modal fade" id="editAgenda" tabindex="-1" role="dialog" aria-labelledby="editAgenda" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background: #212529; color: white;">
                            <h5 class="modal-title" id="editAgenda">Editar Agenda</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form @submit.prevent="editAgendamento" id="formEdit">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputName">Nome completo</label>
                                        <input type="text" class="form-control" name="inputName" id="inputName" placeholder="Nome completo" :value="data.inputName">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputNumber">Tel/Cel</label>
                                        <input type="tel" class="form-control" name="inputNumber" id="inputNumber" :value="data.inputNumber">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail">E-mail</label>
                                        <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="E-mail" :value="data.inputEmail">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="inputCEP">CEP</label>
                                        <input type="text" class="form-control"  name="inputCEP" id="inputCEP"  :value="data.inputCEP">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="intpuN">Nº</label>
                                        <input type="number" class="form-control" name="intpuN" id="intpuN" :value="data.intpuN">
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="inputEndereco">Endereço</label>
                                        <input type="text" class="form-control" name="inputEndereco" id="inputEndereco" :value="data.inputEndereco"  >
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputCity">Cidade</label>
                                        <input type="text" class="form-control" name="inputCity" id="inputCity" :value="data.inputCity" >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputBairro">Bairro</label>
                                        <input type="text" class="form-control" name="inputBairro" id="inputBairro" :value="data.inputBairro" >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEstado">Estado</label>
                                        <input type="text" class="form-control" name="inputEstado" id="inputEstado" :value="data.inputEstado" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 text-right">
                                        <a type="button" class="btn btn-danger" data-dismiss="modal" @click="delAgenda">Excluir</a>
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

        editAgendamento: function() {
            var formData = new FormData(document.getElementById('formEdit'));
            var id = this.data.id;

            axios.post('edit-agendamento/' + id, formData)
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

        delAgenda: function() {
            var id = this.data.id;

            axios.put('del-agendamento/' + id)
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