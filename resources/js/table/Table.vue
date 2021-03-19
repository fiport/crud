<template>
    <div>
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="form-group col-md-12 text-right">
                    <a type="button" href="/new-scheduling" class="btn btn-warning">+ Novo</a>
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
                    <tr v-for="s in scheduling">
                        <th scope="row">{{s.id}}</th>
                        <td>{{s.input_name}}</td>
                        <td>{{s.input_number}}</td>
                        <td>{{s.input_email}}</td>
                        <td>{{s.input_address}}</td>
                        <td>{{s.intpu_n}}</td>
                        <td>{{s.input_cep}}</td>
                        <td>
                            <a class="btn btn-primary" @click="openModal(s)">Editar</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <modal-agenda :data="scheduleSelect"></modal-agenda>
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
            scheduling: [],
            scheduleSelect: []
        }
    },

    methods:{

      getScheduling: function() {
        var $this = this;

        axios.get('get-scheduling')
        .then(function(response) {
            $this.scheduling = response.data;
        })
    },

    openModal: function (schedule) {
        var $this = this;
        this.scheduleSelect = schedule;
        $('#editSchedule').modal('show');
    },

  },

  mounted () {
    this.getScheduling();
  },

}
</script>
