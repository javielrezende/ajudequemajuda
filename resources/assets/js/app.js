
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


// bootstrap
require('./bootstrap');

// Os dois imports abaixo sao referentes ao datetimepicker para eventos
const moment = require('moment');
window.moment = moment;
require('moment/locale/pt-br');
require('tempusdominus-bootstrap-4');
require('jquery/dist/jquery.min');
require('jquery-mask-plugin/dist/jquery.mask.min');
require('bootstrap');
//require('tether/dist/js/tether.min');



// Neste caso é referente ao datepicker para campanhas que nao possuem horario
require('bootstrap-datepicker');
require('bootstrap-datepicker/dist/locales/bootstrap-datepicker.pt-BR.min');
require('./datapicker');
require('./datatimepicker');
require('./estadocidade');
require('./mask');
require('./popover');
require('./criarCampanha');
//require('./habilitarCampo');
require('./uploadImagem');


