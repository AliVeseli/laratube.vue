<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Upload</div>
                    <div class="card-body">
                        <input type="file" name="video" id="video" @change="fileInputChange" v-if="!uploading">
                        <div id="video-form" v-if="uploading && !failed">
                            Form ....
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                uploading :false,
                failed :false,
                uploadingCompledted :false
            }
        },
        methods: {
            fileInputChange() {
                this.uploading = true,
                this.failed  =false

                // TODO: Store the metadata
                // TODO: Upload Video 
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
