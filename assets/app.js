/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.scss in this case)
import './styles/app.css';
import './styles/style-responsive.css';
import './styles/table-responsive.css';

//import 'bootstrap/dist/css/bootstrap.css';
import 'font-awesome/css/font-awesome.css';
//Js
const $ = require('jquery');


import 'jquery';
require('bootstrap');
require('bootstrap/dist/css/bootstrap.css')
//import './bootstrap';
import 'bootstrap/dist/js/bootstrap'
import 'jquery.scrollto';
import 'jquery.nicescroll';
import './jquery.dcjqaccordion.2.7';
import './common-scripts';
//import 'dcjqaccordion/js/jquery.dcjqaccordion.2.7'
// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything
//require('bootstrap');

$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
        });

