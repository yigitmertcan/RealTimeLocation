<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{location.lon}}</div>

                    <div class="card-body">
                        {{location.lat}}
                    </div>
    <iframe
  width="600"
  height="450"
  style="border:0"
  loading="lazy"
  allowfullscreen
  referrerpolicy="no-referrer-when-downgrade" :src="linker">
</iframe>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
            location: {lat:"-33.8569",lon:"151.2152"}
            };
        },
        mounted() {
            console.log('Component mounted.');
            Echo.channel('carlocation')
            .listen('Cargetlocation',(data) => {
                this.location = data;
            });
        },
        computed: {

            linker: function () {
            // `this` points to the vm instance
            return "https://www.google.com/maps/embed/v1/place?key=AIzaSyDNH00tr_JUBPiYZWascoHy2kTad8VGuxo&q="+this.location.lat+","+this.location.lon+"&center="+this.location.lat+","+this.location.lon;

            }
        }

    }
</script>
