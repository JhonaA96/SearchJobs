<template>
    <button 
        class="text-red-600 hover:text-red-900  mr-5"
        @click="eliminarVacante"
    >Eliminar</button>
</template>

<script>
    export default{
        props: ['vacanteId', ],
        methods:{
            eliminarVacante(){
                this.$swal.fire({
                    title: 'Desa eliminar está oferta??',
                    text: "Una vez eliminada no podrá deshacer el cambio",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí',
                    cancelButtonText: 'Cancelar'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        const params = {
                            id: this.vacanteId,
                            _method: 'delete',
                        }
                        axios.post(`/vacantes/${this.vacanteId}`, params)
                            .then(respuesta => {
                                this.$swal.fire(
                                    'Oferta eliminada!',
                                    respuesta.data.mensaje,
                                    'success'
                                );
                                this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                            })
                            .catch(error => {
                                console.log(error)
                            })
                    }
                })
            }
        }
    }

</script>