$(document).ready(function () {
    console.log('js ok');

    $('.btn-bareme').on('click',function (){
        console.log(this.getAttribute('baremeid'));
    });
});