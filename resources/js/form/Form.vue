<template>
    <div>
        <div class="container mt-5">
             <div class="row">
                <div class="form-group col-md-12 text-right">
                    <a type="button" href="/" class="btn btn-secondary">Voltar</a>
                </div>
            </div>
            <form @submit.prevent="storeScheduling" id="formAddress">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputName">Nome completo</label>
                        <input type="text" class="form-control" name="inputName" id="inputName" placeholder="Nome completo" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputNumber">Tel/Cel</label>
                        <input type="tel" class="form-control" name="inputNumber" id="inputNumber" v-mask="['(##) ####-####', '(##) #####-####']" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail">E-mail</label>
                        <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="E-mail" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="inputCEP">CEP</label>
                        <input type="text" class="form-control"  name="inputCEP" id="inputCEP" required @change="fetchCep($event)" v-model="cep">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputN">Nº</label>
                        <input type="number" class="form-control" name="inputN" id="inputN" required>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="inputAddress">Endereço</label>
                        <input type="text" class="form-control" name="inputAddress" id="inputAddress" :value="address.logradouro"  >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputCity">Cidade</label>
                        <input type="text" class="form-control" name="inputCity" id="inputCity" :value="address.localidade" >
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputDistrict">Bairro</label>
                        <input type="text" class="form-control" name="inputDistrict" id="inputDistrict" :value="address.bairro" >
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Estado</label>
                        <input type="text" class="form-control" name="inputState" id="inputState" :value="address.uf" >
                    </div>
                </div>

                <button type="submit" class="btn btn-warning">Salvar</button>
                <button type="reset" class="btn btn-secondary">Limpar</button>
            </form>
        </div>
    </div>
</template>
<script>

import Swal from 'sweetalert2'
import {TheMask} from 'vue-the-mask'

export default {

    directives: {TheMask},

    data() {
        return {
            cep: '',
            address: [],
        }
    },

    methods:{

        fetchCep(event) {
            this.cep = event.target.value;

            this.getAddress();
        },

        getAddress: function() {

            var $this = this;

            axios.get('get-address/' + this.cep)
            .then(function(response){

                $this.address = response.data.data;

            })
        },

        storeScheduling: function() {

            var formData = new FormData(document.getElementById("formAddress"));

            axios.post('store-scheduling', formData)
            .then(function(response){

                if (response.data) {
                    Swal.fire(
                        'Ótimo!',
                        'Cadastro realizado!',
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
