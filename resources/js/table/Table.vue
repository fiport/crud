<template>
    <div>
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="form-group col-md-12 text-right">
                    <a type="button" href="/novo-agendamento" class="btn btn-warning">+ Novo</a>
                </div>
            </div>
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Contato</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Enderço</th>
                    <th scope="col">Número</th>
                    <th scope="col">Cep</th>
                    <th ></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="a in agendamento">
                        <th scope="row">{{a.id}}</th>
                        <td>{{a.inputName}}</td>
                        <td>{{a.inputNumber}}</td>
                        <td>{{a.inputEmail}}</td>
                        <td>{{a.inputEndereco}}</td>
                        <td>{{a.intpuN}}</td>
                        <td>{{a.inputCEP}}</td>
                        <td>
                            <a class="btn btn-primary" @click="abreModal(a)">Editar</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <modal-agenda :data="agendaSelecionada"></modal-agenda>
        </div>
    </div>
</template>

<script>

import ModalAgenda from '../modal/_modalAgenda'

export default {

    components:{
        'modal-agenda':ModalAgenda,
    },

    data() {
        return {
            agendamento: [],
            agendaSelecionada: []
        }
    },

    methods:{

      getAgendamentos: function() {
        var $this = this;

        axios.get('get-agendamentos')
        .then(function(response) {
            $this.agendamento = response.data;
        })
    },

    abreModal: function (agenda) {
        var $this = this;
        this.agendaSelecionada = agenda;
        $('#editAgenda').modal('show');
    },

  },

  mounted () {
    this.getAgendamentos();
  },

}
</script>